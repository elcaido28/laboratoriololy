<?php
include('TD_reportes.php');
  include('../config/config.php');
  if (isset($_POST['inicio']) || isset($_POST['fin'])) {
    if ($_POST['inicio']!="" && $_POST['fin']!="") {
      $inicio=$_POST['inicio'];
      $fin=$_POST['fin'];
      $query=" AND C.fecha_ingreso_exa Between '$inicio' and '$fin' ";
      $fechas="Fecha desdes ".$inicio." hasta ".$fin;
    }else {
      $query="";
      $fechas="";
    }
  }else {
    $query="";
    $fechas="";
  }


$consulta=mysqli_query($con,"SELECT * FROM cabecera_examen C INNER JOIN paciente P ON C.id_paciente=P.id_paciente  where C.estado_exa_id='1' ".$query." ");

//$consulta=mysqli_query($con,"SELECT * from tareas T INNER JOIN empleados E on T.id_empleado=E.id_empleado INNER JOIN actividades A on A.id_actividad=T.id_actividad INNER JOIN parcelas P on P.id_parcela=T.id_parcela where T.fecha BETWEEN '$desde' and '$hasta' ORDER BY T.fecha ASC");

$pdf=new PDF('P','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->SetXY(20,17);
$pdf->Cell(170,10,'REPORTE DE GANANCIAS',0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)

$y=$pdf->GetY();
$pdf->SetY($y+15);
$pdf->SetFont('arial','B',8);
$pdf->SetFillColor(55, 144, 191);
 $pdf->SetTextColor(255, 255, 255);
 $pdf->Cell(30,10,utf8_decode('Fecha'),1,0,'C',true);
$pdf->Cell(50,10,utf8_decode('Nombre Paciente'),1,0,'C',true);
$pdf->Cell(20,10,utf8_decode('Cedula'),1,0,'C',true);
$pdf->Cell(75,10,utf8_decode('Tipo de examen'),1,0,'C',true);
$pdf->Cell(20,10,utf8_decode('Precio'),1,1,'C',true);
echo
$pdf->SetFont('arial','',6);
 $pdf->SetTextColor(0, 0, 0);
$j=0;
while($row5=mysqli_fetch_array($consulta)){
  $dt=0;
$tipo=$row5['tipo_examen'];
$y2=$pdf->GetY();

$pdf->Cell(30,10,utf8_decode($row5['fecha_ingreso_exa']),1,0,'C');
$pdf->Cell(50,10,utf8_decode($row5['nombres']." ".$row5['apellidos']),1,0,'C');
$pdf->Cell(20,10,utf8_decode($row5['identificacion']),1,0,'C');
$pdf->SetFont('arial','',5);
$y=$pdf->GetY();
$pdf->SetXY(110,$y);

$pdf->MultiCell(75,5,utf8_decode(str_replace('*', ', ', $row5['tipo_examen']) ),'RTL','C',0);
$pdf->SetFont('arial','',6);
$j+=$row5['precio_examen'];
$pdf->SetXY(185,$y);
$pdf->Cell(20,10,utf8_decode("$ ".$row5['precio_examen']),1,1,'C');
}
$pdf->Cell(175,10,utf8_decode('GANANCIA TOTAL DE EXAMENES'),1,0,'C');
$pdf->Cell(20,10,utf8_decode("$ ".$j),1,1,'C');
/*
$pdf->SetFont('arial','B',15);
$pdf->SetXY(10,70);
$pdf->MultiCell(60,5,'hola mundo como estan todo aqui',1,'C',0);
$pdf->MultiCell(100,5,'hola mundo como estan todo aqui',1,'C',0);
*/
$pdf->Output();
 ?>
