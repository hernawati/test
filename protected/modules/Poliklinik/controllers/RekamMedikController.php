<?php

class RekamMedikController extends ModuleController
{
	
	public function actionIndex()
	{
		$this->redirect('index.php?r=pasien/index');
	}
	
public function loadModel($id,$tglkunjungan)
	{
		$model=Rekammedik::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$id,'REM_TGLKUNJUNGAN'=>$tglkunjungan));
		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}
	
public function actionView($id,$tglkunjungan)
	{
		$rjLayanan=new RjLayanan('search');
		$rjLayanan->PAS_NOREKAMMEDIK=$id;
		$rjLayanan->REM_TGLKUNJUNGAN=$tglkunjungan;

		if(isset($_GET['RjLayanan']))
			$riDetail->attributes=$_GET['RjLayanan'];

		$this->render('view',array(
			'model'=>$this->loadModel($id,$tglkunjungan),
			'rjLayanan'=>$rjLayanan,
		));
	}

public function actionUpdate($id,$tglkunjungan)
	{
		$model=$this->loadModel($id, $tglkunjungan);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Rekammedik']))
		{
			$model->attributes=$_POST['Rekammedik'];
			$model->REM_STATUSPEMBAYARAN=$_POST['Rekammedik']['REM_STATUSPEMBAYARAN'];
			$model->REMTU_ID=$_POST['Rekammedik']['REMTU_ID'];
			if($model->validate() && $model->save())
				$this->redirect(array('view','id'=>$model->PAS_NOREKAMMEDIK,'tglkunjungan'=>$model->REM_TGLKUNJUNGAN,'statusadmin'=>'true'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionDelete($id,$tglkunjungan)
	{
		$this->loadModel($id,$tglkunjungan)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax'])){
			$this->redirect(array('pasien/view','id'=>$id,'tglkunjungan'=>$tglkunjungan));
		}
	}
	
	public function actionAdmin($id=null,$tglkunjungan=null)
	{
		$model=new Rekammedik('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Rekammedik']))
			$model->attributes=$_GET['Rekammedik'];
			
		if(isset($id) && isset($tglkunjungan)){
			$model->PAS_NOREKAMMEDIK=$id;
			$model->REM_TGLKUNJUNGAN=$tglkunjungan;
		}

		$this->render('admin',array(
			'model'=>$model,
			'id'=>$id,
			'tglkunjungan'=>$tglkunjungan,
		));
	}
	
	public function actionCreate($id)
	{
		$model=new Rekammedik;
		$model->PAS_NOREKAMMEDIK=$id;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Rekammedik']))
		{
			$model->attributes=$_POST['Rekammedik'];
			$model->REM_STATUSPEMBAYARAN=$_POST['Rekammedik']['REM_STATUSPEMBAYARAN'];
			$model->REMTU_ID=$_POST['Rekammedik']['REMTU_ID'];
			//$model->REM_TEKANANDARAH = $_POST['sistolik'].'/'.$_POST['diastolik'];
			if(!isset($_POST['BUKANSAYA'])){
				$model->STF_IDSTAFF=Yii::app()->user->id;
			}
			if($model->validate() && $model->save())
				$this->redirect(array('view','id'=>$model->PAS_NOREKAMMEDIK,'tglkunjungan'=>$model->REM_TGLKUNJUNGAN,'statusadmin'=>'true'));
		}

		$this->render('create',array(
			'model'=>$model,
			'id'=>$id,
		));
	}
	

	public function actionLaporanPengunjung()
	{
		
		$model=new Rekammedik();
		
		$criteria=new CDbCriteria;
		
		$criteria->select ='*';
		$criteria->condition='YEAR(REM_TGLKUNJUNGAN) = YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN)=MONTH(NOW()) and DAY(REM_TGLKUNJUNGAN)=DAY(NOW())';
		$criteria->order='REM_TGLKUNJUNGAN';
		$modelcriteria=new CActiveDataProvider('Rekammedik',array('criteria'=>$criteria,
		));
	
		
		$this->render('laporanPengunjung',array(
			'modelcriteria'=>$modelcriteria,
		));

		Yii::app()->end();
		
		
	}

	public function actionCetak()
	{
		$host="localhost";
		$user="root";
		$pass="";
		$dbnm="sirs_060513";

		$conn=mysql_connect($host,$user,$pass);
		if($conn){
			$open=mysql_select_db($dbnm);
			if(!$open){
					die ("Database tidak dapat dibuka karena ".mysql_error());
				}
			} else {
			die ("Server MySQL tidak terhubung karena ".mysql_error());
		}
		
		$query = "SELECT REKAMMEDIK.PAS_NOREKAMMEDIK,REKAMMEDIK.REM_TGLKUNJUNGAN,PASIEN.PAS_NAMAPASIEN,PASIEN.PAS_STATUSPEMBAYARAN FROM REKAMMEDIK INNER JOIN PASIEN ON REKAMMEDIK.PAS_NOREKAMMEDIK=PASIEN.PAS_NOREKAMMEDIK WHERE YEAR(REM_TGLKUNJUNGAN) = YEAR(NOW()) and MONTH(REM_TGLKUNJUNGAN)=MONTH(NOW()) and DAY(REM_TGLKUNJUNGAN)=DAY(NOW()) ORDER BY REM_TGLKUNJUNGAN";
		$sql = mysql_query ($query);
		$data = array();
			while ($row = mysql_fetch_assoc($sql)) {
				array_push($data, $row);
			}
		
		$judul="LAPORAN JUMLAH PASIEN YANG BERKUNJUNG";
		$juduls="Rumah Sakit HKBP";
		// Move to the right
		//$judul->Cell(74);
		// Title
		
		// Line break
		
		$header = array(
			array("label"=>"NOMOR REKAM MEDIK", "length"=>50, "align"=>"C"),
			array("label"=>"TANGGAL KUNJUNGAN", "length"=>50, "align"=>"C"),
			array("label"=>"NAMA PASIEN", "length"=>40, "align"=>"C"),
			array("label"=>"STATUS PEMBAYARAN", "length"=>50, "align"=>"C")
			);
		require_once ("fpdf/fpdf.php");
		$pdf = new FPDF();
		$pdf->AddPage();
		 
		#tampilkan judul laporan
		$pdf->SetFont('Arial','B','13');
		$pdf->Cell(0,0, $judul, '0', 1, 'C');
		$pdf->Cell(0,20, $juduls, '0', 1, 'C');
		 
		#buat header tabel
		$pdf->SetFont('Arial','','8');
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(128,0,0);
		
		foreach ($header as $kolom) {
			$pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
			}
			
			$pdf->Ln();
			$pdf->SetFillColor(224,235,255);
			$pdf->SetTextColor(0);
			$pdf->SetFont('');
			$fill=false;
			$count=0;
		foreach ($data as $baris) {
			$i = 0;
			foreach ($baris as $cell) {
			$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
			$i++;
			}
			$count++;
			$fill = !$fill;
			$pdf->Ln();
			
		}

		$pdf->Cell(140,10,'Total Pengunjung',1);
		$pdf->Cell(50,10,$count,1);
		$pdf->Output(); 		
	}

	public function actionPemeriksaanAwal($id, $tglkunjungan){
		$model=$this->loadModel($id, $tglkunjungan);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		//$modelP=Pasien::model()->findByPk($id);

		if(isset($_POST['Rekammedik']))
		{
			$model->attributes=$_POST['Rekammedik'];
			$model->REM_TEKANANDARAH=$_POST['sistolik'].'/'.$_POST['diastolik'];
			//$modelP->PAS_GOLONGANDARAH=$_POST['Pasien']['PAS_GOLONGANDARAH'];
			//echo $model->REM_TEKANANDARAH;
			//die();
			if($model->validate() && $model->save())
				$this->redirect(array('rekamMedik/view','id'=>$model->PAS_NOREKAMMEDIK,'tglkunjungan'=>$model->REM_TGLKUNJUNGAN,'statusadmin'=>'true'));
		}

		$this->render('pemeriksaanAwal',array(
			'model'=>$model,
		));
	}

}