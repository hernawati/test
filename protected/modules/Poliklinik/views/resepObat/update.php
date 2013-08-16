<?php
/* @var $this RiLayananController */
/* @var $model RiLayanan */

$this->breadcrumbs=array(
	'RiLayanan'=>array('index'),
	$model->PAS_NOREKAMMEDIK=>array('view','kodeobat'=>$model->PAS_NOREKAMMEDIK),
	'Update',
);
?>

<h1>Update RiLayanan <?php echo $model->PAS_NOREKAMMEDIK; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>