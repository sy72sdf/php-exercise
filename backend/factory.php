<?php
	session_start();
	if($_SERVER['REQUEST_METHOD']=="POST"){
		if(!empty($_POST["username"])&&!empty($_POST["password"])){
			$username = $_POST["username"];
			$password = $_POST["password"];
			$_SESSION["admin"] = $username;
		}else{
			$Err = "用户名/密码不能为空!";
			$type = "adminfaile";
			include "../php/tips.php";
			exit;
		};
	};
	//连接数据库
	$connect = new mysqli("localhost","root","root","phpwork");
	if($connect->connect_error){
		die("数据库连接失败");
	};
	$sql = "SELECT * FROM admin where username = '$username'";
	$result = $connect->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			if($password == $row["password"]){
				$Err = "管理员上线";
				$type = "adminonline";
				include "../php/tips.php";
				exit;
			}else{
				$Err = "账号密码错误！";
				$type = "adminfaile";
				include "../php/tips.php";
				exit;
			};
		};
	}else{
		$Err = "账号不存在！";
		$type = "adminfaile";
		include "../php/tips.php";
		exit;
	};
	$connect->close();
?>