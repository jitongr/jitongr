<div id="footer">
孩童被钉在十字架上，宝玉也要同钉十字架祭童
<?php if(UID) echo $userData['username']; ?>
<?php if(ISLOGIN === true): ?>
<a href="<?php echo BLOG_URL; ?>?action=logout" >退出</a> 
<?php else:?>
<a href="<?php echo BLOG_URL; ?>?action=login" <?php if($action=='about')echo 'id="active"'; ?> >登录</a>
<?php endif;?></div>
</body>
</html>