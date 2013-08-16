<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'OBAT UMUM'=>array('index'),
	'Manage',
);
?>

<h3>DETAIL LAPORAN  TRANSAKSI PENGALOKASIAN OBAT PASIEN RAWAT JALAN</h3>



<?php 
ob_start();
echo CHtml::link('Obat Asuransi',array('laporan/laporanAsuransi'));
$this->widget('zii.widgets.grid.CGridView', array(
	'summaryText'=>'Jumlah obat = {count} buah',
	'id'=>'laporan-grid',
	'dataProvider'=>$model->searchHarianUmum(),
	'filter'=>$model,
	'columns'=>array(
		'OBT_KODEOBAT',
		'GF_PASIENTUJUANOBAT',
		'RES_JUMLAHOBAT',
		'PAS_NOREKAMMEDIK',
		array('class'=>'CLinkColumn',
					'label'=>'Lihat',
					'header'=>'Detail Obat',
					'urlExpression'=>'array("laporan/detailobatrawatjalan","id"=>$data->OBT_KODEOBAT)',
					),
		),
));
$konten1=ob_get_clean();
?>


<?php 
ob_start();
echo CHtml::link('Obat Asuransi',array('laporan/laporanAsuransi'));
$this->widget('zii.widgets.grid.CGridView', array(
	'summaryText'=>'Jumlah obat = {count} buah',
	'id'=>'laporan-grid',
	'dataProvider'=>$model->searchBulananUmum(),
	'filter'=>$model,
	'columns'=>array(
		'OBT_KODEOBAT',
		'GF_PASIENTUJUANOBAT',
		'RES_JUMLAHOBAT',
		'PAS_NOREKAMMEDIK',
		array('class'=>'CLinkColumn',
					'label'=>'Lihat',
					'header'=>'Detail Obat',
					'urlExpression'=>'array("laporan/detailobatrawatjalan","id"=>$data->OBT_KODEOBAT)',
					),
		),
));
$kontent3=ob_get_clean();
?>

<?php 
ob_start();
echo CHtml::link('Obat Asuransi',array('laporan/laporanAsuransi'));
$this->widget('zii.widgets.grid.CGridView', array(
	'summaryText'=>'Jumlah obat = {count} buah',
	'id'=>'laporan-grid',
	'dataProvider'=>$model->searchTahunanUmum(),
	'filter'=>$model,
	'columns'=>array(
		'OBT_KODEOBAT',
		'GF_PASIENTUJUANOBAT',
		'RES_JUMLAHOBAT',
		'PAS_NOREKAMMEDIK',
		array('class'=>'CLinkColumn',
					'label'=>'Lihat',
					'header'=>'Detail Obat',
					'urlExpression'=>'array("laporan/detailobatrawatjalan","id"=>$data->OBT_KODEOBAT)',
					),
		),
));
$kontent4=ob_get_clean();
?>

<?php
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        'Laporan Harian'=>array('content'=>$konten1),
		'Laporan Bulanan'=>array('content'=>$kontent3),
		'Laporan Tahunan'=>array('content'=>$kontent4),
    ),
    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>true,
    ),
));
?>




