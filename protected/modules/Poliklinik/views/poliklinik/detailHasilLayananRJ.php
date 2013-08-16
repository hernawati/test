<h2> Hasil Layanan </h2>
<?php
	echo HTML::nonajaxLink('Kembali',array('poliklinik/layanan','id'=>$model->PAS_NOREKAMMEDIK,'tglkunjungan'=>$model->REM_TGLKUNJUNGAN),array(
				'update'=>'#popup',
				'class'=>'keluar',
			),array());
?>
<br/>
<br/>
<?php 
	if(isset($modelHasil)){
		$this->widget('zii.widgets.CDetailView', array('data'=>$modelHasil,));
	}else {
		echo "Belum Ada Hasil";
	}
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