
<?php 
	echo CHtml::link('Cetak Pasien',array('cetak'));

?>
<br><br>

<h1>Daftar Pengunjung Rumah Sakit HKBP Balige</h1>


<?php

	$model=new CActiveDataProvider('Rekammedik');
	//$model=new CActiveDataProvider('Pasien');

	$this->widget('zii.widgets.grid.CGridView', array(
	'summaryText'=>'Jumlah pengunjung hari ini = {count} pasien',
	'id'=>'RekamMedik-grid',
	'dataProvider'=>$modelcriteria,
	'pager'=>array(
		'header'=>'',
		'prevPageLabel'=>'&lt; Sebelumnya',
		'nextPageLabel'=>'Selanjutnya &gt;',
			),
	'columns'=>array(
		'PAS_NOREKAMMEDIK',
		'REM_TGLKUNJUNGAN',
		'rekammediks.PAS_NAMAPASIEN',
		'rekammediks.PAS_STATUSPEMBAYARAN',
	),
)

); 
	

?>
