<?php 
/**
 * 检查管理员是否存在
 * @param unknown_type $sql
 * @return Ambigous <multitype:, multitype:>
 */
function checkAdmin($sql){
	return fetchOne($sql);
}
/**
 * 检测是否有管理员登陆.
 */
function checkLogined(){
	if($_SESSION['adminId']==""&&$_COOKIE['adminId']==""){
		alertMes("请先登陆","../index.php");
	}
}
/**
 * 添加管理员
 * @return string
 */
function addAdmin(){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	if(insert("dev_admin",$arr)){
		$mes="添加成功!<br/><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
	}else{
		$mes="添加失败!<br/><a href='addAdmin.php'>重新添加</a>";
	}
	return $mes;
}
/**
 * 得到所有的管理员
 * @return array
 */
function getAllAdmin(){
	$sql="select id,username,nickname,email,qq,phonenum,shortnum,info from dev_admin ";
	$rows=fetchAll($sql);
	return $rows;
}
function getAdminByPage($page,$pageSize=2){
	$sql="select * from dev_admin";
	global $totalRows;
	$totalRows=getResultNum($sql);
	global $totalPage;
	$totalPage=ceil($totalRows/$pageSize);
	if($page<1||$page==null||!is_numeric($page)){
		$page=1;
	}
	if($page>=$totalPage)$page=$totalPage;
	$offset=($page-1)*$pageSize;
	$sql="select id,username,nickname,email,qq,phonenum,shortnum,info from dev_admin limit {$offset},{$pageSize}";
	$rows=fetchAll($sql);
	return $rows;
}
/**
 * 编辑管理员
 * @param int $id
 * @return string
 */
function editAdmin($id){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	if(update("dev_admin", $arr,"id={$id}")){
		$mes="编辑成功!<br/><a href='listAdmin.php'>查看管理员列表</a>";
	}else{
		$mes="编辑失败!<br/><a href='listAdmin.php'>请重新修改</a>";
	}
	return $mes;
}
/**
 * 删除管理员的操作
 * @param int $id
 * @return string
 */
function delAdmin($id){
	if(delete("dev_admin","id={$id}")){
		$mes="删除成功!<br/><a href='listAdmin.php'>查看管理员列表</a>";
	}else{
		$mes="删除失败!<br/><a href='listAdmin.php'>请重新删除</a>";
	}
	return $mes;
}

/**
 * 根据id得到管理员的详细信息
 * @param int $id
 * @return array
 */
function getAdminById($id){
		$sql="select id,username,password,nickname,email,qq,phonenum,shortnum,info from dev_admin where id='{$id}'";
		$row=fetchOne($sql);
		return $row;
}

/**
 * 注销管理员
 */
function logout(){
	$_SESSION=array();
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),"",time()-1);
	}
	if(isset($_COOKIE['adminId'])){
		setcookie("adminId","",time()-1);
	}
	if(isset($_COOKIE['adminName'])){
		setcookie("adminName","",time()-1);
	}
	session_destroy();
	header("location:../index.php");
}
/**
 * 添加用户的操作
 * @param int $id
 * @return string
 */
function addUser(){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	$arr['regTime']=time();
	if(insert("dev_user", $arr)){
		$mes="添加成功!<br/><a href='addUser.php'>继续添加</a>|<a href='listUser.php'>查看列表</a>";
	}else{
		$mes="添加失败!<br/><a href='arrUser.php'>重新添加</a>|<a href='listUser.php'>查看列表</a>";
	}
	return $mes;
}
/**
 * 删除用户的操作
 * @param int $id
 * @return string
 */
function delUser($id){
	if(delete("dev_user","id={$id}")){
		$mes="删除成功!<br/><a href='listUser.php'>查看用户列表</a>";
	}else{
		$mes="删除失败!<br/><a href='listUser.php'>请重新删除</a>";
	}
	return $mes;
}
/**
 * 编辑用户的操作
 * @param int $id
 * @return string
 */
function editUser($id){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	if(update("dev_user", $arr,"id={$id}")){
		$mes="编辑成功!<br/><a href='listUser.php'>查看用户列表</a>";
	}else{
		$mes="编辑失败!<br/><a href='listUser.php'>请重新修改</a>";
	}
	return $mes;
}

/**
 * 根据id得到用户的详细信息
 * @param int $id
 * @return array
 */
function getUserById($id){
		$sql="select u.id,u.username,u.password,u.nickname,u.role_id,u.rolenum,u.academy,u.email,u.qq,u.phonenum,u.shortnum,u.info,r.rolename from dev_user as u join dev_role r on u.role_id=r.id where u.id='{$id}'";
		$row=fetchOne($sql);
		return $row;
}