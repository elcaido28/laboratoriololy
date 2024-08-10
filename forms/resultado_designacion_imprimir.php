<?php
session_start();
include('config/config.php');

$idpac=$_REQUEST['idp'];
$idcabeceraexamen=$_REQUEST['idc'];
$tipoexamen=$_REQUEST['tipex'];

if ($tipoexamen=="3") {
	header("Location: report/resultado_sangre_imprimir.php?idc=$idcabeceraexamen&idp=$idpac");
}
if ($tipoexamen=="1") {
	header("Location: report/resultado_orina_imprimir.php?idc=$idcabeceraexamen&idp=$idpac");
}
if ($tipoexamen=="2") {
	header("Location: report/resultado_fisico_quimico_imprimir.php?idc=$idcabeceraexamen&idp=$idpac");
}
if ($tipoexamen=="4") {
	header("Location: report/resultado_embarazo_imprimir.php?idc=$idcabeceraexamen&idp=$idpac");
}
if ($tipoexamen=="5") {
	header("Location: report/resultado_secrecion_imprimir.php?idc=$idcabeceraexamen&idp=$idpac");
}
if ($tipoexamen=="6") {
	header("Location: report/resultado_biometriaHematica_imprimir.php?idc=$idcabeceraexamen&idp=$idpac");
}
?>