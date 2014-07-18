<?php 
   session_start(); 
   if ($_SESSION['estado'] == "logeado"){   
   include('conectar.php');
      
	if ( isset($_GET['error'])  and  $_GET['error'] == '1' ){?>
		<script language="javascript"> alert("El autor ya se encuentra en la Base de Datos"); </script>
	<?php }; ?>
	
	<?php if ( isset($_GET['error'])  and  $_GET['error'] == '0' ){ ?>
		<script language="javascript"> alert("La consulta se realizo correctamente");</script>
	<?php }; ?>
	
	<?php if ( isset($_GET['error'])  and  $_GET['error'] == '2' ){ ?>
		<script language="javascript"> alert("El autor se encuentra en un libro, no puede ser eliminada");</script>
	<?php }; 
	
	$result = mysqli_query($link, "SELECT * FROM autor ORDER BY apellido_autor asc");
	
 ?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
</html>
<head>
<script src="jquery-1.11.1.js" type="text/javascript"></script>
<script src="jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
    $("#formid").validate({
        rules: {
            agregar: { required: true, minlength: 2},
            agregar_ape: { required: true, minlength: 2}
        },
        messages: {
            agregar: "Introducir Nombre de Autor!!",
            agregar_ape: "Introducir Apellido de Autor!!",
        },
    });
}); 
</script>

 <title>:: Autor ::</title>
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
					    <a href="./Backend.php">Inicio</a>
					    <a href="./editorial.php">Editorial</a>
						<a href="./categoria.php">Categoria</a>
					    <a href="./libro.php">Libro</a>
	            </div>
		</div>
	  </div>
		<div class="principal">
				  <div class="columna">
						<div class="sesion"><a href='cerrarSesion.php'>Cerrar sesion</a></div>
						<div class="sesion"><a href='EstadoVenta.php'>Ver Ventas</a></div>
						<div class="sesion"><a href='stock.php'>STOCK</a></div>
				  </div>
				  <h2>Seccion Autor (Alta, Baja y Modificacion)</h2>
				  <form id="formid" method="post" action="actionAgregarAutor.php">
						  <table> 
							  <tr> 
								   <td><input type="image" name="boton_agregar" width=50px; height=50px; src="./Imagenes/agregar.png" onclick="valida_autor()"></td> 
								   <p><td><b>Nombre: </b><input type="text" name="agregar" id="agregar" size="30" maxlength="30"></td></p>
								   <p><td><b>Apellido: </b><input type="text" name="agregar_ape" id="agregar_ape" size="30" maxlength="30"></td></p>  
							  </tr> 
						  </table>
				  </form>
				  <div class="tabla">
								 <table width="550px" border="1" cellpadding="10">
									  <?php while ($arreglo = mysqli_fetch_array($result)) {
										   $eliminar = $arreglo['id_autor'];
										   $nom = $arreglo['nombre_autor'];
										   $ape = $arreglo['apellido_autor'];?>
											<tr>
											<td><?php echo $arreglo["nombre_autor"] ?></td>
											<td><?php echo $arreglo["apellido_autor"] ?></td>
											<form action="modificar_autor.php" method="post">
													<td><input type="image" name="modificar" value=<?php echo $eliminar ?> width=30px; height=30px; src="./Imagenes/modificar.png"></td>
                                                    <input type="hidden" name="ape" value=<?php echo $ape ?>>
												    <input type="hidden" name="nom" value=<?php echo $nom ?>>
											</form>
											<form action="actionEliminarAutor.php" method="post">	  
												<td><input type="image" name="eliminar" value=<?php echo $eliminar ?> width=30px; height=30px; src="./Imagenes/eliminar.png"></td>
											</form>
											</tr>
									  <?php } ?>
								  </table> 						  	
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
<?php } 
       else { 
		  header("Location: login.php?error=1"); 
		   } 
?>
