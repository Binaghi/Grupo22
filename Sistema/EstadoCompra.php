<?php 
   session_start(); 
   if ($_SESSION['estado2'] == "logeado"){   
   include('conectar.php');
   $id = $_SESSION['id'];
   $result = mysqli_query($link, "SELECT * FROM venta WHERE id_cliente = '$id' ORDER BY fecha_venta asc");
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
						<a href="./index.php">Inicio</a>
						<a href="./catalogo.php">Catalogo</a>
	            </div>
		</div>
	  </div>
		<div class="principal">
				  <div class="columna">
						<div class="sesion"><a href='cerrarSesion.php'>Cerrar sesion</a></div>
				  </div>
				  <h2>Seccion Estados de Compra</h2>
				  <div class="tabla">	  
								 <table width="500px" border="1" cellpadding="10">
									  <tr>
										  <td><b>Titulo</b></td>
										  <td><b>Cantidad</b></td>
										  <td><b>Precio</b></td>
										  <td><b>Fecha</b></td>
										  <td><b>Estado</b></td>
									   </tr>
									  <?php while ($arreglo = mysqli_fetch_array($result)) { 
										  $eliminar = $arreglo['id_venta']; 
										  ?>
											<tr>
									   <?php $consul = mysqli_query($link, "SELECT * FROM libro WHERE ISBN = '$arreglo[ISBN]'"); 
									         $t = mysqli_fetch_array($consul);
									   ?>      
											 <td><?php echo $t["titulo"] ?></td>
											 <td><?php echo $arreglo["cant_venta"] ?></td>
											 <td>$<?php echo $arreglo["precio"] ?></td>
											 <td><?php echo $arreglo["fecha_venta"] ?></td>
									 <?php if ($arreglo["estado"] <> "Procesando") {?>
											 <td><div style="color:green;"><?php echo $arreglo["estado"] ?></div></td>
									  <?php } ?>
									  <?php if ($arreglo["estado"] == "Procesando") {?>
											 <td><div style="color:red;"><?php echo $arreglo["estado"] ?></div></td>
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
