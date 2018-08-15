<?php

/**
 * This is the model class for table "mst_kabupatenkota".
 *
 * The followings are the available columns in table 'mst_kabupatenkota':
 * @property integer $id
 * @property string $nama
 * @property string $ibukota
 * @property string $id_propinsi
 * @property integer $ibukotaprop
 * @property integer $jmlpenduduk
 * @property integer $kodebps
 *
 * The followings are the available model relations:
 * @property MstPropinsi $idPropinsi
 */
class MstKabupatenkota extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mst_kabupatenkota';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ibukotaprop, jmlpenduduk, kodebps', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>120),
			array('ibukota', 'length', 'max'=>45),
			array('id_propinsi', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nama, ibukota, id_propinsi, ibukotaprop, jmlpenduduk, kodebps', 'safe', 'on'=>'search'),
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
			'Propinsi' => array(self::BELONGS_TO, 'MstPropinsi', 'id_propinsi'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
			'ibukota' => 'Ibukota',
			'id_propinsi' => 'ID Propinsi',
			'ibukotaprop' => 'Ibukota Provinsi',
			'jmlpenduduk' => 'Jumlah Penduduk',
			'kodebps' => 'Kode BPS',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('ibukota',$this->ibukota,true);
		$criteria->compare('id_propinsi',$this->id_propinsi,true);
		$criteria->compare('ibukotaprop',$this->ibukotaprop);
		$criteria->compare('jmlpenduduk',$this->jmlpenduduk);
		$criteria->compare('kodebps',$this->kodebps);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MstKabupatenkota the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
