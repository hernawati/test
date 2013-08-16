<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'Pasiens'=>array('index'),
	$model->PAS_NOREKAMMEDIK=>array('view','id'=>$model->PAS_NOREKAMMEDIK),
	'Update',
);
?>

<h1>Update Pasien <?php echo $model->PAS_NOREKAMMEDIK; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>