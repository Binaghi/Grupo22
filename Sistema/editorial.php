<?php 
   session_start(); 
   if ($_SESSION['estado'] == "logeado"){   
   include('conectar.php');
	if ( isset($_GET['error'])  and  $_GET['error'] == '1' ){?>
		<script language="javascript"> alert("La Editorial ya se encuentra en la Base de Datos"); </script>
	<?php }; ?>
	
	<?php if ( isset($_GET['error'])  and  $_GET['error'] == '0' ){ ?>
		<script language="javascript">alert("La consulta se realizo correctamente");</script>
	<?php }; ?>
	
	<?php if ( isset($_GET['error'])  and  $_GET['error'] == '2' ){ ?>
		<script language="javascript">alert("La Editorial se encuentra en un libro, no puede ser eliminada");</script>
    <?php };
	
	
	$result = mysqli_query($link, "SELECT * FROM editorial ORDER BY Nombre_edi asc");
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
            name: { required: true, minlength: 2},
            }, 
        messages: {
            name: "Introducir Nombre de Editorial!!",
        },
    });
}); 
</script>   
 
 <title>:: Editorial ::</title>
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
						<a href="./categoria.php">Categoria</a>
						<a href="./autor.php">Autor</a>
				        <a href="./libro.php">Libro</a>
	            </div>
		</div>
	  </div>
		<div class="principal">
				  <div class="columna">
						<div class="sesion"><a href='cerrarSesion.php'>Cerrar sesion</a></div>
						  <div class="sesion">
							<form action="catalogo.php" method="post">
								Buscar: <input name="palabra">
								<input type="submit" name="submit" value="Submit">
							 </form>
							</div>	
						<div class="sesion"><a href='EstadoVenta.php'>Ver Ventas</a></div>
						<div class="sesion"><a href='stock.php'>STOCK</a></div>
				  </div>
				  <h2>Seccion Editorial (Alta, Baja y Modificacion)</h2>
				  <form method="post" id="formid" action="actionAgregarEditorial.php">
						  <table> 
							  <tr> 
								   <td><input type="image" name="boton_agregar" width=50px; height=50px; src="./Imagenes/agregar.png"></td> 
								   <td><input type="text" name="name" id="name" size="30" maxlength="30"></td> 
							  </tr> 
						  </table>
				  </form>
				  <div id="ok"></div>
				  <div class="tabla">	  
								 <table width="550px" border="1" cellpadding="10">
									  <?php while ($arreglo = mysqli_fetch_array($result)) { 
										  $eliminar = $arreglo['id_editorial']; 
										  $nom = $arreglo['Nombre_Edi'];
										  ?>
											<tr>
											<td><?php echo $arreglo["Nombre_Edi"] ?></td>
											<form action="modificar_edi.php" method="post">
													<td><input type="image" name="modificar" value=<?php echo $eliminar ?> width=30px; height=30px; src="./Imagenes/modificar.png"></td>
													<input type="hidden" name="nom" value=<?php echo $nom ?>>
											</form>
											<form action="actionEliminarEditorial.php" method="post">
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
