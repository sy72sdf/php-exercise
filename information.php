<?php
	include "header.php";	
	$conn = new mysqli("localhost","root","root","phpwork");
	if($conn->connect_error){
		die("链接数据库失败");
	}
?>
			<ol class="breadcrumb">
  				<li><a href="index.php">首页</a></li>
  				<li class="active">游戏资讯</li>
			</ol>
		</div>
		<div class="container">
			<?php
			$darksql = "SELECT * FROM article where a_column='黑暗之魂3' limit 4";	
			$darkresult = $conn->query($darksql);
			$wildsql = "SELECT * FROM article where a_column='巫师3' limit 4";
			$wildresult = $conn->query($wildsql);
			$gtasql = "SELECT * FROM article where a_column='GTA5' limit 4";
			$gtaresult = $conn->query($gtasql);
			$dogsql = "SELECT * FROM article where a_column='看门狗2' limit 4";
			$dogresult = $conn->query($dogsql);
			?>
			<div class="col-md-6">
				<div class="list-group">
				  <a href="list.php?listid=2&page=1" class="list-group-item list-group-item-success ">
				    <span class="glyphicon glyphicon-list"></span> 黑暗之魂3
				  </a>
				  <?php
				  	if($darkresult->num_rows>0){
					while($darkrow = $darkresult->fetch_assoc()){	
				  ?>
				  <a href="content.php?contentid=<?php echo $darkrow["id"]; ?>" class="list-group-item"><?php echo $darkrow["title"] ?></a>
				  <!--<a href="#" class="list-group-item">欢迎加入竞技比赛第五赛季</a>
				  <a href="#" class="list-group-item">新地图“地平线”月球基地前瞻</a>
				  <a href="#" class="list-group-item">《守望先锋》自创比赛功能上线</a>-->
				 <?php
					}
				}	
				?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="list-group">
				  <a href="list.php?listid=1&page=1" class="list-group-item list-group-item-info ">
				    <span class="glyphicon glyphicon-list"></span> 巫师3
				  </a>
				  <?php
				  	if($wildresult->num_rows>0){
					while($wildrow = $wildresult->fetch_assoc()){	
				  ?>
				  <a href="content.php?contentid=<?php echo $wildrow["id"]; ?>" class="list-group-item"><?php echo $wildrow["title"] ?></a>
				  <!--<a href="#" class="list-group-item">CS:GO顶级赛事落户中国 电竞产业发展盛况空前</a>
				  <a href="#" class="list-group-item">三分父爱 Tyloo拿下CS:GO Major资格赛门票</a>
				  <a href="#" class="list-group-item">CS:GO Minor亚洲锦标赛解说与你讲述电竞之路</a>-->
				   <?php
					}
				}	
				?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="list-group">
				  <a href="list.php?listid=4&page=1" class="list-group-item list-group-item-warning ">
				    <span class="glyphicon glyphicon-list"></span> GTA5
				  </a>
				  <?php
				  	if($gtaresult->num_rows>0){
					while($gtarow = $gtaresult->fetch_assoc()){	
				  ?>
				  <a href="content.php?contentid=<?php echo $gtarow["id"]; ?>" class="list-group-item"><?php echo $gtarow["title"] ?></a>
				  <!--<a href="#" class="list-group-item">壕!丁俊晖开百万豪车网吧打游戏 Dota2水平不俗</a>
				  <a href="#" class="list-group-item">DOTA2加入TI7昆卡声望物品 大招召唤鲨鱼特效帅炸!</a>
				  <a href="#" class="list-group-item">DOTA2震中杯:EG苏跳跳各种绝活戏耍IG,IG低迷遭失利</a>-->
				  <?php
					}
				}	
				?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="list-group">
				  <a href="list.php?listid=3&page=1" class="list-group-item active ">
				    <span class="glyphicon glyphicon-list"></span> 看门狗2
				  </a>
				  <?php
				  	if($dogresult->num_rows>0){
					while($dogrow = $dogresult->fetch_assoc()){	
				  ?>
				  <a href="content.php?contentid=<?php echo $dogrow["id"]; ?>" class="list-group-item"><?php echo $dogrow["title"] ?></a>
				  <!--<a href="#" class="list-group-item">英雄联盟新客户端闪退 360查杀木马轻松修复</a>
				  <a href="#" class="list-group-item">《无畏》宣传片公开 前《英雄联盟》工作室制作</a>
				  <a href="#" class="list-group-item">《英雄联盟》公布史上最大改动:符文系统取消</a>-->
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

