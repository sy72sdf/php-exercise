<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>work</title>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="css/extra.css">
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top"><!--标题-->
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
       	 				<span class="sr-only">Toggle navigation</span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
      				</button>
      				<a href="index.php" class="navbar-brand">首页</a>
				</div>
				 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      				<ul class="nav navbar-nav">
        				<li><a href="information.php">游戏资讯</a></li>
        				<li><a href="list.php?page=1">全部攻略</a></li>
        				<li><a href="choose.php">游戏选择</a></li>
        				<li><a href="vote.php">投票</a></li>
        				<li><a href="search.php">搜索</a></li>
        				<?php
        					if(isset($_SESSION["username"])){
        						echo '<li><a href="#">欢迎用户：'.$_SESSION["username"].'</a></li>';
        						echo '<li><a href="php/logout.php">注销</a></li>';
        					}else if(isset($_COOKIE["user"])){
        						echo '<li><a href="#">欢迎用户：'.$_COOKIE["user"].'</a></li>';
        						echo '<li><a href="php/logout.php">注销</a></li>';
        					}else if(isset($_SESSION["nosave"])){
        						echo '<li><a href="#">欢迎用户：'.$_SESSION["nosave"].'</a></li>';
        						echo '<li><a href="php/logout.php">注销</a></li>';
        					}else{
        						echo '<li><a href="register.php">注册</a></li>';
     							echo '<li><a href="login.php">登录</a></li>';
        					};
        				?>
        				<!--<li><a href="register.php">注册</a></li>
        				<li><a href="login.php">登录</a></li>-->
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">关于我们</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container mar">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
				  </ol>
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				    <div class="item active">
				      <img src="img/timg1.jpg" alt="pic1">
				      <div class="carousel-caption">
				      </div>
				    </div>
				    <div class="item">
				      <img src="img/timg2.jpg" alt="pic2">
				      <div class="carousel-caption">
				      </div>
				    </div>
				  </div>
				  <!-- Controls -->
				  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
			</div><!--轮播图-->
