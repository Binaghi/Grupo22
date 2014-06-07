<?php
    include ('conectar.php');
	$agregar = $_POST['agregar'];
	$agregar_ape = $_POST['agregar_ape'];
	if ($agregar <> ''){
			$resultado = mysqli_query($link,"SELECT * FROM autor WHERE nombre_autor = '$agregar'");
			if (mysqli_num_rows($resultado) > 0){
				header("Location: editorial.php?error=1");
				exit();
			}else{
				$resultado = mysqli_query($link,"SELECT * FROM autor WHERE apelldo_autor = '$agregar_ape'");
			    if (mysqli_num_rows($resultado) > 0){
					header("Location: autor.php?error=1");
					exit();
			    }else{
				mysqli_query($link,"INSERT INTO autor (id_autor,nombre_autor,apellido_autor) VALUES ('','$agregar','$agregar_ape')");
				header("Location: autor.php?error=0");
			    }
			}
	}
?>
