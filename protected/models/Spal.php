<?php

/**
 * This is the model class for table "spal".
 *
 * The followings are the available columns in table 'spal':
 * @property string $id_spal
 * @property integer $id_quotation
 * @property string $SpalNumber
 * @property integer $SpalNo
 * @property integer $SpalMonth
 * @property integer $SpalYear
 * @property string $SpalDate
 * @property string $JenisMuatan
 * @property string $TotalMaxMuatan
 * @property string $KondisiAngkutan
 * @property string $PengirimanBarang
 * @property double $UangTambang
 * @property double $DemurageCost
 * @property string $KeagenanKapal
 * @property string $AsuransiKapal
 * @property string $AsuransiBarang
 * @property string $PihakKedua1
 * @property string $PihakKedua2
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class Spal extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'spal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_quotation, SpalDate, JenisMuatan, TotalMaxMuatan, PosisiKapal, LamaHariBongkarMuat, KondisiAngkutan, PengirimanBarang, UangTambang, DemurageCost, KeagenanKapal, AsuransiKapal, AsuransiBarang, PihakKedua1, PihakKedua2, created_date, created_user, ip_user_updated, LoadingDate1', 'required'),
			array('id_quotation, SpalNo, SpalMonth, SpalYear, id_currency_uang_tambang id_currency_demurage_cost ', 'numerical', 'integerOnly'=>true),
			array('UangTambang, DemurageCost', 'numerical'),
			array('SpalNumber', 'length', 'max'=>64),
			array('JenisMuatan, TotalMaxMuatan, KondisiAngkutan, PengirimanBarang, KeagenanKapal, AsuransiKapal, AsuransiBarang, PihakKedua1, PihakKedua2', 'length', 'max'=>250),
			array('created_user, LoadingDate1, LoadingDate2 ', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_spal, id_quotation, SpalNumber, SpalNo, SpalMonth, SpalYear, SpalDate, JenisMuatan, TotalMaxMuatan, PosisiKapal, LamaHariBongkarMuat, KondisiAngkutan, PengirimanBarang, UangTambang, DemurageCost, KeagenanKapal, AsuransiKapal, AsuransiBarang, PihakKedua1, PihakKedua2, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
			'CurrencyTambang' => array(self::BELONGS_TO, 'Currency', 'id_currency_uang_tambang'),
			'CurrencyDemurage' => array(self::BELONGS_TO, 'Currency', 'id_currency_demurage_cost'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_spal' => 'ID SPAL',
			'id_quotation' => 'ID Quotation',
			'SpalNumber' => 'SPAL Number',
			'SpalNo' => 'SPAL No',
			'SpalMonth' => 'SPAL Month',
			'SpalYear' => 'SPAL Year',
			'SpalDate' => 'SPAL Date',
			'JenisMuatan' => 'Jenis Muatan',
			'PosisiKapal'=>'Posisi Kapal', 
			'LamaHariBongkarMuat'=>'Lama Hari Bongkar Muat',
			'TotalMaxMuatan' => 'Total Max Muatan',
			'KondisiAngkutan' => 'Kondisi Angkutan',
			'PengirimanBarang' => 'Pengiriman Barang',
			'UangTambang' => 'Uang Tambang',
			'DemurageCost' => 'Demurage Cost',
			'KeagenanKapal' => 'Keagenan Kapal',
			'AsuransiKapal' => 'Asuransi Kapal',
			'AsuransiBarang' => 'Asuransi Barang',
			'PihakKedua1' => 'Pihak Kedua 1',
			'PihakKedua2' => 'Pihak Kedua 2',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'ip_user_updated' => 'IP User Updated',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_spal',$this->id_spal,true);
		$criteria->compare('id_quotation',$this->id_quotation);
		$criteria->compare('SpalNumber',$this->SpalNumber,true);
		$criteria->compare('SpalNo',$this->SpalNo);
		$criteria->compare('SpalMonth',$this->SpalMonth);
		$criteria->compare('SpalYear',$this->SpalYear);
		$criteria->compare('SpalDate',$this->SpalDate,true);
		$criteria->compare('JenisMuatan',$this->JenisMuatan,true);
		$criteria->compare('TotalMaxMuatan',$this->TotalMaxMuatan,true);
		$criteria->compare('PosisiKapal',$this->PosisiKapal,true);
		$criteria->compare('LamaHariBongkarMuat',$this->LamaHariBongkarMuat,true);
		$criteria->compare('KondisiAngkutan',$this->KondisiAngkutan,true);
		$criteria->compare('PengirimanBarang',$this->PengirimanBarang,true);
		$criteria->compare('UangTambang',$this->UangTambang);
		$criteria->compare('DemurageCost',$this->DemurageCost);
		$criteria->compare('KeagenanKapal',$this->KeagenanKapal,true);
		$criteria->compare('AsuransiKapal',$this->AsuransiKapal,true);
		$criteria->compare('AsuransiBarang',$this->AsuransiBarang,true);
		$criteria->compare('PihakKedua1',$this->PihakKedua1,true);
		$criteria->compare('PihakKedua2',$this->PihakKedua2,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Spal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
