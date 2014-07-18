<?php
    $dni = $_POST['dni'];
    $clave = $_POST['clave'];
    include ('conectar.php');
    $resultado2 = mysqli_query($link,"SELECT * FROM administrador WHERE dni = '$dni'");
    $resultado = mysqli_query($link,"SELECT * FROM cliente WHERE dni = '$dni'");
    if (mysqli_num_rows($resultado)) {
		$resultado = mysqli_query($link, "UPDATE cliente SET clave = '$clave' WHERE dni = '$dni'");
		header("Location: index.php?error=1");
    }
    elseif (mysqli_num_rows($resultado2)) { 
		$resultado2 = mysqli_query($link, "UPDATE administrador SET clave = '$clave' WHERE dni = '$dni'");
		header("Location: index.php?error=1");
    }
    else{
 	
    }
?>
