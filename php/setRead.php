<?php
/**
 * Created by PhpStorm.
 * User: alienware
 * Date: 2016/3/5
 * Time: 20:50
 */
//$targetId = $_POST['targetId'];
$serial = $_POST['serial'];
$user=$_COOKIE['userid'];
$servername = "localhost:3306";
$username = "ghdaudrm_root";
$password = "Tongshang1";
//$order=$_POST['bookOrder'];
$order = 1;
$conn = mysqli_connect($servername, $username, $password,'ghdaudrm_fduroot');
if (!$conn) {
    die("Connection failed: " . mysqli_error());
}
//mysql_select_db('blog');
/*$sql = "SELECT * FROM `fduroot_article` WHERE serial='$serial'";
$retval = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
    $visit = $row['browsed'];
    $targetid = $row['author_id'];
    echo "$visit</br>";
}
$visit = $visit + 1;
echo "$visit</br>";*/
$sql = "UPDATE `fduroot_comment` SET isread='1' WHERE article_serial='$serial' AND replier_id='$user'";
echo "$sql";
$retval = mysqli_query($conn,$sql);
/*$sql = "SELECT*FROM `fduroot_user` WHERE userid='$targetid'";
$retval = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	$visit = $row['browsed'];
	echo "$visit</br>";
}
$visit = $visit + 1;
$sql = "UPDATE `userinfo` SET visited='$visit' WHERE userid='$targetid'";
$retval = mysql_query($sql, $conn);*/
?>