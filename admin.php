<?php
session_start();
	include "conexion.php";
	if ($_SESSION['Usuario'][0]['Usuario'] == "admin") {
		
	}else{
		header("Location: ./index.php?Error=Acceso_denegado");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Bites</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<link rel="stylesheet" href="https://bootswatch.com/united/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- 	<link rel="icon" href="https://image.flaticon.com/icons/png/512/40/40861.png" sizes="16x16" type="image/png"> -->
	<link href="https://fonts.googleapis.com/css?family=Asset" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
	<style>
		.navbar.navbar-default{
			margin-bottom: 0px;
		}
		
		section.admin{
			padding: 0% 1%;
			margin-bottom: 2%;
			display: 	block;
			overflow: hidden;
			min-height: 	391px;
		}
		.footer{

			background-color: 	#E95420;
			height: 	100px;
			color: white;
			text-align: 	center;
		}
		a.navbar-brand{
			font-family: 'Asset', cursive;
			font-size: 40px;
		}
		.container{
			padding: 	0px;
		}
		.footer .container p{
			margin-top: 	5px;
		}
	</style>
</head>
<body>
	<header>
		<div id="img"><img src="./imagenes/banner-animales.png" width="100%"/></div>
	</header>
	
	<nav class="navbar navbar-default">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Bites</a>
	    </div>
	    <div id="navbar" class="navbar-collapse collapse">
	      <ul class="nav navbar-nav">
	        <li><a href="inicio.html">Inicio</a></li>
	        <li class="active"><a href="#">Admin</a></li>
	        <li><a href="./admin/agregarproducto.php" >Productos</a></li>
		    <!-- <li><a href="./admin/modificar.php">Modificar producto</a></li> -->
		    <li><a href="registro.php">Agregar usuario</a></li>
		    <li><a href="./registro/modificarU.php">Modificar usuario</a></li>
	        <li><a href="index.php">Catálogo</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="./login/cerrar.php">Salir</a></li>
	        <li class="active"><a href="carrito.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="sr-only">(current)</span></a></li>
	      </ul>
	    </div><!--/.nav-collapse -->
	  </div>
	</nav>
	<section class="admin">
	<center><h1>Últimos pedidos</h1></center>
	<div class="container">
	<table class="table" border="0px" width="100%">	
		<tr>
			<th>Imagen</th>
			<th>Nombre</th>
			<th>Precio</th>
			<th>Cantidad</th>
			<th>Subtotal</th>
		</tr>	

		<?php
			$re=mysqli_query($con,"select * from compras")or die(mysqli_error($con));
			$numeroventa=0;
			while ($f=mysqli_fetch_array($re)) {
					if($numeroventa	!=$f['numeroventa']){
						echo '<tr><td>Pedido nº: '.$f['numeroventa'].' </td></tr>';
					}
					$numeroventa=$f['numeroventa'];
					echo '<tr>
						<td><img src="./productos/'.$f['imagen'].'" width="100px" heigth="100px" /></td>
						<td>'.$f['nombre'].'</td>
						<td>'.$f['precio'].'</td>
						<td>'.$f['cantidad'].'</td>
						<td>'.$f['subtotal'].'</td>
					</tr>';
			}
		?>
	</table>
	</div>
	</section>
</body>
</html>