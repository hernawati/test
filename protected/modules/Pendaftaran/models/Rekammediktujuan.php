<?php

/**
 * This is the model class for table "rekammediktujuan".
 *
 * The followings are the available columns in table 'rekammediktujuan':
 * @property string $REMTU_ID
 * @property string $REMTU_NAMA
 * @property string $REMTU_KETERANGAN
 *
 * The followings are the available model relations:
 * @property Dokter[] $dokters
 * @property Perawat[] $perawats
 * @property Rekammedik[] $rekammediks
 */
class Rekammediktujuan extends CActiveRecord
{

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Rekammediktujuan the static model class
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
		return 'rekammediktujuan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('REMTU_ID', 'unique'),
			array('REMTU_ID', 'required'),
			array('REMTU_ID', 'length', 'max'=>10),
			array('REMTU_NAMA', 'length', 'max'=>100),
			array('REMTU_KETERANGAN', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('REMTU_ID, REMTU_NAMA, REMTU_KETERANGAN', 'safe', 'on'=>'search'),
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
			'dokter' => array(self::HAS_MANY, 'Dokter', 'REMTU_ID'),
			'perawat' => array(self::HAS_MANY, 'Perawat', 'REMTU_ID'),
			'rekammedik' => array(self::HAS_MANY, 'Rekammedik', 'REMTU_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'REMTU_ID' => 'ID Tujuan',
			'REMTU_NAMA' => 'Tujuan',
			'REMTU_KETERANGAN' => 'Keterangan',
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

		$criteria->compare('REMTU_ID',$this->REMTU_ID,true);
		$criteria->compare('REMTU_NAMA',$this->REMTU_NAMA,true);
		$criteria->compare('REMTU_KETERANGAN',$this->REMTU_KETERANGAN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}