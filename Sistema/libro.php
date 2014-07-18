<?php 
   error_reporting(E_ALL^E_NOTICE);
   session_start(); 
   if ($_SESSION['estado'] == "logeado"){   
   include('conectar.php');
     
	if ( isset($_GET['error'])  and  $_GET['error'] == '1' ){?>
		<script language="javascript"> alert("El libro ya se encuentra en la Base de Datos"); </script>
	<?php }; ?>
	
	<?php if ( isset($_GET['error'])  and  $_GET['error'] == '0' ){ ?>
		<script language="javascript">alert("La consulta se realizo correctamente");</script>
	<?php };
   if ( $_POST['submit']){
	           $buscar = $_POST ['palabra'];
	      }
   else{
	          $buscar = "vacio";   
   } 
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
            agregar: { required: true, number: true, minlength: 6},
           
            
        },
        messages: {
            agregar: { required: "Introducir ISBN del libro!!", number: "Ingrese solo numeros", minlength: "Debe tener al menos 6 nros"},
         
        },
    });
}); 
</script>  
 
 <title>:: Categoria ::</title>
 <link rel="stylesheet" href="estilos-libro.css"/>
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
						<a href="./autor.php">Autor</a>
				        <a href="./categoria.php">Categoria</a>
	            </div>
		</div>
	  </div>
		<div class="principal">
				  <div class="columna">
						<div class="sesion"><a href='cerrarSesion.php'>Cerrar sesion</a></div>
						<div class="sesion"><a href='EstadoVenta.php'>Ver Ventas</a></div>
						<div class="sesion"><a href='stock.php'>STOCK</a></div>
						<div class="sesion">
							<form id="formid" action="#" method="post">
								Buscar: <input id="palabra" name="palabra">
								<input type="image" name="submit" width=30px; height=30px; src="./Imagenes/buscar.png">
							</form>
						</div>
				  </div>
				  <h2>Seccion Libro (Alta, Baja y Modificacion)</h2>
				  <form id="formid" method="post" action="actionAgregarLibro.php">
						  <table> 
							  <tr> 
								   <td><input type="image" name="boton_agregar" width=50px; height=50px; src="./Imagenes/agregar.png"></td> 
								   <td>ISBN:<input type="text" name="agregar" id="agregar" size="10" maxlength="11"></td> 
								   <td>Minimo:<input type="text" name="minimo" id="minimo" size="5" maxlength="11"></td>
								   <td>Actual:<input type="text" name="actual" id="actual" size="5" maxlength="11"></td>
		                      </tr>
							  <tr>
								   <td>Precio: $<input type="text" name="precio" id="precio" size="5" maxlength="5"></td>
								   <td>Titulo:<input type="text" name="titulo" id="titulo" size="10" maxlength="50"></td>
								   <td>Idioma:<input type="text" name="idioma" id="idioma" size="10" maxlength="30"></td>
								   <td>Paginas:<input type="text" name="pagina" id="pagina" size="5" maxlength="4"></td>
							  </tr>
							  <tr>
								   <td>F_Publi:<input type="date" name="fecha" id="fecha" size="5"></td>
									<td>Autor:	<select name="autor" id="autor">
										   <?php
											$res = mysqli_query($link,"SELECT * FROM autor");
											while ( $cal=mysqli_fetch_array($res)){?>
											<option value=<?php echo $cal['id_autor'] ?>><?php echo $cal['nombre_autor']?> &nbsp;<?php echo $cal['apellido_autor'] ?></option> 
											<?php } ?>	
											</select> <td>
		                          <td>Oferta:<select name="oferta" id="oferta">
								              <option value="1" >TRUE</option>
								              <option value="0" >FALSE</option>
								              </select>
								   </td>
							  </tr>
							  <tr>
								   <td>Editorial:
								  		<select name="editorial" id="editorial">
										   <?php
											$res = mysqli_query($link,"SELECT * FROM editorial");
											while ( $cal=mysqli_fetch_array($res)){?>
											<option value=<?php echo $cal['id_editorial'] ?>><?php echo $cal['Nombre_Edi']?></option> 
											<?php } ?>	
										</select>
								   </td>

							  </tr> 
						  </table>
				  </form>
				  <?php
						$url = "libro.php";
						if ( $buscar == "vacio"){
							$rs_noticias = mysqli_query($link, "SELECT * FROM libro ORDER BY ISBN "); 
						}
						else {
						   $rs_noticias = mysqli_query($link, "SELECT * FROM libro WHERE titulo ORDER BY ISBN LIKE '%$buscar%' ");
						} 
						$num_total_registros = mysqli_num_rows($rs_noticias);
						if ($num_total_registros > 0) {
							$TAMANO_PAGINA = 5;
							$pagina = false;

							if (isset($_GET["pagina"]))
								   $pagina = $_GET["pagina"];
								
							if (!$pagina) {
								$inicio = 0;
								$pagina = 1;
							}
							else {
								$inicio = ($pagina - 1) * $TAMANO_PAGINA;
							}
							$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
				  ?>
				  <div class="tabla">
						  	  
								 <table width="550px" border="1" cellpadding="10">
									  <tr>
									  <td>ISBN</td>
									  <td>Min</td>
									  <td>Ac</td>
									  <td>Pre</td>
									  <td>Tit</td>
									  <td>Pub</td>
									  <td>O</td>
									  </tr>
									 
									  <?php 
									  if ($buscar == "vacio"){
												$result = mysqli_query($link, "SELECT * FROM libro ORDER BY ISBN LIMIT ".$inicio."," . $TAMANO_PAGINA);
											}
											else{
												$result = mysqli_query($link, "SELECT * FROM libro WHERE titulo LIKE '%$buscar%' ORDER BY ISBN  LIMIT ".$inicio."," . $TAMANO_PAGINA);
											}
									  while ($arreglo = mysqli_fetch_array($result)) { $eliminar = $arreglo['ISBN'] ?>
											<tr>
											<td><?php echo $arreglo["ISBN"] ?></td>
											<td><?php echo $arreglo["stock_minimo"] ?></td>
											<td><?php echo $arreglo["stock_actual"] ?></td>
											<td><?php echo $arreglo["precio"] ?></td>
											<td><?php echo $arreglo["titulo"] ?></td>
											<td><?php echo $arreglo["fecha_publi"] ?></td>
											<td><?php echo $arreglo["oferta"] ?></td>
											<form action="modificar_libro.php" method="post">
												<td><input type="image" name="modificar" value=<?php echo $eliminar ?> width=30px; height=30px; src="./Imagenes/modificar.png" ></td>
											</form>
											<form action="actionEliminarLibro.php" method="post">
												<td><input type="image" name="eliminar" value=<?php echo $eliminar ?> width=30px; height=30px; src="./Imagenes/eliminar.png"></td>
											</form>
											</tr>
									  <?php } ?>
								  </table> 
				  </div>
				  <?php
				echo '<div style=" margin-top:610px;">';

				if ($total_paginas > 1) {
					if ($pagina != 1)
						echo '<a href="'.$url.'?pagina='.($pagina-1).'"><img src="Imagenes/izq.gif" border="0"></a>';
					for ($i=1;$i<=$total_paginas;$i++) {
						if ($pagina == $i)
							echo $pagina;
						else
							echo '  <a href="'.$url.'?pagina='.$i.'">'.$i.'</a>  ';
					}
					if ($pagina != $total_paginas)
						echo '<a href="'.$url.'?pagina='.($pagina+1).'"><img src="Imagenes/der.gif" border="0"></a>';
				}
				echo '</div>';
			}
			?>
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
