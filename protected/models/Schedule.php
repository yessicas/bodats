<?php

/**
 * This is the model class for table "schedule".
 *
 * The followings are the available columns in table 'schedule':
 * @property string $id_schedule
 * @property integer $VesselTugId
 * @property integer $VesselBargeId
 * @property integer $id_vessel_status
 * @property string $StartDate
 * @property string $EndDate
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class Schedule extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Schedule the static model class
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
		return 'schedule';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' id_vessel_status, StartDate, EndDate', 'required'),
			array('VesselTugId, VesselBargeId, id_vessel_status, is_voyage, id_voyage_order, is_off_hired, id_so_offhired_order, id_vessel_maintenance_plan', 'numerical', 'integerOnly'=>true),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			
			array('SchNumber', 'length', 'max'=>200),
			array('SchNo, SchMonth, SchYear', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_schedule, VesselTugId, VesselBargeId, id_vessel_status, StartDate, EndDate, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
			'vesselbarge' => array(self::BELONGS_TO, 'Vessel', 'VesselBargeId'),
			'vesseltug' => array(self::BELONGS_TO, 'Vessel', 'VesselTugId'),
			'status' => array(self::BELONGS_TO, 'VesselStatus', 'id_vessel_status'),
			'VoyageOrder' => array(self::BELONGS_TO, 'VoyageOrder', 'id_voyage_order'),
			'VoyageOrderPlan' => array(self::BELONGS_TO, 'VoyageOrderPlan', 'id_voyage_order'),
			'SoOffhiredOrder' => array(self::BELONGS_TO, 'SoOffhiredOrder', 'id_so_offhired_order'),
			'VesselMaintenancePlan' => array(self::BELONGS_TO, 'VesselMaintenancePlan', 'id_vessel_maintenance_plan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_schedule' => 'ID Schedule',
			'VesselTugId' => 'Vessel Tug',
			'VesselBargeId' => 'Vessel Barge',
			'id_vessel_status' => 'Vessel Status',
			'StartDate' => 'Start Date',
			'EndDate' => 'End Date',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'ip_user_updated' => 'IP User Updated',
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

		$criteria->compare('id_schedule',$this->id_schedule,true);
		$criteria->compare('VesselTugId',$this->VesselTugId);
		$criteria->compare('VesselBargeId',$this->VesselBargeId);
		$criteria->compare('id_vessel_status',$this->id_vessel_status);
		$criteria->compare('StartDate',$this->StartDate,true);
		$criteria->compare('EndDate',$this->EndDate,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'StartDate DESC',
			)
		));
	}
}