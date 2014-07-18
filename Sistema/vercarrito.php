<?php 
error_reporting(E_ALL^E_NOTICE);
session_start(); 
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];
else $carro=false;
?> 
<html> 
<head> 
<title>CARRITO</title> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<link rel="stylesheet" href="estilos.css"/>	
<style type="text/css"> 
<!--  
.tit { 
 font-family: Verdana, Arial, Helvetica, sans-serif; 
 font-size: 9px; 
 color: #FFFFFF; 
} 
.prod { 
 font-family: Verdana, Arial, Helvetica, sans-serif; 
 font-size: 9px; 
 color: #333333; 
} 
h1 { 
 font-family: Verdana, Arial, Helvetica, sans-serif; 
 font-size: 20px; 
 color: #990000; 
} 
--> 
</style> 

</head> 
<body> 
<div class="contenedor">
   <div class='fondoContenedorTop'></div>
   <div class='fondoContenedorMain'> 
	  <div class="encabezado">
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
				<?php } ?>
		  </div>
				<h1 align="center">Carrito</h1> 
				<?php 
				if($carro){ 
				?> 
				<table width="550" border="0" cellspacing="0" cellpadding="0" align="center"> 
				 <tr bgcolor="#333333" class="tit"> 
				 <td width="207">Titulo</td> 
				 <td width="60">Precio</td> 
				 <td colspan="2" align="center">Cantidad de Unidades</td> 
				 <td width="70" align="center">Borrar</td> 
				 </tr> 
				 <?php 
				 $color=array("#ffffff","#F0F0F0"); 
				 $contador=0; 
				 $suma=0; 
				 foreach($carro as $k => $v){ 
				 $subto=$v['cantidad']*$v['precio']; 
				 $suma=$suma+$subto; 
				 $contador++; 
				 ?> 
				 <tr bgcolor="<?php echo $color[$contador%2]; ?>" class='prod'> 
				 <td><?php echo $v['titulo'] ?></td> 
				 <td><?php echo $v['precio'] ?></td> 
				 <td width="43" align="center"></td> 
				 <td width="136" align="center"> <?php echo $v['cantidad'] ?> </td> 
				 <td align="center"><a href="borracar.php?id=<?php echo $v['ISBN'] ?>"><img src="./Imagenes/trash.gif" width="12" height="14" border="0"></a></td> 
				 </tr></form> 
				
				 <?php }?> 
				</table> 
				<div align="center"><span class="prod">Total de Artículos: <?php echo count($carro); ?></span> 
				</div><br> 
				<div align="center"><span class="prod">Total: $<?php echo number_format($suma,2); ?></span></div> 
				<br> 
				<div align="center"><span class="prod">Continuar la selección de libros</span> 
				 <a href="catalogo.php"><img src="./Imagenes/continuar.gif" width="13" height="13" border="0" align="absmiddle"></a>&nbsp; 
				 <a href="comprar.php"><img src="./Imagenes/finalizarcompra.gif" width="135" height="16" border="0" align="absmiddle"></a> 
				</div> 
				 
				<?php }else{ ?> 
				<p align="center"> <span class="prod">No hay libros seleccionados</span> <a href="catalogo.php?<?php echo SID;?>"><img src="./Imagenes/continuar.gif" width="13" height="13" border="0"></a> 
				 <?php }?> 
				</p> 
				<p align="center"> <span class="prod"> Eliminar todos los libros </span> <a href="eliminarcar.php?<?php echo SID;?>"><img src="./Imagenes/eliminar.png" width="13" height="13" border="0"></a></p>

	</div>
	  <div class="piedepagina">
		Informaci&oacuten; de contacto ...
	  </div>
	</div>
  <div class='fondoContenedorBottom'></div>
</div>
</body> 
</html> 
