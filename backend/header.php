<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>backend</title>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="css/extra.css">
		<link href="themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
	    <script type="text/javascript" src="third-party/jquery.min.js"></script>
	    <script type="text/javascript" src="third-party/template.min.js"></script>
	    <script type="text/javascript" charset="utf-8" src="umeditor.config.js"></script>
	    <script type="text/javascript" charset="utf-8" src="umeditor.min.js"></script>
	    <script type="text/javascript" src="lang/zh-cn/zh-cn.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="page-header"><!--标题1-->
				<h2>后台信息系统 <small>欢迎您：<?php
					if(isset($_SESSION["admin"])){
        				echo $_SESSION["admin"];
        			}
					?></small></h2>
			</div>
			<div class="row">
				<div class="panel-group col-md-4" id="accordion" role="tablist" aria-multiselectable="true">
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingOne">
				      <h4 class="panel-title">
				        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><span class="text-success">文章栏目</span></a>
				      </h4>
				    </div>
				    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				      <div class="list-group">
				          <a href="backend-list.php?listid=黑暗之魂3" class="list-group-item"><span class="text-primary">黑暗之魂3</span></a>
						  <a href="backend-list.php?listid=巫师3" class="list-group-item"><span class="text-primary">巫师3</span></a>
						  <a href="backend-list.php?listid=GTA5" class="list-group-item"><span class="text-primary">GTA5</span></a>
						  <a href="backend-list.php?listid=看门狗2" class="list-group-item"><span class="text-primary">看门狗2</span></a>
						  <a href="backend-list.php?listid=古墓丽影：崛起" class="list-group-item"><span class="text-primary">古墓丽影：崛起</span></a>
						  <a href="backend-list.php?listid=战地1" class="list-group-item"><span class="text-primary">战地1</span></a>
						  <a href="backend-list.php?listid=使命召唤：无限战争" class="list-group-item"><span class="text-primary">使命召唤：无限战争</span></a>
						  <a href="backend-list.php?listid=生化危机7" class="list-group-item"><span class="text-primary">生化危机7</span></a>
						  <a href="backend-add.php" class="list-group-item panel-footer"><span class="text-primary">发布文章</span></a>
				      </div>
				    </div>
				  </div>
				</div>