<?php
header("content-type: text/html;charset=utf-8");
//$curl=$_POST['curl'];
//$targetid = $_GET['targetId'];
//echo "$targetid";
$servername = "localhost:3306";
$username = "ghdaudrm_root";
$password = "Tongshang1";
$curl=$_POST['url'];
//$test=$_POST['write'];
//die("$curl");
$conn = mysqli_connect($servername, $username, $password,'ghdaudrm_fduroot');
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
//mysql_select_db('blog');
mysqli_query($conn,"set names utf8");
//if ($_POST['login']) {
	$idtest = $_POST['account'];
	//echo "$idtest";
	$pdtest = $_POST['password'];
	//echo "$pdtest";
	$sql = "SELECT * FROM fduroot_user WHERE user_id='$idtest'";
	$retval = mysqli_query($conn,$sql);
	//echo "$retval";
	if (!$retval) {
		echo "fail";
		die('Could not get data:' . mysqli_error());
	}
	$fail = true;
	$arr = array();
	while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
		if ($row['password'] == $pdtest) {
			//echo "<script>alert('登陆成功');</script>";
			/*session_start();
			 session_register("userid");
			 $_SESSION['userid']=1;
			 $lifeTime = 3600;
			 setcookie(session_name(), session_id(), time() + $lifeTime, "/");*/
			//echo "1";
			//$tid=$_SESSION['userid'];
			//echo "$tid";
			//echo "<script>alert({$row['userid']});</script>";
			//setcookie("userid",$row['userid'],time()+3600);
			$nicknm=$row['nickname'];
			//die($nicknm);
			$fail = false;
			//echo "<script>location.href=$curl;</script>";
		} else {
			echo "login failed";
			//$curl = "../index.html";
			//$curl=$_SERVER['PHP_SELF'];
			echo "<script>alert('Login failed');location.href='$curl';</script>";
			//die("Login failed" . mysqli_error());
		}
	}
	//$fail=true;
	if ($fail) {
		echo "login failed";
		echo "<script>alert('Login failed');</script>";
		die("Login failed" . mysqli_error());
	} else {
		//if (!isset($targetid)) $targetid=$idtest;
		setcookie('userid',$idtest,time()+3600,"/v3.1");
		setcookie('nickname',$nicknm,time()+3600,"/v3.1");
		//die("test");
		$cookie=$_COOKIE['userid'];
		//die("$cookie");
		//$curl = "../index.html";
		//$curl=$_SERVER['PHP_SELF'];
		if ($_POST['write']!=null) {
			$cate=$_POST['write'];
			$curl="../write.html?cate=".$cate;
		}
		echo "<script>location.href='$curl';</script>";
	}
//}
?>

