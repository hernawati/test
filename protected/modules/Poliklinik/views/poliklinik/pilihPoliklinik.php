<?php
/* @var $this LayananController */
/* @var $model Layanan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pilihPoliklinik-form',
	'method'=>'GET',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Pilih Nama Poliklinik'); ?>
		
		<?php
			if(isset($_GET['Rekammedik']['REM_POLIKLINIKIGD'])){
				$model->REM_POLIKLINIKIGD=$_GET['Rekammedik']['REM_POLIKLINIKIGD'];
			}
			echo $form->dropDownList($model,'REM_POLIKLINIKIGD',CHtml::listData(Poliklinik::model()->findAll(), 'POL_IDPOLIKLINIK','POL_NAMAPOLIKLINIK'),array('value'=>'please select'));
		?>

		<?php echo $form->error($model,'REM_POLIKLINIKIGD'); ?>

	</div>
	



	<div class="row buttons">
		<?php echo CHtml::submitButton('Lihat Antrian'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->