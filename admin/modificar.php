<?php
session_start();
	include "../conexion.php";
	if(isset($_SESSION['Usuario'])){

	}else{
		header("Location: ../index.php?Error=Acceso denegado");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="../js/modificar.js"></script>
</head>
<body>
	<header>
		<img src="../imagenes/logo.png" id="logo">
		<a href="../carrito.php" title="ver carrito de compras">
			<img src="../imagenes/carrito.png">
		</a>
	</header>
	<section>
	<nav class="menu2">
	  <menu>
	    <li><a href="../">Inicio</a></li>
		<li><a href="../admin.php">Ultimas Compras</a></li>
	    <li><a href="agregarproducto.php">Agregar</a></li>
	    <li><a href="#" class="selected">Modificar</a></li>
	    <li><a href="../login/cerrar.php">Salir</a></li>
	  </menu>
	</nav>
	<h1>Modificar y/o eliminar productos</h1>
	<table width="100%">
		<tr>
			<td>Id</td>
			<td>Nombre</td>
			<td>Descripción</td>
			<td>Precio</td>
			<td>Eliminar</td>
			<td>Modificar</td>
		</tr>
		<?php 
			$re=mysqli_query($con,"select * from productos");
			while ($row=mysqli_fetch_array($re)) {
				echo '
				<tr>
					<td>
						<input type="hidden" value="'.$row['id'].'">'.$row['id'].'
						<input type="hidden" class="imagen" value="'.$row['imagenes'].'">
					</td>
					<td><input type="text" class="nombre" value="'.$row['nombre'].'"></td>
					<td><input type="text" class="descripcion" value="'.$row['descripcion'].'"></td>
					<td><input type="text" class="precio" value="'.$row['precio'].'"></td>
					<td><button class="eliminar" data-id="'.$row['id'].'">Eliminar</button></td>
					<td><button class="modificar" data-id="'.$row['id'].'">Modificar</button></td>
				</tr>
				';
			}
		?>
	</table>
	
	</section>
</body>
</html>