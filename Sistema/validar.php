<?php
session_start();
$usuario = $_POST['usuario'];
$clave = $_POST['clave']; 
include ("conectar.php");
$resultado = mysqli_query("SELECT nombre_usuario FROM administrador WHERE nombre_usuario = Susuario AND contraseña = $clave");
if (mysqli_num_rows($resultado)) { 
	 $_SESSION['usuario'] = $usuario; 
	 $_SESSION['clave'] = $clave;
	 header ("Location: Backend.php");
	 }
	else {
	   $msg = "Datos erroneos!!. <a href=\"login.html\">Intentar de nuevo.</a>";}
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<title>sin título</title>

	</head>

	<body>
		
	<p><?php echo $msg ?></p>	

	</body>

	</html>
