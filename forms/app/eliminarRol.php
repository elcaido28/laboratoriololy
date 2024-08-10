<?php
session_start();
include('../config/config.php');
$id=$_REQUEST['id'];

$_SESSION['eliminar']=1;

mysqli_query($con,"DELETE from rol where id_rol='$id'");
header('Location:../ingresar_cargo.php');
?>
