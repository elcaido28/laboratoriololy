<?php
include('cabecera_resultados.php');
include('../config/config.php');


$idcabecera=$_REQUEST['idc'];
$idpaciente=$_REQUEST['idp'];

$consulta=mysqli_query($con,"SELECT * FROM cabecera_resultado CR INNER JOIN detalle_resultado DR ON CR.cabecera_resultado_id=DR.cabecera_resultado_id INNER JOIN cabecera_examen CE ON CR.cabecera_exa_id=CE.cabecera_exa_id INNER JOIN paciente P ON CE.id_paciente=P.id_paciente WHERE CR.cabecera_exa_id='$idcabecera' AND CR.cabecera_tipo_formato='2' ");

//$filas=mysqli_num_rows($consulta);
$row=mysqli_fetch_array($consulta);

//$consulta=mysqli_query($con,"SELECT * from tareas T INNER JOIN empleados E on T.id_empleado=E.id_empleado INNER JOIN actividades A on A.id_actividad=T.id_actividad INNER JOIN parcelas P on P.id_parcela=T.id_parcela where T.fecha BETWEEN '$desde' and '$hasta' ORDER BY T.fecha ASC");

$pdf=new PDF('P','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();

$y=$pdf->GetY();
$pdf->SetTextColor(17, 75, 147);
$pdf->SetFont('arial','B',12);
$pdf->SetXY(30,$y);
$pdf->Cell(25,10,'FECHA: ',0,0,'L');#(ancho,alto,texto,borde,salto linea,alineacion L C R)

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('arial','',12);
$pdf->Cell(100,10,date("d/m/Y", strtotime($row['cabecera_resultado_fechai'])),0,1,'L');
$pdf->SetTextColor(17, 75, 147);

$pdf->SetFont('arial','B',12);
$pdf->SetX(30);
$pdf->Cell(25,4,'NOMBRE:  ',0,0,'C');
$pdf->SetFont('arial','',12);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(100,4,utf8_decode(strtoupper($row['nombres']." ".$row['apellidos'])),0,1,'L');
$y=$pdf->GetY();
$pdf->SetTextColor(17, 75, 147);
$pdf->Line(28,8,180,8);//arriba
$pdf->Line(180,8,180,$y+1);//derecha
$pdf->Line(28,$y+1,180,$y+1);//abajo
$pdf->Line(28,8,28,$y+1);//izquierda
$pdf->Line(28,$y-13,180,$y-13);//en medio


$pdf->SetFont('arial','B',12);
$y=$pdf->GetY();
$pdf->SetXY(50,$y+6);
$pdf->Cell(100,10,'EXAMEN FISICO-QUIMICO DE ORINA',0,1,'C');
$pdf->SetX(50);

$consulta2=mysqli_query($con,"SELECT * FROM cabecera_resultado CR INNER JOIN detalle_resultado DR ON CR.cabecera_resultado_id=DR.cabecera_resultado_id INNER JOIN cabecera_examen CE ON CR.cabecera_exa_id=CE.cabecera_exa_id WHERE CR.cabecera_exa_id='$idcabecera' AND CR.cabecera_tipo_formato='2' and detalle_resultado_seccion='Fisico-Quimico'");
$nrow5=0;
while($row5=mysqli_fetch_array($consulta2)){
  $pdf->SetFont('arial','',12);
  $y=$pdf->GetY();
  $pdf->SetXY(20,$y);

  $pdf->Cell(70,6,utf8_decode($row5['detalle_resultado_tipoexa'].":"),0,0,'L');
  
  $datos = explode('*',$row5['detalle_resultado_resul']);
  $cuenta = count($datos);
  if ($cuenta>1) {
    $pdf->Cell(50,6,utf8_decode($datos[0]." ".$datos[1]." ".$datos[2]),0,1,'L');
  }else{
    $pdf->Cell(50,6,utf8_decode($row5['detalle_resultado_resul']),0,1,'L');
  }
}

// while($row5=mysqli_fetch_array($consulta2)){
// $y=$pdf->GetY();

//   if ($nrow5<1) {
//     $pdf->SetXY(90,$y);
//     $pdf->Cell(70,10,utf8_decode(strtoupper($row5['detalle_resultado_tipoexa'])),0,0,'L');
//   }else{
//     $pdf->SetXY(55,$y);
//     $pdf->SetFont('arial','B',12);
//     $pdf->Cell(70,10,utf8_decode(strtoupper($row5['detalle_resultado_tipoexa'].":")),0,0,'L');
//   }
  
//   $datos = explode('*',$row['detalle_resultado_resul']);
//   $cuenta = count($datos);
//   if ($cuenta>1) {
//     $pdf->SetFont('arial','',12);
//     $pdf->Cell(50,10,utf8_decode(strtoupper($datos[0]." ".$datos[1]." ".$datos[2])),0,1,'L');
//   }else{
//     $pdf->SetFont('arial','',12);
//     $pdf->Cell(50,10,utf8_decode(strtoupper($row5['detalle_resultado_resul'])),0,1,'L');
//   }
//   $nrow5++;
// }
$y=$pdf->GetY();

$pdf->SetXY(20,$y);
$pdf->SetFont('arial','BU',12);
$pdf->SetTextColor(17, 75, 147);
$pdf->Cell(50,10,'SEDIMENTO',0,1,'C');

$consulta3=mysqli_query($con,"SELECT * FROM cabecera_resultado CR INNER JOIN detalle_resultado DR ON CR.cabecera_resultado_id=DR.cabecera_resultado_id INNER JOIN cabecera_examen CE ON CR.cabecera_exa_id=CE.cabecera_exa_id INNER JOIN paciente P ON CE.id_paciente=P.id_paciente WHERE CR.cabecera_exa_id='$idcabecera' AND CR.cabecera_tipo_formato='2' and DR.detalle_resultado_seccion='Sedimento' ");
$pdf->SetFont('arial','',12);
while($row5=mysqli_fetch_array($consulta3)){
$y=$pdf->GetY();
 $pdf->SetXY(20,$y);

  $pdf->Cell(70,6,utf8_decode($row5['detalle_resultado_tipoexa'].":"),0,0,'L');
  
  $datos = explode('*',$row['detalle_resultado_resul']);
  $cuenta = count($datos);
  if ($cuenta>1) {
    $pdf->Cell(50,6,utf8_decode($datos[0]." ".$datos[1]." ".$datos[2]),0,1,'L');
  }else{
    $pdf->Cell(50,6,utf8_decode($row5['detalle_resultado_resul']),0,1,'L');
  }
}

$y=$pdf->GetY();
$pdf->Line(80,$y+30,120,$y+30);

// $y=$pdf->GetY();
// $pdf->SetY($y+10);
// $pdf->SetFont('arial','B',8);
// $pdf->SetFillColor(55, 144, 191);
//  $pdf->SetTextColor(255, 255, 255);
//  $pdf->Cell(22,10,utf8_decode('Fecha'),1,0,'C',true);
// $pdf->Cell(60,10,utf8_decode('Nombre Paciente'),1,0,'C',true);
// $pdf->Cell(25,10,utf8_decode('Cedula'),1,0,'C',true);
// $pdf->Cell(25,10,utf8_decode('Telefono'),1,0,'C',true);
// $pdf->Cell(33,10,utf8_decode('Cargo'),1,0,'C',true);
// $pdf->Cell(25,10,utf8_decode('Estado'),1,1,'C',true);

// $pdf->SetFont('arial','B',8);
//  $pdf->SetTextColor(0, 0, 0);
// while($row5=mysqli_fetch_array($consulta)){

// $pdf->Cell(22,10,utf8_decode($row5['fecha_ingreso']),1,0,'C');
// $pdf->Cell(60,10,utf8_decode($row5['nombres']." ".$row5['apellidos']),1,0,'C');
// $pdf->Cell(25,10,utf8_decode($row5['cedula']),1,0,'C');
// $pdf->Cell(25,10,utf8_decode($row5['telefono']),1,0,'C');
// $pdf->Cell(33,10,utf8_decode($row5['nombre_rol']),1,0,'C');
// $pdf->Cell(25,10,utf8_decode($row5['nombre_estado']),1,1,'C');
// }
/*
$pdf->SetFont('arial','B',15);
$pdf->SetXY(10,70);
$pdf->MultiCell(60,5,'hola mundo como estan todo aqui',1,'C',0);
$pdf->MultiCell(100,5,'hola mundo como estan todo aqui',1,'C',0);
*/
$pdf->Output();
 ?>
