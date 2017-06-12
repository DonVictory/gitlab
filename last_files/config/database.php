<?php
/*
 * 连接数据库四种方法
 */
// First
$host = "localhost";
$username = "root";
$password ="";
$dbname = "vipapps";

/* $conn = mysql_connect($host,$username,$password);
mysql_select_db($dbname);
mysql_query("set names utf8");
if($conn){
	echo "fail";
}else{
	echo "success";
} */
// Second
try {
	$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8;port=3306;",$username,$password,array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
	echo $e->getMessage();
}
/* // Third
$conn = new mysqli($host,$username,$password,$dbname);
if($conn->connect_error){
	echo "fail";
}else{
	echo "success";
}
// Fourth
$conn = mysqli_connect($host,$username,$password);
if(mysqli_error($conn)){
	echo "fail";
}else{
	echo "success";
} */
