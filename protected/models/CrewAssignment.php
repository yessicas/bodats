<?php

/**
 * This is the model class for table "crew_assignment".
 *
 * The followings are the available columns in table 'crew_assignment':
 * @property string $id_crew_assignment
 * @property integer $vessel_id
 * @property integer $CrewId
 * @property string $start_date
 * @property string $expired_date
 * @property integer $status_active
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class CrewAssignment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CrewAssignment the static model class
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
		return 'crew_assignment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public $crewName;
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vessel_id, CrewId, crewName, start_date, expired_date, created_date, created_user, ip_user_updated', 'required'),
			array('vessel_id, CrewId, status_active', 'numerical', 'integerOnly'=>true),
			array('crewName' , 'cekexist'),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_crew_assignment, vessel_id, CrewId, start_date, expired_date, status_active, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
			'crew' => array(self::BELONGS_TO, 'Crew', 'CrewId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_crew_assignment' => 'ID Crew Assignment',
			'vessel_id' => 'Vessel',
			'CrewId' => 'Crew',
			'start_date' => 'Start Date',
			'expired_date' => 'Expired Date',
			'status_active' => 'Status Active',
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

		$criteria->compare('id_crew_assignment',$this->id_crew_assignment,true);
		$criteria->compare('vessel_id',$this->vessel_id);
		$criteria->compare('CrewId',$this->CrewId);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('expired_date',$this->expired_date,true);
		$criteria->compare('status_active',$this->status_active);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function cekexist()
{

    $model = Crew::model()->findByAttributes(array('CrewId'=>$this->CrewId,'CrewName'=>$this->crewName));
    if ($model===null)
         $this->addError('crewName', 'Crew Name Not Exist') ;// validasi model gagal sehingga perintah save() akan dibatalkan.

}
}