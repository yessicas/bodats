<?php

/**
 * This is the model class for table "mst_propinsi".
 *
 * The followings are the available columns in table 'mst_propinsi':
 * @property string $id_propinsi
 * @property string $id_country
 * @property string $kodebps
 * @property string $nama
 * @property string $kodeiso
 * @property string $ibukota
 * @property string $pulau
 *
 * The followings are the available model relations:
 * @property MstKabupatenkota[] $mstKabupatenkotas
 * @property Country $idCountry
 */
class MstPropinsi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mst_propinsi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_country', 'required'),
			array('id_country', 'length', 'max'=>20),
			array('kodebps', 'length', 'max'=>10),
			array('nama', 'length', 'max'=>64),
			array('kodeiso', 'length', 'max'=>8),
			array('ibukota, pulau', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_propinsi, id_country, kodebps, nama, kodeiso, ibukota, pulau', 'safe', 'on'=>'search'),
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
			'Kabupatenkota' => array(self::HAS_MANY, 'MstKabupatenkota', 'id_propinsi'),
			'Country' => array(self::BELONGS_TO, 'Country', 'id_country'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_propinsi' => 'ID Propinsi',
			'id_country' => 'ID Country',
			'kodebps' => 'Kode BPS',
			'nama' => 'Nama',
			'kodeiso' => 'Kode ISO',
			'ibukota' => 'Ibukota',
			'pulau' => 'Pulau',
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

		$criteria->compare('id_propinsi',$this->id_propinsi,true);
		$criteria->compare('id_country',$this->id_country,true);
		$criteria->compare('kodebps',$this->kodebps,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('kodeiso',$this->kodeiso,true);
		$criteria->compare('ibukota',$this->ibukota,true);
		$criteria->compare('pulau',$this->pulau,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MstPropinsi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
