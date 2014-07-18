<?php 
   session_start(); 
   if ($_SESSION['estado'] == "logeado"){   
   include('conectar.php');
	 if ( isset($_GET['error'])  and  $_GET['error'] == '0' ){ ?>
			<script language="javascript">alert("La compra se realizo correctamente");</script>
	<?php }; 
   $result = mysqli_query($link, "SELECT * FROM venta ORDER BY fecha_venta asc");
 ?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
</html>
<head> 
 <title>:: Estados ::</title>
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
						<a href="./editorial.php">Editorial</a>
				<!--		<a href="./libro.php">Libro  &nbsp;</a> -->
	            </div>
		</div>
	  </div>
		<div class="principal">
				  <div class="columna">
						<div class="sesion"><a href='cerrarSesion.php'>Cerrar sesion</a></div>
				  </div>
				  <h2>Seccion Estados Venta (Baja y Modificacion)</h2>
				  <div class="tabla">	  
								 <table width="500px" border="1" cellpadding="10">
									  <tr>
										  <td>Cli</td>
										  <td>ISBN</td>
										  <td>Ca</td>
										  <td>Pr</td>
										  <td>Fe</td>
										  <td>Estado</td>
									   </tr>
									  <?php while ($arreglo = mysqli_fetch_array($result)) { 
										  $eliminar = $arreglo['id_venta']; 
										  ?>
											<tr>
											 <td><?php echo $arreglo["id_cliente"] ?></td>
											 <td><?php echo $arreglo["ISBN"] ?></td>
											 <td><?php echo $arreglo["cant_venta"] ?></td>
											 <td>$<?php echo $arreglo["precio"] ?></td>
											 <td><?php echo $arreglo["fecha_venta"] ?></td>
											 <?php if ($arreglo["estado"] <> "Procesando") {?>
												 <td><?php echo $arreglo["estado"] ?></td>
											 <?php } else { ?>
											<form action="actionModificarVenta.php" method="post">
                                                    <td> <select name="estado">
                                                         <option value="Procesando">Procesando</option> 
                                                         <option value="Entregado">Entregado</option>                                                   
                                                    </select>
                                                    </td>
                                                    <td><input type="image" name="modificar" value=<?php echo $eliminar ?> width=30px; height=30px; src="./Imagenes/modificar.png"></td>
											</form>
											<?php } ?>
											<form action="actionEliminarVenta.php" method="post">
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
