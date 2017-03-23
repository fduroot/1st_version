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
	//$arr['sell'][$i]['category'] = $row['category'];
	$arr['slide'][$i]['content'] = $row['content'];
	$arr['slide'][$i]['serial']=$row['serial'];
	$arr['slide'][$i]['browsed']=$row['browsed'];
        if (strlen($row['picture'])==0) $arr['slide'][$i]['img']="null"; else $arr['slide'][$i]['img']=$row['picture'];
	$arr['slide'][$i]['title']=$row['title'];
        $arr['slide'][$i]['img']=substr($arr['slide'][$i]['img'],1,strlen($arr['slide'][$i]['img'])-1);
	$i += 1;
}
$arr['passage']['slide']=$i;*/
$sql = "SELECT title,serial,created_time,nickname,browsed,comments,picture FROM `fduroot_article` WHERE category='sell' ORDER BY created_time DESC limit 0,4";
$retval = mysqli_query($conn,$sql);
//$arr = array();
$i = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	//$arr['sell'][$i]['category'] = $row['category'];
	//$arr['sell'][$i]['content'] = $row['content'];
	$arr['sell'][$i]['serial']=$row['serial'];
	$arr['sell'][$i]['count']=$row['browsed'];
	$arr['sell'][$i]['time']=$row['created_time'];
	$arr['sell'][$i]['nickname']=$row['nickname'];
	$arr['sell'][$i]['commentNum']=$row['comments'];
	if (strlen($row['picture'])==0) $arr['sell'][$i]['img']="null"; else $arr['sell'][$i]['img']=$row['picture'];
	$arr['sell'][$i]['title']=$row['title'];
    $arr['sell'][$i]['img']=substr($arr['sell'][$i]['img'],1,strlen($arr['sell'][$i]['img'])-1);
    if (strpos($arr['sell'][$i]['img'],'emoticons'))
        $arr['sell'][$i]['img']="null";
	$i += 1;
}
$arr['passage']['sell']=$i;
$sql = "SELECT title,serial,created_time,nickname,browsed,comments,picture FROM `fduroot_article` WHERE category='buy' ORDER BY created_time DESC limit 0,4";
$retval = mysqli_query($conn,$sql);
//$arr = array();
$i = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	//$arr['sell'][$i]['category'] = $row['category'];
	//$arr['buy'][$i]['content'] = $row['content'];
	$arr['buy'][$i]['serial']=$row['serial'];
	$arr['buy'][$i]['count']=$row['browsed'];
	$arr['buy'][$i]['time']=$row['created_time'];
	$arr['buy'][$i]['nickname']=$row['nickname'];
	$arr['buy'][$i]['commentNum']=$row['comments'];
	if (strlen($row['picture'])==0) $arr['buy'][$i]['img']="null"; else $arr['buy'][$i]['img']=$row['picture'];
	$arr['buy'][$i]['title']=$row['title'];
    $arr['buy'][$i]['img']=substr($arr['buy'][$i]['img'],1,strlen($arr['buy'][$i]['img'])-1);
    if (strpos($arr['buy'][$i]['img'],'emoticons'))
        $arr['buy'][$i]['img']="null";
	$i += 1;
}
$arr['passage']['buy']=$i;
$sql = "SELECT title,serial,created_time,nickname,browsed,comments,picture FROM `fduroot_article` WHERE category='job' ORDER BY created_time DESC limit 0,4";
$retval = mysqli_query($conn,$sql);
//$arr = array();
$i = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	//$arr['sell'][$i]['category'] = $row['category'];
	//$arr['job'][$i]['content'] = $row['content'];
	$arr['job'][$i]['serial']=$row['serial'];
	$arr['job'][$i]['count']=$row['browsed'];
	$arr['job'][$i]['time']=$row['created_time'];
	$arr['job'][$i]['nickname']=$row['nickname'];
	$arr['job'][$i]['commentNum']=$row['comments'];

	if (strlen($row['picture'])==0) $arr['job'][$i]['img']="null"; else $arr['job'][$i]['img']=$row['picture'];
	$arr['job'][$i]['title']=$row['title'];
    $arr['job'][$i]['img']=substr($arr['job'][$i]['img'],1,strlen($arr['job'][$i]['img'])-1);
    if (strpos($arr['job'][$i]['img'],'emoticons'))
            $arr['job'][$i]['img']="null";
	$i += 1;
}
$arr['passage']['job']=$i;
$sql = "SELECT title,serial,created_time,nickname,browsed,comments,picture FROM `fduroot_article` WHERE category='other' ORDER BY created_time DESC limit 0,4";
$retval = mysqli_query($conn,$sql);
//$arr = array();
$i = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	//$arr['sell'][$i]['category'] = $row['category'];
	//$arr['other'][$i]['content'] = $row['content'];
	$arr['other'][$i]['serial']=$row['serial'];
	$arr['other'][$i]['count']=$row['browsed'];
	$arr['other'][$i]['time']=$row['created_time'];
	$arr['other'][$i]['nickname']=$row['nickname'];
	$arr['other'][$i]['commentNum']=$row['comments'];

	if (strlen($row['picture'])==0) $arr['other'][$i]['img']="null"; else $arr['other'][$i]['img']=$row['picture'];
	$arr['other'][$i]['title']=$row['title'];
    $arr['other'][$i]['img']=substr($arr['other'][$i]['img'],1,strlen($arr['other'][$i]['img'])-1);
    if (strpos($arr['other'][$i]['img'],'emoticons'))
            $arr['other'][$i]['img']="null";
	$i += 1;
}
$arr['passage']['other']=$i;
$sql = "SELECT title,serial,created_time,nickname,browsed,comments,picture FROM `fduroot_article` WHERE category='more' ORDER BY created_time DESC limit 0,4";
$retval = mysqli_query($conn,$sql);
//$arr = array();
$i = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	//$arr['sell'][$i]['category'] = $row['category'];
	//$arr['more'][$i]['content'] = $row['content'];
	$arr['more'][$i]['serial']=$row['serial'];
	$arr['more'][$i]['count']=$row['browsed'];
	$arr['more'][$i]['time']=$row['created_time'];
	$arr['more'][$i]['nickname']=$row['nickname'];
	$arr['more'][$i]['commentNum']=$row['comments'];

	if (strlen($row['picture'])==0) $arr['more'][$i]['img']="null"; else $arr['more'][$i]['img']=$row['picture'];
	$arr['more'][$i]['title']=$row['title'];
    $arr['more'][$i]['img']=substr($arr['more'][$i]['img'],1,strlen($arr['more'][$i]['img'])-1);
    if (strpos($arr['more'][$i]['img'],'emoticons'))
            $arr['more'][$i]['img']="null";
	$i += 1;
}
$arr['passage']['more']=$i;
$sql = "SELECT title,serial,created_time,nickname,browsed,comments,picture FROM `fduroot_article` WHERE category='restaurant' ORDER BY created_time DESC limit 0,4";
$retval = mysqli_query($conn,$sql);
//$arr = array();
$i = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	//$arr['restaurant'][$i]['category'] = $row['category'];
	//$arr['restaurant'][$i]['content'] = $row['content'];
	$arr['restaurant'][$i]['serial']=$row['serial'];
	$arr['restaurant'][$i]['count']=$row['browsed'];
	$arr['restaurant'][$i]['time']=$row['created_time'];
	$arr['restaurant'][$i]['nickname']=$row['nickname'];
	$arr['restaurant'][$i]['commentNum']=$row['comments'];

	if (strlen($row['picture'])==0) $arr['restaurant'][$i]['img']="null"; else $arr['restaurant'][$i]['img']=$row['picture'];
	$arr['restaurant'][$i]['title']=$row['title'];
        $arr['restaurant'][$i]['img']=substr($arr['restaurant'][$i]['img'],1,strlen($arr['restaurant'][$i]['img'])-1);
        if (strpos($arr['restaurant'][$i]['img'],'emoticons'))
                $arr['restaurant'][$i]['img']="null";
	$i += 1;
}
$arr['passage']['restaurant']=$i;
$sql = "SELECT title,serial,created_time,nickname,browsed,comments,picture FROM `fduroot_article` WHERE category='house' ORDER BY created_time DESC limit 0,4";
$retval = mysqli_query($conn,$sql);
//$arr = array();
$i = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	//$arr['house'][$i]['category'] = $row['category'];
	//$arr['house'][$i]['content'] = $row['content'];
	$arr['house'][$i]['serial']=$row['serial'];
	$arr['house'][$i]['count']=$row['browsed'];
	$arr['house'][$i]['time']=$row['created_time'];
	$arr['house'][$i]['nickname']=$row['nickname'];
	$arr['house'][$i]['commentNum']=$row['comments'];

	if (strlen($row['picture'])==0) $arr['house'][$i]['img']="null"; else $arr['house'][$i]['img']=$row['picture'];
	$arr['house'][$i]['title']=$row['title'];
        $arr['house'][$i]['img']=substr($arr['house'][$i]['img'],1,strlen($arr['house'][$i]['img'])-1);
        if (strpos($arr['house'][$i]['img'],'emoticons'))
              $arr['house'][$i]['img']="null";
	$i += 1;
}
$arr['passage']['house']=$i;
$sql = "SELECT title,serial,created_time,nickname,browsed,comments,picture FROM `fduroot_article` WHERE category='classes' ORDER BY created_time DESC limit 0,4";
$retval = mysqli_query($conn,$sql);
//$arr = array();
$i = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	//$arr['classes'][$i]['category'] = $row['category'];
	//$arr['classes'][$i]['content'] = $row['content'];
	$arr['classes'][$i]['serial']=$row['serial'];
	$arr['classes'][$i]['count']=$row['browsed'];
	$arr['classes'][$i]['time']=$row['created_time'];
	$arr['classes'][$i]['nickname']=$row['nickname'];
	$arr['classes'][$i]['commentNum']=$row['comments'];

	if (strlen($row['picture'])==0) $arr['classes'][$i]['img']="null"; else $arr['classes'][$i]['img']=$row['picture'];
	$arr['classes'][$i]['title']=$row['title'];
        $arr['classes'][$i]['img']=substr($arr['classes'][$i]['img'],1,strlen($arr['classes'][$i]['img'])-1);
        if (strpos($arr['classes'][$i]['img'],'emoticons'))
              $arr['classes'][$i]['img']="null";
	$i += 1;
}
$arr['passage']['classes']=$i;
$sql = "SELECT title,serial,created_time,nickname,browsed,comments,picture FROM `fduroot_article` WHERE category='partners' ORDER BY created_time DESC limit 0,4";
$retval = mysqli_query($conn,$sql);
//$arr = array();
$i = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	//$arr['partners'][$i]['category'] = $row['category'];
	//$arr['partners'][$i]['content'] = $row['content'];
	$arr['partners'][$i]['serial']=$row['serial'];
	$arr['partners'][$i]['count']=$row['browsed'];
	$arr['partners'][$i]['time']=$row['created_time'];
	$arr['partners'][$i]['nickname']=$row['nickname'];
	$arr['partners'][$i]['commentNum']=$row['comments'];

	if (strlen($row['picture'])==0) $arr['partners'][$i]['img']="null"; else $arr['partners'][$i]['img']=$row['picture'];
	$arr['partners'][$i]['title']=$row['title'];
        $arr['partners'][$i]['img']=substr($arr['partners'][$i]['img'],1,strlen($arr['partners'][$i]['img'])-1);
        if (strpos($arr['partners'][$i]['img'],'emoticons'))
             $arr['partners'][$i]['img']="null";
	$i += 1;
}
$arr['passage']['partners']=$i;
//$arr['passage']=$passage;
$str = json_encode($arr);
echo "$str";
?>