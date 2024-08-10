<?php
	session_start();
	include ("../config/config.php");
	$fecha=date('Y-m-d');

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
	$estado = "1";
	$usuario = $_POST["cedula"];

	// CLAVE ALEATORIA
	$charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
	$cad = "";
	for($p=0;$p<10;$p++){
		$cad .= substr($charset, rand(0, 62), 1);
	}
	$clave = $cad;
	// FIN CLAVE ALEATORIA
	include('envio_clave_paciente.php?cedula=$cedula&correo=$correo&clave=$clave');

	$consulta=mysqli_query($con,"INSERT INTO paciente (fecha_ingreso, fecha_modificacion, nombres, apellidos, tipo_identificacion, identificacion, fecha_nacimiento, edad, telefono, celular, correo, direccion, observacion, paciente_usuario, paciente_clave, sexo, tipo_paciente, estado) VALUES ('$fecha', '$fecha', '$nombres', '$apellidos', '$tipoid', '$cedula', '$fnaci', '$edad', '$telefono', '$celular', '$correo', '$direccion', '$observacion', '$usuario', '$clave', '$sexo', '$tipopaciente', '$estado')") or die ("error".mysqli_error());

	mysqli_close($con);
	header("Location:../ingresar_paciente.php");

?>