<?php 

/**
 * 插入设备的图片
 * @param int $id
 * @return array
 */
function addAlbum($arr){
	insert("dev_album", $arr);
}

/**
 * 根据设备id得到设备图片
 * @param int $id
 * @return array
 */
function getDevImgById($id){
	$sql="select albumPath from dev_album where dev_id={$id} limit 1";
	$row=fetchOne($sql);
	return $row;
}

/**
 * 根据设备id得到所有图片
 * @param int $id
 * @return array
 */
function getDevImgsById($id){
	$sql="select albumPath from dev_album where dev_id={$id} ";
	$rows=fetchAll($sql);
	return $rows;
}
/**
 * 文字水印的效果
 * @param int $id
 * @return string
 */
function doWaterText($id){
	$rows=getDevImgsById($id);
	foreach($rows as $row){
		$filename="../main/uploads/".$row['albumPath'];
		waterText($filename);
	}
	$mes="操作成功";
	return $mes;
}

/**
 *图片水印
 * @param int $id
 * @return string
 */
function doWaterPic($id){
	$rows=getDevImgsById($id);
	foreach($rows as $row){
		$filename="../main/uploads/".$row['albumPath'];
		waterPic($filename);
	}
	$mes="操作成功";
	return $mes;
}