<?php
header("content-type: text/html;charset=utf-8");
$servername = "localhost:3306";
$username = "ghdaudrm_root";
$password = "Tongshang1";
$order = $_POST['serial'];
$conn = mysqli_connect($servername, $username, $password,'ghdaudrm_fduroot');
if (!$conn) {
	die("Connection failed: " . mysqli_error());
}
$serial = $_POST['serial'];
//$replier=$_COOKIE['userid'];
//echo "Connected successfully";
//mysql_select_db('blog');
mysqli_query($conn,"set names utf8");
$sql = "SELECT content,author_id,replier_id,nickname FROM fduroot_comment WHERE article_serial='$serial' ORDER BY created_time ASC";
$retval = mysqli_query($conn,$sql);
$arr = array();
$i = 1;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	$arr[$i]['content'] = $row['content'];
	$arr[$i]['id']=$row['author_id'];
	//$arr[$i]['writer'] = $row['author_id'];
	//$arr[$i]['replier']=$replier;
	//$arr[$i]['time'] = $row['time'];
	//$arr[$i]['ord'] = $row['ord'];
	$userid=$row['author_id'];
	if ($row['nickname']=='') $arr[$i]['writer']='匿名用户'; else $arr[$i]['writer']=$row['nickname'];
	//$arr[$i]['email']=$row['replier_email'];
	$sql1="SELECT nickname FROM fduroot_user WHERE user_id='$userid'";
	$retval1=mysqli_query($conn,$sql1);
	while ($row1 = mysqli_fetch_array($retval1, MYSQLI_ASSOC)) {
		$arr[$i]['writer']=$row1['nickname'];
	}
/*	$sql2="SELECT nickname FROM fduroot_user WHERE user_id='$userid'";
	$retval2=mysqli_query($conn,$sql2);
	while ($row2 = mysqli_fetch_array($retval2, MYSQLI_ASSOC)) {
		$arr[$i]['writer']=$row2['nickname'];
	}*/
	$i += 1;
}
$str = json_encode($arr);
echo $str;
?>