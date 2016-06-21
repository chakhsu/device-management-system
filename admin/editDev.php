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
	<form action="doAdminAction.php?act=editDev&id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
	<table class="table" cellspacing="0" cellpadding="0">
		<tr>
			<td align="right" width="160px" >设备名称</td>
			<td><input type="text" name="devname" size="50" value="<?php echo $devInfo['devname'];?>" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px" >设备名称</td>
			<td><input type="text" name="version" size="50" value="<?php echo $devInfo['version'];?>" required/></td>
		</tr>
		<tr>
			<td align="right"  width="160px">设备分类</td>
			<td>
			<div class="bui_select">
			<select name="cat_id" class="select">
				<?php foreach($cats as $row):?>
					<option value="<?php echo $row['id'];?>" <?php echo $row['id']==$devInfo['cat_id']?"selected='selected'":null;?>><?php echo $row['catname'];?></option>
				<?php endforeach;?>
			</select>
			</div>
			</td>
		</tr>
		<tr>
			<td align="right" width="160px">所属实验室</td>
			<td>
			<div class="bui_select">
				<select name="lab_id" width="160px" class="select">
					<?php foreach($labs as $row):?>
						<option value="<?php echo $row['id'];?>" <?php echo $row['id']==$devInfo['lab_id']?"selected='selected'":null;?>><?php echo $row['labname'];?></option>
					<?php endforeach;?>
				</select>
			</div>
			</td>
		</tr>
		<tr>
			<td align="right" width="160px">总数量</td>
			<td><input type="text" name="sumnum"  value="<?php echo $devInfo['sumnum'];?>" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">已借出数量</td>
			<td><input type="text" name="borrownum"  value="<?php echo $devInfo['borrownum'];?>"/></td>
		</tr>
		<tr>
			<td align="right" width="160px">添加人</td>
			<td><input type="text" name="adduser"  value="<?php echo $devInfo['adduser'];?>" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">设备描述</td>
			<td>
				<textarea name="devdesc" id="editor_id" style="width:100%;height:150px;"><?php echo $devInfo['devdesc'];?></textarea>
			</td>
		</tr>
		<tr>
			<td align="right" width="160px"></td>
			<td colspan="2"><input type="submit" class="btn" value="编辑设备"/></td>
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