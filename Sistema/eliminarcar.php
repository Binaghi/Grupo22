<?php
session_start(); 
$_SESSION['carro']=false;
header("Location:vercarrito.php?".SID);
?>
