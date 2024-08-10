<?php
// CLAVE ALEATORIA
	$charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
	$cad = "";
	for($p=0;$p<10;$p++){
		$cad .= substr($charset, rand(0, 62), 1);
	}
	echo $cad;
	// FIN CLAVE ALEATORIA
?>
