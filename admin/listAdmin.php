<?php 
require_once '../include.php';
checkLogined();
$pageSize=10;
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$rows=getAdminByPage($page,$pageSize);
if(!$rows){
	alertMes("sorry,没有管理员,请添加!","addAdmin.php");
	exit;
}
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
				<input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addAdmin()">
			</div>
				
		</div>
		<!--表格-->
		<table class="table" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th width="10%">编号</th>
					<th width="20%">管理员账号</th>
					<th width="10%">姓名</th>
					<th width="25%">邮箱</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
			<?php  foreach($rows as $row):?>
				<tr>
					<!--这里的id和for里面的c1 需要循环出来-->
					<td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $row['id'];?></label></td>
					<td><?php echo $row['username'];?></td>
					<td><?php echo $row['nickname'];?></td>
					<td><?php echo $row['email'];?></td>
					<td align="center"><input type="button" value="详细" class="btn" onclick="showAdmin(<?php echo $row['id'];?>)"><input type="button" value="修改" class="btn" onclick="editAdmin(<?php echo $row['id'];?>)"><input type="button" value="删除" class="btn"  onclick="delAdmin(<?php echo $row['id'];?>)"></td>
				</tr>
				<?php endforeach;?>
				<?php if($totalRows>$pageSize):?>
				<tr>
					<td colspan="4"><?php echo showPage($page, $totalPage);?></td>
				</tr>
				<?php endif;?>
			</tbody>
		</table>
	</div>
</body>
<script type="text/javascript">
	function addAdmin(){
		window.location="addAdmin.php";	
	}
	function editAdmin(id){
			window.location="editAdmin.php?id="+id;
	}
	function showAdmin(id){
			window.location="showAdmin.php?id="+id;
	}
	function delAdmin(id){
			if(window.confirm("您确定要删除吗？删除之后不可以恢复。")){
				window.location="doAdminAction.php?act=delAdmin&id="+id;
			}
	}
</script>
</html>