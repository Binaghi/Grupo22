<?php

    include ('conectar.php');
	$borrar = $_POST['eliminar'];
	$resultado = mysqli_query($link,"SELECT id_autor FROM autor WHERE id_autor = '$borrar'");
	
	if (mysqli_num_rows($resultado) > 0){
		$resultado = mysqli_query($link,"SELECT id_autor FROM libro WHERE id_autor = '$borrar'");
		if (mysqli_num_rows($resultado) > 0){
		     header("Location: autor.php?error=2");
		     exit();
		}else{
			mysqli_query($link,"DELETE FROM autor WHERE id_autor = '$borrar'");
			header("Location: autor.php?error=0");
			}
	}
	
	else {
	  header("Location: autor.php");	
    }
    
?>
