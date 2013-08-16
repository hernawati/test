<?php

/**
 * This is the model class for table "dokter".
 *
 * The followings are the available columns in table 'dokter':
 * @property string $DOK_IDDOKTER
 * @property string $POL_IDPOLIKLINIK
 * @property string $DOK_NAMADOKTER
 * @property string $DOK_SPESIALISASI
 * @property string $DOK_ALAMAT
 * @property string $DOK_MULAIBEKERJA
 * @property string $DOK_AWALPENUGASAN
 * @property string $DOK_AKHIRPENUGASAN
 * @property double $DOK_TARIFKONSUL
 */
class Dokter extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Dokter the static model class
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
		return 'dokter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('DOK_IDDOKTER', 'unique'),
			array('DOK_IDDOKTER, DOK_MULAIBEKERJA,DOK_NAMADOKTER,DOK_AWALPENUGASAN,DOK_AKHIRPENUGASAN', 'required'),
			array('DOK_TARIFKONSUL', 'numerical'),
			array('DOK_IDDOKTER, REMTU_ID', 'length', 'max'=>10),
			array('DOK_NAMADOKTER, DOK_SPESIALISASI', 'length', 'max'=>100),
			array('DOK_AKHIRPENUGASAN', 'cekpenugasan'),
			array('DOK_ALAMAT, DOK_AWALPENUGASAN, DOK_AKHIRPENUGASAN', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('DOK_IDDOKTER, REMTU_ID, DOK_NAMADOKTER, DOK_SPESIALISASI, DOK_ALAMAT, DOK_MULAIBEKERJA, DOK_AWALPENUGASAN, DOK_AKHIRPENUGASAN, DOK_TARIFKONSUL', 'safe', 'on'=>'search'),
		);
	}
	
	public function cekpenugasan(){
		if($this->DOK_AKHIRPENUGASAN < $this->DOK_AWALPENUGASAN ){
			$this->addError('APT_AKHIRPENUGASAN','Akhir penugasan harus lebih besar dari awal penugasan!');
		}
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'poliklinik' => array(self::BELONGS_TO, 'Rekammediktujuan', 'REMTU_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'DOK_IDDOKTER' => 'ID Dokter',
			'POL_IDPOLIKLINIK' => 'Poliklinik',
			'DOK_NAMADOKTER' => 'Nama Dokter',
			'DOK_SPESIALISASI' => 'Spesialisasi',
			'DOK_ALAMAT' => 'Alamat',
			'DOK_MULAIBEKERJA' => 'Mulai Bekerja',
			'DOK_AWALPENUGASAN' => 'Awal Penugasan',
			'DOK_AKHIRPENUGASAN' => 'Akhir Penugasan',
			'DOK_TARIFKONSUL' => 'Tarif Konsultasi',
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

		$criteria->compare('DOK_IDDOKTER',$this->DOK_IDDOKTER,true);
		$criteria->compare('REMTU_ID',$this->REMTU_ID,true);
		$criteria->compare('DOK_NAMADOKTER',$this->DOK_NAMADOKTER,true);
		$criteria->compare('DOK_SPESIALISASI',$this->DOK_SPESIALISASI,true);
		$criteria->compare('DOK_ALAMAT',$this->DOK_ALAMAT,true);
		$criteria->compare('DOK_MULAIBEKERJA',$this->DOK_MULAIBEKERJA,true);
		$criteria->compare('DOK_AWALPENUGASAN',$this->DOK_AWALPENUGASAN,true);
		$criteria->compare('DOK_AKHIRPENUGASAN',$this->DOK_AKHIRPENUGASAN,true);
		$criteria->compare('DOK_TARIFKONSUL',$this->DOK_TARIFKONSUL);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}