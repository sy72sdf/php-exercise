<?php
	if($_SERVER['REQUEST_METHOD']=="POST"){
		if(!empty($_POST["title"])&&!empty($_POST["column"])&&!empty($_POST["describe"])&&!empty($_POST["keyword"])&&!empty($_POST["content"])){
			$title = $_POST["title"];
			$column = $_POST["column"];
			$describe = $_POST["describe"];
			$keyword = $_POST["keyword"];
			$content = $_POST["content"];
			
			$filetype = $_FILES["pic"]["type"];
			$filesize = $_FILES["pic"]["size"];
			$filename = $_FILES["pic"]["name"];
			$filesaveon = $_FILES["pic"]["tmp_name"];
			$arr = array("image/jpeg","image/jpg","image/png","image/gif");
			if(!empty($_FILES["pic"]["type"])){
			if($_FILES["pic"]["error"]>0){
				$Err = "文件上传过程出错！请检查是否添加图片！";
				$type = "articlefaile";
				include "../php/tips.php";
				exit;
			}elseif($filesize>500000){
				$Err = "文件大小超过限制！";
				$type = "articlefaile";
				include "../php/tips.php";
				exit;
			}elseif(!in_array($filetype,$arr)){
				$Err = "文件类型不是图片！";
				$type = "articlefaile";
				include "../php/tips.php";
				exit;
			}else{
				$splicename = explode(".",$filename);
				$arrtype = array_pop($splicename);
				$imgName = date("Y").date("m").date("d").date("H").date("i").date("s").".".$arrtype;
				$time = date("Y")."-".date("m")."-".date("d")." ".date("H").":".date("i").":".date("s");
				move_uploaded_file($filesaveon,"D:/phpStudy/WWW/Bootstrap-localhost/img/".$imgName);
			}
			}else{
				$imgName = "";
				$time = date("Y")."-".date("m")."-".date("d")." ".date("H").":".date("i").":".date("s");
			};
		}else{
			$Err = "请完整填写各项内容";
			$type = "articlefaile";
			include "../php/tips.php";
			exit;
		};
	};
	
	$connect = new mysqli("localhost","root","root","phpwork");
	if($connect->connect_error){
		die("链接数据库失败！");
	};
	$sql = "INSERT INTO article(title,a_column,a_describe,keyword,content,pic,time) VALUES('$title','$column','$describe','$keyword','$content','$imgName','$time')";
	if(mysqli_query($connect,$sql)){
		$Err = "文章发布成功";
		$type = "articlefaile";
		include "../php/tips.php";
	}else{
		$Err = "数据上传失败";
		$type = "articlefaile";
		include "../php/tips.php";
		exit;
	};
	$connect->close();
	
?>