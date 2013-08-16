<?php echo '<h1>Poliklinik '.(isset($namapoli)?$namapoli:'').'</h1>'; ?>
<hr/>
<h2>Pasien Ditangani</h2>
<?php 
	$selesai=Yii::app()->user->isBoleh('poliklinik','selesai')?'{Selesai}':'';
	$tunda=Yii::app()->user->isBoleh('poliklinik','pending')?' {Tunda}':'';
	$batal=Yii::app()->user->isBoleh('poliklinik','batal')?' {Batal}':'';
	$tangani=Yii::app()->user->isBoleh('poliklinik','tangani')?' {Tangani}':'';
	$detail=Yii::app()->user->isBoleh('poliklinik','detail')?' {Detail}':'';
	$pemeriksaan=Yii::app()->user->isBoleh('poliklinik','pemeriksaanAwal')?' {Pemeriksaan}':'';
	
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ditangani-grid',
	'dataProvider'=>$modelDitangani,
	'summaryText'=>'Jumlah pasien yang sedang ditangani : {count} pasien',
	'emptyText'=>'Tidak ada pasien yang sedang ditangani',
	
	'pager'=>array(
		'header'=>'',
		'prevPageLabel'=>'&lt; Sebelumnya',
		'nextPageLabel'=>'Selanjutnya &gt;',
	),
	//'filter'=>$modelAntrian,
	'columns'=>array(
		array(
			'header'=>'No',
			'value'=>'$row+1',
		),
		'pasien.PAS_NAMAPASIEN',
		'PAS_NOREKAMMEDIK',
		'REM_TGLKUNJUNGAN', 
		'REM_STATUSMASUK', 
		'REM_AMNESA',
		array(
			'class'=>'CButtonColumn',
			'template'=>$selesai.$tunda.$batal.$detail,
			'header'=>'Aksi',
			'buttons'=>array(
				'Selesai' => array(
					'label'=>'Selesai',
					'url'=>'array("poliklinik/selesai","id"=>$data->PAS_NOREKAMMEDIK,"tglkunjungan"=>$data->REM_TGLKUNJUNGAN)',
				),
				'Tunda' => array(
					'label'=>'Tunda',
					'url'=>'array("poliklinik/pending","id"=>$data->PAS_NOREKAMMEDIK,"tglkunjungan"=>$data->REM_TGLKUNJUNGAN)',
				),
				'Batal' => array(
					'label'=>'Batal',
					'url'=>'array("poliklinik/batal","id"=>$data->PAS_NOREKAMMEDIK,"tglkunjungan"=>$data->REM_TGLKUNJUNGAN)',
				),
				'Detail'=>array(
					'label'=>'Detail',
					'url'=>'array("rekammedik/view","id"=>$data->PAS_NOREKAMMEDIK,"tglkunjungan"=>$data->REM_TGLKUNJUNGAN)',
				)
			),
		),
	),
)); ?>
<hr/>
<h2>Pasien Ditunda</h2>
<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ditunda-grid',
	'dataProvider'=>$modelTunda,
	'summaryText'=>'Jumlah pasien yang sedang mengantri : {count} pasien',
	'emptyText'=>'Tidak ada pasien yang sedang mengantri',
	//'filter'=>$modelAntrian,
	
	'pager'=>array(
		'header'=>'',
		'prevPageLabel'=>'&lt; Sebelumnya',
		'nextPageLabel'=>'Selanjutnya &gt;',
	),
	'columns'=>array(
		 
		array(
			'header'=>'No',
			'value'=>'$row+1',
		),
		
		'pasien.PAS_NAMAPASIEN', 
		'PAS_NOREKAMMEDIK',
		'REM_TGLKUNJUNGAN', 
		'REM_STATUSMASUK', 
		'REM_AMNESA',
		array(
			'class'=>'CButtonColumn',
			'template'=>$tangani.$batal.$detail,
			'header'=>'Aksi',
			'buttons'=>array(
				'Tangani' => array(
					'label'=>'Tangani',
					'url'=>'array("poliklinik/tangani","id"=>$data->PAS_NOREKAMMEDIK,"tglkunjungan"=>$data->REM_TGLKUNJUNGAN)',
				),
				'Batal' => array(
					'label'=>'Batal',
					'url'=>'array("poliklinik/batal","id"=>$data->PAS_NOREKAMMEDIK,"tglkunjungan"=>$data->REM_TGLKUNJUNGAN)',
				),
				'Detail' => array(
					'label'=>'Detail',
					'url'=>'array("rekammedik/view","id"=>$data->PAS_NOREKAMMEDIK,"tglkunjungan"=>$data->REM_TGLKUNJUNGAN)',
				)
			),
		),
	),
)); ?>

<hr/>
<h2>Pasien Mengantri</h2>

<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	
	'id'=>'antrian-grid',
	'dataProvider'=>$modelAntrian,
	'summaryText'=>'Jumlah pasien yang sedang mengantri : {count} pasien',
	'emptyText'=>'Tidak ada pasien yang sedang mengantri',
	//'filter'=>$modelAntrian,
	
	'pager'=>array(
		'header'=>'',
		'prevPageLabel'=>'&lt; Sebelumnya',
		'nextPageLabel'=>'Selanjutnya &gt;',
	),
	'columns'=>array(
		 
		array(
			'header'=>'No',
			'value'=>'$row+1',
		),
		
		'pasien.PAS_NAMAPASIEN', 
		'PAS_NOREKAMMEDIK',
		'REM_TGLKUNJUNGAN', 
		'REM_STATUSMASUK', 
		'REM_AMNESA',
		array(
			'class'=>'CButtonColumn',
			'header'=>'Aksi',
			'template'=>$tangani.$batal.$detail.$pemeriksaan,
			'buttons'=>array(
				'Pemeriksaan' => array(
					'label'=>'Pemeriksaan',
					'url'=>'array("poliklinik/pemeriksaanAwal","id"=>$data->PAS_NOREKAMMEDIK,"tglkunjungan"=>$data->REM_TGLKUNJUNGAN)',
				),
				'Tangani' => array(
					'label'=>'Tangani',
					'url'=>'array("poliklinik/tangani","id"=>$data->PAS_NOREKAMMEDIK,"tglkunjungan"=>$data->REM_TGLKUNJUNGAN)',
				),
				'Batal' => array(
					'label'=>'Batal',
					'url'=>'array("poliklinik/batal","id"=>$data->PAS_NOREKAMMEDIK,"tglkunjungan"=>$data->REM_TGLKUNJUNGAN)',
				),
				'Detail' => array(
					'label'=>'Detail',
					'url'=>'array("rekammedik/view","id"=>$data->PAS_NOREKAMMEDIK,"tglkunjungan"=>$data->REM_TGLKUNJUNGAN)',
				)
			),
		),
	),
)); ?>