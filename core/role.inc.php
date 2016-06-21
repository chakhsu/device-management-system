<?php 
/**
 * 添加身份的操作
 * @return string
 */
function addRole(){
	$arr=$_POST;
	if(insert("dev_role",$arr)){
		$mes="身份添加成功!<br/><a href='addRole.php'>继续添加</a>|<a href='listRole.php'>查看身份</a>";
	}else{ 
		$mes="分类添加失败！<br/><a href='addRole.php'>重新添加</a>|<a href='listRole.php'>查看身份</a>";
	}
	return $mes;
}

/**
 * 根据ID得到指定身份信息
 * @param int $id
 * @return array
 */
function getRoleById($id){
	$sql="select id,rolename,record_audit,lab_audit,dev_audit,user_audit from dev_role where id={$id}";
	return fetchOne($sql);
}

/**
 * 修改身份的操作
 * @param string $where
 * @return string
 */
function editRole($where){
	$arr=$_POST;
	if(update("dev_role", $arr,$where)){
		$mes="分类修改成功!<br/><a href='listRole.php'>查看身份</a>";
	}else{
		$mes="分类修改失败!<br/><a href='listRole.php'>重新修改</a>";
	}
	return $mes;
}

/**
 *删除身份
 * @param string $where
 * @return string
 */
function delRole($id){
	$res=checkUserExist($id);
	if(!$res){
		$where="id=".$id;
		if(delete("dev_role",$where)){
			$mes="身份删除成功!<br/><a href='listRole.php'>查看身份</a>|<a href='addRole.php'>添加身份</a>";
		}else{
			$mes="删除失败！<br/><a href='listRole.php'>请重新操作</a>";
		}
		return $mes;
	}else{
		alertMes("不能删除身份，请先删除该身份下的用户", "listUser.php");
	}
}

/**
 * 得到所有身份
 * @return array
 */
function getAllRole(){
	$sql="select id,rolename,record_audit,lab_audit,dev_audit,user_audit from dev_role";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 *得到身份ID和身份名称
 * @return array
 */
function getRoleInfo(){
	$sql="select id,rolename,record_audit,lab_audit,dev_audit,user_audit from dev_role order by id asc";
	$rows=fetchAll($sql);
	return $rows;
}