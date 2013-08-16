<?php

class EWebUser extends CWebUser{
 
    protected $_model;
 
	// Load user model.
    protected function loadUser(){
        if ( $this->_model === null ) {
                $this->_model = Pengguna::model()->findByAttribute(array('ID'=>$this->id));
        }
        return $this->_model;
    }
	
    public function isBoleh($controller,$action='*'){
		
		$controller = strtolower($controller);
		$action = strtolower($action);

		if($action!=true){
			if(isset(Yii::app()->request->cookies['*'])){
				if(Yii::app()->request->cookies['*']->value==='*'){
					return true;
				}else if(Yii::app()->request->cookies['*']->value===$action){
					return true;
				}
			}
			if(isset(Yii::app()->request->cookies[$controller])){
				if(Yii::app()->request->cookies[$controller]->value==='*'){
					return true;
				}else if(Yii::app()->request->cookies[$controller]->value===$action){
					return true;
				}
				}
		}else{
			return Yii::app()->request->cookies[$controller] || Yii::app()->request->cookies['*'];
		}
		return false;
	}
}