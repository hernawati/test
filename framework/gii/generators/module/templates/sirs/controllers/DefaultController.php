<?php echo "<?php\n"; ?>

class DefaultController extends ModuleController
{	
	public $layout='main';
	
	public function actionIndex()
	{
		$this->render('index');
	}
}

<?php echo "?>\n"; ?>
