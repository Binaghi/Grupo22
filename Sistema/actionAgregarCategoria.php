<?php
    include ('conectar.php');
	$agregar = $_POST['agregar'];
	if ($agregar <> ''){
			$resultado = mysqli_query($link,"SELECT * FROM categoria WHERE nombre_categoria = '$agregar'");
			if (mysqli_num_rows($resultado) > 0){
				header("Location: categoria.php?error=1");
				exit();
			}else{
			
				mysqli_query($link,"INSERT INTO categoria (nombre_categoria) VALUES ('$agregar')");
				header("Location: categoria.php?error=0");
			}
	}
	header("Location: categoria.php");
?>
