<?php
session_start();
include('../config/config.php');
$id=$_REQUEST['id'];

$_SESSION['eliminar']=1;

mysqli_query($con,"UPDATE paciente SET estado='2' WHERE id_paciente='$id'");
header('Location:../busqueda_paciente.php');
?>
