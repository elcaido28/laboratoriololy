<?php
	session_start();
	include ("../config/config.php");
	$fecha=date('Y-m-d');
	$idrol = $_REQUEST["idr"];

	$rol = $_POST["rol"];
	$precio = $_POST["precio"];

	$_SESSION['confirmar']=2;

	$consulta=mysqli_query($con,"UPDATE reactivo SET nombre_reactivo='$rol', precio_reactivo='$precio' WHERE id_reactivo='$idrol'") or die ("error".mysqli_error());

	mysqli_close($con);
	// header("Location:../editar_rol.php?idr=$idrol");
	header("Location:../ingresar_reactivo.php");

?>