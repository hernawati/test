<?php

class LaporanController extends ModuleController
{
	//tampilan preview laporan harian uang pendaftaran
	
	function kovBulan($bulan){
		if($bulan==1){
			return 'Januari';
		}
		else if($bulan==2)
		{
			return 'Februari';
		}
		else if($bulan==3)
		{
			return 'Maret';
		}
		else if($bulan ==4)
		{
			return 'April';
		}
		else if($bulan ==5)
		{
			return 'Mei';
		}
		else if($bulan ==6)
		{
			return 'Juni';
		}
		else if($bulan ==7)
		{
			return 'Juli';
		}
		else if($bulan ==8)
		{
			return 'Agustus';
		}
		else if($bulan ==9)
		{
			return 'September';
		}
		else if($bulan ==10)
		{
			return 'Oktober';
		}
		else if($bulan ==11)
		{
			return 'November';
		}
		else if($bulan ==12)
		{
			return 'Desember';
		}
		else{
			return '';
		}
	}
	
	//view Laporan harian uang pendaftaran
	public function actionLaporanHarianPendaftaran($tanggal=null,$bulan=null,$tahun=null)
	{
			$model = new Rekammedik();//instansiasi model Rekammedik
			if($tanggal!=null && $tanggal!='-' && $bulan != null && $bulan != '-' && $tahun != null)
			{
					$sqlbaru='SELECT count(REM_STATUSPASIEN) as baru FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)= \''.$tahun.'\' and MONTH(REM_TGLKUNJUNGAN) = \''.$bulan.'\' and DAY(REM_TGLKUNJUNGAN)= \''.$tanggal.'\' and REM_STATUSPASIEN = "BARU"'; 
					$sqllama='SELECT count(REM_STATUSPASIEN) as baru FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)=\''.$tahun.'\' and MONTH(REM_TGLKUNJUNGAN) = \''.$bulan.'\'  and DAY(REM_TGLKUNJUNGAN)= \''.$tanggal.'\' and REM_STATUSPASIEN = "LAMA"'; 
					//$sqldata='SELECT * FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)= YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN) = MONTH(NOW()) and DAY(REM_TGLKUNJUNGAN)= DAY(NOW())';
					$date = $tanggal.' '.$this->kovBulan($bulan).' '.$tahun;
			}
			else if(($tanggal==null || $tanggal=='-') && $bulan != null && $bulan != '-' && $tahun != null)
			{
				$sqlbaru='SELECT count(REM_STATUSPASIEN) as baru FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)= \''.$tahun.'\' and MONTH(REM_TGLKUNJUNGAN) = \''.$bulan.'\' and REM_STATUSPASIEN = "BARU"'; 
				$sqllama='SELECT count(REM_STATUSPASIEN) as baru FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)= \''.$tahun.'\' and MONTH(REM_TGLKUNJUNGAN) = \''.$bulan.'\' and REM_STATUSPASIEN = "LAMA"'; 
				//$sqldata='SELECT * FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)= YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN) = MONTH(NOW()) and DAY(REM_TGLKUNJUNGAN)= DAY(NOW())';
				$date = $this->kovBulan($bulan).' '.$tahun;
			}
			else if(($bulan==null || $bulan=='-') && ($bulan==null || $bulan=='-') && $tahun != null)
			{
				$sqlbaru='SELECT count(REM_STATUSPASIEN) as baru FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)= \''.$tahun.'\' and DAY(REM_TGLKUNJUNGAN)= \''.$tanggal.'\'and REM_STATUSPASIEN = "BARU"'; 
				$sqllama='SELECT count(REM_STATUSPASIEN) as baru FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)= \''.$tahun.'\' and DAY(REM_TGLKUNJUNGAN)= \''.$tanggal.'\'and REM_STATUSPASIEN = "LAMA"'; 
				//$sqldata='SELECT * FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)= YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN) = MONTH(NOW()) and DAY(REM_TGLKUNJUNGAN)= DAY(NOW())';
				$date = $tahun;
			}
			
			else
			{
				$tgl =getdate();
				$date = $tgl['mday'].' '.$tgl['month'].' '.$tgl['year'];
				$sqlbaru='SELECT count(REM_STATUSPASIEN) as baru FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)= YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN) = MONTH(NOW()) and DAY(REM_TGLKUNJUNGAN)= DAY(NOW())and REM_STATUSPASIEN = "BARU"'; 
				$sqllama='SELECT count(REM_STATUSPASIEN) as baru FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)= YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN) = MONTH(NOW()) and DAY(REM_TGLKUNJUNGAN)= DAY(NOW())and REM_STATUSPASIEN = "LAMA"'; 
				//$sqldata='SELECT * FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)= YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN) = MONTH(NOW()) and DAY(REM_TGLKUNJUNGAN)= DAY(NOW())';
			}
			//$sqlbaru = untuk data pasien baru
			//$sqllama = untuk data pasien lama
			//sqldata = untuk semua data rekammedik
			
			//$model=Rekammedik::model()->findBySql($sqldata);
			$baru = Yii::app()->db->createCommand($sqlbaru)->queryScalar();
			$lama = Yii::app()->db->createCommand($sqllama)->queryScalar();
			$totalbaru = $baru*6000;
			$totallama = $lama*3000;
			$jumlah = $totalbaru + $totallama ;
			
			
			$this->render('laporanHarianPendaftaran',array(
				'baru'=>$baru,'lama'=>$lama,'jumlah'=>$jumlah,'totallama'=>$totallama,'totalbaru'=>$totalbaru,'date'=>$date
			));
	
	}
	
	//fungsi cetak  Laporan harian uang pendaftaran
	
	public function actionCetakLaporanHarian($tanggal=null,$bulan=null,$tahun=null)
	{
		$pdf = new LaporanHarian();
		
			if($tanggal!=null && $bulan != null && $tahun != null)
			{
					$sqlbaru='SELECT count(REM_STATUSPASIEN) as baru FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)= \''.$tahun.'\' and MONTH(REM_TGLKUNJUNGAN) = \''.$bulan.'\' and DAY(REM_TGLKUNJUNGAN)= \''.$tanggal.'\' and REM_STATUSPASIEN = "BARU"'; 
					$sqllama='SELECT count(REM_STATUSPASIEN) as baru FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)=\''.$tahun.'\' and MONTH(REM_TGLKUNJUNGAN) = \''.$bulan.'\'  and DAY(REM_TGLKUNJUNGAN)= \''.$tanggal.'\' and REM_STATUSPASIEN = "LAMA"'; 
					//$sqldata='SELECT * FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)= YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN) = MONTH(NOW()) and DAY(REM_TGLKUNJUNGAN)= DAY(NOW())';
					$date = $tanggal.' '.$this->kovBulan($bulan).' '.$tahun;
			}
			else if($tanggal=null && $bulan != null && $tahun != null)
			{
				$sqlbaru='SELECT count(REM_STATUSPASIEN) as baru FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)= \''.$tahun.'\' and MONTH(REM_TGLKUNJUNGAN) = \''.$bulan.'\' and REM_STATUSPASIEN = "BARU"'; 
				$sqllama='SELECT count(REM_STATUSPASIEN) as baru FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)= \''.$tahun.'\' and MONTH(REM_TGLKUNJUNGAN) = \''.$bulan.'\' and REM_STATUSPASIEN = "LAMA"'; 
				//$sqldata='SELECT * FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)= YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN) = MONTH(NOW()) and DAY(REM_TGLKUNJUNGAN)= DAY(NOW())';
				
				$date = $this->kovBulan($bulan).' '.$tahun;
			}
			else if($tanggal=!null && $bulan = null && $tahun != null)
			{
				$sqlbaru='SELECT count(REM_STATUSPASIEN) as baru FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)= \''.$tahun.'\' and DAY(REM_TGLKUNJUNGAN)= \''.$tanggal.'\'and REM_STATUSPASIEN = "BARU"'; 
				$sqllama='SELECT count(REM_STATUSPASIEN) as baru FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)= \''.$tahun.'\' and DAY(REM_TGLKUNJUNGAN)= \''.$tanggal.'\'and REM_STATUSPASIEN = "LAMA"'; 
				//$sqldata='SELECT * FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)= YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN) = MONTH(NOW()) and DAY(REM_TGLKUNJUNGAN)= DAY(NOW())';
				$date = $tanggal.' '.$tahun;
			}
			
			else
			{
				$tgl =getdate();
				$date = $tgl['mday'].' '.$tgl['month'].' '.$tgl['year'];
				$sqlbaru='SELECT count(REM_STATUSPASIEN) as baru FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)= YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN) = MONTH(NOW()) and DAY(REM_TGLKUNJUNGAN)= DAY(NOW())and REM_STATUSPASIEN = "BARU"'; 
				$sqllama='SELECT count(REM_STATUSPASIEN) as baru FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)= YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN) = MONTH(NOW()) and DAY(REM_TGLKUNJUNGAN)= DAY(NOW())and REM_STATUSPASIEN = "LAMA"'; 
				//$sqldata='SELECT * FROM rekammedik WHERE YEAR(REM_TGLKUNJUNGAN)= YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN) = MONTH(NOW()) and DAY(REM_TGLKUNJUNGAN)= DAY(NOW())';
			}
		
		
		
		$baru = Yii::app()->db->createCommand($sqlbaru)->queryScalar();
		$lama = Yii::app()->db->createCommand($sqllama)->queryScalar();
		$jumlah = $baru*6000 + $lama*3000 ;
		$totalbaru = $baru*6000;
		$totallama = $lama*3000;
		
		$this->renderPartial('dokumenLaporanPendaftaran',array(
				'baru'=>$baru,'lama'=>$lama,'jumlah'=>$jumlah,'pdf'=>$pdf,'totallama'=>$totallama,'totalbaru'=>$totalbaru, 'date'=>$date
			));
	}
	
