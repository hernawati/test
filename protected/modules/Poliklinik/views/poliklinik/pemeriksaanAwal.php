<script>
		$('#rekammedik-form').submit(function(){	
				var data=$("#rekammedik-form").serialize();
				$.post(
					'<?php echo Yii::app()->createAbsoluteUrl($this->route.'&id='.$model->PAS_NOREKAMMEDIK.'&tglkunjungan='.$model->REM_TGLKUNJUNGAN);?>',
					data,
					function(data){$('#popup').dialog('close');},
					'html');
			return false;
		});
</script>
<h1>Pemeriksaan Awal</h1>
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
		<td><?php echo $form->labelEx($model,'REM_BERATBADAN')?></td>
		<td><?php echo $form->textField($model,'REM_BERATBADAN',array('size'=>40,'maxlength'=>3)); ?> Kg
		<?php echo $form->error($model,'REM_BERATBADAN'); ?></td>
	</div>
	</tr>
	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'REM_TINGGIBADAN')?></td>
		<td><?php echo $form->textField($model,'REM_TINGGIBADAN',array('size'=>40,'maxlength'=>3)); ?> Cm
		<?php echo $form->error($model,'REM_TINGGIBADAN'); ?></td>
	</div>
	</tr>
	<tr>
	<div class="row">
		<?php
			if(isset($model->REM_TEKANANDARAH)){
				$tekanandarah=explode('/',$model->REM_TEKANANDARAH);
			}
		?>
		<td><?php echo $form->labelEx($model,'REM_TEKANANDARAH')?></td>
		<td><?php echo $form->textField($model,'REM_TEKANANDARAH',array('size'=>4,'maxlength'=> 3, 'name'=>'sistolik','value'=>isset($tekanandarah[0])?$tekanandarah[0]:'')); ?> /
		<?php echo $form->textField($model,'REM_TEKANANDARAH',array('size'=>4,'maxlength'=> 3, 'name'=>'diastolik','value'=>isset($tekanandarah[1])?$tekanandarah[1]:'')); ?> mmHg
		<?php echo $form->error($model,'REM_TEKANANDARAH'); ?></td>
	</div>
	</tr>
	
	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'REM_AMNESA')?></td>
		<td><?php echo $form->textArea($model,'REM_AMNESA',array('cols'=>38)); ?> 
		<?php echo $form->error($model,'REM_AMNESA'); ?></td>
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