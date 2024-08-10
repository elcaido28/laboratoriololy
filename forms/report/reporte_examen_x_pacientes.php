<?php
include('TD_reportes.php');
include('../config/config.php');
if (isset($_POST['inicio']) || isset($_POST['fin'])) {
  if ($_POST['inicio']!="" && $_POST['fin']!="") {
    $inicio=$_POST['inicio'];
    $fin=$_POST['fin'];
    $query=" WHERE CE.fecha_ingreso_exa Between '$inicio' and '$fin' ";
    $fechas="Fecha desdes ".$inicio." hasta ".$fin;
  }else {
    $query="";
    $fechas="";
  }
}else {
  $query="";
  $fechas="";
}


$consulta=mysqli_query($con,"SELECT DISTINCT P.identificacion,P.nombres,P.apellidos,P.identificacion,P.telefono,P.edad,P.id_paciente,TP.tipo_paciente tpaciente FROM paciente P INNER JOIN tipo_paciente TP ON TP.id_tipopaciente=P.tipo_paciente INNER JOIN cabecera_examen CE ON CE.id_paciente=P.id_paciente  ".$query." ");

//$consulta=mysqli_query($con,"SELECT * from tareas T INNER JOIN empleados E on T.id_empleado=E.id_empleado INNER JOIN actividades A on A.id_actividad=T.id_actividad INNER JOIN parcelas P on P.id_parcela=T.id_parcela where T.fecha BETWEEN '$desde' and '$hasta' ORDER BY T.fecha ASC");

$pdf=new PDF('P','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->SetXY(20,17);
$pdf->Cell(170,10,'REPORTE DE PACIENTES',0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)
$pdf->SetFont('arial','',10);
$pdf->Cell(100,10,$fechas ,0,1,'C');

$y=$pdf->GetY();
$pdf->SetY($y+10);
$pdf->SetFont('arial','B',8);
$pdf->SetFillColor(55, 144, 191);
 $pdf->SetTextColor(255, 255, 255);

$pdf->Cell(60,10,utf8_decode('Nombre Paciente'),1,0,'C',true);
$pdf->Cell(25,10,utf8_decode('Cedula'),1,0,'C',true);
$pdf->Cell(25,10,utf8_decode('Edad'),1,0,'C',true);
$pdf->Cell(25,10,utf8_decode('Telefono'),1,0,'C',true);
 $pdf->Cell(30,10,utf8_decode('Tipo de Paciente'),1,0,'C',true);
$pdf->Cell(25,10,utf8_decode('Nº Examenes'),1,1,'C',true);

$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);

while($row5=mysqli_fetch_array($consulta)){
  $idpaci=$row5['id_paciente'];
  $nexa=0;
  $consulta2=mysqli_query($con,"SELECT * FROM cabecera_examen WHERE id_paciente='$idpaci' ");
  while($row2=mysqli_fetch_array($consulta2)){
    $cadena=$row2['tipo_examen'];
    $array = explode("*", $cadena);
    $nexa+= count($array);
  }

$pdf->Cell(60,10,utf8_decode($row5['nombres']." ".$row5['apellidos']),1,0,'C');
$pdf->Cell(25,10,utf8_decode($row5['identificacion']),1,0,'C');
$pdf->Cell(25,10,utf8_decode($row5['edad']),1,0,'C');
$pdf->Cell(25,10,utf8_decode($row5['telefono']),1,0,'C');
$pdf->Cell(30,10,utf8_decode($row5['tpaciente']),1,0,'C');
$pdf->Cell(25,10,utf8_decode($nexa),1,1,'C');
}
/*
$pdf->SetFont('arial','B',15);
$pdf->SetXY(10,70);
$pdf->MultiCell(60,5,'hola mundo como estan todo aqui',1,'C',0);
$pdf->MultiCell(100,5,'hola mundo como estan todo aqui',1,'C',0);
*/
$pdf->Output();
 ?>
