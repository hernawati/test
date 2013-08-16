<?php

/**
 * This is the model class for table "rekammedik".
 *
 * The followings are the available columns in table 'rekammedik':
 * @property string $PAS_NOREKAMMEDIK
 * @property string $REM_TGLKUNJUNGAN
 * @property string $STF_IDSTAFF
 * @property string $DOK_IDDOKTER
 * @property string $REM_AMNESA
 * @property string $REM_DIAGNOSA
 * @property string $REM_THERAPHY
 * @property string $REM_STATUSPASIEN
 * @property string $REM_STATUSMASUK
 * @property string $REM_STATUSKELUAR
 * @property string $REMTU_ID
 * @property string $REM_BERATBADAN
 * @property string $REM_TEKANANDARAH
 */
class Rekammedik extends CActiveRecord
{

	public $REMTU_NAMA='';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Rekammedik the static model class
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
		return 'rekammedik';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PAS_NOREKAMMEDIK, REM_TGLKUNJUNGAN', 'required'),
			array('PAS_NOREKAMMEDIK, STF_IDSTAFF, DOK_IDDOKTER', 'length', 'max'=>10),
			array('REM_AMNESA, REM_DIAGNOSA, REM_THERAPHY, REM_STATUSMASUK, REM_STATUSKELUAR', 'length', 'max'=>255),
			array('REM_STATUSPASIEN', 'length', 'max'=>4),
			array('REMTU_ID', 'length', 'max'=>50),
			array('REM_TINGGIBADAN', 'length', 'max'=>3),
			array('REM_TINGGIBADAN', 'cektinggi'),
			array('REM_BERATBADAN', 'length', 'max'=>3),
			array('REM_BERATBADAN', 'cekberat'),
			array('REM_TEKANANDARAH','length', 'max'=>7),
			array('REM_JENISPEMBAYARAN','length', 'max'=>10),
			array('REM_TEKANANDARAH','safe'),
			array('REM_TEKANANDARAH','cektekanandarah'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('PAS_NOREKAMMEDIK, REM_TGLKUNJUNGAN,REM_TINGGIBADAN, STF_IDSTAFF, DOK_IDDOKTER, REM_AMNESA, REM_DIAGNOSA, REM_THERAPHY, REM_STATUSPASIEN, REM_STATUSMASUK, REM_STATUSKELUAR, REMTU_ID, REM_BERATBADAN, REM_TEKANANDARAH, REM_JENISPEMBAYARAN', 'safe', 'on'=>'search'),
		);
	}
	
	public function cektekanandarah(){
		if(isset($_POST['sistolik']) && isset($_POST['diastolik']) && $_POST['sistolik'] < $_POST['diastolik']){
			$this->addError('REM_TEKANANDARAH','Sistolik harus lebih besar dari diastolik!');
		}
	}
	public function cektinggi(){
		if(isset($this->REM_TINGGIBADAN) && ($this->REM_TINGGIBADAN <= 0 || $this->REM_TINGGIBADAN >= 250)){
			$this->addError('REM_TINGGIBADAN','Tinggi badan tidak benar!');
		}
	}
	public function cekberat(){
		if(isset($this->REM_BERATBADAN) && ($this->REM_BERATBADAN <= 0 || $this->REM_BERATBADAN >= 200)){
			$this->addError('REM_BERATBADAN','Berat badan tidak benar!');
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
			//'pasien' => array(self::HAS_ONE, 'Pasien', 'PAS_NOREKAMMEDIK'),
			'tujuan' => array(self::BELONGS_TO, 'Rekammediktujuan', 'REMTU_ID'),
			'pasien'=>array(self::BELONGS_TO,'Pasien','PAS_NOREKAMMEDIK'),
			'staf'=>array(self::BELONGS_TO,'Staff','STF_IDSTAFF'),
			'dokter'=>array(self::BELONGS_TO,'Dokter','DOK_IDDOKTER'),
			'suratsehat'=>array(self::HAS_ONE,'Suratsehat','PAS_NOREKAMMEDIK,REM_TGLKUNJUNGAN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'PAS_NOREKAMMEDIK' => 'No Rekam Medik',
			'REM_TGLKUNJUNGAN' => 'Tgl Kunjungan',
			'STF_IDSTAFF' => 'ID Staff',
			'DOK_IDDOKTER' => 'ID Dokter',
			'REM_AMNESA' => 'Anamnesa',
			'REM_DIAGNOSA' => 'Diagnosis',
			'IGD_NAMA_RUANGAN' => 'Nama Ruangan IGD',
			'REM_THERAPHY' => 'Terapi',
			'REM_STATUSPASIEN' => 'Status Pasien',
			'REM_STATUSMASUK' => 'Status Masuk',
			'REM_STATUSKELUAR' => 'Status Keluar',
			'REM_STATUSPEMBAYARAN' => 'Status Pembayaran',
			'REMTU_ID' => 'Poliklinik / IGD',
			'REM_BERATBADAN' => 'Berat Badan',
			'REM_TEKANANDARAH' => 'Tekanan Darah',
			'REM_TINGGIBADAN' => 'Tinggi Badan',
			'REM_JENISPEMBAYARAN' => 'Jenis Pembayaran',
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
		$criteria->compare('STF_IDSTAFF',$this->STF_IDSTAFF,true);
		$criteria->compare('DOK_IDDOKTER',$this->DOK_IDDOKTER,true);
		$criteria->compare('REM_AMNESA',$this->REM_AMNESA,true);
		$criteria->compare('REM_DIAGNOSA',$this->REM_DIAGNOSA,true);
		$criteria->compare('REM_THERAPHY',$this->REM_THERAPHY,true);
		$criteria->compare('REM_STATUSPASIEN',$this->REM_STATUSPASIEN,true);
		$criteria->compare('REM_STATUSMASUK',$this->REM_STATUSMASUK,true);
		$criteria->compare('REM_STATUSKELUAR',$this->REM_STATUSKELUAR,true);
		$criteria->compare('REMTU_ID',$this->REMTU_ID,true);
		$criteria->compare('REM_BERATBADAN',$this->REM_BERATBADAN,true);
		$criteria->compare('REM_TEKANANDARAH',$this->REM_TEKANANDARAH,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchPasienRJ(){
		$criteria=new CDbCriteria;
		
		$criteria->compare('REM_STATUSKELUAR','<>NULL',$this->REM_STATUSKELUAR,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}