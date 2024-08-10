<?php
	session_start();
	include ("../config/config.php");
	$fecha=date('Y-m-d');
	// date_default_timezone_set('America/Guayaquil');
	// $fecha_actual=date("Y-m-d H:i:s");

	$_SESSION['confirmar']=1;

	$tiponuevo = "6";

	$idcabecera = $_GET['idc'];   //id de la cabecera
	$idpac = $_GET['idp'];   //id del paciente


	$tiposeccion = $_POST['tiposeccion'];
	$nume = count($tiposeccion);

	$secciones = implode('*', $tiposeccion);
	$parteseccion = explode('*', $secciones);
	$seccion1 = $parteseccion['0'];
	$seccion2 = $parteseccion['1'];
	$seccion3 = $parteseccion['2'];

	$privacidad = $_POST['privacidad'];

	// GUARDADO DE CABECERA
	$consulta=mysqli_query($con,"INSERT INTO cabecera_resultado (cabecera_resultado_fechai, cabecera_resultado_fecham, cabecera_tipo_formato, privacidad, cabecera_exa_id) VALUES ('$fecha', '$fecha', '$tiponuevo', '$privacidad', '$idcabecera')") or die ("error".mysqli_error());

	// OBTENEMOS EL ID DE LA CABECERA GUARDADA
	$obtener = mysqli_query($con,"SELECT * FROM cabecera_resultado ORDER BY cabecera_resultado_id DESC") or die ("erro".mysqli_error());

	if($obtener){
		$row=mysqli_fetch_array($obtener);
		$idcab = $row['cabecera_resultado_id'];
		$idcabexa = $row['cabecera_exa_id'];
	}else{
		
	}

	// PROCESO PARA CAMBIAR EL ESTADO DEL EXAMEN
	$consultar = mysqli_query($con,"SELECT * FROM cabecera_examen WHERE cabecera_exa_id='$idcabecera'") or die ("erro".mysqli_error());
	$recupera = mysqli_fetch_array($consultar);
	$tipon = $recupera['tipo_examen'];
	$forexamen = explode('*', $tipon);
	
	$dt2=0;

	for ($k=0; $k < count($forexamen); $k++) {
		$consultar2 = mysqli_query($con,"SELECT * FROM cabecera_resultado CR INNER JOIN tipo_formato TF ON CR.cabecera_tipo_formato=TF.formato_id WHERE CR.cabecera_exa_id='$idcabecera'") or die ("erro".mysqli_error());
		while ( $row2=mysqli_fetch_array($consultar2)) {
			if ($forexamen[$k] == utf8_decode($row2['formato_nombre'])) {
				$dt2=$dt2+1;
			}		
		}
	}

	if ($dt2==count($forexamen)) {
		$actualizar = mysqli_query($con, "UPDATE cabecera_examen SET estado_exa_id='1' WHERE cabecera_exa_id='$idcabexa'");
	}
	// FIN PROCESO PARA CAMBIAR EL ESTADO DEL EXAMEN


	for ($i=0; $i<$nume; $i++){
		$nombreseccion = $tiposeccion[$i];
	}

	$arreglotipe = $_POST['resultado'];	//tipo de examenes
	$num = count($arreglotipe);		//contamos cuantos datos se han seleccionado para el for

	// $arreglochk2 = $_POST['opcion'];
	// $num2 = count($arreglochk2);
	$opcion11 = implode('*', $_POST['opcion']);
	$ver = explode('*', $opcion11);

	$cont_dat=0;
	$opciones="";

	for($n=0; $n<$num; $n++){
		
		$tipo_examen = 	$arreglotipe[$n]; //obtenemos el value de cada tipo de resultado

		if($n<7){ // SECCION 1
			if ($arreglotipe[$n]=="Null") {
				$opcion = '';
				$cadena = "INSERT INTO detalle_resultado SET detalle_resultado_seccion='$seccion1', detalle_resultado_tipoexa='$tipo_examen', detalle_resultado_resul='$opcion', cabecera_resultado_id='$idcab'";
				mysqli_query($con,$cadena);
				$cont_dat+=3;
			}else{
				for ($i=0+$cont_dat; $i < 3+$cont_dat; $i++) {
					$opciones .= $ver[$i];
					if ($i<2+$cont_dat) {
						$opciones .= "*";
					}
				}
				$cont_dat+=3;

				$cadena = "INSERT INTO detalle_resultado SET detalle_resultado_seccion='$seccion1', detalle_resultado_tipoexa='$tipo_examen', detalle_resultado_resul='$opciones', cabecera_resultado_id='$idcab'";	
				$opciones="";
				mysqli_query($con,$cadena);
			}
		}

		if($n>6 && $n<19){ // SECCION 2
			if ($arreglotipe[$n]=="Null") {
				$opcion = '';
				$cadena = "INSERT INTO detalle_resultado SET detalle_resultado_seccion='$seccion2', detalle_resultado_tipoexa='$tipo_examen', detalle_resultado_resul='$opcion', cabecera_resultado_id='$idcab'";
				$cont_dat+=3;
				mysqli_query($con,$cadena);
			}else{
				for ($i=0+$cont_dat; $i < 3+$cont_dat; $i++) {
					$opciones .= $ver[$i];
					if ($i<2+$cont_dat) {
						$opciones .= "*";
					}
				}
				$cont_dat+=3;

				$cadena = "INSERT INTO detalle_resultado SET detalle_resultado_seccion='$seccion2', detalle_resultado_tipoexa='$tipo_examen', detalle_resultado_resul='$opciones', cabecera_resultado_id='$idcab'";	
				$opciones="";
				mysqli_query($con,$cadena);
			}
		}

		if($n>18 && $n<25){ // SECCION 3
			if ($arreglotipe[$n]=="Null") {
				$opcion = '';
				$cadena = "INSERT INTO detalle_resultado SET detalle_resultado_seccion='$seccion3', detalle_resultado_tipoexa='$tipo_examen', detalle_resultado_resul='$opcion', cabecera_resultado_id='$idcab'";
				$cont_dat+=2;
				mysqli_query($con,$cadena);
			}else{
				for ($i=0+$cont_dat; $i < 2+$cont_dat; $i++) {
					$opciones .= $ver[$i];
					if ($i<1+$cont_dat) {
						$opciones .= "*";
					}
				}
				$cont_dat+=2;

				$cadena = "INSERT INTO detalle_resultado SET detalle_resultado_seccion='$seccion3', detalle_resultado_tipoexa='$tipo_examen', detalle_resultado_resul='$opciones', cabecera_resultado_id='$idcab'";	
				$opciones="";
				mysqli_query($con,$cadena);
			}
		}

	}//END FOR

