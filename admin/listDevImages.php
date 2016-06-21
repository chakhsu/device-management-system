<?php 
require_once '../include.php';
checkLogined();
$sql="select * from dev_device";
$totalRows=getResultNum($sql);
$pageSize=10;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$rows=getDevInfo();
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
			<input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addDev()">
		</div>
	</div>
	<!--表格-->
	<table class="table" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th width="5%">编号</th>
				<th width="15%">设备名称</th>
				<th>设备图片</th>
				<th width="25%">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($rows as $row):?>
			<tr>
				<!--这里的id和for里面的c1 需要循环出来-->
				<td><input type="checkbox" id="c<?php echo $row['id'];?>" class="check" value=<?php echo $row['id'];?>><label for="c1" class="label"><?php echo $row['id'];?></label></td>	
				<td><?php echo $row['devname']; ?></td>
				<td>
				<?php 
				$devImgs=getAllImgByDevId($row['id']);
				foreach($devImgs as $img):
				?>
				<img width="auto" height="100" src="../uploads/<?php echo $img['albumPath'];?>" alt=""/>&nbsp;&nbsp;
				<?php endforeach;?>
				</td>
				<td>
					<input type="button" value="添加文字水印" onclick="doImg('<?php echo $row['id'];?>','waterText')" class="btn"/>
					<input type="button" value="添加图片水印" onclick="doImg('<?php echo $row['id'];?>','waterPic')" class="btn"/>
				</td>
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
 <script type="text/javascript">
function addDev(){
	window.location="addDev.php";	
}
function doImg(id,act){
	window.location="doAdminAction.php?act="+act+"&id="+id;
}
 </script>
</body>
</html>