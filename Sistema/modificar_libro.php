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
	
	if (isset ($_POST['modificar'])){
	   $ISBN = $_POST['modificar'];	
	}
	$resul = mysqli_query($link, "SELECT * FROM libro WHERE ISBN = '$ISBN'");
	$arreglo = mysqli_fetch_array($resul)
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
            minimo: { required: true, number: true, minlength: 1},
            actual: { required: true, number: true, minlength: 1},
            precio: {required: true, minlength:2},
            titulo: {required: true, minlength:5},
            idioma: {required: true, minlength:5},
            pagina: { required: true, number: true, minlength: 1},
            fecha: {required: true, date:true},
            autor: { required: true, number: true, minlength: 1},
            categoria: { required: true, number: true, minlength: 1},
        },
        messages: {
            agregar: { required: "Introducir ISBN del libro!!", number: "Ingrese solo numeros", minlength: "Debe tener al menos 6 nros"},
            minimo: { required: "Introducir stock minimo!!", number: "Ingrese solo numeros", minlength: "Debe tener al menos 1 nros"},
            actual: { required: "Introducir stock actual!!", number: "Ingrese solo numeros", minlength: "Debe tener al menos 1 nros"},
            precio: "Introducir precio",
            precio: "Introducir precio",
            titulo: "Introducir titulo",
            idioma: "Introducir idioma",
            pagina: "Introducir pagina",
            fecha: "Introducir fecha",
             
        },
    });
}); 
</script>  
 
 <title>:: Categoria ::</title>
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
				  </div>
				  <h2>Seccion Libro (Alta, Baja y Modificacion)</h2>
				  <form id="formid" method="post" action="actionModificarLibro.php">
						  <table> 
							  <tr> 
								   <td>Minimo:<input type="text" name="minimo" id="minimo" value="<?php echo $arreglo["stock_minimo"] ?>" size="5" maxlength="11"></td>
								   <td>Actual:<input type="text" name="actual" id="actual" value="<?php echo $arreglo["stock_actual"] ?>" size="5" maxlength="11"></td>
		                      </tr>
							  <tr>
								   <td>Precio: $<input type="text" name="precio" id="precio" value="<?php echo $arreglo["precio"] ?>" size="5" maxlength="5"></td>
								   <td>Titulo:<input type="text" name="titulo" id="titulo" value="<?php echo $arreglo["titulo"] ?>" size="10" maxlength="50"></td>
								   <td>Idioma:<input type="text" name="idioma" id="idioma" value="<?php echo $arreglo["idioma"] ?>" size="10" maxlength="30"></td>
								   <td>Paginas:<input type="text" name="pagina" id="pagina" size="5" value="<?php echo $arreglo["paginas"] ?>" maxlength="4"></td>
							  </tr>
							  <tr>
								   <td>F_Publi:<input type="date" name="fecha" id="fecha" value="<?php echo $arreglo["fecha_publi"] ?>" size="5"></td>
								   <td>Autor:<select name="autor" id="autor">
										   <?php
											$res = mysqli_query($link,"SELECT * FROM autor");
											while ( $cal=mysqli_fetch_array($res)){?>
											<option value=<?php echo $cal['id_autor'] ?>><?php echo $cal['nombre_autor']?> &nbsp;<?php echo $cal['apellido_autor'] ?></option> 
											<?php } ?>	
											</select>
								   
								   </td>
								   <td>Editorial:
								   	   <select name="editorial" id="editorial">
										   <?php
											$res = mysqli_query($link,"SELECT * FROM editorial");
											while ( $cal=mysqli_fetch_array($res)){?>
											<option value=<?php echo $cal['id_editorial'] ?>><?php echo $cal['Nombre_Edi']?></option> 
											<?php } ?>	
										</select>
								   </td>
								   <td>Oferta:<select name="oferta">
								              <option value="1" >TRUE</option>
								              <option value="0" >FALSE</option>
								              </select>
								   </td>
							  </tr> 
							  <tr>
								  <input type="hidden" name="modificar" value="<?php echo $ISBN ?>">
							  	<td><input type="image" height=34;  name="modificad" src="./Imagenes/BOTON-ENVIAR.png"></td> 
							  </tr>
							</form>	
						  </table>	 
						   <div class="boton">
								 <form method = "post" action = "libro.php">
										<input type="image" name="imageField" src="./Imagenes/BOTON-CANCELAR.png"> 
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
<?php } 
       else { 
		  header("Location: login.php?error=1"); 
		   } 
?>
