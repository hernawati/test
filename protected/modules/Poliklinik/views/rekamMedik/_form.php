<?php
/* @var $this PasienController */
/* @var $model Pasien */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rekammedik-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Kolom yang ditandai dengan <span class="required">*</span> harus diisi.</p>
	<hr/>
	
	<?php echo $form->errorSummary($model); ?>
<table>
	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'PAS_NOREKAMMEDIK'); ?>
		</td>
	
		<td><?php echo $form->textField($model,'PAS_NOREKAMMEDIK',array('value'=>$model->PAS_NOREKAMMEDIK,'readonly'=>'readonly')); ?>
		<?php echo $form->textField($model,'pasien.PAS_NAMAPASIEN',array('value'=>$model->pasien->PAS_NAMAPASIEN,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'PAS_NOREKAMMEDIK'); ?></td>
	</div>
	</tr>
	
	<tr>
	<td><?php echo $form->labelEx($model,'REM_TGLKUNJUNGAN'); ?></td>
	<td><?php echo $form->textField($model,'REM_TGLKUNJUNGAN',array('value'=>isset($statusupdate)?$model->REM_TGLKUNJUNGAN:date('Y-m-d H:i:s'))); ?></td>
	</tr>
	
	<tr>
	<td>
	<div class="row">
		<?php echo $form->labelEx($model,'REM_STATUSPASIEN'); ?></td>
		<td>
		<?php echo $form->dropDownList($model,'REM_STATUSPASIEN', array(
		'value' => array('BARU'=>'BARU','LAMA'=>'LAMA'))); ?>
		<?php echo $form->error($model,'REM_STATUSPASIEN'); ?>
	</div>
	</td>
	</tr>
	
	<tr>
	<td>
	<div class="row">
		<?php echo $form->labelEx($model,'REM_STATUSMASUK'); ?>
		</td>
		<td>
		<?php echo $form->dropDownList($model,'REM_STATUSMASUK', array(
		'value' => array('Belum Ditangani'=>'Belum Ditangani','Ditangani'=>'Ditangani','Sudah Ditangani'=>'Sudah Ditangani',))); ?>
		<?php echo $form->error($model,'REM_STATUSMASUK'); ?>
	</div></td>
	</tr>
	
	<tr>
	<td>
	<div class="row">
		<?php echo $form->labelEx($model,'Nama Staf'); ?></td>
		<td>
		<?php echo CHtml::checkBox('BUKANSAYA',false); ?> Bukan Saya<br/>
		<?php echo $form->dropDownList($model,'STF_IDSTAFF', CHtml::listData(Staff::model()->findAll(array('order'=>'STF_IDSTAFF')),'STF_IDSTAFF','STF_NAMASTAFF')); ?>
		<?php echo $form->error($model,'STF_IDSTAFF'); ?>
	</div>
	</td>
	</tr>
	
	<tr><td>
	<div class="row">
		<?php echo $form->labelEx($model,'REMTU_ID'); ?>
		</td>
		<td>
		<?php echo $form->dropdownlist($model,'REMTU_ID',CHtml::listData(Rekammediktujuan::model()->findAll(array('order' => 'REMTU_ID')),'REMTU_ID','REMTU_NAMA'));?></td>
		<?php echo $form->error($model,'REMTU_ID'); ?>
	</div></td>
	</tr>
	<tr><td><div class="row">
		<?php echo $form->labelEx($model,'REM_STATUSPEMBAYARAN')?></td>
		<td>
		<?php echo $form->dropDownList($model,'REM_STATUSPEMBAYARAN',array('Belum Lunas'=>'Belum Lunas','Lunas'=>'Lunas')); ?>
		<?php echo $form->error($model,'REM_STATUSPEMBAYARAN'); ?></td>
		</td>
	</tr>
	<tr><td><div class="row">
		<?php echo $form->labelEx($model,'REM_JENISPEMBAYARAN')?></td>
		<td>
		<?php echo $form->dropDownList($model,'REM_JENISPEMBAYARAN',array('UMUM'=>'Umum','ASURANSI'=>'Asuransi')); ?>
		<?php echo $form->error($model,'REM_JENISPEMBAYARAN'); ?></td>
		</td>
	</tr>
	
</table>
<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah'); 
			echo '&nbsp;&nbsp';
			echo CHtml::link('Batal',array('pasien/view','id'=>$model->PAS_NOREKAMMEDIK,));
			//echo CHtml::link('Batal',array('rekammedik/view','id'=>$model->PAS_NOREKAMMEDIK,'tglkunjungan'=>$model->REM_TGLKUNJUNGAN));
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->