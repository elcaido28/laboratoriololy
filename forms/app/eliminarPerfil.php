<?php
session_start();
include('../config/config.php');
$id=$_REQUEST['id'];

$_SESSION['eliminar']=1;

mysqli_query($con,"DELETE from perfil where id_perfil='$id'");
header('Location:../ingresar_permiso.php');
?>
