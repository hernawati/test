<?php

/**
 * This is the model class for table "kelas".
 *
 * The followings are the available columns in table 'kelas':
 * @property string $KLS_IDKELAS
 * @property string $KLS_NAMAKELAS
 * @property double $KLS_TARIF_KAMAR
 * @property integer $KLS_JUMLAHKAMAR
 * @property string $KLS_ZAAL
 */
class Kelas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kelas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kelas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('KLS_IDKELAS', 'unique'),
			array('KLS_IDKELAS,KLS_NAMAKELAS', 'required'),
			array('KLS_JUMLAHKAMAR', 'numerical', 'integerOnly'=>true),
			array('KLS_TARIF_KAMAR', 'numerical'),
			array('KLS_IDKELAS, KLS_NAMAKELAS', 'length', 'max'=>10),
			array('KLS_ZAAL', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('KLS_IDKELAS, KLS_NAMAKELAS, KLS_TARIF_KAMAR, KLS_JUMLAHKAMAR, KLS_ZAAL', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'KLS_IDKELAS' => 'ID Kelas',
			'KLS_NAMAKELAS' => 'Nama Kelas',
			'KLS_TARIF_KAMAR' => 'Tarif Kamar',
			'KLS_JUMLAHKAMAR' => 'Jumlah Kamar',
			'KLS_ZAAL' => 'Kelas Zaal',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('KLS_IDKELAS',$this->KLS_IDKELAS,true);
		$criteria->compare('KLS_NAMAKELAS',$this->KLS_NAMAKELAS,true);
		$criteria->compare('KLS_TARIF_KAMAR',$this->KLS_TARIF_KAMAR);
		$criteria->compare('KLS_JUMLAHKAMAR',$this->KLS_JUMLAHKAMAR);
		$criteria->compare('KLS_ZAAL',$this->KLS_ZAAL,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}