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
			<input type="button" value="列&nbsp;&nbsp;表" class="add" onclick="listLab()">
		</div>
	</div>
	<!--表格-->
	<form action="doAdminAction.php?act=addLab" method="post">
	<table  class="table" cellspacing="0" cellpadding="0">
		<tr>
			<td align="right" width="160px">实验室名称</td>
			<td><input type="text" name="labname" placeholder="请输入实验室名称" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">负责人</td>
			<td><input type="text" name="labuser" placeholder="请输入负责人" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">实验室地址</td>
			<td><input type="text" name="labaddress" placeholder="请输入实验室地址" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">实验室联系方式</td>
			<td><input type="text" name="labphone" placeholder="实验室联系方式" /></td>
		</tr>
		<tr>
			<td align="right" width="160px">简介</td>
			<td><textarea name="labdesc" style="width:100%;height:150px;" placeholder="请输入实验室简介" required></textarea></td>
		</tr>
		<tr>
			<td align="right" width="160px"></td>
			<td colspan="2"><input type="submit" class="btn" value="添加实验室"/></td>
		</tr>
	</table>
	</form>
</div>
<script type="text/javascript">
	function listLab(){
		window.location="listLab.php";	
	}
</script>
</body>
</html>