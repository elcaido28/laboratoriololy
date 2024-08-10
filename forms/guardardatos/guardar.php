<?php
 require "conexion.php";
$pa_ci = $_POST['pa_ci'];
$pa_nombre = $_POST['pa_nombre'];
$pa_apellido = $_POST['pa_apellido'];
$pa_sexo = $_POST['pa_sexo'];
$pa_edad = $_POST['pa_edad'];
$pa_telefono = $_POST['pa_telefono'];
$pa_celular = $_POST['pa_celular'];
$pa_correo = $_POST['pa_correo'];
$pa_ciudad = $_POST['pa_ciudad'];
$pa_direccion = $_POST['pa_direccion'];
$pa_descuento = $_POST['pa_descuento'];
$pa_estado = $_POST['pa_estado'];

$insertar = "INSERT INTO paciente VALUES ('$pa_ci','$pa_nombre','$pa_apellido','$pa_sexo','$pa_edad','$pa_telefono','$pa_celular','$pa_correo','$pa_ciudad','$pa_direccion','$pa_descuento','$pa_estado')";

$query = mysqli_query ($conectar, $insertar);

/*if($query){
      echo "<script> alert('guardado correctamente');
         location.href = 'agpaciente.php';
</script>";
}
else{
       echo "<script> alert('no se guarda');
     location.href = 'agpaciente.php';
     </script>";
}*/

 ?>