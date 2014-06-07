<?php
    $id = $_POST['modificado'];
    $modificar = $_POST['mod'];
    $apellido = $_POST['ape'];
    include ('conectar.php');
    $resultado = mysqli_query($link, "UPDATE autor SET nombre_autor = '$modificar', apellido_autor = '$apellido' WHERE id_autor = '$id'");
    header("Location: autor.php?error=0");
    
?>
