<?php
   $borrar = $_POST['modificar'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Modificar</title>
	<link href="login-box.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="contenedor">
	<div class="login-box">
		<H2>Modificar Editorial</H2>
		<form method = "post" action = "actionModificarAutor.php">
		<div class="login-box-name"><b>Nombre:</b></div>
		<div class="login-box-field">
			<p><input type="text" name="mod" id="mod" size="30" maxlength="30"></p>	
			<p><b>Apellido: </b><input type="text" name="ape" id="ape" size="30" maxlength="30"></p>
			<p><b>ID-Autor: </b><input type="text" name="modificado" value=<?php echo $borrar ?>></p>
		</div>
		<div class= "boton">
		    <input type="image" height=34; name="imagen" src="./Imagenes/BOTON-ENVIAR.png">
        </div>   
        </form>	
        <div class= "boton2">
			 <form method = "post" action = "autor.php">
					<input type="image" name="imageField" src="./Imagenes/BOTON-CANCELAR.png">
			 </form>
	    </div>
	</div>
</div>
</body>
</html>
