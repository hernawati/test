<?php


		
		
		$pdf->AliasNbPages();
		$pdf->AddPage();
		
		$pdf->SetFont('Times','B',14);
			$pdf->Cell(0,10,'                                     LAPORAN HARIAN UANG PENDAFTARAN ',0,1);	
		
		$pdf->SetFont('Times','B',12);
			$pdf->Cell(0,10,'Total Jumlah Uang Pendaftaran hari ini  Rp. '.$jumlah,0,1);

		$pdf->SetFont('Times','B',12);
		$pdf->Cell(0,10,'URAIAN :',0,1);	
			
		$pdf->SetFont('Times','',12);
			$pdf->Cell(70,10,'Tanggal',0,0);
			$pdf->Cell(10,10,': ',0,0);
			$pdf->Cell(0,10,$date,0,1);

			$pdf->Cell(70,10,'Total Uang Pendaftaran Pasien Baru',0,0);
			$pdf->Cell(10,10,': ',0,0);
			$pdf->Cell(0,10,$baru.' Pasien x Rp.6000 = Rp '.$totalbaru,0,1);
			
			$pdf->Cell(70,10,'Total Uang Pendaftaran Pasien Lama',0,0);
			$pdf->Cell(10,10,': ',0,0);
			$pdf->Cell(0,10,$lama.' Pasien x Rp.3000 = Rp '.$totallama,0,1);
			
			$pdf->Cell(70,10,'Total Pendapatan Pendaftaran hari ini',0,0);
			$pdf->Cell(10,10,': ',0,0);
			$pdf->Cell(0,10,'Rp.'.$totalbaru.' + Rp. '.$totallama.' = Rp. '.$jumlah,0,1);
			
			
			$pdf->SetFont('Times','I',12);
			$pdf->Cell(0,20,'N.B : Biaya pendaftaran pasien baru Rp.6000 sedangkan pasien lama Rp3.000',0,1);	
			
			$pdf->SetFont('Times','I',12);
			$pdf->Cell(0,5,'Balige, '.$date.'                                                                 Diterima oleh:',0,1);
			$pdf->SetFont('Times','I',12);
			$pdf->Cell(0,10,'Bagian Pendaftaran,                                                                 Bagian Keuangan, ',0,1);
			$pdf->SetFont('Times','I',12);
			$pdf->Cell(0,40,'(_______________________)                                                 (_______________________)',0,1);
			
			
			
			
			
			$pdf->Output();
?>