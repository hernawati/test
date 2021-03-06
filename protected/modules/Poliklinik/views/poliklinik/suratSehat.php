<script>
		$('#suratsehat-form').submit(function(){	
				var data=$("#suratsehat-form").serialize();
				$.post(
					$(this).attr('action'),
					data,
					function(data){$('#popup').dialog('close');},
					'html');
			return false;
		});
</script>
<?php
/* @var $this SuratsehatController */
/* @var $model Suratsehat */
/* @var $form CActiveForm */
?>

<h1>Pembuatan Surat Sehat</h1>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'suratsehat-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Kolom yang ditandai dengan <span class="required">*</span> harus diisi.</p>
	<hr/>
	
	<?php echo $form->errorSummary($model); ?>
	
<table style="font-weight:bold;font-size:12pt;">
	<tr>
		<div class="row">
			<td style="width:200px">
				Tanggal Kunjungan
				<br/><br/>
			</td>
			<td style="width:20px"> : </td>
			<td >
				<?php 
					echo $rekammedik->REM_TGLKUNJUNGAN;
				?>
				<br/><br/>
			</td style="width:100px">
		</div>
	</tr>
	<tr>
		<div class="row">
			<td style="width:200px">
				No Rekam Medik
			</td>
			<td style="width:20px"> : </td>
			<td >
				<?php 
					echo $rekammedik->PAS_NOREKAMMEDIK;
				?>
			</td style="width:100px">
		</div>
	</tr>
	<tr>
		<div class="row">
			<td style="width:200px">
				Nama<br/><br/>
			</td>
			<td style="width:20px"> : </td>
			<td >
				<?php 
					echo $rekammedik->pasien->PAS_NAMAPASIEN;
				?><br/><br/>
			</td style="width:100px">
		</div>
	</tr>
	<tr>
		<div class="row">
			<td style="width:200px">
				Umur
			</td>
			<td style="width:20px"> : </td>
			<td >
				<?php 
					$date=date_create($rekammedik->pasien->PAS_TGLLAHIR);
					echo date("Y")-date_format($date,"Y").' tahun';
				?>
			</td style="width:100px">
		</div>
	</tr>
	<tr>
		<div class="row">
			<td>
				Pekerjaan
			</td>
			<td> : </td>
			<td>
				<?php echo $rekammedik->pasien->PAS_PEKERJAAN; ?>
			</td>
		</div>
	</tr>
	<tr>
		<div class="row">
			<td>
				Alamat<br/><br/>
			</td>
			<td> : </td>
			<td>
				<?php echo $rekammedik->pasien->PAS_ALAMAT; ?><br/><br/>
			</td>
		</div>
	</tr>
	<tr>
		<div class="row">
			<td>
				Berat badan
			</td>
			<td> : </td>
			<td>
				<?php echo $rekammedik->REM_BERATBADAN; ?> Kg
			</td>
		</div>
	</tr>
	<tr>
		<div class="row">
			<td>
				Golongan Darah
			</td>
			<td> : </td>
			<td>
				<?php echo $rekammedik->pasien->PAS_GOLONGANDARAH; ?> 
			</td>
		</div>
	</tr>
	<tr>
		<div class="row">
			<td>
				Tekanan Darah
			</td>
			<td> : </td>
			<td>
				<?php echo $rekammedik->REM_TEKANANDARAH; ?> mmHg
			</td>
		</div>
	</tr>
	<tr>
		<div class="row">
			<td>
				Tinggi Badan
			</td>
			<td> : </td>
			<td>
				<?php echo $rekammedik->REM_TINGGIBADAN; ?> Cm
			</td>
		</div>
	</tr>
	<tr>
		<div class="row">
			<td>
				Dokter
			</td>
			<td> : </td>
			<td>
				<?php //echo $rekammedik->dokter['DOK_NAMADOKTER']; ?>
				<select name="DOK_IDDOKTER">
							<?php
								foreach($dokter as $dokter){
									echo "<option  value=".$dokter->DOK_IDDOKTER.">" .$dokter->DOK_NAMADOKTER;
								}
							?>
						</select>
			</td>
		</div>
	</tr>
</table>


<table>
	<tr>
		<div class="row">
			<td>
				<?php echo $form->labelEx($model,'PAS_NOREKAMMEDIK'); ?>
			</td>
			<td>
				<?php echo $form->textField($model,'PAS_NOREKAMMEDIK',array('size'=>20,'maxlength'=>10,'value'=>$rekammedik->PAS_NOREKAMMEDIK,'readonly'=>'readonly')); ?>
				<?php echo $form->textField($model,'PAS_NOREKAMMEDIK',array('size'=>20,'maxlength'=>10,'disabled'=>'disabled','value'=>$rekammedik->pasien->PAS_NAMAPASIEN,'readonly'=>'readonly')); ?>
				<?php echo $form->error($model,'PAS_NOREKAMMEDIK'); ?>
			</td>
		</div>
	</tr>
	<tr>
		<div class="row">
			<td>
				<?php echo $form->labelEx($model,'REM_TGLKUNJUNGAN'); ?>
			</td>
			<td>
				<?php echo $form->textField($model,'REM_TGLKUNJUNGAN',array('size'=>46,'maxlength'=>10,'readonly'=>'readonly','value'=>$rekammedik->REM_TGLKUNJUNGAN)); ?>
				<?php echo $form->error($model,'REM_TGLKUNJUNGAN'); ?>
			</td>
		</div>
	</tr>	
	<tr>
		<div class="row">
			<td>
				<?php echo $form->labelEx($model,'SU_NOSURATSEHAT'); ?>
			</td>
			<td>
				<?php 
				if($no<10){
					$nosurat = '000000'.$no;
				}
				else if($no<100){
					$nosurat = '00000'.$no;
				}
				else if($no<1000){
					$nosurat = '0000'.$no;
				}
				else if($no<10000){
					$nosurat = '000'.$no;
				}
				else if($no<100000){
					$nosurat = '00'.$no;
				}
				else if($no<1000000){
					$nosurat = '0'.$no;
				}
				else
					$nosurat = $no;
				$nosuratsehat = 'RSHKBP.'.$nosurat;echo $form->textField($model,'SU_NOSURATSEHAT',array('size'=>46,'maxlength'=>10,'value'=>$nosuratsehat)); ?>
				<?php echo $form->error($model,'SU_NOSURATSEHAT'); ?>
			</td>
		</div>
	</tr>
	<tr>
		<div class="row">
			<td>
				<?php echo $form->labelEx($model,'SU_STATUS'); ?>
			</td>
			<td>
				<?php echo $form->textField($model,'SU_STATUS',array('size'=>46,'maxlength'=>20)); ?>
				<?php echo $form->error($model,'SU_STATUS'); ?>
			</td>
		</div>
	</tr>
	<tr>
		<div class="row">
			<td>
				<?php echo $form->labelEx($model,'SU_TUJUAN'); ?>
			</td>
			<td>
				<?php echo $form->textArea($model,'SU_TUJUAN',array('rows'=>3, 'cols'=>34)); ?>
				<?php echo $form->error($model,'SU_TUJUAN'); ?>
			</td>
		</div>
	</tr>
	
	<tr>
		<div class="row">
			<td>
				<?php echo  !$model->isNewRecord?$form->labelEx($model,'SU_STATUSLUNAS'):''; ?>
			</td>
			<td>
				<?php echo !$model->isNewRecord?$model->SU_STATUSLUNAS:'';?>
			</td>
		</div>
	</tr>
</table>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Buat Surat Sehat' : 'Ubah'); ?>
		&nbsp;
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->