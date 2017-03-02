<?php
	session_start();
	include './conexion.php';
	if (isset($_SESSION['carrito'])) {
		if (isset($_GET['id'])) {
		$arreglo=$_SESSION['carrito'];
		$encontro=false;
		$numero=0;
		for ($i=0; $i < count($arreglo) ; $i++) { 
			if ($arreglo[$i]['Id']==$_GET['id']) {
				$encontro=true;
				$numero=$i;
			}
		}
		if($encontro==true){
			$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
			$_SESSION['carrito']=$arreglo;
		}else{
			$nombre="";
			$precio=0;
			$imagen="";
			$re=mysqli_query($con,"select * from productos where id=".$_GET['id']);
			while ($f=mysqli_fetch_array($re)) {
				$nombre=$f['nombre'];
				$precio=$f['precio'];
				$imagen=$f['imagenes'];
			}
			$datosNuevos=array('Id'=>$_GET['id'],
							'Nombre'=>$nombre,
							'Precio'=>$precio,
							'Imagen'=>$imagen,
							'Cantidad'=>1);
			array_push($arreglo, $datosNuevos);
			$_SESSION['carrito']=$arreglo;
		}
	}

	}else{
		if(isset($_GET['id'])){
			$nombre="";
			$precio=0;
			$imagen="";
			$re=mysqli_query($con,"select * from productos where id=".$_GET['id']);
			while ($f=mysqli_fetch_array($re)) {
				$nombre=$f['nombre'];
				$precio=$f['precio'];
				$imagen=$f['imagenes'];
			}
			$arreglo[]=array('Id'=>$_GET['id'],
							'Nombre'=>$nombre,
							'Precio'=>$precio,
							'Imagen'=>$imagen,
							'Cantidad'=>1);
			$_SESSION['carrito']=$arreglo;
		}
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
		
		<script type="text/javascript"  src="./js/scripts.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<style>
			.navbar.navbar-default{
				margin-bottom: 0px;
			}
			
			section.carrito{
				padding: 0% 1%;
				margin-bottom: 2%;
				display: 	block;
				overflow: hidden;
				min-height: 	391px;
				margin:auto;
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
			.footer{
				margin-top: 5%;
			}
			.datos{
				padding: 	0px;
				text-align: 	left;
				display: 	inline-block;	
			}
			.datos p{
				color: black;
			}
			.producto{
				margin-top: 5%;
			}
			th{
				min-width: 250px;
			}
			th:first-child{
				min-width: 300px;
			}
			tr{
				height: 100px;
			}
			.centrado{
				margin: auto;
			}
			.dcha{
				text-align: right;
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
        <li><a href="login.php">Login</a></li>
        <li class="active"><a href="carrito.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="sr-only">(current)</span></a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
	<section class="carrito">
		<div class="col-xs-12 col-sm-8 col-md-8 col-md-offset-1">
		<?php
			$total=0;
			if (isset($_SESSION['carrito'])) {
		?>
				<table>
				<tr>
					<th>Producto</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Subtotal</th>
					<th>Eliminar</th>
				</tr>
		<?php
					$datos=$_SESSION['carrito'];
					$total=0;
					for ($i=0; $i < count($datos); $i++) { 
		?>
						<tr class="producto">
							<td>
								<img src="./productos/<?php echo $datos[$i]['Imagen'];?>" width="100px" height="70px">
								<span>&nbsp;&nbsp;<?php echo $datos[$i]['Nombre'];?></span>
							</td>
							<td><?php echo $datos[$i]['Precio'];?>€</td>
							<td><input type="text" value="<?php echo $datos[$i]['Cantidad'];?>"
									data-precio="<?php echo $datos[$i]['Precio'];?>"
									data-id="<?php echo $datos[$i]['Id'];?>"
									class="cantidad"></td>
							<td><span class="subtotal"><?php echo $datos[$i]['Precio']*$datos[$i]['Cantidad'];?>€</span></td>
							<td style="padding: 0% 3%;"><a href="#" class="eliminar" data-id="<?php echo $datos[$i]['Id']?>" ><i class="fa fa-times" aria-hidden="true"></i></a></td>
								
						</tr>
		<?php
			$total=($datos[$i]['Precio']*$datos[$i]['Cantidad'])+$total;
			}
			echo '</table>';
			
					
				
			}else{
				echo '<center><p style="margin-top:20px;">El carrito esta vacio</p></center>';
			}
			echo '<center class="dcha"><h2 id="total" >Total: '.$total.'€</h2></center>';
			if ($total!=0) {
				echo '<center class="dcha"><a href="./compras.php" class="aceptar"><strong>Realizar Pedido</strong></a></center>';
			}
		?>
		<center class="dcha"><a href="./">Seguir comprando</a></center>
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