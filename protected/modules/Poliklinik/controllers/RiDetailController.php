<?php

class RiDetailController extends ModuleController
{

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id, $tglkunjungan, $tglmasuk)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id, $tglkunjungan, $tglmasuk),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id=NULL,$tglkunjungan=NULL,$tglmask=null)
	{
		$model=new RiDetail;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->unsetAttributes(); 
		if(isset($_POST['RiDetail']))
		{
			$model->attributes=$_POST['RiDetail'];
			$model->RID_TGLMASUKKAMAR=$_POST['RiDetail']['RID_TGLMASUKKAMAR'];
			$model->RID_STATUSRI='Rujuk';
			if($model->save())
				$this->redirect(array('view','id'=>$model->PAS_NOREKAMMEDIK,'tglkunjungan'=>$model->REM_TGLKUNJUNGAN,'tglmasuk'=>$model->RID_TGLMASUKKAMAR,'statusadmin'=>'true'));
		}
		if(isset($id) && isset($tglkunjungan)){
			$this->render('create',array(
				'model'=>$model,
				'id'=>$id,
				'tglkunjungan'=>$tglkunjungan,
			));
		}else{
			$this->render('create',array(
				'model'=>$model,
			));
		}
	}

	public function actionRujuk($id,$tglkunjungan,$tglmasuk=null)
	{
		$model=new RiDetail;
		$tglmasuk=date('Y-m-d H:i:s');
		$model->unsetAttributes(); 
		if(isset($_POST['RiDetail']))
		{
			$model->attributes=$_POST['RiDetail'];
			$model->RID_TGLMASUKKAMAR=$_POST['RiDetail']['RID_TGLMASUKKAMAR'];
			$model->RID_STATUSRI='Rujuk';
			if($model->save())
				$this->redirect(array('view','id'=>$model->PAS_NOREKAMMEDIK,'tglkunjungan'=>$model->REM_TGLKUNJUNGAN,'tglmasuk'=>$model->RID_TGLMASUKKAMAR,'statusadmin'=>'true'));
		}
		$model->PAS_NOREKAMMEDIK=$id;
		$model->REM_TGLKUNJUNGAN=$tglkunjungan;
		$this->render('formRujuk',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id,$tglkunjungan,$tglmasuk)
	{
		$model=$this->loadModel($id,$tglkunjungan, $tglmasuk);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RiDetail'])){
			$model->attributes=$_POST['RiDetail'];
			$model->RID_TGLKELUARKAMAR=NULL;
			if($model->save(false)){
				$this->redirect(array("rawatInap/detailPasienRawatInap","id"=>$model->PAS_NOREKAMMEDIK,"tglkunjungan"=>$model->REM_TGLKUNJUNGAN,"tglmasuk"=>$model->RID_TGLMASUKKAMAR));
			}
		}

		if(isset($id) && isset($tglkunjungan)){
			$this->render('update',array(
				'model'=>$model,
				'id'=>$id,
				'tglkunjungan'=>$tglkunjungan,
			));
		}else{
			$this->render('update',array(
				'model'=>$model,
			));
		}
	}
	
	public function actionKeluar($id,$tglkunjungan,$tglmasuk)
	{
		$model=$this->loadModel($id,$tglkunjungan, $tglmasuk);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RiDetail'])){
			$model->attributes=$_POST['RiDetail'];
			$model->RID_STATUSRI='Tidak';
			if($model->save(false)){
				$this->redirect(array('riDetail/view','id'=>$id,'tglkunjungan'=>$tglkunjungan,'tglmasuk'=>$tglmasuk));
			}
		}

		if(isset($id) && isset($tglkunjungan)){
			$this->render('keluar',array(
				'model'=>$model,
				'id'=>$id,
				'tglkunjungan'=>$tglkunjungan,
			));
		}else{
			$this->render('update',array(
				'model'=>$model,
			));
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id, $tglkunjungan, $tglmasuk)
	{
		$this->loadModel($id, $tglkunjungan, $tglmasuk)->delete();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(array('rekamMedik/view','id'=>$id,'tglkunjungan'=>$tglkunjungan));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new RiDetail('search');
		$model->unsetAttributes(); 
		$dataProvider=new CActiveDataProvider('RiDetail');

		if(isset($_GET['RiDetail']))
			$model->attributes=$_GET['RiDetail'];

		$this->render('index',array(
			'dataProvider'=>$dataProvider,'model'=>$model,
		));


	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($id=NULL,$tglkunjungan=NULL)
	{
		$model=new RiDetail('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RiDetail']))
			$model->attributes=$_GET['RiDetail'];
		
		if(isset($id) && isset($tglkunjungan)){
			$model->PAS_NOREKAMMEDIK=$id;
			$model->REM_TGLKUNJUNGAN=$tglkunjungan;
		}

		$this->renderPartial('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionHari(){
		$kriteria = new CDbCriteria;
		$kriteria->select='*';
		$kriteria->condition = 'YEAR(REM_TGLKUNJUNGAN)=YEAR(NOW()) AND MONTH(REM_TGLKUNJUNGAN)=MONTH(NOW()) AND DAY(REM_TGLKUNJUNGAN)=DAY(NOW()) AND YEAR(RID_TGLMASUKKAMAR)=YEAR(NOW()) AND MONTH(RID_TGLMASUKKAMAR)=MONTH(NOW()) AND DAY(RID_TGLMASUKKAMAR)=DAY(NOW())';
		$kriteria->order='REM_TGLKUNJUNGAN ASC';
		$modelhari = new CActiveDataProvider('RiDetail', array(
				'criteria'=>$kriteria,
			));
		$this->renderPartial('hari',array('model'=>$modelhari));
	}
	
	public function actionBulan(){
		$kriteria = new CDbCriteria;
		$kriteria->select='*';
		$kriteria->condition = 'YEAR(REM_TGLKUNJUNGAN)=YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN)=MONTH(NOW()) AND YEAR(RID_TGLMASUKKAMAR)=YEAR(NOW()) AND MONTH(RID_TGLMASUKKAMAR)=MONTH(NOW())';
		$kriteria->order='REM_TGLKUNJUNGAN ASC';
		$modelBulan = new CActiveDataProvider('RiDetail', array(
				'criteria'=>$kriteria,
			));
		$this->renderPartial('bulan',array('model'=>$modelBulan));
	}
	
	public function actionTahun(){
		$kriteria = new CDbCriteria;
		$kriteria->select='*';
		$kriteria->condition = 'YEAR(REM_TGLKUNJUNGAN)=YEAR(NOW()) AND YEAR(RID_TGLMASUKKAMAR)=YEAR(NOW())';
		$kriteria->order='REM_TGLKUNJUNGAN ASC';
		$modelTahun = new CActiveDataProvider('RiDetail', array(
				'criteria'=>$kriteria,
			));
		$this->renderPartial('tahun',array('model'=>$modelTahun));
	}
	
	public function actionPrint($status){
		if($status=='hari'){
			$kriteria = new CDbCriteria;
			$kriteria->select='*';
			$kriteria->condition = 'YEAR(REM_TGLKUNJUNGAN)=YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN)=MONTH(NOW()) and DAY(REM_TGLKUNJUNGAN)=DAY(NOW()) AND YEAR(RID_TGLMASUKKAMAR)=YEAR(NOW()) AND MONTH(RID_TGLMASUKKAMAR)=MONTH(NOW()) and DAY(RID_TGLMASUKKAMAR)=DAY(NOW())';
			$kriteria->order='REM_TGLKUNJUNGAN ASC';
			$model = RiDetail::model()->findAll($kriteria);
		}else if($status=='bulan'){
			$kriteria = new CDbCriteria;
			$kriteria->select='*';
			$kriteria->condition = 'YEAR(REM_TGLKUNJUNGAN)=YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN)=MONTH(NOW()) AND YEAR(RID_TGLMASUKKAMAR)=YEAR(NOW()) AND MONTH(RID_TGLMASUKKAMAR)=MONTH(NOW())';
			$kriteria->order='REM_TGLKUNJUNGAN ASC';
			$model = RiDetail::model()->findAll($kriteria);
		} else if($status=='tahun'){
			$kriteria = new CDbCriteria;
			$kriteria->select='*';
			$kriteria->condition = 'YEAR(REM_TGLKUNJUNGAN)=YEAR(NOW()) AND YEAR(RID_TGLMASUKKAMAR)=YEAR(NOW())';
			$kriteria->order='REM_TGLKUNJUNGAN ASC';
			$model = RiDetail::model()->findAll($kriteria);
		}
		
		$pdf = Yii::app()->ePdf->HTML2PDF();
		$pdf->WriteHTML($this->renderPartial('document',array('model'=>$model), true));
		$pdf->Output();
	}
	
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return RiDetail the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id, $tglkunjungan, $tglmasuk)
	{
		$model=RiDetail::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan,'RID_TGLMASUKKAMAR'=>$tglmasuk));

		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');

		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param RiDetail $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pasien-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
