<?php
	session_start();
	include ("../config/config.php");
	$fecha=date('Y-m-d');

	$perfil = $_POST["perfil"];

	$_SESSION['confirmar']=1;

	$consulta=mysqli_query($con,"INSERT INTO perfil (nombre_perfil) VALUES ('$perfil')") or die ("error".mysqli_error());

	mysqli_close($con);
	header("Location:../ingresar_permiso.php");

?>