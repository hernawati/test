<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'RiLayanan'=>array('index'),
	$model->PAS_NOREKAMMEDIK,
);
?>

<h1>Resep Obat Pasien <?php echo $model->PAS_NOREKAMMEDIK; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'OBT_KODEOBAT',
		'TOM_TGLPEMBELIAN',
		'TOM_PASIENTUJUANOBAT',
		'PAS_NOREKAMMEDIK',
		'REM_TGLKUNJUNGAN',
		'RES_TANGGALRESEP',
		'RES_JUMLAHOBAT',
		'RES_SATUANKONSUMSI',
		'RES_DOSISKONSUMSI',
	),
)); ?>
