<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'RjLayanan'=>array('index'),
	'Rujuk',
);
?>

<h1>Rujuk Layanan</h1>

<script>
	$('#layanan-form').submit(function(){	
			var data=$("#layanan-form").serialize();
			$.post(
				'<?php echo Yii::app()->createAbsoluteUrl($this->route.'&id='.$model->PAS_NOREKAMMEDIK.'&tglkunjungan='.$model->REM_TGLKUNJUNGAN);?>',
				data,
				function(data){$('#popup').dialog('close')},
				'html');
		return false;
	});
</script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'layanan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Kolom yang ditandai dengan <span class="required">*</span> harus diisi.</p>
	<hr/>
	<?php echo $form->errorSummary($model); ?>
<table>
	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'PAS_NOREKAMMEDIK'); ?></td>
		<td><?php echo $form->textField($model,'PAS_NOREKAMMEDIK',array('readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'PAS_NOREKAMMEDIK'); ?></td>
	</div>
	</tr>

	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'REM_TGLKUNJUNGAN'); ?></td>
		<td><?php echo $form->textField($model,'REM_TGLKUNJUNGAN'); ?>
		<?php echo $form->error($model,'REM_TGLKUNJUNGAN'); ?></td>
	</div>
	</tr>
	<tr>
	<div class="row">
	<td><?php echo $form->labelEx($model,'LAY_IDLAYANAN'); ?></td>
		<td>
		<?php
			$Daftarlayanan=Layanan::model()->findAll(array('order'=>'LAY_IDLAYANAN'));
			foreach($Daftarlayanan as $layanan){
				echo '<input name="RjLayanan[LAY_IDLAYANAN][]" type="checkbox" value="'.$layanan->LAY_IDLAYANAN.'"/> '.$layanan->LAY_NAMALAYANAN.'<br/>';
			}
		?>
		</td>
	</div>
	</tr>

	<tr>
	<div class="row buttons">
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Rujuk':'Ubah'); ?>
	</div>
	</tr>
</table>
<?php $this->endWidget(); ?>

</div><!-- form -->