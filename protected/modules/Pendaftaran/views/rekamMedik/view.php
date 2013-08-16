<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'Rekam Medik'=>array('index'),
	$model->PAS_NOREKAMMEDIK,
);

?>

<h1>Detail Rekam Medik <?php echo $model->PAS_NOREKAMMEDIK; ?></h1>

<?php
	echo HTML::link('Hapus',array('delete', 'id'=>$model->PAS_NOREKAMMEDIK, 'tglkunjungan'=>$model->REM_TGLKUNJUNGAN));
	echo HTML::link('Ubah',array('update', 'id'=>$model->PAS_NOREKAMMEDIK, 'tglkunjungan'=>$model->REM_TGLKUNJUNGAN));
	echo HTML::link('Rekam Medik Baru',array('create', 'id'=>$model->PAS_NOREKAMMEDIK));
	echo HTML::link('Detail Pasien',array('pasien/view','id'=>$model->PAS_NOREKAMMEDIK));
?>
<br/>
<?php 
		$this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'PAS_NOREKAMMEDIK',
				'pasien.PAS_NAMAPASIEN',
				'REM_TGLKUNJUNGAN',
			),
		));	
?>
<hr/>
<?php 
		$this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'STF_IDSTAFF',
				'staf.STF_NAMASTAFF',
				'DOK_IDDOKTER',
				'dokter.DOK_NAMADOKTER',
			),
		));	
?>
<hr/>
<?php 
		$this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'tujuan.REMTU_NAMA',
				array('label'=>'Tinggi Badan','value'=>$model->REM_TINGGIBADAN.' Cm'),
				array('label'=>'Berat Badan','value'=>$model->REM_BERATBADAN.' Kg'),
				array('label'=>'Tekanan Darah','value'=>$model->REM_TEKANANDARAH.' mmHg '),
				'REM_AMNESA',
				'REM_DIAGNOSA',
				'REM_THERAPHY',
			),
		));	
?>
<hr/>

<?php 
		$this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'REM_STATUSPASIEN',
				'REM_STATUSMASUK',
				'REM_STATUSKELUAR',
				'REM_STATUSPEMBAYARAN',
				'REM_JENISPEMBAYARAN',
			),
		));	
?>
