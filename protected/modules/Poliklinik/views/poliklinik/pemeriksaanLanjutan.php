<script>
	$('#rekammedik-form').submit(function(){	
			var data=$("#rekammedik-form").serialize();
			$.post(
				'<?php echo Yii::app()->createAbsoluteUrl($this->route.'&id='.$model->PAS_NOREKAMMEDIK.'&tglkunjungan='.$model->REM_TGLKUNJUNGAN);?>',
				data,
				function(data){$('#popup').html(data);},
				'html');
		return false;
	});
</script>
<h1>Pemeriksaan Lanjutan</h1>
<div class="form" >
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
		<td><?php echo $form->labelEx($model,'PAS_NOREKAMMEDIK'); ?></td>
		<td><?php echo $form->textField($model,'PAS_NOREKAMMEDIK',array('value'=>$model->PAS_NOREKAMMEDIK,'readonly'=>'readonly')); ?>
		<?php echo $form->textField($model,'pasien.PAS_NAMAPASIEN',array('value'=>$model->pasien->PAS_NAMAPASIEN,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'PAS_NOREKAMMEDIK'); ?>
		</td>
	</div>
	</tr>
	
	<tr>
	<div class="row">
		<td><?php echo $form->label($model,'REM_TGLKUNJUNGAN'); ?>
		<td><?php echo $form->textField($model,'REM_TGLKUNJUNGAN',array('value'=>$_GET['tglkunjungan'],'size'=>45));?>
		<?php echo $form->error($model,'REM_TGLKUNJUNGAN');?></td>
	</div>
	</tr>
	
	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'REM_DIAGNOSA')?></td>
		<td><?php echo $form->textArea($model,'REM_DIAGNOSA',array('cols'=>40)); ?>
		<?php echo $form->error($model,'REM_DIAGNOSA'); ?></td>
	</div>
	</tr>
	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'REM_THERAPHY')?></td>
		<td><?php echo $form->textArea($model,'REM_THERAPHY',array('cols'=>40)); ?>
		<?php echo $form->error($model,'REM_THERAPHY'); ?></td>
	</div>
	</tr>
	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'REM_STATUSKELUAR')?></td>
		<td><?php echo $form->dropDownList($model,'REM_STATUSKELUAR',array('Pulang'=>'Pulang','Rawat Inap'=>'Rawat Inap','Meninggal'=>'Meninggal')); ?>
		<?php echo $form->error($model,'REM_STATUSKELUAR'); ?></td>
	</div>
	</tr>
	
	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'Nama Dokter')?></td>
		<td><?php echo $form->dropDownList($model,'DOK_IDDOKTER',CHtml::listData(Dokter::model()->findAll(),'DOK_IDDOKTER','DOK_NAMADOKTER')); ?>
		<?php echo $form->error($modeldok,'DOK_IDDOKTER'); ?></td>
	</div>
	</tr>
	
	<tr>
	<div class="row buttons">
		<td><?php echo CHtml::submitButton(isset($model->REM_DIAGNOSA)?'Ubah' : 'Tambah'); ?></td>
	</div>
	</tr>
	
</table>

<?php $this->endWidget(); ?>
</div>