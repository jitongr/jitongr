<?php
/**
 * mynet forzyl@gmail.com
 * @copyright (zhangyulin
*/

require_once '../init.php';


$action = isset($_GET['action']) ? addslashes($_GET['action']) : '';
$gip=getIp();   
$uid=UID;
$usersina_id=0;
	$DB = MySql::getInstance();

if ($action == 'delok') {
	 $sql = "SELECT * FROM conceptnet_concept WHERE visible=0 limit 10000";
	 //limit 0,10000
		$res = $DB->query($sql);
		while ($row = $DB->fetch_array($res)) {
		
		$sql2 = "DELETE FROM conceptnet_assertion WHERE concept1_id=".$row['id'];
		$sql3 = "DELETE FROM conceptnet_assertion WHERE concept2_id=".$row['id'];
		$res2 = $res2+ $DB->query($sql2);
		$res3 = $res3 + $DB->query($sql3);
		
		}
		echo $sql.' ';
		echo  $row['text'].$res2."-".$res3;
}
if ($action == 'updnum') {
	 $sql = "SELECT * FROM conceptnet_concept limit 15000,10000";
	 //limit 0,10000
		$res = $DB->query($sql);
		while ($row = $DB->fetch_array($res)) {
		
		$sql2 = "SELECT count(*) FROM conceptnet_assertion WHERE concept1_id=".$row['id'];
		$res2 = $DB->once_fetch_array($sql2);
		$comNum1 = $res2['count(*)'];
		$sql3 = "SELECT count(*) FROM conceptnet_assertion WHERE concept2_id=".$row['id'];
		$res3 = $DB->once_fetch_array($sql3);
		$comNum2 = $res3['count(*)'];
		$comNum=$comNum1+$comNum2;
		$DB->query("UPDATE conceptnet_concept SET f1=".$comNum1.",f2=".$comNum2.",f3=".$comNum.
		" WHERE id=".$row['id']);
		
		}
		echo $sql.' ';
		echo  $row['text'].$res2."-".$res3;
}
// 按frame统计.
if ($action == 'frame') {
		$a=0;
    $sql = "SELECT * FROM conceptnet_frame order by relation_id";
		$res = $DB->query($sql);
		while ($row = $DB->fetch_array($res)) {
			$wd=$row['text']; 
			$a++;
			$dd=$row['id'];
		$sql2 = "SELECT count(*) FROM conceptnet_assertion WHERE best_frame_id=".$dd;
		$res2 = $DB->once_fetch_array($sql2);
		$comNum = $res2['count(*)'];
		$sql3 = "SELECT count(*) FROM conceptnet_assertion WHERE score>2 AND best_frame_id=".$dd;
		$res3 = $DB->once_fetch_array($sql3);
		$comNum3 = $res3['count(*)'];
		echo $a." ".$row['relation_id'].":".$dd." ".$wd.":".$comNum."--".$comNum3."<br>";
		
		}
}
// .按relation统计
if ($action == 'relation') {
	set_time_limit(0);
    $sql = "SELECT * FROM conceptnet_relation order by id";
		$res = $DB->query($sql);
		while ($row = $DB->fetch_array($res)) {
			$wd=$row['name']; 
			$dd=$row['id'];
		$sql2 = "SELECT count(*) FROM conceptnet_assertion WHERE relation_id=".$dd;
		$res2 = $DB->once_fetch_array($sql2);
		$comNum = $res2['count(*)'];
		$sql3 = "SELECT count(*) FROM conceptnet_assertion WHERE score>2 AND relation_id=".$dd;
		$res3 = $DB->once_fetch_array($sql3);
		$comNum3 = $resl3['count(*)'];
		echo $dd." ".$wd.":".$comNum."--".$comNum3."<br>";
		}
}

