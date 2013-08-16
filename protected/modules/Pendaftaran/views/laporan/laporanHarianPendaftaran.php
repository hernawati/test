<a href="<?php 
		
echo $this->createUrl('laporan/cetakLaporanHarian'); 
?>"> Cetak Laporan Pendaftaran hari ini </a>
<br/>

<br/>
<?php
	//$arrTgl = array();
	$arrTgl['-'] = '---';
	for($i=1;$i<=31;$i++)
	{
		$arrTgl[$i] = $i;
	}

	$arrBln['-'] = '---';
	$arrBln[1] = 'Januari';
	$arrBln[2] = 'Februari';
	$arrBln[3] = 'Maret';
	$arrBln[4] = 'April';
	$arrBln[5] = 'Mei';
	$arrBln[6] = 'Juni';
	$arrBln[7] = 'Juli';
	$arrBln[8] = 'Agustus';
	$arrBln[9] = 'September';
	$arrBln[10] = 'Oktober';
	$arrBln[11] = 'November';
	$arrBln[12] = 'Desember';
	
	echo CHtml::beginForm(array('laporanHarianPendaftaran'),'get');
		//echo CHtml::textField('tanggal');
		echo CHtml::dropDownList('tanggal','tanggal',$arrTgl,array('options'=>array(isset($_GET['tanggal'])?$_GET['tanggal']:date('j')=>array('selected'=>'selected'))));
		echo CHtml::dropDownList('bulan','bulan',$arrBln,array('options'=>array(isset($_GET['bulan'])?$_GET['bulan']:date('n')=>array('selected'=>'selected'))));
		//echo CHtml::textField('bulan');
		echo CHtml::textField('tahun',date('Y'));
		echo CHtml::submitButton('Lihat');
		
	echo CHtml::endForm();
	
	echo CHtml::beginForm(array('CetaklaporanHarian'),'get');
		//echo CHtml::textField('tanggal');
		echo CHtml::dropDownList('tanggal','tanggal',$arrTgl,array('options'=>array(isset($_GET['tanggal'])?$_GET['tanggal']:date('j')=>array('selected'=>'selected'))));
		echo CHtml::dropDownList('bulan','bulan',$arrBln,array('options'=>array(isset($_GET['bulan'])?$_GET['bulan']:date('n')=>array('selected'=>'selected'))));
		//echo CHtml::textField('bulan');
		echo CHtml::textField('tahun',date('Y'));
		echo CHtml::submitButton('Cetak');
		
	echo CHtml::endForm();

?>
<hr/>
<h1>Laporan Harian Uang Pendaftaran</h1>


<table>
<?php
	
	?>
	<tr>
		<td><b>Tanggal</b></td>
		<td><b>:</b></td>
		<td><b><?php 
		
		
		echo $date;
		?></b></td>
	</tr>
	
	<tr>
		<td><b>Jumlah Pasien Baru</b></td>
		<td><b>:</b></td>
		<td><b><?php echo $baru.' Pasien' ?></b></td>
	</tr>
	
	<tr>
		<td><b>Jumlah Pasien Lama</b></td>
		<td><b>:</b></td>
		<td><b><?php echo $lama.' Pasien' ?></b></td>
	</tr>
	
	<tr>
		<td><b>Total Setoran</b></td>
		<td><b>:</b></td>
		<td><b><?php echo 'Rp. '.$jumlah ?></b></td>
	</tr>
	<tr>
	<td colspan='3'>
	<br>

	<p>Nb: Biaya Pendaftaran pasien baru = Rp.3000 <br>
	 Biaya Pendaftaran pasien baru = Rp. 6000

	</p>
	</td>
	</tr>
<?php
	
?>
</table>
