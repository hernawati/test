<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'Pasiens'=>array('index'),
	'Pasien '.$jenis,
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pasien-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Daftar Pasien <?php echo $jenis;?></h1>

<?php echo CHtml::link('Cari Lebih Lengkap','#',array('class'=>'search-button')); ?>
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
		'PAS_NAMAPASIEN',
		'PAS_TGLLAHIR',
		'PAS_PEKERJAAN',
		'PAS_ALAMAT',
		'PAS_JENISKELAMIN',
		'PAS_STATUSPEMBAYARAN',
		'PAS_TGLPENDAFTARAN',
		'ASR_IDASURANSI',
		array(
			'class'=>'CLinkColumn',
			'label'=>'Lihat',
			'header'=>'Detail',
			'urlExpression'=>'array("view","id"=>$data->PAS_NOREKAMMEDIK)',
		),
	),
)); ?>
