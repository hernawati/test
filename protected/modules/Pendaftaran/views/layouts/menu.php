<?php
	$itemMenu[]=array(
			'name' =>Yii::app()->user->name.' (logout)',
			'link' =>$this->createUrl('site/logout'),
		);
	$itemMenu[]=array(
		'name' => 'Pendaftaran',
		'link' => '#',
	);
	$itemMenu[]=array(
		'name' => 'Data Pasien',
		'link' => $this->createUrl('pasien/admin'),
	);
	
	$itemMenu[]=array(
		'name' => 'Laporan',
		'link' => '#',
	);

	$itemMenu[]=array(
		'name' => 'Laporan Harian',
		'link' => $this->createUrl('laporan/laporanHarianPendaftaran'),
	);
	
	/************ MENU ***********************/
	$this->widget( 'ext.menu.EMenu', array(
		'items' =>$itemMenu,
	));
 
	/************ END MENU ***********************/
?>
