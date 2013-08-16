<?php
/* @var $this PasienController */
/* @var $model Pasien */

?>

<h1>Tambah Rekam Medik</h2>
<h3>No Rekam Medik Pasien : <?php echo $model->PAS_NOREKAMMEDIK;?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>