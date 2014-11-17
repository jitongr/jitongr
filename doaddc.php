<?php
/**
 * mynet forzyl@gmail.com
 * @copyright (zhangyulin
*/

require_once '../init.php';

define('TEMPLATE_PATH', TPLS_PATH.Option::get('nonce_templet').'/');//前台模板路径

$blogtitle = '操作-' . Option::get('blogname');

if (ISLOGIN !== true&&(
empty($_SESSION['oauth2']["user_id"])||empty($_SESSION['u_name']))){
echo "请先登录或授权！";
exit;
}
$action = isset($_GET['action']) ? addslashes($_GET['action']) : '';
$gip=getIp();   
$uid=UID;
$usersina_id= intval($_SESSION['oauth2']["user_id"]);
	$DB = MySql::getInstance();

	
if($action == 'addcp')
{
$acid =intval($_POST['cid']);
if($acid>0) {
	$tabf="conceptnet";
		$vfrom="ladd";
}
else
   mMsg('错误', '-1');

if($_POST['addrel']=="#"){
$arlo =intval($_POST['addname']);
if($arlo==0)mMsg('关联log号不能为空', '-1');
$DB->query("INSERT INTO viewlog (method,viewid,concept,uid,sina_uid,date,text,loginip) VALUES (
				'$vfrom','$vsid','$acidd','$uid','$usersina_id','$ltime','$arlo','$gip')");
	$DB->query("UPDATE ".$tabf."_concept SET logid='$arlo' WHERE id='$acid'");
mMsg('log操作成功！', '-1');	
}else
$ar =intval($_POST['addrel']);
if($ar==0)
mMsg('关系号不能为空', '-1');
if($ar<-100||$ar>100)
mMsg('关系号超出范围', '-1');
if(intval($_POST['dirs'])==1)
$ar=-$ar;
$arrr=$ar;

if(strlen($_POST['addname'])>0 && strlen($_POST['addname'])<200)
$addname =addslashes(trim($_POST['addname'])) ;
else mMsg('概念错误', '-1');
$cp0s=addslashes(trim($_POST['cp0s'])) ;
$sq1 = "SELECT * FROM ".$tabf."_concept WHERE text LIKE '$addname'";
$pDa = $DB->once_fetch_array($sq1);
$hid=$pDa[id];
if($hid>0)
{
if($hid==$acid) mMsg("重复".$hid, '-1');
$cpaddid=-$hid;
}
else{
	    $DB->query("INSERT INTO ".$tabf."_concept (text,visible) VALUES ('$addname','1' )");
		$hid = $DB->insert_id();
		$cpaddid=$hid;
//mMsg('ok add'.$hid, '-1');
}
if($ar>0)
{
	$DB->query("UPDATE ".$tabf."_concept SET f1=f1+1,f3=f3+1 WHERE id='$acid'");
$DB->query("UPDATE ".$tabf."_concept SET f2=f2+1,f3=f3+1 WHERE id='$hid'");
$sq2 = "WHERE concept1_id='$acid' AND concept2_id='$hid' ";
$sq3 = "INSERT INTO ".$tabf."_assertion (concept1_id,concept2_id,relation_id";
}
else
{
$DB->query("UPDATE ".$tabf."_concept SET f2=f1+2,f3=f3+1 WHERE id='$acid'");
$DB->query("UPDATE ".$tabf."_concept SET f1=f1+1,f3=f3+1 WHERE id='$hid'");
$ar=-$ar;
$sq2 = "WHERE concept2_id='$acid' AND concept1_id='$hid' ";
$sq3 = "INSERT INTO ".$tabf."_assertion (concept2_id,concept1_id,relation_id";
}
$pDr = $DB->once_fetch_array("SELECT * FROM ".$tabf."_assertion ".$sq2);
$rid=$pDr[id];

if($ar<32)
{
$sq3=$sq3.") VALUES ('$acid','$hid','$ar')";
$sq4="relation_id='$ar' ";
}
else
{
$sqqq1="SELECT relation_id FROM conceptnet_frame WHERE id='$ar'";
        $qDq = $DB->once_fetch_array($sqqq1);
$sq3=$sq3.",best_frame_id) VALUES ('$acid','$hid','$qDq[relation_id]','$ar')";
$sq4="relation_id='$qDq[relation_id]',best_frame_id='$ar' ";
}

if($rid>0)
{
//
$DB->query("UPDATE ".$tabf."_assertion SET ".$sq4.$sq2 );
//mMsg("关系已改".$rid, '-1');
$pp="关系已改";
}
else{
$DB->query($sq3);
$rid = $DB->insert_id();

}
$ltime = time();
$sst=date('Y-m-d H:i:s', $ltime);
	$vsid=intval($_SESSION['views']);
$DB->query("INSERT INTO vaddlog (viewid,cp0,cp0id,rid,cpadd,cpaddid,relation,
     uid,sina_uid,date,dates,loginip) VALUES (
		'$vsid','$cp0s','$acid','$arrr','$addname','$cpaddid','$rid',
		'$uid','$usersina_id','$ltime','$sst','$gip')");

mMsg('添加成功！'.$pp.$hid, $turl."?cp=".$acid);

}


function mMsg($msg, $url) {
	echo "<script language=\"JavaScript\">alert(\"$msg\");history.back();</script>";
	exit;
}

?>