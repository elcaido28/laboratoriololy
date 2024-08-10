<?php
	session_start();
	include ("../config/config.php");
	$fecha=date('Y-m-d');
	$idper = $_REQUEST["idp"];

	$perfil = $_POST["perfil"];

	$_SESSION['confirmar']=2;

	$consulta=mysqli_query($con,"UPDATE perfil SET nombre_perfil='$perfil' WHERE id_perfil='$idper'") or die ("error".mysqli_error());

	mysqli_close($con);
	// header("Location:../editar_perfil.php?idp=$idper");
	header("Location:../ingresar_permiso.php");

?>