<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'Pasiens'=>array('index'),
	$model->PAS_NOREKAMMEDIK,
);
?>

<h1>Daftar Layanan <?php echo $model->PAS_NOREKAMMEDIK; ?></h1>

<?php
		echo HTML::link('Hapus',array('delete', 'id'=>$model->PAS_NOREKAMMEDIK,'tglkunjungan'=>$model->REM_TGLKUNJUNGAN));
		echo HTML::link('Ubah',array('update', 'id'=>$model->PAS_NOREKAMMEDIK,'tglkunjungan'=>$model->REM_TGLKUNJUNGAN));
		//echo HTML::link('Layanan Baru',array('create','id'=>$model->PAS_NOREKAMMEDIK,'tglkunjungan'=>$model->REM_TGLKUNJUNGAN));
		echo HTML::link('Rujuk Baru',array('rujuk','id'=>$model->PAS_NOREKAMMEDIK,'tglkunjungan'=>$model->REM_TGLKUNJUNGAN));
		echo HTML::link('Lihat Rekam Medik',array('rekammedik/view','id'=>$model->PAS_NOREKAMMEDIK,'tglkunjungan'=>$model->REM_TGLKUNJUNGAN,'statusadmin'=>'true'));
	echo '<br/>';
	echo '<br/>';
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'REM_TGLKUNJUNGAN',
	),
)); ?>
<hr/>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'PAS_NOREKAMMEDIK',
		'pasien.PAS_NAMAPASIEN',
		'pasien.PAS_STATUSPEMBAYARAN',
		'pasien.asuransi.ASR_NAMAASURANSI',
	),
)); ?>
<hr/>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'LAY_IDLAYANAN',
		'REM_TGLKUNJUNGAN',
		'layanan.LAY_NAMALAYANAN',
		'RJL_STATUSPENANGANAN',
		'RJL_STATUSPEMBAYARAN',
		'RJL_STATUSBERKAS',
		'RJL_PENERIMABERKAS',
	),
)); ?>
<br/>
<br/>
<h2>Hasil Layanan</h2>
<?php
	echo HTML::link('Cetak Form',array('cetakHasil','id'=>$model->LAY_IDLAYANAN,'norekammedik'=>$model->PAS_NOREKAMMEDIK,'tglkunjungan'=>$model->REM_TGLKUNJUNGAN));
	echo HTML::link('Hasil Cek',array('tambahHasil','id'=>$model->LAY_IDLAYANAN,'norekammedik'=>$model->PAS_NOREKAMMEDIK,'tglkunjungan'=>$model->REM_TGLKUNJUNGAN));
	echo '<br/>';
	echo '<br/>';
	if(isset($hasil)){
		$this->widget('zii.widgets.CDetailView', array(
			'data'=>$hasil,
		)); 
	}else{
		echo 'Belum ada hasil layanan';
	}
?>