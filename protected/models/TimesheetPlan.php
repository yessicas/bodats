<?php

/**
 * This is the model class for table "timesheet".
 *
 * The followings are the available columns in table 'timesheet':
 * @property string $id_timesheet
 * @property string $id_voyage_order
 * @property integer $id_voyage_activity
 * @property string $Activity
 * @property string $StartDate
 * @property double $Duration
 * @property string $Remarks
 * @property string $updated_date
 * @property string $updated_user
 * @property string $ip_user_updated
 */
class TimesheetPlan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'timesheet_plan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_voyage_order, id_voyage_activity, Activity, StartDate, Remarks, JettyId, PortCategory, updated_date, updated_user, ip_user_updated', 'required'),
			array('id_voyage_activity, JettyId', 'numerical', 'integerOnly'=>true),
			array('Duration', 'numerical'),
			array('id_voyage_order', 'length', 'max'=>20),
			array('Activity, Remarks', 'length', 'max'=>250),
			array('updated_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_timesheet, id_voyage_order, id_voyage_activity, Activity, StartDate, Duration, Remarks, JettyId, PortCategory, updated_date, updated_user, ip_user_updated', 'safe', 'on'=>'search'),
			array('id_timesheet, id_voyage_order, id_voyage_activity, Activity, StartDate, Duration, Remarks, JettyId, PortCategory, updated_date, updated_user, ip_user_updated', 'safe', 'on'=>'searchbyvoyage'),
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
			'Category' => array(self::BELONGS_TO, 'VoyageMstActivity', 'id_voyage_activity'),
			'Position' => array(self::BELONGS_TO, 'Jetty', 'JettyId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_timesheet' => 'ID Timesheet',
			'id_voyage_order' => 'ID Voyage Order',
			'id_voyage_activity' => 'Category',
			'Activity' => 'Activity',
			'StartDate' => 'Date',
			'Duration' => 'Duration',
			'Remarks' => 'Remarks',
			'JettyId'=>'Position',
			'PortCategory'=>'Port Category',
			'updated_date' => 'Updated Date',
			'updated_user' => 'Updated By',
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

		$criteria->compare('id_timesheet',$this->id_timesheet,true);
		$criteria->compare('id_voyage_order',$this->id_voyage_order,true);
		$criteria->compare('id_voyage_activity',$this->id_voyage_activity);
		$criteria->compare('Activity',$this->Activity,true);
		$criteria->compare('StartDate',$this->StartDate,true);
		$criteria->compare('Duration',$this->Duration);
		$criteria->compare('Remarks',$this->Remarks,true);
		$criteria->compare('JettyId',$this->JettyId);
		$criteria->compare('PortCategory',$this->PortCategory,true);
		$criteria->compare('updated_date',$this->updated_date,true);
		$criteria->compare('updated_user',$this->updated_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function searchbyvoyage($id_voyage_order)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'id_voyage_order=:id_voyage_order';
		$criteria->params = array(':id_voyage_order'=>$id_voyage_order);

		$criteria->compare('id_timesheet',$this->id_timesheet,true);
		$criteria->compare('id_voyage_order',$this->id_voyage_order,true);
		$criteria->compare('id_voyage_activity',$this->id_voyage_activity);
		$criteria->compare('Activity',$this->Activity,true);
		$criteria->compare('StartDate',$this->StartDate,true);
		$criteria->compare('Duration',$this->Duration);
		$criteria->compare('JettyId',$this->JettyId);
		$criteria->compare('PortCategory',$this->PortCategory,true);
		$criteria->compare('Remarks',$this->Remarks,true);
		$criteria->compare('updated_date',$this->updated_date,true);
		$criteria->compare('updated_user',$this->updated_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'StartDate ASC',
        				),
		));
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Timesheet the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
