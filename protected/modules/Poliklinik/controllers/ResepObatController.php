<?php

class ResepObatController extends ModuleController
{

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($aptreq, $gfreq, $kodeobat, $pasientujuan, $id, $tglkunjungan, $tglresep)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($aptreq, $gfreq, $kodeobat, $pasientujuan, $id, $tglkunjungan, $tglresep),
		));
	}
	
	public function actionCreateRJ($id,$tglkunjungan)
	{
		$model=new ResepObat('search');
		$model->unsetAttributes();

		if(isset($_POST['ResepObat'])){
			$model->attributes=$_POST['ResepObat'];
			$model->PAS_NOREKAMMEDIK=$id;
			$model->REM_TGLKUNJUNGAN=$tglkunjungan;
			$model->save();
		}
		
		$this->render('create',array(
			'model'=>$model,
			'id'=>$id,
			'tglkunjungan'=>$tglkunjungan
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 
	public function actionCreate()
	{
		$model=new ResepObat;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ResepObat']))
		{
			$model->attributes=$_POST['ResepObat'];
			if($model->save())
				$this->redirect(array('admin','gfreq'=>$_GET['gfreq'],'kodeobat'=>$_GET['kodeobat'],'pasientujuan'=>$_GET['pasientujuan']));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}*/

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($aptreq, $gfreq, $kodeobat, $pasientujuan, $id, $tglkunjungan, $tglresep)
	{
		$model=$this->loadModel($aptreq, $gfreq, $kodeobat, $pasientujuan, $id, $tglkunjungan, $tglresep);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ResepObat'])){
			$model->attributes=$_POST['ResepObat'];
			//$model->save();
			if($model->save()){
				$this->redirect(array('riLayanan/view&gfreq=' . $_GET['gfreq'] . '&kodeobat=' . $_GET['kodeobat'] . '&pasientujuan=' . $_GET['pasientujuan'] . '&id=' . $_GET['id'] . '$tglkunjungan=' . $_GET['tglkunjungan'] . '$tglresep=' . $_GET['tglresep']));
			}
		}

		$this->render('update',array('model'=>$model,));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($aptreq, $gfreq, $kodeobat, $pasientujuan, $id, $tglkunjungan, $tglresep)
	{
		$this->loadModel($aptreq, $gfreq, $kodeobat, $pasientujuan, $id, $tglkunjungan, $tglresep)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new ResepObat('search');
		$modelApt=new AptObat('search');
		$model->unsetAttributes();
		if(isset($_GET['ResepObat']))
			$model->attributes=$_GET['ResepObat'];

		if(isset($_GET['AptObat'])){
			$modelApt->attributes=$_GET['AptObat'];


		}

		$dataProvider=new CActiveDataProvider('ResepObat');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,'model'=>$model,
		));
	}

	/*public function actionAdmin($id=null, $tglkunjungan=null, $tglresep=null)
	{
		$modelRes=new ResepObat('search');

		$modelRes->PAS_id=$gfreq;
		$modelRes->GF_kodeobat=$kodeobat;
		$modelRes->APT_TANGGALMASUK=$pasientujuan;

		if(isset($_GET['ResepObat'])){
			$modelRes->attributes=$_GET['ResepObat'];
		}
		
		$model=APTObat::model()->findByAttributes(array('OBT_gfreq'=>$gfreq,'GF_kodeobat'=>$kodeobat,'APT_TANGGALMASUK'=>$pasientujuan));

		//$model->APT_SISAOBAT=($model->APT_SISAOBAT)-($modelRes->RES_JUMLAHOBAT);

		//$model->save();

		$this->render('admin',array('modelRes'=>$modelRes));
	}*/
	public function actionAdmin($id, $tglkunjungan){
		$model=new ResepObat();
		$model->unsetAttributes();
		$model->PAS_NOREKAMMEDIK=$id;
		$model->REM_TGLKUNJUNGAN=$tglkunjungan;
		
		
		if(isset($_POST['ResepObat'])){
			$model->attributes=$_POST['ResepObat'];
		}
		
		$this->renderPartial('admin',array('model'=>$model));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ResepObat the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($aptreq, $gfreq, $kodeobat, $pasientujuan, $id, $tglkunjungan, $tglresep)
	{
		$model=ResepObat::model()->findByAttributes(array('APTREQ_NOMORORDER'=>$aptreq,'APTREQ_NOMORORDER'=>$gfreq,'OBT_KODEOBAT'=>$kodeobat,'GF_PASIENTUJUANOBAT'=>$pasientujuan,'PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan, 'RES_TANGGALRESEP'=>$tglresep));

		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');

		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ResepObat $model the model to be validated
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
