<?php

/**
 * This is the model class for table "obat".
 *
 * The followings are the available columns in table 'obat':
 * @property string $OBT_KODEOBAT
 * @property string $OBT_NAMAOBAT
 * @property string $OBT_KEMASANOBAT
 * @property integer $OBT_APT_MINIMUMSTOK
 * @property integer $OBT_GF_MINIMUMSTOK
 */
class Obat extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Obat the static model class
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
		return 'obat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('OBT_KODEOBAT', 'unique'),
			array('OBT_KODEOBAT', 'required'),
			array('OBT_APT_MINIMUMSTOK, OBT_GF_MINIMUMSTOK', 'numerical', 'integerOnly'=>true),
			array('OBT_KODEOBAT', 'length', 'max'=>10),
			array('OBT_NAMAOBAT', 'length', 'max'=>100),
			array('OBT_KEMASANOBAT', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('OBT_KODEOBAT, OBT_NAMAOBAT, OBT_KEMASANOBAT, OBT_APT_MINIMUMSTOK, OBT_GF_MINIMUMSTOK', 'safe', 'on'=>'search'),
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
			'stockObat'=>array(self::HAS_MANY,'GFObat', 'OBT_KODEOBAT'),
			'rikontrolobat'=>array(self::HAS_MANY,'RiKontrolobat','OBT_KODEOBAT'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'OBT_KODEOBAT' => 'Kode Obat',
			'OBT_NAMAOBAT' => 'Nama Obat',
			'OBT_KEMASANOBAT' => 'Kemasan',
			'OBT_APT_MINIMUMSTOK' => 'Stok Minimun Apotek',
			'OBT_GF_MINIMUMSTOK' => 'Stok Minimum Gudang Farmasi',
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

		$criteria->compare('OBT_KODEOBAT',$this->OBT_KODEOBAT,true);
		$criteria->compare('OBT_NAMAOBAT',$this->OBT_NAMAOBAT,true);
		$criteria->compare('OBT_KEMASANOBAT',$this->OBT_KEMASANOBAT,true);
		$criteria->compare('OBT_APT_MINIMUMSTOK',$this->OBT_APT_MINIMUMSTOK);
		$criteria->compare('OBT_GF_MINIMUMSTOK',$this->OBT_GF_MINIMUMSTOK);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

}