<?php
/* @var $this PasienController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rekam Medik',
);

$this->menu=array(
	array('label'=>'Create Rekam Medik', 'url'=>array('create')),
	array('label'=>'Manage Rekam Medik', 'url'=>array('admin')),
);
?>

<h1>Rekam Medik</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
