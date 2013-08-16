<?php
/* @var $this PasienController */
/* @var $model Pasien */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'PAS_NOREKAMMEDIK'); ?>
		<?php echo $form->textField($model,'PAS_NOREKAMMEDIK',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ASR_IDASURANSI'); ?>
		<?php echo $form->textField($model,'ASR_IDASURANSI',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PAS_NAMAPASIEN'); ?>
		<?php echo $form->textField($model,'PAS_NAMAPASIEN',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PAS_TGLLAHIR'); ?>
		<?php echo $form->textField($model,'PAS_TGLLAHIR'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PAS_PEKERJAAN'); ?>
		<?php echo $form->textField($model,'PAS_PEKERJAAN',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PAS_ALAMAT'); ?>
		<?php echo $form->textArea($model,'PAS_ALAMAT',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PAS_JENISKELAMIN'); ?>
		<?php echo $form->textField($model,'PAS_JENISKELAMIN',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PAS_STATUSPEMBAYARAN'); ?>
		<?php echo $form->textField($model,'PAS_STATUSPEMBAYARAN',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PAS_TGLPENDAFTARAN'); ?>
		<?php echo $form->textField($model,'PAS_TGLPENDAFTARAN'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->