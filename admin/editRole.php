<?php 
require_once '../include.php';
checkLogined();
$id=$_REQUEST['id'];
$row=getRoleById($id);
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
                            <input type="button" value="列&nbsp;&nbsp;表" class="add" onclick="listRole()">
                        </div>
                    </div>
                    <!--表格-->
					<form action="doAdminAction.php?act=editRole&id=<?php echo $id;?>" method="post">
					<table class="table" cellspacing="0" cellpadding="0">
						<tr>
							<td align="right" width="160px">身份名称</td>
							<td><input type="text" name="rolename" value="<?php echo $row['rolename'];?>" required/></td>
						</tr>
						<tr>
							<td align="right" width="160px">申请审核权限</td>
							<td>
							<input type="radio" name="record_audit" value="0" <?php echo $row['record_audit']==0?"checked='checked'":null;?>/>无
							<input type="radio" name="record_audit" value="1" <?php echo $row['record_audit']==1?"checked='checked'":null;?>/>有
							</td>
						</tr>
						<tr>
							<td align="right" width="160px">实验室管理权限</td>							
							<td>
							<input type="radio" name="lab_audit" value="0" <?php echo $row['lab_audit']==0?"checked='checked'":null;?>/>无
							<input type="radio" name="lab_audit" value="1" <?php echo $row['lab_audit']==1?"checked='checked'":null;?>/>有
							</td>
						</tr>
						<tr>
							<td align="right" width="160px">设备管理权限</td>
							<td>
							<input type="radio" name="dev_audit" value="0" <?php echo $row['dev_audit']==0?"checked='checked'":null;?>/>无
							<input type="radio" name="dev_audit" value="1" <?php echo $row['dev_audit']==1?"checked='checked'":null;?>/>有
							</td>
						</tr>
						<tr>
							<td align="right" width="160px">用户管理权限</td>
							<td>
							<input type="radio" name="user_audit" value="0" <?php echo $row['user_audit']==0?"checked='checked'":null;?>/>无
							<input type="radio" name="user_audit" value="1" <?php echo $row['user_audit']==1?"checked='checked'":null;?>/>有
							</td>
						</tr>
						<tr>
							<td align="right" width="160px"></td>
							<td colspan="2"><input type="submit" class="btn" value="更新"/></td>
						</tr>

					</table>
					</form>
</div>
<script type="text/javascript">
	function listRole(){
		window.location="listRole.php";	
	}
</script>
</body>
</html>