<input type="text" name="modificar" size="30" maxlength="30">
<?php
    echo "hola mundo";
    include ('conectar.php');
	$modificar = $_POST['modificar'];
	$resultado = mysqli_query($link,"SELECT * FROM editorial WHERE Nombre_Edi = '$modificar'");
	
	if (mysqli_num_rows($resultado) > 0){
		header("Location: editorial.php?error=1");
		exit();
	}
	
	mysqli_query($link,"INSERT INTO editorial (id_editorial,Nombre_Edi) VALUES ('','$modificar')");
	header("Location: editorial.php?error=0");

     
?>
