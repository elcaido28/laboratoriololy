<?php
	session_start();
	include ("../config/config.php");
	$fecha=date('Y-m-d');

	$rol = $_POST["rol"];

	$_SESSION['confirmar']=1;

	$consulta=mysqli_query($con,"INSERT INTO rol (nombre_rol) VALUES ('$rol')") or die ("error".mysqli_error());

	mysqli_close($con);
	header("Location:../ingresar_cargo.php");

?>