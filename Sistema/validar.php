<?php
if (session_status() == PHP_SESSION_NONE) session_start();
$usuario = $_POST['usuario'];
$clave = $_POST['clave']; 
include ("conectar.php");
$resultado2 = mysqli_query($link,"SELECT nombre_usuario,id_cliente FROM cliente WHERE nombre_usuario = '$usuario' AND clave = '$clave'");
$resultado = mysqli_query($link,"SELECT nombre_usuario FROM administrador WHERE nombre_usuario = '$usuario' AND clave = '$clave'");
if (mysqli_num_rows($resultado)) { 
	 $_SESSION['usuario'] = $usuario; 
	 $_SESSION['estado'] = "logeado";
	 header ("Location: Backend.php");
 }
elseif (mysqli_num_rows($resultado2)) { 
	     $actual = mysqli_fetch_array($resultado2);
		 $_SESSION['usuario'] = $usuario; 
         $_SESSION['id'] = $actual["id_cliente"];
		 $_SESSION['estado2'] = "logeado";
		 header ("Location: index.php?error=0");
		}	
else{
 	header ("Location: login.php?error=2");
    }
?>
