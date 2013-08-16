<?php
/* @var $this PasienController */
/* @var $model Pasien */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pasien-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Kolom yang ditandai dengan <span class="required">*</span> harus diisi.</p>
	<hr/>
	<?php echo $form->errorSummary($model); ?>
	
	<?php
	if($model['PAS_NOREKAMMEDIK']===null){
		$no = (string)max($temp)+1;
		if($no<10){
			$no = (string)date("Y").'.0000'.$no;
		}
		else if($no>9 && $no<100){
			$no = (string)date("Y").'.000'.$no;
		}
		
		else if($no>99 && $no<1000){
			$no = (string)date("Y").'.00'.$no;
		}
		
		else if($no>999 && $no<10000){
			$no = (string)date("Y").'.0'.$no;
		}
		else
			$no = (string)date("Y").'.'.$no;
	}
	?>

<table>
	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'PAS_NAMAPASIEN'); ?></td>
		<td><?php echo $form->textField($model,'PAS_NAMAPASIEN',array('size'=>60,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'PAS_NAMAPASIEN'); ?></td>
	</div>
	</tr>

	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'PAS_JENISKELAMIN'); ?></td>
		<td><?php echo $form->dropDownList($model, 'PAS_JENISKELAMIN',array('L'=>'Pria','W'=>'Wanita'),array('width'=>50)); ?>
		<?php echo $form->error($model,'PAS_JENISKELAMIN'); ?></td>
	</div>
	</tr>
	
	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'PAS_STATUSPEMBAYARAN'); ?></td>
		<td><?php echo $form->dropDownList($model, 'PAS_STATUSPEMBAYARAN',array('UMUM'=>'Umum','ASURANSI'=>'Asuransi'),array('width'=>50)); ?>
		<?php echo $form->error($model,'PAS_STATUSPEMBAYARAN'); ?></td>
	</div>
	</tr>
	
	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'ASR_IDASURANSI'); ?></td>
		<td><?php 
			$data=Asuransi::model()->findAll();
			$data[]=array('ASR_IDASURANSI'=>'','ASR_NAMAASURANSI'=>'Tidak Ada');
			echo $form->dropDownList($model, 'ASR_IDASURANSI',CHtml::listData($data, 'ASR_IDASURANSI', 'ASR_NAMAASURANSI'),array('width'=>50)); ?>
		<?php echo $form->error($model,'ASR_IDASURANSI'); ?></td>
	</div>
	</tr>

	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'PAS_TGLLAHIR'); ?></td>
		<td><?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model'=>$model,
			'attribute'=>'PAS_TGLLAHIR',
			'value'=>$model->PAS_TGLLAHIR,
			'options'=>array(
				'showAnim'=>'fold',
				'dateFormat'=>'yy-mm-dd',
				'changeMonth'=>'true',
				'changeYear'=>'true',
				'yearRange'=>date('Y')-120 . ':' . date('Y')),
			));
		?>
		<?php echo $form->error($model,'PAS_TGLLAHIR'); ?></td>
	</div>
	</tr>
	
	<tr>
	<div class="row">
		<td><?php echo $form->label($model,'PAS_GOLONGANDARAH'); ?></td>
		<td><?php echo $form->dropDownList($model,'PAS_GOLONGANDARAH',array(''=>' ','A'=>'A','B'=>'B','AB'=>'AB','O'=>'O'));?>
		<?php echo $form->error($model,'PAS_GOLONGANDARAH');?></td>
	</div>
	</tr>

	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'PAS_PEKERJAAN'); ?></td>
		<td><?php echo $form->textField($model,'PAS_PEKERJAAN',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'PAS_PEKERJAAN'); ?></td>
	</div>
	</tr>

	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'PAS_AGAMA'); ?></td>
		<td><?php echo $form->dropDownList($model,'PAS_AGAMA',array('Islam'=>'Islam','Katolik'=>'Katolik','Protestan'=>'Protestan','Hindu'=>'Hindu','Buddha'=>'Buddha','Konghuchu'=>'Konghuchu','Lainnya'=>'Lainnya')); ?>
		<?php echo $form->error($model,'PAS_AGAMA'); ?></td>
	</div>
	</tr>

	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'PAS_ALAMAT'); ?></td>
		<td><?php echo $form->textArea($model,'PAS_ALAMAT',array('rows'=>2, 'cols'=>50)); ?>
		<?php echo $form->error($model,'PAS_ALAMAT'); ?></td>
	</div>
	</tr>

	<tr>
	<div class="row buttons">
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah');
			echo '&nbsp;&nbsp';
			echo CHtml::link('Batal',array('admin'));
		?>
		</td>
	</div>
	</tr>
</table>
<?php $this->endWidget(); ?>

</div><!-- form -->