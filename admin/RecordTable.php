<?php 
require_once '../include.php';
checkLogined();
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$sql="select * from dev_record";
$totalRows=getResultNum($sql);
$pageSize=10;
$totalPage=ceil($totalRows/$pageSize);
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select id,dev_id,recordname,recordname,dev_num,borrow_time,remand_time,recorddesc,recordstatus from dev_lab order by id asc limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
if(!$rows){
	alertMes("sorry,没有实验室,请添加!","addLab.php");
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
                            <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addLab()">
                        </div>
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="5%">编号</th>
                                <th width="15%">实验室</th>
								<th width="55%">简介</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($rows as $row):?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $row['id'];?></label></td>
                                <td><?php echo $row['labname'];?></td>
								<td><?php echo $row['labdesc'];?></td>
                                <td align="center"><input type="button" value="详细" class="btn" onclick="showLab(<?php echo $row['id'];?>)"><input type="button" value="修改" class="btn" onclick="editLab(<?php echo $row['id'];?>)"><input type="button" value="删除" class="btn"  onclick="delLab(<?php echo $row['id'];?>)"></td>
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
	function editLab(id){
		window.location="editLab.php?id="+id;
	}
	function showLab(id){
		window.location="showLab.php?id="+id;
	}
	function delLab(id){
		if(window.confirm("您确定要删除吗？删除之后是不能恢复。")){
			window.location="doAdminAction.php?act=delLab&id="+id;
		}
	}
	function addLab(){
		window.location="addLab.php";
	}
</script>
</body>
</html>