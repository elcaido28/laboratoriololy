<?php


require '../FPDF/fpdf.php';

class PDF extends FPDF
{

  function Header()
  {
    $this->Image('img/labo.jpg',20,10,20);
    $this->Image('img/micro.jpg',170,10,20); 
    $this->SetFont('Arial','I',18);
    $this->SetXY(40,10);
    $this->SetTextColor(41,96,171);
    $this->Cell(102,10,'LABORATORIO CLINICO',0,1,'R');
    $this->SetFont('Arial','I',18);
    $this->SetXY(38,20);
    $this->MultiCell(75,15,'"LOLY"',0,'R',0);
    $this->SetFont('Arial','I',12);
    $this->SetXY(38,20);
    $this->MultiCell(93,30,'Q.F. Loly Erazo de Nieto Mg',0,'R',0);
    $this->SetFont('Arial','I',12);
    $this->SetXY(38,20);
    $this->MultiCell(85,40,utf8_decode('Bioquímica - Clínica'),0,'R',0);
    $this->SetFont('Arial','I',12);
    $this->SetXY(38,20);
    $this->MultiCell(83,50,utf8_decode('Clínica Santa Rita'),0,'R',0);
    $this->SetFont('Arial','I',12);
    $this->SetXY(38,20);
    $this->MultiCell(105,65,utf8_decode('Dirección: Km 11 1/2 Vía a Daule (PECA)'),0,'R',0);
    $this->SetFont('Arial','I',12);
    $this->SetXY(38,20);
    $this->MultiCell(97,75,utf8_decode('Mail: laboratoriololy@gmail.com'),0,'R',0);
    $this->SetFont('Arial','I',12);
    $this->SetXY(38,20);
    $this->MultiCell(70,85,utf8_decode('Teléfonos: 2586213 - 085918925'),0,'R',0);
    $this->SetFont('Arial','I',12);
    $this->SetXY(38,20);
    $this->MultiCell(120,85,utf8_decode('R.U.C. 0907564892'),0,'R',0);

    $this->Image('img/marca2.png',20,105,140);
    // $this->SetFont('Arial','I',12);
    // $this->SetXY(38,20);
    // $this->Cell(108,65,'Telefono:(04)3097212 * Guayaquil-Ecuador',0,0,'R');
   //  include('conexion.php');
   //  $result= mysqli_query($con,"SELECT * from informacion");
   //  $row= mysqli_fetch_assoc($result);
   //$this->image("../images/labo.png",15,10,35);
   // $this->SetFont('arial','B',10);
   // $this->SetXY(140,6);
   // $this->Cell(50,10,'Fecha: Guayaquil, '.date('d-m-Y').'',0,1,'C');
   // $this->SetFont('arial','B',14);
   // $this->SetXY(80,10);
   // $this->Cell(50,10,'LABORATORIO LOLY',0,1,'C');
  }
  function Footer(){
    $this->SetY(-15);
    $this->SetFont('arial','I',8);
    $this->Cell(0,10,'pagina'.$this->PageNo().'/{nb}',0,0,'C');
  }

}

 ?>
