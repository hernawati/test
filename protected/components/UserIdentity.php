<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

	private $_id;
	private $_name;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function getId()
    {
        return $this->_id;
    }
	
	public function getName()
	{
		return $this->_name;
	}
	 
	public function authenticate()
	{
		$record=Pengguna::model()->findByAttributes(array('NAMA'=>$this->username));
		$hashPassword =Pengguna::model()->hashPassword($this->password);

		if($record===null){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}else if($record->PASSWORD!==$hashPassword){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else{
			$this->_id=$record->ID;
			$this->_name=$record->NAMA;
			foreach($record->akses as $akses){
				$cookie = new CHttpCookie($akses->CONTROLLER,$akses->ACTION);
				$cookie->expire = time()+60*60*24; 
				Yii::app()->request->cookies[$akses->CONTROLLER] = $cookie;
			}
			foreach($record->grup as $grup){
				foreach($grup->akses as $akses){
					$cookie = new CHttpCookie($akses->CONTROLLER,$akses->ACTION);
					$cookie->expire = time()+60*60*24; 
					Yii::app()->request->cookies[$akses->CONTROLLER] = $cookie;
				}
			}
			$this->setState('nama', $record->NAMA);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
}