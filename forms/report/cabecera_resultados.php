<?php


require '../FPDF/fpdf.php';

class PDF extends FPDF
{

  function Header()
  {
    $this->Image('img/labo.jpg',35,17,20);
    //$this->Image('img/micro.jpg',170,10,20);
    $this->SetFont('Arial','I',18);
    $this->SetXY(50,10);
    $this->SetTextColor(41,96,171);
    $this->Cell(102,6,'LABORATORIO CLINICO',0,1,'C');
    $y=$this->GetY();
    $this->SetFont('Arial','I',18);
    $this->SetXY(50,$y);
    $this->Cell(102,7,'"LOLY"',0,1,'C');
    $this->SetFont('Arial','I',8);
    $this->SetX(50);
    $this->Cell(102,4,'Q.F. Loly Erazo de Nieto Mg',0,1,'C');
    $this->SetFont('Arial','I',8);
    $this->SetX(50);
    $this->Cell(102,4,utf8_decode('Bioquímica - Clínica'),0,1,'C');
    $this->SetFont('Arial','I',8);
    $this->SetX(50);
    $this->Cell(102,4,utf8_decode('Clínica Santa Rita'),0,1,'C');
    $this->SetFont('Arial','I',8);
    $this->SetX(50);
    $this->Cell(102,4,utf8_decode('Dirección: Km 11 1/2 Vía a Daule (PECA)'),0,1,'C');
    $this->SetFont('Arial','I',8);
    $this->SetX(50);
    $this->Cell(102,4,utf8_decode('Mail: laboratoriololy@gmail.com'),0,1,'C');
    $this->SetFont('Arial','I',8);
    $this->SetX(40);
    $this->Cell(120,4,utf8_decode('Teléfonos: 2586213 - 085918925 -        R.U.C. 0907564892'),0,1,'C');


    $this->Image('img/marca2.png',20,105,140);

  }
  function Footer(){
    $this->SetY(-15);
    $this->SetFont('arial','I',8);
    $this->Cell(0,10,'pagina'.$this->PageNo().'/{nb}',0,0,'C');
  }

}

 ?>
