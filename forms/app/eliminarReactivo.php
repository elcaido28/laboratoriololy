<?php
session_start();
include('../config/config.php');
$id=$_REQUEST['id'];

$_SESSION['eliminar']=1;

mysqli_query($con,"DELETE from reactivo where id_reactivo='$id'");
header('Location:../ingresar_reactivo.php');
?>
