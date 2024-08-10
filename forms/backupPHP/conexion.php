<?php

	$bd_host = "localhost";
	$bd_usuario = "root";
	$bd_password = "";
	$bd_base = "loly";
	$con = mysqli_connect($bd_host, $bd_usuario, $bd_password,$bd_base);

	if ($con){
		//echo "estas conectado :)";
	}else{
		echo "no se encontro la base de datos";
	}

?>
