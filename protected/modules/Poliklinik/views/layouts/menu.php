<?php
	$itemMenu[]=array(
			'name' =>Yii::app()->user->name.'(logout)',
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
		'name' => 'Poliklinik',
		'link' => '#',
	);
	
	if(Yii::app()->user->isBoleh('poliklinik',true)){
		$subItemMenu=null;
		
		$criteria=new CDbCriteria;
		$criteria->compare('REMTU_NAMA','Poliklinik',true);
		
		$daftarPoliklinik = Rekammediktujuan::model()->findAll($criteria);
		if(Yii::app()->user->isBoleh('poliklinik','antrian')){
			foreach($daftarPoliklinik as $poliklinik){
				$itemMenu[]=array(
						'name' =>$poliklinik->REMTU_NAMA,
						'link' => $this->createUrl('poliklinik/antrian&poliklinik='.$poliklinik->REMTU_ID),
					);
			}
		}
	}
	
	$itemMenu[]=array(
		'name' => 'Laporan',
		'link' => '#',
	);

	$itemMenu[]=array(
		'name' => 'Laporan Harian',
		'link' => $this->createUrl('laporan/rawatjalan'),
	);
	
	
	$itemMenu[]=array(
		'name' => 'Log',
		'link' => '#',
	);

	// if(Yii::app()->user->isBoleh('poliklinik','log')){
			// $subItemMenu[]=array(
					// 'name' => 'Log Poliklinik',
					// 'link' => $this->createUrl('/poliklinik/log'),
				// );
				
	// }
	
	$itemMenu[]=array(
		'name' => 'Log Poliklinik',
		'link' => $this->createUrl('poliklinik/log'),
	);
	
	/************ MENU ***********************/
	$this->widget( 'ext.menu.EMenu', array(
		'items' =>$itemMenu,
	));
 
	/************ END MENU ***********************/
?>
