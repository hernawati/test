<?php
/* @var $this PasienController */
/* @var $data Pasien */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAS_NOREKAMMEDIK')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->PAS_NOREKAMMEDIK), array('view', 'id'=>$data->PAS_NOREKAMMEDIK)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ASR_IDASURANSI')); ?>:</b>
	<?php echo CHtml::encode($data->ASR_IDASURANSI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAS_NAMAPASIEN')); ?>:</b>
	<?php echo CHtml::encode($data->PAS_NAMAPASIEN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAS_TGLLAHIR')); ?>:</b>
	<?php echo CHtml::encode($data->PAS_TGLLAHIR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAS_PEKERJAAN')); ?>:</b>
	<?php echo CHtml::encode($data->PAS_PEKERJAAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAS_ALAMAT')); ?>:</b>
	<?php echo CHtml::encode($data->PAS_ALAMAT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAS_JENISKELAMIN')); ?>:</b>
	<?php echo CHtml::encode($data->PAS_JENISKELAMIN); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('PAS_STATUSPEMBAYARAN')); ?>:</b>
	<?php echo CHtml::encode($data->PAS_STATUSPEMBAYARAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAS_TGLPENDAFTARAN')); ?>:</b>
	<?php echo CHtml::encode($data->PAS_TGLPENDAFTARAN); ?>
	<br />

	*/ ?>

</div>