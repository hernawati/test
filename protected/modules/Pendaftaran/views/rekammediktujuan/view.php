<?php
/* @var $this RekammediktujuanController */
/* @var $model Rekammediktujuan */

$this->breadcrumbs=array(
	'Tujuan Rekam Medik'=>array('admin'),
	$model->REMTU_ID,
);

?>

<h1>Tujuan Rekam Medik<?php echo $model->REMTU_ID; ?></h1>
<?php
	echo HTML::link('Hapus',array('delete', 'id'=>$model->REMTU_ID));
	echo HTML::link('Ubah',array('update', 'id'=>$model->REMTU_ID));
	echo HTML::link('Tujuan Baru',array('create'));
	echo HTML::link('Daftar Tujuan',array('admin'));
?>
<br/>
<br/>
<br/>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'REMTU_ID',
		'REMTU_NAMA',
		'REMTU_KETERANGAN',
	),
)); ?>
