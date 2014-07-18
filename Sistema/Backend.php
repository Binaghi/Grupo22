<?php 
   error_reporting(E_ALL^E_NOTICE);
   session_start(); 
   if ($_SESSION['estado'] == "logeado"){  
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
            palabra: { required: true, minlength: 2},
        },
        messages: {
            palabra: "Introducir campo de titulo!!",
        },
    });
}); 
</script>

 <title>:: Backend ::</title>
 <?php
		include('conectar.php');
 ?>
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
							<a href="./autor.php">Autor</a>
					        <a href="./libro.php">Libro</a>
					</div>
			</div>
	  </div>

	  <div class="principal">
		  	<div class="columna">
					<div class="sesion"><a href='cerrarSesion.php'>Cerrar sesion</a></div>
					<div class="sesion">
							<form id="formid" action="#" method="post">
								Buscar: <input id="palabra" name="palabra">
								<input type="image" name="submit" width=30px; height=30px; src="./Imagenes/buscar.png">
							</form>
                   </div>
                   <div class="sesion"><a href='EstadoVenta.php'>Ver Ventas</a></div>
                   <div class="sesion"><a href='stock.php'>STOCK</a></div>
	        </div>
	       <?php
	        $url = "Backend.php";
			if ( $buscar == "vacio"){
			    $rs_noticias = mysqli_query($link, "SELECT * FROM libro"); 
			}
	        else {
	           $rs_noticias = mysqli_query($link, "SELECT * FROM libro WHERE titulo LIKE '%$buscar%' ");
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
				$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);?>
				  <div class="titulo">
				  <h1>Catalogo</h1>
				  </div>
				  <div class="mostrar">
		<?php   if ($buscar == "vacio"){
					$consulta = mysqli_query($link, "SELECT * FROM libro LIMIT ".$inicio."," . $TAMANO_PAGINA);
				}
				else{
				    $consulta = mysqli_query($link, "SELECT * FROM libro WHERE titulo LIKE '%$buscar%' LIMIT ".$inicio."," . $TAMANO_PAGINA);
				}
				while ($row = mysqli_fetch_array($consulta)) {
					$consult = mysqli_query($link, "SELECT * FROM libro_categoria WHERE $row[ISBN] = ISBN");
				    $cat = mysqli_fetch_array($consult);
					?>
					<div class="rotulo">TITULO: <?php echo $row['titulo']?></div>
				    <div class="imagen">
							<img width="90px" height="140px" src="./Imagenes/<?php echo $cat['nombre_categoria']?>.png">	
							<div class="precio">PRECIO: $<?php echo $row['precio']?></div>
         			        <div class="stock">STOCK: <?php echo $row['stock_actual']?></div>
         			</div>
				<?php } ?>
				</div>
				<?php
				echo '<p>';

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
				echo '</p>';
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

