<?php 
require_once '../include.php';
checkLogined();
$rows=getAllRole();
if(!$rows){
	alertMes("没有相应身份，请先添加身份。", "addRole.php");
}
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
			<input type="button" value="列&nbsp;&nbsp;表" class="add" onclick="listUser()">
		</div>
	</div>
	<!--表格-->
	<form action="doAdminAction.php?act=addUser" method="post" enctype="multipart/form-data">
		<table class="table" cellspacing="0" cellpadding="0">
			<tr>
				<td align="right" width="160px">用户名</td>
				<td><input type="text" name="username" placeholder="请输入用户名" size="50" required/>
				</tr>
			<tr>
				<td align="right" width="160px">密码</td>
				<td><input type="password" name="password" placeholder="******" size="50" required/></td>
			</tr>
			<tr>
				<td align="right" width="160px">姓名</td>
				<td><input type="text" name="nickname" placeholder="如：张三" size="50" required/></td>
			</tr>
			<tr>
				<td align="right" width="160px">身份</td>
				<td>
				<div class="bui_select">
					<select name="role_id" width="160px" class="select">
						<?php foreach($rows as $row):?>
							<option value="<?php echo $row['id'];?>"><?php echo $row['rolename'];?></option>
						<?php endforeach;?>
					</select>
				</div>
				</td>
			</tr>
			<tr>
				<td align="right" width="160px">身份编号</td>
				<td><input type="text" name="rolenum" placeholder="如：身份是学生则需要填写学号，教师则需要填写教师编号" size="50" required/></td>
			</tr>
			<tr>
				<td align="right" width="160px">学院</td>
				<td><input type="text" name="academy" placeholder="如：计算机与电子信息学院" size="50" required/></td>
			</tr>
			<tr>
				<td align="right" width="160px">邮箱</td>
				<td><input type="text" name="email" placeholder="请输入用户邮箱" size="50" required/></td>
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
				<td><textarea name="info" style="width:100%;height:150px;" placeholder="请输入更多个人信息，例如，身份是学生可以输入专业和班别，有利于提高设备申请的几率。" required></textarea></td>
			</tr>
			<tr>
				<td align="right" width="160px"></td>
				<td colspan="2"><input type="submit" class="btn" value="提&nbsp;&nbsp;交"/></td>
			</tr>
		</table>
	</form>
</div>
<script type="text/javascript">
	function listUser(){
		window.location="listUser.php";	
	}
</script>
</body>
</html>