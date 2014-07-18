<?php
  session_start(); 
  error_reporting(E_ALL^E_NOTICE);
  if ( isset($_GET['error'])  and  $_GET['error'] == '1' ){?>
		<script language="javascript"> alert("El cliente ya se encuentra en la Base de Datos"); </script>
	<?php };

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
</html>
<head>
<link rel="stylesheet" href="estilos.css"/>
<script src="jquery-1.11.1.js" type="text/javascript"></script>
<script src="jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
    $("#formid").validate({
        rules: {
            nombre: { required: true, minlength: 2},
            apellido: { required: true, minlength: 2},
            dni: { required: true, number: true, minlength: 8},
            usuario: { required: true, minlength: 6},
            clave: { required: true, minlength: 6},
            clave2: { required: true, minlength: 6, equalTo: "#clave"},
            telefono: { required: true, number:true, minlength: 10},
            nacimiento: { required: true, date: true},
            prov: { required: true, minlength: 4},
            loc: { required: true, minlength: 4},
            domicilio: { required: true, minlength: 2},
            nro: { required: true, minlength: 2},
        },
        messages: {
            nombre: "Introducir Nombre!!",
            apellido: "Introducir Apellido!!",
            dni: {required: "Ingrese su DNI", number: "Debe ingresar solo numeros", minlenght: "El DNI debe tener 8 carateres"},
            usuario: "Introducir Usuario!!",
            clave: {required: "Introducir Clave!!", minlenght: "La clave debe tener al menos 6 carateres"},
            clave2: {required: "Confirmar clave", minlenght: "La clave debe tener al menos 6 carateres", equalTo:"Las claves introducidas no son iguales"},
            telefono: {required: "Introducir telefono", number: "Debe ingresar solo numeros", minlenght: "El telefono debe tener al menos 10 carateres"},
            nacimiento: {required: "Introducir Fecha nacimiento", date: "Debe ingresar una fecha", min: "Introducir fecha mayor a 1940 (menor que 74 a&ntilde;os)", max: "Introducir fecha menor a 1995 (mayor que 18 a&ntilde;os)"},
            prov: "Introducir Provincia!!",
            loc: "Introducir Localidad!!",
            domicilio: "Introducir Domicilio!!",
            nro: "Introducir nro de casa!!",
        },
    });
}); 
</script>
 <title>:: Registro ::</title>
 </head>
 <body>
<div class="contenedor">
   <div class='fondoContenedorTop'></div>
   <div class='fondoContenedorMain'> 
	  <div class="encabezado">
		  <div class="logo"></div>
		<div class="menu"></div>
		<div class="logeo">
				<a href="./index.php">Inicio</a>
				<a href="./catalogo.php">Catalogo</a>
		</div>
	  </div>
		<div class="principal">
				  <div class="columna">
					    <?php if ($_SESSION['estado2'] == "logeado"){ ?>
						     <div class="sesion"><a href='cerrarSesion.php'>Cerrar sesion</a></div>
					    <?php } ?>
				  </div>
				  <div class="titulo">
				  <h2>Registrarse como cliente</h2>
				  </div>
				  <div class="registro">
						  <form id="formid" method="post" action="actionAgregarCliente.php"> 
							               <div style='padding-right:160px'>
										   <p><b>Nombre: </b><input type="text" name="nombre" id="nombre" size="30" maxlength="30"></p>
										   </div>
										   <div style='padding-right:160px'>
										   <p><b>Apellido: </b><input type="text" name="apellido" id="apellido" size="30" maxlength="30"></p>  
										   </div>
										   <div style='padding-right:300px'>
										   <p><b>DNI: </b><input type="text" name="dni" id="dni" size="10" maxlength="8"></p>
										   </div>
										   <div style='padding-right:160px'>
										   <p><b>Usuario: </b><input type="text" name="usuario" id="usuario" size="30" maxlength="30"></p>  
										   </div>
										   <div style='padding-right:230px'>
										   <p><b>Clave: </b><input type="password" name="clave" id="clave" size="20" maxlength="15"></p>
										   </div>
										   <div style='padding-right:170px'>
										   <p><b>Confirmar Clave: </b><input type="password" name="clave2" id="clave2" size="20" maxlength="15"></p>
										   </div>
										   <div style='padding-right:150px'>
										   <p><b>Telefono: </b><input type="text" name="telefono" id="telefono" size="30" maxlength="10"></p> 
										   </div>
										   <div style='padding-right:200px'>
										   <p><b>Nacimiento: </b><input type="date" name="nacimiento" id="nacimiento" step="1" min="1940-01-01" max="1995-12-12" size="20"></p>
										   </div>
										   <div style='padding-right:200px'>
										   <p><b>Provincia: </b><input type="text" name="prov" id="prov" size="20" maxlength="20"></p>
										   </div>
										   <div style='padding-right:200px'>
										   <p><b>Localidad: </b><input type="text" name="loc" id="loc" size="20" maxlength="20"></p>
										   </div>
										   <div style='padding-right:150px'>
										   <p><b>Domicilio: </b><input type="text" name="domicilio" id="domicilio" size="30" maxlength="30"></div><div style='padding-right:290px'><b>Nro: </b><input type="text" name="nro" id="nro" size="10" maxlength="6"></p></div>
										   <div style='padding-right:210px'>
										   <p><b>Dpto (opcional): </b><input type="text" name="dpto" id="dpto" size="10" maxlength="3"></div><div style='padding-right:210px'><b>Piso (opcional): </b><input type="text" name="piso" id="piso" size="10" maxlength="3"></p> 
										   </div>
										   <div style='margin-bottom:50px'><p><b>Enviar datos:</b><input type="image" name="boton_agregar" width=50px; height=50px; src="./Imagenes/agregar.png"></div></p>  
						  </form>
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
