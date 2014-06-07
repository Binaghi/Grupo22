<?php

    include ('conectar.php');
	$borrar = $_POST['eliminar'];
	$resultado = mysqli_query($link,"SELECT * FROM categoria WHERE nombre_categoria = '$borrar'");
	
	if (mysqli_num_rows($resultado) > 0){
		$resultado = mysqli_query($link,"SELECT nombre_categoria FROM libro WHERE nombre_categoria = '$borrar'");
		if (mysqli_num_rows($resultado) > 0){
		     header("Location: categoria.php?error=2");
		     exit();
		}else{
			mysqli_query($link,"DELETE FROM categoria WHERE nombre_categoria = '$borrar'");
			header("Location: categoria.php?error=0");
			}
	}
	
	else {
	  header("Location: categoria.php");	
    }
    
?>
