<?php
/**
 * mobile 版本
 *
 * @copyright (c) jitongr All Rights Reserved
 */

require_once 'init.php';

define ('TEMPLATE_PATH', EMLOG_ROOT . '/view/');


$DB = MySql::getInstance();
$concepts=array();
$ltime = date('Y-m-d H:i:s');
$gip=getIp();   

$vsid=intval($_SESSION['views']);
// 首页
if(isset($_POST['crucifyme'])){
$nm=addslashes(trim($_POST['crucifyme']));
	$_SESSION['myname']=$nm;
	$DB->query("INSERT INTO jt_children(name,seid,vid,vdate,ip) VALUES (
			'$nm','$seid','".$_SESSION['views']."','$ltime','$gip')");
}
if(isset($_POST['myage'])){
$age=intval(trim($_POST['myage']));
$cnt=addslashes(trim($_POST['mycnt']));
$_SESSION['myage']=$age;
$_SESSION['mycnt']=$cnt;
	$DB->query("INSERT INTO jt_children(name,seid,vid,vdate,ip,age,content) VALUES (
			'".$_SESSION['myname']."','$seid','".$_SESSION['views']."','$ltime','$gip','$age','$cnt')");
}

if(isset($_GET['list'])){
		$sql = "SELECT name FROM jt_children where content!=''";
	$res = $DB->query($sql);
	include View::getView('head');
	
	while ($value = $DB->fetch_array($res)) {
		echo '<span title="">'.$value['name'].'</span>';
	}
	include View::getView('footer');
	View::output();
}else
 {
$age = intval($_GET['age']) ;
$mname=array("j11","j5","j17");
if($age==11)
  $mname=array("j11v","j5b","j17b");
  if($age==5)
  $mname=array("j11","j5v","j17bb");
  if($age==17)
  $mname=array("j11b","j5bb","j17v");
//$DB->query("INSERT INTO jt_viewlog (method,viewid,content,uid,vdate,text,loginip) VALUES (		'view','$vsid','$cpid','$uid','$usersina_id','$ltime','$pDa[text]','$gip')");
				
	include View::getView('head');
	include View::getView('home');
	include View::getView('footer');
}

