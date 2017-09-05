<?php
	session_start();//开启session
	$type = "";
	$username = $password = $email = $tel = $select = $sex = "";//表单验证
	$Err ="";
	$jumpUrl = "../register.php";
	if($_SERVER['REQUEST_METHOD']=="POST"){ 
		if( !empty(test_input($_POST["username"]))){  //用户名验证
			$username = test_input($_POST["username"]);
			if(!preg_match("/^[a-zA-Z]\w+$/",$username)){
				$Err = "用户名格式不正确";
				include "tips.php";
				exit;
			}
		}else{
			$Err =  "用户名不能为空";	
			include "tips.php";
			exit;
		};
		
		if(!empty(test_input($_POST["email"]))){ //邮箱验证
			$email = test_input($_POST["email"]);
			if(!preg_match("/^\w+\@\w+\.\w+$/",$email)){
				$Err = "邮箱格式不正确";
				include "tips.php";
				exit;
			};
		}else{
			$Err =  "邮箱不能为空";
			include "tips.php";
			exit;
		};
		if(!empty(test_input($_POST["password"]))){ //密码验证
			$password = test_input($_POST["password"]);
		}else{
			$Err =  "密码不能为空";
			include "tips.php";
			exit;
		};
		if(!empty(test_input($_POST["tel"]))){
			$tel = test_input($_POST["tel"]);
			if(!preg_match("/^1[3|4|5|6|7|8][0-9][0-9]{8}$/",$tel)){ //手机号验证
				$Err = "手机号格式不正确";
				include "tips.php";
				exit;
			}
		}else{
			$Err =  "手机号不能为空";
			include "tips.php";
			exit;
		};
//$filesave = fopen("registerdata.txt","a+");
//写入数据
//fwrite($filesave,$username.";".$password.";".$email.";".$tel.";".$select.";".$sex.";".hobby($hobby)."\r\n");	
//		$Err = "注册成功！即将自动登录！";			
//		$_SESSION["username"] = $username;//设置session
//		include "tips.php";
//		while($datasave = fgets($filesave)){
//			$dataarray = explode(";",$datasave);
//			if($username == $dataarray[0]){
//				$Err = "用户名已存在，请重新注册！";
//				include "tips.php";
//				exit;
//			}elseif($email == $dataarray[2]){
//				$Err = "该邮箱已被注册！";
//				include "tips.php";
//				exit;
//			}elseif($tel == $dataarray[3]){
//				$Err = "该手机号已被注册!";
//				include "tips.php";
//				exit;
//			};
//		};
		
		if(!empty(test_input($_POST["select"]))){ //省份验证
			$select = test_input($_POST["select"]);
		}
		else{
			$Err = "地区不能为空";
			include "tips.php";
			exit;
		};
		
		$sex = test_input($_POST["sex"]);
		
		if(empty($_POST["hobby"])){
			$hobby = "无";
		}else{
			$hobby = "";
			for($x=0; $x<count($_POST["hobby"]); $x++){
				$hobby .= $_POST["hobby"][$x]." ";
			};
		};
		
	};
	//连接数据库
		$connect = new mysqli("localhost","root","root","phpwork");
		if($connect->connect_error){
		die("链接数据库失败！");
		};
		//检验数据库
		$sql = "SELECT username FROM register_data";
		$result = $connect->query($sql);
	
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){
				if($username==$row["username"]){
					$Err = "用户名已存在，请重新注册！";
					include "tips.php";
					exit;	
					};
					$registerdata = "INSERT INTO register_data(username,password,email,tel,area,sex,hobby) VALUES('$username','$password','$email','$tel','$select','$sex','$hobby')";
					if(mysqli_query($connect,$registerdata)){
					$Err = "注册成功！即将自动登录！";			
					$_SESSION["username"] = $username;//设置session
					include "tips.php";
					exit;
				};
			}
		}else{
			$registerdata = "INSERT INTO register_data(username,password,email,tel,area,sex,hobby) VALUES('$username','$password','$email','$tel','$select','$sex','$hobby')";
			if(mysqli_query($connect,$registerdata)){
				$Err = "注册成功！即将自动登录！";			
				$_SESSION["username"] = $username;//设置session
				include "tips.php";
			};
			$connect->close();
		};
	
	function test_input($data){ // 对输入信息进行过滤
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	};

	
?>