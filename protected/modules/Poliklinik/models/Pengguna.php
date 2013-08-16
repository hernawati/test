<?php

/**
 * This is the model class for table "pengguna".
 *
 * The followings are the available columns in table 'pengguna':
 * @property string $ID
 * @property string $PASSWORD
 * @property string $GRUP
 * @property string $NAMA
 *
 * The followings are the available model relations:
 * @property Akses[] $akses
 * @property Grup[] $grups
 */
class Pengguna extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pengguna the static model class
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
		return 'pengguna';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID, PASSWORD, GRUP, NAMA', 'required'),
			array('ID, GRUP', 'length', 'max'=>11),
			array('PASSWORD', 'length', 'max'=>100),
			array('NAMA', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, PASSWORD, GRUP, NAMA', 'safe', 'on'=>'search'),
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
			'akses' => array(self::MANY_MANY, 'Akses', 'aksespengguna(ID, KODE)'),
			'grups' => array(self::MANY_MANY, 'Grup', 'gruppengguna(ID, GRUP)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'PASSWORD' => 'Password',
			'GRUP' => 'Grup',
			'NAMA' => 'Nama',
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

		$criteria->compare('ID',$this->ID,true);
		$criteria->compare('PASSWORD',$this->PASSWORD,true);
		$criteria->compare('GRUP',$this->GRUP,true);
		$criteria->compare('NAMA',$this->NAMA,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}