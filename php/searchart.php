<?php
header("content-type: text/html;charset=utf-8");
//$userId = $_POST['userId'];
//echo "$userId";
//$targetId = $_POST['targetId'];
//echo "$targetId</br>";
//$paraString=$_SERVER["QUERY_STRING"];
//echo "$paraString";
/*$ordm = $_POST['ordm'];
$ord = $_POST['ord'];*/
$ordm = $_POST['arr'];
//echo "$ordm";
$ord = "DESC";
$searchMethod = $_POST['category'];
//echo "$searchMethod";
//$searchRange = $_POST['searchRange'];
$searchStuff = $_POST['search'];
//echo "$searchMethod";
/* echo "$searchRange";*/
$page = $_POST['page'];
//echo "$searchStuff";
//$searchStuff = urldecode($searchStuff);
//echo "$searchStuff";
/*$searchStuff="托蒂";
 $searchMethod="title";
 $searchRange="individual";*/
//echo "$searchStuff";
$servername = "localhost:3306";
//$targetId = "billy191";
$username = "ghdaudrm_root";
$password = "Tongshang1";
$conn = mysqli_connect($servername, $username, $password, 'ghdaudrm_fduroot');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//mysql_select_db('ghdaudrm_fduroot');
mysqli_query($conn, "set names utf8");
if ($ordm == null) {
    $ordm = "created_time";
    //echo "$ordm";
}
//$sql = "SELECT " + $searchMethod;
//$retval = mysql_query($sql, $conn);
//if ($_post['search']) {
//if ($searchMethod !== 'tag') {
/*	if ($searchRange == 'all') {
		//echo "$targetId";
		//echo "$searchMethod";
		if ($searchStuff !== 'all') {
			$sql = "SELECT category,title,created_time,serial,browsed,content,author_id FROM `fduroot_article` WHERE $searchMethod LIKE '%$searchStuff%' ORDER BY $ordm $ord OFFSET ($page-1)*20 LIMIT 20";

		} else {
			$sql = "SELECT category,title,created_time,serial,browsed,content,author_id FROM `fduroot_article` ORDER BY $ordm $ord OFFSET ($page-1)*20 LIMIT 20";
		}
		//echo "$sql";
	}*/ //else {
//echo "$targetId";
//echo "$searchMethod";
//echo "$searchStuff";
//if ($searchMethod == "category") {
//if ($searchStuff !== 'all') {
$offset = ($page - 1) * 20;
//echo "$searchStuff";
if (isset($searchStuff)) {
    if ($searchStuff !== "") {
        if ($searchMethod !== "search") {
            $sql = "SELECT category,title,created_time,serial,browsed,content,author_id,comments,nickname FROM `fduroot_article` WHERE category='$searchMethod' AND title LIKE '%$searchStuff%' ORDER BY $ordm $ord LIMIT $offset,20";
            $sqlv = "select count(*) from fduroot_article WHERE category='$searchMethod' AND title LIKE '%$searchStuff%'";

        } else {
            $sql = "SELECT category,title,created_time,serial,browsed,content,author_id,comments,nickname FROM `fduroot_article` WHERE title LIKE '%$searchStuff%' ORDER BY $ordm $ord LIMIT $offset,20";
            $sqlv = "select count(*) from fduroot_article WHERE title LIKE '%$searchStuff%'";
        }
        //echo "$sql";
    } else {
        if ($searchMethod !== "search") {
            $sql = "SELECT category,title,created_time,serial,browsed,content,author_id,comments,nickname FROM `fduroot_article` WHERE category='$searchMethod' ORDER BY $ordm $ord LIMIT $offset,20";
            $sqlv = "select count(*) from fduroot_article WHERE category='$searchMethod'";
        } else {
            $sql = "SELECT category,title,created_time,serial,browsed,content,author_id,comments,nickname FROM `fduroot_article` ORDER BY $ordm $ord LIMIT $offset,20";
            $sqlv = "select count(*) from fduroot_article";
        }
        //echo "$sql";
    }
} else {
    $sql = "SELECT category,title,created_time,serial,browsed,content,author_id,comments,nickname FROM `fduroot_article` ORDER BY $ordm $ord LIMIT $offset,20";
    $sqlv = "select count(*) from fduroot_article";
    //echo "$sql";
}
//echo "$sql";
//}
/* else {
    if ($searchStuff !== 'all') {
        $sql = "SELECT category,title,created_time,serial,browsed,content,author_id FROM `fduroot_article` WHERE author_id='$targetId' AND $searchMethod LIKE '%$searchStuff%' ORDER BY $ordm $ord OFFSET ($page-1)*20 LIMIT 20";
    } else {
        $sql = "SELECT category,title,created_time,serial,browsed,content,author_id FROM `fduroot_article` WHERE author_id='$targetId' ORDER BY $ordm $ord OFFSET ($page-1)*20 LIMIT 20";
    }
    //echo "$sql";
    //echo "success";
    //echo "$sql";
}*/
//}
//echo "$sqlv</br>";
$value = mysqli_fetch_array(mysqli_query($conn, $sqlv));
$retval = mysqli_query($conn, $sql);
/*if (!$retval) {
 echo "fail";
 die('Could not get data:' . mysql_error());
 }*/
