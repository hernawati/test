<?php
class HTML extends CHtml{
	public static function link($text,$url='#',$htmlOptions=array()){
		$tampilan='
			<div class="kanan">&nbsp;</div>
			<div class="tengah">'.$text.'</div>
			<div class="kiri"></div>
		';
		
		$c=Yii::app()->getController();
		
		if(is_array($url)){
			$request = explode('/',$url[0]);
			if(count($request)){
				$request[0]=$c->getId();
				$temp=explode('/',$url[0]);
				$request[1]=$temp[0];
			}
		}else{
			$request = explode('/',$url);
		}
		if(Yii::app()->user->isBoleh($request[0],$request[1])){
			echo CHtml::link($tampilan,$url,$htmlOptions);
		}
		
	}
	
	public static function sublink($text,$url='#',$htmlOptions=array()){
		$tampilan='
			<div class="kanan"></div>
			<div class="tengah">'.$text.'</div>
			<div class="kiri"></div>
		';
		
		$c=Yii::app()->getController();
		
		if(is_array($url)){
			$request = explode('/',$url[0]);
			if(count($request)){
				$request[0]=$c->getId();
				$temp=explode('/',$url[0]);
				$request[1]=$temp[0];		
			}
		}else{
			$request = explode('/',$url);
		}
		if(Yii::app()->user->isBoleh($request[0],$request[1])){
			echo CHtml::link($tampilan,$url,$htmlOptions);
		}
		
	}
	
	public static function ajaxLink($text,$url,$ajaxOptions=array(),$htmlOptions=array('style'=>'text-decoration:none;')){
		$tampilan='
			<div class="menuVersi1">&nbsp;'.$text.'</div>
		';
		
		$c=Yii::app()->getController();
		
		if(is_array($url)){
			$request = explode('/',$url[0]);
			if(count($request)){
				$request[0]=$c->getId();
				$temp = explode('/',$url[0]);
				$request[1]=$temp[0];
			}
		}else{
			$request = explode('/',$url);
		}
		if(Yii::app()->user->isBoleh($request[0],$request[1])){
			echo '<div class="menuVersi1">';
			echo CHtml::ajaxLink($text,$url,$ajaxOptions,$htmlOptions);
			echo '</div>';
		}
	}
	
	public static function nonajaxLink($text,$url,$ajaxOptions=array(),$htmlOptions=array('style'=>'text-decoration:none;')){
		$tampilan='
			<div class="menuVersi1">&nbsp;'.$text.'</div>
		';
		
		$c=Yii::app()->getController();
		
		if(is_array($url)){
			$request = explode('/',$url[0]);
			if(count($request)){
				$request[0]=$c->getId();
				$temp=explode('/',$url[0]);
				$request[1]=$temp[0];
			}
		}else{
			$request = explode('/',$url);
		}
		if(Yii::app()->user->isBoleh($request[0],$request[1])){
			echo '<div class="menuVersi1">';
			echo CHtml::link($text,$url,$ajaxOptions,$htmlOptions);
			echo '</div>';
		}
	}
}