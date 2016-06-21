<?php 
require_once '../include.php';
checkLogined();
$rows=getAllRole();
if(!$rows){
	alertMes("没有相应身份，请先添加身份。", "addRole.php");
}
$id=$_REQUEST['id'];
$adminInfo=getAdminById($id);
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
					<form>
					<table class="table" cellspacing="0" cellpadding="0">
						<tr>
							<td align="right" width="160px">编号ID</td>
							<td><?php echo $adminInfo['id'];?></td>
						</tr>
						<tr>
							<td align="right" width="160px">用户名</td>
							<td><?php echo $adminInfo['username'];?></td>
						</tr>
						<tr>
							<td align="right" width="160px">姓名</td>
							<td><?php echo $adminInfo['nickname'];?></td>
						</tr>
						<tr>
						<tr>
							<td align="right" width="160px">邮箱</td>
							<td><?php echo $adminInfo['email'];?></td>
						</tr>
						<tr>
							<td align="right" width="160px">QQ号码</td>
							<td><?php echo $adminInfo['qq'];?></td>
						</tr>
						<tr>
							<td align="right" width="160px">手机号码</td>
							<td><?php echo $adminInfo['phonenum'];?></td>
						</tr>
						<tr>
							<td align="right" width="160px">校园短号</td>
							<td><?php echo $adminInfo['shortnum'];?></td>
						</tr>
						<tr>
							<td align="right" width="160px">其他说明</td>
							<td><?php echo $adminInfo['info'];?></td>
						</tr>
					</table>
					</form>
<script type="text/javascript">
	function listAdmin(){
		window.location="listAdmin.php";	
	}
</script>
</body>
</html>