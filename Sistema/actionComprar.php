<?php
error_reporting(E_ALL^E_NOTICE);
session_start(); 
include ("conectar.php");
$hoy = date("2014-07-17");
$id = $_SESSION['id'];
$carro=$_SESSION['carro'];
foreach($carro as $k => $v){ 
	$modificar = 0;
	$cant = $v['cantidad'];
	$total= $v['cantidad']*$v['precio'];
	$ISBN= $v['ISBN'];
	mysqli_query($link,"INSERT INTO venta (id_venta,fecha_venta,estado,cant_venta,precio,id_cliente,ISBN) VALUES ('','$hoy','Procesando','$cant','$total','$id','$ISBN')");
	$consul = mysqli_query($link, "SELECT * FROM libro WHERE ISBN = '$ISBN'");
	$actual = mysqli_fetch_array($consul);
    echo $hoy;
	$modificar = $actual['stock_actual'] - $cant;
	mysqli_query($link, "UPDATE libro SET stock_actual = '$modificar' WHERE ISBN = '$ISBN'");
  }
  header ("Location: catalogo.php?error=0");
?>
