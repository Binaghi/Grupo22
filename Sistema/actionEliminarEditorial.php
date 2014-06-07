<?php

    include ('conectar.php');
	$borrar = $_POST['eliminar'];
	$resultado = mysqli_query($link,"SELECT id_editorial FROM editorial WHERE id_editorial = '$borrar'");
	
	if (mysqli_num_rows($resultado) > 0){
		$resultado = mysqli_query($link,"SELECT id_editorial FROM libro WHERE id_editorial = '$borrar'");
		if (mysqli_num_rows($resultado) > 0){
		     header("Location: editorial.php?error=2");
		     exit();
		}else{
			mysqli_query($link,"DELETE FROM editorial WHERE id_editorial = '$borrar'");
			header("Location: editorial.php?error=0");
			}
	}
	
	else {
	  header("Location: editorial.php");	
    }
    
?>
