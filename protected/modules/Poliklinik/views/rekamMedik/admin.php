<?php
/* @var $this PasienController */
/* @var $model Pasien */

/*$this->breadcrumbs=array(
	'Pasiens'=>array('index'),
	'Manage',
);*/

$this->menu=array(
	array('label'=>'List Rekam Medik', 'url'=>array('index')),
	array('label'=>'Create Rekam Medik', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pasien-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Rekam Medik</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pasien-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'PAS_NOREKAMMEDIK',
		'REM_TGLKUNJUNGAN',
		'PEM_IDKOMPONENBAYAR',
		'STF_IDSTAFF',
		'DOK_IDDOKTER',
		/*'RJ__PAS_NO_REKAMMEDIK',
		'RJ__TGL_KUNJUNGAN',
		'AMNESA',
		'DIAGNOSA',
		'THERAPHY',
		'STATUS_PASIEN',
		'STATUS_MASUK',
		'STATUS_KELUAR',
		'POLIKLINIK_IGD',
		'BERATBADAN',
		'TEKANANDARAH',
		
		'JENIS_KELAMIN',
		'STATUS_PEMBAYARAN',
		'TGL_PENDAFTARAN',
		*/
		array(
			'class'=>'CButtonColumn',
			'header'=>'Aksi',
			'viewButtonUrl'=>'\'index.php?r=rekammedik/view&id=\'.$data->PAS_NOREKAMMEDIK.\'&id=\'.$data->REM_TGLKUNJUNGAN.\'&statusadmin=true\'',
		),
	),
)); ?>
