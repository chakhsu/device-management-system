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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<title>Insert title here</title>
<link rel="stylesheet" href="../public/styles/backstage.css">
<script type="text/javascript" src="../public/scripts/jquery-1.6.4.js"></script>
<script>
        $(document).ready(function(){
        	$("#selectFileBtn").click(function(){
        		$fileField = $('<input type="file" name="thumbs[]"/>');
        		$fileField.hide();
        		$("#attachList").append($fileField);
        		$fileField.trigger("click");
        		$fileField.change(function(){
        		$path = $(this).val();
        		$filename = $path.substring($path.lastIndexOf("\\")+1);
        		$attachItem = $('<div class="attachItem"><div class="right"><a href="#" title="删除图片">删除</a></div></div>');
        		$attachItem.find(".left").html($filename);
        		$("#attachList").append($attachItem);		
        		});
        	});
        	$("#attachList>.attachItem").find('a').live('click',function(obj,i){
        		$(this).parents('.attachItem').prev('input').remove();
        		$(this).parents('.attachItem').remove();
        	});
        });
</script>
</head>
<body>
<div class="details">
	<div class="details_operation clearfix">
		<div class="bui_select">
			<input type="button" value="列&nbsp;&nbsp;表" class="add" onclick="listDev()">
		</div>
	</div>
	<!--表格-->
	<form action="doAdminAction.php?act=addDev" method="post" enctype="multipart/form-data">
	<table class="table" cellspacing="0" cellpadding="0">
		<tr>
			<td align="right" width="160px">设备名称</td>
			<td><input type="text" name="devname"  placeholder="请输入设备名称" size="50" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">设备型号</td>
			<td><input type="text" name="version"  placeholder="请输入设备型号" size="50" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">设备分类</td>
			<td>
			<div class="bui_select">
				<select name="cat_id" width="160px" class="select">
					<?php foreach($cats as $row):?>
						<option value="<?php echo $row['id'];?>"><?php echo $row['catname'];?></option>
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
						<option value="<?php echo $row['id'];?>"><?php echo $row['labname'];?></option>
					<?php endforeach;?>
				</select>
			</div>
			</td>
		</tr>
		<tr>
			<td align="right" width="160px">总数量</td>
			<td><input type="text" name="sumnum"  placeholder="请输入设备总数量" size="50" required/></td>
		</tr>
		<tr>
			<td align="right" width="160px">设备描述</td>
			<td>
				<textarea name="devdesc" style="width:100%;height:150px;" placeholder="在这里输入设备描述"></textarea>
			</td>
		</tr>
		<tr>
			<td align="right" width="160px">设备图像</td>
			<td>
				<a href="javascript:void(0)" id="selectFileBtn" class="btn">添加图片</a>
				<div id="attachList" class="clear"></div>
			</td>
		</tr>
		<tr>
			<td align="right" width="160px"></td>
			<td colspan="2"><input type="submit" class="btn" value="提交"/></td>
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