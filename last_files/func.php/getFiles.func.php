<?php
function getFiles(){
	$i = 0;
	foreach ($_FILES as $file){
		if(is_string($file)){
			$files[$i] = $file;
			$i++;
		}else if(is_array($file)){
			foreach ($file['name'] as $key =>$_v){
				$files[$i]['name'] = $file['name'][$key];
				$files[$i]['type'] = $file['type'][$key];
				$files[$i]['tmp_name'] = $file['tmp_name'][$key];
				$files[$i]['error'] = $file['error'][$key];
				$files[$i]['size'] = $file['size'][$key];
				$i++;
			}
		}
	}
	return $files;
}
function uploadsFiles($fileinfo,$flag) {
	$mes = "";
	$res = array();
	$allowExt = array("png","jpeg","gif","jpg");
	$maxSize =2097152 ;
	$uploads_path = "/uploads/";
	$uniqid = md5(uniqid(microtime(true),true));
	$ext = pathinfo($fileinfo['name'],PATHINFO_EXTENSION);	
	$target_file = array($uploads_path.$uniqid,$ext);
	if($fileinfo['error'] == UPLOAD_ERR_OK){
		if($fileinfo['size'] > $maxSize){
			$res['mes'] = "上传文件过大";
		}
		if(!in_array($ext, $allowExt)){
			$res['mes'] = "文件上传格式有误";
		}
		if($flag){
			if(!getimagesize($fileinfo['tmp_name'])){
				$res['mes'] = "不是真实图片类型";
			}
		}
		if(!is_uploaded_file($fileinfo['tmp_name'])){
			$res['mes'] = "文件不是通过HTTP POST 方式上传上来的";
		}
		if(!file_exists($uploads_path)){
			mkdir($uploads_path,0777);
			chmod($uploads_path, 0777);
		}
		$destination = implode($target_file, ".");
		if(!move_uploaded_file($fileinfo['tmp_name'], $destination)){
			$res['mes'] = "文件移动失败";
		}else {
			$res['mes'] = "ok";
			$res['dest'] = $destination;
		}
		return $res;
	}else{
		switch ($fileinfo['error']){
			case 1:
				$mes[] = "文件超过了PHP配置文件中upload_max_filesize的上限值";
				break;
			case 2:
				$mes[] = "超过了表单MAX_FILE_SIZE限制的大小";
				break; 
			case 3:
				$mes[] = "文件部分未上传";
				break;
			case 4:
				$mes[] = "没有选择上传文件";
				break;
			case 6:
				$mes[] = "没有找到临时目录";
				break;
			case 7:
				continue;
			case 8:
				$mes[] = "系统错误";
				break;
		}
		$res['mes'] = $mes;
		return $res;
	}
	$file='userfile/a/abc.txt'; //旧目录
	$newFile='userfile/b/newabc.txt'; //新目录
	copy($file,$newFile); //拷贝到新目录
    unlink($file); //删除旧目录下的文件
}