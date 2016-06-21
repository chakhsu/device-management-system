<?php 
require_once '../include.php';
checkLogined();
$id=$_REQUEST['id'];
$devInfo=getDevById($id);
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
			<input type="button" value="列&nbsp;&nbsp;表" class="add" onclick="listRecord()">
		</div>
	</div>
	<form>
	<table  class="table" cellspacing="0" cellpadding="0">
		<tr>
			<td width="160px" align="right">设备名称</td>
			<td><?php echo $devInfo['devname'];?></td>
		</tr>
		<tr>
			<td align="right"  width="160px">设备型号</td>
			<td><?php echo $devInfo['version'];?></td>
		</tr>
		<tr>
			<td align="right"  width="160px">设备目前剩余数量</td>
			<td><?php echo $devInfo['sumnum'] - $devInfo['borrownum'];?></td>
		</tr>
	</table>
	</form><br>
	<form action="doAdminAction.php?act=addRecord" method="post">
	<table  class="table" cellspacing="0" cellpadding="0">
		<tr>
			<td align="right" width="160px">设备ID</td>
			<td><input type="text" name="dev_id" value="<?php echo $id ?>" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">申请人用户名</td>
			<td><input type="text" name="recordname" value="<?php if(isset($_SESSION['adminName'])){echo $_SESSION['adminName'];}elseif(isset($_COOKIE['adminName'])){echo $_COOKIE['adminName'];} ?>" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">申请人姓名</td>
			<td><input type="text" name="recordnickname" value="<?php if(isset($_SESSION['adminNickName'])){echo $_SESSION['adminNickName'];}elseif(isset($_COOKIE['adminNickName'])){echo $_COOKIE['adminNickName'];} ?>" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">申请借用数量</td>
			<td><input type="text" name="dev_num" placeholder="不用大于剩余数量" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">申请时间</td>
			<td><input type="date" name="borrow_time" value="" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">预计归还时间</td>
			<td><input type="date" name="remand_time" value="" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">其他说明</td>
			<td><textarea name="recorddesc" style="width:100%;height:150px;" placeholder="请输入借用申请设备说明" required></textarea></td>
		</tr>
		<tr>
			<td align="right" width="160px"></td>
			<td colspan="2"><input type="submit" class="btn" value="提交"/></td>
		</tr>
	</table>
	</form>
</div>
<script type="text/javascript">
	function listRecord(){
		window.location="listRecord.php";	
	}
</script>
</body>
</html>