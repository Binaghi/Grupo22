<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	        error_reporting(E_ALL^E_NOTICE);
	        session_start();
	        include('conectar.php');
	         if ( isset($_GET['error'])  and  $_GET['error'] == '1' ){ ?>
			<script language="javascript"> alert("Se cambio la clave correctamente");</script>
		    <?php };
		    
	        if ( isset($_GET['error'])  and  $_GET['error'] == '2' ){ ?>
			<script language="javascript"> alert("Se registro correctamente, puede logearse");</script>
		    <?php };
		     
	        if ( isset($_GET['error'])  and  $_GET['error'] == '0' ){
				$_SESSION['estado2'] = "logeado"; 
			}
			$result = mysqli_query($link, "SELECT * FROM libro WHERE oferta = '1' ORDER BY ISBN asc LIMIT 4");
			
			if(isset($_SESSION["carro"])) {
				$carro=$_SESSION["carro"]; 
			}	
			else{ 
				$carro=false;
            }	
	?>
	
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

	<title>::CookBook::</title>
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
				     <?php if ($_SESSION['estado2'] <> "logeado" && $_SESSION['estado'] <> "logeado"){?>
					 <a href="./login.php">Iniciar Sesion</a>
					 <a href="./registro.php">Registrarse</a>
					 <?php } ?>
					 <a href="./catalogo.php">Catalogo</a>
			  </div>
	  </div>

		<div class="menu">
		</div>
		<div class="principal">
	      <div class="columna">
			  <?php if ($_SESSION['estado2'] == "logeado" || $_SESSION['estado'] == "logeado"){ ?>
				<div class="sesion"><a href='cerrarSesion.php'>Cerrar sesion</a></div>
				<?php if ( $_SESSION['estado'] <> "logeado"){ ?>
				<div class="sesion"><a href='modificar_dato.php'>Modificar Datos</a></div>
				<div class="sesion"><a href='EstadoCompra.php'>Ver Estado Compra</a></div>
			    <?php } ?>
			    <?php } ?>
                <div class="sesion">
					<form id="formid" action="catalogo.php" method="post">
						Buscar: <input id="palabra" name="palabra">
                        <input type="image" name="submit" width=30px; height=30px; src="./Imagenes/buscar.png">
                    </form>
                </div>	        
	      </div>
	      <div class="titulo">
				  <h2>Lista de Ofertas</h2>
		  </div>
	      <div class="mostrar">
	      <?php 
	          while ($arreglo = mysqli_fetch_array($result)) {
				    $i=1;
				    $consult = mysqli_query($link, "SELECT * FROM libro_categoria WHERE $arreglo[ISBN] = ISBN");
				    $cat = mysqli_fetch_array($consult);?>
				    <div class="rotulo">TITULO: <?php echo $arreglo['titulo']?></div>
				    <div class="imagen">
							<img width="90px" height="140px" src="./Imagenes/<?php echo $cat['nombre_categoria']?>.png">	
							<div class="precio">PRECIO: $<?php echo $arreglo['precio']?></div>
         			        <div class="stock">STOCK: <?php echo $arreglo['stock_actual']?></div>
         			        <?php if ($_SESSION['estado2'] == "logeado"){ ?>
         			        <form id="formid" action="agregacar.php" method="get">
								<input type="hidden" name="ISBN" value=<?php echo $arreglo ['ISBN'] ?>> 
								<input type="hidden" name="home" value="home">
								<select name="cantidad">
									       <?php for ($i; $i <= $arreglo['stock_actual']; $i++) {?> 
											<option value="<?php echo $i ?>"><?php echo $i ?></option>
										   <?php } ?>
								</select>
								<input type="image" name="submit" width="20" height="20" src="./Imagenes/vercarrito.gif">
							 </form>	
						   <?php } ?>
         			</div>
				<?php }?>
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
