<?php
    include ('conectar.php');
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$dni = $_POST['dni'];
	$telefono = $_POST['telefono'];
	$nac = $_POST['nacimiento'];
	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];
	$prov = $_POST['prov'];
	$loc = $_POST['loc'];
	$domi = $_POST['domicilio'];
	$nro = $_POST['nro'];
	$dpto = $_POST['dpto'];
	$piso = $_POST['piso'];
	$resultado = mysqli_query($link,"SELECT * FROM cliente WHERE dni = '$dni'");
	if (mysqli_num_rows($resultado) > 0){
		header("Location: registro.php?error=1");
		exit();
	}else{
		mysqli_query($link,"INSERT INTO cliente (id_cliente,dni,nombre_usuario,clave,telefono,fecha_nac,apellido,nombre,provincia,localidad,calle,numero_casa,depto,piso) VALUES ('','$dni','$usuario','$clave','$telefono','$nac','$apellido','$nombre','$prov','$loc','$domi','$nro','$dpto','$piso')");
		header("Location: index.php?error=2");
	}
?>
