<?php
	if($_SERVER['REQUEST_METHOD']=="POST"){
		if(!empty($_POST["title"])&&!empty($_POST["column"])&&!empty($_POST["describe"])&&!empty($_POST["keyword"])&&!empty($_POST["content"])){
			$title = $_POST["title"];
			$column = $_POST["column"];
			$describe = $_POST["describe"];
			$keyword = $_POST["keyword"];
			$content = $_POST["content"];
			$artid = $_POST["artid"];
			
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
	$sql = "SELECT * FROM article";
	$result = $connect->query($sql);
	if($result->num_rows>0){
		$row=$result->fetch_assoc();
	};
	
	if(!empty($_FILES["pic"]["name"])){
		$updatesql = "UPDATE article SET title='$title',a_column='$column',a_describe='$describe',keyword='$keyword',content='$content',pic='$imgName' WHERE id='$artid'";
	}else{
		$updatesql = "UPDATE article SET title='$title',a_column='$column',a_describe='$describe',keyword='$keyword',content='$content' WHERE id='$artid'";
	}
	//$updatesql = "UPDATE ceshi SET name='$title' WHERE id='$artid'";
	
	
	if(mysqli_query($connect,$updatesql)){
		if(mysqli_affected_rows($connect)==0){
			$Err = "无法找到需要修改的文章ID";
		}else{
			$Err = "对应ID文章修改成功";
		};
		//echo "受影响的行数: " . mysqli_affected_rows($connect);
	}else{
		$Err = "无法找到需要修改的文章ID";
		//echo "213";
	};
	$connect->close();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>跳转页面</title>
<style>
*{margin:0; padding:0;}
.box{width:400px; height:200px; border:1px solid #ccc; position:absolute; left:50%; top:50%; margin:-100px 0 0 -200px;}
.box h2{line-height:40px; color:#fff; background:#333; text-align:center; font-size:22px;}
.box p{text-align:center; padding:40px 0 20px; font-weight:bold; font-size:18px; color:#f00;}
.box h4{padding:10px 50px; font-size:14px; font-weight:normal; text-align:center;}
</style>
</head>
<body>
<div class="box">
	<h2>提示内容</h2>
    <p><?php echo $Err; ?></p>
    <h4>页面自动 <a id="href" href="backend-list.php?listid=<?php echo $row["a_column"] ?>">跳转</a> 等待时间： <b id="wait">3</b></h4>
</div>
<script>
window.onload = function(){
	var wait = document.getElementById("wait");	
	var href = document.getElementById("href").href;
	
	setInterval(function(){
		wait.innerHTML--;
		if(wait.innerHTML<=0){
			window.location=href;
		}	
	},1000);
}
</script>
</body>
</html>