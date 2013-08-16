<?php
	$itemMenu[]=array(
			'name' =>Yii::app()->user->name.' (logout)',
			'link' =>$this->createUrl('site/logout'),
		);
	$itemMenu[]=array(
		'name' => 'Permintaan Radiologi',
		'link' => '#',
	);
	$itemMenu[]=array(
		'name' => 'Pasien Rawat Inap',
		'link' => $this->createUrl('permintaan/antrianRI'),
	);
	$itemMenu[]=array(
		'name' => 'Pasien Rawat Jalan',
		'link' => $this->createUrl('permintaan/antrianRJ'),
	);
	
	$itemMenu[]=array(
		'name' => 'Log',
		'link' => '#',
	);
	$itemMenu[]=array(
		'name' => 'Log Pasien',
		'link' => $this->createUrl('log/logRJRI'),
	);
	$itemMenu[]=array(
		'name' => 'Pasien Rawat Inap',
		'link' => $this->createUrl('log/logRI'),
	);
	$itemMenu[]=array(
		'name' => 'Pasien Rawat Jalan',
		'link' => $this->createUrl('log/logRJ'),
	);
	$itemMenu[]=array(
		'name' => 'Laporan',
		'link' => '#',
	);
	$itemMenu[]=array(
		'name' => 'Laporan Pasien',
		'link' => $this->createUrl('laporan/laporanRJRI'),
	);
	$itemMenu[]=array(
		'name' => 'Laporan Pasien Rawat Inap',
		'link' => $this->createUrl('laporan/laporanRI'),
	);
	$itemMenu[]=array(
		'name' => 'Laporan Pasien Rawat Jalan',
		'link' => $this->createUrl('laporan/laporanRJ'),
	);
	$itemMenu[]=array(
		'name' => 'Statistik',
		'link' => '#',
	);
	$itemMenu[]=array(
		'name' => 'Statistik Pasien',
		'link' => $this->createUrl('statistik/statistikRJRI'),
	);
	$itemMenu[]=array(
		'name' => 'Statistik Pasien Rawat Inap',
		'link' => $this->createUrl('statistik/statistikRI'),
	);
	$itemMenu[]=array(
		'name' => 'Statistik Pasien Rawat Jalan',
		'link' => $this->createUrl('statistik/statistikRJ'),
	);
	$itemMenu[]=array(
		'name' => 'Data Pendukung',
		'link' => '#',
	);
	$itemMenu[]=array(
		'name' => 'Data Pasien',
		'link' => $this->createUrl('data/pasien'),
		'sub' =>array(
			array(
				'name' => 'Pasien Rawat Inap',
				'link' => $this->createUrl('data/pasienRI'),
			),
			array(
				'name' => 'Pasien Rawat Jalan',
				'link' => $this->createUrl('data/pasienRJ'),
			),
		),
	);
	$itemMenu[]=array(
		'name' => 'Data Dokter',
		'link' => $this->createUrl('data/dokter'),
	);
	$itemMenu[]=array(
		'name' => 'Data Perawat',
		'link' => $this->createUrl('data/perawat'),
	);
	/************ MENU ***********************/
	$this->widget( 'ext.menu.EMenu', array(
		'items' =>$itemMenu,
	));
 
	/************ END MENU ***********************/
?>