	//view Laporan harian Poliklinik
	
	public function actionLaporanHarianPoliklinik()
	{
		$model = new Rekammedik();
		$criteria = new CDbCriteria;
		$criteria->select='*';
		$criteria->condition='YEAR(REM_TGLKUNJUNGAN)=YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN)=MONTH(NOW()) and DAY(REM_TGLKUNJUNGAN)=DAY(NOW()) AND REM_STATUSMASUK=\'Telah Ditangani\'';
		$criteria->order='REM_TGLKUNJUNGAN ASC';
		$model = new CActiveDataProvider('Rekammedik', array(
		'criteria'=>$criteria,
			));
		
		$this->render('laporanHarianPoliklinik',array('model'=>$model));
		
	
	}
	
	//fungsi cetak Laporan harian Poliklinik
	public function actionCetakLaporanHarianPoliklinik($tanggal=null,$bulan=null,$tahun=null)
	{
			$pdf = new LaporanHarian();
			$model = 'Belum Siap';
			$this->renderPartial('dokumenLaporanPoliklinik',array('model'=>$model,'pdf'=>$pdf));
	}
	
	//view Laporan harian laboratorium
	public function actionLaporanHarianLaboratorium()
	{
		$model = 'Belum Siap';
		$this->render('laporanHarianLaboratorium',array('model'=>$model));
		
	}
	
	//fungsi cetak Laporan harian laboratorium
	public function actionCetakLaporanHarianLaboratorium($tanggal=null,$bulan=null,$tahun=null)
	{
			$pdf = new LaporanHarian();
			$model = 'Belum Siap';
			$this->renderPartial('dokumenLaporanLaboratorium',array('model'=>$model,'pdf'=>$pdf));
	}
	
	//view Laporan harian Radiologi
	public function actionLaporanHarianRadiologi()
	{
		$model = 'Belum Siap';
		$this->render('laporanHarianRadiologi',array('model'=>$model));
	}
	//fungsi cetak Laporan harian laboratorium
	
	public function actionCetakLaporanHarianRadiologi($tanggal=null,$bulan=null,$tahun=null)
	{
			$pdf = new LaporanHarian();
			$model = 'Belum Siap';
			$this->renderPartial('dokumenLaporanRadiologi',array('model'=>$model,'pdf'=>$pdf));
	}
	

	public function actionLaporanObatUmumAPT($tanggal1=null, $bulan1=null, $tahun1=null, $tanggal2=null, $bulan2=null, $tahun2=null)
	{
		$model1 = new AptObat('search'); //utk fungsi obat masuk
		$model2 = new AptObat('search'); //utk fungsi obat habis
		$model3 = new AptObat('search'); //utk fungsi obat belum habis
		$model4 = new AptObat('search'); //utk fungsi obat terlaris
		
		$criteria1 = new CDbCriteria; //utk sql kondisi obat masuk
		$criteria1->select='*';
		$criteria1->together=true;
		$criteria1->with='aPTREQNOMORORDER';

		$criteria2 = new CDbCriteria; //utk sql kondisi obat habis
		$criteria2->select='*';
		$criteria2->together=true;
		$criteria2->with='aPTREQNOMORORDER';

		$criteria3 = new CDbCriteria; //utk sql kondisi obat belum habis
		$criteria3->select='*';
		$criteria3->together=true;
		$criteria3->with='aPTREQNOMORORDER';


		$criteria4 = new CDbCriteria; //utk sql kondisi obat terlaris
		$criteria4->select='OBT_KODEOBAT, APT_SISAOBAT, APT_HARGAJUALSATUAN';
		$criteria4->order='count(*)';
		$criteria4->group='OBT_KODEOBAT';
		$criteria4->condition='t.GF_PASIENTUJUANOBAT=\'UMUM\'';

		if($tanggal1!=null && $tanggal1!='-' && $bulan1 != null && $bulan1 != '-' && $tahun1 != null && $tanggal2!=null && $tanggal2!='-' && $bulan2 != null && $bulan2 != '-' && $tahun2 != null)
		{
			$datestring1= $tahun1 . '-' . $bulan1 . '-' . $tanggal1;
			$datestring2= $tahun2 . '-' . $bulan2 . '-' . $tanggal2;

			$criteria1->condition='aPTREQNOMORORDER.APTREQ_TGLREQUEST BETWEEN \'' . $datestring1 . '\' AND \'' . $datestring2 . '\' AND aPTREQNOMORORDER.APTREQ_STATUSREQUEST = \'Selesai\' AND t.GF_PASIENTUJUANOBAT = \'UMUM\'';
			
			$criteria2->condition='aPTREQNOMORORDER.APTREQ_TGLREQUEST BETWEEN \'' . $datestring1 . '\' AND \'' . $datestring2 . '\' AND aPTREQNOMORORDER.APTREQ_STATUSREQUEST = \'Selesai\' AND t.GF_PASIENTUJUANOBAT = \'UMUM\' AND APT_SISAOBAT=0';
			
			$criteria3->condition='aPTREQNOMORORDER.APTREQ_TGLREQUEST BETWEEN \'' . $datestring1 . '\' AND \'' . $datestring2 . '\' AND APT_SISAOBAT!=0 AND aPTREQNOMORORDER.APTREQ_STATUSREQUEST = \'Selesai\' AND t.GF_PASIENTUJUANOBAT = \'UMUM\'';
		}

		$model1= new CActiveDataProvider('AptObat', array(
		'criteria'=>$criteria1,
			));
		$model2= new CActiveDataProvider('AptObat', array(
		'criteria'=>$criteria2,
			));
		$model3= new CActiveDataProvider('AptObat', array(
		'criteria'=>$criteria3,
			));
		$model4= new CActiveDataProvider('AptObat', array(
		'criteria'=>$criteria4,
			));
/*/*		 $model4=new CSqlDataProvider($criteria4, array(
            'pagination'=>array(
				'pageSize'=>10,
             ),
        ));
*/
		$this->render('laporanObatUmumAPT',array(
			'model1'=>$model1,
			'model2'=>$model2,
			'model3'=>$model3,
			'model4'=>$model4,
		));			

	}

