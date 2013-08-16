<?php
/* @var $this RekammediktujuanController */
/* @var $model Rekammediktujuan */

$this->breadcrumbs=array(
	'Tujuan Rekam Medik'=>array('admin'),
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

<h1>Manajemen Tujuan Rekam Medik</h1>

<div style="text-align:right;">
<?php
	echo HTML::link('Tambah REMTU',array('create'));
	echo '<br/><br/>';
?>
</div>

<?php echo CHtml::link('Cari Lebih Lengkap','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
	$template='';
	$template.=Yii::app()->user->isBoleh('rekammediktujuan','view')?' {view} ':'';
	$template.=Yii::app()->user->isBoleh('rekammediktujuan','update')?' {update} ':'';
	$template.=Yii::app()->user->isBoleh('rekammediktujuan','delete')?' {delete} ':'';
	
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rekammediktujuan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array('header'=>'No','value'=>'$row+1'),
		'REMTU_ID',
		'REMTU_NAMA',
		'REMTU_KETERANGAN',
		array(
			'class'=>'CButtonColumn',
			'header'=>'Aksi',
			'template'=>$template,
		),
	),
)); ?>
