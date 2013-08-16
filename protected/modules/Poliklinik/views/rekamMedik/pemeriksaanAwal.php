<h1>Tambah Data Pemeriksaaan Awal</h1>


<?php
	//$PAS_NOREKAMMEDIK=$pasien['PAS_NOREKAMMEDIK'];
	//$PAS_GOLONGANDARAH=$modelP['PAS_GOLONGANDARAH'];
?>

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
		<td><?php echo $form->labelEx($model,'Nomor Rekam Medik Pasien'); ?></td>
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
		<td><?php echo $form->labelEx($model,'Nama Dokter')?></td>
		<td><?php echo $form->dropDownList($model,'DOK_IDDOKTER',CHtml::listData(Dokter::model()->findAll(array('order'=>'DOK_IDDOKTER')),'DOK_IDDOKTER','DOK_NAMADOKTER')); ?> 
		<?php echo $form->error($model,'DOK_IDDOKTER'); ?></td>
	</div>
	</tr>
	
	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'REM_BERATBADAN')?></td>
		<td><?php echo $form->textField($model,'REM_BERATBADAN',array('size'=>45,'maxlength'=>3)); ?> Kg
		<?php echo $form->error($model,'REM_BERATBADAN'); ?></td>
	</div>
	</tr>
	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'REM_TINGGIBADAN')?></td>
		<td><?php echo $form->textField($model,'REM_TINGGIBADAN',array('size'=>45,'maxlength'=>3)); ?> Cm
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
	<td>
	<div class="row">
		<?php echo $form->labelEx($model,'REM_AMNESA'); ?></td>
		<td>
		<?php echo $form->textArea($model,'REM_AMNESA',array('rows'=>3, 'cols'=>40)); ?>
		<?php echo $form->error($model,'REM_AMNESA'); ?>
	</div>
	</td>
	</tr>
	
	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'REM_DIAGNOSA')?></td>
		<td><?php echo $form->textArea($model,'REM_DIAGNOSA',array('cols'=>38)); ?> 
		<?php echo $form->error($model,'REM_DIAGNOSA'); ?></td>
	</div>
	</tr>
	
	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'REM_THERAPHY')?></td>
		<td><?php echo $form->textArea($model,'REM_THERAPHY',array('cols'=>38)); ?> 
		<?php echo $form->error($model,'REM_THERAPHY'); ?></td>
	</div>
	</tr>
	
	<tr>
	<div class="row buttons">
		<td><?php echo CHtml::submitButton(isset($model->REM_DIAGNOSA)?'Ubah' : 'Tambah'); 
			echo '&nbsp;&nbsp';
			echo CHtml::link('Batal',array('rekamMedik/view','id'=>$model->PAS_NOREKAMMEDIK,'tglkunjungan'=>$model->REM_TGLKUNJUNGAN,'statusadmin'=>'true'));
		?></td>
	</div>
	</tr>
</table>

<?php $this->endWidget(); ?>
</div>