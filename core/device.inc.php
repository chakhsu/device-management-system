<?php 
/**
 * 添加设备
 * @return string
 */
function addDev(){
	$arr=$_POST;
	$arr['addtime']=time();
	if(isset($_SESSION['adminName'])){
		$arr['adduser']=$_SESSION['adminName'];
	}elseif(isset($_COOKIE['adminName'])){
		$arr['adduser']=$_COOKIE['adminName'];
	}
	$path="../uploads";
	$uploadFiles=uploadFile($path);
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $key=>$uploadFile){
			thumb($path."/".$uploadFile['name'],"../main/uploads/image_50/".$uploadFile['name'],50,50);
			thumb($path."/".$uploadFile['name'],"../main/uploads/image_220/".$uploadFile['name'],220,220);
			thumb($path."/".$uploadFile['name'],"../main/uploads/image_350/".$uploadFile['name'],350,350);
			thumb($path."/".$uploadFile['name'],"../main/uploads/image_800/".$uploadFile['name'],800,800);
		}
	}
	$res=insert("dev_device",$arr);
	$dev_id=getInsertId();
	if($res&&$dev_id){
		foreach($uploadFiles as $uploadFile){
			$arr1['dev_id']=$dev_id;
			$arr1['albumPath']=$uploadFile['name'];
			addAlbum($arr1);
		}
		$mes="<p>添加成功!</p><a href='addDev.php' target='mainFrame'>继续添加</a>|<a href='listDev.php' target='mainFrame'>查看设备列表</a>";
	}else{
		foreach($uploadFiles as $uploadFile){
			if(file_exists("../main/uploads/image_800/".$uploadFile['name'])){
				unlink("../main/uploads/image_800/".$uploadFile['name']);
			}
			if(file_exists("../main/uploads/image_50/".$uploadFile['name'])){
				unlink("../main/uploads/image_50/".$uploadFile['name']);
			}
			if(file_exists("../main/uploads/image_220/".$uploadFile['name'])){
				unlink("../main/uploads/image_220/".$uploadFile['name']);
			}
			if(file_exists("../main/uploads/image_350/".$uploadFile['name'])){
				unlink("../main/uploads/image_350/".$uploadFile['name']);
			}
		}
		$mes="<p>添加失败!</p><a href='addDev.php' target='mainFrame'>重新添加</a>";
		
	}
	return $mes;
}

/**
 *编辑设备
 * @param int $id
 * @return string
 */
function editDev($id){
	$arr=$_POST;
	$path="./uploads";
	$uploadFiles=uploadFile($path);
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $key=>$uploadFile){
			thumb($path."/".$uploadFile['name'],"../main/uploads/image_50/".$uploadFile['name'],50,50);
			thumb($path."/".$uploadFile['name'],"../main/uploads/image_220/".$uploadFile['name'],220,220);
			thumb($path."/".$uploadFile['name'],"../main/uploads/image_350/".$uploadFile['name'],350,350);
			thumb($path."/".$uploadFile['name'],"../main/uploads/image_800/".$uploadFile['name'],800,800);
		}
	}
	$where="id={$id}";
	$res=update("dev_device",$arr,$where);
	$dev_id=$id;
	if($res&&$dev_id){
		if($uploadFiles &&is_array($uploadFiles)){
			foreach($uploadFiles as $uploadFile){
				$arr1['dev_id']=$dev_id;
				$arr1['albumPath']=$uploadFile['name'];
				addAlbum($arr1);
			}
		}
		$mes="<p>编辑成功!</p><a href='listDev.php' target='mainFrame'>查看设备列表</a>";
	}else{
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $uploadFile){
			if(file_exists("../main/uploads/image_800/".$uploadFile['name'])){
				unlink("../main/uploads/image_800/".$uploadFile['name']);
			}
			if(file_exists("../main/uploads/image_50/".$uploadFile['name'])){
				unlink("../main/uploads/image_50/".$uploadFile['name']);
			}
			if(file_exists("../main/uploads/image_220/".$uploadFile['name'])){
				unlink("../main/uploads/image_220/".$uploadFile['name']);
			}
			if(file_exists("../main/uploads/image_350/".$uploadFile['name'])){
				unlink("../main/uploads/image_350/".$uploadFile['name']);
			}
		}
	}
		$mes="<p>编辑失败!</p><a href='listDev.php' target='mainFrame'>重新编辑</a>";
		
	}
	return $mes;
}

