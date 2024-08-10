<?php
	session_start();
	include ("../config/config.php");
	$fecha=date('Y-m-d');

	$_SESSION['confirmar']=1;

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

	$consulta=mysqli_query($con,"INSERT INTO empleado (fecha_ingreso, fecha_modificacion, nombres, apellidos, cedula, telefono, celular, correo, direccion, id_rol, id_perfil, id_estado) VALUES ('$fecha', '$fecha', '$nombres', '$apellidos', '$cedula', '$telefono', '$celular', '$correo', '$direccion', '$rol', '$perfil', '$estado')") or die ("error".mysqli_error());

	mysqli_close($con);
	header("Location:../ingresar_empleado.php");

?>