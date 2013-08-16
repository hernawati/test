<?php

/**
 * This is the model class for table "kamar".
 *
 * The followings are the available columns in table 'kamar':
 * @property string $KLS_IDKELAS
 * @property string $KMR_KODEKAMAR
 * @property string $KMR_KODEBED
 * @property string $KMR_STATUSBED
 * @property string $KMR_KONDISIBED
 */
class Kamar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kamar the static model class
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
		return 'kamar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('KLS_IDKELAS+KMR_KODEKAMAR+KMR_KODEBED','application.extensions.UniqueMultiColumnValidator'),
			array('KLS_IDKELAS, KMR_KODEKAMAR, KMR_KODEBED', 'required'),
			array('KLS_IDKELAS, KMR_KODEKAMAR, KMR_KODEBED', 'length', 'max'=>10),
			array('KMR_STATUSBED', 'length', 'max'=>50),
			array('KMR_KONDISIBED', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('KLS_IDKELAS, KMR_KODEKAMAR, KMR_KODEBED, KMR_STATUSBED, KMR_KONDISIBED', 'safe', 'on'=>'search'),
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
			'kelas'=>array(self::BELONGS_TO, 'Kelas', 'KLS_IDKELAS'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'KLS_IDKELAS' => 'ID Kelas',
			'KMR_KODEKAMAR' => 'Kode Kamar',
			'KMR_KODEBED' => 'Kode Bed',
			'KMR_STATUSBED' => 'Status Bed',
			'KMR_KONDISIBED' => 'Kondisi Bed',
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
		$criteria->compare('KMR_KODEKAMAR',$this->KMR_KODEKAMAR,true);
		$criteria->compare('KMR_KODEBED',$this->KMR_KODEBED,true);
		$criteria->compare('KMR_STATUSBED',$this->KMR_STATUSBED,true);
		$criteria->compare('KMR_KONDISIBED',$this->KMR_KONDISIBED,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}