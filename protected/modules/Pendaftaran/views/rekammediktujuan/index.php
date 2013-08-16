<?php
/* @var $this RekammediktujuanController */
/* @var $model Rekammediktujuan */

$this->breadcrumbs=array(
	'Tujuan Rekam Medik'=>array('index'),
	'Manajemen',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#rekammediktujuan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Daftar Tujuan Rekam Medik</h1>

<?php echo CHtml::link('Cari Lebih Lengkap','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rekammediktujuan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'REMTU_ID',
		'REMTU_NAMA',
		'REMTU_KETERANGAN',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
