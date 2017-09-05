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
		<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="../css/extra.css">
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
      				<a href="../index.php" class="navbar-brand">首页</a>
				</div>
				 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      				<ul class="nav navbar-nav">
        				<li><a href="../information.php">游戏资讯</a></li>
        				<li><a href="../list.php?page=1">全部攻略</a></li>
        				<li><a href="../choose.php">游戏选择</a></li>
        				<li><a href="../vote.php">投票</a></li>
        				<li><a href="../search.php">搜索</a></li>
        				<?php
        					if(isset($_SESSION["username"])){
        						echo '<li><a href="#">欢迎用户：'.$_SESSION["username"].'</a></li>';
        						echo '<li><a href="logout.php">注销</a></li>';
        					}else if(isset($_COOKIE["user"])){
        						echo '<li><a href="#">欢迎用户：'.$_COOKIE["user"].'</a></li>';
        						echo '<li><a href="logout.php">注销</a></li>';
        					}else if(isset($_SESSION["nosave"])){
        						echo '<li><a href="#">欢迎用户：'.$_SESSION["nosave"].'</a></li>';
        						echo '<li><a href="logout.php">注销</a></li>';
        					}else{
        						echo '<li><a href="../register.php">注册</a></li>';
     							echo '<li><a href="../login.php">登录</a></li>';
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
				      <img src="../img/timg1.jpg" alt="pic1">
				      <div class="carousel-caption">
				      </div>
				    </div>
				    <div class="item">
				      <img src="../img/timg2.jpg" alt="pic2">
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
			</div>

<?php
	
	
	$conn = new mysqli("localhost","root","root","phpwork");
	if($conn->connect_error){
		die("链接失败");
	}
	$search = "";
	if(!empty($_GET["search"])){
		$search = $_GET["search"];
	}
	
	//$pages = "";
	$pagesize = 3;
	
	if(!empty($_GET["page"])){
		$pages = $_GET["page"];
		$pages = ($pages-1)*$pagesize;
	}else{
		$pages = 0;	
	}
	
	$sql = "select * from article where title like '%$search%' order by id desc limit $pages,$pagesize";  // 模糊匹配
	$sumsql = "select * from article where title like '%$search%' ";
	$result = $conn->query($sql);
	$sumresult = $conn->query($sumsql);
	$sum = $result->num_rows;
	$sumsum = $sumresult->num_rows;
	//echo $pages;
?>
	
	<ol class="breadcrumb">
      <li><a href="../index.php">首页</a></li>
      <li class="active">一共查询到<?php echo $sumsum; ?>条信息</li>
    </ol>
    <h1 class="page-header">查询结果</h1>
    <ul class="container-fluid list-unstyled list-li">
    	<?php
        	if($sum>0){
				while($row=$result->fetch_assoc()){
		
		?>
      <li class="row">
        <a href="../content.php?contentid=<?php echo $row["id"]; ?>" class="col-md-10"><?php echo $row["title"]; ?></a>
        <span class=" col-md-2"><?php echo $row["time"]; ?></span>
      </li>
      <?php
      			}	
			}
	  ?>
    <nav aria-label="Page navigation" class="text-center">
      <ul class="pagination">
        <li>
        	 <?php
			   if(!empty($_GET["page"])){
				$pg = $_GET["page"]-1;
				if($pg<=0){
					$pg=1;
				}
				$next = $_GET["page"]+1;
				if($next>= ceil($sumsum/$pagesize)){
					$next = ceil($sumsum/$pagesize);
				}
			}else{
				$pg = 1;
				if(ceil($sumsum/$pagesize)<2){
					$next = 1;	
				}else{
					$next = $pg+1;
				}
					
			}
			?>
          <a href="<?php echo $_SERVER['PHP_SELF']; echo "?search=$search&page=".$pg; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <?php
		    for($x = 0; $x<ceil($sumsum/$pagesize); $x++){
				$y = $x+1;
		?>
        <li><a href="<?php echo $_SERVER['PHP_SELF']; echo "?search=$search&page=$y"; ?>"><?php echo $y; ?></a></li>
         <?php
			}
		?>
        <li>
          <a href="<?php echo $_SERVER['PHP_SELF'];echo "?search=$search&page=".$next; ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>


<div class="container">
			<div class="panel-footer">Copyright &copy;1999-2016.北京中公教育科技股份有限公司 All Rights Reserved. 京ICP证161188号</div>
		</div>
	</body>
	<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</html>