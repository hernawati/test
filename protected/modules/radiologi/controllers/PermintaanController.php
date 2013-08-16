<?php

class PermintaanController extends ModuleController
{	
	//************** ANTRIAN RAWAT JALAN *******
	public function actionAntrianRJ()
	{
		echo 'Antrian Rawat Jalan';
		// $model = new RjLayanan();
		
		// $criteriaAntrian = new CDbCriteria;
		// $criteriaAntrian->select='*';
		// $criteriaAntrian->condition='YEAR(REM_TGLKUNJUNGAN) = YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN)=MONTH(NOW()) and DAY(REM_TGLKUNJUNGAN)= DAY(NOW()) AND RJL_STATUSPENANGANAN=\'Belum Ditangani\' AND LAY_IDLAYANAN IN (1,2,3,4)';
		// $criteriaAntrian->order='REM_TGLKUNJUNGAN ASC';

		// $modelAntrian = new CActiveDataProvider('RjLayanan',array(
			// 'criteria'=>$criteriaAntrian,
		// ));			
		
		// $criteriaDitangani = new CDbCriteria;
		// $criteriaDitangani->select='*';
		// $criteriaDitangani->condition='YEAR(REM_TGLKUNJUNGAN) = YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN)=MONTH(NOW()) and DAY(REM_TGLKUNJUNGAN)= DAY(NOW()) AND RJL_STATUSPENANGANAN=\'Sedang Ditangani\' AND LAY_IDLAYANAN IN (1,2,3,4)';
		// $criteriaDitangani->order='REM_TGLKUNJUNGAN ASC';

		// $modelDitangani = new CActiveDataProvider('RjLayanan',array(
			// 'criteria'=>$criteriaDitangani,
		// ));			

		// $criteriaSudahDitangani = new CDbCriteria;
		// $criteriaSudahDitangani->select='*';
		// $criteriaSudahDitangani->condition='YEAR(REM_TGLKUNJUNGAN) = YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN)=MONTH(NOW()) and DAY(REM_TGLKUNJUNGAN)= DAY(NOW()) AND RJL_STATUSPENANGANAN=\'Sudah Ditangani\' AND LAY_IDLAYANAN IN (1,2,3,4)';
		// $criteriaSudahDitangani->order='REM_TGLKUNJUNGAN ASC';

		// $modelSudahDitangani = new CActiveDataProvider('RjLayanan',array(
			// 'criteria'=>$criteriaSudahDitangani,
		// ));			

		// $this->render('antrianRadiologiRJ',array('modelAntrian'=>$modelAntrian,'modelDitangani'=>$modelDitangani,'modelSudahDitangani'=>$modelSudahDitangani));
	}
	
	public function actionTanganiAntrianRJ($id,$tglkunjungan){
		echo 'Tangani Antrian Rawat Jalan';
		// $model = RjLayanan::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
		// $model->RJL_STATUSPENANGANAN="Sedang Ditangani";
		// if($model->save(false)){
			// $this->redirect(array('antrianRJ'));
		// }
	}
	
	public function actionBatalkanAntrianRJ($id,$tglkunjungan){
		echo 'Diganti jadi menghapus record';
		// $model = RjLayanan::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
		// $model->RJL_STATUSPENANGANAN="Batal Ditangani";
		// if($model->save(false)){
			// $this->redirect(array('antrianRJ'));
		// }
	}
	
	public function actionMasukHasilAntrianRJ($id,$tglkunjungan,$layanan){
		echo 'Diganti';
		//$this->redirect(array('RjLayanan/TambahHasil','norekammedik'=>$id,'tglkunjungan'=>$tglkunjungan,'idlayanan'=>$layanan));
	}

