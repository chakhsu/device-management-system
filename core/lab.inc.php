<?php 
/**
 * 添加实验室的操作
 * @return string
 */
function addLab(){
	$arr=$_POST;
	if(insert("dev_lab",$arr)){
		$mes="实验室添加成功!<br/><a href='addLab.php'>继续添加</a>|<a href='listLab.php'>查看实验室</a>";
	}else{ 
		$mes="实验室添加失败！<br/><a href='addLab.php'>重新添加</a>|<a href='listLab.php'>查看实验室</a>";
	}
	return $mes;
}

/**
 * 根据ID得到指定实验室信息
 * @param int $id
 * @return array
 */
function getLabById($id){
	$sql="select id,labname,labuser,labaddress,labphone,labdesc from dev_lab where id={$id}";
	return fetchOne($sql);
}

/**
 * 修改实验室的操作
 * @param string $where
 * @return string
 */
function editLab($where){
	$arr=$_POST;
	if(update("dev_lab", $arr,$where)){
		$mes="实验室修改成功!<br/><a href='listLab.php'>查看实验室</a>";
	}else{
		$mes="实验室修改失败!<br/><a href='listLab.php'>重新修改</a>";
	}
	return $mes;
}

/**
 *删除实验室
 * @param string $where
 * @return string
 */
function delLab($id){
	$res=checkDevExist($id);
	if(!$res){
		$where="id=".$id;
		if(delete("dev_lab",$where)){
			$mes="实验室删除成功!<br/><a href='listLab.php'>查看实验室</a>|<a href='addLab.php'>添加实验室</a>";
		}else{
			$mes="删除失败！<br/><a href='listLab.php'>请重新操作</a>";
		}
		return $mes;
	}else{
		alertMes("不能删除实验室，请先删除该实验室下的用户", "listDev.php");
	}
}

/**
 * 得到所有实验室
 * @return array
 */
function getAllLab(){
	$sql="select id,labname,labuser,labaddress,labphone,labdesc from dev_lab";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 *得到分类ID和分类名称
 * @return array
 */
function getLabInfo(){
	$sql="select id,labname,labuser,labaddress,labphone,labdesc from dev_lab order by id asc";
	$rows=fetchAll($sql);
	return $rows;
}