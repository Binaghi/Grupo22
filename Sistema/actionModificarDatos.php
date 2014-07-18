<?php
    include ('conectar.php');
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$dni = $_POST['dni'];
	$telefono = $_POST['telefono'];
	$nac = $_POST['nacimiento'];
	$usuario = $_POST['usuario'];
	$prov = $_POST['prov'];
	$loc = $_POST['loc'];
	$domi = $_POST['domicilio'];
	$nro = $_POST['nro'];
	$dpto = $_POST['dpto'];
	$piso = $_POST['piso'];
    $resultado = mysqli_query($link,"UPDATE cliente SET dni = '$dni', nombre_usuario = '$usuario', telefono = '$telefono', fecha_nac = '$nac', apellido = '$apellido', nombre = '$nombre', provincia = '$prov', localidad = '$loc', calle = '$domi', numero_casa = '$nro', depto = '$dpto', piso = '$piso' WHERE dni = '$dni'");
	header("Location: modificar_dato.php?error=0");
?>