/**
 *删除设备
 * @param int $id
 * @return string
 */
function delDev($id){
	$where="id=$id";
	$res=delete("dev_device",$where);
	$DevImgs=getAllImgByDevId($id);
	if($DevImgs&&is_array($DevImgs)){
		foreach($DevImgs as $DevImg){
			if(file_exists("uploads/".$DevImg['albumPath'])){
				unlink("uploads/".$DevImg['albumPath']);
			}
			if(file_exists("../main/uploads/image_50/".$DevImg['albumPath'])){
				unlink("../main/uploads/image_50/".$DevImg['albumPath']);
			}
			if(file_exists("../main/uploads/image_220/".$DevImg['albumPath'])){
				unlink("../main/uploads/image_220/".$DevImg['albumPath']);
			}
			if(file_exists("../main/uploads/image_350/".$DevImg['albumPath'])){
				unlink("../main/uploads/image_350/".$DevImg['albumPath']);
			}
			if(file_exists("../main/uploads/image_800/".$DevImg['albumPath'])){
				unlink("../main/uploads/image_800/".$DevImg['albumPath']);
			}
		}
	}
	$where1="dev_id={$id}";
	$res1=delete("dev_album",$where1);
	if($res&&$res1){
		$mes="删除成功!<br/><a href='listDev.php' target='mainFrame'>查看设备列表</a>";
	}else{
		$mes="删除失败!<br/><a href='listDev.php' target='mainFrame'>重新删除</a>";
	}
	return $mes;
}

/**
 * 得到设备的所有信息
 * @return array
 */
function getAllDevByAdmin(){
	$sql="select d.id,d.devname,d.version,d.cat_id,d.lab_id,d.sumnum,d.borrownum,d.adduser,d.addtime,d.devdesc,c.catname,l.labname from dev_device as d join dev_cate as c on d.cat_id=c.id inner join dev_lab as l on d.lab_id=l.id";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 *根据设备id得到设备图片
 * @param int $id
 * @return array
 */
function getAllImgByDevId($id){
	$sql="select a.albumPath from dev_album a where dev_id={$id}";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 根据id得到设备的详细信息
 * @param int $id
 * @return array
 */
function getDevById($id){
		$sql="select d.id,d.devname,d.version,d.cat_id,d.lab_id,d.sumnum,d.borrownum,d.adduser,d.addtime,d.devdesc,c.catname,l.labname from dev_device as d join dev_cate as c on d.cat_id=c.id inner join dev_lab as l on d.lab_id=l.id where d.id={$id}";
		$row=fetchOne($sql);
		return $row;
}

/**
 * 检查分类下是否有设备
 * @param int $cid
 * @return array
 */
function checkDevExist($cid){
	$sql="select * from dev_device where cat_id={$cid}";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 得到所有设备
 * @return array
 */
function getAllDevs(){
	$sql="select d.id,d.devname,d.version,d.cat_id,d.lab_id,d.sumnum,d.borrownum,d.adduser,d.addtime,d.devdesc,c.catname,l.labname from dev_device as d join dev_cate as c on d.cat_id=c.id inner join dev_lab as l on d.lab_id=l.id";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 *根据cid得到4条设备
 * @param int $cid
 * @return Array
 */
function getDevsByCid($cid){
	$sql="select d.id,d.devname,d.version,d.cat_id,d.lab_id,d.sumnum,d.borrownum,d.adduser,d.addtime,d.devdesc,c.catname,l.labname from dev_device as d join dev_cate as c on d.cat_id=c.id inner join dev_lab as l on d.lab_id=l.id where d.cat_id={$cid} limit 4";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 *得到设备ID和设备名称
 * @return array
 */
function getDevInfo(){
	$sql="select id,devname from dev_device order by id asc";
	$rows=fetchAll($sql);
	return $rows;
}