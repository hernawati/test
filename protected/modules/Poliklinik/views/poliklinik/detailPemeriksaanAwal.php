<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'Rekam Medik'=>array('index'),
	$model->PAS_NOREKAMMEDIK,
);

?>

<h1>Detail Rekam Medik <?php echo $model->PAS_NOREKAMMEDIK; ?></h1>

<?php
	echo HTML::link('Hapus',array('delete', 'id'=>$model->PAS_NOREKAMMEDIK, 'tglkunjungan'=>$model->REM_TGLKUNJUNGAN));
	echo HTML::link('Ubah',array('update', 'id'=>$model->PAS_NOREKAMMEDIK, 'tglkunjungan'=>$model->REM_TGLKUNJUNGAN));
	echo HTML::link('Rekam Medik Baru',array('create', 'id'=>$model->PAS_NOREKAMMEDIK));
	echo HTML::link('Detail Pasien',array('pasien/view','id'=>$model->PAS_NOREKAMMEDIK));
?>
<br/>
<?php 
		$this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'PAS_NOREKAMMEDIK',
				'pasien.PAS_NAMAPASIEN',
				'REM_TGLKUNJUNGAN',
			),
		));	
?>
<hr/>
<?php 
		$this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'STF_IDSTAFF',
				'staf.STF_NAMASTAFF',
				'DOK_IDDOKTER',
				'dokter.DOK_NAMADOKTER',
			),
		));	
?>
<hr/>
<?php 
		$this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'tujuan.REMTU_NAMA',
				array('label'=>'Tinggi Badan','value'=>$model->REM_TINGGIBADAN.' Cm'),
				array('label'=>'Berat Badan','value'=>$model->REM_BERATBADAN.' Kg'),
				array('label'=>'Tekanan Darah','value'=>$model->REM_TEKANANDARAH.' mmHg '),
				'REM_AMNESA',
				'REM_DIAGNOSA',
				'REM_THERAPHY',
			),
		));	
?>
<hr/>

<?php 
		$this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'REM_STATUSPASIEN',
				'REM_STATUSMASUK',
				'REM_STATUSKELUAR',
				'REM_STATUSPEMBAYARAN',
			),
		));	
?>



<div style="text-align:right;">
	<?php
		echo HTML::link('Cetak Surat Sehat',array('pasien/cetakPdfSuratSehat', 'id'=>$model->PAS_NOREKAMMEDIK, 'tglkunjungan'=>$model->REM_TGLKUNJUNGAN));
		echo HTML::link('Data Surat Sehat',array('pasien/BuatSuratSehat', 'id'=>$model->PAS_NOREKAMMEDIK, 'tgl'=>$model->REM_TGLKUNJUNGAN));
		echo HTML::link('Pemeriksaaan Awal',array('pemeriksaanAwal','id'=>$_GET['id'],'tglkunjungan'=>$_GET['tglkunjungan']));
	?>
</div>

<br/>
<br/>
<br/>
<?php
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        'Detail Rawat Inap'=>array('ajax'=>array('riDetail/admin','id'=>$model->PAS_NOREKAMMEDIK,'tglkunjungan'=>$model->REM_TGLKUNJUNGAN)),
		'Layanan Rawat Jalan'=>array('ajax'=>array('rjLayanan/admin','id'=>$model->PAS_NOREKAMMEDIK,'tglkunjungan'=>$model->REM_TGLKUNJUNGAN)),
		'Resep Obat'=>array('ajax'=>array('resepObat/admin','id'=>$model->PAS_NOREKAMMEDIK,'tglkunjungan'=>$model->REM_TGLKUNJUNGAN)),
    ),
    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>true,
    ),
));
?>

<div style="display: none;">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pasien-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'PAS_NOREKAMMEDIK',
		'REM_TGLKUNJUNGAN',
	),
)); ?>
</div>

