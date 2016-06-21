<?php 
require_once '../include.php';
checkLogined();
$cats=getAllCate();
$labs=getAllLab();
if(!$cats){
	alertMes("没有相应分类，请先添加分类!!", "addCate.php");
}
if(!$labs){
	alertMes("没有相应实验室，请先添加实验室!!", "addLab.php");
}
$id=$_REQUEST['id'];
$devInfo=getDevById($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<title>Insert title here</title>
<link rel="stylesheet" href="../public/styles/backstage.css">
</head>
<body>
<div class="details">
	<div class="details_operation clearfix">
		<div class="bui_select">
			<input type="button" value="列&nbsp;&nbsp;表" class="add" onclick="listDev()">
		</div>
	</div>
	<!--表格-->
	<form>
	<table class="table" cellspacing="0" cellpadding="0">
			<tr>
				<td width="20%" align="right">设备名称</td>
				<td><?php echo $devInfo['devname'];?></td>
			</tr>
			<tr>
				<td align="right"  width="160px">设备型号</td>
				<td><?php echo $devInfo['version'];?></td>
			</tr>
			<tr>
				<td align="right"  width="160px">设备分类</td>
				<td><?php echo $devInfo['catname'];?></td>
			</tr>
			<tr>
				<td align="right"  width="160px">所属实验室</td>
				<td><?php echo $devInfo['labname'];?></td>
			</tr>
			<tr>
				<td  align="right"  width="160px">添加人</td>
				<td><?php echo $devInfo['adduser'];?></td>
			</tr>
			<tr>
				<td  align="right"  width="160px">发布时间</td>
				<td><?php echo date("Y-m-d H:i:s",$devInfo['addtime'])?></td>
			</tr>
			<tr>
				<td  align="right"  width="160px">总数量</td>
				<td><?php echo $devInfo['sumnum'];?></td>
			</tr>
			<tr>
				<td  align="right"  width="160px">已借出数量</td>
				<td><?php echo $devInfo['borrownum'];?></td>
			</tr>
			<tr>
				<td align="right"  width="160px">设备图片</td>
				<td>
				<?php 
				$devImgs=getAllImgByDevId($devInfo['id']);
				foreach($devImgs as $img):
				?>
				<img width="auto" height="100" src="../uploads/<?php echo $img['albumPath'];?>" alt=""/> &nbsp;&nbsp;
				<?php endforeach;?>
				</td>
			</tr>
			<tr>
				<td align="right"  width="160px">设备描述</td>
				<td>
					<?php echo $devInfo['devdesc'];?>
				</td>
			</tr>
		</table>
	</form>
</div>
<script type="text/javascript">
	function listDev(){
		window.location="listDev.php";	
	}
</script>
</body>
</html>