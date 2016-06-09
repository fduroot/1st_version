<?php
header("content-type: text/html;charset=utf-8");
$servername = "localhost:3306";
$username = "ghdaudrm_root";
$password = "Tongshang1";
$conn = mysqli_connect($servername, $username, $password,'ghdaudrm_fduroot');
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
//mysql_select_db('blog');
mysqli_query($conn,"set names utf8");
$serial = $_POST['serial'];
//$category = $_POST['catname'];
$userId = $_COOKIE['userid'];//$_POST['targetId'];
echo "删除！！！</br>";
$sql = "DELETE FROM `fduroot_article` WHERE serial='$serial'";
echo "$sql</br>";
$retval = mysqli_query($conn,$sql);
//$cat = $arr['catname'];
//$aut = $arr['author'];
/*$sql = "SELECT * FROM `category` WHERE catname='$category' AND author='$userId'";
echo "$sql</br>";
$retval = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	$num = $row['num'];
}
$num -= 1;
$sql = "UPDATE category SET num='$num' WHERE catname='$category' AND author='$userId'";
//echo "$num";
//echo "$cat";
//echo "$aut";
echo "$sql</br>";
$retval = mysqli_query($conn,$sql);
$sql = "DELETE FROM `tag` WHERE serial='$serial'";
$retval = mysqli_query($conn,$sql);*/
?>