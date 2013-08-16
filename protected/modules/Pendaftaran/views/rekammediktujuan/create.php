<?php
/* @var $this RekammediktujuanController */
/* @var $model Rekammediktujuan */

$this->breadcrumbs=array(
	'Tujuan Rekam Medik'=>array('index'),
	'Tambah',
);
?>

<h1>Tambah Tujuan Rekam Medik</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>