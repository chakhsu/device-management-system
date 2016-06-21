<?php 
require_once '../include.php';
checkLogined();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" href="../public/styles/backstage.css">
</head>
<body>
<div class="details">
	<div class="details_operation clearfix">
		<div class="bui_select">
			<input type="button" value="列&nbsp;&nbsp;表" class="add" onclick="listAdmin()">
		</div>
	</div>
	<!--表格-->
	<form action="doAdminAction.php?act=addAdmin" method="post">
	<table class="table" cellspacing="0" cellpadding="0">
		<tr>
			<td align="right" width="160px">管理员账号</td>
			<td><input type="text" name="username" placeholder="请输入管理员账号"  size="50" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">管理员密码</td>
			<td><input type="password" name="password" placeholder="******" size="50" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">姓名</td>
			<td><input type="text" name="nickname" placeholder="如：张三" size="50" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">邮箱</td>
			<td><input type="text" name="email" placeholder="请输入管理员邮箱" size="50" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">QQ号码</td>
			<td><input type="text" name="qq" placeholder="请输入QQ号码" size="50" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">手机号码</td>
			<td><input type="text" name="phonenum" placeholder="请输入手机号码" size="50" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">校园短号</td>
			<td><input type="text" name="shortnum" placeholder="请输入校园短号" size="50" /></td>
		</tr>
		<tr>
			<td align="right" width="160px">其他说明</td>
			<td><textarea name="info" style="width:100%;height:150px;" placeholder="请输入更多个人信息..." required></textarea></td>
		</tr>
		<tr>
			<td align="right" width="160px"></td>
			<td colspan="2"><input type="submit" class="btn" value="提&nbsp;&nbsp;交"/></td>
		</tr>					
	</table>
	</form>
</div>
<script type="text/javascript">
	function listAdmin(){
		window.location="listAdmin.php";	
	}
</script>
</body>
</html>