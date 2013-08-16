<?php
class LaporanHarian extends fpdf
{
// Page header
	function Header()
	{
		// Logo
		$this->Image('D:/xampp/htdocs/SIRS_module/images/logo.gif',12,5,30);
		// Arial bold 15
		$this->SetFont('Arial','B',15);
		// Move to the right
		$this->Cell(74);
		// Title
		$this->Cell(30,10,'Rumah Sakit HKBP','C');
		// Line break
		$this->Ln(5);
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
		
		$this->Ln(5);
		$this->Cell(100);
		//$this->SetLineWidth(10000);
		$this->Line(40,40,180,40);

		$this->Ln(20);
	}

	// Page footer
	function Footer()
	{
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Page number
		$this->Cell(0,10,'Halaman '.$this->PageNo().'/{nb}',0,0,'C');
	}
}
?>