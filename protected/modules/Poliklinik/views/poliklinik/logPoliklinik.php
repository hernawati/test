<?php
/* @var $this RekamMedikController */
/* @var $model Layanan */

$this->breadcrumbs=array(
	'rekammedik'=>array('index'),
	'Antrian Poliklinik',

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#rekammedik-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<h1>Manajemen Antrian Pasien </h1>

<?php $this->renderPartial('pilihPoliklinik', array('model' => $model,));?>

<style>
	table#log th{
		border:1px solid black;
		background-color:rgb(239, 253, 255)
	}
	table#log td{
		border:1px solid black;
	}
</style>

<?php
	static $i=1;
	echo "<table id='log' padding='5' cellpadding=0 cellspacing=0>";
	
	 
	echo "<tr>";
		echo "<th><b>NO_ANTRI</b></th>";
		echo "<th><b>Tanggal Kunjungan</th>";
		echo "<th><b>NAMA PASIEN</b></th>";
		echo "<th><b>STATUS</b></th>";
		echo "<th><b>ID POLIKLINIK</th>";
		
	echo "</tr>";
	foreach ($modelAntrian as $value)
	{
	
		?>
		
		<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $value->REM_TGLKUNJUNGAN ?></td>
		<td><?php echo $value->rekampasien->PAS_NAMAPASIEN ?></td>
		<td><?php echo $value->REM_STATUSMASUK ?></td>
		<td><?php echo $value->REM_POLIKLINIKIGD ?></td>
		</tr>
		
		<?php
		$i++;
	}
	echo "</table>";

	
	
	
?>

