<?php 
	session_start();
	include "conexion.php";
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
	<link href="https://fonts.googleapis.com/css?family=Asset" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript" src="js/modificarU.js"></script>
	<style>
		.navbar.navbar-default{
			margin-bottom: 0px;
		}
		#userNav:hover {
			background-color: #E95420;
		}
		section.registro{
			padding: 0% 1%;
			margin-bottom: 2%;
			display: 	block;
			overflow: hidden;
			min-height: 450px;
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
		#modificar{
			display: none;
			<?php if ($_SESSION['Usuario'][0]['Usuario'] == "admin" ) {
				echo "display:block;";
			}?>
		}
		.table {
			width: 80%;
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
	        <li ><a href="index.php">Catálogo</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <?php
			if (isset($_SESSION['Usuario'])) {
				echo "<li><a href='' id='userNav'>".$_SESSION['Usuario'][0]['Usuario']."</a></li>";
				if ($_SESSION['Usuario'][0]['Usuario'] == 'admin') {
			?>
					<li class='dropdown'>
					  <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><span class='fa fa-cog'></span></a>
					    <ul class='dropdown-menu' role='menu'>
					      <li><a href='registro.php'>Usuarios</a></li>
					      <li><a href='./admin/productos.php'>Productos</a></li>
					      <li><a href='admin.php'>Pedidos</a></li>
					    </ul>
					</li>
			<?php
				} else {
					echo"<li><a href='./login/panelU.php'><i class='fa fa-cog' aria-hidden='true'></i></a></li>";
				}
				echo "<li><a href='./login/cerrar.php'>Salir</a></li>";
			}
			else{
				echo "<li><a href='registro.php'>Registro</a></li>";
				echo "<li><a href='login.php'>Login</a></li>";
			}
        	?>
        	<li class="active"><a href="./carrito.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
	      </ul>
	    </div><!--/.nav-collapse -->
	  </div>
	</nav>
	
	<section class="registro">
		<center><h1>Registro de usuarios</h1></center>
		<form class="col-xs-offset-4 col-xs-4 col-sm-offset-4 col-sm-4 col-md-offset-4 col-md-4" action="./admin/altausuario.php" method ="post">
		<?php 
			if(isset($_GET['error'])){
				echo "<center>Introduce todos los campos</center>";
			}
			elseif (isset($_GET['con'])) {
				echo "<center>Error en la conexión</center>";
			}
		 ?>
			<fieldset class="form-group">
				Nombre<br>
				<input type="text" name="nombre" required class="form-control">
			</fieldset>
			<fieldset class="form-group">
				Apellido<br>
				<input type="text" name="apellido" required class="form-control">
			</fieldset>
			<fieldset class="form-group">
				Usuario<br>
				<input type="text" name="usuario" required class="form-control">
			</fieldset>
			<fieldset class="form-group">
				Password<br>
				<input type="password" name="password" required class="form-control">
			</fieldset>			
			<input type="submit" name="accion" value="Enviar" class="btn btn-primary aceptar">
		</form>
	</section>
	<div class="clearfix"></div>
	<section id="modificar">
		<center><h1>Gestión de usuarios</h1></center>
		<table class="table col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Usuario</th>
				<th>Password</th>
				<th>Modificar</th>
				<th>Eliminar</th>
			</tr>
			<?php 
				$datos=mysqli_query($con,"select * from usuarios");
				while ($fila=mysqli_fetch_array($datos)) {
					echo '
					<tr>
						<td>
							<input type="hidden" value="'.$fila['Id'].'">'.$fila['Id'].'
						</td>
						<td><input type="text" class="nombre form-control" value="'.$fila['Nombre'].'"></td>
						<td><input type="text" class="apellido form-control" value="'.$fila['Apellido'].'"></td>
						<td><input type="text" class="usuario form-control" value="'.$fila['Usuario'].'"></td>
						<td><input type="password" class="password form-control" value="'.$fila['Password'].'"></td>
						<td><button class="modificar btn btn-primary" data-id="'.$fila['Id'].'">Modificar</button></td>
						<td><a class="eliminar" data-id="'.$fila['Id'].'"><i class="fa fa-times" aria-hidden="true"></i></a></td>
					</tr>
					';
				}
			?>
		</table>	
	</section>
	<div class="clearfix"></div>
<footer class="footer">
	  <div class="container">
	    <p><i class="fa fa-paw"></i>&nbsp;&nbsp;Raquel Fernández Durán&nbsp;&nbsp;</p>
	    <p>2º DAW - IES. Francisco Ayala</p>
	    <p>TIENDA PHP&nbsp;&nbsp;<i class="fa fa-shopping-basket"></i></p>
	  </div>
	</footer>
</body>
</html>