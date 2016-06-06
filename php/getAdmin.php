<?php
/**
 * Created by PhpStorm.
 * User: alienware
 * Date: 2016/6/6
 * Time: 10:19
 */
header("content-type: text/html;charset=utf-8");
$servername = "localhost:3306";
$username = "ghdaudrm_root";
$password = "Tongshang1";
$userid=$_POST["userid"];
$conn = mysqli_connect($servername, $username, $password,'ghdaudrm_fduroot');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT auth FROM fduroot_user WHERE user_id = '$userid'";
$retval = mysqli_query($conn,$sql);
//echo "$retval";
$arr = array();
$arr['admin']=false;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
    $arr['admin'] = true;
}
$str = json_encode($arr);
echo "$str";
?>