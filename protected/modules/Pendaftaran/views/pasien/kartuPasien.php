<?php
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Line(2,2,2,106);
		$pdf->Line(2,106,208,106);
		
		$pdf->Line(208,2,208,106);
		$pdf->Line(2,2,208,2);

		$pdf->Line(3,3,3,105);
		$pdf->Line(3,105,207,105);
		
		$pdf->Line(207,3,207,105);
		$pdf->Line(3,3,207,3);
		$pdf->SetFont('Times','',12);
			$pdf->Cell(30,8,'No.RM',0,0);
			$pdf->Cell(10,8,': ',0,0);
			$pdf->Cell(0,8,$model->PAS_NOREKAMMEDIK,0,1);

			$pdf->Cell(30,8,'Nama',0,0);
			$pdf->Cell(10,8,': ',0,0);
			$pdf->Cell(0,8,$model->PAS_NAMAPASIEN,0,1);
			
			$pdf->Cell(30,8,'Jenis kelamin',0,0);
			$pdf->Cell(10,8,': ',0,0);
			if($model->PAS_JENISKELAMIN==='L'){
				$pdf->Cell(0,8,"Laki-laki",0,1);
			}
			else
				$pdf->Cell(0,8,"Perempuan",0,1);
			$pdf->Cell(30,8,'Pekerjaan',0,0);
			$pdf->Cell(10,8,': ',0,0);
			$pdf->Cell(0,8,$model->PAS_PEKERJAAN,0,1);
			
			$pdf->Cell(30,8,'Alamat',0,0);
			$pdf->Cell(10,8,': ',0,0);
			$pdf->Cell(0,8,$model->PAS_ALAMAT,0,1);
		$pdf->SetFont('Times','I',12);
			$pdf->Cell(0,8,'N.B : Setiap berobat Kartu ini harus dibawa',0,1);	
			$pdf->Output();
?>