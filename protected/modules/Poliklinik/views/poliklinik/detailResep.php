<h2>Detail Resep Obat</h2>
<?php
	echo HTML::nonajaxLink('Kembali',array('poliklinik/resep','id'=>$model->PAS_NOREKAMMEDIK,'tglkunjungan'=>$model->REM_TGLKUNJUNGAN),array(
				'update'=>'#popup',
				'class'=>'keluar',
			),array());
?>
<br/>
<br/>

<?php
	$this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'OBT_KODEOBAT',
				'GF_PASIENTUJUANOBAT',
				'PAS_NOREKAMMEDIK',
				'REM_TGLKUNJUNGAN',
				'RES_TANGGALRESEP',
				'RES_JUMLAHOBAT',
				'RES_SATUANKONSUMSI',
				'RES_DOSISKONSUMSI',
				'RES_STATUSPEMBAYARAN'
			),
		)); 
?>

<script>
	$('a.keluar').click(function(){
		$.ajax({
			url:$(this).attr('href'),
			success:function(hasil){$('#popup').html(hasil)},
		});
		return false;
	});
</script>