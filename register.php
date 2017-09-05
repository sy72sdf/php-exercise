<?php
	include "header.php";	
?>
			<ol class="breadcrumb">
  				<li><a href="index.php">首页</a></li>
  				<li class="active">注册</li>
			</ol>
			<div class="page-header"><!--标题1-->
				<h2>用户注册</h2>
			</div>
			<form class="form-horizontal" id="form" action="php/register-data.php" method="post">
				<div class="form-group">
                	<label for="username" class="col-sm-2 control-label">用户名</label>
                	<div class="col-sm-10">
                	<input type="text" id="username" name="username" class="form-control" placeholder="6-12位  必须是数字、字符、下划线  必须以字母开头 (一个账号只能注册一次)" >
                	</div>
            	</div>
            	<div class="form-group">
                	<label for="password" class="col-sm-2 control-label">输入密码</label>
                	<div class="col-sm-10">
                	<input type="password" id="password" name="password" class="form-control" placeholder="密码长度为6-16">
                	</div>
            	</div>
            	<div class="form-group">
                	<label for="password2" class="col-sm-2 control-label">确认密码</label>
                	<div class="col-sm-10">
                	<input type="password" id="password2" class="form-control" placeholder="两次输入密码必须一致">
                	</div>
            	</div>
            	<div class="form-group">
                	<label for="email" class="col-sm-2 control-label">E-mail</label>
                	<div class="col-sm-10">
                	<input type="email" id="email" name="email" class="form-control" placeholder="6~18个字符,可使用字母、数字、下划线,需以字母开头 (一个邮箱只能注册一次)">
                	</div>
            	</div>
            	<div class="form-group">
                	<label for="tel" class="col-sm-2 control-label">手机号</label>
                	<div class="col-sm-10">
                	<input type="tel" id="tel" name="tel" class="form-control" placeholder="11位数字,第一位是1 (一个手机号只能注册一次)">
                	</div>
            	</div>
            	<div class="form-group">
                	<label class="col-sm-2 control-label">地区</label>
                	<div class="col-sm-10">
                	<select class="form-control" name="select" id="select">
                		<option disabled="disabled" selected="selected" id="noselect">请选择省份</option>
						<option>北京</option>
						<option>上海</option>
						<option>广州</option>
						<option>台湾</option>
					</select>
					</div>
            	</div>
            	<div class="form-group">
	            	<label class="col-sm-2 control-label">性别</label>
	            	<div class="col-sm-10">
	            	<label class="radio-inline">
	  					<input type="radio" name="sex" value="男" checked="checked"> 男
					</label>
					<label class="radio-inline">
	  					<input type="radio" name="sex" value="女"> 女
					</label>
					</div>
				</div>
				<div class="form-group">
	            	<label class="col-sm-2 control-label">爱好</label>
	            	<div class="col-sm-10">
	            	<label class="checkbox-inline">
	  					<input type="checkbox" name="hobby[]"  value="音乐"> 音乐
					</label>
					<label class="checkbox-inline">
	  					<input type="checkbox" name="hobby[]"  value="旅游"> 旅游
					</label>
					<label class="checkbox-inline">
	  					<input type="checkbox" name="hobby[]"  value="登山"> 登山
					</label>
					</div>
				</div>
				<div class="form-group">
                	<div class="col-sm-10 col-sm-offset-2">
                    	<input type="checkbox" id="agreement"> 阅读并接受 <a data-toggle="modal" data-target="#myModal" href="#">
  《用户协议》</a>
               		</div>
            	</div>
            	<div class="form-group">
	            	<div class="col-sm-10 col-sm-offset-2">
		            	<button type="submit" class="btn btn-success" id="go">注册</button>
		            	<button type="reset" class="btn btn-default">重置</button>
		            	<a class="btn btn-danger" href="login.php" role="button">已有账号，去登陆</a>
	            	</div>
            	</div>
			</form>
		</div>
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">用户协议</h4>
		      </div>
		      <div class="modal-body">
		《腾讯游戏许可及服务协议》（以下简称“本协议”）由您与腾讯游戏服务提供方共同缔结，本协议具有合同效力。请您务必审慎阅读、充分理解各条款内容，特别是免除或者限制腾讯责任的条款、对用户权利进行限制的条款、约定争议解决方式和司法管辖的条款，以及开通或使用某项服务的单独协议。前述限制、免责及争议解决方式和管辖条款可能以黑体加粗或其他合理方式提示您注意。除非您已阅读并接受本协议所有条款，否则您无权使用腾讯游戏服务。您使用腾讯游戏服务即视为您已阅读并同意签署本协议。如果您未满18周岁，请在法定监护人的陪同下阅读本协议，并特别注意未成年人使用条款。
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">我知道了</button>
		      </div>
		    </div>
		  </div>
		</div>
<?php
	include "foot.php";
?>

