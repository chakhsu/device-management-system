<?php 
require_once '../include.php';
checkLogined();
$order=$_REQUEST['order']?$_REQUEST['order']:null;
$orderBy=$order?"order by d.".$order:null;
$keywords=$_REQUEST['keywords']?$_REQUEST['keywords']:null;
$where=$keywords?"where d.devname like '%{$keywords}%'":null;
//得到数据库中所有设备
$sql="select * from dev_device";
$totalRows=getResultNum($sql);
$pageSize=10;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select d.id,d.devname,d.version,d.cat_id,d.lab_id,d.sumnum,d.borrownum,d.adduser,d.addtime,d.devdesc,c.catname,l.labname from dev_device as d join dev_cate c on d.cat_id=c.id inner join dev_lab l on d.lab_id=l.id {$where} {$orderBy} limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Insert title here</title>
<link rel="stylesheet" href="../public/styles/backstage.css">
</head>
<body>
</div>
<div class="details">
	<div class="details_operation clearfix">
		<div class="bui_select">
			<input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addDev()">
		</div>
		<div class="bui_select">
			<input type="button" value="借&nbsp;&nbsp;用" class="add" onclick="listRecord()">
		</div>
		<div class="fr">
			<div class="text">
				<span>设备数量：</span>
				<div class="bui_select">
					<select id="" class="select" onchange="change(this.value)">
						<option>-请选择-</option>
						<option value="sumnum asc" >由低到高</option>
						<option value="sumnum desc">由高到底</option>
					</select>
				</div>
			</div>
			<div class="text">
				<span>发布时间：</span>
				<div class="bui_select">
				 <select id="" class="select" onchange="change(this.value)">
					<option>-请选择-</option>
						<option value="addtime desc" >最新发布</option>
						<option value="addtime asc">历史发布</option>
					</select>
				</div>
			</div>
			<div class="text">
				<span>搜索</span>
				<input type="text" value="" class="search"  id="search" onkeypress="search()" >
			</div>
		</div>
	</div>
	<!--表格-->
	<table class="table" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th width="6%">编号</th>
				<th width="15%">设备名称</th>
				<th width="10%">设备型号</th>
				<th width="10%">设备分类</th>
				<th width="10%">所属实验室</th>
				<th width="6%">总数量</th>
				<th width="14%">发布时间</th>
				<th width="6%">添加人</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($rows as $row):?>
			<tr>
				<!--这里的id和for里面的c1 需要循环出来-->
				<td><input type="checkbox" id="c<?php echo $row['id'];?>" class="check" value=<?php echo $row['id'];?>><label for="c1" class="label"><?php echo $row['id'];?></label></td>
				<td><?php echo $row['devname']; ?></td>
				<td><?php echo $row['version'];?></td>
				<td><?php echo $row['catname'];?></td>
				<td><?php echo $row['labname'];?></td>
				<td><?php echo $row['sumnum'];?></td>
				<td><?php echo date("Y-m-d H:i:s",$row['addtime']);?></td>
				<td><?php echo $row['adduser'];?></td>
				<td align="center">
					<input type="button" value="详情" class="btn" onclick="showDev(<?php echo $row['id'];?>)"><input type="button" value="修改" class="btn" onclick="editDev(<?php echo $row['id'];?>)"><input type="button" value="删除" class="btn"onclick="delDev(<?php echo $row['id'];?>)">
				</td>
			</tr>
			<?php endforeach;?>
			<?php if($totalRows>$pageSize):?>
			<tr>
				<td colspan="9"><?php echo showPage($page, $totalPage,"keywords={$keywords}&order={$order}");?></td>
			</tr>
			<?php endif;?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
function addDev(){
	window.location='addDev.php';
}
function listRecord(){
	window.location='listRecord.php';
}
function showDev(id){
	window.location='showDev.php?id='+id;
}
function editDev(id){
	window.location='editDev.php?id='+id;
}
function delDev(id){
	if(window.confirm("您确定要删除吗？删除之后是不能恢复。")){
		window.location="doAdminAction.php?act=delDev&id="+id;
	}
}
function search(){
	if(event.keyCode==13){
		var val=document.getElementById("search").value;
		window.location="listDev.php?keywords="+val;
	}
}
function change(val){
	window.location="listDev.php?order="+val;
}
</script>
</body>
</html>