<?php 
require_once '../include.php';
if(isset($_SESSION['adminId'])){
	$id=$_SESSION['adminId'];
}elseif(isset($_COOKIE['adminId'])){
	$id=$_COOKIE['adminId'];
}
$sql="select id,username,password,nickname,email,qq,phonenum,shortnum,info from dev_admin where id='{$id}'";
$row=fetchOne($sql);
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
			<input type="button" value="个人资料" class="add" onclick="profile()">
		</div>
	</div>
	<!--表格-->
	<form action="doAdminAction.php?act=editAdmin&id=<?php echo $id;?>" method="post">
	<table class="table" cellspacing="0" cellpadding="0">
		<tr>
			<td align="right" width="160px">管理员账号</td>
			<td><input type="text" name="username" value="<?php echo $row['username'];?>" size="50" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">管理员密码</td>
			<td><input type="password" name="password"  placeholder="******" size="50" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">姓名</td>
			<td><input type="text" name="nickname" value="<?php echo $row['nickname'];?>" size="50" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">邮箱</td>
			<td><input type="text" name="email" value="<?php echo $row['email'];?>" size="50" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">QQ号码</td>
			<td><input type="text" name="qq" value="<?php echo $row['qq'];?>" size="50" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">手机号码</td>
			<td><input type="text" name="phonenum" value="<?php echo $row['phonenum'];?>" size="50" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">校园短号</td>
			<td><input type="text" name="shortnum" value="<?php echo $row['shortnum'];?>" size="50" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">其他说明</td>
			<td><textarea name="info" style="width:100%;height:150px;" required><?php echo $row['info'];?></textarea></td>
		</tr>
		<tr>
			<td align="right" width="160px"></td>
			<td colspan="2"><input type="submit" class="btn" value="更新"/></td>
		</tr>

	</table>
	</form>
</div>
<script type="text/javascript">
	function profile(){
		window.location="profile.php";	
	}
</script>
</body>
</html>