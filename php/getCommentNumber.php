<?php
header("content-type: text/html;charset=utf-8");
$servername = "localhost:3306";
$username = "ghdaudrm_root";
$password = "Tongshang1";
//$order = $_POST['serial'];
$user=$_POST['userid'];
$conn = mysqli_connect($servername, $username, $password,'ghdaudrm_fduroot');
if (!$conn) {
    die("Connection failed: " . mysqli_error());
}
$user = $_COOKIE['userid'];
//$replier=$_COOKIE['userid'];
//echo "Connected successfully";
//mysql_select_db('blog');
mysqli_query($conn,"set names utf8");
$sql = "SELECT article_serial FROM fduroot_comment WHERE replier_id='$user' AND isread='0' ORDER BY created_time DESC";
$retval = mysqli_query($conn,$sql);
$arr = array();
$i = 1;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
    //$arr[$i]['content'] = $row['content'];
    //$arr[$i]['writer'] = $row['author_id'];
    //$arr[$i]['replier']=$replier;
    //$arr[$i]['time'] = $row['time'];
    //$arr[$i]['ord'] = $row['ord'];
    $serial=$row['article_serial'];
    $arr[$i]['serial']=$serial;
    //$arr[$i]['email']=$row['replier_email'];
    $sql1="SELECT title,category FROM fduroot_article WHERE serial='$serial'";
    $retval1=mysqli_query($conn,$sql1);
    while ($row1 = mysqli_fetch_array($retval1, MYSQLI_ASSOC)) {
        $arr[$i]['title']=$row1['title'];
        $arr[$i]['cate']=$row1['category'];
    }
    /*	$sql2="SELECT nickname FROM fduroot_user WHERE user_id='$userid'";
        $retval2=mysqli_query($conn,$sql2);
        while ($row2 = mysqli_fetch_array($retval2, MYSQLI_ASSOC)) {
            $arr[$i]['writer']=$row2['nickname'];
        }*/
    $i += 1;
}
$arr_combine=array();
$sql="select count(*) from fduroot_comment WHERE replier_id='$user' AND isread='0'";
//echo "$sql";
$value=mysqli_fetch_row(mysqli_query($conn,$sql));
//var_dump(mysqli_fetch_row(mysqli_query($conn,$sql)));
//if ($value%20==0) $value=round($value/20); else $value=round($value/20)+1;
$arr_combine['newMessageNum']=(int)$value[0];
//$arr_combine['passage']=$i;
$arr_combine['detail']=$arr;
$str = json_encode($arr_combine);
//$str = json_encode($arr);
echo $str;
?>