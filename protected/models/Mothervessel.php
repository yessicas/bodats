<?php

/**
 * This is the model class for table "mothervessel".
 *
 * The followings are the available columns in table 'mothervessel':
 * @property integer $id_mothervessel
 * @property string $MotherVesselCode
 * @property string $MV_Name
 * @property string $MV_Type
 * @property string $MV_Route
 */
class Mothervessel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Mothervessel the static model class
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
		return 'mothervessel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('MotherVesselCode, MV_Name, MV_Type, MV_Route', 'required'),
			array('MotherVesselCode, MV_Name, MV_Type', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_mothervessel, MotherVesselCode, MV_Name, MV_Type, MV_Route', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_mothervessel' => 'ID Mother Vessel',
			'MotherVesselCode' => 'Mother Vessel Code',
			'MV_Name' => 'Mv Name',
			'MV_Type' => 'Mv Type',
			'MV_Route' => 'Mv Route',
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

		$criteria->compare('id_mothervessel',$this->id_mothervessel);
		$criteria->compare('MotherVesselCode',$this->MotherVesselCode,true);
		$criteria->compare('MV_Name',$this->MV_Name,true);
		$criteria->compare('MV_Type',$this->MV_Type,true);
		$criteria->compare('MV_Route',$this->MV_Route,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
        	'pageSize'=>15,
   								 ),
		));
	}
}