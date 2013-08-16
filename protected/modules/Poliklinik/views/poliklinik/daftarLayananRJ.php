<?php

$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'rjlayanan-grid',
			'dataProvider'=>$model->search(),
			'columns'=>array(
				'layanan.LAY_NAMALAYANAN',
				'RJL_STATUSPENANGANAN',
				'RJL_STATUSPEMBAYARAN',
				'RJL_STATUSBERKAS',
				'RJL_PENERIMABERKAS',
				array(
					'class'=>'CButtonColumn',
					'header'=>'Aksi',
					'template'=>'{delete}',
					'deleteButtonUrl'=>'\'index.php?r=poliklinik/HapusHasilLayananRJ&id=\'.$data->PAS_NOREKAMMEDIK.\'&tglkunjungan=\'.$data->REM_TGLKUNJUNGAN.\'&idlayanan=\'.$data->LAY_IDLAYANAN',
					
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
			success:function(hasil){alert('Data berhasil dihapus!');$('#layanan-belum').html(hasil)},
		});
		return false;
	});
</script>