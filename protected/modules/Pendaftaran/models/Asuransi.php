<?php

/**
 * This is the model class for table "asuransi".
 *
 * The followings are the available columns in table 'asuransi':
 * @property string $ASR_IDASURANSI
 * @property string $ASR_NAMAASURANSI
 * @property string $ASR_KETERANGAN
 */
class Asuransi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Asuransi the static model class
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
		return 'asuransi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ASR_IDASURANSI', 'unique'),
			array('ASR_IDASURANSI', 'required'),
			array('ASR_IDASURANSI', 'length', 'max'=>10),
			array('ASR_NAMAASURANSI', 'length', 'max'=>100),
			array('ASR_KETERANGAN', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ASR_IDASURANSI, ASR_NAMAASURANSI, ASR_KETERANGAN', 'safe', 'on'=>'search'),
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
			'ASR_IDASURANSI' => 'ID Asuransi',
			'ASR_NAMAASURANSI' => 'Nama Asuransi',
			'ASR_KETERANGAN' => 'Keterangan',
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

		$criteria->compare('ASR_IDASURANSI',$this->ASR_IDASURANSI,true);
		$criteria->compare('ASR_NAMAASURANSI',$this->ASR_NAMAASURANSI,true);
		$criteria->compare('ASR_KETERANGAN',$this->ASR_KETERANGAN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}