<?php 
session_start();
$ISBN = $_GET ['ISBN'];
$cantidad= $_GET ['cantidad'];
include_once ('conectar.php');
$res = mysqli_query($link,"SELECT * FROM libro WHERE ISBN = '$ISBN' ");
$row = mysqli_fetch_array($res);
echo $row ['titulo'];
echo $row ['precio'];
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];
$carro[md5($ISBN)]=array('identificador'=>md5($ISBN),'cantidad'=>$cantidad,'titulo'=>$row['titulo'],'precio'=>$row['precio'],'ISBN'=>$ISBN);
$_SESSION['carro']=$carro;
if ( isset($_GET['home'])  and  $_GET['home'] == 'home' ){
	header("Location:index.php?".SID);
}
else{
header("Location:catalogo.php?".SID);
}
?>
