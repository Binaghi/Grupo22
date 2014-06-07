<?php
    $id = $_POST['modificado'];
    $modificar = $_POST['mod'];
    include ('conectar.php');
    $resultado = mysqli_query($link, "UPDATE editorial SET Nombre_Edi = '$modificar' WHERE id_editorial = '$id'");
    header("Location: editorial.php?error=0");
    
?>
