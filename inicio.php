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
				margin-bottom: 30px;
			}
			#userNav:hover {
			background-color: #E95420;
			}
			section.inicio{
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
			.texto{
				text-align: 	justify;
			}
		</style>
</head>
<body>
<?php
	session_start();
	include 'conexion.php';
?>
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
        <li class="active"><a href="inicio.php">Inicio</a></li>
        <li><a href="index.php">Catálogo</a></li>
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
        <li class="active"><a href="carrito.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
	<section class="inicio" >
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6">
				<img src="http://ichef.bbci.co.uk/news/ws/660/amz/worldservice/live/assets/images/2015/11/27/151127162942_gato_624x351_thinkstock_nocredit.jpg" width="100%">
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 texto">
				<p>En <strong>Bites</strong> elaboramos nuestros productos para perros y gatos de manera artesanal y con <u>ingredientes naturales.</u></p><br>
				<p><strong>Nuestro obrador está incluido en el Registro de Establecimientos e Intermediarios para el sector de la alimentación animal.</strong></p>
				<p>No usamos aditivos, aromatizantes, antioxidantes ni conservantes.</p>
				<p>Solo utilizamos ingredientes frescos que son beneficiosos para su salud (sin lactosa, sin sal y sin grasas saturadas) que harán las delicias de nuestras mascotas.</p>
				<br>
				<br>
			<p>¡Contamos con obrador y tienda! Puedes visitarnos y ver en persona como elaboramos todos nuestros productos :)</p>
			</div>
		</div>
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