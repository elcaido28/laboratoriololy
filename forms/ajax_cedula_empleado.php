<?php
include('config/config.php');
$salida="";
if(isset($_POST['consulta'])){
  	$id_estu=$_POST['consulta'];
	$consulta=mysqli_query($con,"SELECT * from empleado where  cedula='$id_estu'");
	$rows=mysqli_num_rows($consulta);
	if ($rows>0) {
  		$salida="1";
	}else {
  		$salida="0";
	}
}else{
	$salida="";
}
echo $salida;
mysqli_close($con);

?>