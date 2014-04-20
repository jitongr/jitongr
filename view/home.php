<?php 
/*
* 首页
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>


祭童：
<div id="content">

	<div id="crucify"></div>
<img alt="十字架上的孩子们" src="<?php echo BLOG_URL; ?>/view/cruboys.jpg" width="819" height="584" align="left" usemap="#boys" />
<map name="boys">
     <area class="text" id="name" shape="rect" coords="182,158,252,312" 
       href="index.php?age=11#crucify" target="_self" title="11岁男孩-吉童"/>
          <area class="text" id="name" shape="rect" coords="114,124,177,188" 
       href="index.php?age=11&p=head#crucify" target="_self" title="11岁男孩-吉童的头"/>
            <area class="text" id="name" shape="rect" coords="0,87,39,122" 
       href="index.php?age=11&p=lefthand#crucify" target="_self" title="11岁男孩-吉童的左手"/>
            <area class="text" id="name" shape="rect" coords="339,95,380,123" 
       href="index.php?age=11&p=righthand#crucify" target="_self" title="11岁男孩-吉童的右手"/>
            <area class="text" id="name" shape="rect" coords="191,328,240,478" 
       href="index.php?age=11&p=legs#crucify" target="_self" title="11岁男孩-吉童的双腿"/>
            <area class="text" id="name" shape="rect" coords="189,484,230,530" 
       href="index.php?age=11&p=feet#crucify" target="_self" title="11岁男孩-吉童的双脚"/>  
     <area class="text" id="name" shape="rect" coords="363,245,432,341" 
       href="index.php?age=5#crucify" target="_self" title="5岁幼童-桐柯"/>
       <area class="text" id="name" shape="rect" coords="357,167,412,231" 
       href="index.php?age=5&p=head#crucify" target="_self" title="5岁幼童-桐柯的头"/>
       <area class="text" id="name" shape="rect" coords="253,205,290,234" 
       href="index.php?age=5&p=lefthand#crucify" target="_self" title="5岁幼童-桐柯的左手"/>
       <area class="text" id="name" shape="rect" coords="508,202,544,228" 
       href="index.php?age=5&p=righthand#crucify" target="_self" title="5岁幼童-桐柯的右手"/>
       <area class="text" id="name" shape="rect" coords="372,376,433,456" 
       href="index.php?age=5&p=legs#crucify" target="_self" title="5岁幼童-桐柯的双腿"/>
       <area class="text" id="name" shape="rect" coords="388,469,428,501" 
       href="index.php?age=5&p=feet#crucify" target="_self" title="5岁幼童-桐柯的双脚"/>
     <area class="text" id="name" shape="rect" coords="546,158,657,303" 
       href="index.php?age=17#crucify" target="_self" title="17岁的男孩-钰林"/>
       <area class="text" id="name" shape="rect" coords="579,71,637,155" 
       href="index.php?age=17&p=head#crucify" target="_self" title="17岁的男孩-钰林的头"/>
       <area class="text" id="name" shape="rect" coords="381,3,423,47" 
       href="index.php?age=17&p=lefthand#crucify" target="_self" title="17岁的男孩-钰林的左手"/>
       <area class="text" id="name" shape="rect" coords="768,23,811,63" 
       href="index.php?age=17&p=righthand#crucify" target="_self" title="17岁的男孩-钰林的右手"/>
       <area class="text" id="name" shape="rect" coords="567,325,640,498" 
       href="index.php?age=17&p=legs#crucify" target="_self" title="17岁的男孩-钰林的双腿"/>
       <area class="text" id="name" shape="rect" coords="594,509,626,557" 
       href="index.php?age=17&p=feet#crucify" target="_self" title="17岁的男孩-钰林的双脚"/>
</map>

<DIV style="MARGIN: 10px auto; BACKGROUND:url(/zhien/yun.jpg); HEIGHT: 584px;;" >
<br><br><h2><a href="?post=<?php echo $valuz['gid']; ?>"><?php echo $valuz['title']; ?></a></h2>
<?php echo $valuz['content']; ?></DIV>
 <script type="text/javascript">
	function check() {
		if (document.getElementById('question').value == ""
				|| document.getElementById('answer').value == "") {
			alert('请输入问题和答案！')
		} else {
			document.getElementById('ask').submit();
		}
	}
</script>
<style type="text/css" id="internalStyle">
.demouser {	color: blue;}
.demobot {	color: green;}
form {	text-align: left;}
.container {
	width: 400px;
	height: 500px;
	border: 1px solid #022c60;

	margin: 1px auto 0px auto;
	padding: 1px;
}
.main {
	float: left;
	width: 100%;
	height: 100%;
	border: 1px solid #022c60;
	background-color: #f6f7eb;
}
#result {
	height: 400px;
	margin-bottom: 10px;
	text-align: left;
	padding: 10px;
	line-height: 28px;
	overflow-y: scroll;
}
#result .you {color: #33c;}
#result .lost {	color: #669;}
#result .loading {	color: #888;}
#text {
	width: 380px;
	margin-left: 5px;
	height: 22px;
	line-height: 22px;
}
#btn {
	margin-left: 10px;
	width: 50px;
	height: 24px;
	line-height: 24px;
}
</style>       
 <script type="text/javascript">
	function down(code) {
		if (code == 13) {
			chat();
		}
	}

	function f() {
		document.getElementById('text').focus();
	}

	var xmlhttp;
	function chat() {
		document.getElementById('result').innerHTML += "<div class=\"demouser\">You: "
				+ document.getElementById('text').value + "</div>";
		document.getElementById('btn').disabled = true;
		document.getElementById('btn').value = "请稍后……";
		xmlhttp = null;

		if (window.XMLHttpRequest) {// code for Firefox, Opera, IE7, etc.
			xmlhttp = new XMLHttpRequest();
		} else if (window.ActiveXObject) {// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		if (xmlhttp != null) {
			xmlhttp.onreadystatechange = state_Change;
			xmlhttp.open("POST", "./index.php", true);
			xmlhttp.setRequestHeader("Content-type",
					"application/x-www-form-urlencoded");
			xmlhttp.send("chat=" + document.getElementById('text').value);
		} else {
			alert("Your browser does not support XMLHTTP.");
		}
		document.getElementById('text').value = "";
	}

	function state_Change() {
		if (xmlhttp.readyState == 4) {
			if (xmlhttp.status == 200) {
				document.getElementById('result').innerHTML += "<div class=\"demobot\">Bot: "
						+ xmlhttp.responseText + "</div>";
				document.getElementById('result').scrollTop = document
						.getElementById('result').scrollHeight;
			} else {
				alert("Problem retrieving data:" + xmlhttp.statusText);
			}
			document.getElementById('btn').disabled = false;
			document.getElementById('btn').value = "发送";
			//f();
		}
	}
</script>

<div id="content">
	<div class="container">
		<div class="main">
			<div id="result"></div>
			<div>
				<input type="text" name="text" id="text" />
				<input type="button" value="发送" id="btn" onclick="javascript:if(document.getElementById('text').value==''){alert('输入内容不能为空！');}else{chat();}" />
			</div>
		</div>
</div>       

