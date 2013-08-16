<?php
/* @var $this PasienController */
/* @var $data Pasien */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAS_NOREKAMMEDIK')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->PAS_NOREKAMMEDIK), array('view', 'p_nrm'=>$data->PAS_NOREKAMMEDIK,'r_tk'=>$data->REM_TGLKUNJUNGAN,'r_tmk'=>$data->RID_TGLMASUKKAMAR,'r_tl'=>$data->RIL_TGLLAYANAN)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('REM_TGLKUNJUNGAN')); ?>:</b>
	<?php echo CHtml::encode($data->REM_TGLKUNJUNGAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OBT_KODEOBAT')); ?>:</b>
	<?php echo CHtml::encode($data->OBT_KODEOBAT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GF_TGLPEMBELIAN')); ?>:</b>
	<?php echo CHtml::encode($data->GF_TGLPEMBELIAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('APT_TANGGALMASUK')); ?>:</b>
	<?php echo CHtml::encode($data->APT_TANGGALMASUK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RES_TANGGALRESEP')); ?>:</b>
	<?php echo CHtml::encode($data->RES_TANGGALRESEP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RES_JUMLAHOBAT')); ?>:</b>
	<?php echo CHtml::encode($data->RES_JUMLAHOBAT); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('RES_SATUANKONSUMSI')); ?>:</b>
	<?php echo CHtml::encode($data->RES_SATUANKONSUMSI); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('RES_DOSISKONSUMSI')); ?>:</b>
	<?php echo CHtml::encode($data->RES_DOSISKONSUMSI); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('RES_STATUSPEMBAYARAN')); ?>:</b>
	<?php echo CHtml::encode($data->RES_STATUSPEMBAYARAN); ?>
	<br />

	*/ ?>

</div>