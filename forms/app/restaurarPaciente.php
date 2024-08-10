<?php
session_start();
include('../config/config.php');
$id=$_REQUEST['id'];

$_SESSION['eliminar']=1;

mysqli_query($con,"UPDATE paciente SET estado='1' WHERE id_paciente='$id'");
header('Location:../restaurar_paciente.php');
?>
