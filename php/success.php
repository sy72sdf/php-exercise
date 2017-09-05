<?php
	session_start();
	$cookie=$type="";
	
	if($_SERVER['REQUEST_METHOD']=="POST"){
		if( !empty($_POST["username"]) && !empty($_POST["password"])){  //验证完整性
			$username = $_POST["username"];
			$password = $_POST["password"];
		}else{
			$Err =  "用户名/密码不能为空";
			$type = "登录";
			include "tips.php";	
			exit;
			};
		};
		$connect = new mysqli("localhost","root","root","phpwork");
		if($connect->connect_error){
			die("数据库连接失败");
		};
		$sql = "SELECT * FROM register_data where username = '$username'";
		$result = $connect->query($sql);
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				if($password == $row["password"]){
					if(empty($_POST["cookie"])){
						//$cookie = "不免登录";
						//echo $cookie;
						$_SESSION["nosave"] = $_POST["username"];
						$Err = "登录成功，即将跳转到首页";
						include "tips.php";	
					}else{
						//$cookie = $_POST["cookie"];
						//echo $cookie;
						setcookie("user",$_POST["username"],time()+6000,"/");
						$Err = "登录成功，即将跳转到首页";
						include "tips.php";	
					};
				}else{
					$Err =  "用户名/密码错误！";
					$type = "登录";
					include "tips.php";
					exit;
				};
			};
		}else{
			$Err = "账号不存在！";
			$type = "登录";
			include "tips.php";
			exit;
		};
		$connect->close();
		
//		$prove = fopen("registerdata.txt","r");//验证匹配
//		while($logprove = fgets($prove)){
//			$logdata = explode(";",$logprove);
//			if($username == test_input($logdata[0])&&$password ==test_input($logdata[1])){
//				if(empty($_POST["cookie"])){
//					$cookie = "不免登录";
//					echo $cookie;
//					$_SESSION["nosave"] = $_POST["username"];
//					$Err = "登录成功，即将跳转到首页";
//					include "tips.php";	
//				}else{
//					$cookie = $_POST["cookie"];
//					echo $cookie;
//					setcookie("user",$_POST["username"],time()+6000,"/");
//					$Err = "登录成功，即将跳转到首页";
//					include "tips.php";	
//				};
//				
//				$Err = "登录成功，即将跳转到首页";			
//				include "tips.php";
//				exit;
//			};	
//		};
//			$Err =  "用户名/密码错误！";
//			$type = "登录";
//			include "tips.php";
//	function test_input($data){
//			$data = trim($data);
//			return $data;
//		};
?>