	public function actionSelesaiAntrianRJ($id,$tglkunjungan){
		echo 'Selesai ANtrian Rawat Jalan';
		// $model = RjLayanan::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
		// $model->RJL_STATUSPENANGANAN="Selesai Ditangani";
		// if($model->save(false)){
			// $this->redirect(array('antrianRJ'));
		// }
	}
	/****** RAWAT JALAN ******/
	
	
	/*********** ANTRIAN RAWAT INAP **********/
	public function actionAntrianRI()
	{
		echo 'Antrian Rawat Inap';
		// $model = new RjLayanan();
	
		// $criteriaAntrian = new CDbCriteria;
		// $criteriaAntrian->select='*';
		// $criteriaAntrian->condition='YEAR(RIL_TGLLAYANAN) = YEAR(NOW()) and MONTH(RIL_TGLLAYANAN)=MONTH(NOW()) and DAY(RIL_TGLLAYANAN)= DAY(NOW()) AND RIL_STATUSPENANGANAN=\'Belum Ditangani\' AND LAY_IDLAYANAN IN (1,2,3,4)';
		// $criteriaAntrian->order='RIL_TGLLAYANAN ASC';

		// $modelAntrian = new CActiveDataProvider('RjLayanan',array(
			// 'criteria'=>$criteriaAntrian,
		// ));			
		
		
		// $criteriaDitangani = new CDbCriteria;
		// $criteriaDitangani->select='*';
		// $criteriaDitangani->condition='YEAR(RIL_TGLLAYANAN) = YEAR(NOW()) and MONTH(RIL_TGLLAYANAN)=MONTH(NOW()) and DAY(RIL_TGLLAYANAN)= DAY(NOW()) AND RIL_STATUSPENANGANAN=\'Sedang Ditangani\' AND LAY_IDLAYANAN IN (1,2,3,4)';
		// $criteriaDitangani->order='RIL_TGLLAYANAN ASC';

		// $modelDitangani = new CActiveDataProvider('RjLayanan',array(
			// 'criteria'=>$criteriaDitangani,
		// ));			

		
		// $criteriaSudahDitangani = new CDbCriteria;
		// $criteriaSudahDitangani->select='*';
		// $criteriaSudahDitangani->condition='YEAR(RIL_TGLLAYANAN) = YEAR(NOW()) and MONTH(RIL_TGLLAYANAN)=MONTH(NOW()) and DAY(RIL_TGLLAYANAN)= DAY(NOW()) AND RIL_STATUSPENANGANAN=\'Sudah Ditangani\' AND LAY_IDLAYANAN IN (1,2,3,4)';
		// $criteriaSudahDitangani->order='RIL_TGLLAYANAN ASC';

		// $modelSudahDitangani = new CActiveDataProvider('RjLayanan',array(
			// 'criteria'=>$criteriaSudahDitangani,
		// ));			

		// $this->render('antrianRadiologiRI',array('modelAntrian'=>$modelAntrian,'modelDitangani'=>$modelDitangani,'modelSudahDitangani'=>$modelSudahDitangani));
	}

	public function actionTanganiAntrianRI($id,$tglkunjungan,$tglmasuk,$tgllayanan){
		echo 'Tangani Antrian Rawat Inap';
		// $model = RiLayanan::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan,'RID_TGLMASUKKAMAR'=>$tglmasuk,'RIL_TGLLAYANAN'=>$tgllayanan));
		// $model->RIL_STATUSPENANGANAN="Sedang Ditangani";
		// if($model->save(false)){
			// $this->redirect(array('antrianRJ'));
		// }
	}
	
	public function actionBatalkanAntrianRI($id,$tglkunjungan,$tglmasuk,$tgllayanan){
		echo 'Diganti jadi menghapus record';
		// $model = RiLayanan::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan,'RID_TGLMASUKKAMAR'=>$tglmasuk,'RIL_TGLLAYANAN'=>$tgllayanan));
		// $model->RIL_STATUSPENANGANAN="Batal Ditangani";
		// if($model->save(false)){
			// $this->redirect(array('antrianRJ'));
		// }
	}
	
	public function actionMasukHasilAntrianRI($id,$tglkunjungan,$tglmasuk,$tgllayanan,$layanan){
		echo 'Diganti';
		//$this->redirect(array('RiLayanan/TambahHasil','norekammedik'=>$id,'tglkunjungan'=>$tglkunjungan,'tglmasuk'=>$tglmasuk,'tgllayanan'=>$tgllayanan,'idlayanan'=>$layanan));
	}

	public function actionSelesaiAntrianRI($id,$tglkunjungan,$tglmasuk,$tgllayanan){
		echo 'Selesai Antrian Rawat Inap';
		// $model = RiLayanan::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan,'RID_TGLMASUKKAMAR'=>$tglmasuk,'RIL_TGLLAYANAN'=>$tgllayanan));
		// $model->RJL_STATUSPENANGANAN="Selesai Ditangani";
		// if($model->save(false)){
			// $this->redirect(array('antrianRJ'));
		// }
	}
	/****** RAWAT INAP ******/
	
}