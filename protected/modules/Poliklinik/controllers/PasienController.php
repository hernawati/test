<?php

class PasienController extends ModuleController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$rekammedik=new Rekammedik('search');
		$rekammedik->PAS_NOREKAMMEDIK=$id;
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'rekammedik'=>$rekammedik,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Pasien;
		
		$number = Pasien::model()->findAll();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		$temp = array();
	if($number==null){
		array_push($temp, 0);
	}
	else{
		foreach ($number as $numbers) {  
			
			list($thn , $num)= explode("." , $numbers->PAS_NOREKAMMEDIK);

			if($thn === date('Y'))
				array_push($temp, $num);
			else
				array_push($temp, 0);
		}
	}
		
	if($model['PAS_NOREKAMMEDIK']===null){
		$no = (string)max($temp)+1;
		if($no<10){
			$no = (string)date("Y").'.0000'.$no;
		}
		else if($no>9 && $no<100){
			$no = (string)date("Y").'.000'.$no;
		}
		
		else if($no>99 && $no<1000){
			$no = (string)date("Y").'.00'.$no;
		}
		
		else if($no>999 && $no<10000){
			$no = (string)date("Y").'.0'.$no;
		}
		else
			$no = (string)date("Y").'.'.$no;
	}
		if(isset($_POST['Pasien']))
		{
			$model->attributes=$_POST['Pasien'];
			$model->PAS_TGLPENDAFTARAN=date("Y-n-j H:i:s");
			$model->PAS_NOREKAMMEDIK=$no;
			$model->PAS_AGAMA=$_POST['Pasien']['PAS_AGAMA'];
			$model->PAS_GOLONGANDARAH=$_POST['Pasien']['PAS_GOLONGANDARAH'];
			if(isset($_POST['Pasien']['ASR_IDASURANSI']) && $_POST['Pasien']['ASR_IDASURANSI']==''){
				$model->ASR_IDASURANSI=NULL;
			}
			if($model->validate() && $model->save())
				$this->redirect(array('view','id'=>$model->PAS_NOREKAMMEDIK,'statusadmin'=>'true'));
		}

		$this->render('create',array(
			'model'=>$model,'number'=>$number,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pasien']))
		{
			$model->attributes=$_POST['Pasien'];
			$model->PAS_GOLONGANDARAH=$_POST['Pasien']['PAS_GOLONGANDARAH'];
			if(isset($_POST['Pasien']['ASR_IDASURANSI']) && $_POST['Pasien']['ASR_IDASURANSI']==''){
				$model->ASR_IDASURANSI=NULL;
			}
			if($model->validate() && $model->save())
				$this->redirect(array('view','id'=>$model->PAS_NOREKAMMEDIK,'statusadmin'=>'true'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	// public function actionIndex($jenis=NULL)
	// {	
		// $model=new Pasien('search');
		// $model->unsetAttributes();  // clear any default values
		// if(isset($jenis)){
			// if($jenis==='umum'){
				// $model->PAS_STATUSPEMBAYARAN='UMUM';
				// $jenis='Umum';
			// }else if($jenis==='asuransi'){
				// $model->PAS_STATUSPEMBAYARAN='ASURANSI';
				// $jenis='Asuransi';
			// }if($jenis==='bantuan'){
				// $model->PAS_STATUSPEMBAYARAN='BANTUAN';
				// $jenis='Bantuan';
			// }
		// }else{
			// $jenis='';
		// }

		// if(isset($_GET['Pasien']))
			// $model->attributes=$_GET['Pasien'];

		// $this->render('index',array(
			// 'model'=>$model,
			// 'jenis'=>$jenis,
		// ));
	// }

	/**
	 * Manages all models.
	 */
	public function actionAdmin($jenis=NULL)
	{
		$model=new Pasien('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($jenis)){
			if($jenis==='umum'){
				$model->PAS_STATUSPEMBAYARAN='UMUM';
				$jenis='Umum';
			}else if($jenis==='asuransi'){
				$model->PAS_STATUSPEMBAYARAN='ASURANSI';
				$jenis='Asuransi';
			}if($jenis==='bantuan'){
				$model->PAS_STATUSPEMBAYARAN='BANTUAN';
				$jenis='Bantuan';
			}
		}
		if(isset($_GET['Pasien']))
			$model->attributes=$_GET['Pasien'];

		$this->render('admin',array(
			'model'=>$model,
			'statusadmin'=>true,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Pasien::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModel1($id)
	{
		$model1=Pasien::model()->findByPk($id);
		if($model1===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model1;
	}


	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pasien-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionBuatSuratSehat($id, $tgl){
		$model=Suratsehat::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tgl));
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
		$rekammedik=Rekammedik::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tgl));
		if(isset($_POST['Suratsehat']))
		{
			$model->attributes=$_POST['Suratsehat'];
			$model->SU_STATUSLUNAS='Belum Lunas';
			if($model->validate() && $model->save())
				$this->redirect(array('rekammedik/view','id'=>$model->PAS_NOREKAMMEDIK,'tglkunjungan'=>$model->REM_TGLKUNJUNGAN));
		}
		$this->render('suratSehat', array('model'=>$model,'rekammedik'=>$rekammedik, 'no'=>(max($no))+1, 'dokter'=>$dokter));
	}
	

	// public function actionCetakSuratSehat(){
			// $suratsehat = new Suratsehat();
			// $status = $_POST['status'];
			// $tujuan = $_POST['tujuan'];
			// $PAS_NOREKAMMEDIK = $_POST['PAS_NOREKAMMEDIK'];
				

			// //Simpan ke Database
			
			// $suratsehat->SU_NOSURATSEHAT = $PAS_NOREKAMMEDIK;
			// $suratsehat->SU_STATUS = $status;
			// $suratsehat->SU_TUJUAN = $tujuan;
			// $suratsehat->PAS_NOREKAMMEDIK = $PAS_NOREKAMMEDIK;
			// $suratsehat->save();

			// //cetak ke pdf
			// $kartu = new KartuSuratSehat;
			// $this->redirect(array('pasien/cetakpdfsuratsehat', 'norekammedik'=>$PAS_NOREKAMMEDIK, 'status'=>$_POST['status'], 'tujuan'=>$_POST['tujuan'], 'beratbadan'=>$_POST['REM_BERATBADAN'], 'golongandarah'=> $_POST['PAS_GOLONGANDARAH'], 'tekanandarah'=>$_POST['REM_TEKANANDARAH'], 'dokter'=>$_POST['dokter'], 'umur'=>$_POST['umur']));

		// }
		
	public function actionPrint($id){
		$pdf = new KartuPasien('P', 'mm',array(210,108));
		$model=Pasien::model()->findByPk($id);
		$this->renderPartial('kartupasien', array('pdf'=>$pdf, 'model'=>$model ));
	}

	public function actionCetakPdfSuratSehat($id,$tglkunjungan=NULL){
		if(isset($tglkunjungan)){ // cetak dari rekammedik
			$suratsehat=Suratsehat::model()->with(array('rekammedik','rekammedik.pasien','rekammedik.dokter'))->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
			if(isset($suratsehat->SU_STATUSLUNAS) && $suratsehat->SU_STATUSLUNAS=='Lunas'){
				$kartu = new KartuSuratSehat;
				$this->renderPartial('surat', array('suratsehat'=>$suratsehat,'kartu'=>$kartu));
			}else{
				$this->redirect(array('rekammedik/view','id'=>$id,'tglkunjungan'=>$tglkunjungan));
			}
		}else{ // cetak dari keuangan
			$suratsehat=Suratsehat::model()->with(array('rekammedik','rekammedik.pasien','rekammedik.dokter'))->findByAttributes(array('SU_ID'=>$id));
			if(isset($suratsehat->SU_STATUSLUNAS) && $suratsehat->SU_STATUSLUNAS=='Lunas'){
				$kartu = new KartuSuratSehat;
				$this->renderPartial('surat', array('suratsehat'=>$suratsehat,'kartu'=>$kartu));
			}else{
				$this->redirect(array('detailPermintaanSuratSehat/view','id'=>$id));
			}
		}
	}


	public function actionViewPasien($id)
	{
		$rekammedik1=new ResepObat('search');
		$rekammedik1->PAS_NOREKAMMEDIK=$id;
		
		$this->render('viewpasien',array(
			'model2'=>$this->loadModelResep($id),
			'model1'=>$this->loadModel1($id),
			'rekammedik1'=>$rekammedik1,
		));
	}

	public function actionViewPasien1($id)
	{
		$rekammedik2=new RiKontrolobat('search');
		$rekammedik2->PAS_NOREKAMMEDIK=$id;
		
		$this->render('viewpasien1',array(
			'model2'=>$this->loadModelRawat($id),
			'model1'=>$this->loadModel1($id),
			'rekammedik2'=>$rekammedik2,
		));
	}

		public function loadModelResep($id)
	{
		$model2=ResepObat::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id));
		if($model2===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model2;
	}

	public function loadModelRawat($id)
	{
		$model2=RiKontrolobat::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id));
		if($model2===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model2;
	}

	
}
