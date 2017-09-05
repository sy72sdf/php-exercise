<?php
	include "header.php";
?>
<script>
	function choose(val,num){
		if(window.XMLHttpRequest){
			var xHttp = new XMLHttpRequest();
		}else{
			var xHttp = new ActiveXObject("Microsoft.XMLHTTP");
		};
		xHttp.open("GET","php/choosedata.php?game="+val+"&page="+num);
		xHttp.send();
		xHttp.onreadystatechange = function(){
			if(xHttp.readyState==4 && xHttp.status==200){
				document.getElementById("lists").innerHTML = xHttp.responseText;
			};
		};
	};
</script>

				<ol class="breadcrumb">
  				<li><a href="index.php">首页</a></li>
  				<li class="active">游戏介绍</li>
			</ol>
			<div class="page-header"><!--标题1-->
				<!--<div class="dropdown">
  						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    					请选择想要了解的游戏
    						<span class="caret"></span>
  						</button>
  						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
	    					<li><a href="#">巫师3</a></li>
	    					<li><a href="#">黑暗之魂3</a></li>
	    					<li><a href="#">看门狗2</a></li>
	    					<li><a href="#">侠盗猎车手5</a></li>
	    					<li><a href="#">古墓丽影：崛起</a></li>
	    					<li><a href="#">战地1</a></li>
	    					<li><a href="#">使命召唤：无限战争</a></li>
	    					<li><a href="#">生化危机7</a></li>
  						</ul>
					</div>-->
			<div class="dropdown projects-header page-header">
		      <select class="form-control" style="width:auto;" onChange="choose(this.value,0)">
		          <option value="0">请选择想要了解的游戏</option>
		          <option>巫师3</option>
		          <option>黑暗之魂3</option>
		          <option>看门狗2</option>
		          <option>GTA5</option>
		          <option>古墓丽影：崛起</option>
		          <option>战地1</option>
		          <option>使命召唤：无限战争</option>
		          <option>生化危机7</option>
		     </select>
		    </div>
		    <div id="lists">
			<!--内容-->
    		</div>
			</div>
			
			<!--<div class="row">列表
				<div class="col-xs-6 col-md-3">
					<div class="thumbnail">
						<a href="#"><img src="img/beifen/test.jpg" alt="pic"></a>
					</div>
  				</div>
  				<div class="col-xs-6 col-md-3">
					<div class="thumbnail">
						<a href="#"><img src="img/beifen/test2.jpg" alt="pic"></a>
					</div>
  				</div>
  				<div class="col-xs-6 col-md-3">
					<div class="thumbnail">
						<a href="#"><img src="img/beifen/test3.jpg" alt="pic"></a>
					</div>
  				</div>
  				<div class="col-xs-6 col-md-3">
					<div class="thumbnail">
						<a href="#"><img src="img/beifen/test4.jpg" alt="pic"></a>
					</div>
  				</div>
  				<div class="col-xs-6 col-md-3">
					<div class="thumbnail">
						<a href="#"><img src="img/beifen/test5.jpg" alt="pic"></a>
					</div>
  				</div>
  				<div class="col-xs-6 col-md-3">
					<div class="thumbnail">
						<a href="#"><img src="img/beifen/test6.jpg" alt="pic"></a>
					</div>
  				</div>
  				<div class="col-xs-6 col-md-3">
					<div class="thumbnail">
						<a href="#"><img src="img/beifen/test7.jpg" alt="pic"></a>
					</div>
  				</div>
  				<div class="col-xs-6 col-md-3">
					<div class="thumbnail">
						<a href="#"><img src="img/beifen/test8.jpg" alt="pic"></a>
					</div>
  				</div>
			</div>-->
		</div>
		<!--<div class="container">
		<nav aria-label="...">
		  <ul class="pager">
		    <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Older</a></li>
		    <li class="next"><a href="#">Newer <span aria-hidden="true">&rarr;</span></a></li>
		  </ul>
		</nav>
		</div>-->
<?php
	include "foot.php";
?>
<script>
	choose(0,0);
</script>
