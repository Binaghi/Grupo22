<?php 
   session_start(); 
   if ($_SESSION['estado'] == "logeado"){   
   include('conectar.php');

   $result = mysqli_query($link, "SELECT * FROM libro ORDER BY ISBN asc");
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
				        <a href="./libro.php">Libro</a>
	            </div>
		</div>
	  </div>
		<div class="principal">
				  <div class="columna">
						<div class="sesion"><a href='cerrarSesion.php'>Cerrar sesion</a></div>
				  </div>
				  <h2>Seccion Stock</h2>
				  <div class="tabla">	  
								 <table width="550px" border="1" cellpadding="10">
									  <tr>
										  <td><b>ISBN</b></td>
										  <td><b>Minimo</b></td>
										  <td><b>Actual</b></td>
									   </tr>
									  <?php while ($arreglo = mysqli_fetch_array($result)) { 
										   if ($arreglo['stock_minimo'] > $arreglo['stock_actual']){
										  ?>
											<tr>
											<td><?php echo $arreglo["ISBN"] ?></td>
											<td><div style="color:red;"><?php echo $arreglo["stock_minimo"] ?></div></td>
											<td><div style="color:red;"><?php echo $arreglo["stock_actual"] ?></div></td>
											</tr>
										  <?php } } ?>
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