if($action == 'addcpxx')
{
$ar =intval($_POST['addrel']);
if($ar==0)
mMsg('关系号不能为空', '-1');
if($ar<-100||$ar>100)
mMsg('关系号超出范围', '-1');
$acid =intval($_POST['cid']);
if($acid<=0) mMsg('错误', '-1');
if(strlen($_POST['addname'])>0)
$addname =addslashes(trim($_POST['addname'])) ;
else mMsg('概念错误', '-1');

$sq1 = "SELECT * FROM conceptnet_concept WHERE text LIKE '$addname'";
$pDa = $DB->once_fetch_array($sq1);
$hid=$pDa[id];
if($hid>0)
{
if($hid==$acid) mMsg("重复".$hid, '-1');
}
else{
$DB->query("INSERT INTO conceptnet_concept (text,visible) VALUES ('$addname','1' )");
$hid = $DB->insert_id();
//mMsg('ok add'.$hid, '-1');
}
if($ar>0)
{
	$DB->query("UPDATE conceptnet_concept SET f1=f1+1,f3=f3+1 WHERE id='$acid'");
$DB->query("UPDATE conceptnet_concept SET f2=f2+1,f3=f3+1 WHERE id='$hid'");
$sq2 = "WHERE concept1_id='$acid' AND concept2_id='$hid' ";
$sq3 = "INSERT INTO conceptnet_assertion (concept1_id,concept2_id,relation_id";
}
else
{
$DB->query("UPDATE conceptnet_concept SET f2=f1+2,f3=f3+1 WHERE id='$acid'");
$DB->query("UPDATE conceptnet_concept SET f1=f1+1,f3=f3+1 WHERE id='$hid'");
$ar=-$ar;
$sq2 = "WHERE concept2_id='$acid' AND concept1_id='$hid' ";
$sq3 = "INSERT INTO conceptnet_assertion (concept2_id,concept1_id,relation_id";
}
$pDr = $DB->once_fetch_array("SELECT * FROM conceptnet_assertion ".$sq2);
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
$DB->query("UPDATE conceptnet_assertion SET creator='$creator', ".$sq4.$sq2 );
//mMsg("关系已改".$rid, '-1');
$pp="关系已改";
}
else{
$DB->query($sq3);
$rid = $DB->insert_id();

}
$ltime = time();
$DB->query("INSERT INTO oplog (opid,concept,relation,gid,sina_uid,date,text,loginip) VALUES (
				'3','$hid','$rid','$uid','$usersina_id','$ltime','$addname','$gip')");

mMsg('添加成功！'.$pp.$rid, $turl."?cp=".$acid);

}
// concept.
if ($action == '') {
$ltime = time();
if(isset($_GET['del']) )
{
$hhtitle="删除概念";
$eid =intval($_GET['del']);
$DB->query("INSERT INTO oplog (opid,concept,gid,sina_uid,date,loginip) VALUES (
				'4','$eid','$uid','$usersina_id','$ltime','$gip')");
$DB->query("UPDATE conceptnet_concept SET visible=0 WHERE id=".$eid);
}

else if(isset($_GET['res']) )
{
$hhtitle="恢复概念";
$eid =intval($_GET['res']);
$DB->query("INSERT INTO oplog (opid,concept,gid,sina_uid,date,loginip) VALUES (
				'5','$eid','$uid','$usersina_id','$ltime','$gip')");
$DB->query("UPDATE conceptnet_concept SET visible=1 WHERE id=".$eid);
}

else if(isset($_GET['badr']) )
{
$hhtitle="bad";
$rid =intval($_GET['badr']);
$DB->query("INSERT INTO oplog (opid,relation,gid,sina_uid,date,loginip) VALUES (
				'7','$rid','$uid','$usersina_id','$ltime','$gip')");
$DB->query("UPDATE conceptnet_assertion SET bad=bad+1 WHERE id=".$rid);
}
else if(isset($_GET['goodr']) )
{
$hhtitle="good";
$rid =intval($_GET['goodr']);
$DB->query("INSERT INTO oplog (opid,relation,gid,sina_uid,date,loginip) VALUES (
				'6','$rid','$uid','$usersina_id','$ltime','$gip')");
$DB->query("UPDATE conceptnet_assertion SET good=good+1 WHERE id=".$rid);
}
else
$hhtitle="错误";
mMsg($hhtitle.'操作成功！', $turl."?cp=".$eid);
}

function mMsg($msg, $url) {
	echo $msg."<a href='".$url."'>返回</a>";
	exit;
}
