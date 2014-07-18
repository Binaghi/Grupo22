<?php
   $borrar = $_POST['modificar'];
   $ape = $_POST['ape'];
   $nom = $_POST['nom'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<script src="jquery-1.11.1.js" type="text/javascript"></script>
<script src="jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
    $("#formid").validate({
        rules: {
            mod: { required: true, minlength: 2},
            ape: { required: true, minlength: 2}
        },
        messages: {
            mod: "Introducir Nombre de Autor!!",
            ape: "Introducir Apellido de Autor!!",
        },
    });
}); 
</script>

	<title>Modificar</title>
	<link rel="stylesheet" href="estilos.css"/>
</head>

<body>
<div class="contenedor">
   <div class='fondoContenedorTop'></div>
   <div class='fondoContenedorMain'> 
	  <div class="encabezado">
		  <div class="logo"></div>
		<div class="menu">
				<div class="logeo">
					    <a href="./editorial.php">Editorial</a>
						<a href="./categoria.php">Categoria</a>
					<!--	<a href="./libro.php">Libro  &nbsp;</a> -->
	            </div>
		</div>
	  </div>
		<div class="principal">
				  <div class="columna">
						<div class="sesion"><a href='cerrarSesion.php'>Cerrar sesion</a></div>
				  </div>
				     <div class= "modificar">
							<H1>Modificando Editorial</H1>
							<H2>(Datos a modificar: <?php echo $nom,$ape ?>)</H2>
							<form id="formid" method = "post" action = "actionModificarAutor.php">
								<p><b>Nombre:</b><input type="text" name="mod" id="mod" size="30" maxlength="30"></p>	
								<p><b>Apellido: </b><input type="text" name="ape" id="ape" size="30" maxlength="30"></p>
								<input type="hidden" name="modificado" value=<?php echo $borrar ?>>
								<input type="image" height=34; name="imagen" src="./Imagenes/BOTON-ENVIAR.png">   
							</form>	
							    <div class="boton">
								 <form method = "post" action = "autor.php">
										<input type="image" name="imageField" src="./Imagenes/BOTON-CANCELAR.png">
								 </form>
								</div>
					  </div>
	     </div>
		  <div class="piedepagina">
			Informaci&oacuten; de contacto ...
		  </div>
	 </div>
	 <div class='fondoContenedorBottom'></div>
</div>
</body>
</html>
