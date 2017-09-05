<?php
	if(!empty($_GET["contentid"])){
		$contentid = $_GET["contentid"];	
	}else{
		$Err = "文章不存在或已被删除";
		$type="out";
		include "tips.php";
		exit;	
	}
	
	include "header.php";
	
	$conn = new mysqli("localhost","root","root","phpwork");
	if($conn->connect_error){
		die("链接失败");
	}
	
	$sql = "select * from article where id='$contentid'";
	$result = $conn->query($sql);	
	
    if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
					
?>
			<ol class="breadcrumb">
  				<li><a href="index.php">首页</a></li>
  				<li><a href="information.php">游戏资讯</a></li>
  				<li class="active"><?php echo $row["title"]; ?></li>
			</ol>
			<div class="page-header"><!--标题1-->
				<h2 class="text-center"><?php echo $row["title"]; ?></h2>
				<p class="text-center">发布日期:<span class="bg-info"><?php echo $row["time"]; ?></span></p>
			</div>
			<div class="para">
				<?php
					echo $row["content"];
					$column = $row["a_column"];
		        		}
					}else{
						$Err = "文章不存在或已被删除";
						$type=="out";
						include "tips.php";
						exit;		
					}
					$columnsql = "SELECT * FROM article where a_column='$column'";
					$columnrsult = $conn->query($columnsql);
				?>
			</div>
		<div class="col-md-12">
			<div class="list-group">
				  <div class="list-group-item list-group-item-success ">
				    <span class="glyphicon glyphicon-list"></span> 相关文章
				  </div>
				   <?php
		          	if($columnrsult->num_rows>0){
					while($columnrow=$columnrsult->fetch_assoc()){
				  ?>
				  <a href="content.php?contentid=<?php echo $columnrow["id"]; ?>" class="list-group-item"><span class="glyphicon glyphicon-star-empty"></span><?php echo $columnrow["title"]; ?></a>
				  <!--<a href="#" class="list-group-item"><span class="glyphicon glyphicon-star-empty"></span> 欢迎加入竞技比赛第五赛季</a>
				  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-star-empty"></span> 新地图“地平线”月球基地前瞻</a>
				  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-star-empty"></span> 《守望先锋》自创比赛功能上线</a>-->
				  <?php
		          		}
					}
				  ?>
			</div>
		</div>
		</div>
<?php
	include "foot.php";
?>
