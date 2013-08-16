<fieldset id="pasien-ditangani">
<legend><?php echo $data->PAS_NOREKAMMEDIK; ?></legend>
<?php 
		$this->widget('zii.widgets.CDetailView', array(
			'data'=>$data,
			'attributes'=>array(
				'pasien.PAS_NAMAPASIEN',
				'REM_TGLKUNJUNGAN',
				'REM_AMNESA',
			),
		));
		//echo $data->PAS_NOREKAMMEDIK;
		//die();
	if($model=RjLayanan::model()->findByAttributes(array('PAS_NOREKAMMEDIK'=>$data->PAS_NOREKAMMEDIK,'REM_TGLKUNJUNGAN'=>$data->REM_TGLKUNJUNGAN))){
		echo HTML::ajaxLink('Detail',array('detail','id'=>$data->PAS_NOREKAMMEDIK,'tglkunjungan'=>$data->REM_TGLKUNJUNGAN),array(
				'update'=>'#popup',
			),array(
				'onclick'=>'$("#popup").html("Sedang membaca...");$("#popup").dialog("open");',
			));
		echo HTML::nonajaxLink('Selesai',array('selesai','id'=>$data->PAS_NOREKAMMEDIK,'tglkunjungan'=>$data->REM_TGLKUNJUNGAN,'idpoli'=>$data->REMTU_ID),array(
				'update'=>'#popup',
			),array(
				'onclick'=>'$("#popup").html("Sedang membaca...");$("#popup").dialog("open");',
			));
		echo HTML::nonajaxLink('Tunda',array('tunda','id'=>$data->PAS_NOREKAMMEDIK,'tglkunjungan'=>$data->REM_TGLKUNJUNGAN,'idpoli'=>$data->REMTU_ID),array(
				'update'=>'#popup',
			),array(
				'onclick'=>'$("#popup").html("Sedang membaca...");$("#popup").dialog("open");',
			));
			
		echo HTML::nonajaxLink('Rujuk rawat inap',array('rujukrawatinap','id'=>$data->PAS_NOREKAMMEDIK,'tglkunjungan'=>$data->REM_TGLKUNJUNGAN,'idpoli'=>$data->REMTU_ID),array(
				'update'=>'#popup',
			),array(
				'onclick'=>'$("#popup").html("Sedang membaca...");$("#popup").dialog("open");',
			));
		echo '<hr/>';
		echo HTML::ajaxLink('Periksa',array('PemeriksaanAwal','id'=>$data->PAS_NOREKAMMEDIK,'tglkunjungan'=>$data->REM_TGLKUNJUNGAN),array(
				'update'=>'#popup',
			),array(
				'onclick'=>'$("#popup").html("Sedang membaca...");$("#popup").dialog("open");',
			));
		echo '&nbsp;&nbsp;';
		echo HTML::ajaxLink('Periksa Lanjutan',array('pemeriksaanLanjutan','id'=>$data->PAS_NOREKAMMEDIK,'tglkunjungan'=>$data->REM_TGLKUNJUNGAN),array(
				'update'=>'#popup',
			),array(
				'onclick'=>'$("#popup").html("Sedang membaca...");$("#popup").dialog("open");',
			));
		echo '&nbsp;&nbsp;';
		echo HTML::ajaxLink('Layanan',array('layanan','id'=>$data->PAS_NOREKAMMEDIK,'tglkunjungan'=>$data->REM_TGLKUNJUNGAN),array(
				'update'=>'#popup',
			),array(
				'onclick'=>'$("#popup").html("Sedang membaca...");$("#popup").dialog("open");',
			));
		echo '&nbsp;&nbsp;';
		echo HTML::ajaxLink('Rujuk Layanan',array('rujukLayanan','id'=>$data->PAS_NOREKAMMEDIK,'tglkunjungan'=>$data->REM_TGLKUNJUNGAN),array(
				'update'=>'#popup',
			),array(
				'onclick'=>'$("#popup").html("Sedang membaca...");$("#popup").dialog("open");',
			));
		echo HTML::ajaxLink('Resep',array('resep','id'=>$data->PAS_NOREKAMMEDIK,'tglkunjungan'=>$data->REM_TGLKUNJUNGAN),array(
				'update'=>'#popup',
			),array(
				'onclick'=>'$("#popup").html("Sedang membaca...");$("#popup").dialog("open");',
			));
		echo HTML::ajaxLink('Rujuk Resep',array('rujukResep','id'=>$data->PAS_NOREKAMMEDIK,'tglkunjungan'=>$data->REM_TGLKUNJUNGAN),array(
				'update'=>'#popup',
			),array(
				'onclick'=>'$("#popup").html("Sedang membaca...");$("#popup").dialog("open");',
			));
	}else{
		echo HTML::ajaxLink('Detail',array('detail','id'=>$data->PAS_NOREKAMMEDIK,'tglkunjungan'=>$data->REM_TGLKUNJUNGAN),array(
				'update'=>'#popup',
			),array(
				'onclick'=>'$("#popup").html("Sedang membaca...");$("#popup").dialog("open");',
			));
		echo HTML::nonajaxLink('Selesai',array('selesai','id'=>$data->PAS_NOREKAMMEDIK,'tglkunjungan'=>$data->REM_TGLKUNJUNGAN,'idpoli'=>$data->REMTU_ID),array(
				'update'=>'#popup',
			),array(
				'onclick'=>'$("#popup").html("Sedang membaca...");$("#popup").dialog("open");',
			));
		echo HTML::nonajaxLink('Tunda',array('tunda','id'=>$data->PAS_NOREKAMMEDIK,'tglkunjungan'=>$data->REM_TGLKUNJUNGAN,'idpoli'=>$data->REMTU_ID),array(
				'update'=>'#popup',
			),array(
				'onclick'=>'$("#popup").html("Sedang membaca...");$("#popup").dialog("open");',
			));
		echo '<hr/>';
		echo HTML::ajaxLink('Periksa',array('PemeriksaanAwal','id'=>$data->PAS_NOREKAMMEDIK,'tglkunjungan'=>$data->REM_TGLKUNJUNGAN),array(
				'update'=>'#popup',
			),array(
				'onclick'=>'$("#popup").html("Sedang membaca...");$("#popup").dialog("open");',
			));
		echo '&nbsp;&nbsp;';
		echo HTML::ajaxLink('Periksa Lanjutan',array('pemeriksaanLanjutan','id'=>$data->PAS_NOREKAMMEDIK,'tglkunjungan'=>$data->REM_TGLKUNJUNGAN),array(
				'update'=>'#popup',
			),array(
				'onclick'=>'$("#popup").html("Sedang membaca...");$("#popup").dialog("open");',
			));
		echo '&nbsp;&nbsp;';
		echo HTML::ajaxLink('Layanan',array('layanan','id'=>$data->PAS_NOREKAMMEDIK,'tglkunjungan'=>$data->REM_TGLKUNJUNGAN),array(
				'update'=>'#popup',
			),array(
				'onclick'=>'$("#popup").html("Sedang membaca...");$("#popup").dialog("open");',
			));
		echo '&nbsp;&nbsp;';
		echo HTML::ajaxLink('Rujuk Layanan',array('rujukLayanan','id'=>$data->PAS_NOREKAMMEDIK,'tglkunjungan'=>$data->REM_TGLKUNJUNGAN),array(
				'update'=>'#popup',
			),array(
				'onclick'=>'$("#popup").html("Sedang membaca...");$("#popup").dialog("open");',
			));
	}
	if(isset($_GET['poliklinik']) && $_GET['poliklinik']=='002'){
		echo HTML::ajaxLink('Data Surat Sehat',array('buatsuratsehat','id'=>$data->PAS_NOREKAMMEDIK,'tglkunjungan'=>$data->REM_TGLKUNJUNGAN),array(
				'update'=>'#popup',
			),array(
				'onclick'=>'$("#popup").html("Sedang membaca...");$("#popup").dialog("open");',
			));
	}

//echo HTML::link('Data Surat Sehat',array('pasien/BuatSuratSehat', 'id'=>$model->PAS_NOREKAMMEDIK, 'tgl'=>$model->REM_TGLKUNJUNGAN));
?>
</fieldset>
<br/>


