<?php

/**
 * This is the model class for table "resep_obat".
 *
 * The followings are the available columns in table 'resep_obat':
 * @property string $APTREQ_NOMORORDER
 * @property string $GFREQ_NOMORORDER
 * @property string $OBT_KODEOBAT
 * @property string $GF_PASIENTUJUANOBAT
 * @property string $PAS_NOREKAMMEDIK
 * @property string $REM_TGLKUNJUNGAN
 * @property string $RES_TANGGALRESEP
 * @property integer $RES_JUMLAHOBAT
 * @property string $RES_SATUANKONSUMSI
 * @property string $RES_DOSISKONSUMSI
 * @property string $RES_STATUSPEMBAYARAN
 */
class ResepObat extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ResepObat the static model class
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
		return 'resep_obat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('OBT_KODEOBAT, GF_PASIENTUJUANOBAT, PAS_NOREKAMMEDIK, REM_TGLKUNJUNGAN', 'required'),
			array('APTREQ_NOMORORDER, GFREQ_NOMORORDER', 'safe','on'=>'search'),
			array('RES_JUMLAHOBAT', 'numerical', 'integerOnly'=>true),
			array('APTREQ_NOMORORDER, GFREQ_NOMORORDER, OBT_KODEOBAT, PAS_NOREKAMMEDIK', 'length', 'max'=>10),
			array('GF_PASIENTUJUANOBAT', 'length', 'max'=>100),
			array('RES_SATUANKONSUMSI, RES_DOSISKONSUMSI, RES_STATUSPEMBAYARAN', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('APTREQ_NOMORORDER, GFREQ_NOMORORDER, OBT_KODEOBAT, GF_PASIENTUJUANOBAT, PAS_NOREKAMMEDIK, REM_TGLKUNJUNGAN, RES_TANGGALRESEP, RES_JUMLAHOBAT, RES_SATUANKONSUMSI, RES_DOSISKONSUMSI, RES_STATUSPEMBAYARAN', 'safe', 'on'=>'search'),
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
			'obat' => array(self::BELONGS_TO, 'Obat', 'OBT_KODEOBAT'),
			'pasien' => array(self::BELONGS_TO, 'Pasien', 'PAS_NOREKAMMEDIK'),
			'rekammedik' => array(self::BELONGS_TO, 'Rekammedik', 'PAS_NOREKAMMEDIK,REM_TGLKUNJUNGAN'),
			'aptObat' => array(self::BELONGS_TO, 'AptObat', 'APTREQ_NOMORORDER,GFREQ_NOMORORDER,OBT_KODEOBAT,GF_PASIENTUJUANOBAT'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'APTREQ_NOMORORDER' => 'No Apotek',
			'GFREQ_NOMORORDER' => 'No Gudang Farmasi',
			'OBT_KODEOBAT' => 'Kode Obat',
			'GF_PASIENTUJUANOBAT' => 'Pasien Tujuan',
			'PAS_NOREKAMMEDIK' => 'No Rekam Medik',
			'REM_TGLKUNJUNGAN' => 'Tgl Kunjungan',
			'RES_TANGGALRESEP' => 'Tgl Resep',
			'RES_JUMLAHOBAT' => 'Jumlah Obat',
			'RES_SATUANKONSUMSI' => 'Satuan Konsumsi',
			'RES_DOSISKONSUMSI' => 'Dosis Konsumsi',
			'RES_STATUSPEMBAYARAN' => 'Status Pembayaran',
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

		$criteria->compare('APTREQ_NOMORORDER',$this->APTREQ_NOMORORDER,true);
		$criteria->compare('GFREQ_NOMORORDER',$this->GFREQ_NOMORORDER,true);
		$criteria->compare('OBT_KODEOBAT',$this->OBT_KODEOBAT,true);
		$criteria->compare('GF_PASIENTUJUANOBAT',$this->GF_PASIENTUJUANOBAT,true);
		$criteria->compare('PAS_NOREKAMMEDIK',$this->PAS_NOREKAMMEDIK,true);
		$criteria->compare('REM_TGLKUNJUNGAN',$this->REM_TGLKUNJUNGAN,true);
		$criteria->compare('RES_TANGGALRESEP',$this->RES_TANGGALRESEP,true);
		$criteria->compare('RES_JUMLAHOBAT',$this->RES_JUMLAHOBAT);
		$criteria->compare('RES_SATUANKONSUMSI',$this->RES_SATUANKONSUMSI,true);
		$criteria->compare('RES_DOSISKONSUMSI',$this->RES_DOSISKONSUMSI,true);
		$criteria->compare('RES_STATUSPEMBAYARAN',$this->RES_STATUSPEMBAYARAN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	public function searchRujukanResepObat()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->select='PAS_NOREKAMMEDIK,REM_TGLKUNJUNGAN';
		$criteria->group='PAS_NOREKAMMEDIK,REM_TGLKUNJUNGAN';
		$criteria->condition="RES_STATUSPEMBAYARAN='Belum Lunas' AND MONTH(RES_TANGGALRESEP)=MONTH(CURDATE()) AND DAY(RES_TANGGALRESEP)=DAY(CURDATE()) AND YEAR(RES_TANGGALRESEP)=YEAR(CURDATE())";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchHarian()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('APTREQ_NOMORORDER',$this->APTREQ_NOMORORDER,true);
		$criteria->compare('GFREQ_NOMORORDER',$this->GFREQ_NOMORORDER,true);
		$criteria->compare('OBT_KODEOBAT',$this->OBT_KODEOBAT,true);
		$criteria->compare('GF_PASIENTUJUANOBAT',$this->GF_PASIENTUJUANOBAT,true);
		$criteria->compare('PAS_NOREKAMMEDIK',$this->PAS_NOREKAMMEDIK,true);
		$criteria->compare('DAY(REM_TGLKUNJUNGAN)','='.date("d"),true);
		$criteria->compare('RES_TANGGALRESEP',$this->RES_TANGGALRESEP,true);
		$criteria->compare('RES_JUMLAHOBAT',$this->RES_JUMLAHOBAT);
		$criteria->compare('RES_SATUANKONSUMSI',$this->RES_SATUANKONSUMSI,true);
		$criteria->compare('RES_DOSISKONSUMSI',$this->RES_DOSISKONSUMSI,true);
		$criteria->compare('RES_STATUSPEMBAYARAN',$this->RES_STATUSPEMBAYARAN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchMingguan()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('APTREQ_NOMORORDER',$this->APTREQ_NOMORORDER,true);
		$criteria->compare('GFREQ_NOMORORDER',$this->GFREQ_NOMORORDER,true);
		$criteria->compare('OBT_KODEOBAT',$this->OBT_KODEOBAT,true);
		$criteria->compare('GF_PASIENTUJUANOBAT',$this->GF_PASIENTUJUANOBAT,true);
		$criteria->compare('PAS_NOREKAMMEDIK',$this->PAS_NOREKAMMEDIK,true);
		//$criteria->compare('YEAR(REM_TGLKUNJUNGAN)','='.date("Y"),true);
		//$criteria->compare('MONTH(REM_TGLKUNJUNGAN)','='.date("m"),true);
		//$criteria->compare('day(REM_TGLKUNJUNGAN)','='.date("d"),true);
		$criteria->compare('day(REM_TGLKUNJUNGAN)','>='.date("d")-7,true);
		$criteria->compare('RES_TANGGALRESEP',$this->RES_TANGGALRESEP,true);
		$criteria->compare('RES_JUMLAHOBAT',$this->RES_JUMLAHOBAT);
		$criteria->compare('RES_SATUANKONSUMSI',$this->RES_SATUANKONSUMSI,true);
		$criteria->compare('RES_DOSISKONSUMSI',$this->RES_DOSISKONSUMSI,true);
		$criteria->compare('RES_STATUSPEMBAYARAN',$this->RES_STATUSPEMBAYARAN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchBulanan()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('APTREQ_NOMORORDER',$this->APTREQ_NOMORORDER,true);
		$criteria->compare('GFREQ_NOMORORDER',$this->GFREQ_NOMORORDER,true);
		$criteria->compare('OBT_KODEOBAT',$this->OBT_KODEOBAT,true);
		$criteria->compare('GF_PASIENTUJUANOBAT',$this->GF_PASIENTUJUANOBAT,true);
		$criteria->compare('PAS_NOREKAMMEDIK',$this->PAS_NOREKAMMEDIK,true);
		$criteria->compare('MONTH(REM_TGLKUNJUNGAN)','='.date("m"),true);
		$criteria->compare('RES_TANGGALRESEP',$this->RES_TANGGALRESEP,true);
		$criteria->compare('RES_JUMLAHOBAT',$this->RES_JUMLAHOBAT);
		$criteria->compare('RES_SATUANKONSUMSI',$this->RES_SATUANKONSUMSI,true);
		$criteria->compare('RES_DOSISKONSUMSI',$this->RES_DOSISKONSUMSI,true);
		$criteria->compare('RES_STATUSPEMBAYARAN',$this->RES_STATUSPEMBAYARAN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchTahunan()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('APTREQ_NOMORORDER',$this->APTREQ_NOMORORDER,true);
		$criteria->compare('GFREQ_NOMORORDER',$this->GFREQ_NOMORORDER,true);
		$criteria->compare('OBT_KODEOBAT',$this->OBT_KODEOBAT,true);
		$criteria->compare('GF_PASIENTUJUANOBAT',$this->GF_PASIENTUJUANOBAT,true);
		$criteria->compare('PAS_NOREKAMMEDIK',$this->PAS_NOREKAMMEDIK,true);
		$criteria->compare('YEAR(REM_TGLKUNJUNGAN)','='.date("Y"),true);
		$criteria->compare('RES_TANGGALRESEP',$this->RES_TANGGALRESEP,true);
		$criteria->compare('RES_JUMLAHOBAT',$this->RES_JUMLAHOBAT);
		$criteria->compare('RES_SATUANKONSUMSI',$this->RES_SATUANKONSUMSI,true);
		$criteria->compare('RES_DOSISKONSUMSI',$this->RES_DOSISKONSUMSI,true);
		$criteria->compare('RES_STATUSPEMBAYARAN',$this->RES_STATUSPEMBAYARAN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchHarianUmum()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('APTREQ_NOMORORDER',$this->APTREQ_NOMORORDER,true);
		$criteria->compare('GFREQ_NOMORORDER',$this->GFREQ_NOMORORDER,true);
		$criteria->compare('OBT_KODEOBAT',$this->OBT_KODEOBAT,true);
		$criteria->compare('GF_PASIENTUJUANOBAT',$this->GF_PASIENTUJUANOBAT,true);
		$criteria->condition='GF_PASIENTUJUANOBAT like "Umum"';
		$criteria->compare('PAS_NOREKAMMEDIK',$this->PAS_NOREKAMMEDIK,true);
		$criteria->compare('DAY(REM_TGLKUNJUNGAN)','='.date("d"),true);
		$criteria->compare('RES_TANGGALRESEP',$this->RES_TANGGALRESEP,true);
		$criteria->compare('RES_JUMLAHOBAT',$this->RES_JUMLAHOBAT);
		$criteria->compare('RES_SATUANKONSUMSI',$this->RES_SATUANKONSUMSI,true);
		$criteria->compare('RES_DOSISKONSUMSI',$this->RES_DOSISKONSUMSI,true);
		$criteria->compare('RES_STATUSPEMBAYARAN',$this->RES_STATUSPEMBAYARAN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchMingguanUmum()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('APTREQ_NOMORORDER',$this->APTREQ_NOMORORDER,true);
		$criteria->compare('GFREQ_NOMORORDER',$this->GFREQ_NOMORORDER,true);
		$criteria->compare('OBT_KODEOBAT',$this->OBT_KODEOBAT,true);
		$criteria->compare('GF_PASIENTUJUANOBAT',$this->GF_PASIENTUJUANOBAT,true);
		$criteria->condition='GF_PASIENTUJUANOBAT like "Umum"';
		$criteria->compare('PAS_NOREKAMMEDIK',$this->PAS_NOREKAMMEDIK,true);
		//$criteria->compare('YEAR(REM_TGLKUNJUNGAN)','='.date("Y"),true);
		//$criteria->compare('MONTH(REM_TGLKUNJUNGAN)','='.date("m"),true);
		//$criteria->compare('day(REM_TGLKUNJUNGAN)','='.date("d"),true);
		//$criteria->compare('day(REM_TGLKUNJUNGAN)','>='.date("d")-7,true);
		$criteria->compare('RES_TANGGALRESEP',$this->RES_TANGGALRESEP,true);
		$criteria->compare('RES_JUMLAHOBAT',$this->RES_JUMLAHOBAT);
		$criteria->compare('RES_SATUANKONSUMSI',$this->RES_SATUANKONSUMSI,true);
		$criteria->compare('RES_DOSISKONSUMSI',$this->RES_DOSISKONSUMSI,true);
		$criteria->compare('RES_STATUSPEMBAYARAN',$this->RES_STATUSPEMBAYARAN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchBulananUmum()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('APTREQ_NOMORORDER',$this->APTREQ_NOMORORDER,true);
		$criteria->compare('GFREQ_NOMORORDER',$this->GFREQ_NOMORORDER,true);
		$criteria->compare('OBT_KODEOBAT',$this->OBT_KODEOBAT,true);
		$criteria->compare('GF_PASIENTUJUANOBAT',$this->GF_PASIENTUJUANOBAT,true);
		$criteria->condition='GF_PASIENTUJUANOBAT like "Umum"';
		$criteria->compare('PAS_NOREKAMMEDIK',$this->PAS_NOREKAMMEDIK,true);
		$criteria->compare('MONTH(REM_TGLKUNJUNGAN)','='.date("m"),true);
		$criteria->compare('RES_TANGGALRESEP',$this->RES_TANGGALRESEP,true);
		$criteria->compare('RES_JUMLAHOBAT',$this->RES_JUMLAHOBAT);
		$criteria->compare('RES_SATUANKONSUMSI',$this->RES_SATUANKONSUMSI,true);
		$criteria->compare('RES_DOSISKONSUMSI',$this->RES_DOSISKONSUMSI,true);
		$criteria->compare('RES_STATUSPEMBAYARAN',$this->RES_STATUSPEMBAYARAN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchTahunanUmum()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('APTREQ_NOMORORDER',$this->APTREQ_NOMORORDER,true);
		$criteria->compare('GFREQ_NOMORORDER',$this->GFREQ_NOMORORDER,true);
		$criteria->compare('OBT_KODEOBAT',$this->OBT_KODEOBAT,true);
		$criteria->compare('GF_PASIENTUJUANOBAT',$this->GF_PASIENTUJUANOBAT,true);
		$criteria->condition='GF_PASIENTUJUANOBAT like "Umum"';
		$criteria->compare('PAS_NOREKAMMEDIK',$this->PAS_NOREKAMMEDIK,true);
		$criteria->compare('YEAR(REM_TGLKUNJUNGAN)','='.date("Y"),true);
		$criteria->compare('RES_TANGGALRESEP',$this->RES_TANGGALRESEP,true);
		$criteria->compare('RES_JUMLAHOBAT',$this->RES_JUMLAHOBAT);
		$criteria->compare('RES_SATUANKONSUMSI',$this->RES_SATUANKONSUMSI,true);
		$criteria->compare('RES_DOSISKONSUMSI',$this->RES_DOSISKONSUMSI,true);
		$criteria->compare('RES_STATUSPEMBAYARAN',$this->RES_STATUSPEMBAYARAN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function searchHarianAsuransi()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('APTREQ_NOMORORDER',$this->APTREQ_NOMORORDER,true);
		$criteria->compare('GFREQ_NOMORORDER',$this->GFREQ_NOMORORDER,true);
		$criteria->compare('OBT_KODEOBAT',$this->OBT_KODEOBAT,true);
		$criteria->compare('GF_PASIENTUJUANOBAT',$this->GF_PASIENTUJUANOBAT,true);
		$criteria->condition='GF_PASIENTUJUANOBAT like "ASKES"';
		$criteria->compare('PAS_NOREKAMMEDIK',$this->PAS_NOREKAMMEDIK,true);
		$criteria->compare('DAY(REM_TGLKUNJUNGAN)','='.date("d"),true);
		$criteria->compare('RES_TANGGALRESEP',$this->RES_TANGGALRESEP,true);
		$criteria->compare('RES_JUMLAHOBAT',$this->RES_JUMLAHOBAT);
		$criteria->compare('RES_SATUANKONSUMSI',$this->RES_SATUANKONSUMSI,true);
		$criteria->compare('RES_DOSISKONSUMSI',$this->RES_DOSISKONSUMSI,true);
		$criteria->compare('RES_STATUSPEMBAYARAN',$this->RES_STATUSPEMBAYARAN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchMingguanAsuransi()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('APTREQ_NOMORORDER',$this->APTREQ_NOMORORDER,true);
		$criteria->compare('GFREQ_NOMORORDER',$this->GFREQ_NOMORORDER,true);
		$criteria->compare('OBT_KODEOBAT',$this->OBT_KODEOBAT,true);
		$criteria->compare('GF_PASIENTUJUANOBAT',$this->GF_PASIENTUJUANOBAT,true);
		$criteria->condition='GF_PASIENTUJUANOBAT like "ASKES"';
		$criteria->compare('PAS_NOREKAMMEDIK',$this->PAS_NOREKAMMEDIK,true);
		$criteria->compare('YEAR(REM_TGLKUNJUNGAN)','='.date("Y"),true);
		$criteria->compare('MONTH(REM_TGLKUNJUNGAN)','='.date("m"),true);
		$criteria->compare('day(REM_TGLKUNJUNGAN)','='.date("d"),true);
		//$criteria->compare('day(REM_TGLKUNJUNGAN)','>='.date("d")-7,true);
		$criteria->compare('RES_TANGGALRESEP',$this->RES_TANGGALRESEP,true);
		$criteria->compare('RES_JUMLAHOBAT',$this->RES_JUMLAHOBAT);
		$criteria->compare('RES_SATUANKONSUMSI',$this->RES_SATUANKONSUMSI,true);
		$criteria->compare('RES_DOSISKONSUMSI',$this->RES_DOSISKONSUMSI,true);
		$criteria->compare('RES_STATUSPEMBAYARAN',$this->RES_STATUSPEMBAYARAN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchBulananAsuransi()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('APTREQ_NOMORORDER',$this->APTREQ_NOMORORDER,true);
		$criteria->compare('GFREQ_NOMORORDER',$this->GFREQ_NOMORORDER,true);
		$criteria->compare('OBT_KODEOBAT',$this->OBT_KODEOBAT,true);
		$criteria->compare('GF_PASIENTUJUANOBAT',$this->GF_PASIENTUJUANOBAT,true);
		$criteria->condition='GF_PASIENTUJUANOBAT like "ASKES"';
		$criteria->compare('PAS_NOREKAMMEDIK',$this->PAS_NOREKAMMEDIK,true);
		$criteria->compare('MONTH(REM_TGLKUNJUNGAN)','='.date("m"),true);
		$criteria->compare('RES_TANGGALRESEP',$this->RES_TANGGALRESEP,true);
		$criteria->compare('RES_JUMLAHOBAT',$this->RES_JUMLAHOBAT);
		$criteria->compare('RES_SATUANKONSUMSI',$this->RES_SATUANKONSUMSI,true);
		$criteria->compare('RES_DOSISKONSUMSI',$this->RES_DOSISKONSUMSI,true);
		$criteria->compare('RES_STATUSPEMBAYARAN',$this->RES_STATUSPEMBAYARAN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchTahunanAsuransi()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('APTREQ_NOMORORDER',$this->APTREQ_NOMORORDER,true);
		$criteria->compare('GFREQ_NOMORORDER',$this->GFREQ_NOMORORDER,true);
		$criteria->compare('OBT_KODEOBAT',$this->OBT_KODEOBAT,true);
		$criteria->compare('GF_PASIENTUJUANOBAT',$this->GF_PASIENTUJUANOBAT,true);
		$criteria->condition='GF_PASIENTUJUANOBAT like "ASKES"';
		$criteria->compare('PAS_NOREKAMMEDIK',$this->PAS_NOREKAMMEDIK,true);
		$criteria->compare('YEAR(REM_TGLKUNJUNGAN)','='.date("Y"),true);
		$criteria->compare('RES_TANGGALRESEP',$this->RES_TANGGALRESEP,true);
		$criteria->compare('RES_JUMLAHOBAT',$this->RES_JUMLAHOBAT);
		$criteria->compare('RES_SATUANKONSUMSI',$this->RES_SATUANKONSUMSI,true);
		$criteria->compare('RES_DOSISKONSUMSI',$this->RES_DOSISKONSUMSI,true);
		$criteria->compare('RES_STATUSPEMBAYARAN',$this->RES_STATUSPEMBAYARAN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}