<?php
include ("config/config.php");
$fecha=date('Y-m-d');
$id = $_REQUEST["id"];

$pass = $_POST["contrasena"];
$clave = $_POST["clave"];
$rclave = $_POST["rclave"];

$consulta=mysqli_query($con,"SELECT * FROM paciente WHERE id_paciente='$id' and paciente_clave='$pass' ");
$nrow=mysqli_num_rows($consulta);
$paciente=$row['nombres']." ".$row['apellidos'];
if ($nrow>0) {
  if ($clave==$rclave) {
    $consulta=mysqli_query($con,"UPDATE paciente SET paciente_clave='$rclave' WHERE id_paciente='$id'") or die ("error".mysqli_error());
    $dtcon=1;
  }else{
    $dtcon=0;
  }
}else{
    $dtcon=0;
}

mysqli_close($con);
header("Location:perfil_usu_app.php?id=$id&datn=$dtcon");

 ?>