	public function actionLaporanObatAskesAPT($tanggal1=null, $bulan1=null, $tahun1=null, $tanggal2=null, $bulan2=null, $tahun2=null)
	{
		$model1 = new AptObat('search'); //utk fungsi obat masuk
		$model2 = new AptObat('search'); //utk fungsi obat habis
		$model3 = new AptObat('search'); //utk fungsi obat belum habis
		$model4 = new AptObat('search'); //utk fungsi obat terlaris
		
		$criteria1 = new CDbCriteria; //utk sql kondisi obat masuk
		$criteria1->select='*';
		$criteria1->together=true;
		$criteria1->with='aPTREQNOMORORDER';

		$criteria2 = new CDbCriteria; //utk sql kondisi obat habis
		$criteria2->select='*';
		$criteria2->together=true;
		$criteria2->with='aPTREQNOMORORDER';

		$criteria3 = new CDbCriteria; //utk sql kondisi obat belum habis
		$criteria3->select='*';
		$criteria3->together=true;
		$criteria3->with='aPTREQNOMORORDER';

		$criteria4 = new CDbCriteria; //utk sql kondisi obat terlaris
		$criteria4->select='OBT_KODEOBAT';
		$criteria4->order='count(*)';
		$criteria4->group='OBT_KODEOBAT';
		$criteria4->condition='t.GF_PASIENTUJUANOBAT=\'ASKES\'';

		if($tanggal1!=null && $tanggal1!='-' && $bulan1 != null && $bulan1 != '-' && $tahun1 != null && $tanggal2!=null && $tanggal2!='-' && $bulan2 != null && $bulan2 != '-' && $tahun2 != null)
		{
			$datestring1= $tahun1 . '-' . $bulan1 . '-' . $tanggal1;
			$datestring2= $tahun2 . '-' . $bulan2 . '-' . $tanggal2;

			$criteria1->condition='aPTREQNOMORORDER.APTREQ_TGLREQUEST BETWEEN \'' . $datestring1 . '\' AND \'' . $datestring2 . '\' AND aPTREQNOMORORDER.APTREQ_STATUSREQUEST = \'Selesai\' AND t.GF_PASIENTUJUANOBAT = \'ASKES\'';
			
			$criteria2->condition='aPTREQNOMORORDER.APTREQ_TGLREQUEST BETWEEN \'' . $datestring1 . '\' AND \'' . $datestring2 . '\' AND aPTREQNOMORORDER.APTREQ_STATUSREQUEST = \'Selesai\' AND t.GF_PASIENTUJUANOBAT = \'ASKES\' AND APT_SISAOBAT=0';
			
			$criteria3->condition='aPTREQNOMORORDER.APTREQ_TGLREQUEST BETWEEN \'' . $datestring1 . '\' AND \'' . $datestring2 . '\' AND APT_SISAOBAT!=0 AND aPTREQNOMORORDER.APTREQ_STATUSREQUEST = \'Selesai\' AND t.GF_PASIENTUJUANOBAT = \'ASKES\'';
		}

		$model1= new CActiveDataProvider('AptObat', array(
		'criteria'=>$criteria1,
			));
		$model2= new CActiveDataProvider('AptObat', array(
		'criteria'=>$criteria2,
			));
		$model3= new CActiveDataProvider('AptObat', array(
		'criteria'=>$criteria3,
			));
		$model4= new CActiveDataProvider('AptObat', array(
		'criteria'=>$criteria4,
			));

		$this->render('laporanObatAskesAPT',array(
			'model1'=>$model1,
			'model2'=>$model2,
			'model3'=>$model3,
			'model4'=>$model4,
		));			
	}

	public function actionLaporanObatUmumGF($tanggal1=null, $bulan1=null, $tahun1=null, $tanggal2=null, $bulan2=null, $tahun2=null)
	{
		$model1 = new GFObat('search'); //utk fungsi order obat dari distributor
		$model2 = new GFObat('search'); //utk fungsi terima obat dari distributor
		$model3 = new GFObat('search'); //utk fungsi terima obat dari perusahaan lain
		$model4 = new ObatkeluarRsnainggolan('search'); //utk fungsi obat keluar ke RS Nainggolan
		$model5 = new APTObat('search'); //utk fungsi terima obat ke apotik
		$model6 = new GFObat('search'); //utk fungsi terima obat dari perusahaan lain

		$criteria1 = new CDbCriteria; //utk sql kondisi order obat dari distributor
		$criteria1->select='*';
		$criteria1->together=true;
		$criteria1->with='pesanan';

		$criteria2 = new CDbCriteria; //utk sql kondisi terima obat dari distributor
		$criteria2->select='*';
		$criteria2->together=true;
		$criteria2->with='pesanan';

		$criteria3 = new CDbCriteria; //utk sql kondisi terima obat dari perusahaan lain
		$criteria3->select='*';
		$criteria3->together=true;
		$criteria3->with='pesanan';

		$criteria4 = new CDbCriteria; //utk sql kondisi terima obat dari perusahaan lain
		$criteria4->select='*';
		$criteria4->together=true;
		$criteria4->with=array('gFREQNOMORORDER','pesanan');

		$criteria5 = new CDbCriteria; //utk sql kondisi terima obat dari perusahaan lain
		$criteria5->select='*';
		$criteria5->together=true;
		$criteria5->with=array('aPTREQNOMORORDER');

		$criteria6 = new CDbCriteria; //utk sql kondisi terima obat dari perusahaan lain
		$criteria6->select='*';
		$criteria6->together=true;
		$criteria6->with=array('pesanan');
		$criteria6->condition='t.GF_PASIENTUJUANOBAT = \'UMUM\' AND pesanan.GFREQ_STATUSAPPROVAL = \'Selesai\'';
		$criteria6->order='GF_TGLMASUKOBAT';
		$criteria6->limit=10;
		
		if($tanggal1!=null && $tanggal1!='-' && $bulan1 != null && $bulan1 != '-' && $tahun1 != null && $tanggal2!=null && $tanggal2!='-' && $bulan2 != null && $bulan2 != '-' && $tahun2 != null)
		{
			$datestring1= $tahun1 . '-' . $bulan1 . '-' . $tanggal1;
			$datestring2= $tahun2 . '-' . $bulan2 . '-' . $tanggal2;

			$criteria1->condition='pesanan.GFREQ_TGLREQUEST BETWEEN \'' . $datestring1 . '\' AND \'' . $datestring2 . '\' AND t.GF_PASIENTUJUANOBAT = \'UMUM\' AND pesanan.GFREQ_STATUSAPPROVAL != \'Selesai\'';
			$criteria2->condition='pesanan.GFREQ_TGLREQUEST BETWEEN \'' . $datestring1 . '\' AND \'' . $datestring2 . '\' AND t.GF_PASIENTUJUANOBAT = \'UMUM\' AND pesanan.GFREQ_STATUSAPPROVAL = \'Selesai\' AND	t.GFREQ_NOMORORDER LIKE \'PSN.%\'';
			$criteria3->condition='pesanan.GFREQ_TGLREQUEST BETWEEN \'' . $datestring1 . '\' AND \'' . $datestring2 . '\' AND t.GF_PASIENTUJUANOBAT = \'UMUM\' AND pesanan.GFREQ_STATUSAPPROVAL = \'Selesai\' AND	t.GFREQ_NOMORORDER NOT LIKE \'PSN.%\'';
			$criteria4->condition='pesanan.GFREQ_TGLREQUEST BETWEEN \'' . $datestring1 . '\' AND \'' . $datestring2 . '\' AND t.GF_PASIENTUJUANOBAT = \'UMUM\' AND pesanan.GFREQ_STATUSAPPROVAL = \'Selesai\'';
			$criteria5->condition='aPTREQNOMORORDER.APTREQ_TGLREQUEST BETWEEN \'' . $datestring1 . '\' AND \'' . $datestring2 . '\' AND aPTREQNOMORORDER.APTREQ_STATUSREQUEST = \'Selesai\' AND t.GF_PASIENTUJUANOBAT = \'UMUM\'';
		}
		else
		{
			$criteria1->condition='t.GF_PASIENTUJUANOBAT = \'UMUM\' AND pesanan.GFREQ_STATUSAPPROVAL != \'Selesai\'';
			$criteria2->condition='t.GF_PASIENTUJUANOBAT = \'UMUM\' AND pesanan.GFREQ_STATUSAPPROVAL = \'Selesai\' AND	t.GFREQ_NOMORORDER LIKE \'Pes.%\'';
			$criteria3->condition='t.GF_PASIENTUJUANOBAT = \'UMUM\' AND pesanan.GFREQ_STATUSAPPROVAL = \'Selesai\' AND	t.GFREQ_NOMORORDER NOT LIKE \'Pes.%\'';
			$criteria4->condition='t.GF_PASIENTUJUANOBAT = \'UMUM\' AND pesanan.GFREQ_STATUSAPPROVAL = \'Selesai\'';
			$criteria5->condition='aPTREQNOMORORDER.APTREQ_STATUSREQUEST = \'Selesai\' AND t.GF_PASIENTUJUANOBAT = \'UMUM\'';
		}
		
		$model1= new CActiveDataProvider('GFObat', array(
		'criteria'=>$criteria1,
			));
		$model2= new CActiveDataProvider('GFObat', array(
		'criteria'=>$criteria2,
			));
		$model3= new CActiveDataProvider('GFObat', array(
		'criteria'=>$criteria3,
			));
		$model4= new CActiveDataProvider('ObatkeluarRsnainggolan', array(
		'criteria'=>$criteria4,
			));
		$model5= new CActiveDataProvider('APTObat', array(
		'criteria'=>$criteria5,
			));
		$model6= new CActiveDataProvider('GFObat', array(
		'criteria'=>$criteria6,
			));

		$this->render('laporanObatUmumGF',array(
			'model1'=>$model1,
			'model2'=>$model2,
			'model3'=>$model3,
			'model4'=>$model4,
			'model5'=>$model5,
			'model6'=>$model6,
		));		
	}

