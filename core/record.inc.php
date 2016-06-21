<?php 

/**
 * 添加记录的操作
 * @return string
 */
function addRecord(){
	$arr=$_POST;
	$arr['recordaddtime']=time();
	$arr['recordstatus']="未审核";
	if(insert("dev_record",$arr)){
		$mes="设备申请成功!<br/><a href='listRecord.php'>查看设备列表</a>";
	}else{ 
		$mes="设备申请失败！<br/><a href='listRecord.php'>查看设备列表</a>";
	}
	return $mes;
}

/**
 * 更新记录的操作
 * @param string $where
 * @return string
 */
function editRecord($where){
	$arr=$_POST;
	if(update("dev_record", $arr,$where)){
		$mes="申请记录修改成功!<br/><a href='listRecord.php'>查看设备列表</a>";
	}else{
		$mes="申请记录修改失败!<br/><a href='listRecord.php'>重新修改</a>";
	}
	return $mes;
}

/**
 *删除记录的操作
 * @param string $where
 * @return string
 */
function delRecord($id){
	$res=checkDevExist($id);
	if(!$res){
		$where="id=".$id;
		if(delete("dev_record",$where)){
			$mes="记录删除成功!<br/><a href='listRecord.php'>查看记录</a>|<a href='addRecord.php'>添加记录</a>";
		}else{
			$mes="删除失败！<br/><a href='listRecord.php'>请重新操作</a>";
		}
		return $mes;
	}else{
		alertMes("不能删除记录，请先删除该实验室下的用户", "listrecord.php");
	}
}


/**
 * 根据id得到记录的详细信息
 * @param int $id
 * @return array
 */
function getRecordById($id){
		$sql="select r.id,r.dev_id,r.username,r.borrow_time,r.remand_time,r.rurn_remand_time,r.recorddesc,r.recordstatus,d.id,d.devname,d.version,d.cat_id,d.lab_id,d.sumnum,d.borrownum,d.adduser,d.addtime,d.devdesc,c.catname,l.labname from dev_record as r join dev_device as d on r.dev_id=d.id inner join dev_cate as c on d.cat_id=c.id inner join dev_lab as l on d.lab_id=l.id where r.id={$id}";
		$row=fetchOne($sql);
		return $row;
}

/**
 * 检查设备下是否有记录
 * @param int $cid
 * @return array
 */
function checkRecordExist($id){
	$sql="select * from dev_record where id={$id}";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 得到所有记录
 * @return array
 */
function getAllRecords(){
	$sql="select r.id,r.dev_id,r.username,r.recordnickname,r.dev_num,r.borrow_time,r.remand_time,r.rurn_remand_time,r.recorddesc,r.recordstatus,d.id,d.devname,d.version,d.cat_id,d.lab_id,d.sumnum,d.borrownum,d.adduser,d.addtime,d.devdesc,c.catname,l.labname,u.id,u.username,u.nickname,u.role_id,u.academy,u.email,u.qq,u.phonenum,u.shortnum from dev_record as r join dev_device as d on r.dev_id=d.id inner join dev_cate as c on d.cat_id=c.id inner join dev_lab as l on d.lab_id=l.id inner join dev_user as u r.username=u.username";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 *得到记录ID和记录名称
 * @return array
 */
function getRecordsInfo(){
	$sql="select r.id,r.dev_id,r.username,r.recordnickname,r.dev_num,r.borrow_time,r.remand_time,r.rurn_remand_time,r.recorddesc,r.recordstatus,d.id,d.devname,d.version,d.cat_id,d.lab_id,d.sumnum,d.borrownum,d.adduser,d.addtime,d.devdesc,c.catname,l.labname,u.id,u.username,u.nickname,u.role_id,u.academy,u.email,u.qq,u.phonenum,u.shortnum from dev_record as r join dev_device as d on r.dev_id=d.id inner join dev_cate as c on d.cat_id=c.id inner join dev_lab as l on d.lab_id=l.id inner join dev_user as u r.username=u.username order by id asc";
	$rows=fetchAll($sql);
	return $rows;
}