<?php 
session_start(); 
$_SESSION['usermobile']=null;
$_SESSION['userpassword']=null;
setcookie("username","",time()-1);
header("location: index.php");
?>
