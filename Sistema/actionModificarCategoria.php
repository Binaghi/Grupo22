<?php
    $id = $_POST['modificado'];
    $modificar = $_POST['mod'];
    include ('conectar.php');
    $resultado = mysqli_query($link, "UPDATE categoria SET nombre_categoria = '$modificar' WHERE nombre_categoria = '$id'");
    header("Location: categoria.php?error=0");
    
?>
