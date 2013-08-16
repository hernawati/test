<?php
/* @var $this RekammediktujuanController */
/* @var $model Rekammediktujuan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rekammediktujuan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Kolom yang ditandai dengan <span class="required">*</span> harus diisi.</p>
	<hr/>
	<?php echo $form->errorSummary($model); ?>
	
	<table border="1>
	<div class="row"><tr>
		<td><?php echo $form->labelEx($model,'REMTU_ID'); ?></td>
		<td><?php echo $form->textField($model,'REMTU_ID',array('size'=>10,'maxlength'=>10)); ?></td>
		<td><?php echo $form->error($model,'REMTU_ID'); ?></td>
		</tr>
	</div>

	<div class="row"><tr>
		<td><?php echo $form->labelEx($model,'REMTU_NAMA'); ?></td>
		<td><?php echo $form->textField($model,'REMTU_NAMA',array('size'=>60,'maxlength'=>100)); ?></td>
		<td><?php echo $form->error($model,'REMTU_NAMA'); ?></td>
		</tr>
	</div>

	<div class="row"><tr>
		<td><?php echo $form->labelEx($model,'REMTU_KETERANGAN'); ?></td>
		<td><?php echo $form->textArea($model,'REMTU_KETERANGAN',array('rows'=>6, 'cols'=>50)); ?></td>
		<td><?php echo $form->error($model,'REMTU_KETERANGAN'); ?></td>
		</tr>
	</div>

	<div class="row buttons"><tr>
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah'); 
			echo '&nbsp;&nbsp';
			echo CHtml::link('Batal',array('admin'));
		?></td></tr>
	</div>
	</table>
<?php $this->endWidget(); ?>

</div><!-- form -->