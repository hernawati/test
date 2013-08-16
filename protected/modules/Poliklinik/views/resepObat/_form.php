<?php
/* @var $this PasienController */
/* @var $model Pasien */
/* @var $form CActiveForm */


?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'resep-obat-form',
	'enableAjaxValidation'=>false,
)); ?>

	
	<p class="note">Kolom dengan tanda<span class="required">*</span> harus diisi.</p>
<hr/>
	<?php echo $form->errorSummary($model); ?>
<table>
	<tr>
		<td style="width:235px;"><?php echo 'No. Rekam Medik'; ?></td>
		<td><?php echo ': '.$id; ?></td>		
	</tr>
	<tr>
		<td style="width:235px;"><?php echo 'Tgl. Kunjungan'; ?></td>
		<td><?php echo ': '.$tglkunjungan; ?></td>		
	</tr>
</table>
<table>
	<tr>
	<div class="row">
		<td><?php //echo $form->labelEx($model,'APTREQ_NOMORORDER'); ?></td>
		<td><?php //echo $form->dropDownList($model,'APTREQ_NOMORORDER',Chtml::listData(AptObat::model()->findAll(array('order'=>'OBT_KODEOBAT')),'OBT_KODEOBAT','APTREQ_NOMORORDER')); ?>
		<?php //echo $form->error($model,'APTREQ_NOMORORDER'); ?></td>
	</div>
	</tr>
	
	<tr>
	<div class="row">
		<td><?php //echo $form->labelEx($model,'GFREQ_NOMORORDER'); ?></td>
		<td><?php //echo $form->dropDownList($model,'GFREQ_NOMORORDER',Chtml::listData(AptObat::model()->findAll(array('order'=>'OBT_KODEOBAT')),'OBT_KODEOBAT','GFREQ_NOMORORDER')); ?>
		<?php //echo $form->error($model,'GFREQ_NOMORORDER'); ?></td>
	</div>
	</tr>
	
	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'OBT_KODEOBAT'); ?></td>
		<td><?php echo $form->dropDownList($model,'OBT_KODEOBAT',Chtml::listData(Obat::model()->findAll(array('order'=>'OBT_KODEOBAT')),'OBT_KODEOBAT','OBT_NAMAOBAT')); ?>
		<?php echo $form->error($model,'OBT_KODEOBAT'); ?></td>
	</div>
	</tr>

	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'GF_PASIENTUJUANOBAT'); ?></td>
		<td><?php echo $form->dropDownList($model,'GF_PASIENTUJUANOBAT',array('UMUM'=>'Umum','ASURANSI'=>'Asuransi')); ?>
		<?php echo $form->error($model,'GF_PASIENTUJUANOBAT'); ?></td>
	</div>
	</tr>

	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'RES_TANGGALRESEP'); ?></td>
		<td><?php 
		$h = date('H')+5;
		echo $form->textField($model,'RES_TANGGALRESEP',array('value'=>date('Y-m-d '.$h.':i:s'),'size'=>40));?>
		<?php echo $form->error($model,'RES_TANGGALRESEP'); ?></td>
	</div>
	</tr>

	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'RES_JUMLAHOBAT'); ?></td>
		<td><?php echo $form->textField($model,'RES_JUMLAHOBAT',array('size'=>40)); ?>
		<?php echo $form->error($model,'RES_JUMLAHOBAT'); ?></td>
	</div>
	</tr>

	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'RES_SATUANKONSUMSI'); ?></td>
		<td><?php echo $form->textField($model,'RES_SATUANKONSUMSI',array('size'=>40,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'RES_SATUANKONSUMSI'); ?></td>
	</div>
	</tr>

	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'RES_DOSISKONSUMSI'); ?></td>
		<td><?php echo $form->textField($model,'RES_DOSISKONSUMSI',array('size'=>40,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'RES_DOSISKONSUMSI'); ?></td>
	</div>
	</tr>

	<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'RES_STATUSPEMBAYARAN'); ?></td>
		<td><?php echo $form->dropDownList($model,'RES_STATUSPEMBAYARAN',array('Belum Lunas','Lunas'=>'Lunas')); ?>
		<?php echo $form->error($model,'RES_STATUSPEMBAYARAN'); ?></td>
	</div>
	</tr>

	<tr>
	<div class="row buttons">
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah'); ?>
		<?php echo CHtml::link('Batal',array('rekamMedik/view','id'=>$id,'tglkunjungan'=>$tglkunjungan)); ?></td>
	</div>
	</tr>
</table>
<?php $this->endWidget(); ?>
<hr/><br/>

<div style="text-align:left;">
	<?php
		echo HTML::link('Selesai',array('rekamMedik/view','id'=>$id,'tglkunjungan'=>$tglkunjungan));
	?>
	<br/><br/>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ri-kontrolobat-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'APTREQ_NOMORORDER',
		'GFREQ_NOMORORDER',
		'OBT_KODEOBAT',
		'GF_PASIENTUJUANOBAT',
		'RES_TANGGALRESEP',
		'RES_JUMLAHOBAT',
		'RES_SATUANKONSUMSI',
		'RES_DOSISKONSUMSI',
		'RES_STATUSPEMBAYARAN',
		array(
				'class'=>'CButtonColumn',
				'template'=>'{view}{update}{delete}',
				'buttons'=> array(
								'view'=>array('url'=>'Yii::app()->createUrl("resepobat/view", array("aptreq"=>$data->APTREQ_NOMORORDER,"gfreq"=>$data->GFREQ_NOMORORDER,"id"=>$data->PAS_NOREKAMMEDIK,"kodebarang"=>$data->INV_KODEBARANG,"tglkunjungan"=>$data->REM_TGLKUNJUNGAN,"tglmasuk"=>$data->RID_TGLMASUKKAMAR,"tglresep"=>$data->RIK_TANGGALRESEP))',),
								'update'=>array('url'=>'Yii::app()->createUrl("resepobat/update", array("aptreq"=>$data->APTREQ_NOMORORDER,"gfreq"=>$data->GFREQ_NOMORORDER,"id"=>$data->PAS_NOREKAMMEDIK,"kodebarang"=>$data->INV_KODEBARANG,"tglkunjungan"=>$data->REM_TGLKUNJUNGAN,"tglmasuk"=>$data->RID_TGLMASUKKAMAR,"tglresep"=>$data->RIK_TANGGALRESEP))',),
								'delete'=>array('url'=>'Yii::app()->createUrl("resepobat/delete", array("aptreq"=>$data->APTREQ_NOMORORDER,"gfreq"=>$data->GFREQ_NOMORORDER,"id"=>$data->PAS_NOREKAMMEDIK,"kodebarang"=>$data->INV_KODEBARANG,"tglkunjungan"=>$data->REM_TGLKUNJUNGAN,"tglmasuk"=>$data->RID_TGLMASUKKAMAR,"tglresep"=>$data->RIK_TANGGALRESEP))',),
							),
			),
	),
)); ?>

</div><!-- form -->