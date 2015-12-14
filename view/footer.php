<div id="footer">
<?php if(empty($_SESSION['myname'])){ ?>
<form method="post" action="./">我的名字：<input type="text" name="crucifyme" />
  <input type="submit" value="我也要做祭童" />	   
<?php }elseif((intval($_SESSION['myage'])==0)||empty($_SESSION['mycnt'])){?>
<form method="post" action="./?age">我叫<?=$_SESSION['myname']?>,今年<input type="text" style="width:40px;" name="myage" value='<?=$_SESSION['myage']?>'/>岁了。我的祭言：<input type="text" name="mycnt" />
  <input type="submit" value="确定" />	   
<? }else{ ?>
<form method="post" action="./?xianji">我叫<?=$_SESSION['myname']?>,今年<?=$_SESSION['myage']?>岁。<?=$_SESSION['mycnt']?>
  <input type="submit" value="献祭" />	   
<? }?>
<? if($vsid>4){?>
 <a href="./?list">祭童名单</a></form>
<? }?>
</div>
</body>
</html>