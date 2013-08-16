<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'popup',
    'options'=>array(
        'title'=>'',
        'autoOpen'=>false,
		'height'=>640,
		'width'=>550,
		'show'=>'blind',
		'hide'=>'blind',
		'modal'=>true,
		'resizable'=>false,
		'draggable'=>false,
    ),
));
$this->endWidget('zii.widgets.jui.CJuiDialog');


echo '<h1>'.(isset($namapoli)?$namapoli:'').'</h1>';
?>
<?php
	$selesai=Yii::app()->user->isBoleh('poliklinik','selesai')?'{Selesai}':'';
	$tunda=Yii::app()->user->isBoleh('poliklinik','pending')?' {Tunda}':'';
	$batal=Yii::app()->user->isBoleh('poliklinik','batal')?' {Batal}':'';
	$tangani=Yii::app()->user->isBoleh('poliklinik','tangani')?' {Tangani}':'';
	$detail=Yii::app()->user->isBoleh('poliklinik','detail')?' {Detail}':'';
	$pemeriksaan=Yii::app()->user->isBoleh('poliklinik','pemeriksaanAwal')?' {Pemeriksaan}':'';
?>
<table class='antrian'>
	<tr>
		<td class="ditangani"  rowspan="2">
			<h2 style="width:100%;text-align:center;">Ditangani</h2>
			<?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$modelDitangani,
				'summaryText'=>'',
				'itemView'=>'_listDitangani',
			)); ?>
		</td>
		<td class="ditunda">
			<h2 style="width:100%;text-align:center;padding:0;">Ditunda</h2>
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
						array(
							'class'=>'CButtonColumn',
							'template'=>$tangani.$batal.$detail,
							'header'=>'Aksi',
							'buttons'=>array(
								'Tangani' => array(
									'label'=>'Tangani',
									'url'=>'array("poliklinik/tangani","id"=>$data->PAS_NOREKAMMEDIK,"tglkunjungan"=>$data->REM_TGLKUNJUNGAN,"poliklinik"=>$data->REMTU_ID)',
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
				));
			?>
		</td>
	</tr>
	<tr>
		<td class="mengantri">
			<h2 style="width:100%;text-align:center;">Mengantri</h2>
			<?php
			$this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'mengantri-grid',
				'dataProvider'=>$modelAntrian,
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
					//'REM_STATUSMASUK', 
					array(
						'class'=>'CButtonColumn',
						'template'=>$tangani.'<br/>'.$batal.'<br/>'.$detail,
						'header'=>'Aksi',
						'buttons'=>array(
							'Tangani' => array(
								'label'=>'Tangani',
								'url'=>'array("poliklinik/tangani","id"=>$data->PAS_NOREKAMMEDIK,"tglkunjungan"=>$data->REM_TGLKUNJUNGAN,"poliklinik"=>$data->REMTU_ID)',
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
			));
			?>
		</td>
	</tr>
</table>