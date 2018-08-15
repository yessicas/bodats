<?php

/**
 * This is the model class for table "vessel_status".
 *
 * The followings are the available columns in table 'vessel_status':
 * @property integer $id_vessel_status
 * @property string $vessel_status
 * @property string $description
 *
 * The followings are the available model relations:
 * @property VesselSchedule[] $vesselSchedules
 */
class VesselStatus extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return VesselStatus the static model class
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
		return 'vessel_status';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_vessel_status, vessel_status, description', 'required'),
			array('id_vessel_status', 'numerical', 'integerOnly'=>true),
			array('vessel_status', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_vessel_status, vessel_status, description', 'safe', 'on'=>'search'),
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
			'vesselSchedules' => array(self::HAS_MANY, 'VesselSchedule', 'id_vessel_status'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_vessel_status' => 'ID Vessel Status',
			'vessel_status' => 'Vessel Status',
			'description' => 'Description',
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

		$criteria->compare('id_vessel_status',$this->id_vessel_status);
		$criteria->compare('vessel_status',$this->vessel_status,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}