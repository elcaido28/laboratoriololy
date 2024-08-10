<?php
session_start();
include('../config/config.php');
$id=$_REQUEST['id'];

$_SESSION['eliminar']=1;

mysqli_query($con,"UPDATE empleado SET id_estado='1' WHERE id_empleado='$id'");
header('Location:../restaurar_empleado.php');
?>
