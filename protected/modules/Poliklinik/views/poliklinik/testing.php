<div class="form">
<script>
	$('#suratsehat-form').submit(function(){	
			var data=$("#suratsehat-form").serialize();
			alert('<?php echo Yii::app()->createAbsoluteUrl($this->route.'&id='.$model->PAS_NOREKAMMEDIK.'&tglkunjungan='.$model->REM_TGLKUNJUNGAN);?>');
			return false;
			$.post(		
				'<?php echo Yii::app()->createAbsoluteUrl($this->route.'&id='.$model->PAS_NOREKAMMEDIK.'&tglkunjungan='.$model->REM_TGLKUNJUNGAN);?>',
				data,
				function(data){$('#popup').dialog('close')},
				'html');
		return false;
	});
</script>

<?php $form=$this->beginWidget('CActiveForm', array('id'=>'suratsehat-form','enableAjaxValidation'=>false,)); ?>
	<p class="note">Kolom yang ditandai dengan <span class="required">*</span> harus diisi.</p>
	<hr/>
	<input type="text" name="nama"/>
		<input type="text" name="nim"/>
		<input type="submit" value="ok"/>
<?php $this->endWidget(); ?>

</div>