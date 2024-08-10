<?php
include ("config/config.php");
$fecha=date('Y-m-d');
$id = $_REQUEST["id"];

$correo = $_POST["correo"];
$telefono = $_POST["telefono"];


$consulta=mysqli_query($con,"UPDATE paciente SET correo='$correo', celular='$telefono' WHERE id_paciente='$id'") or die ("error".mysqli_error());

mysqli_close($con);
header("Location:perfil_usu_app.php?id=$id");

 ?>
