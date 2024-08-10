<?php
	session_start();
	include ("../config/config.php");
	$fecha=date('Y-m-d');
	$id_paciente=$_REQUEST['id'];

	$_SESSION['confirmar']=1;

	$sexo = $_POST["sexo"];
	$tipopaciente = $_POST["tipopaciente"];
	$tipoid = $_POST["tipoid"];
	$cedula = $_POST["cedula"];
	$nombres = $_POST["nombres"];
	$apellidos = $_POST["apellidos"];
	$fnaci = $_POST["fnaci"];
	$edad = $_POST["edad"];
	$celular = $_POST["celular"];
	$telefono = $_POST["telefono"];
	$correo = $_POST["correo"];
	$direccion = $_POST["direccion"];
	$observacion = $_POST["observacion"];


	$consulta=mysqli_query($con,"UPDATE paciente SET fecha_modificacion='$fecha', nombres='$nombres', apellidos='$apellidos', tipo_identificacion='$tipoid', identificacion='$cedula', fecha_nacimiento='$fnaci', edad='$edad', telefono='$telefono', celular='$celular', correo='$correo', direccion='$direccion', observacion='$observacion', sexo='$sexo', tipo_paciente='$tipopaciente' WHERE id_paciente='$id_paciente'") or die ("error".mysqli_error());

	mysqli_close($con);
	// header("Location:../editar_paciente.php?id=$id_paciente");
	header("Location:../busqueda_paciente.php");

?>