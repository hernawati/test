<?php

class PoliklinikController extends ModuleController
{	
	public $i=1;
	public function actionAntrian($poliklinik=NULL)
	{
		
		if(isset($poliklinik)){
			$criteriaAntrian = new CDbCriteria;
			$criteriaAntrian->select='*';
			$criteriaAntrian->condition='REMTU_ID=\''.$poliklinik.'\' AND YEAR(REM_TGLKUNJUNGAN)=YEAR(NOW()) AND MONTH(REM_TGLKUNJUNGAN)=MONTH(NOW()) AND  DAY(REM_TGLKUNJUNGAN)=DAY(NOW()) AND  REM_STATUSMASUK=\'Belum Ditangani\'';	
			$criteriaAntrian->order='REM_TGLKUNJUNGAN ASC';
			$modelAntrian = new CActiveDataProvider('Rekammedik', array(
				'criteria'=>$criteriaAntrian,
			));
			
			$criteriaTunda = new CDbCriteria;
			$criteriaTunda->select='*';
			$criteriaTunda->condition='REMTU_ID=\''.$poliklinik.'\' AND YEAR(REM_TGLKUNJUNGAN)=YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN)=MONTH(NOW()) and DAY(REM_TGLKUNJUNGAN)=DAY(NOW()) AND REM_STATUSMASUK=\'Tunda\'';
			$criteriaTunda->order='REM_TGLKUNJUNGAN ASC';
			$modelTunda = new CActiveDataProvider('Rekammedik', array(
				'criteria'=>$criteriaTunda,
			));
			
			$criteriaDitangani = new CDbCriteria;
			$criteriaDitangani->select='*';
			$criteriaDitangani->condition='REMTU_ID=\''.$poliklinik.'\' AND YEAR(REM_TGLKUNJUNGAN)=YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN)=MONTH(NOW()) and DAY(REM_TGLKUNJUNGAN)=DAY(NOW()) AND REM_STATUSMASUK=\'Ditangani\'';
			$criteriaDitangani->order='REM_TGLKUNJUNGAN ASC';
			$modelDitangani= new CActiveDataProvider('Rekammedik', array(
				'criteria'=>$criteriaDitangani,
			));
			$namapoli = Rekammediktujuan::model()->findByPk($poliklinik);
			$this->render('_daftarAntrian',array('modelDitangani'=>$modelDitangani,'modelAntrian'=>$modelAntrian,'modelTunda'=>$modelTunda,'poliklinik'=>$poliklinik,'namapoli'=>$namapoli->REMTU_NAMA));
			//Yii::app()->end();
		}else{
			$criteria=new CDbCriteria;
			$criteria->compare('REMTU_NAMA','Poliklinik',true);
			
			$daftarPoliklinik = Rekammediktujuan::model()->findAll($criteria);
			$remtu = new Rekammediktujuan('search');
			$this->render('antrianPoliklinik',array('daftarPoliklinik'=>$daftarPoliklinik,'remtu'=>$remtu));
		}
	}
	
	public function actionView($id, $tglkunjungan){
		$model=RjLayanan::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
		if($model->LAY_IDLAYANAN==1){
			$hasil=HasilFisioterapi::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
			// if($model==NULL){
				// $hasil = new HasilFisioterapi;
			// }
		}else if($model->LAY_IDLAYANAN==2){
			$hasil=HasilElektrokardiografi::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
			// if($hasil==NULL){
				// $hasil = new HasilElektrokardiografi;
			// }
		}else if($model->LAY_IDLAYANAN==3){
			$hasil=HasilRontgen::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
			// if($hasil==NULL){
				// $hasil = new HasilRontgen;
			// }
		}else if($model->LAY_IDLAYANAN==4){
			$hasil=HasilUsg::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
			// if($model==NULL){
				// $hasil = new HasilUsg;
			// }
		}else if($model->LAY_IDLAYANAN==5){
			$hasil=HasilDarah::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
			// if($hasil==NULL){
				// $hasil = new HasilDarah;
			// }
		}else if($model->LAY_IDLAYANAN==6){
			$hasil=HasillabDarahkimia::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
			// if($hasil==NULL){
				// $hasil = new HasillabDarahkimia;
			// }
		}else if($model->LAY_IDLAYANAN==7){
			$hasil=HasilUrin::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
			// if($hasil==NULL){
				// $hasil = new HasilUrin;
			// }
		}else if($model->LAY_IDLAYANAN==8){
			$hasil=HasilTinja::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
			// if($hasil==NULL){
				// $hasil = new HasilTinja;
			// }
		}else if($model->LAY_IDLAYANAN==9){
			$hasil=HasilSptsecret::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
			// if($hasil==NULL){
				// $hasil = new HasilSptsecret;
			// }
		}
		$this->renderPartial('view',array(
			'model'=>$model,
			'hasil'=>$hasil,
			)
		);
	}
	public function actionViewRujuk($id,$tglkunjungan){
		//$model=RjLayanan::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
		//$this->render('viewRujuk',array('model'=>$model));
		echo "adada";
		
	}
	
	
	
