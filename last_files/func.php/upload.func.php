<?php
function uploadsFile($fileinfo){
	$file_name = $fileinfo['name'];
	$file_type = $fileinfo['type'];
	$file_tmp = $fileinfo['tmp_name'];
	$file_error = $fileinfo['error'];
	$file_size = $fileinfo['size'];
	$uploads = "../uploads/";
	$uniqid = "";
	//$ext = pathinfo($file_name,PATHINFO_EXTENSION);
	$ext = strtolower(end(explode(".", $file_name)));
	$img_format = array("png","jpeg","gif","jpg");
	
	if($file_error > 0){
		exit("fail");
	}
	//$uinqid = md5(uniqid(microtime(true),true));
/* 	if(!is_uploaded_file($file_name)){
		exit("Don't support the way.");
	} */
	
	if(!in_array($ext, $img_format)){
		exit("The format of images is wrong.");
	}
	
	if(!file_exists($uploads)){
		mkdir($uploads,0777);
		chmod($uploads, 0777);
	}
	
	if(!getimagesize($file_tmp)){
		exit("文件内容不是一个图片.");
	}
	
	$uniqid = md5(uniqid(microtime(true),true));
	$destination = $uniqid.".".$ext;
	if(move_uploaded_file($file_tmp, $uploads.$destination)){
		return json_encode(array("newName" =>$destination,"type" =>$file_type,"size" =>$file_size,"error" =>$file_error));
	}
}	