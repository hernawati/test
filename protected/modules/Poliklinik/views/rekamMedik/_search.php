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
		<?php echo $form->label($model,'No Rekam Medik '); ?>
		<?php echo $form->textField($model,'PAS_NOREKAMMEDIK'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tanggal Kunjungan'); ?>
		<?php echo $form->textField($model,'REM_TGLKUNJUNGAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id Staff'); ?>
		<?php echo $form->textField($model,'STF_IDSTAFF',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id Dokter'); ?>
		<?php echo $form->textField($model,'DOK_IDDOKTER'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Amnesa'); ?>
		<?php echo $form->textField($model,'REM_AMNESA',array('size'=>60,'maxlength'=>255)); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->