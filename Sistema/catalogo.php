<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	        error_reporting(E_ALL^E_NOTICE);
	        session_start();
	        include('conectar.php');
	         if ( isset($_GET['error'])  and  $_GET['error'] == '0' ){ ?>
					<script language="javascript">alert("La compra se realizo correctamente");</script>
			<?php }; 
	        if ( isset($_GET['error'])  and  $_GET['error'] == '0' ){
				$_SESSION['estado2'] = "logeado"; 
			}
			  if ( $_POST['submit']){
				   $buscar = $_POST ['palabra'];
			  }
			  else{
				  $buscar = "vacio";   
			  };  
			if(isset($_SESSION["carro"])) {
				$carro=$_SESSION["carro"]; 
			}	
			else{ 
				$carro=false;
            }	
	?>
	<title>::Catalogo::</title>
	<link rel="stylesheet" href="estilos.css"/>	  
</head>
<body>
<div class="contenedor">
   <div class='fondoContenedorTop'></div>
   <div class='fondoContenedorMain'> 
	  <div class="encabezado">
		  <?php if ($_SESSION['estado2'] == "logeado"){ ?>
		  <div class="carrito">
						<a href="vercarrito.php" title="Ver el contenido del carrito"><img src="./Imagenes/carrito.png" width="50" height="50" border="0"></a>
		  </div>
		  <?php } ?>
		  <div class="logo"></div>
			  <div class="logeo">
				     <a href="./index.php">Inicio</a>
				     <?php if ($_SESSION['estado2'] <> "logeado"){?> 
					 <a href="./login.php">Iniciar Sesion</a>
					 <a href="./registro.php">Registrarse</a>
					 <?php } ?>
			  </div>
	  </div>

		<div class="menu">
		</div>
		<div class="principal">
	      <div class="columna">
			  <?php if ($_SESSION['estado2'] == "logeado"){ ?>
				<div class="sesion"><a href='cerrarSesion.php'>Cerrar sesion</a></div>
				<div class="sesion"><a href='EstadoCompra.php'>Ver Estado Compra</a></div>
	          <?php } ?>
	      </div>
	     <?php
	        $url = "catalogo.php";
	        if ( $buscar == "vacio"){
			    $rs_noticias = mysqli_query($link, "SELECT * FROM libro"); 
			}
	        else {
	           $rs_noticias = mysqli_query($link, "SELECT * FROM libro WHERE titulo LIKE '%$buscar%' ");
	        }
	        $num_total_registros = mysqli_num_rows($rs_noticias);
	        if ($num_total_registros == 0){
				?><div class="titulo"><h1> NO SE ENCONTRARON DATOS!!!</h1></div> <?php
				}
			if ($num_total_registros > 0) {
				$TAMANO_PAGINA = 4;
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
					$i=1;
					$consult = mysqli_query($link, "SELECT * FROM libro_categoria WHERE $row[ISBN] = ISBN");
				    $cat = mysqli_fetch_array($consult);
					?>
					<div class="rotulo">TITULO: <?php echo $row['titulo']?></div>
				    <div class="imagen">
							<img width="90px" height="140px" src="./Imagenes/<?php echo $cat['nombre_categoria']?>.png">	
							<div class="precio">PRECIO: $<?php echo $row['precio']?></div>
         			        <div class="stock">STOCK: <?php echo $row['stock_actual']?></div>
         			         <?php if ($_SESSION['estado2'] == "logeado"){ ?>
							 <form id="formid" action="agregacar.php" method="get">
								<input type="hidden" name="ISBN" value=<?php echo $row ['ISBN'] ?>> 
								<select name="cantidad">
									       <?php for ($i; $i <= $row['stock_actual']; $i++) {?> 
											<option value="<?php echo $i ?>"><?php echo $i ?></option>
										   <?php } ?>
								</select>
								<input type="image" name="submit" width="20" height="20" src="./Imagenes/vercarrito.gif">
							 </form>
							 <?php } ?>	
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
