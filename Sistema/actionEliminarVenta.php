<?php
    include_once ("conectar.php");
    $borrar = $_POST['eliminar'];        
	mysqli_query($link,"DELETE FROM venta WHERE id_venta = '$borrar'");
	header("Location: EstadoVenta.php?error=0");
?>
