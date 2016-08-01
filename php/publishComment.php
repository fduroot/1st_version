<?php
date_default_timezone_set('prc');
header("content-type: text/html;charset=utf-8");
$serial = $_POST['serial'];
//$userId=$_COOKIE['userid'];
//die($userId);
//$targetId=$_GET['targetId'];
$comment=$_POST['comment'];
$replier=$_POST['to'];
//$searchStuff = urldecode($searchStuff);
$servername = "localhost:3306";
$username = "ghdaudrm_root";
$password = "Tongshang1";
$conn = mysqli_connect($servername, $username, $password,'ghdaudrm_fduroot');
if (!$conn) {
	die("Connection failed: " . mysqli_error());
}
//mysql_select_db('blog');
mysqli_query($conn,"set names utf8");
/*var_dump($_POST['nickname']);
var_dump($_GET['nickname']);*/
//$userId='';
$nickname='';
$userId='';
//$nickname='1';
if (!isset($_COOKIE['userid'])) {
	//die("test");
	if (isset($_POST['nickname'])) $nickname=$_POST['nickname'];
	//die("$nickname");
} else $userId=$_COOKIE['userid'];
//$userId=$_COOKIE['userid'];
//$nickname=$_POST['nickname'];
//die("$userId");
$time= date('Y-m-d H:i:s');
$sql="SELECT nickname FROM fduroot_user WHERE user_id='$userId'";
$retval = mysqli_query( $conn,$sql);
$comments=0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	$comments=$row['comments'];
}
$sql="UPDATE fduroot_article SET comments=$coments+1 WHERE serial='$serial'";
$retval = mysqli_query($conn,$sql);
$sql = "INSERT INTO fduroot_comment".
"(article_serial,author_id,content,created_time,replier_id,nickname)".
"VALUES".
"('$serial','$userId','$comment','$time','$replier','$nickname')";
echo "$sql";
//die("test");
$retval = mysqli_query($conn,$sql);
/*$sql="SELECT content FROM `article` WHERE serial='$serial'";
$retval=mysql_query($sql,$conn);
$arr=array();
while ($row=mysql_fetch_array($retval,MYSQL_ASSOC)) {
	$arr['comments']=$row['comments'];
}
$co=$arr['comments']+1;
$sql="UPDATE `article` SET comments='$co' WHERE serial='$serial'";
$retval=mysql_query($sql,$conn);*/
$cate=$_POST['cate'];
$add='article.html?cate='.$cate.'&serial='.$serial;
//echo "$add";
/*} else {
	echo "<script>alert('你还没有登录，请先登录再评论');</script>";
}*/
//echo "<script>window.location.href='../$add';</script>"
?>