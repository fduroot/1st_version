<?php
header("content-type: text/html;charset=utf-8");
$servername = "localhost:3306";
$username = "ghdaudrm_root";
$password = "Tongshang1";
$conn = mysql_connect($servername, $username, $password);
if (!$conn) {
	die("Connection failed: " . mysql_error());
}
//echo "Connected successfully";
mysql_select_db('blog');
mysql_query("set names utf8");
$ord = $_POST['ord'];
$serial = $_POST['serial'];
echo "删除！！！</br>";
$sql = "DELETE FROM `comments` WHERE ord='$ord'";
echo "$sql</br>";
$retval = mysql_query($sql, $conn);
//$cat = $arr['catname'];
$aut = $arr['author'];
$sql = "SELECT * FROM `article` WHERE serial='$serial'";
echo "$sql</br>";
$retval = mysql_query($sql, $conn);
while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
	$num = $row['comments'];
}
$num -= 1;
$sql = "UPDATE `article` SET comments='$num' WHERE serial='$serial'";
//echo "$num";
//echo "$cat";
//echo "$aut";
echo "$sql</br>";
$retval = mysql_query($sql, $conn);
?>