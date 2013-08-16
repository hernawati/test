<?php
/* @var $this RekamMedikController */
/* @var $model Layanan */

$this->breadcrumbs=array(
	'Poliklinik'=>array('index'),
	'Antrian Poliklinik',

);
?>


<?php
	foreach($daftarPoliklinik as $poliklinik){
		$tabs[$poliklinik->REMTU_NAMA]=array('ajax'=>array('log','poliklinik'=>$poliklinik->REMTU_ID));
	}
?>

<?php
	$this->widget('zii.widgets.jui.CJuiTabs',array(
		'tabs'=>$tabs,
		// additional javascript options for the tabs plugin
		'options'=>array(
			'collapsible'=>true,
		),
	));
?>
<hr/>
<div style="display:none">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'jasa_dokter-form-grid',
	'dataProvider'=>$remtu->search(),
	'summaryText'=>'{start}-{page} data dari {count}',
)); ?>
</div>