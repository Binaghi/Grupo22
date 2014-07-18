<?php
    include ('conectar.php');
	$borrar = $_POST['eliminar'];
	mysqli_query($link,"DELETE FROM libro WHERE ISBN = '$borrar'");
	header("Location: libro.php?error=0");
?>
