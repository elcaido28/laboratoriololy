<?php
	session_start();
	include ("../config/config.php");
	// $fecha=date('Y-m-d');
	date_default_timezone_set('America/Guayaquil');
	$fecha_actual=date("Y-m-d H:i:s");

	$_SESSION['confirmar']=1;

	$idpac = $_GET['id'];
	// $tipoexa = $_POST['tpexamen'];
	$precio = $_POST['precio'];
	$doctorex = $_POST['doctorex'];
	$tpago = $_POST['tpago'];
	$estadoexa = 2;

	if(isset($_POST['abono'])){
		$abono = $_POST['abono'];
	}else{
		$abono = 0;
	}

  	if (isset($_POST['states'])) {
    	$for_examen=$_POST['states'];
    	foreach($for_examen as $valor){
    		// echo $valor."<br>";
  		}
  		$seccion = implode('*', $for_examen);
  	}

	// GUARDADO DE CABECERA
	$consulta=mysqli_query($con,"INSERT INTO cabecera_examen (fecha_ingreso_exa, fecha_modificacion_exa, tipo_examen, precio_examen, doctor_externo, tipo_pago, abono, estado_exa_id, id_paciente) VALUES ('$fecha_actual', '$fecha_actual', '$seccion', '$precio', '$doctorex', '$tpago', '$abono', '$estadoexa', '$idpac')") or die ("error".mysqli_error());

	// OBTENEMOS EL ID DE LA CABECERA GUARDADA
	$obtener = mysqli_query($con,"SELECT * FROM cabecera_examen WHERE id_paciente='$idpac' ORDER BY fecha_ingreso_exa DESC") or die ("erro".mysqli_error());

	if($obtener){
		$row=mysqli_fetch_array($obtener);
		$id_examen_actual=$row['cabecera_exa_id'];
	}else{
		echo "algo salio mal";
	}

	// GUARDAMOS LOS DATOS DE CADA EXAMEN EN EL DETALLE EXAMEN
	$arreglochk = $_POST['Name'];	//Obtenemos cada uno de los check seleccionados yy los guardamos en un array
	$num = count($arreglochk);		//contamos cuantos datos se han seleccionado para luego utilizarlo en el for

	for($n=0; $n<$num; $n++){
		$detalle = 	$arreglochk[$n]; //obtenemos el value de cada check seleccionado
		$consulta2=mysqli_query($con,"INSERT INTO detalle_examen (detalle_examen_dscrp, cabecera_exa_id) VALUES ('$detalle', '$id_examen_actual')") or die ("error".mysqli_error());
	}

	mysqli_close($con);
	// header("Location:../registro_examen.php?id=".$idpac);
	header("Location:../ingreso_examen.php");

?>