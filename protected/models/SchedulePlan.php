<?php

/**
 * This is the model class for table "schedule_plan".
 *
 * The followings are the available columns in table 'schedule_plan':
 * @property string $id_schedule_plan
 * @property integer $VesselTugId
 * @property integer $VesselBargeId
 * @property integer $id_voyage_activity_group
 * @property integer $id_voyage_activity
 * @property string $schedule_date
 * @property integer $schedule_number
 * @property integer $sch_month
 * @property integer $sch_year
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class SchedulePlan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'schedule_plan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('VesselTugId, id_voyage_activity, id_voyage_activity_group, id_mst_template, schedule_date,duration, sch_month, sch_year, created_date, created_user, ip_user_updated', 'required'),
			array('VesselTugId, VesselBargeId, id_voyage_activity, id_voyage_activity_group, schedule_number, sch_month, sch_year', 'numerical', 'integerOnly'=>true),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_schedule_plan, VesselTugId, VesselBargeId, id_voyage_activity, id_voyage_activity_group, schedule_date, schedule_number, sch_month, sch_year, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
			'timesheetgroup' => array(self::BELONGS_TO, 'VoyageMstActivityGroup', 'id_voyage_activity_group'),
			'timesheet' => array(self::BELONGS_TO, 'VoyageMstActivity', 'id_voyage_activity'),
			'voyagegroup' => array(self::BELONGS_TO, 'MasterTemplate', 'id_mst_template'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_schedule_plan' => 'Id Schedule Plan',
			'VesselTugId' => 'Vessel Tug',
			'VesselBargeId' => 'Vessel Barge',
			'id_voyage_activity' => 'Activity',
			'id_voyage_activity_group' => 'Activity Grup',
			'id_mst_template' => 'Rute',
			'schedule_date' => 'Schedule Date',
			'schedule_number' => 'Schedule Number',
			'sch_month' => 'Sch Month',
			'sch_year' => 'Sch Year',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'ip_user_updated' => 'Ip User Updated',
			'duration' => 'Durasi',
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

		$criteria->compare('id_schedule_plan',$this->id_schedule_plan);
		$criteria->compare('VesselTugId',$this->VesselTugId);
		$criteria->compare('VesselBargeId',$this->VesselBargeId);
		$criteria->compare('id_voyage_activity',$this->id_voyage_activity);
		$criteria->compare('id_voyage_activity_group',$this->id_voyage_activity_group);
		$criteria->compare('schedule_date',$this->schedule_date,true);
		$criteria->compare('schedule_number',$this->schedule_number);
		$criteria->compare('sch_month',$this->sch_month);
		$criteria->compare('sch_year',$this->sch_year);
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
	 * @return SchedulePlan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
