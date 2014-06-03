<?php session_start();
      include('conectar.php');
      	$mensaje_error = '';
	if ( isset($_GET['error'])  and  $_GET['error'] == '1' ){
		$mensaje_error = '<p style="background-color: rgb(224, 116, 116); color: rgb(255, 255, 255);">¡¡La Editorial ya se encuentra en la Base de Datos!!</p>';
	};
	
	if ( isset($_GET['error'])  and  $_GET['error'] == '0' ){
		$mensaje_error = '<p style="background-color: rgb(142, 224, 116); color: rgb(000, 000, 000);">La Editorial se ha insertado correctamente</p>';
	};
	$result = mysqli_query($link, "SELECT * FROM editorial ORDER BY id_editorial asc");
 ?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
</html>
<head>
 <!-- Funcion para abrir ventana emergente -->

	<script type="text/javascript">
	   fuction ventana (url) {
			var top = (new Number (screen.height) / 2) - (400 / 2);
			var left = (new Number (screen.width) / 2) - (700 / 2);
			window.open(url,'seeker','top=' + top +',left=' + left +',toolbars=no, scrollbars=yes,width=700,height=400')  
	   } 
    </script>
 <title>:: Backend ::</title>
 <title>::CookBook::</title>
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
						<a href="./categoria.php">Categoria  &nbsp;</a>
						<a href="./autor.php">Autor  &nbsp;</a>
						<a href="./libro.php">Libro  &nbsp;</a>
	            </div>
		</div>
	  </div>
		<div class="principal">
				  <div class="columna">
						<div class="sesion"><a href='cerrarSesion.php'>Cerrar sesion</a></div>
				  </div>
				  <form action="actionAgregarEditorial.php" method="post">
						  <table> 
							  <tr> 
								   <td><input type="image" name="boton_agregar" width=50px; height=50px; src="./Imagenes/agregar.png"></td> 
								   <td><input type="text" name="agregar" size="30" maxlength="30"></td> 
							  </tr> 
						  </table>
				  </form>
				  <div class="tabla">
						  <form  method="post">	  
								 <table border="1" cellpadding="10">
									  <?php while ($arreglo = mysqli_fetch_array($result)) {?>
											<tr>
											<td><?php echo $arreglo["Nombre_Edi"] ?></td>
											<td><input type="image" name="boton_modificar" width=30px; height=30px; src="./Imagenes/modificar.png" onClick="javascript:ventana (actionModificareditorial.php)" ></td>
											</tr>
									  <?php } ?>
								  </table> 
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
