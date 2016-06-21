<?php 
require_once '../include.php';
//$sql="select u.id,u.username,u.password,u.nickname,u.role_id,u.rolenum,u.academy,u.email,u.qq,u.phonenum,u.shortnum,u.info,r.rolename from dev_user as u join dev_role r on u.role_id=r.id where u.id='{$id}'";
checkLogined();
$rows=getAllRole();
if(!$rows){
	alertMes("没有相应身份，请先添加身份。", "addRole.php");
}
$id=$_REQUEST['id'];
$userInfo=getUserById($id);
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
					<form>
					<table class="table" cellspacing="0" cellpadding="0">
						<tr>
							<td align="right" width="160px">编号ID</td>
							<td><?php echo $userInfo['id'];?></td>
						</tr>
						<tr>
							<td align="right" width="160px">用户名</td>
							<td><?php echo $userInfo['username'];?></td>
						</tr>
						<tr>
							<td align="right" width="160px">姓名</td>
							<td><?php echo $userInfo['nickname'];?></td>
						</tr>
						<tr>
							<td align="right" width="160px">身份</td>
							<td><?php echo $userInfo['rolename'];?></td>
						</tr>
						<tr>
							<td align="right" width="160px">身份编号</td>
							<td><?php echo $userInfo['rolenum'];?></td>
						</tr>
						<tr>
							<td align="right" width="160px">学院</td>
							<td><?php echo $userInfo['academy'];?></td>
						</tr>
						<tr>
							<td align="right" width="160px">邮箱</td>
							<td><?php echo $userInfo['email'];?></td>
						</tr>
						<tr>
							<td align="right" width="160px">QQ号码</td>
							<td><?php echo $userInfo['qq'];?></td>
						</tr>
						<tr>
							<td align="right" width="160px">手机号码</td>
							<td><?php echo $userInfo['phonenum'];?></td>
						</tr>
						<tr>
							<td align="right" width="160px">校园短号</td>
							<td><?php echo $userInfo['shortnum'];?></td>
						</tr>
						<tr>
							<td align="right" width="160px">其他说明</td>
							<td><?php echo $userInfo['info'];?></td>
						</tr>
					</table>
					</form>
<script type="text/javascript">
	function listUser(){
		window.location="listUser.php";	
	}
</script>
</body>
</html>