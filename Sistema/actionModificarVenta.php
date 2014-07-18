<?php
   include ("conectar.php");
   $id=$_POST["modificar"];
   $estado=$_POST["estado"];
   $resultado = mysqli_query($link, "UPDATE venta SET estado = '$estado' WHERE id_venta = '$id'");
   header("Location: EstadoVenta.php?error=0");
?>
