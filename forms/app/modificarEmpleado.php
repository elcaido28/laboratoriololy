<?php
	session_start();
	include ("../config/config.php");
	$fecha=date('Y-m-d');
	$ide = $_REQUEST["id"];

	$_SESSION['confirmar']=2;

	$nombres = $_POST["nombres"];
	$apellidos = $_POST["apellidos"];
	$cedula = $_POST["cedula"];
	$correo = $_POST["correo"];
	$celular = $_POST["celular"];
	$telefono = $_POST["telefono"];
	$direccion = $_POST["direccion"];
	$rol = $_POST["rol"];
	$perfil = $_POST["perfil"];
	$estado = "1";

	$consulta=mysqli_query($con,"UPDATE empleado SET fecha_modificacion='$fecha', nombres='$nombres', apellidos='$apellidos', cedula='$cedula', telefono='$telefono', celular='$celular', correo='$correo', direccion='$direccion', id_rol='$rol', id_perfil='$perfil' WHERE id_empleado='$ide'") or die ("error".mysqli_error());

	mysqli_close($con);
	// header("Location:../editar_empleado.php?ide=$ide");
	header("Location:../ingresar_empleado.php");

?>