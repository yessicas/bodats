<?php

/**
 * This is the model class for table "mst_templatecycle".
 *
 * The followings are the available columns in table 'mst_templatecycle':
 * @property string $id_schedule_plan
 * @property integer $VesselTugId
 * @property integer $VesselBargeId
 * @property integer $id_voyage_activity_group
 * @property string $schedule_date
 * @property integer $schedule_number
 * @property integer $sch_month
 * @property integer $sch_year
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class MasterTemplateStandardCycle extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mst_templatecycle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_mst_template, activity, duration, group_activity', 'required'),
			array('id_template, id_mst_template', 'numerical', 'integerOnly'=>true),
			array('id_mst_template', 'length', 'max'=>20),
			array('activity', 'length', 'max'=>20),
			array('duration', 'length', 'max'=>20),
			array('group_activity', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_template, id_mst_template, activity, duration, group_activity', 'safe', 'on'=>'search'),
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
			'mst_template' => array(self::BELONGS_TO, 'MasterTemplate', 'id_mst_template'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_template' => 'Id Template',
			'id_mst_template' => 'Id Master Template',
			'activity' => 'Activity',
			'duration' => 'Duration',
			'group_activity' => 'Group Activity',
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

		$criteria->compare('id_template',$this->id_template);
		$criteria->compare('id_mst_template',$this->id_mst_template);
		$criteria->compare('activity',$this->activity);
		$criteria->compare('duration',$this->duration);
		$criteria->compare('group_activity',$this->group_activity,true);

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
