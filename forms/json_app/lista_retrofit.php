<?php
include('../config/config.php');
$sql = "SELECT * FROM prueba ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $response= array();
        while ($row = mysqli_fetch_array($result)) {
        $listado["userId"] = $row["userId"];
        $listado["id"] = $row["id"];
        $listado["title"] = $row["title"];
        $listado["body"] = $row["body"];
        // push single product into final response array
        array_push($response, $listado);
        }
    echo json_encode($response);
    }
?>