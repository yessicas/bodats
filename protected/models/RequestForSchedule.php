<?php

/**
 * This is the model class for table "request_for_schedule".
 *
 * The followings are the available columns in table 'request_for_schedule':
 * @property string $id_request_for_schedule
 * @property integer $id_vessel
 * @property integer $id_vessel_status
 * @property string $status_rfs
 * @property string $StartDate
 * @property string $EndDate
 * @property string $notes
 * @property string $id_schedule
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class RequestForSchedule extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RequestForSchedule the static model class
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
		return 'request_for_schedule';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_vessel, id_vessel_status, TypeSchedule, TypeBreakdown, StartDate, EndDate, notes,', 'required'),
			array('id_vessel, id_vessel_status', 'numerical', 'integerOnly'=>true),
			array('notes,forced_plot_to_schedule', 'length', 'max'=>250),
			array('id_schedule', 'length', 'max'=>20),
			array('created_user, approved_user, approval_date', 'length', 'max'=>45),
			array('ip_user_updated, ip_user_approved', 'length', 'max'=>50),
			array('status_rfs', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_request_for_schedule, id_vessel, id_vessel_status, TypeSchedule, TypeBreakdown, status_rfs, StartDate, EndDate, notes, id_schedule, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
			array('id_request_for_schedule, id_vessel, id_vessel_status, TypeSchedule, TypeBreakdown, status_rfs, StartDate, EndDate, notes, id_schedule, created_date, created_user, ip_user_updated', 'safe', 'on'=>'searchapproved'),
			array('id_request_for_schedule, id_vessel, id_vessel_status, TypeSchedule, TypeBreakdown, status_rfs, StartDate, EndDate, notes, id_schedule, created_date, created_user, ip_user_updated', 'safe', 'on'=>'searchrejected'),
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
			'vessel' => array(self::BELONGS_TO, 'Vessel', 'id_vessel'),
			'vesselstat' => array(self::BELONGS_TO, 'VesselStatus', 'id_vessel_status'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_request_for_schedule' => 'ID Request For Schedule',
			'id_vessel' => 'Vessel',
			'id_vessel_status' => 'Vessel Status',
			'TypeSchedule' => 'Type Schedule',
			'TypeBreakdown' => 'Type Breakdown',
			'status_rfs' => 'Status Rfs',
			'StartDate' => 'Proposed Start Date',
			'EndDate' => 'End Date',
			'notes' => 'Notes',
			'forced_plot_to_schedule'=>'Forced Plot To Schedule',
			'id_schedule' => 'ID Schedule',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'ip_user_updated' => 'IP User Updated',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($mode='DOCKING') // docking & repair
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		if($mode=='DOCKING'){
			$id_vessel_status=30;
		}
		if($mode=='REPAIR'){
			$id_vessel_status=20;
		}

		$criteria=new CDbCriteria;
		$criteria->condition = 'status_rfs=:status_rfs AND id_vessel_status=:id_vessel_status';
		$criteria->params = array(':status_rfs'=>'NONE',':id_vessel_status'=>$id_vessel_status);

		$criteria->compare('id_request_for_schedule',$this->id_request_for_schedule,true);
		$criteria->compare('id_vessel',$this->id_vessel);
		$criteria->compare('id_vessel_status',$this->id_vessel_status);
		$criteria->compare('TypeSchedule',$this->TypeSchedule);
		$criteria->compare('TypeBreakdown',$this->TypeBreakdown);
		$criteria->compare('status_rfs',$this->status_rfs,true);
		$criteria->compare('StartDate',$this->StartDate,true);
		$criteria->compare('EndDate',$this->EndDate,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('id_schedule',$this->id_schedule,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'StartDate ASC',
			),
		));
	}


	public function searchapproved($mode='DOCKING') //docking &repair
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		if($mode=='DOCKING'){
			$id_vessel_status=30;
		}
		if($mode=='REPAIR'){
			$id_vessel_status=20;
		}

		$criteria=new CDbCriteria;
		$criteria->condition = 'status_rfs=:status_rfs AND id_vessel_status=:id_vessel_status';
		$criteria->params = array(':status_rfs'=>'APPROVED',':id_vessel_status'=>$id_vessel_status);


		$criteria->compare('id_request_for_schedule',$this->id_request_for_schedule,true);
		$criteria->compare('id_vessel',$this->id_vessel);
		$criteria->compare('id_vessel_status',$this->id_vessel_status);
		$criteria->compare('TypeSchedule',$this->TypeSchedule);
		$criteria->compare('TypeBreakdown',$this->TypeBreakdown);
		$criteria->compare('status_rfs',$this->status_rfs,true);
		$criteria->compare('StartDate',$this->StartDate,true);
		$criteria->compare('EndDate',$this->EndDate,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('id_schedule',$this->id_schedule,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'StartDate ASC',
			),
		));
	}

	public function searchrejected($mode='DOCKING') // docking & repair
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		if($mode=='DOCKING'){
			$id_vessel_status=30;
		}
		if($mode=='REPAIR'){
			$id_vessel_status=20;
		}

		$criteria=new CDbCriteria;
		$criteria->condition = 'status_rfs=:status_rfs AND id_vessel_status=:id_vessel_status';
		$criteria->params = array(':status_rfs'=>'REJECTED',':id_vessel_status'=>$id_vessel_status);


		$criteria->compare('id_request_for_schedule',$this->id_request_for_schedule,true);
		$criteria->compare('id_vessel',$this->id_vessel);
		$criteria->compare('id_vessel_status',$this->id_vessel_status);
		$criteria->compare('TypeSchedule',$this->TypeSchedule);
		$criteria->compare('TypeBreakdown',$this->TypeBreakdown);
		$criteria->compare('status_rfs',$this->status_rfs,true);
		$criteria->compare('StartDate',$this->StartDate,true);
		$criteria->compare('EndDate',$this->EndDate,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('id_schedule',$this->id_schedule,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'StartDate ASC',
			),
		));
	}
}