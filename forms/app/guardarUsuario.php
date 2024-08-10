<?php
	session_start();
	include ("../config/config.php");
	$fecha=date('Y-m-d');
	$id_emp=$_REQUEST['ide'];

	$_SESSION['confirmar']=1;

	$usuario = $_POST["usuario"];
	$clave = $_POST["clave"];

	$consulta=mysqli_query($con,"INSERT INTO usuario (usuario, clave, id_empleado) VALUES ('$usuario', '$clave', '$id_emp')") or die ("error".mysqli_error());

	mysqli_close($con);
	// header("Location:../asignar_usuario.php?ide=$id_emp");
	header("Location:../ingresar_empleado.php");

?>