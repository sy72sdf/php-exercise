<?php
	include "header.php";	
	$conn = new mysqli("localhost","root","root","phpwork");
	if($conn->connect_error){
		die("链接数据库失败");
	};
	$sql = "select * from article order by id asc limit 8";
	$result = $conn->query($sql);
?>
			<div class="page-header"><!--标题1-->
				<h2>大型游戏推荐</h2>
				<p>3A级游戏定义:A级质量、A级投入、A级风险。</p>
			</div>
			<div class="row"><!--列表-->
				<?php
	        		if($result->num_rows>0){
					while($row=$result->fetch_assoc()){
				?>
				<div class="col-xs-6 col-md-3">
					<div class="thumbnail">
						<a href="content.php?contentid=<?php echo $row["id"]; ?>" title="<?php echo $row["title"]; ?>" ><img src="img/<?php echo $row["pic"]; ?>" alt="pic"></a>
						<div class="caption">
							<h3 class="text-primary"><a href="content.php?contentid=<?php echo $row["id"]; ?> " title="<?php echo $row["title"]; ?>"><?php echo mb_substr($row["title"],0,9); ?></a><br /><small><?php echo $row["keyword"]; ?></small></h3>
							<p><?php echo mb_substr($row["a_describe"],0,80); ?></p>
						</div>
					</div>
  				</div>
  				<?php
		        	}
					}else{
						echo "查询到0条数据";	
					}
				?>
  				<!--<div class="col-xs-6 col-md-3">
					<div class="thumbnail">
						<a href="#"><img src="img/test2.jpg" alt="pic"></a>
						<div class="caption">
							<h3 class="text-primary">黑暗之魂3<br /><small>火之世界的落幕</small></h3>
							<p>《黑暗之魂3》是由FromSoftware公司开发的一款动作角色扮演类游戏，是《黑暗之魂》系列的游戏之一，于2016年03月24日发行。</p>
						</div>
					</div>
  				</div>
  				<div class="col-xs-6 col-md-3">
					<div class="thumbnail">
						<a href="#"><img src="img/test3.jpg" alt="pic"></a>
						<div class="caption">
							<h3 class="text-primary">看门狗2<br /><small>科技之都旧金山</small></h3>
							<p>看门狗2是由育碧公司开发的一款第三人称射击角色扮演游戏，游戏登陆PC、 PlayStation 4和Xbox One平台，在2016年11月份发行。</p>
						</div>
					</div>
  				</div>
  				<div class="col-xs-6 col-md-3">
					<div class="thumbnail">
						<a href="#"><img src="img/test4.jpg" alt="pic"></a>
						<div class="caption">
							<h3 class="text-primary">侠盗猎车手5<br /><small>欢迎来到洛圣都</small></h3>
							<p>《侠盗猎车手5》（G T A 5），是由Rockstar Games游戏公司出版发行的一款围绕犯罪为主题的开放式动作冒险游戏。</p>
						</div>
					</div>
  				</div>
  				<div class="col-xs-6 col-md-3">
					<div class="thumbnail">
						<a href="#"><img src="img/test5.jpg" alt="pic"></a>
						<div class="caption">
							<h3 class="text-primary">古墓丽影：崛起<br /><small>劳拉的探险之旅</small></h3>
							<p>《古墓丽影：崛起》是由Crystal Dynamics开发，Square Enix负责发行的一款单机类动作冒险游戏，于2015年12月正式发行。</p>
						</div>
					</div>
  				</div>
  				<div class="col-xs-6 col-md-3">
					<div class="thumbnail">
						<a href="#"><img src="img/test6.jpg" alt="pic"></a>
						<div class="caption">
							<h3 class="text-primary">战地1<br /><small>重回一战</small></h3>
							<p>《战地1》是一款由EA DICE开发的以及由Electronic Arts发行的一款第一人称射击类游戏，于2016年10月21日发行。</p>
						</div>
					</div>
  				</div>
  				<div class="col-xs-6 col-md-3">
					<div class="thumbnail">
						<a href="#"><img src="img/test7.jpg" alt="pic"></a>
						<div class="caption">
							<h3 class="text-primary">使命召唤：无限战争<br /><small>高科技战争来临</small></h3>
							<p>《使命召唤：无限战争》 是由Infinity Ward开发，并由Activision发行的一款第一人称射击类游戏，于2016年11月4日发行。</p>
						</div>
					</div>
  				</div>
  				<div class="col-xs-6 col-md-3">
					<div class="thumbnail">
						<a href="#"><img src="img/test8.jpg" alt="pic"></a>
						<div class="caption">
							<h3 class="text-primary">生化危机7<br /><small>经典恐怖游戏新作</small></h3>
							<p>《生化危机7》是日本卡普空（CAPCOM）制作的生存恐怖类游戏《生化危机》数字编号系列第八部。游戏于2017年1月24日发售。</p>
						</div>
					</div>
  				</div>-->
			</div>
			<div class="page-header"><!--标题2-->
				<h2>游戏购买包推荐</h2>
				<p>整合起来的游戏购买包比单独购买每一款游戏花费要更低。</p>
			</div>
			<div class="table-responsive"><!--表格-->
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="col-md-2">礼包种类</th>
						<th class="col-md-2">包含内容</th>
						<th class="col-md-6">价格</th>
						<th class="col-md-2">购买</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>超值大礼包</td>
						<td>所有上述游戏</td>
						<td>优惠价：<span class="glyphicon glyphicon-yen" aria-hidden="true"></span>800 <del>原价：1600</del></td>
						<td><button type="button" class="btn btn-danger">点击购买</button></td>
					</tr>
					<tr>
						<td>豪华大礼包</td>
						<td>所有上述游戏+全DLC</td>
						<td>优惠价：<span class="glyphicon glyphicon-yen" aria-hidden="true"></span>1600 <del>原价：2400</del></td>
						<td><button type="button" class="btn btn-danger">点击购买</button></td>
					</tr>
				</tbody>
			</table>
			</div>
		</div>
<?php
	include "foot.php";
	
?>
