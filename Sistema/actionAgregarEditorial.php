<?php
    include ('conectar.php');
	$agregar = $_POST['name'];
	if ($agregar <> ''){
			$resultado = mysqli_query($link,"SELECT * FROM editorial WHERE Nombre_Edi = '$agregar'");
			if (mysqli_num_rows($resultado) > 0){
				header("Location: editorial.php?error=1");
				exit();
			}else{
			
				mysqli_query($link,"INSERT INTO editorial (id_editorial,Nombre_Edi) VALUES ('','$agregar')");
				header("Location: editorial.php?error=0");
				exit();
			}
	}
	header("Location: editorial.php");
?>
