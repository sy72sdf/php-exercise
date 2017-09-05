<?php
	$listid = "";
	
	if(!empty($_GET["listid"])){
		//echo "123";
		$listid = $_GET["listid"];
		switch($listid){
			case 1:
				$listid = "巫师3";
				break;
			case 2:
				$listid = "黑暗之魂3";
				break;
			case 3:
				$listid = "看门狗2";
				break;
			case 4:
				$listid = "GTA5";
				break;
		}
		//	
	};
	$pagesize = 3;
	
	if(!empty($_GET["page"])){
		$pages = $_GET["page"];
		$pages = ($pages-1)*$pagesize;
	}else{
		$pages = 0;	
	}
	
	include "header.php";	
	
	$conn = new mysqli("localhost","root","root","phpwork");
	if($conn->connect_error){
		die("连接数据库出错！");
	}
	
//	$sql = "SELECT * FROM article where id='$listid'";
//	$result = $conn->query($sql);
	
	if($listid==""){
		$sql = "select * from article order by id desc limit $pages,$pagesize";
		$sumsql = "select * from article";
		$listid = "全部内容";
	}else{
		$sql = "select * from article where a_column='$listid' order by id desc limit $pages,$pagesize";	
		$sumsql = "select * from article where a_column='$listid'";
	}
	
	$sumresult = $conn->query($sumsql);
	$result = $conn->query($sql);
	$i=0;
	
	$sumresult = $sumresult->num_rows;
?>
			<ol class="breadcrumb">
  				<li><a href="index.php">首页</a></li>
  				<li><a href="information.php">游戏资讯</a></li>
  				<li class="active">游戏攻略</li>
			</ol>
			<div class="page-header"><!--标题1-->
				<h2><?php echo $listid; ?></h2>
			</div>
		</div>
		<div class="container">
			<ul class="list-unstyled">
				<?php
				if($result->num_rows>0){
					while($row=$result->fetch_assoc()){
						$i++;
				?>
				<li class="list-unstyled"><a href="content.php?contentid=<?php echo $row["id"]; ?>"><?php echo $row["title"] ?></a><span class="pull-right"><?php echo $row["time"] ?></span></li>
				<?php 
					if($i%5==0){
						echo '<li class="li_line"></li>';
					}
						}
					}
				?>
			</ul>
		</div>
		<div class="container text-center"><!--页数-->
			<nav aria-label="Page navigation">
			<ul class="pagination">
			    <li>
			    	 <?php
			          	if(!empty($_GET["page"])){
							$pg = $_GET["page"]-1;
							if($pg<=0){
								$pg=1;
							}
							$next = $_GET["page"]+1;
							if($next>= ceil($sumresult/$pagesize)){
								$next = ceil($sumresult/$pagesize);
							}
						}else{
							$pg = 1;
							if(ceil($sumresult/$pagesize)<2){
								$next = 1;	
							}else{
								$next = $pg+1;
							}
								
						}
					 ?>
			      <a href="<?php echo $_SERVER['PHP_SELF']; // 获取当前页面URL，不包含？及后面的东西
					if($listid !="全部内容"){   // 等于全部内容的时候，没有listid，不等于的时候有listid
						$listid=$_GET["listid"];
						echo "?listid=$listid&page=".$pg;
					}else{
						echo "?page=".$pg;
					} ?>" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>
			    <?php
		        	for($x = 0; $x<ceil($sumresult/$pagesize); $x++){
						$y = $x+1;
				?>
			    <li><a href="<?php echo $_SERVER['PHP_SELF'];
				if($listid !="全部内容"){
					$listid=$_GET["listid"];
					echo "?listid=$listid&page=$y";
				}else{
					echo "?page=$y";
					} ?>"><?php echo $y; ?></a></li>
			    <?php
					}
				?>
			    <!--<li><a href="#">2</a></li>
			    <li><a href="#">3</a></li>
			    <li><a href="#">4</a></li>
			    <li><a href="#">5</a></li>-->
			    <li>
		        <a href="<?php echo $_SERVER['PHP_SELF'];
				if($listid !="全部内容"){
					$listid=$_GET["listid"];
					echo "?listid=$listid&page=".$next;
				}else{
					echo "?page=".$next;
					} ?>" aria-label="Next">
		        	<span aria-hidden="true">&raquo;</span>
		        </a>
		    	</li>
		  	</ul>
			</nav>
		</div>
<?php
	include "foot.php";
?>
