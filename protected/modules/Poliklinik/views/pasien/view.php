<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'Pasiens'=>array('index'),
	$model->PAS_NOREKAMMEDIK,
);
?>
<h1>Detail Pasien ID: <?php echo $model->PAS_NOREKAMMEDIK; ?></h1>

<?php
	echo '<br/>';

	echo HTML::link('Hapus',array('delete', 'id'=>$model->PAS_NOREKAMMEDIK));
	echo HTML::link('Ubah',array('update', 'id'=>$model->PAS_NOREKAMMEDIK));
	echo HTML::link('Daftar Pasien',array('admin'));

	echo '<br/>';
	echo '<br/>';
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
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
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'PAS_STATUSPEMBAYARAN',
		'asuransi.ASR_NAMAASURANSI',
		'PAS_TGLPENDAFTARAN',
	),
)); ?>
<br/>
<h2>Daftar Rekam Medik</h2>
<?php
		$template='';
		$template.=Yii::app()->user->isBoleh('rekammedik','view')?'{view}':'';
		$template.=Yii::app()->user->isBoleh('rekammedik','update')?'{update}':'';
		$template.=Yii::app()->user->isBoleh('rekammedik','delete')?'{delete}':'';
		
		echo '<br/>';
		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'pasien-grid',
			'dataProvider'=>$rekammedik->search(),
			'filter'=>$rekammedik,
			'columns'=>array(
				'PAS_NOREKAMMEDIK',
				'REM_TGLKUNJUNGAN',
				'REM_AMNESA',
				'REM_DIAGNOSA',
				'REM_THERAPHY',
				'REM_STATUSMASUK',
				'REM_STATUSKELUAR',
				'tujuan.REMTU_NAMA',
				array(
					'class'=>'CButtonColumn',
					'header'=>'Aksi',
					'template'=>$template,
					'viewButtonUrl'=>'\'index.php?r=Poliklinik/rekammedik/view&id=\'.$data->PAS_NOREKAMMEDIK.\'&tglkunjungan=\'.$data->REM_TGLKUNJUNGAN',
					'updateButtonUrl'=>'\'index.php?r=Poliklinik/rekammedik/update&id=\'.$data->PAS_NOREKAMMEDIK.\'&tglkunjungan=\'.$data->REM_TGLKUNJUNGAN',
					'deleteButtonUrl'=>'\'index.php?r=Poliklinik/rekammedik/delete&id=\'.$data->PAS_NOREKAMMEDIK.\'&tglkunjungan=\'.$data->REM_TGLKUNJUNGAN',
				),
			),
		));
?>