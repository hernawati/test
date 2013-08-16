<?php
/* @var $this PasienController */
/* @var $model Pasien */
/* @var $form CActiveForm */

$this->breadcrumbs=array(
	'Resep Obat',
	'Tambah Resep Obat',
);
?>

<p class="note">Kolom yang ditandai dengan <span class="required">*</span> harus diisi.</p>
<hr/>
<div>
	<style>
		table tr th{
			border:1px solid white;
			text-align:center;
			padding:0;
		}
		table tr td input{
			font-size:8pt;
		}
	</style>
	<script>
		$(document).ready(function(){
			$count=0;
			$($("#template")).append($("#tr").clone()); 
			$("#tambah").click(function(){
				$($(".items #tr")[0]).before($($("#tr")[0]).clone());
				$($(".items #tr")[0]).addClass('hasDatepicker');
				$($(".items #GF_TGL_EXPIRED")[0]).removeAttr('id');
			});
		}); 
	</script>
	<script id="test">
	</script>
	<div style="display:none;">
	</div>
	<?php
		echo CHtml::link('Tambah Resep Obat',"#",array('id'=>'tambah'));
	?>
	<br/><br/>
	<?php $form=$this->beginWidget('CActiveForm', array(
									'id'=>'add-user-form', 
									'enableClientValidation'=>true, 
									'clientOptions'=>array(
									'validationOnSubmit'=>true,),))?>

	<table class="items" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th width="50">No Apotek</th>
				<th width="50">No Gudang Farmasi</th>
				<th width="50">Obat</th>
				<th width="50">Pasien Tujuan</th>
				<th width="50" style="display:none;">No Rekam Medik</th>
				<th width="50"style="display:none;">Tgl Kunjungan</th>
				<th width="50">Tgl Resep</th>
				<th width="50">Jumlah Obat</th>
				<th width="50">Satuan Konsumsi</th>
				<th width="50">Dosis Konsumsi</th>
				<th width="50">Status Pembayaran</th>
			</tr>
		</thead>
		<tbody>
			<tr id="tr">
				<td>
					<?php echo $form->dropDownList($model, 'APTREQ_NOMORORDER[]',CHtml::listData(AptObat::model()->findAll(array('order'=>'OBT_KODEOBAT')), 'OBT_KODEOBAT', 'APTREQ_NOMORORDER')); ?>
				</td>
				<td>
					<?php echo $form->dropDownList($model, 'GFREQ_NOMORORDER[]',CHtml::listData(AptObat::model()->findAll(array('order'=>'OBT_KODEOBAT')), 'OBT_KODEOBAT', 'GFREQ_NOMORORDER')); ?>
				</td>
				<td>
					<?php echo $form->dropDownList($model, 'OBT_KODEOBAT[]',CHtml::listData(AptObat::model()->findAll(array('order'=>'OBT_KODEOBAT')), 'OBT_KODEOBAT', 'OBT_NAMAOBAT')); ?>
				</td>
				<td>
					<?php echo $form->dropDownList($model,'GF_PASIENTUJUANOBAT[]',CHtml::listData(AptObat::model()->findAll(array('order'=>'OBT_KODEOBAT')), 'OBT_KODEOBAT', 'GF_PASIENTUJUANOBAT')); ?>
				</td>
				<td style="display:none;">
					<?php echo $form->textField($model,'PAS_NOREKAMMEDIK[]',array('value'=>$_GET['id'],'readonly'=>'readonly','size'=>40,'maxlength'=>10)); ?>
					
				</td>
				<td style="display:none;">
					<?php echo $form->textField($model,'REM_TGLKUNJUNGAN[]',array('value'=>$_GET['tglkunjungan'],'readonly'=>'readonly','size'=>40)); ?>
				</td>
				<td>
					<?php echo $form->textField($model,'RES_TANGGALRESEP[]',array('value'=>isset($_GET['TOM_TGLPEMBELIAN'])?$model->TOM_TGLPEMBELIAN:date('Y-m-d H:i:s'))); ?>
				</td>
				<td>
					<?php echo $form->textField($model,'RES_JUMLAHOBAT[]');?>
				</td>
				<td>
					<?php echo $form->textField($model,'RES_SATUANKONSUMSI[]');?>
				</td>
				<td>
					<?php echo $form->textField($model,'RES_DOSISKONSUMSI[]');?>
				</td>
				<td>
					<?php echo $form->textField($model,'RES_STATUSPEMBAYARAN[]');?>
				</td>
				
			</tr>
		</tbody>
	</table>
		<div class="row buttons" style="text-align:right;">
		<?php echo CHtml::submitButton("Selesai"); ?>
		<?php echo CHtml::link('Batal',array('index')); ?>
	</div>
	<?php $this->endWidget(); ?>
</div>