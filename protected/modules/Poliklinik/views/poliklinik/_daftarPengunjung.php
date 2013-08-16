Daftar Pengunjung Hari Ini :
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'antrian-grid',
	'dataProvider'=>$modelPengunjung,
	'summaryText'=>'{start}-{page} data dari {count} data',
	//'filter'=>$modelAntrian,
	'columns'=>array(
		'REM_TGLKUNJUNGAN', 
		'PAS_NOREKAMMEDIK',
		'pasien.PAS_NAMAPASIEN', 
		'REM_STATUSMASUK', 
		'REM_AMNESA',
		array(
			'class'=>'CLinkColumn',
			'label'=>'Jasa Dokter',
			'header'=>'Aksi',
			'urlExpression'=>'array("jasaDokter/view","id"=>$data->PAS_NOREKAMMEDIK,"tglkunjungan"=>$data->REM_TGLKUNJUNGAN)',
		),
		),
)); ?>