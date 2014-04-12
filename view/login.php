<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>

<div id="m">
<?php if($action=='login'): ?>
<br>
<font color="red"><?php echo $errorInfo; ?></font><br><br>
<form method="post" action="./?action=auth">
		用户名<br />
	    <input type="text" name="user" /><br />
	    密码<br />
	    <input type="password" name="pw" /><br />
	    <?php echo $ckcode; ?>
	    <br /><input type="submit" value=" 登 录" />
	    <a href="./?action=reg">注册</a>
	</form>
	
<?php endif;?>
<?php if($action=='reg'): ?>
欢迎 注册！
<form method="post" action="./?action=new">
		用户名<br />
	    <input type="text" name="user" /><br />
	    密码<br />
	    <input type="password" name="pw" /><br />
	     重复密码<br />
	    <input type="password" name="pw2" /><br />

	    <?php echo $ckcode; ?>
	    <br /><input type="submit" value=" 注册" />
	    <a href="<?php echo BLOG_URL; ?>m/?action=login">登录</a>
	</form>
	
<?php endif;?>
</div>