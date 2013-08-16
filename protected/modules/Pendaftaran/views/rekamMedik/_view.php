<?php
/* @var $this PasienController */
/* @var $data Pasien */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nomor Rekam Medik')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->PAS_NOREKAMMEDIK), array('view', 'id'=>$data->PAS_NOREKAMMEDIK,'tglkunjungan'=>$data->REM_TGLKUNJUNGAN)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('Tanggal Kunjungan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->REM_TGLKUNJUNGAN), array('view', 'id'=>$data->REM_TGLKUNJUNGAN)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('Komponen Bayar')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->PEM_IDKOMPONENBAYAR), array('view', 'id'=>$data->PEM_IDKOMPONENBAYAR)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('ID Dokter')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->DOK_IDDOKTER), array('view', 'id'=>$data->DOK_IDDOKTER)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('ID Staff')); ?>:</b>
	<?php echo CHtml::encode($data->STF_IDSTAFF); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('REM_AMNESA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->REM_AMNESA), array('view', 'id'=>$data->REM_AMNESA)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('REM_DIAGNOSA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->REM_DIAGNOSA), array('view', 'id'=>$data->REM_DIAGNOSA)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('REM_THERAPHY')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->REM_THERAPHY), array('view', 'id'=>$data->REM_THERAPHY)); ?>
	<br />
	
	<b>
	<?php echo CHtml::encode($data->getAttributeLabel('STATUS PASIEN')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->REM_STATUSPASIEN), array('view', 'id'=>$data->REM_STATUSPASIEN)); ?>
	</b><br>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS MASUK')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->REM_STATUSMASUK), array('view', 'id'=>$data->REM_STATUSMASUK)); ?>
	<b /><br>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS_KELUAR')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->REM_STATUSKELUAR), array('view', 'id'=>$data->REM_STATUSKELUAR)); ?>
	<b /><br>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('polikliknik IGD')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->REM_POLIKLINIKIGD), array('view', 'id'=>$data->REM_POLIKLINIKIGD)); ?>
	<b /><br>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('Berat Badan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->REM_BERATBADAN), array('view', 'id'=>$data->REM_BERATBADAN)); ?>
	<b /><br>

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tekanan Darah')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->REM_TEKANANDARAH), array('view', 'id'=>$data->REM_TEKANANDARAH)); ?>
	<b /><br>


</div>