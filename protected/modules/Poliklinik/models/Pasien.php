<?php

/**
 * This is the model class for table "pasien".
 *
 * The followings are the available columns in table 'pasien':
 * @property string $PAS_NOREKAMMEDIK
 * @property string $ASR_IDASURANSI
 * @property string $PAS_NAMAPASIEN
 * @property string $PAS_TGLLAHIR
 * @property string $PAS_PEKERJAAN
 * @property string $PAS_ALAMAT
 * @property string $PAS_JENISKELAMIN
 * @property string $PAS_STATUSPEMBAYARAN
 * @property string $PAS_TGLPENDAFTARAN
 */
 
class Pasien extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pasien the static model class
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
		return 'pasien';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PAS_NOREKAMMEDIK,PAS_NAMAPASIEN,PAS_TGLPENDAFTARAN', 'required'),
			array('PAS_NOREKAMMEDIK', 'unique'),
			array('PAS_NOREKAMMEDIK, ASR_IDASURANSI, PAS_JENISKELAMIN', 'length', 'max'=>10),
			array('PAS_NAMAPASIEN', 'length', 'max'=>50),
			array('PAS_PEKERJAAN', 'length', 'max'=>255),
			array('PAS_STATUSPEMBAYARAN', 'length', 'max'=>25),
			//array('PAS_TGLLAHIR,PAS_TGLPENDAFTARAN','date','format'=>'yyyy-m-d H:m:s'),
			array('PAS_TGLLAHIR','cektanggallahir'),
			array('PAS_TGLPENDAFTARAN','cektanggalpendaftaran'),
			array('PAS_TGLLAHIR, PAS_ALAMAT, PAS_TGLPENDAFTARAN', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('PAS_NOREKAMMEDIK, ASR_IDASURANSI, PAS_NAMAPASIEN, PAS_TGLLAHIR, PAS_PEKERJAAN, PAS_ALAMAT, PAS_JENISKELAMIN, PAS_STATUSPEMBAYARAN, PAS_TGLPENDAFTARAN', 'safe', 'on'=>'search'),
		);
	}
	
	public function cektanggallahir(){
		if($this->PAS_TGLLAHIR > date("Y-m-d H:i:s")){
			$this->addError('PAS_TGLLAHIR','Tanggal lahir tidak boleh melewati tanggal hari ini!');
		}
	}
	public function cektanggalpendaftaran(){
		if($this->PAS_TGLPENDAFTARAN > date("Y-M-d H:i:s")){
			$this->addError('PAS_TGLPENDAFTARAN','Tanggal pendaftaran tidak boleh melewati tanggal hari ini!');
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
			'asuransi'=>array(self::BELONGS_TO, 'Asuransi', 'ASR_IDASURANSI'),
			'rekammedik'=>array(self::HAS_MANY, 'Rekammediktujuan', 'PAS_NOREKAMMEDIK'),
			'rikontrolobats'=>array(self::HAS_MANY, 'RiKontrolobat', 'PAS_NOREKAMMEDIK'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'PAS_NOREKAMMEDIK' => 'No Rekam Medik',
			'ASR_IDASURANSI' => 'ID Asuransi',
			'PAS_NAMAPASIEN' => 'Nama',
			'PAS_TGLLAHIR' => 'Tanggal Lahir',
			'PAS_PEKERJAAN' => 'Pekerjaan',
			'PAS_ALAMAT' => 'Alamat',
			'PAS_JENISKELAMIN' => 'Jenis Kelamin',
			'PAS_STATUSPEMBAYARAN' => 'Status Pembayaran',
			'PAS_TGLPENDAFTARAN' => 'Tgl. Pendaftaran',
			'PAS_GOLONGANDARAH' => 'Golongan Darah',
			'PAS_AGAMA' => 'Agama',
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
		$criteria->compare('ASR_IDASURANSI',$this->ASR_IDASURANSI,true);
		$criteria->compare('PAS_NAMAPASIEN',$this->PAS_NAMAPASIEN,true);
		$criteria->compare('PAS_TGLLAHIR',$this->PAS_TGLLAHIR,true);
		$criteria->compare('PAS_PEKERJAAN',$this->PAS_PEKERJAAN,true);
		$criteria->compare('PAS_ALAMAT',$this->PAS_ALAMAT,true);
		$criteria->compare('PAS_JENISKELAMIN',$this->PAS_JENISKELAMIN,true);
		$criteria->compare('PAS_STATUSPEMBAYARAN',$this->PAS_STATUSPEMBAYARAN,true);
		$criteria->compare('PAS_TGLPENDAFTARAN',$this->PAS_TGLPENDAFTARAN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function cari($keyword='')
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('PAS_NOREKAMMEDIK',$keyword,true,'OR');
		$criteria->compare('ASR_IDASURANSI',$keyword,true,'OR');
		$criteria->compare('PAS_NAMAPASIEN',$keyword,true,'OR');
		$criteria->compare('PAS_TGLLAHIR',$keyword,true,'OR');
		$criteria->compare('PAS_PEKERJAAN',$keyword,true,'OR');
		$criteria->compare('PAS_ALAMAT',$keyword,true,'OR');
		$criteria->compare('PAS_JENISKELAMIN',$keyword,true,'OR');
		$criteria->compare('PAS_STATUSPEMBAYARAN',$keyword,true,'OR');
		$criteria->compare('PAS_TGLPENDAFTARAN',$keyword,true,'OR');
		$criteria->compare('PAS_AGAMA',$keyword,true,'OR');
		$criteria->compare('PAS_GOLONGANDARAH',$keyword,true,'OR');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}