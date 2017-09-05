<?php
session_start();
$_SESSION = array();
setcookie("user","free",time()-6000,"/");
$Err = "账号已注销";
$type = "out";
include "tips.php";
?>
