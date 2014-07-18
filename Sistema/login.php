<?php
if ( isset($_GET['error'])  and  $_GET['error'] == '1' ){?>
		<script language="javascript"> alert("Debe logearse como administrador para acceder a este sitio!!"); </script>
<?php };

if ( isset($_GET['error'])  and  $_GET['error'] == '2' ){?>
		<script language="javascript"> alert("Usuario y/o Clave erroneo/s"); </script>
<?php };

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>	
<link href="login-box.css" rel="stylesheet" type="text/css" />
<script src="jquery-1.11.1.js" type="text/javascript"></script>
<script src="jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
    $("#formid").validate({
        rules: {
            usuario: { required: true, minlength: 2},
            clave: { required: true, minlength: 2}
        },
        messages: {
          usuario: "Introducir Usuario!!",
          clave: "Introducir Contrase&ntilde;a!!",
        },
    });
}); 
</script>
<title>LOGIN</title>
</head>

<body>
<div class="contenedor">
	<div class="login-box">
		<H2>Login</H2>
		<form method = "post" id="formid" action = "validar.php">
		<div class="login-box-name">Usuario:</div>
		<div class="login-box-field">
			<input name="usuario" class="form-login" id="usuario"title="Usuario" value="" size="30" maxlength="20" />
		</div>
		<div class="login-box-name">Contrase&ntilde;a:</div>
		<div class="login-box-field">
			<input name="clave" type="password" id="clave" class="form-login" title="Contraseña" value="" size="30" maxlength="20" />
			</div>
		<div class= "boton">
		    <input type="image" name="imageField" src="./Imagenes/login-btn.png">
        </div>   
        </form>	
        <a href="cambiar_clave.php" style="margin-left:230px;">Olvido la clave?</a> 
	</div>
</div>
</body>
</html>
