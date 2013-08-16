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
		<?php echo $form->labelEx($model,'APTREQ_NOMORORDER'); ?>
		<?php echo $form->textField($model,'APTREQ_NOMORORDER'); ?>
		<?php echo $form->error($model,'APTREQ_NOMORORDER'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'GFREQ_NOMORORDER'); ?>
		<?php echo $form->textField($model,'GFREQ_NOMORORDER'); ?>
		<?php echo $form->error($model,'GFREQ_NOMORORDER'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'OBT_KODEOBAT'); ?>
		<?php echo $form->textField($model,'OBT_KODEOBAT'); ?>
		<?php echo $form->error($model,'OBT_KODEOBAT'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'GF_PASIENTUJUANOBAT'); ?>
		<?php echo $form->textField($model,'GF_PASIENTUJUANOBAT'); ?>
		<?php echo $form->error($model,'GF_PASIENTUJUANOBAT'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PAS_NOREKAMMEDIK'); ?>
		<?php echo $form->textField($model,'PAS_NOREKAMMEDIK'); ?>
		<?php echo $form->error($model,'PAS_NOREKAMMEDIK'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'REM_TGLKUNJUNGAN'); ?>
		<?php echo $form->textField($model,'REM_TGLKUNJUNGAN'); ?>
		<?php echo $form->error($model,'REM_TGLKUNJUNGAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RES_TANGGALRESEP'); ?>
		<?php echo $form->textField($model,'RES_TANGGALRESEP'); ?>
		<?php echo $form->error($model,'RES_TANGGALRESEP'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RES_JUMLAHOBAT'); ?>
		<?php echo $form->textField($model,'RES_JUMLAHOBAT'); ?>
		<?php echo $form->error($model,'RES_JUMLAHOBAT'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RES_SATUANKONSUMSI'); ?>
		<?php echo $form->textArea($model,'RES_SATUANKONSUMSI'); ?>
		<?php echo $form->error($model,'RES_SATUANKONSUMSI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RES_DOSISKONSUMSI'); ?>
		<?php echo $form->textField($model,'RES_DOSISKONSUMSI'); ?>
		<?php echo $form->error($model,'RES_DOSISKONSUMSI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RES_STATUSPEMBAYARAN'); ?>
		<?php echo $form->textField($model,'RES_STATUSPEMBAYARAN'); ?>
		<?php echo $form->error($model,'RES_STATUSPEMBAYARAN'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->