//while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {

//}
//var_dump($retval);
$arr = array();
$arr1 = array();
$i1 = 0;
$i2 = 0;
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
    $au_id=$row['author_id'];
    $sql1="SELECT auth FROM fduroot_user WHERE user_id='$au_id'";
    $retval1 = mysqli_query($conn, $sql1);
    $f=false;
    while ($row1 = mysqli_fetch_array($retval1, MYSQLI_ASSOC)) {
        if ($row1['auth']=="true") {
            $f=true;
        }
    }
    if ($f) {
        $arr1[$i2] = array();
        $arr1[$i2]['title'] = $row['title'];
        $arr1[$i2]['time'] = $row['created_time'];
        $arr1[$i2]['serial'] = $row['serial'];
        $arr1[$i2]['cate'] = $row['category'];
        $arr1[$i2]['readAmount'] = $row['browsed'];
        $arr1[$i2]['commentNum'] = $row['comments'];
        $arr1[$i2]['id']=$row['author_id'];
        $arr1[$i2]['content'] = $row['content'];
        $arr1[$i2]['nickname'] = $row['nickname'];
        $i2 += 1;
    } else {
        $arr[$i1] = array();
        $arr[$i1]['title'] = $row['title'];
        $arr[$i1]['time'] = $row['created_time'];
        $arr[$i1]['serial'] = $row['serial'];
        $arr[$i1]['cate'] = $row['category'];
        $arr[$i1]['readAmount'] = $row['browsed'];
        $arr[$i1]['commentNum'] = $row['comments'];
        $arr[$i1]['id']=$row['author_id'];
        $arr[$i1]['content'] = $row['content'];
        $arr[$i1]['nickname'] = $row['nickname'];
        $i1 += 1;
        //echo $row['title'];

    }
}
$arr_combine = array();
//$tem=floor($value[0]/20)+1;
/*$tem1=$value[0]%20;
echo "$tem1";*/
//$value[0]=(int)($value[0]);
//die($value[0]);
if ($value[0] % 20 == 0) {
    $value[0] = floor($value[0] / 20);
} else $value[0] = floor($value[0] / 20) + 1;
$arr_combine['pageNum'] = (int)$value[0];
$arr_combine['passage'] = $i1+$i2;
$arr_combine['detail'] = $arr;
$arr_combine['notify']=$arr1;
$str = json_encode($arr_combine);
echo $str;
//}
/* else {
	if ($searchRange == 'all') {
		//echo "$targetId";
		//echo "$searchMethod";
		if ($searchStuff !== 'all') {
			$sql = "SELECT title,created_time,serial FROM `tag` WHERE tagname LIKE '%$searchStuff%' ORDER BY $ordm $ord";
		} else {
			$sql = "SELECT title,created_time,serial FROM `tag` ORDER BY $ordm $ord";
		}
	} else {
		//echo "$targetId";
		//echo "$searchMethod";
		//echo "$searchStuff";
		if ($searchStuff !== "all") {
			$sql = "SELECT title,created_time,serial FROM `tag` WHERE author='$targetId' AND tagname LIKE '%$searchStuff%' ORDER BY $ordm $ord";
		} else {
			$sql = "SELECT title,created_time,serial FROM `tag` WHERE author='$targetId' ORDER BY $ordm $ord";
		}
		//echo "success";
		//echo "$sql";
	}
	//echo "$sql</br>";
	$retval = mysql_query($sql, $conn);
	$arr = array();
	$i = 0;
	$cserial = array();
	for ($i = 1; $i <= 10000; $i++) {
		$cserial["" + $i] = false;
	}
	while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
		if ($cserial[$row['serial']] !== true) {
			$arr[$i] = array();
			$arr[$i]['title'] = $row['title'];
			$arr[$i]['created_time'] = $row['created_time'];
			$arr[$i]['serial'] = $row['serial'];
			$cserial[$row['serial']] = true;
			$i += 1;
		}
		//echo $row['title'];
	}
	$str = json_encode($arr);
	echo $str;
	/*if (!$retval) {
	 echo "fail";
	 die('Could not get data:' . mysql_error());
	 }*/
//while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {

//}
//}
//}
?>