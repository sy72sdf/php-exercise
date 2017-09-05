<?php
	$game = $_GET["game"];
	$page = $_GET["page"];
	$pageSize = 4;  
	$pageStar = $page*4;
	$conn= new mysqli("localhost","root","root","phpwork");
	if($conn->connect_error){
		die("链接失败");
	}
	if(!$game){
		$sql = "select * from article limit $pageStar,$pageSize";
		$sumsql = "select * from article"; 
	}else{
		$sql = "select * from article where a_column='$game' limit $pageStar,$pageSize";
		$sumsql = "select * from article where a_column='$game'";
	}
	
	$result = $conn->query($sql);
	$sumResult = $conn->query($sumsql); 
	
	$suml = $sumResult->num_rows;
?>

<div class="row">
	
	<?php
    	if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
	?>
	    <div class="col-lg-3">
	        <a href="content.php?contentid=<?php echo $row["id"]; ?>" class="thumbnail">
	            <img src="img/<?php echo $row["pic"]; ?>"  title="<?php echo $row["title"] ?>" alt="<?php echo $row["title"] ?>">
	        </a>
		</div>
    <?php
    		}
		}
	?>
</div>
<?php
		if(!$page){
			$prv = 0;
			$next = 1;
		}else{
			$prv = $page-1;
			$next = $page+1;
			if($next >= ceil($suml/$pageSize)){
			$next = ceil($suml/$pageSize)-1;
			}	
		}
?>
<nav aria-label="...">
		  <ul class="pager">
		    <li class="previous"><a href="javascript:choose('<?php echo $game?>',<?php echo $prv?>);"><span aria-hidden="true">&larr;</span> Older</a></li>
		    <li class="next"><a href="javascript:choose('<?php echo $game?>',<?php 
		    	if($suml/$pageSize ==1){
				$next = 0;
			}; echo $next?>);">Newer <span aria-hidden="true">&rarr;</span></a></li>
		  </ul>
</nav>