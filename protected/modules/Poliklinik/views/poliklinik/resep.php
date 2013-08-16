<h2>Resep Obat </h2>
<div id="resep-obat">
<?php
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'rjlayanan-grid',
		'dataProvider'=>$model->search(),
		'columns'=>array(
			'obat.OBT_NAMAOBAT',
			'PAS_NOREKAMMEDIK',
			'RES_TANGGALRESEP',
			'RES_JUMLAHOBAT',
			array(
				'class'=>'CButtonColumn',
				'header'=>'Aksi',
				'template'=>'{view}{delete}',
				'viewButtonUrl'=>'\'index.php?r=poliklinik/detailResep&id=\'.$data->PAS_NOREKAMMEDIK.\'&tglkunjungan=\'.$data->REM_TGLKUNJUNGAN.\'&kodeObat=\'.$data->OBT_KODEOBAT',
				'deleteButtonUrl'=>'\'index.php?r=poliklinik/HapusResep&id=\'.$data->PAS_NOREKAMMEDIK.\'&tglkunjungan=\'.$data->REM_TGLKUNJUNGAN.\'&kodeObat=\'.$data->OBT_KODEOBAT',
			),
		),
	)); 
?>

<script>
	$('a.view').click(function(){
		$('#popup').html('Sedang membaca...');
		$('#popup').dialog("open");
		$.ajax({
			url:$(this).attr('href'),
			success:function(hasil){$('#popup').html(hasil)},
		});
		return false;
	});
	$('a.delete').click(function(){
		$.ajax({
			url:$(this).attr('href'),
			success:function(hasil){alert('Data berhasil dihapus!');$('#resep-obat').html(hasil)},
		});
		return false;
	});
</script>
</div>
