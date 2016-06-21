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
                            <input type="button" value="列&nbsp;&nbsp;表" class="add" onclick="listCate()">
                        </div>
                    </div>
                    <!--表格-->
					<form action="doAdminAction.php?act=addCate" method="post">
					<table  class="table" cellspacing="0" cellpadding="0">
						<tr>
							<td align="right" width="160px">分类名称</td>
							<td><input type="text" name="catname" placeholder="请输入分类名称" required/></td>
						</tr>
						<tr>
							<td align="right" width="160px">分类说明</td>
							<td><textarea name="catdesc" style="width:100%;height:150px;" placeholder="请输入分类说明" required></textarea></td>
						</tr>
						<tr>
							<td align="right" width="160px"></td>
							<td colspan="2"><input type="submit" class="btn" value="添加分类"/></td>
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