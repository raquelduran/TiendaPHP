<?php
session_start();
include "../conexion.php";
$re=mysqli_query($con,"select * from usuarios where Usuario='".$_POST['Usuario']."' AND 
 					Password='".$_POST['Password']."'")	or die(mysqli_error($con));
	while ($f=mysqli_fetch_array($re)) {
		$arreglo[]=array('Nombre'=>$f['Nombre'],
				'Apellido'=>$f['Apellido'],
				'Usuario'=>$f['Usuario']);
	}
	if(isset($arreglo)){
		$_SESSION['Usuario']=$arreglo;
		if ($_SESSION['Usuario'][0]['Usuario'] == "admin") {
			header("Location: ../admin.php");
		} else {
			header("Location: ../index.php");
		}
		
		
	}else{
		header("Location: ../login.php?error=datos no validos");
	}
?>