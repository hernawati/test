<?php

class DefaultController extends ModuleController
{	
	public $layout='main';
	
	public function actionIndex()
	{
		$this->render('index');
	}
}

?>
