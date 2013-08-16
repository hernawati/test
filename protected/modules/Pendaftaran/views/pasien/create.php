<?php
/* @var $this PasienController */
/* @var $model Pasien */

$this->breadcrumbs=array(
	'Pasien'=>array('index'),
	'Tambah',
);	
	$temp = array();
	if($number==null){
		array_push($temp, 0);
	}
	else{
		foreach ($number as $numbers) {  
			
			list($thn , $num)= explode("." , $numbers->PAS_NOREKAMMEDIK);

			if($thn === date('Y'))
				array_push($temp, $num);
			else
				array_push($temp, 0);
		}
	}
?>

<h1>Tambah Pasien</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'temp'=>$temp)); ?>