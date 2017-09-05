<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>backenlogin</title>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="css/extra.css">
	</head>
	<body>
		<div class="container-fluid bg-primary">
			<div class="row">
				<h3 class="col-md-12 text-center">后台登录</h3>
			</div>
		</div>
		<div class="container"><!--登录界面-->
			<form class="form-horizontal setmargin" action="factory.php" method="post">
				<div class="form-group">
                	<label for="username" class="col-sm-4 control-label">用户名</label>
                	<div class="col-sm-4">
                	<input type="text" id="username" name="username" class="form-control" placeholder="用户名">
                	</div>
            	</div>
        		<div class="form-group">
                	<label for="password" class="col-sm-4 control-label">密码</label>
                	<div class="col-sm-4">
                	<input type="password" id="password" name="password" class="form-control" placeholder="输入密码">
                	</div>
            	</div>
            	<div class="form-group">
	            	<div class="text-center">
		            	<button type="submit" class="btn btn-success">登录</button>
	            	</div>
            	</div>
      		</form>
		</div>
	</body>
	<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</html>
