<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>BITES</title>

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
	section.catalog{
		padding: 0% 1%;
		margin-bottom: 2%;
		display: 	block;
		overflow: hidden;
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
        <li class="active"><a href="index.php">Catálogo</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="registro.php">Registro</a></li>
        <li><a href="login.php">Login</a></li>
        <li class="active"><a href="carrito.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="sr-only">(current)</span></a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>

<section class="catalog">
	<center>
	<?php
		include 'conexion.php';
		$re=mysqli_query($con,"select * from productos")or die(mysqli_error($con));
		while ($f=mysqli_fetch_array($re)) {
	?>
		<div class="card-group">
		  <div class="card col-xs-12 col-sm-6 col-md-3">
		    <img class="card-img-top" src="./productos/<?php echo $f['imagenes'];?>" width="250px" height="150px">
		    <div class="card-block">
		      <h4 class="card-title"><?php echo $f['nombre'];?></h4>
		      
		    </div>
		    <div class="card-footer">
		    	<span>Precio: <?php echo $f['precio']; ?>€/u</span>
		        <a href="./detalles.php?id=<?php echo $f['id'];?>">ver</a>
		    </div>
		  </div>
		</div>

	<?php
		}
	?>
	</center>
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