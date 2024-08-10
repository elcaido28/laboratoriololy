<?php
	session_start();
	include ("../config/config.php");
	$fecha=date('Y-m-d');
	$idrol = $_REQUEST["idr"];

	$rol = $_POST["rol"];

	$_SESSION['confirmar']=2;

	$consulta=mysqli_query($con,"UPDATE rol SET nombre_rol='$rol' WHERE id_rol='$idrol'") or die ("error".mysqli_error());

	mysqli_close($con);
	// header("Location:../editar_rol.php?idr=$idrol");
	header("Location:../ingresar_cargo.php");

?>