<?php 
/*
* 首页
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<style type="text/css" >
.crucify {
  background: url("./view/cruboys.jpg") no-repeat;
  width: 819px;
  height: 584px;
  margin: 0 auto;
  position: relative;
  cursor: pointer;
}
.j11,
.j5,
.j17 {
  position: absolute;
  display: block;
  z-index: 2;
}
.j11 {
  width: 384px;
  height: 449px;
  left: 0px;
  top: 86px;
}
.j11:hover {
  background: url("./view/<?php echo $mname[0];?>.png") no-repeat;
}
.j5 {
  width: 303px;
  height: 337px;
  left: 250px;
  top: 167px;
}
.j5:hover {
  background: url("./view/<?php echo $mname[1];?>.png") no-repeat;
}
.j17 {
  width: 432px;
  height: 555px;
  left: 388px;
  top: 8px;
}
.j17:hover {
  background: url("./view/<?php echo $mname[2];?>.png") no-repeat;
}
</style>
<div id="content">
<div id="crucify" class="crucify">
<a  class="j17" href="index.php?age=17#crucify" title='dddd'></a>
<a  class="j11" href="index.php?age=11#crucify"></a>	
<a  class="j5" href="index.php?age=5#crucify"></a>	
	
	<?php /*
   <a  class="j11" coords="182,158,252,312" 
       href="index.php?age=11#crucify" target="_self" >11岁男孩-吉童"</a>
          <a  coords="114,124,177,188" 
       href="index.php?age=11&p=head#crucify" target="_self" >11岁男孩-吉童的头"</a>
            <a  coords="0,87,39,122" 
       href="index.php?age=11&p=lefthand#crucify" target="_self" >11岁男孩-吉童的左手"</a>
            <a  coords="339,95,380,123" 
       href="index.php?age=11&p=righthand#crucify" target="_self" >11岁男孩-吉童的右手"</a>
            <a  coords="191,328,240,478" 
       href="index.php?age=11&p=legs#crucify" target="_self" >11岁男孩-吉童的双腿"</a>
            <a  coords="189,484,230,530" 
       href="index.php?age=11&p=feet#crucify" target="_self" >11岁男孩-吉童的双脚"</a>  
     <a  coords="363,245,432,341" 
       href="index.php?age=5#crucify" target="_self" >5岁幼童-桐柯"</a>
       <a  coords="357,167,412,231" 
       href="index.php?age=5&p=head#crucify" target="_self" >5岁幼童-桐柯的头"</a>
       <a  coords="253,205,290,234" 
       href="index.php?age=5&p=lefthand#crucify" target="_self" >5岁幼童-桐柯的左手"</a>
       <a  coords="508,202,544,228" 
       href="index.php?age=5&p=righthand#crucify" target="_self" >5岁幼童-桐柯的右手"</a>
       <a  coords="372,376,433,456" 
       href="index.php?age=5&p=legs#crucify" target="_self" >5岁幼童-桐柯的双腿"</a>
       <a  coords="388,469,428,501" 
       href="index.php?age=5&p=feet#crucify" target="_self" >5岁幼童-桐柯的双脚"</a>
     <a  coords="546,158,657,303" 
       href="index.php?age=17#crucify" target="_self" >17岁的男孩-钰林"</a>
       <a  coords="579,71,637,155" 
       href="index.php?age=17&p=head#crucify" target="_self" >17岁的男孩-钰林的头"</a>
       <a  coords="381,3,423,47" 
       href="index.php?age=17&p=lefthand#crucify" target="_self" >17岁的男孩-钰林的左手"</a>
       <a  coords="768,23,811,63" 
       href="index.php?age=17&p=righthand#crucify" target="_self" >17岁的男孩-钰林的右手"</a>
       <a  coords="567,325,640,498" 
       href="index.php?age=17&p=legs#crucify" target="_self" >17岁的男孩-钰林的双腿"</a>
       <a  coords="594,509,626,557" 
       href="index.php?age=17&p=feet#crucify" target="_self" >17岁的男孩-钰林的双脚"</a>
  */ 
	?>
</div>
