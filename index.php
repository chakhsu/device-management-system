<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录 - 实验室仪器设备借调管理系统 - 广东石油化工学院</title>
<link type="text/css" rel="stylesheet" href="public/styles/reset.css">
<link type="text/css" rel="stylesheet" href="public/styles/main.css">
<!--[if IE 6]>
<script type="text/javascript" src="public/scripts/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="public/scripts/ie6Fixpng.js"></script>
<![endif]-->

</head>
<body>
<div class="headerBar">
	<div class="logoBar login_logo">
		<div class="comWidth">
			<div class="logo fl">
				<a href="#"><img src="public/images/logo.png" alt="实验室仪器设备借调管理系统"></a>
			</div>
			<h3 class="welcome_title">实验室仪器设备借调管理系统</h3>
		</div>
	</div>
</div>

<script language="javascript">	
function isStudent() 
{ 
var patrn=/^[0-9]{1,3}/; 
var s = myform.username.value;
if (!patrn.exec(s)) myform.histype[0].checked = true;
else myform.histype[1].checked = true;
} 
</script>

<div class="loginBox">
	<div class="login_cont">
	<form name="myform" action="doLogin.php" method="post">
			<ul class="login">
				<li class="l_tit">帐号</li>
				<li class="mb_10"><input type="text" name="username" placeholder="请输入帐号"class="login_input user_icon" onChange="isStudent()"></li>
				<li class="l_tit">密码</li>
				<li class="mb_10"><input type="password" name="password" class="login_input password_icon"></li>
				<li class="l_tit">验证码</li>
				<li><input type="text" name="verify" class="login_input_verify password_icon"></li>
				<img class="login_verify" src="getVerify.php" alt="" />
				<li class="autoLogin">
				<input name="histype" type="radio" value="teacher" checked id="a1" class="checked" /><label for="a1">教师</label>
				<input name="histype" type="radio" value="student" id="a1" class="checked" /><label for="a1">学生</label>
				<!--
				<div class="checkautologin">
				<input type="checkbox" id="a1" class="checked" name="autoFlag" value="1"><label for="a1">自动登陆(一周内自动登陆)</label>
				</div>
				-->
				</li>
				<li><input type="submit" value="登录系统" class="login_btn"></li>
			</ul>
		</form>
	</div>
</div>

<div class="footer">© 2016 广东石油化工学院 - 计算机与电子信息学院</div>

</body>
</html>
