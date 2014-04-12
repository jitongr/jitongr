<?php 
/*
* 首页
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>

<div id="content">
<div id="contentleft">
<table width="100%" cellspacing=0 cellpadding=0 style="font-size:12px">

    <tr>
        <th style="text-align:left;">
        
        <h2><a href="?post=<?php echo $valuz['gid']; ?>"><?php echo $valuz['title']; ?></a></h2>
	<p class="date">作者：<?php ($valuz['author']); ?> 发布于：<?php echo gmdate('Y-n-j G:i l', $valuz['date']); ?> 
	</p>
	<?php echo $valuz['content']; ?>
	<p class="count">
	评论(<?php echo $valuz['comnum']; ?>)
	引用(<?php echo $valuz['tbcount']; ?>)
	<a href="?post=<?php echo $valuz['gid']; ?>">浏览(<?php echo $valuz['views']; ?>)</a>
	</p>
        
        </th>
        <th style="text-align:left;">
祭童：
           
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
			xmlhttp.open("POST", "./toddler.php", true);
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
<body  onkeydown="down(event.keyCode)" style="text-align: center;">
	<div class="container">
		<div class="main">
			<div id="result"></div>
			<div>
				<input type="text" name="text" id="text" />
				<input type="button" value="发送" id="btn" onclick="javascript:if(document.getElementById('text').value==''){alert('输入内容不能为空！');}else{chat();}" />
			</div>
		</div>
	</div>       
        

</th>
  </tr>
  </table>
