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
$sql = "SELECT title,serial,created_time,nickname,browsed,comments FROM `fduroot_article` WHERE category='sell' ORDER BY created_time DESC limit 0,4";
$retval = mysqli_query($conn,$sql);
//$arr = array();
$i = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	//$arr['sell'][$i]['category'] = $row['categorygory'];
	//$arr['sell'][$i]['content'] = $row['content'];
	$arr['sell'][$i]['serial']=$row['serial'];
	$arr['sell'][$i]['count']=$row['browsed'];
	$arr['sell'][$i]['time']=$row['created_time'];
	$arr['sell'][$i]['nickname']=$row['nickname'];
	$arr['sell'][$i]['commentNum']=$row['comments'];
	//$arr['sell'][$i]['img']=$row['picture'];
	$arr['sell'][$i]['title']=$row['title'];
	$i += 1;
}
$arr['passage']['sell']=$i;
$sql = "SELECT title,serial,created_time,nickname,browsed,comments FROM `fduroot_article` WHERE category='buy' ORDER BY created_time DESC limit 0,4";
$retval = mysqli_query($conn,$sql);
//$arr = array();
$i = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	//$arr['sell'][$i]['category'] = $row['categorygory'];
	//$arr['buy'][$i]['content'] = $row['content'];
	$arr['buy'][$i]['serial']=$row['serial'];
	$arr['buy'][$i]['count']=$row['browsed'];
	$arr['buy'][$i]['time']=$row['created_time'];
	$arr['buy'][$i]['nickname']=$row['nickname'];
	$arr['buy'][$i]['commentNum']=$row['comments'];
	//$arr['buy'][$i]['img']=$row['picture'];
	$arr['buy'][$i]['title']=$row['title'];
	$i += 1;
}
$arr['passage']['buy']=$i;
$sql = "SELECT title,serial,created_time,nickname,browsed,comments FROM `fduroot_article` WHERE category='job' ORDER BY created_time DESC limit 0,4";
$retval = mysqli_query($conn,$sql);
//$arr = array();
$i = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	//$arr['sell'][$i]['category'] = $row['categorygory'];
	//$arr['job'][$i]['content'] = $row['content'];
	$arr['job'][$i]['serial']=$row['serial'];
	$arr['job'][$i]['count']=$row['browsed'];
	$arr['job'][$i]['time']=$row['created_time'];
	$arr['job'][$i]['nickname']=$row['nickname'];
	$arr['job'][$i]['commentNum']=$row['comments'];

	//$arr['job'][$i]['img']=$row['picture'];
	$arr['job'][$i]['title']=$row['title'];
	$i += 1;
}
$arr['passage']['job']=$i;
$sql = "SELECT title,serial,created_time,nickname,browsed,comments FROM `fduroot_article` WHERE category='other' ORDER BY created_time DESC limit 0,4";
$retval = mysqli_query($conn,$sql);
//$arr = array();
$i = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	//$arr['sell'][$i]['category'] = $row['categorygory'];
	//$arr['other'][$i]['content'] = $row['content'];
	$arr['other'][$i]['serial']=$row['serial'];
	$arr['other'][$i]['count']=$row['browsed'];
	$arr['other'][$i]['time']=$row['created_time'];
	$arr['other'][$i]['nickname']=$row['nickname'];
	$arr['other'][$i]['commentNum']=$row['comments'];

	//$arr['other'][$i]['img']=$row['picture'];
	$arr['other'][$i]['title']=$row['title'];
	$i += 1;
}
$arr['passage']['other']=$i;
$sql = "SELECT title,serial,created_time,nickname,browsed,comments FROM `fduroot_article` WHERE category='more' ORDER BY created_time DESC limit 0,4";
$retval = mysqli_query($conn,$sql);
//$arr = array();
$i = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	//$arr['sell'][$i]['category'] = $row['categorygory'];
	//$arr['more'][$i]['content'] = $row['content'];
	$arr['more'][$i]['serial']=$row['serial'];
	$arr['more'][$i]['count']=$row['browsed'];
	$arr['more'][$i]['time']=$row['created_time'];
	$arr['more'][$i]['nickname']=$row['nickname'];
	$arr['more'][$i]['commentNum']=$row['comments'];

	//$arr['more'][$i]['img']=$row['picture'];
	$arr['more'][$i]['title']=$row['title'];
	$i += 1;
}
$arr['passage']['more']=$i;
$sql = "SELECT title,serial,created_time,nickname,browsed,comments FROM `fduroot_article` WHERE category='restaurant' ORDER BY created_time DESC limit 0,4";
$retval = mysqli_query($conn,$sql);
//$arr = array();
$i = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	//$arr['restaurant'][$i]['category'] = $row['categorygory'];
	//$arr['restaurant'][$i]['content'] = $row['content'];
	$arr['restaurant'][$i]['serial']=$row['serial'];
	$arr['restaurant'][$i]['count']=$row['browsed'];
	$arr['restaurant'][$i]['time']=$row['created_time'];
	$arr['restaurant'][$i]['nickname']=$row['nickname'];
	$arr['restaurant'][$i]['commentNum']=$row['comments'];

	//$arr['restaurant'][$i]['img']=$row['picture'];
	$arr['restaurant'][$i]['title']=$row['title'];
	$i += 1;
}
$arr['passage']['restaurant']=$i;
$sql = "SELECT title,serial,created_time,nickname,browsed,comments FROM `fduroot_article` WHERE category='house' ORDER BY created_time DESC limit 0,4";
$retval = mysqli_query($conn,$sql);
//$arr = array();
$i = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	//$arr['house'][$i]['category'] = $row['categorygory'];
	//$arr['house'][$i]['content'] = $row['content'];
	$arr['house'][$i]['serial']=$row['serial'];
	$arr['house'][$i]['count']=$row['browsed'];
	$arr['house'][$i]['time']=$row['created_time'];
	$arr['house'][$i]['nickname']=$row['nickname'];
	$arr['house'][$i]['commentNum']=$row['comments'];

	//$arr['house'][$i]['img']=$row['picture'];
	$arr['house'][$i]['title']=$row['title'];
	$i += 1;
}
$arr['passage']['house']=$i;
//$arr['passage']=$passage;
$str = json_encode($arr);
echo "$str";
?>