<?php session_start();
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
 
  <script>
		function valida_autor(){ 
				//valido el nombre 
				if (document.fautor.agregar.value.length==0){ 
					 alert("Tiene que escribir el nombre del autor") ;
					 document.fautor.nombre.focus() ;
					 return 0; 
				} 

				document.fvalida.submit(); 
			}
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
					    <a href="./editorial.php">Editorial  &nbsp;</a>
						<a href="./categoria.php">Categoria  &nbsp;</a>
					<!--	<a href="./libro.php">Libro  &nbsp;</a> -->
	            </div>
		</div>
	  </div>
		<div class="principal">
				  <div class="columna">
						<div class="sesion"><a href='cerrarSesion.php'>Cerrar sesion</a></div>
				  </div>
				  <form name="fautor" action="actionAgregarAutor.php" method="post">
						  <table> 
							  <tr> 
								   <td><input type="image" name="boton_agregar" width=50px; height=50px; src="./Imagenes/agregar.png" onclick="valida_autor()"></td> 
								   <td>Nombre: <input type="text" name="agregar" size="30" maxlength="30"></td>
								   <td>Apellido: <input type="text" name="agregar_ape" size="30" maxlength="30"></td>  
							  </tr> 
						  </table>
				  </form>
				  <div class="tabla">
								 <table border="1" cellpadding="10">
									  <?php while ($arreglo = mysqli_fetch_array($result)) { $eliminar = $arreglo['id_autor'] ?>
											<tr>
											<td><?php echo $arreglo["nombre_autor"] ?></td>
											<td><?php echo $arreglo["apellido_autor"] ?></td>
											<form action="modificar_autor.php" method="post">
													<td><input type="image" name="modificar" value=<?php echo $eliminar ?> width=30px; height=30px; src="./Imagenes/modificar.png"></td>
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
