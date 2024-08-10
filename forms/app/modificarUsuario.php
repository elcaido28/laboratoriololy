<?php
	session_start();
	include ("../config/config.php");
	$fecha=date('Y-m-d');
	$idusu=$_REQUEST['idu'];

	$_SESSION['confirmar']=2;

	$usuario = $_POST["usuario"];
	$clave = $_POST["clave"];

	$consulta=mysqli_query($con,"UPDATE usuario SET usuario='$usuario', clave='$clave' WHERE id_usuario='$idusu'") or die ("error".mysqli_error());

	// añadido
	$consulta2=mysqli_query($con,"SELECT * FROM usuario U INNER JOIN empleado E ON U.id_empleado=E.id_empleado WHERE U.id_usuario='$idusu'") or die ("error".mysqli_error());
	$row=mysqli_fetch_assoc($consulta2);

	$id_empleado=$row['id_empleado'];

	mysqli_close($con);
	// header("Location:../editar_usuario.php?idu=".$idusu);
	header("Location:../asignar_usuario.php?ide=".$id_empleado);

?>