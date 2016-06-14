<?php
date_default_timezone_set('prc');
header("content-type: text/html;charset=utf-8");
$servername = "localhost:3306";
$username = "ghdaudrm_root";
$password = "Tongshang1";
$conn = mysqli_connect($servername, $username, $password,'ghdaudrm_fduroot');
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
//mysql_select_db('ghdaudrm_fduroot');
mysqli_query($conn,"set names utf8");
//$userId = $_GET['targetId'];
//var_dump($_SESSION);
//var_dump($_COOKIE);
$userId=$_COOKIE['userid'];
//$userId="billy191";
//echo "$userId";
if (isset($_GET['serial'])) $serial = $_GET['serial'];
//echo "$serial";
if (isset($_POST['category'])) $category = $_POST['category']; else $category="sell";
//var_dump($_POST['category']);
//$tag = $_POST['tag'];
if (isset($_GET['serial'])) {
	echo "删除！！！</br>";
	$sql = "DELETE FROM `fduroot_article` WHERE serial='$serial'";
	//echo "$sql</br>";
	//die("$sql");
	$retval = mysqli_query($conn,$sql);
	//$cat = $arr['catname'];
	//$aut = $arr['author'];
/*	$sql = "SELECT * FROM `fduroot_article` WHERE category='$category' AND author_id='$userId'";
	//echo "$sql</br>";
	$retval = mysql_query($sql, $conn);
	while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
		$num = $row['num'];
	}
	$num -= 1;
	$sql = "UPDATE fduroot_article SET num='$num' WHERE category='$category' AND author_id='$userId'";*/
	//echo "$num";
	//echo "$cat";
	//echo "$aut";
	$retval = mysqli_query($conn,$sql);
	/*$sql = "DELETE FROM `tag` WHERE serial='$serial'";
	$retval = mysql_query($sql, $conn);*/
}
//echo "$tag</br>";
/*echo "$category";
$sql = "SELECT category FROM fduroot_article WHERE category='$category' AND author_id='$userId'";
echo "$sql</br>";
$retval = mysql_query($sql, $conn);
if (!mysql_num_rows($retval)) {
	$number = 1;
	$ddd = $userId . $category;
	$sql = "INSERT INTO category" . "(catname,author,num,def)" . "VALUES" . "('$category','$userId','$number','$ddd')";
	$retval = mysql_query($sql, $conn);
	echo "$userId</br>";
	echo "$category</br>";
	echo "$number</br>";
	echo "new category";
} else {
	$row = mysql_fetch_array($retval, MYSQL_ASSOC);
	$number = $row['num'] + 1;
	echo "$number";
	$sql = "UPDATE category SET num='$number' WHERE catname='$category' AND author='$userId'";
	$retval = mysql_query($sql, $conn);
	echo "$sql</br>";
	echo "old category";
}*/
//$taglist = explode(' ', $tag);
/*$sql = "SELECT serial FROM fduroot_article";
$retval = mysqli_query($conn,$sql);
echo "$sql</br>";
//die("test");
if (!mysql_num_rows($retval)) {
	$ord = 1;
	echo "new order";
} else {
	$ord = 0;
	while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
		if ($row['serial'] > $ord) {
			$ord = $row['serial'];
		}
	}
	//$ord=array_search(max($row),$row)+1;
	$ord = $ord + 1;
	echo "$ord";
	echo "old order</br>";
}
die("break");*/
//$len = count($taglist);
$title = $_POST['title'];
$ptime = date('Y-m-d H:i:s');
//echo "$taglist[0]</br>";
//echo "$len";
//echo "$title";
//echo "$time";
/*for ($i = 0; $i <= $len - 1; $i++) {
	$d = $userid . $taglist[$i] . $ord . $title;
	$sql = "INSERT INTO `tag` " . "(`author`,`tagname`,`serial`,`title`,`def`,`ptime`) " . "VALUES " . "('$userId','$taglist[$i]','$ord','$title','$d','$ptime')";
	echo "$sql</br>";
	//mysql_select_db('blog');
	$retval = mysql_query($sql, $conn);
	echo "tag success";
}*/
$ptext = $_POST['text'];
$pattern="/(src)=[\"|'| ]{0,}([^>]*\.(gif|jpg|bmp|png))/isU";
//var_dump($ptext);
preg_match($pattern,$ptext,$img);
//print_r($img);
//die("test");
//die("$_POST");
$visited = 0;
$src=$img[2];
//echo "$img[2]";
//$comments = 0;
$sql="SELECT nickname FROM fduroot_user WHERE user_id='$userId'";
$retval = mysqli_query( $conn,$sql);
$nick="";
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	$nick=$row['nickname'];
}
//echo "</br>$ord</br>";
$sql = "INSERT INTO `fduroot_article` " . "(`author_id`,`title`,`content`,`browsed`,`category`,`created_time`,`picture`,`nickname`,`comments`) " . "VALUES " . "('$userId','$title','$ptext','$visited','$category','$ptime','$src','$nick','0')";
//echo "$sql</br>";
//die("test");
//mysql_select_db('blog');
$retval = mysqli_query( $conn,$sql);
//die("test");
//echo "article success";
$add = "../topic.html?cate="."$category"."&page=1";
echo "<script>window.location.href='$add'</script>";
?>