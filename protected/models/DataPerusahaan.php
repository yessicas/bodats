<?php

/**
 * This is the model class for table "data_perusahaan".
 *
 * The followings are the available columns in table 'data_perusahaan':
 * @property string $id_perusahaan
 * @property string $code_id
 * @property string $nama_perusahaan
 * @property string $alamat
 * @property string $izin_usaha
 * @property string $deskripsi
 * @property string $id_bidang_usaha
 * @property string $bidang_usaha
 * @property string $id_country
 * @property string $country
 * @property string $foto_logo
 * @property string $foto_profil
 *
 * The followings are the available model relations:
 * @property UserPerusahaan[] $userPerusahaans
 */
class DataPerusahaan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'data_perusahaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_perusahaan', 'required'),
			array('nama_perusahaan, alamat, id_bidang_usaha, id_country', 'required','on'=>'activatedcompany'),
			array('nama_perusahaan, country, foto_logo, foto_profil', 'length', 'max'=>150),
			array('deskripsi, alamat, izin_usaha', 'length', 'max'=>250),
			array('id_bidang_usaha, id_country', 'length', 'max'=>20),
			array('nama_perusahaan' , 'ceknamaperusahaan','on'=>'insert'),
			array('code_id', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_perusahaan, nama_perusahaan, alamat, izin_usaha, deskripsi, id_bidang_usaha, bidang_usaha, id_country, country, foto_logo, foto_profil', 'safe', 'on'=>'search'),
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
			'UserPerusahaan' => array(self::HAS_MANY, 'UserPerusahaan', 'id_perusahaan'),
			'BidangUsaha' => array(self::BELONGS_TO, 'BidangUsaha', 'id_bidang_usaha'),
			'Country' => array(self::BELONGS_TO, 'Country', 'id_country'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_perusahaan' => 'ID Perusahaan',
			'code_id' => 'Code',
			'nama_perusahaan' => Yii::t('strings','Company Name'),
			'alamat' => Yii::t('strings','Address'),
			'izin_usaha' => Yii::t('strings','Business License'),
			'deskripsi' => Yii::t('strings','Description'),
			'id_bidang_usaha' => Yii::t('strings','Line Of Business'),
			'bidang_usaha' => Yii::t('strings','Line Of Business'),
			'id_country' => Yii::t('strings','Country'),
			'country' => Yii::t('strings','Country'),
			'foto_logo' => Yii::t('strings','Logo'),
			'foto_profil' => Yii::t('strings','Profile Photo'),
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

		$criteria->compare('id_perusahaan',$this->id_perusahaan,true);
		$criteria->compare('code_id',$this->code_id,true);
		$criteria->compare('nama_perusahaan',$this->nama_perusahaan,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('izin_usaha',$this->izin_usaha,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('id_bidang_usaha',$this->id_bidang_usaha);
		$criteria->compare('bidang_usaha',$this->bidang_usaha,true);
		$criteria->compare('id_country',$this->id_country);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('foto_logo',$this->foto_logo,true);
		$criteria->compare('foto_profil',$this->foto_profil,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DataPerusahaan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function ceknamaperusahaan()
	{

		$modelname='DataPerusahaan';
		$fieldname='nama_perusahaan';
		$valuefield=$this->nama_perusahaan;

		if(RuleExistDB::getAttributesExist($modelname,$fieldname,$valuefield)){
			$this->addError($fieldname, $fieldname.' Yang Anda Msukan  Sudah Ada  ') ;
		}
	}
}
