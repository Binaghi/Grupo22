<?php

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
            dni: { required: true, number: true, minlength: 8},
            clave: { required: true, minlength: 6},
            clave2: { required: true, minlength: 6, equalTo: "#clave"},
        },
        messages: {
            dni: {required: "Ingrese su DNI", number: "Debe ingresar solo numeros", minlenght: "El DNI debe tener 8 carateres"},
            clave: {required: "Introducir Clave!!", minlenght: "La clave debe tener al menos 6 carateres"},
			clave2: {required: "Confirmar clave", minlenght: "La clave debe tener al menos 6 carateres", equalTo:"Las claves introducidas no son iguales"},
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
		</div>
	  </div>
		<div class="principal">
				  <div class="columna">
				  </div>
				     <div class= "modificar">
							<H1>Modificando Clave</H1>
							<form id="formid" method = "post" action = "actionMoidificarClave.php">
								<p><b>DNI:</b><input type="text" name="dni" id="dni" size="30" maxlength="30"></p>
								<p><b>Clave: </b><input type="password" name="clave" id="clave" size="20" maxlength="15"></p>
								<p><b>Confirmar Clave: </b><input type="password" name="clave2" id="clave2" size="20" maxlength="15"></p>
								<input type="image" height=34; name="imagen" src="./Imagenes/BOTON-ENVIAR.png">   
							</form>	
							    <div class="boton">
								 <form method = "post" action = "index.php">
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
