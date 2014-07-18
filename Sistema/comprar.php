<?php
session_start();
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
            tarj: { required: true, number: true, minlength: 16},
            vto: { required: true, date: true},
            cod: { required: true, number: true, minlength: 3},
        },
        messages: {
            tarj: {required: "Ingrese su Tarjeta", number: "Debe ingresar solo numeros", minlenght: "La tarjeta debe tener 16 carateres"},
            vto: {required: "Introducir Vencimiento", date: "Debe ingresar una fecha", min: "Introducir fecha mayor a hoy (17/07/14)", max: "Introducir fecha menor a 2018 (17/07/18)"},
			cod: {required: "Ingrese codigo de seguridad", number: "Debe ingresar solo numeros", minlenght: "El codigo debe tener 3 carateres"},
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
							<H1>Ingresar Datos de la Tarjeta</H1>
							<form id="formid" method = "post" action = "actionComprar.php">
								<p><b>Tarjeta:</b><input type="text" name="tarj" id="tarj" size="16" maxlength="16"></p>
								<p><b>Vto: </b><input type="date" name="vto" id="vto" step="1" min="2014-07-17" max="2018-07-17" size="10"></p>
								<p><b>Codigo: </b><input type="text" name="cod" id="cod" size="3" maxlength="3"></p>
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
