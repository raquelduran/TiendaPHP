<?php 
	include("../conexion.php");
	if (!isset($_POST['nombre']) ||  !isset($_POST['apellido']) || !isset($_POST['password']) || !isset($_POST['usuario'])) {
		header("Location: ../registro.php?error=faltan datos");
	}else{
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$password=$_POST['password'];
		$usuario=$_POST['usuario'];
		$sql="insert into usuarios (Nombre, Apellido, Usuario, Password) values(
			'".$nombre."',
			'".$apellido."',
			'".$usuario."',
			'".$password."')";
		if (mysqli_query($con,$sql)) {
		 	header ("Location: ../login.php");
		 }else{
		 	echo "Error registrando el usuario";
		 }
	}
?>