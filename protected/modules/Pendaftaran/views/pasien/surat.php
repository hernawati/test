<?php
		$kartu->AliasNbPages();
		$kartu->AddPage();
		$kartu->SetFont('Times','',12);
			$kartu->Ln(0);
			$kartu->Cell(83);
			$kartu->Cell(0,10,$suratsehat->SU_NOSURATSEHAT,0,1);
			$kartu->Ln(2);
			$kartu->Cell(15);
			$kartu->SetFont('Times','',12);
			$kartu->Cell(30,10,'Yang bertanda tangan di bawah ini dokter RS HKBP Balige, pada saat ini menerangkan bahwa :','C');
			$kartu->Ln(15);
			$kartu->Cell(45);
			$kartu->Cell(30,10,'Nama',0,0);
			$kartu->Cell(10,10,': ',0,0);
			$kartu->Cell(0,10,$suratsehat->rekammedik->pasien->PAS_NAMAPASIEN,0,1);
			$kartu->Cell(45);
			$kartu->Cell(30,10,'Umur',0,0);
			$kartu->Cell(10,10,': ',0,0);
			$kartu->Cell(0,10,date("Y")-date_format(date_create($suratsehat->rekammedik->pasien->PAS_TGLLAHIR),"Y").' tahun',0,1);
			$kartu->Cell(45);
			$kartu->Cell(30,10,'Pekerjaan',0,0);
			$kartu->Cell(10,10,': ',0,0);
			$kartu->Cell(0,10,$suratsehat->rekammedik->pasien->PAS_PEKERJAAN,0,1);
			$kartu->Cell(45);
			$kartu->Cell(30,10,'Alamat',0,0);
			$kartu->Cell(10,10,': ',0,0);
			$kartu->Cell(0,10,$suratsehat->rekammedik->pasien->PAS_ALAMAT,0,1);
			$kartu->Ln(8);
			$kartu->SetFont('Times','',12);
			$kartu->Cell(15);
			$kartu->Cell(0,10,'Telah dilakukan Pemerikassan Fisik, Pemerikasaan laboratorium,',0,1);

			$kartu->Cell(15);
			$kartu->Cell(0,10,'serta Pemeriksaaan Sinar Tembus (Ro). ',0,1);

			$kartu->Cell(15);
			$kartu->Cell(0,10,'Dan berdasarkan hasil tersebut dinyatakan '.$suratsehat->SU_STATUS.' untuk '.$suratsehat->SU_TUJUAN.'.',0,1);
			
			$kartu->Ln(8);
			$kartu->Cell(45);
			$kartu->Cell(30,10,'Tinggi badan',0,0);
			$kartu->Cell(10,10,': ',0,0);
			$kartu->Cell(0,10,$suratsehat->rekammedik->REM_TINGGIBADAN,0,1);
			$kartu->Cell(45);
			$kartu->Cell(30,10,'Berat badan',0,0);
			$kartu->Cell(10,10,': ',0,0);
			$kartu->Cell(0,10,$suratsehat->rekammedik->REM_BERATBADAN,0,1);
			$kartu->Cell(45);
			$kartu->Cell(30,10,'Golongan darah',0,0);
			$kartu->Cell(10,10,': ',0,0);
			$kartu->Cell(0,10,$suratsehat->rekammedik->pasien->PAS_GOLONGANDARAH,0,1);
			$kartu->Cell(45);
			$kartu->Cell(30,10,'Tekanan darah',0,0);
			$kartu->Cell(10,10,': ',0,0);
			$kartu->Cell(0,10,$suratsehat->rekammedik->REM_TEKANANDARAH,0,1);
			$kartu->Ln(5);
			$kartu->Cell(122);
			$kartu->Cell(0,1,'Balige, '.date('d F Y'),0,1);
			$kartu->Ln(0);$kartu->Ln(5);
			$kartu->Cell(113);
			$kartu->Cell(0,1,'DOKTER YANG MEMERIKSA',0,1);
			$kartu->Ln(20);
			$kartu->Cell(132);
			$kartu->Cell(0,10,$suratsehat->rekammedik->dokter['DOK_NAMADOKTER'],0,1);
			
			$kartu->Output();
?>