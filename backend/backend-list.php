<?php
	include "header.php";
	$conn = new mysqli("localhost","root","root","phpwork");
	if($conn->connect_error){
		die("连接数据库出错！");
	}
	
	$pagesize = 3;
	if(!empty($_GET["page"])){
		$pages = $_GET["page"];
		$pages = ($pages-1)*$pagesize;
	}else{
		$pages = 1;	
	}
	
	$listid = $_GET["listid"];	
	$listsql = "SELECT * FROM article where a_column='$listid' limit $pages,$pagesize";
	$listresult = $conn->query($listsql);
	
	$sumsql = "select * from article where a_column='$listid'";
	$sumresult = $conn->query($sumsql);
	$sumsum = $sumresult->num_rows;
	?>
				<div class="col-md-8 table-responsive panel panel-default">
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>文章标题</th>
								<th>发布日期</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if($listresult->num_rows>0){
								while($listrow=$listresult->fetch_assoc()){
							?>
							<tr>
								<td><?php echo $listrow["id"] ?></td>
								<td><?php echo $listrow["title"] ?></td>
								<td><?php echo $listrow["time"] ?></td>
								<td><a id="del" href="delete.php?delid=<?php echo $listrow["id"] ?>">删除</a> <a href="revise.php?reviseid=<?php echo $listrow["id"] ?>">修改</a></td>
							</tr>
							<?php 
									}
								}
							?>
							<!--<tr>
								<td>2</td>
								<td>如何快速获得道具</td>
								<td>2017-06-07 20:00</td>
								<td><a href="#">删除</a> <a href="#">修改</a></td>
							</tr>-->
						</tbody>
					</table>
					<div class="text-center"><!--页数-->
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
						      <a href="<?php echo $_SERVER['PHP_SELF']; echo "?listid=$listid&page=".$pg; ?>" aria-label="Previous">
						        <span aria-hidden="true">&laquo;</span>
						      </a>
						    </li>
						    <?php
							    for($x = 0; $x<ceil($sumsum/$pagesize); $x++){
									$y = $x+1;
							?>
						    <li><a href="<?php echo $_SERVER['PHP_SELF']; echo "?listid=$listid&page=$y"; ?>"><?php echo $y; ?></a></li>
						    <?php
								}
							?>
						    <li>
					        <a href="<?php echo $_SERVER['PHP_SELF'];echo "?listid=$listid&page=".$next; ?>" aria-label="Next">
					        	<span aria-hidden="true">&raquo;</span>
					        </a>
					    	</li>
					  	</ul>
						</nav>
				</div>
				</div>
			</div>	
		</div>
		<div class="container"><!--页脚-->
			<div class="panel-footer">Copyright &copy;1999-2016.北京中公教育科技股份有限公司 All Rights Reserved. 京ICP证161188号</div>
		</div>
	</body>
	<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</html>