// SECCION 1 BIOMETRIA
	if (isset($_POST['opcion2'])) {

		$arreglotipe2 = $_POST['opcion2'];
		$num2 = count($arreglotipe2);
		$conta2 = 0;
		$contenido2 = '';
		for ($d=0; $d < $num2; $d++) {
			$conta2++;
			if ($conta2<5) {
				$contenido2.="*".$arreglotipe2[$d];
				
				if ($conta2==4) {
					//insert
					$ver2 = explode('*', $contenido2);
					$nresultado = $ver2[1];
					$nopcion = $ver2[2]."*".$ver2[3]."*".$ver2[4];
					$cadena = "INSERT INTO detalle_resultado SET detalle_resultado_seccion='$seccion1', detalle_resultado_tipoexa='$nresultado', detalle_resultado_resul='$nopcion', cabecera_resultado_id='$idcab'";
					mysqli_query($con,$cadena);
					$conta2=0;
					$contenido2 = '';
				}
			}
		}
	}


// SECCION 2 CELULAS ATIPICAS
	if (isset($_POST['opcion3'])) {

		$arreglotipe3 = $_POST['opcion3'];
		$num3 = count($arreglotipe3);
		$conta3 = 0;
		$contenido3 = '';
		for ($d=0; $d < $num3; $d++) {
			$conta3++;
			if ($conta3<5) {
				$contenido3.="*".$arreglotipe3[$d];
				
				if ($conta3==4) {
					//insert
					$ver3 = explode('*', $contenido3);
					$nresultado3 = $ver3[1];
					$nopcion3 = $ver3[2]."*".$ver3[3]."*".$ver3[4];
					// $nresultado3 = $ver3[1];
					// $nopcion3 = $ver3[2];
					$cadena = "INSERT INTO detalle_resultado SET detalle_resultado_seccion='$seccion2', detalle_resultado_tipoexa='$nresultado3', detalle_resultado_resul='$nopcion3', cabecera_resultado_id='$idcab'";
					mysqli_query($con,$cadena);
					$conta3=0;
					$contenido3 = '';
				}
			}
		}
	}


// SECCION 3 EXUDADO SANGUINEO:
	if (isset($_POST['opcion4'])) {

		$arreglotipe4 = $_POST['opcion4'];		
		$num4 = count($arreglotipe4);
		$conta4 = 0;
		$contenido4 = '';
		for ($d=0; $d < $num4; $d++) {
			$conta4++;
			if ($conta4<4) {
				$contenido4.="*".$arreglotipe4[$d];
				
				if ($conta4==3) {
					//insert
					$ver4 = explode('*', $contenido4);
					$nresultado4 = $ver4[1];
					$nopcion4 = $ver4[2]."*".$ver4[3];
					// $nresultado4 = $ver4[1];
					// $nopcion4 = $ver4[2];
					$cadena = "INSERT INTO detalle_resultado SET detalle_resultado_seccion='$seccion3', detalle_resultado_tipoexa='$nresultado4', detalle_resultado_resul='$nopcion4',  cabecera_resultado_id='$idcab'";
					mysqli_query($con,$cadena);
					$conta4 = 0;
					$contenido4 = '';
				}
			}
		}
	}

	mysqli_close($con);
	header("Location:../lista_examenes.php?idc=$idcabecera&idp=$idpac");
	// header("Location:../ingreso_resultado_sangre.php?idc=$idcabecera&idp=$idpac");
	
	
?>