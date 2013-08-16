<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'RiLayanan'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pasien-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<?php /*$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'obat-grid',
	'dataProvider'=>$modelApt->search(),
	'filter'=>$modelApt,
	'columns'=>array(
		'OBT_KODEOBAT',
		'GF_TGLPEMBELIAN',
		'APT_TANGGALMASUK',
		'APT_PASIENTUJUANOBAT',
		'APT_TOTALOBATMASUK',
		'APT_SISAOBAT',
		'APT_HARGAJUALSATUAN1',
		array(
			'class'=>'CButtonColumn',
			'header'=>'Detail',
			'viewButtonUrl'=>'array("view","id"=>$data->OBT_KODEOBAT)',
			'updateButtonUrl'=>'array("view","id"=>$data->OBT_KODEOBAT)',
			'deleteButtonUrl'=>'array("view","id"=>$data->OBT_KODEOBAT)',
		),
	),
)); */?>

<div style="text-align:right;">
<?php
	//echo HTML::sublink('Tambah Resep Obat',array('createRJ','id'=>$model->PAS_NOREKAMMEDIK,'tglkunjungan'=>$model->REM_TGLKUNJUNGAN));
	//echo '<br/><br/>';
?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ri-kontrolobat-grid',
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
				'class'=>'CButtonColumn',
				'template'=>'{view}{update}{delete}',
				'buttons'=> array(
								'view'=>array('url'=>'Yii::app()->createUrl("resepobat/view", array("aptreq"=>$data->APTREQ_NOMORORDER,"gfreq"=>$data->GFREQ_NOMORORDER,"id"=>$data->PAS_NOREKAMMEDIK,"kodebarang"=>$data->INV_KODEBARANG,"tglkunjungan"=>$data->REM_TGLKUNJUNGAN,"tglmasuk"=>$data->RID_TGLMASUKKAMAR,"tglresep"=>$data->RIK_TANGGALRESEP))',),
								'update'=>array('url'=>'Yii::app()->createUrl("resepobat/update", array("aptreq"=>$data->APTREQ_NOMORORDER,"gfreq"=>$data->GFREQ_NOMORORDER,"id"=>$data->PAS_NOREKAMMEDIK,"kodebarang"=>$data->INV_KODEBARANG,"tglkunjungan"=>$data->REM_TGLKUNJUNGAN,"tglmasuk"=>$data->RID_TGLMASUKKAMAR,"tglresep"=>$data->RIK_TANGGALRESEP))',),
								'delete'=>array('url'=>'Yii::app()->createUrl("resepobat/delete", array("aptreq"=>$data->APTREQ_NOMORORDER,"gfreq"=>$data->GFREQ_NOMORORDER,"id"=>$data->PAS_NOREKAMMEDIK,"kodebarang"=>$data->INV_KODEBARANG,"tglkunjungan"=>$data->REM_TGLKUNJUNGAN,"tglmasuk"=>$data->RID_TGLMASUKKAMAR,"tglresep"=>$data->RIK_TANGGALRESEP))',),
							),
			),
	),
)); ?>
