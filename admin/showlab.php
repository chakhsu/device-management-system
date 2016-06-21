<?php 
require_once '../include.php';
checkLogined();
$id=$_REQUEST['id'];
$labInfo=getLabById($id);
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
					<form>
					<table class="table" cellspacing="0" cellpadding="0">
						<tr>
							<td align="right" width="160px">实验室ID</td>
							<td><?php echo $labInfo['id'];?></td>
						</tr>
						<tr>
							<td align="right" width="160px">实验室名称</td>
							<td><?php echo $labInfo['labname'];?></td>
						</tr>
						<tr>
							<td align="right" width="160px">负责人</td>
							<td><?php echo $labInfo['labuser'];?></td>
						</tr>
						<tr>
							<td align="right" width="160px">实验室地址</td>
							<td><?php echo $labInfo['labaddress'];?></td>
						</tr>
						<tr>
							<td align="right" width="160px">实验室联系方式</td>
							<td><?php echo $labInfo['labphone'];?></td>
						</tr>
						<tr>
							<td align="right" width="160px">简介</td>
							<td><?php echo $labInfo['labdesc'];?></td>
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