<?php
/* @var $this RekammediktujuanController */
/* @var $model Rekammediktujuan */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'REMTU_ID'); ?>
		<?php echo $form->textField($model,'REMTU_ID',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'REMTU_NAMA'); ?>
		<?php echo $form->textField($model,'REMTU_NAMA',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'REMTU_KETERANGAN'); ?>
		<?php echo $form->textArea($model,'REMTU_KETERANGAN',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Cari'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->