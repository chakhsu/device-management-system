<?php 
require_once '../include.php';
checkLogined();

$sql="select u.id,u.username,u.nickname,u.role_id,u.academy,u.email,r.rolename from dev_user as u join dev_role r on u.role_id=r.id {$where}  ";
$totalRows=getResultNum($sql);
$pageSize=10;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select u.id,u.username,u.nickname,u.role_id,u.academy,u.email,r.rolename from dev_user as u join dev_role r on u.role_id=r.id {$where} {$orderBy} limit {$offset},{$pageSize}";
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
<div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addUser()">
                        </div>
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="8%">编号</th>
                                <th width="15%">用户名</th>
                                <th width="8%">姓名</th>
                                <th width="8%">身份</th>
								<th width="15%">学院</th>
								<th width="20%">邮箱</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($rows as $row):?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $row['id'];?></label></td>
                                <td><?php echo $row['username'];?></td>
                                <td><?php echo $row['nickname'];?></td>
								<td><?php echo $row['rolename'];?></td>
								<td><?php echo $row['academy'];?></td>
								<td><?php echo $row['email'];?></td>
                                <td align="center"><input type="button" value="详情" class="btn" onclick="showUser(<?php echo $row['id'];?>)"><input type="button" value="修改" class="btn" onclick="editUser(<?php echo $row['id'];?>)"><input type="button" value="删除" class="btn"  onclick="delUser(<?php echo $row['id'];?>)"></td>
                            </tr>
                            <?php endforeach;?>
                            <?php if($totalRows>$pageSize):?>
                            <tr>
                            	<td colspan="6"><?php echo showPage($page, $totalPage);?></td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
</body>
<script type="text/javascript">

	function addUser(){
		window.location="addUser.php";	
	}
	function editUser(id){
			window.location="editUser.php?id="+id;
	}
	function showUser(id){
			window.location="showUser.php?id="+id;
	}
	function delUser(id){
			if(window.confirm("您确定要删除吗？删除之后不可以恢复。")){
				window.location="doAdminAction.php?act=delUser&id="+id;
			}
	}
</script>
</html>