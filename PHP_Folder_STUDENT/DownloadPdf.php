<?php

session_start();

$Nom=$_SESSION['NOM'];
$Prenom=$_SESSION['PRENOM'];
            
define('FPDF_FONTPATH','font/');              
require('fpdf184/fpdf.php');

class PDF extends FPDF {

	// Page header
	function Header() {
		
		// Add logo to page
		$this->Image('fpdf184/ensa.png',10,8,33);
		
		// Set font family to Arial bold
		$this->SetFont('Arial','B',20);
		
		// Move to the right
		$this->Cell(80);
		
		// Header
		$this->Cell(50,10,'Recu',1,0,'C');
		
		// Line break
		$this->Ln(20);
	}

	// Page footer
	function Footer() {
		
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		
		// Page number
		$this->Cell(0,10,'Page ' .
			$this->PageNo() . '/{nb}',0,0,'C');
	}
}

// Instantiation of FPDF class
$pdf = new PDF();

// Define alias for number of pages
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('times','',14);

$pdf->Multicell(0,10, '

je suis '.$Nom.' '.$Prenom.' 
	je postule pour cette mobilite de ///////////////////////////
////////////////////////////////////////
/////////////////////////////////////////;//////////////////
//////////////////////////////////////////;////////////////
/////////////////////////////.
/////////////////.'
);
$pdf->Output();

     

?>

