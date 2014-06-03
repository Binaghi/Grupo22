<?php session_start(); ?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
</html>
<head>
 <title>:: Backend ::</title>
 <?php
		include('conectar.php');
		$result = mysqli_query($link, "SELECT * FROM libro ORDER BY ISBN asc");
 ?>
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
							<a href="./editorial.php">Editorial  &nbsp;</a>
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
			<div class="tabla">
					<?php 
						$codigo = '<table border="1" cellpadding="20">';
						while ($arreglo = mysqli_fetch_array($result)) {
								$codigo .= '<tr>';
			//					$codigo .= '<td>'.utf8_encode($arreglo["ISBN"]).'</td>';
								$codigo .= '<td>'.utf8_encode($arreglo["titulo"]).'</td>';
								$codigo .= '</tr>';
						}
						$codigo .='</table>';

						echo $codigo;
					?>
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
