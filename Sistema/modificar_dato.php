<?php
  error_reporting(E_ALL^E_NOTICE);
  session_start(); 
  include ('conectar.php');
  if ( isset($_GET['error'])  and  $_GET['error'] == '0' ){?>
		<script language="javascript"> alert("Se modificaron los datos correctamente"); </script>
	<?php };
	
  $dato = $_SESSION['usuario'];
  $result = mysqli_query($link, "SELECT * FROM cliente WHERE nombre_usuario = '$dato'");

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
 <title>:: Modificar ::</title>
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
				  <h2>Modificar Datos</h2>
				  </div>
				  <?php while ($arreglo = mysqli_fetch_array($result)) {
        			    $nombre = $arreglo['nombre'];
						$apellido = $arreglo['apellido'];
						$dni = $arreglo['dni'];
						$telefono = $arreglo['telefono'];
						$nac = $arreglo['fecha_nac'];
						$usuario = $arreglo['nombre_usuario'];
						$clave = $arreglo['clave'];
						$prov = $arreglo['provincia'];
						$loc = $arreglo['localidad'];
						$domi = $arreglo['calle'];
						$nro = $arreglo['numero_casa'];
						$dpto = $arreglo['depto'];
						$piso = $arreglo['piso'];
				  ?>
				  <div class="registro">
						  <form id="formid" method="post" action="actionModificarDatos.php"> 
							               <div style='padding-right:160px'>
										   <p><b>Nombre: </b><input type="text" name="nombre" value=<?php echo $nombre ?> id="nombre" size="30" maxlength="30"></p>
										   </div>
										   <div style='padding-right:160px'>
										   <p><b>Apellido: </b><input type="text" name="apellido" value=<?php echo $apellido ?> id="apellido" size="30" maxlength="30"></p>  
										   </div>
										   <div style='padding-right:300px'>
										   <p><b>DNI: </b><input type="text" name="dni" value=<?php echo $dni ?>  id="dni" size="10" maxlength="8"></p>
										   </div>
										   <div style='padding-right:160px'>
										   <p><b>Usuario: </b><input type="text" name="usuario" value=<?php echo $usuario ?> id="usuario" size="30" maxlength="30"></p>  
										   </div>
										   <div style='padding-right:150px'>
										   <p><b>Telefono: </b><input type="text" name="telefono" value=<?php echo $telefono ?> id="telefono" size="30" maxlength="10"></p> 
										   </div>
										   <div style='padding-right:200px'>
										   <p><b>Nacimiento: </b><input type="date" name="nacimiento" value=<?php echo $nac ?> id="nacimiento" step="1" min="1940-01-01" max="1995-12-12" size="20"></p>
										   </div>
										   <div style='padding-right:200px'>
										   <p><b>Provincia: </b><input type="text" name="prov" id="prov" value="<?php echo $prov ?>" size="20" maxlength="20"></p>
										   </div>
										   <div style='padding-right:200px'>
										   <p><b>Localidad: </b><input type="text" name="loc" id="loc" value="<?php echo $loc ?>" size="20" maxlength="20"></p>
										   </div>
										   <div style='padding-right:150px'>
										   <p><b>Domicilio: </b><input type="text" name="domicilio" value=<?php echo $domi ?> id="domicilio" size="30" maxlength="30"></div><div style='padding-right:290px'><b>Nro: </b><input type="text" name="nro" id="nro" value=<?php echo $nro ?> size="10" maxlength="6"></p></div>
										   <div style='padding-right:210px'>
										   <p><b>Dpto (opcional): </b><input type="text" name="dpto" value=<?php echo $dpto ?> id="dpto" size="10" maxlength="3"></div><div style='padding-right:210px'><b>Piso (opcional): </b><input type="text" name="piso" value=<?php echo $piso ?> id="piso" size="10" maxlength="3"></p> 
										   </div>
										   <p><input type="image" height=34; name="imagen" src="./Imagenes/BOTON-ENVIAR.png"></p>   
									</form>	
										<div class="boton" style="padding-left:170px; padding-bottom:50px">
										 <form method = "post" action = "index.php">
												<input type="image" name="imageField" src="./Imagenes/BOTON-CANCELAR.png">
										 </form>
										</div>  
				  </div>
			 <?php } ?>					  	
		 </div>
	  <div class="piedepagina">
		Informaci&oacuten; de contacto ... <?php echo $loc; ?>
	  </div>
     </div>
  <div class='fondoContenedorBottom'></div>
</div>	 
</body>
</html>
