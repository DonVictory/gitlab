<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";

	$mysqli = new mysqli($servername,$username,$password,'aec');

	if($mysqli->connect_error){
		echo $mysqli->connect_error;
		exit;
	}
	
	$sql = "insert t_value ";
	$res = $mysqli->query($sql);
	print_r($res);
?>