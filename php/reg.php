<?php
header("content-type: text/html;charset=utf-8");
$servername = "localhost:3306";
$username = "ghdaudrm_root";
$password = "Tongshang1";
$conn = mysqli_connect($servername, $username, $password,'ghdaudrm_fduroot');
if (!$conn) {
	die("Connection failed: " . mysqli_error());
}
//echo "Connected successfully";
/*$sql="CREATE DATABASE blog";
 $retval=mysql_query($sql,$conn);
 if ($retval) {
 echo "Database created successfully";
 } else {
 die("Error creating database: ".mysql_error());
 }
 $sql="CREATE TABLE userInfo (".
 "username VARCHAR(10),".
 "userid VARCHAR(10),".
 "password VARCHAR(20),".
 "gender VARCHAR(1),".
 "fvcolor VARCHAR(10),".
 "hobby VARCHAR(10)".
 "PRIMARY KEY (id));";
 mysql_select_db('blog');
 $retval=mysql_query($sql,$conn);
 if (! $retval) {
 die('Could not create table:'.mysql_error());
 }
 echo "Table created successfully\n";*/
//mysql_select_db('blog');
mysqli_query($conn,"set names utf8");
//if ($_POST['submit']) {
	$idtest = $_POST['account'];
	//echo "$idtest";
	$sql = "SELECT user_id FROM fduroot_user WHERE user_id='$idtest'";
	$retval = mysqli_query($conn,$sql);
	//die("$sql");
	//var_dump("$retval");
	if (!$retval) {
		//echo "registration failed";
		echo "<script>location.href='../index.html';alert('用户名已经存在，请重新注册');</script>";
	} else {
		$usernm = $_POST['nickname'];
		$userid = $_POST['account'];
		$passwd = $_POST['password'];
/*		$gender = $_POST['gender'];
		$fvcolor = $_POST['fvcolor'];
		$hobby = $_POST['hobby'];*/
		$sql = "INSERT INTO fduroot_user" . "(nickname,user_id,password)" . "VALUES" . "('$usernm','$userid','$passwd')";
		//die("$sql");
		//mysql_select_db('blog');
		$retval = mysqli_query($conn,$sql);
		if (!$retval) {
			die('Could not enter data:' . mysqli_error());
		}
		//echo "registration succeed";
		$add = '../index.html';
		setcookie('userid',$idtest,time()+3600,"/v3.1");
		setcookie('nickname',$usernm,time()+3600,"/v3.1");
		echo "<script>/*alert('注册成功');*/location.href='$add'</script>";
	}
//}
mysqli_close($conn);
?>