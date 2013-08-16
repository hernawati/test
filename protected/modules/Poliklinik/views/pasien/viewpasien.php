<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'Pasiens'=>array('index'),
	$model1->PAS_NOREKAMMEDIK,
);
?>
<h1>Detail Pasien ID: <?php echo $model1->PAS_NOREKAMMEDIK; ?></h1>

<?php
	echo '<br/>';

	echo HTML::link('Kembali',array('laporan/rawatjalan'));
	
	echo '<br/>';
	echo '<br/>';
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model1,
	'attributes'=>array(
		'PAS_NOREKAMMEDIK',
		'PAS_NAMAPASIEN',
		'PAS_TGLLAHIR',
		'PAS_PEKERJAAN',
		'PAS_ALAMAT',
		'PAS_JENISKELAMIN',
		'PAS_AGAMA',
		'PAS_GOLONGANDARAH',
	),
)); ?>
<br/>
<?php 
//$resepobat->PAS_NOREKAMMEDIK='2013.00007';
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model2,
	'attributes'=>array(
		//'PAS_STATUSPEMBAYARAN',
		//'asuransi.ASR_NAMAASURANSI',
		//'PAS_TGLPENDAFTARAN',
		'RES_JUMLAHOBAT',
		'RES_STATUSPEMBAYARAN',
	),
)); ?>

