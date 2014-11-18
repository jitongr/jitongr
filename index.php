<?php
/**
 * mobile 版本
 *
 * @copyright (c) jitongr All Rights Reserved
 */

require_once 'init.php';

define ('TEMPLATE_PATH', EMLOG_ROOT . '/view/');

$action = isset($_GET['action']) ? addslashes($_GET['action']) : '';
$DB = MySql::getInstance();
$concepts=array();

$atitle="";
$gip=getIp();   
$uid=UID;
$vsid=intval($_SESSION['views']);
// 首页

if (empty ($action) ) {
$age = intval($_GET['age']) ;
$mname=array("j11","j5","j17");
if($age==11)
  $mname=array("j11v","j5b","j17b");
  if($age==5)
  $mname=array("j11","j5v","j17bb");
  if($age==17)
  $mname=array("j11b","j5bb","j17v");
$DB->query("INSERT INTO viewlog (method,viewid,concept,uid,sina_uid,date,text,loginip) VALUES (
				'view','$vsid','$cpid','$uid','$usersina_id','$ltime','$pDa[text]','$gip')");
				
	include View::getView('head');
	include View::getView('home');
	include View::getView('footer');
}


if ($action == 'login' ||$action == 'reg' ) {

	include View::getView('head');
	include View::getView('login');
	include View::getView('footer');
	View::output();
}
if ($action == 'auth') {
	session_start();
	$username = addslashes(trim($_POST['user']));
	$password = addslashes(trim($_POST['pw']));
	//$img_code = (Option::get('login_code') == 'y' && isset ($_POST['imgcode'])) ? addslashes (trim (strtoupper ($_POST['imgcode']))) : '';
	$ispersis = true;
	if (checkUser($username, $password, $img_code) === true) {
		setAuthCookie($username, $ispersis);
		if($_SESSION['onm']==1)
		emDirect('?tem=' . time());
		else
		emDirect('.');
	}else {
		emDirect("?action=login");
	}
}
if ($action== 'new') {
		$login = isset($_POST['user']) ? addslashes(trim($_POST['user'])) : '';
		$password = isset($_POST['pw']) ? addslashes(trim($_POST['pw'])) : '';
		$password2 = isset($_POST['pw2']) ? addslashes(trim($_POST['pw2'])) : '';
		$password3 = isset($_POST['pw3']) ? addslashes(trim($_POST['pw3'])) : '';
		if (strlen($login) < 3) {
			mMsg('用户名过短！', './?action=reg');
		}
		if (strlen($password) < 3) {
			mMsg('密码过短！', './');
		}
		if ($password != $password2) {
			mMsg('两次密码不一致！', './?action=reg');
		}
		$User_Model = new User_Model();
		if ($User_Model->isUserExist($login)) {
			mMsg('用户名已存在！', './?action=reg');
		}


		$PHPASS = new PasswordHash(8, true);
		$password = $PHPASS->HashPassword($password);

		$User_Model->addUser($login, $password, $role);
		mMsg('注册成功！', './?action=login');
}

if ($action == 'logout') {
	setcookie(AUTH_COOKIE_NAME, ' ', time () - 31536000, '/');
	emDirect('?tem=' . time());
}
function mMsg($msg, $url) {
	include View::getView('head');
	include View::getView('msg');
	include View::getView('footer');
	View::output();
}