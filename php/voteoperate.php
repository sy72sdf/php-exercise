<?php
$vote = $_REQUEST["vote"];
$filename= "votedata.txt";
$content = file_get_contents($filename);
$arr =explode("|",$content);
	
	$wild = $arr[0];
	$dark = $arr[1];
	$dog = $arr[2];
	$gta = $arr[3];
	$lara = $arr[4];
	$bf = $arr[5];
	$call = $arr[6];
	$evil = $arr[7];
	
switch($vote){
		case 1:
			$wild = $wild+1;
			break;
		case 2:
			$dark = $dark+1;
			break;
		case 3:
			$dog = $dog+1;
			break;
		case 4:
			$gta = $gta+1;
			break;
		case 5:
			$lara = $lara+1;
			break;
		case 6:
			$bf = $bf+1;
			break;
		case 7:
			$call = $call+1;
			break;
		case 8:
			$evil = $evil+1;
			break;
};
	$voteStr = $wild."|".$dark."|".$dog."|".$gta."|".$lara."|".$bf."|".$call."|".$evil;
	$fp = fopen($filename,"w");
	fwrite($fp,$voteStr);
	fclose($fp);
	
	$sum =  $wild+$dark+$dog+$gta+$lara+$bf+$call+$evil;
?>
<div class="page-header">
				<h2>各个游戏受欢迎的百分比</h2>
				<p>此数据来自网络<?php echo $sum; ?>份玩家投票结果</p>
			</div>
			<h3>巫师3：狂猎（<?php echo 100*round(($wild/$sum),4) ?>%）</h3>
			<div class="progress">
			  <div class="progress-bar <?php
      	if(100*round(($wild/$sum),4)<25){
			echo "progress-bar-success";	
		}
		if(100*round(($wild/$sum),4)>=25 && 100*round(($wild/$sum),4)<50){
			echo "progress-bar-warning";
		}
		if(100*round(($wild/$sum),4)>=50 && 100*round(($wild/$sum),4)<75){
			echo "progress-bar-info";
		}
		if(100*round(($wild/$sum),4)>=75 && 100*round(($wild/$sum),4)<=100){
			echo "progress-bar-danger";
		}
	  ?> progress-bar-striped" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo 100*round(($wild/$sum),4) ?>%">
			    <span class="sr-only"></span>
			  </div>
			</div>
			<h3>黑暗之魂3（<?php echo 100*round(($dark/$sum),4) ?>%）</h3>
			<div class="progress">
			  <div class="progress-bar <?php
      	if(100*round(($dark/$sum),4)<25){
			echo "progress-bar-success";	
		}
		if(100*round(($dark/$sum),4)>=25 && 100*round(($dark/$sum),4)<50){
			echo "progress-bar-warning";
		}
		if(100*round(($dark/$sum),4)>=50 && 100*round(($dark/$sum),4)<75){
			echo "progress-bar-info";
		}
		if(100*round(($dark/$sum),4)>=75 && 100*round(($dark/$sum),4)<=100){
			echo "progress-bar-danger";
		}
	  ?> progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo 100*round(($dark/$sum),4) ?>%">
			    <span class="sr-only"></span>
			  </div>
			</div>
			<h3>看门狗2（<?php echo 100*round(($dog/$sum),4) ?>%）</h3>
			<div class="progress">
			  <div class="progress-bar <?php
      	if(100*round(($dog/$sum),4)<25){
			echo "progress-bar-success";	
		}
		if(100*round(($dog/$sum),4)>=25 && 100*round(($dog/$sum),4)<50){
			echo "progress-bar-warning";
		}
		if(100*round(($dog/$sum),4)>=50 && 100*round(($dog/$sum),4)<75){
			echo "progress-bar-info";
		}
		if(100*round(($dog/$sum),4)>=75 && 100*round(($dog/$sum),4)<=100){
			echo "progress-bar-danger";
		}
	  ?> progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo 100*round(($dog/$sum),4) ?>%">
			    <span class="sr-only"></span>
			  </div>
			</div>
			<h3>GTA5（<?php echo 100*round(($gta/$sum),4) ?>%）</h3>
			<div class="progress">
			  <div class="progress-bar <?php
      	if(100*round(($gta/$sum),4)<25){
			echo "progress-bar-success";	
		}
		if(100*round(($gta/$sum),4)>=25 && 100*round(($gta/$sum),4)<50){
			echo "progress-bar-warning";
		}
		if(100*round(($gta/$sum),4)>=50 && 100*round(($gta/$sum),4)<75){
			echo "progress-bar-info";
		}
		if(100*round(($gta/$sum),4)>=75 && 100*round(($gta/$sum),4)<=100){
			echo "progress-bar-danger";
		}
	  ?> progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo 100*round(($gta/$sum),4) ?>%">
			    <span class="sr-only"></span>
			  </div>
			</div>
			<h3>古墓丽影：崛起（<?php echo 100*round(($lara/$sum),4) ?>%）</h3>
			<div class="progress">
			  <div class="progress-bar <?php
      	if(100*round(($lara/$sum),4)<25){
			echo "progress-bar-success";	
		}
		if(100*round(($lara/$sum),4)>=25 && 100*round(($lara/$sum),4)<50){
			echo "progress-bar-warning";
		}
		if(100*round(($lara/$sum),4)>=50 && 100*round(($lara/$sum),4)<75){
			echo "progress-bar-info";
		}
		if(100*round(($lara/$sum),4)>=75 && 100*round(($lara/$sum),4)<=100){
			echo "progress-bar-danger";
		}
	  ?> progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo 100*round(($lara/$sum),4) ?>%">
			    <span class="sr-only"></span>
			  </div>
			</div>
			<h3>战地1（<?php echo 100*round(($bf/$sum),4) ?>%）</h3>
			<div class="progress">
			  <div class="progress-bar <?php
      	if(100*round(($bf/$sum),4)<25){
			echo "progress-bar-success";	
		}
		if(100*round(($bf/$sum),4)>=25 && 100*round(($bf/$sum),4)<50){
			echo "progress-bar-warning";
		}
		if(100*round(($bf/$sum),4)>=50 && 100*round(($bf/$sum),4)<75){
			echo "progress-bar-info";
		}
		if(100*round(($bf/$sum),4)>=75 && 100*round(($bf/$sum),4)<=100){
			echo "progress-bar-danger";
		}
	  ?> progress-bar-striped" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo 100*round(($bf/$sum),4) ?>%">
			    <span class="sr-only"></span>
			  </div>
			</div>
			<h3>使命召唤：无限战争（<?php echo 100*round(($call/$sum),4) ?>%）</h3>
			<div class="progress">
			  <div class="progress-bar <?php
      	if(100*round(($call/$sum),4)<25){
			echo "progress-bar-success";	
		}
		if(100*round(($call/$sum),4)>=25 && 100*round(($call/$sum),4)<50){
			echo "progress-bar-warning";
		}
		if(100*round(($call/$sum),4)>=50 && 100*round(($call/$sum),4)<75){
			echo "progress-bar-info";
		}
		if(100*round(($call/$sum),4)>=75 && 100*round(($call/$sum),4)<=100){
			echo "progress-bar-danger";
		}
	  ?> progress-bar-striped" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo 100*round(($call/$sum),4) ?>%">
			    <span class="sr-only"></span>
			  </div>
			</div>
			<h3>生化危机7（<?php echo 100*round(($evil/$sum),4) ?>%）</h3>
			<div class="progress">
			  <div class="progress-bar <?php
      	if(100*round(($evil/$sum),4)<25){
			echo "progress-bar-success";	
		}
		if(100*round(($evil/$sum),4)>=25 && 100*round(($evil/$sum),4)<50){
			echo "progress-bar-warning";
		}
		if(100*round(($evil/$sum),4)>=50 && 100*round(($evil/$sum),4)<75){
			echo "progress-bar-info";
		}
		if(100*round(($evil/$sum),4)>=75 && 100*round(($evil/$sum),4)<=100){
			echo "progress-bar-danger";
		}
	  ?> progress-bar-striped" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo 100*round(($evil/$sum),4) ?>%">
			    <span class="sr-only"></span>
			  </div>
			</div>