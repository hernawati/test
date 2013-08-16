<?php

/**
 * This is the model class for table "ri_detail".
 *
 * The followings are the available columns in table 'ri_detail':
 * @property string $PAS_NOREKAMMEDIK
 * @property string $REM_TGLKUNJUNGAN
 * @property string $RID_TGLMASUKKAMAR
 * @property string $KLS_IDKELAS
 * @property string $KMR_KODEKAMAR
 * @property string $KMR_KODEBED
 * @property string $RID_TGLKELUARKAMAR
 * @property string $RID_STATUSRI
 * @property string $RID_KONDISIPASIENKELUAR
 */
class RiDetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RiDetail the static model class
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
		return 'ri_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PAS_NOREKAMMEDIK+REM_TGLKUNJUNGAN+RID_TGLMASUKKAMAR','application.extensions.UniqueMultiColumnValidator'),
			array('PAS_NOREKAMMEDIK, REM_TGLKUNJUNGAN, RID_TGLMASUKKAMAR', 'required'),
			array('PAS_NOREKAMMEDIK, KLS_IDKELAS, KMR_KODEKAMAR, KMR_KODEBED', 'length', 'max'=>10),
			array('RID_STATUSRI', 'length', 'max'=>6),
			array('RID_KONDISIPASIENKELUAR', 'length', 'max'=>255),
			array('RID_TGLKELUARKAMAR', 'cektanggalkeluar'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('PAS_NOREKAMMEDIK, REM_TGLKUNJUNGAN, RID_TGLMASUKKAMAR, KLS_IDKELAS, KMR_KODEKAMAR, KMR_KODEBED, RID_TGLKELUARKAMAR, RID_STATUSRI, RID_KONDISIPASIENKELUAR', 'safe', 'on'=>'search'),
		);
	}
	
	public function cektanggalkeluar(){
		if(isset($this->RID_TGLKELUARKAMAR) && $this->RID_TGLKELUARKAMAR < $this->RID_TGLMASUKKAMAR){
			$this->addError('RID_TGLKELUARKAMAR','Tanggal keluar kamar harus lebih besar dari tanggal masuk kamar!');
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
			'pasien' => array(self::BELONGS_TO, 'Pasien', 'PAS_NOREKAMMEDIK'),
			'rekammedik' => array(self::BELONGS_TO, 'Rekammedik', 'PAS_NOREKAMMEDIK,REM_TGLKUNJUNGAN'),
			'kelas' => array(self::BELONGS_TO, 'Kelas', 'KLS_IDKELAS'),
			'kamar' => array(self::BELONGS_TO, 'Kamar', 'KMR_KODEKAMAR'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'PAS_NOREKAMMEDIK' => 'No Rekam Medik',
			'REM_TGLKUNJUNGAN' => 'Tanggal Kunjungan',
			'RID_TGLMASUKKAMAR' => 'Tanggal Masuk',
			'KLS_IDKELAS' => 'Kelas',
			'KMR_KODEKAMAR' => 'Kode Kamar',
			'KMR_KODEBED' => 'Kode Bed',
			'RID_TGLKELUARKAMAR' => 'Tanggal Keluar Kamar',
			'RID_STATUSRI' => 'Status Rawat Inap',
			'RID_KONDISIPASIENKELUAR' => 'Kondisi Pasien Keluar',
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

		$criteria->compare('PAS_NOREKAMMEDIK',$this->PAS_NOREKAMMEDIK,true);
		$criteria->compare('REM_TGLKUNJUNGAN',$this->REM_TGLKUNJUNGAN,true);
		$criteria->compare('RID_TGLMASUKKAMAR',$this->RID_TGLMASUKKAMAR,true);
		$criteria->compare('KLS_IDKELAS',$this->KLS_IDKELAS,true);
		$criteria->compare('KMR_KODEKAMAR',$this->KMR_KODEKAMAR,true);
		$criteria->compare('KMR_KODEBED',$this->KMR_KODEBED,true);
		$criteria->compare('RID_TGLKELUARKAMAR',$this->RID_TGLKELUARKAMAR,true);
		$criteria->compare('RID_STATUSRI',$this->RID_STATUSRI,true);
		$criteria->compare('RID_KONDISIPASIENKELUAR',$this->RID_KONDISIPASIENKELUAR,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchAntrianRI()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('PAS_NOREKAMMEDIK',$this->PAS_NOREKAMMEDIK,true);
		$criteria->compare('REM_TGLKUNJUNGAN',$this->REM_TGLKUNJUNGAN,true);
		$criteria->compare('RID_TGLMASUKKAMAR',$this->RID_TGLMASUKKAMAR,true);
		$criteria->compare('KLS_IDKELAS',$this->KLS_IDKELAS,true);
		$criteria->compare('KMR_KODEKAMAR',$this->KMR_KODEKAMAR,true);
		$criteria->compare('KMR_KODEBED',$this->KMR_KODEBED,true);
		$criteria->compare('RID_TGLKELUARKAMAR',$this->RID_TGLKELUARKAMAR,true);
		$criteria->compare('RID_STATUSRI','=LUNAS',true);
		$criteria->compare('RID_KONDISIPASIENKELUAR',$this->RID_KONDISIPASIENKELUAR,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchPasienRI()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('RID_STATUSRI','=Ya',true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
}