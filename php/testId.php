<?php
header("ontent-type: text/html;charset=utf-8");
$userid = $_POST['userid'];
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
$sql = "SELECT userid FROM `userinfo`";
$retval = mysql_query($sql, $conn);
$arr = array();
$arr['userid'] = true;
while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
	if ($row['userid'] == $userid) {
		$arr['userid'] = false;
	}
}
$str = json_encode($arr);
echo "$str";
?>