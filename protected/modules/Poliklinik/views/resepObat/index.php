<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'ResepObat'=>array('index'),
	'Manage',
);

/*Yii::app()->clientScript->registerScript('search', "
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
");*/
?>

<h1>Daftar Resep Obat</h1>

<?php echo CHtml::link('Cari Lebih Lengkap','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rjlayanan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'OBT_KODEOBAT',
		'GF_TGLPEMBELIAN',
		'APT_TANGGALMASUK',
		'PAS_NOREKAMMEDIK',
		'REM_TGLKUNJUNGAN',
		'RES_TANGGALRESEP',
		'RES_JUMLAHOBAT',
		'RES_SATUANKONSUMSI',
		'RES_DOSISKONSUMSI',
		'RES_STATUSPEMBAYARAN',
		array(
			'class'=>'CLinkColumn',
			'label'=>'Lihat',
			'header'=>'Detail',
			'urlExpression'=>'array("view","kodeobat"=>$data->OBT_KODEOBAT,"tglpembelian"=>$data->GF_TGLPEMBELIAN,"tglmasuk"=>$data->APT_TANGGALMASUK,"norekammedik"=>$data->PAS_NOREKAMMEDIK,"tglkunjungan"=>$data->REM_TGLKUNJUNGAN,"tglresep"=>$data->RES_TANGGALRESEP)',
		),
	),
)); ?>
