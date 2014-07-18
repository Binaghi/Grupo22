<?php
    $id = $_POST['modificar'];
    $min = $_POST['minimo'];
    $actual = $_POST['actual'];
    $pre = $_POST['precio'];
    $titulo = $_POST['titulo'];
    $idioma = $_POST['idioma'];
    $pagina = $_POST['pagina'];
    $fecha = $_POST['fecha'];
    $autor = $_POST['autor'];
    $cat = $_POST['categoria'];
    $oferta = $_POST['oferta'];
    include ('conectar.php');
    $resultado = mysqli_query($link, "UPDATE libro SET stock_minimo = '$min', stock_actual = '$actual', precio = '$pre', titulo = '$titulo', idioma = '$idioma', paginas = '$pagina', fecha_publi = '$fecha', id_autor = '$autor', id_editorial = '$cat', oferta = '$oferta' WHERE ISBN = '$id'");
    header("Location: libro.php?error=0");
?>