	public function actionLaporanObatAskesGF($tanggal1=null, $bulan1=null, $tahun1=null, $tanggal2=null, $bulan2=null, $tahun2=null)
	{
		$model1 = new GFObat('search'); //utk fungsi order obat dari distributor
		$model2 = new GFObat('search'); //utk fungsi terima obat dari distributor
		$model3 = new GFObat('search'); //utk fungsi terima obat dari perusahaan lain
		$model4 = new ObatkeluarRsnainggolan('search'); //utk fungsi obat keluar ke RS Nainggolan
		$model5 = new APTObat('search'); //utk fungsi terima obat ke apotik
		$model6 = new GFObat('search');

		$criteria1 = new CDbCriteria; //utk sql kondisi order obat dari distributor
		$criteria1->select='*';
		$criteria1->together=true;
		$criteria1->with='pesanan';

		$criteria2 = new CDbCriteria; //utk sql kondisi terima obat dari distributor
		$criteria2->select='*';
		$criteria2->together=true;
		$criteria2->with='pesanan';

		$criteria3 = new CDbCriteria; //utk sql kondisi terima obat dari perusahaan lain
		$criteria3->select='*';
		$criteria3->together=true;
		$criteria3->with='pesanan';

		$criteria4 = new CDbCriteria; //utk sql kondisi terima obat dari perusahaan lain
		$criteria4->select='*';
		$criteria4->together=true;
		$criteria4->with=array('gFREQNOMORORDER','pesanan');

		$criteria5 = new CDbCriteria; //utk sql kondisi terima obat dari perusahaan lain
		$criteria5->select='*';
		$criteria5->together=true;
		$criteria5->with=array('aPTREQNOMORORDER');

		$criteria6 = new CDbCriteria; //utk sql kondisi terima obat dari perusahaan lain
		$criteria6->select='*';
		$criteria6->together=true;
		$criteria6->with=array('pesanan');
		$criteria6->condition='t.GF_PASIENTUJUANOBAT = \'ASKES\' AND pesanan.GFREQ_STATUSAPPROVAL=\'Selesai\'';
		$criteria6->order='GF_TGLMASUKOBAT';
		$criteria6->limit=10;

		if($tanggal1!=null && $tanggal1!='-' && $bulan1 != null && $bulan1 != '-' && $tahun1 != null && $tanggal2!=null && $tanggal2!='-' && $bulan2 != null && $bulan2 != '-' && $tahun2 != null)
		{
			$datestring1= $tahun1 . '-' . $bulan1 . '-' . $tanggal1;
			$datestring2= $tahun2 . '-' . $bulan2 . '-' . $tanggal2;

			$criteria1->condition='pesanan.GFREQ_TGLREQUEST BETWEEN \'' . $datestring1 . '\' AND \'' . $datestring2 . '\' AND t.GF_PASIENTUJUANOBAT = \'ASKES\' AND pesanan.GFREQ_STATUSAPPROVAL != \'Selesai\'';
			$criteria2->condition='pesanan.GFREQ_TGLREQUEST BETWEEN \'' . $datestring1 . '\' AND \'' . $datestring2 . '\' AND t.GF_PASIENTUJUANOBAT = \'ASKES\' AND pesanan.GFREQ_STATUSAPPROVAL = \'Selesai\' AND	t.GFREQ_NOMORORDER LIKE \'PSN.%\'';
			$criteria3->condition='pesanan.GFREQ_TGLREQUEST BETWEEN \'' . $datestring1 . '\' AND \'' . $datestring2 . '\' AND t.GF_PASIENTUJUANOBAT = \'ASKES\' AND pesanan.GFREQ_STATUSAPPROVAL = \'Selesai\' AND	t.GFREQ_NOMORORDER NOT LIKE \'PSN.%\'';
			$criteria4->condition='pesanan.GFREQ_TGLREQUEST BETWEEN \'' . $datestring1 . '\' AND \'' . $datestring2 . '\' AND t.GF_PASIENTUJUANOBAT = \'ASKES\' AND pesanan.GFREQ_STATUSAPPROVAL = \'Selesai\'';
			$criteria5->condition='aPTREQNOMORORDER.APTREQ_TGLREQUEST BETWEEN \'' . $datestring1 . '\' AND \'' . $datestring2 . '\' AND aPTREQNOMORORDER.APTREQ_STATUSREQUEST = \'Selesai\' AND t.GF_PASIENTUJUANOBAT = \'ASKES\'';
		}
		
		$model1= new CActiveDataProvider('GFObat', array(
		'criteria'=>$criteria1,
			));
		$model2= new CActiveDataProvider('GFObat', array(
		'criteria'=>$criteria2,
			));
		$model3= new CActiveDataProvider('GFObat', array(
		'criteria'=>$criteria3,
			));
		$model4= new CActiveDataProvider('ObatkeluarRsnainggolan', array(
		'criteria'=>$criteria4,
			));
		$model5= new CActiveDataProvider('APTObat', array(
		'criteria'=>$criteria5,
			));
		$model6= new CActiveDataProvider('GFObat', array(
		'criteria'=>$criteria6,
			));

		$this->render('laporanObatAskesGF',array(
			'model1'=>$model1,
			'model2'=>$model2,
			'model3'=>$model3,
			'model4'=>$model4,
			'model5'=>$model5,
			'model6'=>$model6,
		));		
	}

	public function actionLaporanHarianGudangFarmasi()
	{
	
	}
	
