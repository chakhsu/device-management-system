<?php 
require_once '../include.php';
checkLogined();
$id=$_REQUEST['id'];
$cateInfo=getCateById($id);
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
                            <input type="button" value="列&nbsp;&nbsp;表" class="add" onclick="listCate()">
                        </div>
                    </div>
                    <!--表格-->
					<form>
					<table class="table" cellspacing="0" cellpadding="0">
						<tr>
							<td align="right" width="160px">分类ID</td>
							<td><?php echo $cateInfo['id'];?></td>
						</tr>
						<tr>
							<td align="right" width="160px">分类名称</td>
							<td><?php echo $cateInfo['catname'];?></td>
						</tr>
						<tr>
							<td align="right" width="160px">分类说明</td>
							<td><?php echo $cateInfo['catdesc'];?></td>
						</tr>
					</table>
					</form>
</div>
<script type="text/javascript">
	function listCate(){
		window.location="listCate.php";	
	}
</script>
</body>
</html>