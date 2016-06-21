<?php 
require_once '../include.php';
//$sql="select u.id,u.username,u.password,u.nickname,u.role_id,u.rolenum,u.academy,u.email,u.qq,u.phonenum,u.shortnum,u.info,r.id,r.rolename from dev_user as u join dev_role r on u.role_id=r.id where u.id='{$id}'";
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
					<form action="doAdminAction.php?act=editUser&id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
					<table class="table" cellspacing="0" cellpadding="0">
						<tr>
							<td align="right" width="160px">用户名</td>
							<td><input type="text" name="username" value="<?php echo $userInfo['username'];?>" size="50" required/>
							</tr>
						<tr>
							<td align="right" width="160px">密码</td>
							<td><input type="password" name="password" placeholder="******" size="50" /></td>
						</tr>
						<tr>
							<td align="right" width="160px">姓名</td>
							<td><input type="text" name="nickname" value="<?php echo $userInfo['nickname'];?>" size="50" required/></td>
						</tr>
						<tr>
							<td align="right" width="160px">身份</td>
							<td>
							<div class="bui_select">
								<select name="role_id" width="160px" class="select">
									<?php foreach($rows as $row):?>
										<option value="<?php echo $row['id'];?>" <?php echo $row['id']==$proInfo['role_id']?"selected='selected'":null;?>><?php echo $row['rolename'];?></option>
									<?php endforeach;?>
								</select>
							</div>
							</td>
						</tr>
						<tr>
							<td align="right" width="160px">身份编号</td>
							<td><input type="text" name="rolenum" value="<?php echo $userInfo['rolenum'];?>" size="50" required/></td>
						</tr>
						<tr>
							<td align="right" width="160px">学院</td>
							<td><input type="text" name="academy" value="<?php echo $userInfo['academy'];?>" size="50" required/></td>
						</tr>
						<tr>
							<td align="right" width="160px">邮箱</td>
							<td><input type="text" name="email" value="<?php echo $userInfo['email'];?>" size="50" required/></td>
						</tr>
						<tr>
							<td align="right" width="160px">QQ号码</td>
							<td><input type="text" name="qq" value="<?php echo $userInfo['qq'];?>" size="50" required/></td>
						</tr>
						<tr>
							<td align="right" width="160px">手机号码</td>
							<td><input type="text" name="phonenum" value="<?php echo $userInfo['phonenum'];?>" size="50" required/></td>
						</tr>
						<tr>
							<td align="right" width="160px">校园短号</td>
							<td><input type="text" name="shortnum" value="<?php echo $userInfo['shortnum'];?>" size="50" /></td>
						</tr>
						<tr>
							<td align="right" width="160px">其他说明</td>
							<td><textarea name="info" style="width:100%;height:150px;" required><?php echo $userInfo['info'];?></textarea></td>
						</tr>
						<tr>
							<td align="right" width="160px"></td>
							<td colspan="2"><input type="submit" class="btn" value="编辑用户"/></td>
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