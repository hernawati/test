<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'resepobat-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Kolom yang ditandai dengan <span class="required">*</span> harus diisi.</p>
	<hr/>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Obat'); ?>
		<?php echo $form->dropDownList($model,'OBT_KODEOBAT',CHtml::listData(APTObat::model()->findAll(array('order'=>'OBT_KODEOBAT')),'OBT_KODEOBAT','OBT_KODEOBAT')); ?>
		<?php echo $form->error($model,'OBT_KODEOBAT'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'REM_TGLKUNJUNGAN'); ?>
		<?php echo $form->textField($model,'REM_TGLKUNJUNGAN',array('value'=>$_GET['tglkunjungan'],'readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'REM_TGLKUNJUNGAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RES_TANGGALRESEP'); ?>
		<?php echo $form->textField($model,'RES_TANGGALRESEP',array('value'=>isset($_GET['TOM_TGLPEMBELIAN'])?$model->TOM_TGLPEMBELIAN:date('Y-m-d H:i:s'))); ?>
		<?php echo $form->error($model,'RES_TANGGALRESEP'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'RES_STATUSPEMBAYARAN'); ?>
		<?php echo $form->textField($model,'RES_STATUSPEMBAYARAN',array('Lunas'=>'Lunas', 'Belum Lunas'=>'Belum Lunas')); ?>
		<?php echo $form->error($model,'RES_STATUSPEMBAYARAN'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah'); ?>
		<?php echo CHtml::link('Batal',array('admin')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->