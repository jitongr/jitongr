<?php
require_once '../init.php';
echo "building...";
$imgid = isset ($_GET['img']) ? intval ($_GET['img']) : '';
echo $imgid;





?>

<!DOCTYPE HTML>
<html>
<head>
<style type="text/css"> 
body
{
font-size:70%;
font-family:verdana,helvetica,arial,sans-serif;
}
</style>
<link href="jquery_plgin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="jquery_p.js"></script>
<script type="text/javascript"> 
$(function(){

var pos=$('#position').offset();var $position=$("#position");
var $menu=$(document.createElement('div')).addClass("boardlist").appendTo('body').css({'left':pos.left,'top':pos.top});
$("a:eq(0)",$position).mouseover(function(){$menu.show();
if($menu.text()==''){$menu.html('<img src="images/1000516.gif" alt="waiting" />&nbsp;Loading ...');
$menu.load("json/boardlist.asp")}});
$menu.hover(function(){},function(){$menu.hide();});
$.form(document);

});
function cnvs_getCoordinates(e)
{
x=e.clientX;
y=e.clientY;
document.getElementById("xycoordinates").innerHTML="Coordinates: (" + x + "," + y + ")";
}
 
function cnvs_clearCoordinates()
{
document.getElementById("xycoordinates").innerHTML="";
}
</script>
</head>

<body style="margin:0px;">
<div id="coordiv" onmousemove="cnvs_getCoordinates(event)" onmouseout="cnvs_clearCoordinates()">
<div style="position:relative;top:300px;left:30px;">hjjjjjjjh</div>
<img src="mind.jpg" border="0" usemap="#planetmap" alt="Planets" />

</div>
<map name="planetmap" id="planetmap">
  <area shape="circle" coords="230,139,14" href ="?img=1" alt="Venus" />
  <area shape="rect" coords="200,329,361,410" href ="?img=2" alt="Mercury" />
  <area shape="rect" coords="0,0,110,260" href ="?img=3" alt="Sun" />
</map>
<div id="xycoordinates"></div>
<form action="checklogin.asp" method="post" name="form1" >
    <td width="60" height="35" align="center" bgcolor="#f4f7fc" class="bian">用户名</td>
    <td width="100" align="center" bgcolor="#f4f7fc" class="bian"><input name="username" type="text" style="width:100px;height:15px" /></td>
    <td width="50" align="center" bgcolor="#f4f7fc" class="bian">密&nbsp;码</td>
    <td width="100" align="center" bgcolor="#f4f7fc" class="bian"><input type="password" name="password" id="password"  style="width:100px;height:15px" /></td>
   
    <td width="80" align="center" bgcolor="#f4f7fc" class="bian">
      <label>
        <input type="checkbox" name="remberpsw" value="1" />记住密码
        </label>
     </td>

    <td width="80" align="center" bgcolor="#f4f7fc" class="bian"><input type="image" width="56" height="24" border="0" src="images/top_36.png" name="Submit" value="登入"></td>
	 </form>  
<div id="position">
	<a  href=""><img src="images/top_11.png" /></a></div>
<p>把鼠标悬停在下面的矩形上可以看到坐标：</p>

<div id="coordiv2" style="float:left;width:199px;height:99px;border:1px solid #c3c3c3" onmousemove="cnvs_getCoordinates(event)" onmouseout="cnvs_clearCoordinates()"></div>
<br />
<br />
<br />

 
 
</body>
</html>
