<?php
	include "header.php";	
?>
<script>
	function putvote(){
		var voteArr = document.getElementsByName("optionsRadios");
		var voteValue = "";
		for(i=0; i<voteArr.length; i++){
			if(voteArr[i].checked==true){
				voteValue=voteArr[i].value;
			}
		}
		if(window.XMLHttpRequest){
			var xHttp = new XMLHttpRequest();
		}else{
			var xHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xHttp.open("GET","php/voteoperate.php?vote="+voteValue);
		xHttp.send();
		xHttp.onreadystatechange = function(){
			if(xHttp.readyState==4 && xHttp.status==200){
				document.getElementById("show").innerHTML = xHttp.responseText;
			}
		}
	}
	function warning(){
		alert("请先登录！");
		return false;
	}
</script>
			<ol class="breadcrumb">
  				<li><a href="index.php">首页</a></li>
  				<li class="active">投票</li>
			</ol>
		<div id="show">
			<div class="page-header"><!--标题1-->
				<h2>选择你喜欢的游戏</h2>
			</div>
			<form>
			<div class="radio">
			  <label>
			    <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" checked>
			    巫师3：狂猎
			  </label>
			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="optionsRadios" id="optionsRadios2" value="2">
			    黑暗之魂3
			  </label>
			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="optionsRadios" id="optionsRadios2" value="3">
			    看门狗2
			  </label>
			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="optionsRadios" id="optionsRadios2" value="4">
			    GTA5
			  </label>
			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="optionsRadios" id="optionsRadios2" value="5">
			    古墓丽影：崛起
			  </label>
			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="optionsRadios" id="optionsRadios2" value="6">
			    战地1
			  </label>
			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="optionsRadios" id="optionsRadios2" value="7">
			    使命召唤：无限战争
			  </label>
			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="optionsRadios" id="optionsRadios2" value="8">
			    生化危机7
			  </label>
			</div>
			<button type="button" class="btn btn-danger" onclick="putvote()">投票</button>
			</form>
		</div>
		<!--<div class="page-header">标题2
				<h2>各个游戏受欢迎的百分比</h2>
			</div>
			<h3>巫师3：狂猎（80%）</h3>
			<div class="progress">
			  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
			    <span class="sr-only">80% Complete (success)</span>
			  </div>
			</div>
			<h3>黑暗之魂3（60%）</h3>
			<div class="progress">
			  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
			    <span class="sr-only">60% Complete</span>
			  </div>
			</div>
			<h3>看门狗2（40%）</h3>
			<div class="progress">
			  <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
			    <span class="sr-only">40% Complete (warning)</span>
			  </div>
			</div>
			<h3>GTA5（70%）</h3>
			<div class="progress">
			  <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
			    <span class="sr-only">70% Complete (danger)</span>
			  </div>
			</div>
			<h3>古墓丽影：崛起（50%）</h3>
			<div class="progress">
			  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
			    <span class="sr-only">50% Complete (success)</span>
			  </div>
			</div>
			<h3>战地1（65%）</h3>
			<div class="progress">
			  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
			    <span class="sr-only">65% Complete</span>
			  </div>
			</div>
			<h3>使命召唤：无限战争（35%）</h3>
			<div class="progress">
			  <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width: 35%">
			    <span class="sr-only">35% Complete (warning)</span>
			  </div>
			</div>
			<h3>生化危机7（45%）</h3>
			<div class="progress">
			  <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
			    <span class="sr-only">45% Complete (danger)</span>
			  </div>
			</div>-->
		</div>
<?php
	include "foot.php";
?>

