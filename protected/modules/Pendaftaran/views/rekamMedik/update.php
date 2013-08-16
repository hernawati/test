<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'Pasiens'=>array('index'),
	$model->PAS_NOREKAMMEDIK=>array('view','id'=>$model->PAS_NOREKAMMEDIK),
	'Update',
);
?>
<h5>No. Rekammedik : <?php echo $model->PAS_NOREKAMMEDIK; ?></h5>
<h5>Tanggal Kunjungan : <?php echo $model->REM_TGLKUNJUNGAN; ?></h5>

<?php echo $this->renderPartial('_form', array('model'=>$model,'statusupdate'=>true)); ?>