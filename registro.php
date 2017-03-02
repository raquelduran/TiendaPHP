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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript" src="js/modificarU.js"></script>
	<style>
		.navbar.navbar-default{
			margin-bottom: 0px;
		}
		
		section.registro{
			padding: 0% 1%;
			margin-bottom: 2%;
			display: 	block;
			overflow: hidden;
			min-height: 	421px;
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
			<?php if ($_SESSION['Usuario'][0]['Usuario'] != "admin") {echo "display:none;";}?>
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
	        <li class="active"><a href="registro.php">Registro</a></li>
	        <li><a href="login.php">Login</a></li>
	        <li class="active"><a href="carrito.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="sr-only">(current)</span></a></li>
	      </ul>
	    </div><!--/.nav-collapse -->
	  </div>
	</nav>
	
	<section class="registro">
		<center><h1>Registro de usuarios</h1></center>
		<form class="col-md-offset-4 col-md-4" action="./registro/altausuario.php" method ="post">
		<?php 
			if(isset($GET['error'])){
				echo "<center>Introduce todos los campos</center>";
			}
		 ?>
			<fieldset>
				Nombre<br>
				<input type="text" name="nombre" required>
			</fieldset>
			<fieldset>
				Apellido<br>
				<input type="text" name="apellido" required>
			</fieldset>
			<fieldset>
				Usuario<br>
				<input type="text" name="usuario" required>
			</fieldset>
			<fieldset>
				Password<br>
				<input type="password" name="password" required>
			</fieldset>			
			<input type="submit" name="accion" value="Enviar" class="aceptar">
		</form>
	</section>
	<div class="clearfix"></div>
	<section id="modificar">
		<center><h1>Modificar y/o eliminar usuarios</h1></center>
		<table class="table" width="100%">
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Usuario</th>
				<th>Password</th>
				<th>Eliminar</th>
				<th>Modificar</th>
			</tr>
			<?php 
				$re=mysqli_query($con,"select * from usuarios");
				while ($row=mysqli_fetch_array($re)) {
					echo '
					<tr>
						<td>
							<input type="hidden" value="'.$row['Id'].'">'.$row['Id'].'
						</td>
						<td><input type="text" class="nombre" value="'.$row['Nombre'].'"></td>
						<td><input type="text" class="apellido" value="'.$row['Apellido'].'"></td>
						<td><input type="text" class="usuario" value="'.$row['Usuario'].'"></td>
						<td><input type="text" class="password" value="'.$row['Password'].'"></td>
						<td><button class="eliminar" data-id="'.$row['Id'].'">Eliminar</button></td>
						<td><button class="modificar" data-id="'.$row['Id'].'">Modificar</button></td>
					</tr>
					';
				}
			?>
		</table>	
	</section>
<footer class="footer">
	  <div class="container">
	    <p><i class="fa fa-paw"></i>&nbsp;&nbsp;Raquel Fernández Durán&nbsp;&nbsp;</p>
	    <p>2º DAW - IES. Francisco Ayala</p>
	    <p>TIENDA PHP&nbsp;&nbsp;<i class="fa fa-shopping-basket"></i></p>
	  </div>
	</footer>
</body>
</html>