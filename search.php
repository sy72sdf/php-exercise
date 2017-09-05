<?php
	include "header.php";	
?>
			<ol class="breadcrumb">
  				<li><a href="index.php">首页</a></li>
  				<li class="active">搜索</li>
			</ol>
		</div>
		<div class="container">
				<form class="form-inline form-search text-center setmargin" method="get" action="php/searchdata.php">
        		<div class="form-group">
          			<input type="text" class="form-control" id="search" name="search" placeholder="请输入要搜索的内容">
        		</div>
        		<button type="submit" class="btn btn-default">搜索</button>
      			</form>
		</div>
<?php
	include "foot.php";
?>

