<?php
session_start();
include('../config/config.php');
$id=$_REQUEST['id'];
$ide=$_REQUEST['ide'];

$_SESSION['eliminar']=1;

mysqli_query($con,"DELETE from usuario where id_usuario='$id'");
header('Location:../asignar_usuario.php?ide='.$ide);
?>
