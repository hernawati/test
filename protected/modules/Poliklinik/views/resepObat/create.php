<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'Pasien'=>array('index'),
	'Create',
);
?>

<h1>Tambah Resep Obat</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'id'=>$id,
			'tglkunjungan'=>$tglkunjungan)); ?>