<?php
header("content-type: text/html;charset=utf-8");
$servername = "localhost:3306";
//$targetId = "billy191";
$username = "ghdaudrm_root";
$password = "Tongshang1";
$conn = mysqli_connect($servername, $username, $password,'ghdaudrm_fduroot');
if (!$conn) {
	die("Connection failed: " . mysqli_error());
}
//mysql_select_db('blog');
mysqli_query($conn,"set names utf8");
/*$sql = "SELECT title,serial FROM `fduroot_article` ORDER BY created_time DESC limit 0,5";
$retval = mysqli_query($conn,$sql);
$arr = array();
$i = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	//$arr['sell'][$i]['category'] = $row['categorygory'];
	$arr['slide'][$i]['content'] = $row['content'];
	$arr['slide'][$i]['serial']=$row['serial'];
	$arr['slide'][$i]['browsed']=$row['browsed'];
	$arr['slide'][$i]['img']=$row['picture'];
	$arr['slide'][$i]['title']=$row['title'];
	$i += 1;
}
$arr['passage']['slide']=$i;*/
$sql = "SELECT title,serial FROM `fduroot_article` WHERE category='sell' ORDER BY created_time DESC limit 0,4";
$retval = mysqli_query($conn,$sql);
//$arr = array();
$i = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	//$arr['sell'][$i]['category'] = $row['categorygory'];
	//$arr['sell'][$i]['content'] = $row['content'];
	$arr['sell'][$i]['serial']=$row['serial'];
	//$arr['sell'][$i]['browsed']=$row['browsed'];
	$arr['sell'][$i]['img']=$row['picture'];
	$arr['sell'][$i]['title']=$row['title'];
	$i += 1;
}
$arr['passage']['sell']=$i;
$sql = "SELECT title,serial FROM `fduroot_article` WHERE category='buy' ORDER BY created_time DESC limit 0,4";
$retval = mysqli_query($conn,$sql);
//$arr = array();
$i = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	//$arr['sell'][$i]['category'] = $row['categorygory'];
	//$arr['buy'][$i]['content'] = $row['content'];
	$arr['buy'][$i]['serial']=$row['serial'];
	//$arr['buy'][$i]['browsed']=$row['browsed'];
	$arr['buy'][$i]['img']=$row['picture'];
	$arr['buy'][$i]['title']=$row['title'];
	$i += 1;
}
$arr['passage']['buy']=$i;
$sql = "SELECT title,serial FROM `fduroot_article` WHERE category='intern' ORDER BY created_time DESC limit 0,4";
$retval = mysqli_query($conn,$sql);
//$arr = array();
$i = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	//$arr['sell'][$i]['category'] = $row['categorygory'];
	//$arr['intern'][$i]['content'] = $row['content'];
	$arr['intern'][$i]['serial']=$row['serial'];
	//$arr['intern'][$i]['browsed']=$row['browsed'];
	$arr['intern'][$i]['img']=$row['picture'];
	$arr['intern'][$i]['title']=$row['title'];
	$i += 1;
}
$arr['passage']['intern']=$i;
$sql = "SELECT title,serial FROM `fduroot_article` WHERE category='ptjb' ORDER BY created_time DESC limit 0,4";
$retval = mysqli_query($conn,$sql);
//$arr = array();
$i = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	//$arr['sell'][$i]['category'] = $row['categorygory'];
	//$arr['ptjb'][$i]['content'] = $row['content'];
	$arr['ptjb'][$i]['serial']=$row['serial'];
	//$arr['ptjb'][$i]['browsed']=$row['browsed'];
	$arr['ptjb'][$i]['img']=$row['picture'];
	$arr['ptjb'][$i]['title']=$row['title'];
	$i += 1;
}
$arr['passage']['ptjb']=$i;
$sql = "SELECT title,serial FROM `fduroot_article` WHERE category='stuff' ORDER BY created_time DESC limit 0,4";
$retval = mysqli_query($conn,$sql);
//$arr = array();
$i = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	//$arr['sell'][$i]['category'] = $row['categorygory'];
	//$arr['stuff'][$i]['content'] = $row['content'];
	$arr['stuff'][$i]['serial']=$row['serial'];
	//$arr['stuff'][$i]['browsed']=$row['browsed'];
	$arr['stuff'][$i]['img']=$row['picture'];
	$arr['stuff'][$i]['title']=$row['title'];
	$i += 1;
}
$arr['passage']['stuff']=$i;
$sql = "SELECT title,serial FROM `fduroot_article` WHERE category='other' ORDER BY created_time DESC limit 0,4";
$retval = mysqli_query($conn,$sql);
//$arr = array();
$i = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	//$arr['sell'][$i]['category'] = $row['categorygory'];
	//$arr['other'][$i]['content'] = $row['content'];
	$arr['other'][$i]['serial']=$row['serial'];
	//$arr['other'][$i]['browsed']=$row['browsed'];
	$arr['other'][$i]['img']=$row['picture'];
	$arr['other'][$i]['title']=$row['title'];
	$i += 1;
}
$arr['passage']['other']=$i;
//$arr['passage']=$passage;
$str = json_encode($arr);
echo "$str";
?>