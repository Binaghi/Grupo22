<?php
    $id = $_POST['agregar'];
    $min = $_POST['minimo'];
    $actual = $_POST['actual'];
    $pre = $_POST['precio'];
    $titulo = $_POST['titulo'];
    $idioma = $_POST['idioma'];
    $pagina = $_POST['pagina'];
    $fecha = $_POST['fecha'];
    $autor = $_POST['autor'];
    $cat = $_POST['editorial'];
    $oferta = $_POST['oferta'];
    include ('conectar.php');
    $resultado = mysqli_query($link,"SELECT * FROM libro WHERE ISBN = '$id'");
			    if (mysqli_num_rows($resultado) > 0){
					header("Location: libro.php?error=1");
					exit();
			    }else{
				mysqli_query($link,"INSERT INTO libro (ISBN,stock_minimo,stock_actual,precio,titulo,idioma,paginas,fecha_publi,id_autor,id_editorial,oferta) VALUES ('$id','$min','$actual','$pre','$titulo','$idioma','$pagina','$fecha','$autor','$cat','$oferta')");
			   echo $id;
			    }
?>
