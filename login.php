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
	<!-- 	<link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet"> -->
		<link href="https://fonts.googleapis.com/css?family=Asset" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="./css/estilos.css">
		<script type="text/javascript"  href="./js/scripts.js"></script>
	<style>
		.navbar.navbar-default{
			margin-bottom: 0px;
		}
		.card{
			margin-top: 2%;
		}
		.card-footer a{
			margin-left: 3%;
		}
		section.login{
			padding: 0% 1%;
			margin-bottom: 2%;
			display: 	block;
			overflow: hidden;
			min-height: 452px;
			width: 400px;
			margin: auto;
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
		#formulario{
			margin-top: 30px;
		}
	</style>
	</head>
	<body>
	<header>
		<div id="img"><img src="./imagenes/banner-animales.png" width="100%"/></div>
	</header>
	<!-- navbar -->
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
	        <li><a href="index.php">Catálogo</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="registro.php">Registro</a></li>
	        <li class="active"><a href="login.php">Login</a></li>
	        <li class="active"><a href="carrito.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="sr-only">(current)</span></a></li>
	      </ul>
	    </div><!--/.nav-collapse -->
	  </div>
	</nav>
	<section class="login">
	<form id="formulario" method="post" action="./login/verificar.php">
		<?php
		if(isset($_GET['error'])){
			echo "<center style='color: #E95420;''>Datos no válidos</center>";
		}
		?>
     <div class="form-group">
         <label for="usuario">Usuario</label>
         <input type="text" id="usuario" name="Usuario" class="form-control" placeholder="usuario" >
     </div>
     <div class="form-group">
         <label for="password">Contraseña</label>
         <input type="password" id="password" name="Password" class="form-control" placeholder="Contraseña">
     </div>
     <button type="submit" name="aceptar" value="aceptar" class="btn btn-primary aceptar">Entrar</button>
</form>
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
