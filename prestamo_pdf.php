<?php
include("classes/bd.php");
include("classes/prestamos.php");
include("classes/ejemplares.php"); 
require('fpdf/fpdf.php');

class PDF extends FPDF {
   //Cabecera de página
   function Header(){

      $this->Image('img/logo_sgb2.png',60,8,80);
      $this->SetFont('Arial','B',16);
	  $this->SetY('40');
      $this->Cell(0,20,"Registro de Prestamo",0,0,'C');
	}

	//Pie de página
	function Footer() {
		$this->SetY(-10);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,'IUTOMS - SGB',0,0,'C');
	}
}

//if ($_GET[id]) {
	
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Ln();
$fecha = date("d/m/Y") ;
$pdf->Cell(0,10,"Fecha: $fecha",0,1,'R');
if ($_GET[id]) {
	$id = $_GET[id];	
	$prestamo = new Prestamos();
	$prestamo->Buscar($id);
	$row = $prestamo->Fetch_array();
	$ejemplar = new Ejemplares();
	$ejemplar->Buscar3($id);	
}
$pdf->Ln();$pdf->Ln();
$pdf->Cell(40,10,"Miembro",'1','0','L'); $pdf->Cell(70,10,$row[nombre],'1','0','C'); $pdf->Cell(40,10,"Tipo",'1','0','L'); $pdf->Cell(40,10,$row[tipo],'1','1','C');
$pdf->Cell(0,8,"Ejemplares",'1','1','C');
$pdf->Cell(50,8,"Cota",'1','0','C'); $pdf->Cell(90,8,'Titulo','1','0','C'); $pdf->Cell(50,8,"Tipo Prestamo",'1','1','C');
$pdf->SetFont('Arial','',12);
while ($rowe = $ejemplar->Fetch_array()) {
	$pdf->Cell(50,8,$rowe[cota],'1','0','C'); $pdf->Cell(90,8,$rowe[titulo],'1','0','C'); $pdf->Cell(50,8,$rowe[prestamo],'1','1','C');		
}
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,"Creado",'1','0','L'); $pdf->Cell(70,10,$row[creado],'1','0','C'); $pdf->Cell(40,10," Fecha Dev.",'1','0','L'); $pdf->Cell(40,10,$row[fec_dev],'1','1','C');
$pdf->Cell(40,10,"Estado",'1','0','L'); $pdf->Cell(70,10,$row[estado],'1','0','C'); $pdf->Cell(40,10,"Modificado",'1','0','L'); $pdf->Cell(40,10,$row[modificado],'1','1','C');
$pdf->Cell(40,10,"Creado por",'1','0','L'); $pdf->Cell(70,10,$row[creado_por],'1','0','C'); $pdf->Cell(40,10,"Modificado por",'1','0','L'); $pdf->Cell(40,10,$row[modificado_por],'1','1','C');
$pdf->Output();
//}
?> 