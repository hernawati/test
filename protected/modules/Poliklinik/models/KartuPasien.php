<?php
class KartuPasien extends FPDF
{
// Page header
	function Header()
	{
		// Logo
		$this->Image('D:\xampp\htdocs\SIRS_module\images\logo.gif',12,5,30);
		// Arial bold 15
		$this->SetFont('Arial','B',20);
		// Move to the right
		$this->Cell(65);
		// Title
		$this->Cell(0,10,'Rumah Sakit HKBP','C');
		// Line break
		$this->Ln(7);
		$this->Cell(60);
		$this->SetFont('Arial','',8);
		$this->Cell(30,10,'Jalan Gereja No. 17 Telp. (0632) 21043, Fax. (0632) 21891','C');

		$this->Ln(5);
		$this->Cell(80);
		$this->SetFont('Arial','',8);
		$this->Cell(30,10,'BALIGE - TOBA SAMOSIR','C');
		
		$this->Ln(5);
		$this->Cell(78);
		$this->SetFont('Arial','',8);
		$this->Cell(30,10,'P.O BOX 14 - Kode Pos 22314','C');

		$this->Ln(12);
	}
}
?>