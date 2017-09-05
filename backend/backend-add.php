<?php
	include "header.php";
	?>
				<div class="panel panel-default col-md-8">
					<div class="panel-body">
					<form method="post" action="article-data.php" enctype="multipart/form-data">
						<div class="form-group">
		                	<label for="title" class="control-label">文章标题</label>
		                	<input type="text" id="title" class="form-control" name="title" placeholder="文章标题">
		            	</div>
		            	<div class="form-group">
		                	<label class="control-label">栏目名称</label>
		                	<select class="form-control" name="column">
		                		<option>黑暗之魂3</option>
								<option>巫师3</option>
								<option>GTA5</option>
								<option>看门狗2</option>
								<option>古墓丽影：崛起</option>
								<option>战地1</option>
								<option>使命召唤：无限战争</option>
								<option>生化危机7</option>
							</select>
		            	</div>
		            	<div class="form-group">
		                	<label for="describe" class="control-label">文章描述</label>
		                	<textarea class="form-control" rows="3" id="describe" name="describe"></textarea>
		            	</div>
		            	<div class="form-group">
		                	<label for="keyword" class="control-label">关键词</label>
		                	<input type="text" id="keyword" class="form-control" name="keyword" placeholder="关键词">
		            	</div>
		            	<div class="form-group">
		                	<label for="content" class="control-label">文章内容</label>
		                	<script type="text/plain" id="myEditor" name="content" style="width:100%;height:240px;">
							</script>
		            	</div>
		            	<div class="form-group">
		                	<label class="control-label" for="InputFile">上传缩略图</label>
		                	<input type="file" id="InputFile" name="pic">
		            	</div>
		            	<div class="form-group">
			            	<button type="submit" class="btn btn-success">发布文章</button>
				            <button type="reset" class="btn btn-danger">重置内容</button>
		            	</div>
					</form>
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
	
	<script type="text/javascript">
    //实例化编辑器
	    var um = UM.getEditor('myEditor');
	    um.addListener('blur',function(){
	        $('#focush2').html('编辑器失去焦点了')
	    });
	    um.addListener('focus',function(){
	        $('#focush2').html('')
	    });
	    
	</script>

</html>