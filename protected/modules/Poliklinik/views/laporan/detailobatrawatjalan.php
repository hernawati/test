
<h1>Detail Obat Umum <?php echo $model1->OBT_KODEOBAT; ?></h1>

<?php
echo CHtml::link('Obat Asuransi',array('laporan/laporanAsuransi'));
?>
<?php
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model1,
	'attributes'=>array(
		'OBT_KODEOBAT',
		'OBT_NAMAOBAT',
		'OBT_KEMASANOBAT',
		'OBT_APT_MINIMUMSTOK',
		),
)); ?>
<br/>
<br/>

<?php
	//$model=new ResepObat('search');
	$this->widget('zii.widgets.grid.CGridView', array(
	'summaryText'=>'Jumlah pengunjung hari ini = {count} pasien',
	'id'=>'resepObat-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
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
			'class'=>'CLinkColumn',
			'label'=>'Lihat',
			'header'=>'Detail',
			'urlExpression'=>'array("pasien/viewpasien","id"=>$data->PAS_NOREKAMMEDIK)',
		),
	),
)); ?>


