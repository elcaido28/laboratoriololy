<?php
session_start();
include('config/config.php');

$idpac=$_REQUEST['idp'];
$idcabeceraexamen=$_REQUEST['idc'];
$tipexa=$_REQUEST['tipex'];

$tipoexamen=$tipexa;

	if ($tipoexamen=="3") {
		header("Location: ingreso_resultado_sangre.php?idc=$idcabeceraexamen&idp=$idpac");
	}
	if ($tipoexamen=="1") {
		header("Location: ingreso_resultado_orina.php?idc=$idcabeceraexamen&idp=$idpac");
	}
	if ($tipoexamen=="2") {
		header("Location: ingreso_resultado_fisico_quimico.php?idc=$idcabeceraexamen&idp=$idpac");
	}
	if ($tipoexamen=="4") {
		header("Location: ingreso_resultado_embarazo.php?idc=$idcabeceraexamen&idp=$idpac");
	}
	if ($tipoexamen=="5") {
		header("Location: ingreso_resultado_secrecion.php?idc=$idcabeceraexamen&idp=$idpac");
	}
	if ($tipoexamen=="6") {
		header("Location: ingreso_resultado_biometria.php?idc=$idcabeceraexamen&idp=$idpac");
	}


?>