<?php
include('TD_reportes.php');
include('../config/config.php');
if (isset($_POST['inicio']) || isset($_POST['fin'])) {
  if ($_POST['inicio']!="" && $_POST['fin']!="") {
    $inicio=$_POST['inicio'];
    $fin=$_POST['fin'];
    $query=" and E.fecha_ingreso Between '$inicio' and '$fin' ";
    $fechas="Fecha desdes ".$inicio." hasta ".$fin;
  }else {
    $query="";
    $fechas="";
  }
}else {
  $query="";
  $fechas="";
}


$consulta=mysqli_query($con,"SELECT * FROM empleado E INNER JOIN rol R ON R.id_rol=E.id_rol INNER JOIN estado ES ON ES.id_estado=E.id_estado WHERE id_empleado!='1' ".$query." ");

//$consulta=mysqli_query($con,"SELECT * from tareas T INNER JOIN empleados E on T.id_empleado=E.id_empleado INNER JOIN actividades A on A.id_actividad=T.id_actividad INNER JOIN parcelas P on P.id_parcela=T.id_parcela where T.fecha BETWEEN '$desde' and '$hasta' ORDER BY T.fecha ASC");

$pdf=new PDF('P','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->SetXY(20,17);
$pdf->Cell(170,10,'REPORTE DE EMPLEADOS',0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)
$pdf->SetFont('arial','',10);
$pdf->Cell(100,10,$fechas ,0,1,'C');

$y=$pdf->GetY();
$pdf->SetY($y+10);
$pdf->SetFont('arial','B',8);
$pdf->SetFillColor(55, 144, 191);
 $pdf->SetTextColor(255, 255, 255);
 $pdf->Cell(22,10,utf8_decode('Fecha'),1,0,'C',true);
$pdf->Cell(60,10,utf8_decode('Nombre Paciente'),1,0,'C',true);
$pdf->Cell(25,10,utf8_decode('Cedula'),1,0,'C',true);
$pdf->Cell(25,10,utf8_decode('Telefono'),1,0,'C',true);
$pdf->Cell(33,10,utf8_decode('Cargo'),1,0,'C',true);
$pdf->Cell(25,10,utf8_decode('Estado'),1,1,'C',true);

$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);
while($row5=mysqli_fetch_array($consulta)){

$pdf->Cell(22,10,utf8_decode($row5['fecha_ingreso']),1,0,'C');
$pdf->Cell(60,10,utf8_decode($row5['nombres']." ".$row5['apellidos']),1,0,'C');
$pdf->Cell(25,10,utf8_decode($row5['cedula']),1,0,'C');
$pdf->Cell(25,10,utf8_decode($row5['telefono']),1,0,'C');
$pdf->Cell(33,10,utf8_decode($row5['nombre_rol']),1,0,'C');
$pdf->Cell(25,10,utf8_decode($row5['nombre_estado']),1,1,'C');
}
/*
$pdf->SetFont('arial','B',15);
$pdf->SetXY(10,70);
$pdf->MultiCell(60,5,'hola mundo como estan todo aqui',1,'C',0);
$pdf->MultiCell(100,5,'hola mundo como estan todo aqui',1,'C',0);
*/
$pdf->Output();
 ?>
