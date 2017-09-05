<?php
	$conn = new mysqli("localhost","root","root","phpwork");
	if($conn->connect_error){
		die("连接数据库出错！");
	}
	$id = $_GET["reviseid"];	
	$sql = "SELECT * FROM article where id='$id'";
	$result = $conn->query($sql);	
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
					<div class="panel-body">
					<form method="post" action="revise-data.php" enctype="multipart/form-data">
						<div class="form-group">
							<?php
								if($result->num_rows>0){
									while($row=$result->fetch_assoc()){
										
							?>
		                	<label for="title" class="control-label">文章标题</label>
		                	<input type="text" id="title" class="form-control" name="title" value="<?php echo $row["title"] ?>">
		            	</div>
		            	<div class="form-group" style="display: none;">
		                	<label for="artid" class="control-label">ID(不要轻易修改，会覆盖掉同ID数据！)</label>
		                	<input type="text" id="artid" class="form-control" name="artid" value="<?php echo $row["id"] ?>">
		            	</div>
		            	<div class="form-group" style="display: none;">
		                	<!--获取栏目信息-->
		                	<input type="text" id="getcol" class="form-control" value="<?php echo $row["a_column"] ?>">
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
		                	<textarea class="form-control" rows="3" id="describe" name="describe"><?php echo $row["a_describe"] ?></textarea>
		            	</div>
		            	<div class="form-group">
		                	<label for="keyword" class="control-label">关键词</label>
		                	<input type="text" id="keyword" class="form-control" name="keyword" value="<?php echo $row["keyword"] ?>">
		            	</div>
		            	<div class="form-group">
		                	<label for="content" class="control-label">文章内容</label>
		                	<script  type="text/plain" id="myEditor" name="content" style="width:100%;height:240px;" ><?php echo  $row["content"] ?>
							</script>
		            	</div>
		            	<div class="form-group">
		                	<label class="control-label" for="InputFile">上传缩略图</label>
		                	<input type="file" id="InputFile" name="pic">
		            	</div>
		            	<div class="form-group">
			            	<button type="submit" class="btn btn-success">修改文章</button>
				            <button type="reset" class="btn btn-danger">重置内容</button>
				            <a href="backend-list.php?listid=<?php echo $row["a_column"] ?>" type="button" class="btn btn-primary">放弃修改</a>
				            <?php
		                			}
								}		
		                	?>
		            	</div>
		            </form>
		            </div>	
					</div>

<script type="text/javascript">
    //实例化编辑器
    var um = UM.getEditor('myEditor');
    um.addListener('blur',function(){
        $('#focush2').html('编辑器失去焦点了')
    });
    um.addListener('focus',function(){
        $('#focush2').html('')
    });
   
   var oCol =document.getElementsByName('column');
   var aCol =document.getElementById('getcol');
   
   for(var i=0;i<oCol[0].length;i++){
   	if(aCol.value == oCol[0][i].innerHTML){
   		oCol[0][i].selected = "selected";
   		break;
   	};
   } ;
</script>

</body>
</html>