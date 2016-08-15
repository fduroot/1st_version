<?php
header("content-type: text/html;charset=utf-8");
$servername = "localhost:3306";
$username = "ghdaudrm_root";
$password = "Tongshang1";
//$order=$_POST['bookOrder'];
$order = $_POST['serial'];
//echo "$order";
$conn = mysqli_connect($servername, $username, $password,'ghdaudrm_fduroot');
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
//echo "$order";
//echo "Connected successfully";
//mysql_select_db('blog');
mysqli_query($conn,"set names utf8");
//$sql = "SELECT `text`,`visited` FROM `article` WHERE serial='$order'";
//$del = $_POST['del'];
//$del=true;
$sql = "SELECT * FROM `fduroot_article` WHERE serial='$order'";
//echo "$sql</br>";
$retval = mysqli_query($conn,$sql);
$arr = array();
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	$arr['content'] = $row['content'];
	$arr['viewNum'] = $row['browsed'];
	$arr['title'] = $row['title'];
	$arr['cate'] = $row['category'];
	$arr['author'] = $row['author_id'];
	$arr['pic']=$row['picture'];
	$arr['commentNum'] = $row['comments'];
	$arr['time']=$row['created_time'];
	$arr['nickname']=$row['nickname'];
}
$str = json_encode($arr);
echo "$str";
//print_r(mysql_fetch_assoc($result));
//$row=array_push($retval);
//$str = json_encode($row = mysql_fetch_array($retval, MYSQL_ASSOC));
/*$arr=array();
 while ($row=mysql_fetch_array($retval,MYSQL_ASSOC)) {
 $arr['text']=$row['text'];
 $arr['visited']=$row['visited'];
 }
 $str=json_encode($arr);
 echo $str;    */
?>