	public function actionLaporanPemasukanRS($id)
	{
		
		$model = new Gfreqobat('search');
		$model->unsetAttributes();
		$modelGfreqobat=Gfreqobat::model()->findAll();
		$modelGfReq = Gfreqobat::model()->findByPk($id);
		$modelGfObat = GFObat::model()->findAllByAttributes(array("GFREQ_NOMORORDER"=>$id));
		$total = 0;

		foreach($modelGfreqobat as $reqobat)
		{
			$modelGfObat = GFObat::model()->findAllByAttributes(array("GFREQ_NOMORORDER"=>$reqobat->GFREQ_NOMORORDER));
			$total = 0;
			foreach($modelGfObat as $obat)
			{
				$total = $total + ($obat->GF_DISKONOBAT * $obat->GF_TOTALOBATMASUK);
			}
		}
		$html2pdf = Yii::app()->ePdf->HTML2PDF();
		$html2pdf->pdf->SetDisplayMode("fullpage");
		ob_start();
		echo $this->renderPartial('laporanPemasukanRS',array('modelGfReq'=>$modelGfReq,'modelGfObat'=>$modelGfObat,'total'=>$total,true));
		$content = ob_get_clean();
		$html2pdf->WriteHTML($content,false);
		$html2pdf->Output();
	}

	public function actionIndexLaporanPemasukanRS($tanggal1=null, $bulan1=null, $tahun1=null, $tanggal2=null, $bulan2=null, $tahun2=null)
	{
		$total=0;
		$totalHarga=0;
		$model = new Gfreqobat('search');
		$modelPbObat = new PengembalianObat('search');
		$mode = PengembalianObat::model()->findAll();
		$model->unsetAttributes();
		$modelPbObat->unsetAttributes();
		$modelGfreqobat=Gfreqobat::model()->findAll();
		$count=0;
		$total=array();
		foreach($modelGfreqobat as $reqobat)
		{
			$modelGfObat = GFObat::model()->findAllByAttributes(array("GFREQ_NOMORORDER"=>$reqobat->GFREQ_NOMORORDER));
			$total[$count] = 0;
			foreach($modelGfObat as $obat)
			{
				$total[$count] = $total[$count] + ($obat->GF_DISKONOBAT * $obat->GF_TOTALOBATMASUK);
			}
			$count++;
		}
		$criteria1 = new CDbCriteria;
		$criteria1->select='*';
		$criteria1->together=true;
		if($tanggal1!=null && $tanggal1!='-' && $bulan1 != null && $bulan1 != '-' && $tahun1 != null && $tanggal2!=null && $tanggal2!='-' && $bulan2 != null && $bulan2 != '-' && $tahun2 != null){
			$datestring1= $tahun1 . '-' . $bulan1 . '-' . $tanggal1;
			$datestring2= $tahun2 . '-' . $bulan2 . '-' . $tanggal2;
			if(isset($datestring1) && isset($datestring2)){
			$temp=0;
			$totalHarga = array();
			foreach($mode as $pbObat){
				$criteria1->condition='PBO_TGLPENGEMBALIAN>= \'' . $datestring1 . '\' AND PBO_TGLPENGEMBALIAN <= \'' . $datestring2.'\'';
				$modelGf = GfObat::model()->findByAttributes(array('GFREQ_NOMORORDER'=>$pbObat->GFREQ_NOMORORDER,'OBT_KODEOBAT'=>$pbObat->OBT_KODEOBAT,'GF_PASIENTUJUANOBAT'=>$pbObat->GF_PASIENTUJUANOBAT));
				if($modelGf != null){
					$totalHarga[$temp] = 0;
					$totalHarga[$temp] = $totalHarga[$temp] + ($pbObat->PBO_JUMLAHSATUAN * $modelGf->GF_HARGAJUALSATUAN * 0.1);
				}else{
					$totalHarga[$temp] = 0;
				}
				$temp++;
			}
			}
		}else{
			$temp=0;
			$totalHarga = array();
			foreach($mode as $pbObat){
				$modelGf = GfObat::model()->findByAttributes(array('GFREQ_NOMORORDER'=>$pbObat->GFREQ_NOMORORDER,'OBT_KODEOBAT'=>$pbObat->OBT_KODEOBAT,'GF_PASIENTUJUANOBAT'=>$pbObat->GF_PASIENTUJUANOBAT));
				if(isset($modelGf)){
					$totalHarga[$temp] = 0;
					$totalHarga[$temp] = $totalHarga[$temp] + ($pbObat->PBO_JUMLAHSATUAN * $modelGf->GF_HARGAJUALSATUAN * 0.1);
				}else{
					$totalHarga[$temp] = 0;
				}
				$temp++;
			}
		}
		$modelPbObat= new CActiveDataProvider('PengembalianObat', array(
		'criteria'=>$criteria1,
			));
		$this->render('indexlaporanPemasukanRS',array(
			'model'=>$model,'total'=>$total,'model1'=>$modelPbObat,'totalHarga'=>$totalHarga,
		));
	}

	public function actionViewDetailPemasukan($id)
	{
		$model = Gfreqobat::model()->findByAttributes(array("GFREQ_NOMORORDER"=>$id));
		$gfobat = GfObat::model()->findByAttributes(array("GFREQ_NOMORORDER"=>$model->GFREQ_NOMORORDER));
		$this->render('viewDetailPemasukan',array(
			'model'=>$model,'gfobat'=>$gfobat,
		));
	}

	public function actionLaporanTotalPemasukanRS()
	{
		$model = new Gfreqobat('search');
		$model->unsetAttributes();
		$modelGfreqobat=Gfreqobat::model()->findAll();
		$count=0;
		$total=array();
		foreach($modelGfreqobat as $reqobat)
		{
			$modelGfObat = GFObat::model()->findAllByAttributes(array("GFREQ_NOMORORDER"=>$reqobat->GFREQ_NOMORORDER));
			$total[$count] = 0;
			foreach($modelGfObat as $obat)
			{
				$total[$count] = $total[$count] + ($obat->GF_DISKONOBAT * $obat->GF_TOTALOBATMASUK);
			}
			$count++;
		}
		$html2pdf = Yii::app()->ePdf->HTML2PDF();
		$html2pdf->pdf->SetDisplayMode("fullpage");
		ob_start();
		echo $this->renderPartial('laporanTotalTransaksiRS',array('modelGfreqobat'=>$modelGfreqobat,'total'=>$total,true));
		$content = ob_get_clean();
		$html2pdf->WriteHTML($content,false);
		$html2pdf->Output();
	}
	
	public function actionLaporanPajak()
	{
		$model = new Gfreqobat('search');
		$this->render('laporanPajak',array(
			'model'=>$model,
		));
	}
	
	public function actionCetakLaporanPajak()
	{
	
	
			$kriteria = new CDbCriteria;
			$kriteria->select = "DIS_NAMADISTRIBUTOR, SUM(GFREQ_PPN) AS GFREQ_PPN";
			//$kriteria->select = "SUM(GFREQ_PPN)";
			$kriteria->group = "DIS_NAMADISTRIBUTOR";
			
			
		$model = Gfreqobat::model()->findAll($kriteria);
			
			
			
			$this->render('cetakLaporanPajak',array(
				'model'=>$model,
			));
	}
	
	//fungsi print Laporan Pajak
	public function actionPrintLaporanPajak($tanggal=null,$bulan=null,$tahun=null)
	{
			$pdf = new LaporanHarian();
			$kriteria = new CDbCriteria;
			$kriteria->select = "DIS_NAMADISTRIBUTOR, SUM(GFREQ_PPN) AS GFREQ_PPN";
			//$kriteria->select = "SUM(GFREQ_PPN)";
			$kriteria->group = "DIS_NAMADISTRIBUTOR";
			
			
		$model = Gfreqobat::model()->findAll($kriteria);
			
			
			$this->renderPartial('dokumenLaporanPajak',array('model'=>$model,'pdf'=>$pdf));
	}
	
	public function actionLaporanreceiptpasienRI(){
		$kriteria = new CDbCriteria();
		$kriteria->select = "*";
		$kriteria->condition = "YEAR(RID_TGLMASUKKAMAR)=YEAR(NOW()) AND MONTH(RID_TGLMASUKKAMAR)=MONTH(NOW())";
		$modelBulan = new CActiveDataProvider('RiDetail',array('criteria'=>$kriteria));
		$this->render('laporanReceiptPasienRI',array('modelBulan'=>$modelBulan));
	}
	
