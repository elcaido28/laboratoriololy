<?php
 
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

$conexion = mysqli_connect("localhost", "laboratorio", "123456", "loly");

if (!$conexion) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";

$insertar = "INSERT INTO paciente (pa_ci,pa_nombre,pa_apellido,pa_sexo,pa_edad,pa_telefono,pa_celular,pa_correo,pa_ciudad,pa_direccion,pa_descuento,pa_estado)
VALUES ('$pa_ci','$pa_nombre','$pa_apellido','$pa_sexo','$pa_edad','$pa_telefono','$pa_celular','$pa_correo','$pa_ciudad','$pa_direccion','$pa_descuento','$pa_estado')";

if (mysqli_query($conexion, $insertar)){
     echo "<script> alert('guardado correctamente');
         location.href = 'agpaciente.php';
</script>";
}
else{
       echo "<script> alert('no se guarda');
     location.href = 'agpaciente.php';
     </script>";
}
mysqli_close($conexion);

/*
if (mysqli_query($conexion, $insertar)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $insertar . "<br>" . mysqli_error($conexion);
}
mysqli_close($conexion);*/

 ?>