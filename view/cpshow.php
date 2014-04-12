<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>

<div id="m">
   	<li>
	<h3><span>cruboy   语义网络</span></h3>
	<ul id="logserch">
	<form name="keycp" method="get" action="<?php echo BLOG_URL; ?>index.php">
	<input name="keyword"  type="text" value="" style="width:120px;"/>
	<input type="submit" id="logserch_logserch" value="搜索" />
	</form>
	</ul>
	</li>
    
<div class="comcont">
&nbsp;&nbsp;
<?php if($pDa['visible'] == true ): ?>
<a href="<?php echo BLOG_URL; ?>cruboy.php?id=<?php echo $pDa['id']; ?>">
<?php echo $pDa['text']; ?></a>&nbsp;
<a href="do.php?del=<?php echo $pDa['id'];?>"><font size="1">[删]</font></a>
<?php else:?>

<SPAN style="TEXT-DECORATION: line-through"><a href="<?php echo BLOG_URL; ?>?cp=<?php echo $pDa['id']; ?>">
<?php echo $pDa['text']; ?></a></SPAN>&nbsp;
<a href="do.php?res=<?php echo $pDa['id'];?>"><font size="1">[留]</font></a>
<?php endif;?>

关系数<?php echo $pDa['f3']; ?>
（前向<?php echo $pDa['f1']; ?>
后向<?php echo $pDa['f2']; ?>）
 受记:<?php echo $pDa['num_assertions']; ?>
cruboy<?php echo $pDa['cruboy']; ?>
 查看<?php echo $pDa['words']; ?>
 标记<?php echo $pDa['language_id']; ?>

</div>   
=======================================<br>
	<?php 
foreach($concepts as $value):
?>
<div class="comcont">
&nbsp;&nbsp;<?php echo $value['aid']; ?>
<?php if($value['visible'] == true ): ?>
<a href="<?php echo BLOG_URL; ?>?cp=<?php echo $value['id']; ?>">
<?php echo $value['text']; ?></a>&nbsp;

<?php else:?>

<SPAN style="TEXT-DECORATION: line-through"><a href="<?php echo BLOG_URL; ?>?cp=<?php echo $value['id']; ?>">
<?php echo $value['text']; ?></a></SPAN>&nbsp;

<?php endif;?>

：<?php echo $value['f3']; ?>
：c:<?php echo $value['num_assertions']; ?>

<?php echo " +".$value['relation_id'].".".$value['best_frame_id'].' '.$value['rela'].":".$value['frame']; ?>
</div>
<?php endforeach; ?>

===============反向关系================

	<?php 
foreach($concepts2 as $value):
?>
<div class="comcont">
&nbsp;&nbsp;<?php echo $value['aid']; ?>
<?php if($value['visible'] == true ): ?>
<a href="<?php echo BLOG_URL; ?>?cp=<?php echo $value['id']; ?>">
<?php echo $value['text']; ?></a>&nbsp;

<?php else:?>

<SPAN style="TEXT-DECORATION: line-through"><a href="<?php echo BLOG_URL; ?>?cp=<?php echo $value['id']; ?>">
<?php echo $value['text']; ?></a></SPAN>&nbsp;

<?php endif;?>

：<?php echo $value['f3']; ?>
：c:<?php echo $value['num_assertions']; ?>

<?php echo " -".$value['relation_id'].".".$value['best_frame_id'].' '.$value['rela'].":".$value['frame']; ?>
</div>
<?php endforeach; ?>
<br>
	<form name="addcp" method="post" action="<?php echo BLOG_URL; ?>doadd.php?action=addcp">
    添加“<?php echo $pDa['text']; ?>”的关联概念：<br>
    <input type="hidden" name="cp0s" value=<?php echo $pDa['text']; ?> />
    <input type="hidden" name="cid" value=<?php echo -$pDa['id']; ?> />
    关系号：<input name="addrel"  type="text" value="" style="width:80px;"/>
	名称：<input name="addname"  type="text" value="" style="width:120px;"/>
	<input type="submit" id="addcpsubmit" value="添加" />
    33：{1}会让你想要{2}。 34：{1}会让你{2}。 35：{1}之后可能会发生的事情是{2}。 36：因为{1}所以{2}。 37：{1}可能会带来{2}。 38：{1}可能会引起{2}。 40：{1}的时候，首先要{2}。 45：{1}是{2}的一部分。 46：{1}可以用{2}制成。 47：{1}由{2}组成。 50：{1}是一种{2}。 51：{1}在{2}里。 55：{1}在{2}外。 57：你可以在{2}找到{1}。 58：{2}有{1}。 60：{2}的时候可能会用到{1}。 63：{1}能做的事情有{2}。 64：{1}会{2}。 65：你会{1}因为你{2}。 66：{1}是为了{2}。 67：想要有{2}应该要{1}。 68：当你想要{2}的时候你可能会{1}。 69：{2}的时候会想要{1}。 70：{1}喜欢{2}。 71：{1}想要{2}。 72：{1}不想要{2}。 73：{1}害怕{2}。 75：{1}痛恨{2}。 79：{1}是{2}的。84：{2}可能代表{1}。 89：{1}代表{2}。 92：{1}的时候，你会{2}。 95：在{1}，你会{2}。   
</form>
</div>
