<?php
	include "header.php";	
?>
			<ol class="breadcrumb">
  				<li><a href="index.php">首页</a></li>
  				<li class="active">投票</li>
			</ol>
			<div class="page-header"><!--标题1-->
				<h2>用户登录</h2>
			</div>
			<form class="form-horizontal" action="php/success.php" method="post">
				<div class="form-group">
                	<label for="username" class="col-sm-2 control-label">用户名</label>
                	<div class="col-sm-10">
                	<input type="text" id="username" name="username" class="form-control" placeholder="用户名">
                	</div>
            	</div>
            	<div class="form-group">
                	<label for="password" class="col-sm-2 control-label">密码</label>
                	<div class="col-sm-10">
                	<input type="password" id="password" name="password" class="form-control" placeholder="输入密码">
                	</div>
            	</div>
            	<div class="form-group">
	            	<div class="col-sm-10 col-sm-offset-2">
	            	<label class="checkbox-inline">
	  					<input type="checkbox" name="cookie" value="十天免登陆"> 十天免登陆
					</label>
					</div>
				</div>
            	<div class="form-group">
	            	<div class="col-sm-10 col-sm-offset-2">
		            	<button type="submit" class="btn btn-success">登录</button>
		            	<button type="reset" class="btn btn-default">重置</button>
		            	<a class="btn btn-danger" href="register.php" role="button">没有账号，去注册</a>
	            	</div>
            	</div>
			</form>
		</div>
<?php
	include "foot.php";
?>

