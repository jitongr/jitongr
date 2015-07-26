<div id="footer">
在此祭奠你认识的苦难天使，祈祷：
<?php if(UID) echo $userData['username']; ?>
<?php if(ISLOGIN === true): ?>
<a href="<?php echo BLOG_URL; ?>?action=logout" >祭出</a> 
<?php else:?>
<a href="<?php echo BLOG_URL; ?>?action=login" <?php if($action=='about')echo 'id="active"'; ?> >开始</a>
<?php endif;?></div>
</body>
</html>