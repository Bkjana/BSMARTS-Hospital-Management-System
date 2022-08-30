<?php 
session_start(); 
$_SESSION['adminmail']=null;
setcookie("adminMail","",time()-1);
header("location: index.php");
?>
