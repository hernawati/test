<?php

/**
 * This is the model class for table "rj_layanan".
 *
 * The followings are the available columns in table 'rj_layanan':
 * @property string $PAS_NOREKAMMEDIK
 * @property string $REM_TGLKUNJUNGAN
 * @property string $LAY_IDLAYANAN
 * @property string $RJL_STATUSPENANGANAN
 * @property string $RJL_STATUSPEMBAYARAN
 * @property string $RJL_STATUSBERKAS
 * @property string $RJL_PENERIMABERKAS
 */
class RjLayanan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RjLayanan the static model class
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
		return 'rj_layanan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('PAS_NOREKAMMEDIK+REM_TGLKUNJUNGAN+RJL_TGLLAYANAN+LAY_IDLAYANAN', 'application.extensions.UniqueMultiColumnValidator'),
			array('PAS_NOREKAMMEDIK, REM_TGLKUNJUNGAN', 'required'),
			array('PAS_NOREKAMMEDIK, LAY_IDLAYANAN', 'length', 'max'=>10),
			array('RJL_STATUSPENANGANAN', 'length', 'max'=>16),
			array('RJL_STATUSPEMBAYARAN', 'length', 'max'=>25),
			array('RJL_STATUSBERKAS', 'length', 'max'=>50),
			array('RJL_PENERIMABERKAS', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('PAS_NOREKAMMEDIK, REM_TGLKUNJUNGAN, RJL_TGLLAYANAN, LAY_IDLAYANAN, RJL_STATUSPENANGANAN, RJL_STATUSPEMBAYARAN, RJL_STATUSBERKAS, RJL_PENERIMABERKAS', 'safe', 'on'=>'search'),
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
			'layanan' => array(self::BELONGS_TO, 'Layanan', 'LAY_IDLAYANAN'),
			'pasien' => array(self::BELONGS_TO, 'Pasien', 'PAS_NOREKAMMEDIK'),
			'rekammedik' => array(self::BELONGS_TO, 'Rekammedik', 'PAS_NOREKAMMEDIK,REM_TGLKUNJUNGAN'),
			'riDetail' => array(self::BELONGS_TO, 'RiDetail', 'PAS_NOREKAMMEDIK,REM_TGLKUNJUNGAN,RID_TGLMASUKKAMAR'),
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
			'RJL_TGLLAYANAN' => 'Tgl Layanan',
			'LAY_IDLAYANAN' => 'ID Layanan',
			'RJL_STATUSPENANGANAN' => 'Status Penanganan',
			'RJL_STATUSPEMBAYARAN' => 'Status Pembayaran',
			'RJL_STATUSBERKAS' => 'Status Berkas',
			'RJL_PENERIMABERKAS' => 'Penerima Berkas',
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

		$criteria=new CDbCriteria(array(
			'order'=>'REM_TGLKUNJUNGAN ASC',
		));

		$criteria->compare('PAS_NOREKAMMEDIK',$this->PAS_NOREKAMMEDIK,true);
		$criteria->compare('REM_TGLKUNJUNGAN',$this->REM_TGLKUNJUNGAN,true);
		$criteria->compare('LAY_IDLAYANAN',$this->LAY_IDLAYANAN,true);
		$criteria->compare('RJL_TGLLAYANAN',$this->RJL_TGLLAYANAN,true);
		$criteria->compare('RJL_STATUSPENANGANAN',$this->RJL_STATUSPENANGANAN,true);
		$criteria->compare('RJL_STATUSPEMBAYARAN',$this->RJL_STATUSPEMBAYARAN,true);
		$criteria->compare('RJL_STATUSBERKAS',$this->RJL_STATUSBERKAS,true);
		$criteria->compare('RJL_PENERIMABERKAS',$this->RJL_PENERIMABERKAS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchUmum(){
		$criteria=new CDbCriteria(array(
			'order'=>'REM_TGLKUNJUNGAN ASC',
		));
		$criteria->with=array('pasien');
		$criteria->together=true;
		$criteria->group='t.PAS_NOREKAMMEDIK';
		$criteria->compare('pasien.PAS_STATUSPEMBAYARAN','=UMUM',true);
		$criteria->compare('RJL_STATUSPENANGANAN','=Belum Ditangani',true);
		$criteria->compare('RJL_STATUSPEMBAYARAN','=Belum Lunas',true);

		$criteria->compare('PAS_NOREKAMMEDIK',$this->PAS_NOREKAMMEDIK,true);
		$criteria->compare('REM_TGLKUNJUNGAN',$this->REM_TGLKUNJUNGAN,true);
		$criteria->compare('LAY_IDLAYANAN',$this->LAY_IDLAYANAN,true);
		$criteria->compare('RJL_TGLLAYANAN',$this->RJL_TGLLAYANAN,true);
		$criteria->compare('RJL_STATUSBERKAS',$this->RJL_STATUSBERKAS,true);
		$criteria->compare('RJL_PENERIMABERKAS',$this->RJL_PENERIMABERKAS,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchAskes()
	{
		$criteria=new CDbCriteria(array(
			'order'=>'REM_TGLKUNJUNGAN ASC',
		));
		$criteria->with=array('pasien');
		$criteria->together=true;
		$criteria->compare('pasien.PAS_STATUSPEMBAYARAN','=ASURANSI',true,'AND');
		$criteria->compare('pasien.ASR_IDASURANSI','=ASR.0001',true,'AND');
		$criteria->compare('RJL_STATUSPENANGANAN','=Belum Ditangani',true,'AND');
		$criteria->compare('RJL_STATUSPEMBAYARAN','<> ASKES',true,'AND');
		$criteria->compare('RJL_STATUSPEMBAYARAN','=Belum Lunas',true,'AND');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchBerkasAskes()
	{
		$criteria=new CDbCriteria(array(
			'order'=>'REM_TGLKUNJUNGAN ASC',
		));
		$criteria->with = array('pasien');
		$criteria->together=true;
		$criteria->compare('pasien.PAS_STATUSPEMBAYARAN','=ASURANSI',true);
		$criteria->compare('pasien.ASR_IDASURANSI','=ASKES',true);
		$criteria->compare('RJL_STATUSPEMBAYARAN','=ASKES',true);
		$criteria->compare('RJL_STATUSBERKAS','=Belum Diserahkan',true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchLogAskes()
	{
		$criteria=new CDbCriteria(array(
			'order'=>'REM_TGLKUNJUNGAN ASC',
		));
		$criteria->with = array('pasien');
		$criteria->together=true;
		$criteria->compare('pasien.PAS_STATUSPEMBAYARAN','ASURANSI',true);
		$criteria->compare('pasien.ASR_IDASURANSI','ASKES',true);
		$criteria->compare('RJL_STATUSPEMBAYARAN','=ASKES',true);
		$criteria->compare('RJL_PENERIMABERKAS','=ASKES',true);
		$criteria->compare('RJL_STATUSBERKAS','=Sudah Diserahkan',true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}