<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'Pasien'=>array('index'),
	'Manajemen',
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

<h1>Daftar Pasien </h1>

<div style="text-align:right;">
<div style="text-align:right;">
<?php
	echo HTML::link('Tambah Pasien',array('create'));
	echo '<br/><br/>';
?>
</div>
</div>

<?php echo CHtml::link('Cari Lebih Lengkap','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php 
	$template='';
	$template.=Yii::app()->user->isBoleh('pasien','view')?' {view} ':'';
	$template.=Yii::app()->user->isBoleh('pasien','update')?' {update} ':'';
	$template.=Yii::app()->user->isBoleh('pasien','delete')?' {delete} ':'';
	
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pasien-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'PAS_NOREKAMMEDIK',
		'PAS_NAMAPASIEN',
		'PAS_JENISKELAMIN',
		'PAS_TGLLAHIR',
		'PAS_PEKERJAAN',
		'PAS_ALAMAT',
		'ASR_IDASURANSI',
		'PAS_STATUSPEMBAYARAN',
		//'PAS_TGLPENDAFTARAN',
		array(
			'class'=>'CButtonColumn',
			'header'=>'Aksi',
			'template'=>$template,
		),
	),
));

?>
