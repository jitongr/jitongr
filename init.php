<?php
/**
 * 全局项加载
 * @copyright jitong
 */

error_reporting(7);
ob_start();
session_start();
header('Content-Type: text/html; charset=UTF-8');

define('EMLOG_ROOT', dirname(__FILE__));

if (!isset($_SERVER["HTTP_APPNAME"])) {//非SAE平台下运行，加载普通核心
    define("IS_SAE",FALSE);
}else{
    define("IS_SAE",TRUE);
	//sae Storage domain
	define('S_DOMAIN','emlog');
}

if(IS_SAE){
	require_once EMLOG_ROOT.'/sae.config.php';
	require_once EMLOG_ROOT.'/lib/function.sae.base.php';

}else{
	require_once EMLOG_ROOT.'/config.php';
	require_once EMLOG_ROOT.'/lib/function.base.php';
}

//print_r($_SERVER);
$ltime = time();
$DB = MySql::getInstance();
if(!isset($_SESSION['views']))  
{
	$_SESSION['views']=1;
    $DB->query("INSERT INTO accelog (method,tou,lastu,expler,date,aip,times) VALUES (
		'".$_SERVER[REQUEST_METHOD]."','".addslashes($_SERVER[REQUEST_URI])."','".
addslashes($_SERVER[HTTP_REFERER])."','".addslashes($_SERVER[HTTP_USER_AGENT])."','$ltime','".
$_SERVER['REMOTE_ADDR']."','".$_SESSION['views']."')");
}
else 
$_SESSION['views']++;

require_once EMLOG_ROOT.'/lib/function.login.php';

doStripslashes();

//$CACHE = Cache::getInstance();

$userData = array();
//define('ISAUTH',	issinaAuth());
define('ISLOGIN',	isLogin());
//用户组: admin管理员, writer联合撰写人, visitor访客
define('ROLE', ISLOGIN === true ? $userData['role'] : 'visitor');
//用户ID
define('UID', ISLOGIN === true ? $userData['uid'] : 0);
//博客固定地址
//define('BLOG_URL', Option::get('blogurl'));
define('BLOG_URL', "/jitongr/");
//模板库地址
define('TPLS_URL', BLOG_URL.'content/templates/');
//模板库路径
define('TPLS_PATH', EMLOG_ROOT.'/views/');
//解决前台多域名ajax跨域
//define('DYNAMIC_BLOGURL', getBlogUrl());
//前台模板URL
//define('TEMPLATE_URL', 	TPLS_URL.Option::get('nonce_templet').'/');
$blogname="祭童儿";
