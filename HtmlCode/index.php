<?php
session_start();
$_SESSION['adminmail']=null;
$_SESSION['usermobile']=null;
header("location: home.php")
?>