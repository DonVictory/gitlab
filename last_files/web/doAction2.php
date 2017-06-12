<?php
require_once '../func.php/getFiles.func.php';
$files = getFiles();
foreach ($files as $file){
	$res = uploadsFiles($file, true);
	echo $res['mes'],"<br>";
	$uploadsFiles[] = $res['dest'];
}