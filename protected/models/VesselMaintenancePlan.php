<?php

/**
 * This is the model class for table "vessel_maintenance_plan".
 *
 * The followings are the available columns in table 'vessel_maintenance_plan':
 * @property string $id_vessel_maintenance_plan
 * @property integer $id_maintenance_type
 * @property integer $id_vessel
 * @property string $start_date
 * @property string $end_date
 * @property integer $Duration
 * @property string $Description
 * @property double $RunningHour
 * @property string $MaintenanceName
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 *
 * The followings are the available model relations:
 * @property MstMaintenanceType $idMaintenanceType
 * @property Vessel $idVessel
 */
class VesselMaintenancePlan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	public $VesselName;

	public $is_repeat;
	public $interval_repeat;
	public $type_interval;
	public $until_date;


	public function tableName()
	{
		return 'vessel_maintenance_plan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_maintenance_type, id_vessel,  TypeSchedule, TypeBreakdown, start_date, end_date, Duration, Description, MaintenanceName, status', 'required'),
			array('id_maintenance_type, id_vessel, Duration, No, NoMonth, NoYear', 'numerical', 'integerOnly'=>true),
			array('RunningHour', 'numerical'),
			array('MaintenanceName', 'length', 'max'=>32),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated, ip_user_approved, repair_no', 'length', 'max'=>50),
			//array('id_vessel' , 'cekvesselinsert','on'=>'insert'),
			//array('id_vessel' , 'cekvesselupdate','on'=>'update'),
			array('approved_user, approval_date, created_date', 'length', 'max'=>50),

			array('is_repeat', 'required','on'=>'insert'),
			array('is_repeat, interval_repeat, type_interval, until_date', 'safe'),
			array('interval_repeat', 'numerical', 'integerOnly'=>true),
			array('interval_repeat ', 'checkinterval_repeat','on'=>'insert'),
			array('until_date ', 'checkuntil_date','on'=>'insert'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_vessel_maintenance_plan, id_maintenance_type, id_vessel,  TypeSchedule, TypeBreakdown, VesselName, start_date, end_date, Duration, Description, RunningHour, MaintenanceName, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
			array('id_vessel_maintenance_plan, id_maintenance_type, id_vessel,  TypeSchedule, TypeBreakdown, VesselName, start_date, end_date, Duration, Description, RunningHour, MaintenanceName, created_date, created_user, ip_user_updated', 'safe', 'on'=>'searchbyStatusNone'),
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
			'idMaintenanceType' => array(self::BELONGS_TO, 'MstMaintenanceType', 'id_maintenance_type'),
			'Vessel' => array(self::BELONGS_TO, 'Vessel', 'id_vessel'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_vessel_maintenance_plan' => 'ID Vessel Maintenance Plan',
			'id_maintenance_type' => 'Maintenance Type',
			'id_vessel' => 'Vessel',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'Duration' => 'Duration',
			'Description' => 'Description',
			'RunningHour' => 'Running Hour',
			'MaintenanceName' => 'Maintenance Name',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'ip_user_updated' => 'IP User Updated',
			'vesselname'=>'Vessel Name',
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
	public function search($status='NONE')
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->with=array('Vessel');
        $criteria->together=true;
        $criteria->condition = 't.status=:status';
		$criteria->params = array(':status'=>$status);

		$criteria->compare('id_vessel_maintenance_plan',$this->id_vessel_maintenance_plan,true);
		$criteria->compare('id_maintenance_type',$this->id_maintenance_type);
		$criteria->compare('id_vessel',$this->id_vessel);
		$criteria->compare('Vessel.VesselName',$this->VesselName,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('Duration',$this->Duration);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('RunningHour',$this->RunningHour);
		$criteria->compare('MaintenanceName',$this->MaintenanceName,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'id_vessel_maintenance_plan ASC',
            'attributes'=>array(

              'VesselName'=>array(
                 'asc'=>'Vessel.VesselName ASC',
                 'desc'=>'Vessel.VesselName DESC',
              ),

              '*',
          					),
        				),
		));
	}


	public function searchbyStatusNone()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->with=array('Vessel');
        $criteria->together=true;
        $criteria->condition = 't.status=:status';
		$criteria->params = array(':status'=>'NONE');

		$criteria->compare('id_vessel_maintenance_plan',$this->id_vessel_maintenance_plan,true);
		$criteria->compare('id_maintenance_type',$this->id_maintenance_type);
		$criteria->compare('id_vessel',$this->id_vessel);
		$criteria->compare('Vessel.VesselName',$this->VesselName,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('Duration',$this->Duration);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('RunningHour',$this->RunningHour);
		$criteria->compare('MaintenanceName',$this->MaintenanceName,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'id_vessel_maintenance_plan ASC',
            'attributes'=>array(

              'VesselName'=>array(
                 'asc'=>'Vessel.VesselName ASC',
                 'desc'=>'Vessel.VesselName DESC',
              ),

              '*',
          					),
        				),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VesselMaintenancePlan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function cekvesselinsert()
	{

	    $modelschedule = VesselSchedule::model()->find(array(
           'condition' => 'id_vessel = :id_vessel AND (date BETWEEN :start_date AND :end_date)',
           'params' => array(
               ':id_vessel' => $this->id_vessel,
               ':start_date' => $this->start_date,
               ':end_date' => $this->end_date,
           ),
       ));
	    if ($modelschedule)
	         $this->addError('id_vessel', 'Vessel sudah digunakan pada tanggal yang dipilih ') ;// validasi model gagal sehingga perintah save() akan dibatalkan.

	}

	public function cekvesselupdate()
	{

	    $modelschedule = VesselSchedule::model()->find(array(
           'condition' => '(id_vessel = :id_vessel AND ( date BETWEEN :start_date AND :end_date)) AND id_shipping_order_detail <>:id_shipping_order_detail',
           'params' => array(
               ':id_vessel' => $this->id_vessel,
               ':start_date' => $this->start_date,
               ':end_date' => $this->end_date,
               ':id_shipping_order_detail' => $this->id_vessel_maintenance_plan,
           ),
       ));
	    if ($modelschedule)
	         $this->addError('id_vessel', 'Vessel  sudah digunakan pada tanggal yang dipilih ') ;// validasi model gagal sehingga perintah save() akan dibatalkan.

	}

	public function checkinterval_repeat() {        
	  if ($this->is_repeat == 'YES') {
	     if	($this->interval_repeat == ''){
	           $this->addError("interval_repeat", 'Repeat  cannot be blank.');
	       }
	   }

	}

	public function checkuntil_date() {        
	  if ($this->is_repeat == 'YES') {
	     if	($this->until_date == ''){
	           $this->addError("until_date", 'Until Date  cannot be blank.');
	       }
	   }

	}


}