	public function actionReceiptPasienRIHari(){
		$kriteria = new CDbCriteria();
		$kriteria->select = "*";
		$kriteria->condition = "YEAR(RID_TGLMASUKKAMAR)=YEAR(NOW()) AND MONTH(RID_TGLMASUKKAMAR)=MONTH(NOW()) AND DAY(RID_TGLMASUKKAMAR)=DAY(NOW())";
		$modelHari = new CActiveDataProvider('RiDetail',array('criteria'=>$kriteria));
		$this->renderPartial('receipthari',array('modelHari'=>$modelHari));
	}
	
	public function actionReceiptPasienRIBulan(){
		$kriteria = new CDbCriteria();
		$kriteria->select = "*";
		$kriteria->condition = "YEAR(RID_TGLMASUKKAMAR)=YEAR(NOW()) AND MONTH(RID_TGLMASUKKAMAR)=MONTH(NOW())";
		$modelBulan = new CActiveDataProvider('RiDetail',array('criteria'=>$kriteria));
		$this->renderPartial('receiptbulan',array('modelBulan'=>$modelBulan));
	}
	
	public function actionReceiptPasienRITahun(){
		$kriteria = new CDbCriteria();
		$kriteria->select = "*";
		$kriteria->condition = "YEAR(RID_TGLMASUKKAMAR)=YEAR(NOW())";
		$modelTahun = new CActiveDataProvider('RiDetail',array('criteria'=>$kriteria));
		$this->renderPartial('receipttahun',array('modelTahun'=>$modelTahun));
	}
	
	
	public function actionCetakReceiptPasienRI($status){
		if($status=='hari'){
			$kriteria = new CDbCriteria();
			$kriteria->select = "*";
			$kriteria->condition = "YEAR(RID_TGLMASUKKAMAR)=YEAR(NOW()) AND MONTH(RID_TGLMASUKKAMAR)=MONTH(NOW()) AND DAY(RID_TGLMASUKKAMAR)=DAY(NOW())";
			$model = RiDetail::model()->findAll($kriteria);
		}else if($status=='bulan'){
			$kriteria = new CDbCriteria();
			$kriteria->select = "*";
			$kriteria->condition = "YEAR(RID_TGLMASUKKAMAR)=YEAR(NOW()) AND MONTH(RID_TGLMASUKKAMAR)=MONTH(NOW())";
			$model = RiDetail::model()->findAll($kriteria);
		}else if($status=='tahun'){
			$kriteria = new CDbCriteria();
			$kriteria->select = "*";
			$kriteria->condition = "YEAR(RID_TGLMASUKKAMAR)=YEAR(NOW())";
			$model = RiDetail::model()->findAll($kriteria);
		}
		
		$pdf = Yii::app()->ePdf->HTML2PDF();
		$pdf->WriteHTML($this->renderPartial('DokumenReceiptPasienRI',array('model'=>$model), true));
		$pdf->Output();
	}
	
	
	public function actionDetailreceiptRI($id,$tglkunjungan,$tglmasuk){
		$model = RiDetail::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan,'RID_TGLMASUKKAMAR'=>$tglmasuk));
		$this->render('detailreceiptRI',array('model'=>$model));
	}
	
	public function actionLaporanHasilLayananRI(){
		$kriteria = new CDbCriteria();
		$kriteria->select = "*";
		$kriteria->condition = 'RID_STATUSRI=\''.'Ya'.'\'';
		$modelHasil = new CActiveDataProvider('RiDetail',array('criteria'=>$kriteria));
		$this->render('laporanHasilLayananRI',array('model'=>$modelHasil));
	}
	
	public function actionDetailHasilLayananRI($norekammedik,$tglkunjungan,$tglmasuk){
		$model = RiLayanan::model()->findAllByAttributes(array('PAS_NOREKAMMEDIK'=>$norekammedik,'RID_TGLMASUKKAMAR'=>$tglmasuk,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
		$modelRi = RiLayanan::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$norekammedik,'RID_TGLMASUKKAMAR'=>$tglmasuk,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
		foreach($model as $ril){
			// echo $ril->PAS_NOREKAMMEDIK."<br>";
			// echo $ril->RID_TGLMASUKKAMAR."<br>";
			// echo $ril->REM_TGLKUNJUNGAN."<br>";
			// die();
			if($ril->LAY_IDLAYANAN == 1){
				$modelFisioterapi = HasilFisioterapi::model()->findByAttributes(array('RI__PAS_NOREKAMMEDIK'=>$ril->PAS_NOREKAMMEDIK,'RI__REM_TGLKUNJUNGAN'=>$ril->REM_TGLKUNJUNGAN,'RID_TGLMASUKKAMAR'=>$ril->RID_TGLMASUKKAMAR,'RIL_TGLLAYANAN'=>$ril->RIL_TGLLAYANAN,'RI__LAY_IDLAYANAN'=>$ril->LAY_IDLAYANAN));
				if($modelFisioterapi==null){
					$modelFisioterapi=new HasilFisioterapi();
				}	
				
			}else if($ril->LAY_IDLAYANAN==2){
				$modelEKG = HasilElektrokardiografi::model()->findByAttributes(array('RI__PAS_NOREKAMMEDIK'=>$ril->PAS_NOREKAMMEDIK,'RI__REM_TGLKUNJUNGAN'=>$ril->REM_TGLKUNJUNGAN,'RID_TGLMASUKKAMAR'=>$ril->RID_TGLMASUKKAMAR,'RIL_TGLLAYANAN'=>$ril->RIL_TGLLAYANAN,'RI__LAY_IDLAYANAN'=>$ril->LAY_IDLAYANAN));
				if($modelEKG==null){
					$modelEKG=new HasilElektrokardiografi();
				}
			}else if($ril->LAY_IDLAYANAN==3){
				$modelRontgen = HasilRontgen::model()->findByAttributes(array('RI__PAS_NOREKAMMEDIK'=>$ril->PAS_NOREKAMMEDIK,'RI__REM_TGLKUNJUNGAN'=>$ril->REM_TGLKUNJUNGAN,'RID_TGLMASUKKAMAR'=>$ril->RID_TGLMASUKKAMAR,'RIL_TGLLAYANAN'=>$ril->RIL_TGLLAYANAN,'RI__LAY_IDLAYANAN'=>$ril->LAY_IDLAYANAN));
				if($modelRontgen==null){
					$modelRontgen=new HasilRontgen();
				}
			}else if($ril->LAY_IDLAYANAN==4){
				$modelUsg = HasilUsg::model()->findByAttributes(array('RI__PAS_NOREKAMMEDIK'=>$ril->PAS_NOREKAMMEDIK,'RI__REM_TGLKUNJUNGAN'=>$ril->REM_TGLKUNJUNGAN,'RID_TGLMASUKKAMAR'=>$ril->RID_TGLMASUKKAMAR,'RIL_TGLLAYANAN'=>$ril->RIL_TGLLAYANAN,'RI__LAY_IDLAYANAN'=>$ril->LAY_IDLAYANAN));
				if($modelUsg==null){
					$modelUsg=new HasilUsg();
				}
			}else if($ril->LAY_IDLAYANAN==5){
				$modelDarah = HasilDarah::model()->findByAttributes(array('RI__PAS_NOREKAMMEDIK'=>$ril->PAS_NOREKAMMEDIK,'RI__REM_TGLKUNJUNGAN'=>$ril->REM_TGLKUNJUNGAN,'RID_TGLMASUKKAMAR'=>$ril->RID_TGLMASUKKAMAR,'RIL_TGLLAYANAN'=>$ril->RIL_TGLLAYANAN,'RI__LAY_IDLAYANAN'=>$ril->LAY_IDLAYANAN));
				if($modelDarah==null){
					$modelDarah=new HasilDarah();
				}
			}else if($ril->LAY_IDLAYANAN==6){
				$modelDarahKimia = HasillabDarahkimia::model()->findByAttributes(array('RI__PAS_NOREKAMMEDIK'=>$ril->PAS_NOREKAMMEDIK,'RI__REM_TGLKUNJUNGAN'=>$ril->REM_TGLKUNJUNGAN,'RID_TGLMASUKKAMAR'=>$ril->RID_TGLMASUKKAMAR,'RIL_TGLLAYANAN'=>$ril->RIL_TGLLAYANAN,'RI__LAY_IDLAYANAN'=>$ril->LAY_IDLAYANAN));
				if($modelDarahKimia==null){
					$modelDarahKimia=new HasillabDarahkimia();
				}
			}else if($ril->LAY_IDLAYANAN==7){
				$modelUrin = HasilUrin::model()->findByAttributes(array('RI__PAS_NOREKAMMEDIK'=>$ril->PAS_NOREKAMMEDIK,'RI__REM_TGLKUNJUNGAN'=>$ril->REM_TGLKUNJUNGAN,'RID_TGLMASUKKAMAR'=>$ril->RID_TGLMASUKKAMAR,'RIL_TGLLAYANAN'=>$ril->RIL_TGLLAYANAN,'RI__LAY_IDLAYANAN'=>$ril->LAY_IDLAYANAN));
				if($modelUrin==null){
					$modelUrin=new HasilUrin();
				}
			}else if($ril->LAY_IDLAYANAN==8){
				$modelTinja = HasilTinja::model()->findByAttributes(array('RI__PAS_NOREKAMMEDIK'=>$ril->PAS_NOREKAMMEDIK,'RI__REM_TGLKUNJUNGAN'=>$ril->REM_TGLKUNJUNGAN,'RID_TGLMASUKKAMAR'=>$ril->RID_TGLMASUKKAMAR,'RIL_TGLLAYANAN'=>$ril->RIL_TGLLAYANAN,'RI__LAY_IDLAYANAN'=>$ril->LAY_IDLAYANAN));
				if($modelTinja==null){
					$modelTinja=new HasilTinja();
				}
			}else if($ril->LAY_IDLAYANAN==9){
				$modelSpt = HasilSptsecret::model()->findByAttributes(array('RI__PAS_NOREKAMMEDIK'=>$ril->PAS_NOREKAMMEDIK,'RI__REM_TGLKUNJUNGAN'=>$ril->REM_TGLKUNJUNGAN,'RID_TGLMASUKKAMAR'=>$ril->RID_TGLMASUKKAMAR,'RIL_TGLLAYANAN'=>$ril->RIL_TGLLAYANAN,'RI__LAY_IDLAYANAN'=>$ril->LAY_IDLAYANAN));
				if($modelSpt==null){
					$modelSpt=new HasilSptsecret();
				}
			}
		}
		$this->render('detailhasillayanan',array(
									'modelFisioterapi'=>isset($modelFisioterapi)?$modelFisioterapi:new HasilFisioterapi(),
									'modelEKG'=>isset($modelEKG)?$modelEKG:new HasilElektrokardiografi(),
									'modelRontgen'=>isset($modelRontgen)?$modelRontgen:new HasilRontgen(),
									'modelUsg'=>isset($modelUsg)?$modelUsg:new HasilUsg(),
									'modelDarah'=>isset($modelDarah)?$modelDarah:new HasilDarah(),
									'modelDarahKimia'=>isset($modelDarahKimia)?$modelDarahKimia:new HasillabDarahkimia(),
									'modelUrin'=>isset($modelUrin)?$modelUrin:new HasilUrin(),
									'modelTinja'=>isset($modelTinja)?$modelTinja:new HasilTinja(),
									'modelSpt'=>isset($modelSpt)?$modelSpt:new HasilSptsecret(),
									'modelRi'=>isset($modelRi)?$modelRi:new RiLayanan(),
									));
	}
	
	public function actionCetakHasilLayanan($norekammedik,$tglkunjungan,$tglmasuk){
		$model = RiLayanan::model()->findAllByAttributes(array('PAS_NOREKAMMEDIK'=>$norekammedik,'RID_TGLMASUKKAMAR'=>$tglmasuk,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
		$modelRi = RiLayanan::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$norekammedik,'RID_TGLMASUKKAMAR'=>$tglmasuk,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
		foreach($model as $ril){
			if($ril->LAY_IDLAYANAN == 1){
				$modelFisioterapi = HasilFisioterapi::model()->findByAttributes(array('RI__PAS_NOREKAMMEDIK'=>$ril->PAS_NOREKAMMEDIK,'RI__REM_TGLKUNJUNGAN'=>$ril->REM_TGLKUNJUNGAN,'RID_TGLMASUKKAMAR'=>$ril->RID_TGLMASUKKAMAR,'RIL_TGLLAYANAN'=>$ril->RIL_TGLLAYANAN,'RI__LAY_IDLAYANAN'=>$ril->LAY_IDLAYANAN));
				if($modelFisioterapi==null){
					$modelFisioterapi=new HasilFisioterapi();
				}	
				
			}else if($ril->LAY_IDLAYANAN==2){
				$modelEKG = HasilElektrokardiografi::model()->findByAttributes(array('RI__PAS_NOREKAMMEDIK'=>$ril->PAS_NOREKAMMEDIK,'RI__REM_TGLKUNJUNGAN'=>$ril->REM_TGLKUNJUNGAN,'RID_TGLMASUKKAMAR'=>$ril->RID_TGLMASUKKAMAR,'RIL_TGLLAYANAN'=>$ril->RIL_TGLLAYANAN,'RI__LAY_IDLAYANAN'=>$ril->LAY_IDLAYANAN));
				if($modelEKG==null){
					$modelEKG=new HasilElektrokardiografi();
				}
			}else if($ril->LAY_IDLAYANAN==3){
				$modelRontgen = HasilRontgen::model()->findByAttributes(array('RI__PAS_NOREKAMMEDIK'=>$ril->PAS_NOREKAMMEDIK,'RI__REM_TGLKUNJUNGAN'=>$ril->REM_TGLKUNJUNGAN,'RID_TGLMASUKKAMAR'=>$ril->RID_TGLMASUKKAMAR,'RIL_TGLLAYANAN'=>$ril->RIL_TGLLAYANAN,'RI__LAY_IDLAYANAN'=>$ril->LAY_IDLAYANAN));
				if($modelRontgen==null){
					$modelRontgen=new HasilRontgen();
				}
			}else if($ril->LAY_IDLAYANAN==4){
				$modelUsg = HasilUsg::model()->findByAttributes(array('RI__PAS_NOREKAMMEDIK'=>$ril->PAS_NOREKAMMEDIK,'RI__REM_TGLKUNJUNGAN'=>$ril->REM_TGLKUNJUNGAN,'RID_TGLMASUKKAMAR'=>$ril->RID_TGLMASUKKAMAR,'RIL_TGLLAYANAN'=>$ril->RIL_TGLLAYANAN,'RI__LAY_IDLAYANAN'=>$ril->LAY_IDLAYANAN));
				if($modelUsg==null){
					$modelUsg=new HasilUsg();
				}
			}else if($ril->LAY_IDLAYANAN==5){
				$modelDarah = HasilDarah::model()->findByAttributes(array('RI__PAS_NOREKAMMEDIK'=>$ril->PAS_NOREKAMMEDIK,'RI__REM_TGLKUNJUNGAN'=>$ril->REM_TGLKUNJUNGAN,'RID_TGLMASUKKAMAR'=>$ril->RID_TGLMASUKKAMAR,'RIL_TGLLAYANAN'=>$ril->RIL_TGLLAYANAN,'RI__LAY_IDLAYANAN'=>$ril->LAY_IDLAYANAN));
				if($modelDarah==null){
					$modelDarah=new HasilDarah();
				}
			}else if($ril->LAY_IDLAYANAN==6){
				$modelDarahKimia = HasillabDarahkimia::model()->findByAttributes(array('RI__PAS_NOREKAMMEDIK'=>$ril->PAS_NOREKAMMEDIK,'RI__REM_TGLKUNJUNGAN'=>$ril->REM_TGLKUNJUNGAN,'RID_TGLMASUKKAMAR'=>$ril->RID_TGLMASUKKAMAR,'RIL_TGLLAYANAN'=>$ril->RIL_TGLLAYANAN,'RI__LAY_IDLAYANAN'=>$ril->LAY_IDLAYANAN));
				if($modelDarahKimia==null){
					$modelDarahKimia=new HasillabDarahkimia();
				}
			}else if($ril->LAY_IDLAYANAN==7){
				$modelUrin = HasilUrin::model()->findByAttributes(array('RI__PAS_NOREKAMMEDIK'=>$ril->PAS_NOREKAMMEDIK,'RI__REM_TGLKUNJUNGAN'=>$ril->REM_TGLKUNJUNGAN,'RID_TGLMASUKKAMAR'=>$ril->RID_TGLMASUKKAMAR,'RIL_TGLLAYANAN'=>$ril->RIL_TGLLAYANAN,'RI__LAY_IDLAYANAN'=>$ril->LAY_IDLAYANAN));
				if($modelUrin==null){
					$modelUrin=new HasilUrin();
				}
			}else if($ril->LAY_IDLAYANAN==8){
				$modelTinja = HasilTinja::model()->findByAttributes(array('RI__PAS_NOREKAMMEDIK'=>$ril->PAS_NOREKAMMEDIK,'RI__REM_TGLKUNJUNGAN'=>$ril->REM_TGLKUNJUNGAN,'RID_TGLMASUKKAMAR'=>$ril->RID_TGLMASUKKAMAR,'RIL_TGLLAYANAN'=>$ril->RIL_TGLLAYANAN,'RI__LAY_IDLAYANAN'=>$ril->LAY_IDLAYANAN));
				if($modelTinja==null){
					$modelTinja=new HasilTinja();
				}
			}else if($ril->LAY_IDLAYANAN==9){
				$modelSpt = HasilSptsecret::model()->findByAttributes(array('RI__PAS_NOREKAMMEDIK'=>$ril->PAS_NOREKAMMEDIK,'RI__REM_TGLKUNJUNGAN'=>$ril->REM_TGLKUNJUNGAN,'RID_TGLMASUKKAMAR'=>$ril->RID_TGLMASUKKAMAR,'RIL_TGLLAYANAN'=>$ril->RIL_TGLLAYANAN,'RI__LAY_IDLAYANAN'=>$ril->LAY_IDLAYANAN));
				if($modelSpt==null){
					$modelSpt=new HasilSptsecret();
				}
			}
		}
		
		$pdf = Yii::app()->ePdf->HTML2PDF();
		$pdf->WriteHTML($this->renderPartial('cetakHasilLayanan',array(
									'modelFisioterapi'=>isset($modelFisioterapi)?$modelFisioterapi:new HasilFisioterapi(),
									'modelEKG'=>isset($modelEKG)?$modelEKG:new HasilElektrokardiografi(),
									'modelRontgen'=>isset($modelRontgen)?$modelRontgen:new HasilRontgen(),
									'modelUsg'=>isset($modelUsg)?$modelUsg:new HasilUsg(),
									'modelDarah'=>isset($modelDarah)?$modelDarah:new HasilDarah(),
									'modelDarahKimia'=>isset($modelDarahKimia)?$modelDarahKimia:new HasillabDarahkimia(),
									'modelUrin'=>isset($modelUrin)?$modelUrin:new HasilUrin(),
									'modelTinja'=>isset($modelTinja)?$modelTinja:new HasilTinja(),
									'modelSpt'=>isset($modelSpt)?$modelSpt:new HasilSptsecret(),
									'modelRi'=>isset($modelRi)?$modelRi:new RiLayanan(),
									),true));
		$pdf->Output();
	}
	
	//RUTH
	//LAPORAN OBAT UMUM N ASURANSI PADA PASIEN RAWAT JALAN
	public function loadModell($id)
	{
		$model1=Obat::model()->findByPk($id);
		if($model1===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model1;
	}

/*	public function actionDetailObat($id)
	{
		
		$model=new ResepObat('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ResepObat']))
			$model->attributes=$_GET['ResepObat'];
		$model->OBT_KODEOBAT=$id;

		$obat = new Obat('search');
		$obat->OBT_KODEOBAT=$id;
		
		$this->render('detailobat',array(
			'model1'=>$this->loadModell($id),
			'obat'=>$obat,
			'model'=>$model,
		));
	}
*/

	public function actionDetailObatRawatJalan($id)
	{
		
		$model=new ResepObat('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ResepObat']))
			$model->attributes=$_GET['ResepObat'];
		$model->OBT_KODEOBAT=$id;

		$obat = new Obat('search');
		$obat->OBT_KODEOBAT=$id;
		
		$this->render('detailobatrawatjalan',array(
			'model1'=>$this->loadModell($id),
			'obat'=>$obat,
			'model'=>$model,
		));
	}

	public function actionDetailObatRawatInap($id)
	{
		
		$model=new RiKontrolobat('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RiKontrolobat']))
			$model->attributes=$_GET['RiKontrolobat'];
		$model->OBT_KODEOBAT=$id;

		$obat = new Obat('search');
		$obat->OBT_KODEOBAT=$id;
		
		$this->render('detailobatrawatinap',array(
			'model1'=>$this->loadModel2($id),
			'obat'=>$obat,
			'model'=>$model,
		));
	}

	public function actionRawatJalan()
	{
		$model=new ResepObat('search');
		
	//	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['ResepObat']))
			$model->attributes=$_GET['ResepObat'];

		
		//$sql=new CActiveDataProvider();
		$this->render('rawatjalan',array(
			'model'=>$model,
		));
	}

	
	public function actionLaporanUmum()
	{
		
		$model=new ResepObat('search');
		
	//	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['ResepObat']))
			$model->attributes=$_GET['ResepObat'];

		
		//$sql=new CActiveDataProvider();
		$this->render('laporanUmum',array(
			'model'=>$model,
		));
	}

	public function actionLaporanAsuransi()
	{
	
		$model=new ResepObat('search');
		
	//	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['ResepObat']))
			$model->attributes=$_GET['ResepObat'];

		
		//$sql=new CActiveDataProvider();
		$this->render('laporanAsuransi',array(
			'model'=>$model,
		));
	}
	
	//LAPORAN OBAT UMUM N ASURANSI PADA PASIEN RAWAT INAP
	public function loadModel2($id)
	{
		$model1=Obat::model()->findByPk($id);
		if($model1===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model1;
	}
	
	/*public function actionDetailObat($id)
	{
		
		$model=new RiKontrolobat('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RiKontrolobat']))
			$model->attributes=$_GET['RiKontrolobat'];
		$model->OBT_KODEOBAT=$id;

		$obat = new Obat('search');
		$obat->OBT_KODEOBAT=$id;
		
		$this->render('detailobat',array(
			'model1'=>$this->loadModel2($id),
			'obat'=>$obat,
			'model'=>$model,
		));
	}

*/

	public function actionRawatInap()
	{
		$model=new RiKontrolobat('search');
		
	//	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['RiKontrolobat']))
			$model->attributes=$_GET['RiKontrolobat'];

		
		//$sql=new CActiveDataProvider();
		$this->render('rawatinap',array(
			'model'=>$model,
		));
	}

	
	public function actionLaporanUmumInap()
	{
		

		$model=new RiKontrolobat('search');
		
	//	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['RiKontrolobat']))
			$model->attributes=$_GET['RiKontrolobat'];

		
		//$sql=new CActiveDataProvider();
		$this->render('laporanUmumInap',array(
			'model'=>$model,
		));
	}

	public function actionLaporanAsuransiInap()
	{
	
		$model=new RiKontrolobat('search');
		
	//	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['RiKontrolobat']))
			$model->attributes=$_GET['RiKontrolobat'];

		
		//$sql=new CActiveDataProvider();
		$this->render('laporanAsuransiInap',array(
			'model'=>$model,
		));
	}
	
		
}