	public function actionTangani($id,$tglkunjungan,$poliklinik)
	{	
		$model = $this->loadModel($id,$tglkunjungan);
		$model->REM_STATUSMASUK='Ditangani';
		if($model->save(false)){
			$this->redirect(array('antrian','poliklinik'=>$poliklinik));
		}			
	}
	
	public function actionBatal($id,$tglkunjungan)
	{	
		$model = $this->loadModel($id,$tglkunjungan);
		$model->REM_STATUSMASUK='Batal';
		if($model->save()){
			$this->redirect(array('antrian'));
		}else{
			echo '<script>';
			echo 'alert("Pengubahan status gagal,terjadi kesalahan!");';
			echo 'location.href="'.Yii::app()->createUrl("poliklinik/antrian").'"';
			echo '</script>';
		}
			
	}
	
	public function actionSelesai($id,$tglkunjungan,$idpoli)
	{
		$model = $this->loadModel($id,$tglkunjungan);
		$model->REM_STATUSPEMBAYARAN='Lunas';
		$model->REM_STATUSMASUK='Sudah Ditangani';
		if($model->save()){
			$this->redirect(array('antrian','poliklinik'=>$idpoli));
		}else{
			$this->redirect(array('antrian'));
		}
	}
	
	public function actionTunda($id,$tglkunjungan,$idpoli)
	{
		$model = $this->loadModel($id,$tglkunjungan);
		$model->REM_STATUSMASUK='Tunda';
		if($model->save()){
			$this->redirect(array('antrian','poliklinik'=>$idpoli));
		}
		else
		{
			echo '<script>';
			echo 'alert("Pengubahan status gagal,terjadi kesalahan!");';
			echo '</script>';
		}
	}
	
	
	public function actionLog($poliklinik=NULL){
		if(isset($poliklinik)){
			$criteriaPengunjung = new CDbCriteria;
			$criteriaPengunjung->select='*';
			$criteriaPengunjung->condition='REMTU_ID=\''.$poliklinik.'\' AND YEAR(REM_TGLKUNJUNGAN)=YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN)=MONTH(NOW()) and DAY(REM_TGLKUNJUNGAN)=DAY(NOW()) AND REM_STATUSMASUK=\'Telah Ditangani\'';
			$criteriaPengunjung->order='REM_TGLKUNJUNGAN ASC';
			$modelPengunjung = new CActiveDataProvider('Rekammedik', array(
				'criteria'=>$criteriaPengunjung,
			));	
			$this->renderPartial('_daftarPengunjung',array('modelPengunjung'=>$modelPengunjung));
			Yii::app()->end();
		}
		$criteria=new CDbCriteria;
		$criteria->compare('REMTU_NAMA','Poliklinik',true);
		$daftarPoliklinik = Rekammediktujuan::model()->findAll($criteria);
		$remtu = new Rekammediktujuan('search');
		$this->render('logPengunjung',array('daftarPoliklinik'=>$daftarPoliklinik,'remtu'=>$remtu));
	}
	
	public function actionPemeriksaanAwal($id, $tglkunjungan){
		$model=$this->loadModel($id, $tglkunjungan);
		if(isset($_POST['Rekammedik']))
		{
			$model->attributes=$_POST['Rekammedik'];
			$model->REM_TEKANANDARAH=$_POST['sistolik'].'/'.$_POST['diastolik'];
			if($model->validate() && $model->save())
				echo 'Penambahan pemeriksaan awal berhasil!';
		}
		$this->renderPartial('pemeriksaanAwal',array(
			'model'=>$model,
		));
	}
	
	public function actionPemeriksaanLanjutan($id, $tglkunjungan){
		$model=$this->loadModel($id, $tglkunjungan);
		$modeldok=new Dokter;
		$modeldok->attributes=Dokter::model()->getAttributes();
		if(isset($_POST['Rekammedik']))
		{
			$model->attributes=$_POST['Rekammedik'];
			if($model->validate() && $model->save()){
				echo 'Penambahan pemeriksaan awal berhasil!';
				Yii::app()->end();
			}
		}
		$this->renderPartial('pemeriksaanLanjutan',array(
			'model'=>$model,'modeldok'=>$modeldok,
		));
	}
	
