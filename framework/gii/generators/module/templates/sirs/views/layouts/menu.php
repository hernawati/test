<?php echo "<?php\n"; ?>
	$itemMenu[]=array(
			'name' =>Yii::app()->user->name.' (logout)',
			'link' =>$this->createUrl('site/logout'),
		);
	$itemMenu[]=array(
		'name' => 'Grup 1',
		'link' => '#',
	);
	$itemMenu[]=array(
		'name' => 'Link 1',
		'link' => $this->createUrl('default/index'),
	);
	$itemMenu[]=array(
		'name' => 'Link 2',
		'link' => $this->createUrl('default/index'),
	);
	$itemMenu[]=array(
		'name' => 'Link 3',
		'link' => $this->createUrl('default/index'),
	);
	$itemMenu[]=array(
		'name' => 'Grup 2',
		'link' => '#',
	);
	
	$subItemMenu[]=array(
			'name' => 'Sub Link 1',
			'link' => $this->createUrl('default/index'),
		);
	$subItemMenu[]=array(
			'name' => 'Sub Link 2',
			'link' => $this->createUrl('default/index'),
		);
	$subItemMenu[]=array(
			'name' => 'Sub Link 3',
			'link' => $this->createUrl('default/index'),
		);

	$itemMenu[]=array(
		'name' => 'Link 1',
		'link' => $this->createUrl('default/index'),
		'sub' => $subItemMenu,
	);
	$itemMenu[]=array(
		'name' => 'Link 2',
		'link' => $this->createUrl('default/index'),
	);
	/************ MENU ***********************/
	$this->widget( 'ext.menu.EMenu', array(
		'items' =>$itemMenu,
	));
 
	/************ END MENU ***********************/
<?php echo "?>\n"; ?>