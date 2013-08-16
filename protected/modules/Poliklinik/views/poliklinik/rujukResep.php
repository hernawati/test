<h1>Rujuk Resep Obat</h1>
<div class="form">
<script>
	$('#resepobat-form').submit(function(){	
			var data=$("#resepobat-form").serialize();
			$.post(		
				'<?php echo Yii::app()->createAbsoluteUrl($this->route.'&id='.$model->PAS_NOREKAMMEDIK.'&tglkunjungan='.$model->REM_TGLKUNJUNGAN);?>',
				data,
				function(data){$('#popup').dialog('close')},
				'html');
		return false;
	});
</script>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'resepobat-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Kolom yang ditandai dengan <span class="required">*</span> harus diisi.</p>
	<hr/>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'OBT_KODEOBAT'); ?>
		<?php echo $form->dropDownList($model,'OBT_KODEOBAT',CHtml::listData(Obat::model()->findAll(array('order'=>'OBT_KODEOBAT')),'OBT_KODEOBAT','OBT_NAMAOBAT')); ?>
		<?php echo $form->error($model,'OBT_KODEOBAT'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'REM_TGLKUNJUNGAN'); ?>
		<?php echo $form->textField($model,'REM_TGLKUNJUNGAN',array('value'=>$_GET['tglkunjungan'],'readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'REM_TGLKUNJUNGAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RES_TANGGALRESEP'); ?>
		<?php echo $form->textField($model,'RES_TANGGALRESEP'); ?>
		<?php echo $form->error($model,'RES_TANGGALRESEP'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'GF_PASIENTUJUANOBAT'); ?>
		<?php echo $form->dropDownList($model,'GF_PASIENTUJUANOBAT',array('Umum'=>'Umum', 'Askes'=>'Askes')); ?>
		<?php echo $form->error($model,'GF_PASIENTUJUANOBAT'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RES_JUMLAHOBAT'); ?>
		<?php echo $form->textField($model,'RES_JUMLAHOBAT'); ?>
		<?php echo $form->error($model,'RES_JUMLAHOBAT'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RES_SATUANKONSUMSI'); ?>
		<?php echo $form->textField($model,'RES_SATUANKONSUMSI'); ?>
		<?php echo $form->error($model,'RES_SATUANKONSUMSI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RES_DOSISKONSUMSI'); ?>
		<?php echo $form->textField($model,'RES_DOSISKONSUMSI'); ?>
		<?php echo $form->error($model,'RES_DOSISKONSUMSI'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Rujuk':'Ubah'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->