	public function actionDetail($id,$tglkunjungan)
	{
		$model=$this->loadModel($id,$tglkunjungan);

		$this->renderPartial('detailRekammedik',array(
			'model'=>$this->loadModel($id,$tglkunjungan),
		));
	}
	
	public function actionLayanan($id,$tglkunjungan)
	{
		$model= new RjLayanan('search');
		$model->PAS_NOREKAMMEDIK=$id;
		$model->REM_TGLKUNJUNGAN=$tglkunjungan;		
		$this->renderPartial('detailLayanan',array(
			'model'=>$model,
		));
	}
	
	public function actionDetailHasilLayananRJ($id,$tglkunjungan,$idlayanan){
		$model= new RjLayanan('search');
		if($idlayanan==1){
			$modelHasil = HasilFisioterapi::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan,'LAY_IDLAYANAN'=>$idlayanan));
		} else if($idlayanan==2){
			$modelHasil = HasilElektrokardiografi::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan,'LAY_IDLAYANAN'=>$idlayanan));
		} else if($idlayanan==3){
			$modelHasil = HasilRontgen::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan,'LAY_IDLAYANAN'=>$idlayanan));
		} else if($idlayanan==4){
			$modelHasil = HasilUsg::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan,'LAY_IDLAYANAN'=>$idlayanan));
		} else if($idlayanan==5){
			$modelHasil = HasilDarah::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan,'LAY_IDLAYANAN'=>$idlayanan));
		} else if($idlayanan==6){
			$modelHasil = HasillabDarahkimia::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan,'LAY_IDLAYANAN'=>$idlayanan));
		} else if($idlayanan==7){
			$modelHasil = HasilUrin::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan,'LAY_IDLAYANAN'=>$idlayanan));
		} else if($idlayanan==8){
			$modelHasil = HasilTinja::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan,'LAY_IDLAYANAN'=>$idlayanan));
		} else if($idlayanan==9){
			$modelHasil = HasilSptsecret::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan,'LAY_IDLAYANAN'=>$idlayanan));
		}
		$model->PAS_NOREKAMMEDIK=$id;
		$model->REM_TGLKUNJUNGAN=$tglkunjungan;
		
		$this->renderPartial('detailHasilLayananRJ',array('modelHasil'=>$modelHasil,'model'=>$model));
	}
	
	public function actionHapusHasilLayananRJ($id,$tglkunjungan,$idlayanan){
		$model = RjLayanan::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan,'LAY_IDLAYANAN'=>$idlayanan));
		$model->delete();
		$model=new RjLayanan('search');
		$model->PAS_NOREKAMMEDIK=$id;
		$model->REM_TGLKUNJUNGAN=$tglkunjungan;
		$model->RJL_STATUSPENANGANAN='Belum Ditangani';
		
		$this->renderPartial('daftarLayananRJ',array('model'=>$model));

	}
	
	
	public function actionRujukLayanan($id,$tglkunjungan)
	{
		$model=new RjLayanan;
		$model->PAS_NOREKAMMEDIK=$id;
		$model->REM_TGLKUNJUNGAN=$tglkunjungan;
		//$model->RIL_TGLLAYANAN=date('Y-m-d H:i:s');
		
		if(isset($_POST['RjLayanan']))
		{
			foreach($_POST['RjLayanan']['LAY_IDLAYANAN'] as $layanan){
				$model=new RjLayanan;
				$model->attributes=$_POST['RjLayanan'];
				$model->LAY_IDLAYANAN=$layanan;
				$model->RJL_TGLLAYANAN=date('Y-m-d H:i:s');
				$model->RJL_STATUSPENANGANAN='Belum Ditangani';
				$model->RJL_STATUSPEMBAYARAN='Belum Lunas';
				$model->RJL_STATUSBERKAS='Belum Diserahkan';
				$model->save();
			}
			//$this->redirect(array('view','id'=>$model->PAS_NOREKAMMEDIK,'tglkunjungan'=>$model->REM_TGLKUNJUNGAN));
		}

		$this->renderPartial('rujukLayanan',array(
			'model'=>$model,
		));
	}
	
	public function actionResep($id,$tglkunjungan)
	{
		$model=new ResepObat('search');
		$model->PAS_NOREKAMMEDIK=$id;
		$model->REM_TGLKUNJUNGAN=$tglkunjungan;
		// $kriteria = new CDbCriteria();
		// $kriteria->select = "*";
		// $kriteria->condition = "PAS_NOREKAMMEDIK=".$id." AND YEAR(REM_TGLKUNJUNGAN)=YEAR($tglkunjungan) AND MONTH(REM_TGLKUNJUNGAN)=MONTH($tglkunjungan) AND DAY(REM_TGLKUNJUNGAN)=DAY($tglkunjungan)";
		//$model = new CActiveDataProvider('ResepObat',array('criteria'=>$kriteria));
		$this->renderPartial('resep',array('model'=>$model));
	}
	
	public function actionDetailResep($id,$tglkunjungan,$kodeObat){
		$model = ResepObat::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan,'OBT_KODEOBAT'=>$kodeObat));
		$this->renderPartial('detailResep',array('model'=>$model));
	}
	
	public function actionHapusResep($id,$tglkunjungan,$kodeObat){
		$model = ResepObat::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan,'OBT_KODEOBAT'=>$kodeObat));
		$model->delete();
		$model=new ResepObat('search');
		$model->PAS_NOREKAMMEDIK=$id;
		$model->REM_TGLKUNJUNGAN=$tglkunjungan;
		$this->renderPartial('daftarResepObat',array('model'=>$model));
	}
	
	
	public function actionRujukResep($id,$tglkunjungan)
	{
		$model= new ResepObat();
		$model->APTREQ_NOMORORDER = "APT00001";
		$model->GFREQ_NOMORORDER = "GF00001";
		$model->PAS_NOREKAMMEDIK=$id;
		$model->REM_TGLKUNJUNGAN=$tglkunjungan;
		$model->RES_TANGGALRESEP=date('Y-m-d G:i:s');
		if(isset($_POST['ResepObat'])){
			$model->attributes = $_POST['ResepObat'];
			$model->RES_STATUSPEMBAYARAN ='Belum Lunas';
			$model->RES_TANGGALRESEP=date('Y-m-d G:i:s');
			$modelApt = AptObat::model()->findByAttributes(array('APTREQ_NOMORORDER'=>$model->APTREQ_NOMORORDER));
			if(!isset($modelApt)){
				$modelApt = new AptObat;
			}
			if($model->save()){
				$modelApt->APT_SISAOBAT = $modelApt->APT_SISAOBAT-$model->RES_JUMLAHOBAT;
				$modelApt->save(false);
				echo "berhasil";
			}
			
			Yii::app()->end();
		}
		$this->renderPartial('rujukResep',array(
			'model'=>$model,
		));
	}
	
	public function loadModel($id,$tglkunjungan){
		$model = Rekammedik::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
/////////////////////////////////////////////////////////////////////
	public function actionTesting($id, $tglkunjungan){
		//echo 'jawa ganteng';
		$model = Rekammedik::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
		$this->renderPartial('testing',array('model'=>$model,));
	}
////////////////////////////////////////////////////////////////////////
	public function actionBuatSuratSehat($id, $tglkunjungan){
		$model=Suratsehat::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
		$nomor = Suratsehat::model()->findAll();
		$dokter = Dokter::model()->findAll();
		$no = array();
		if($nomor==null){
			array_push($no, 0);
		}
		else{
			foreach ($nomor as $numbers) {  	
				list($rs , $num)= explode("." , $numbers->SU_NOSURATSEHAT);
				array_push($no, $num);
			}
		}
		if(!isset($model)){
			$model = new Suratsehat();
		}
		$rekammedik=Rekammedik::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
		if(isset($_POST['Suratsehat']))
		{
			$model->attributes=$_POST['Suratsehat'];
			$model->SU_STATUSLUNAS='Belum Lunas';
			$rekammedik->DOK_IDDOKTER=$_POST['DOK_IDDOKTER'];
			if($model->validate() && $model->save() && $rekammedik->save())
				$this->redirect(array('rekammedik/view','id'=>$model->PAS_NOREKAMMEDIK,'tglkunjungan'=>$model->REM_TGLKUNJUNGAN));
		}
		//$this->render('suratSehat', array('model'=>$model,'rekammedik'=>$rekammedik, 'no'=>(max($no))+1));
		$this->renderPartial('suratSehat',array('model'=>$model,'rekammedik'=>$rekammedik, 'no'=>(max($no))+1, 'dokter'=>$dokter));

	}
	
	public function actionRujukRawatInap($id,$tglkunjungan,$idpoli){
		$model = new RiDetail();
		$model->unsetAttributes();
		$model->PAS_NOREKAMMEDIK = $id;
		$model->REM_TGLKUNJUNGAN = $tglkunjungan;
		$model->RID_TGLMASUKKAMAR = date('Y-m-d G:i:s');
		$model->RID_STATUSRI = 'Rujuk';
		if($model->save(false)){
			$this->redirect(array('antrian','poliklinik'=>$idpoli));
		}
	}
	
	
	
}