<?php
/* @var $this RekammediktujuanController */
/* @var $model Rekammediktujuan */

$this->breadcrumbs=array(
	'Tujuan Rekam Medik'=>array('index'),
	$model->REMTU_ID=>array('view','id'=>$model->REMTU_ID),
	'Ubah',
);
?>

<h1>Ubah Tujuan Rekam Medik <?php echo $model->REMTU_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>