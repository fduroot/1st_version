<?php
header("content-type: text/html;charset=utf-8");
//上传头像，有点懒了，没写css
$uptypes = array('image/jpg', 'image/jpeg', 'image/png', 'image/pjpeg', 'image/gif', 'image/bmp', 'application/x-shockwave-flash', 'image/x-png');
$max_file_size = 5000000;
//设置上传图片的大小限制,多少字节
$destination_folder = "upload/";
//上传的图片保存的文件夹
$imgpreview = 1;
$imgpreviewsize = 1 / 2;
?>
<html>
    <head>
        <title>头像上传</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script src="../js/jquery-2.1.4.min.js"></script>
        <script src="../js/jquery.cookie.js"></script>
        <script>
			$(document).ready(function() {
				var url = document.location.search;
				para = new Array();
				para = url.split('=');
				//获取头像预览
				$('#ret').attr("href", "../personalindex.html" + '?targetId=' + para[1]);
				$.ajax({
					type : "POST",
					url : "getPortrait.php",
					data : {
						userid : para[1]
					},
					dataType : "json",
					success : function(json) {
						$('#image').attr("src", "" + json.portraitname);

					}
				});
			});
			function hi() {
				$('#image').remove();
			}
        </script>
    </head>
    <body>
        <form enctype="multipart/form-data" method="post" name="upform">
            <input name="upfile" type="file">
            <input type="submit" onclick="hi()"value="上传" >
            <a id="ret" href="">返回</a>
        </form><img src="" id="image"></img>
        <?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$file = $_FILES["upfile"];
			//获得上传文件
			$userId = $_GET['userid'];
			//获取用户名
			//echo "$userId";
			if (!file_exists($destination_folder))
				mkdir($destination_folder);
			//获取实际的地址路径
			/*if (!file_exists($destination_folder))
			 mkdir($destination_folder);*/
			//echo "$destination_folder</br>";
			$filename = $file["tmp_name"];
			//获得文件名
			//echo "$filename</br>";
			$image_size = getimagesize($filename);
			//获得图片大小
			$pinfo = pathinfo($file["name"]);
			//需要保存的路径
			//echo "$pinfo</br>";
			$ftype = $pinfo[extension];
			//获得文件拓展名
			//echo "$ftype";
			$destination = $destination_folder . $userId . "." . $ftype;
			//保存的完整路径，包括文件名
			if (file_exists($destination) && $overwrite != true) {//已经存在同名的文件时，删除文件
				unlink($destination);
			}

			if (!move_uploaded_file($filename, $destination)) {//移动文件出错时报错
				echo "<font color='red'>移动文件出错！</a>";
				exit ;
			}

			$pinfo = pathinfo($destination);
			//echo "$destination";
			$fname = $pinfo[basename];

			/*if ($imgpreview == 1) {
			 //echo "<br>图片预览:<br>";
			 echo "<a href=\"" . $destination . "\" target='_blank'><img src=\"" . $destination . "\" width=" . ($image_size[0] * $imgpreviewsize) . " height=" . ($image_size[1] * $imgpreviewsize);
			 echo " border='0'></a>";
			 }*/
			$userid = $_POST['userid'];
			$servername = "localhost:3306";
			$username = "ghdaudrm_root";
			$password = "Tongshang1";
			$conn = mysql_connect($servername, $username, $password);
			if (!$conn) {
				die("Connection failed: " . mysql_error());
			}
			//echo "Connected successfully";
			mysql_select_db('blog');
			mysql_query("set names utf8");
			$sql = "UPDATE userinfo SET portraitname='$destination' WHERE userid='$userId'";
			//echo "$sql";
			$retval = mysql_query($retval, $conn);
		}
        ?>
    </body>
