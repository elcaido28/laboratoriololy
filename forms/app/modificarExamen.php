<?php
	session_start();
	include ("../config/config.php");
	// $fecha=date('Y-m-d');
	date_default_timezone_set('America/Guayaquil');
	$fecha_actual=date("Y-m-d H:i:s");

	$_SESSION['confirmar']=1;

	$idcab = $_GET['id'];
	$idpac = $_GET['idp'];
	// $tipoexa = $_POST['tpexamen'];
	$precio = $_POST['precio'];
	$doctorex = $_POST['doctorex'];
	$estadoexa = 2;

	$tpago = $_POST['tpago'];
	if(isset($_POST['abono'])){
		$abono = $_POST['abono'];
	}else{
		$abono = 0;
	}

	if (isset($_POST['states'])) {
    	$for_examen=$_POST['states'];
    	foreach($for_examen as $valor){
  		}
  		$seccion = implode('*', $for_examen);
  	}

	// EDITAMOS LOS DATOS EN LA CABECERA
	$consulta=mysqli_query($con,"UPDATE cabecera_examen SET fecha_modificacion_exa='$fecha_actual', tipo_examen='$seccion', precio_examen='$precio', doctor_externo='$doctorex', tipo_pago='$tpago', abono='$abono' WHERE cabecera_exa_id='$idcab'") or die ("error".mysqli_error());

	//SELECCION DEL NOMBRE DEL EXAMEN PARA COMPARARLO Y MODIFICARLO O EDITARLO
	$consulta2=mysqli_query($con,"SELECT detalle_examen_dscrp FROM detalle_examen WHERE cabecera_exa_id='$idcab'");
    $examenes= array();
    while ($c = mysqli_fetch_assoc($consulta2)) {
        //var_dump($c);
        $examenes[] = $c['detalle_examen_dscrp'];
        $idetalle[] = $c['detalle_examen_id'];
    }

	// EDITAMOS LOS DATOS DE CADA EXAMEN EN EL DETALLE EXAMEN
	$arreglochk = $_POST['Name'];	//Obtenemos cada uno de los check seleccionados y los guardamos en un array
	$num = count($arreglochk);		//contamos cuantos datos se han seleccionado para luego utilizarlo en el for

	for($n=0; $n<$num; $n++){
		$detalle = 	$arreglochk[$n]; //obtenemos el value de cada check seleccionado
		if (in_array($detalle, $examenes)) {
			$consulta2=mysqli_query($con,"UPDATE detalle_examen SET detalle_examen_dscrp='$detalle' WHERE cabecera_exa_id='$idcab' AND detalle_examen_id='$idetalle'") or die ("error".mysqli_error());
		}else{
		$consulta2=mysqli_query($con,"INSERT INTO detalle_examen (detalle_examen_dscrp, cabecera_exa_id) VALUES ('$detalle', '$idcab')") or die ("error".mysqli_error());
		}
	}

	mysqli_close($con);
	// header("Location:../editar_examen.php?idc=$idcab&idp=$idpac");
	header("Location:../listar_examenes.php?id=$idpac");

?>