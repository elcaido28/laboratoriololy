<?php
include('../config/config.php');
$usu= $_GET['user'];
$clave= $_GET['password'];
    $sql = "SELECT * FROM paciente where estado='1' and paciente_usuario='$usu' and paciente_clave='$clave' ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $response= array();
        while ($row = mysqli_fetch_array($result)) {
            // temp user array
            $listado = array($row);
            // push single product into final response array
            //array_push($response, $listado);
        }
        $response["usuario"]=$listado;
        // success
        // echoing JSON response
        echo json_encode($response, JSON_UNESCAPED_UNICODE);

    } else {
        $response["message"] = "Usuario o Contraseña estan equivocados";
        // echo no users JSON
        echo json_encode($response);
    }

?>