<?php

/**
 * This is the model class for table "staff".
 *
 * The followings are the available columns in table 'staff':
 * @property string $STF_IDSTAFF
 * @property string $STF_NAMASTAFF
 * @property string $STF_ALAMAT
 */
class Staff extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Staff the static model class
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
		return 'staff';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('STF_IDSTAFF', 'unique'),
			array('STF_IDSTAFF,STF_NAMASTAFF', 'required'),
			array('STF_IDSTAFF', 'length', 'max'=>10),
			array('STF_NAMASTAFF', 'length', 'max'=>100),
			array('STF_ALAMAT', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('STF_IDSTAFF, STF_NAMASTAFF, STF_ALAMAT', 'safe', 'on'=>'search'),
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
			'STF_IDSTAFF' => 'ID Staf',
			'STF_NAMASTAFF' => 'Nama Staf',
			'STF_ALAMAT' => 'Alamat',
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

		$criteria->compare('STF_IDSTAFF',$this->STF_IDSTAFF,true);
		$criteria->compare('STF_NAMASTAFF',$this->STF_NAMASTAFF,true);
		$criteria->compare('STF_ALAMAT',$this->STF_ALAMAT,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}