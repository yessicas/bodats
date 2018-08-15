<?php

/**
 * This is the model class for table "damage_report_repair".
 *
 * The followings are the available columns in table 'damage_report_repair':
 * @property string $id_damage_report_repair
 * @property integer $id_damage_report
 * @property string $id_request_for_schedule
 * @property integer $id_vessel
 * @property string $StartRepair
 * @property string $EndRepair
 * @property string $DamageReportNumber
 * @property integer $NoReport
 * @property integer $NoMonth
 * @property integer $NoYear
 * @property string $Description
 * @property string $PIC
 * @property string $Status
 * @property string $CausedDamage
 * @property string $RepairPhoto1
 * @property string $RepairPhoto2
 * @property string $RepairPhoto3
 * @property string $Master
 * @property string $ChiefEngineer
 */
class DamageReportRepair extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'damage_report_repair';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_damage_report, id_request_for_schedule, id_vessel, StartRepair, EndRepair, Description, PIC, CausedDamage, Master, ChiefEngineer', 'required'),
			array('id_damage_report, id_vessel, NoReport, NoMonth, NoYear', 'numerical', 'integerOnly'=>true),
			array('id_request_for_schedule', 'length', 'max'=>20),
			array('DamageReportNumber, RepairPhoto1, RepairPhoto2, RepairPhoto3', 'length', 'max'=>250),
			array('PIC, Master, ChiefEngineer', 'length', 'max'=>256),
			array('Status', 'safe'),

			array('RepairPhoto1, RepairPhoto2, RepairPhoto3,', 'file',
			'types'=>'jpg',
			'allowEmpty' => true,
			'maxSize' => 1024 * 1024 * 1, // 10MB 
			),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_damage_report_repair, id_damage_report, id_request_for_schedule, id_vessel, StartRepair, EndRepair, DamageReportNumber, NoReport, NoMonth, NoYear, Description, PIC, Status, CausedDamage, RepairPhoto1, RepairPhoto2, RepairPhoto3, Master, ChiefEngineer', 'safe', 'on'=>'search'),
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
			'id_damage_report_repair' => 'Id Damage Report Repair',
			'id_damage_report' => 'Id Damage Report',
			'id_request_for_schedule' => 'Id Request For Schedule',
			'id_vessel' => 'Id Vessel',
			'StartRepair' => 'Start Repair',
			'EndRepair' => 'End Repair',
			'DamageReportNumber' => 'Damage Report Number',
			'NoReport' => 'No Report',
			'NoMonth' => 'No Month',
			'NoYear' => 'No Year',
			'Description' => 'Description',
			'PIC' => 'Pic',
			'Status' => 'Status',
			'CausedDamage' => 'Caused Damage',
			'RepairPhoto1' => 'Repair Photo 1',
			'RepairPhoto2' => 'Repair Photo 2',
			'RepairPhoto3' => 'Repair Photo 3',
			'Master' => 'Master',
			'ChiefEngineer' => 'Chief Engineer',
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

		$criteria->compare('id_damage_report_repair',$this->id_damage_report_repair,true);
		$criteria->compare('id_damage_report',$this->id_damage_report);
		$criteria->compare('id_request_for_schedule',$this->id_request_for_schedule,true);
		$criteria->compare('id_vessel',$this->id_vessel);
		$criteria->compare('StartRepair',$this->StartRepair,true);
		$criteria->compare('EndRepair',$this->EndRepair,true);
		$criteria->compare('DamageReportNumber',$this->DamageReportNumber,true);
		$criteria->compare('NoReport',$this->NoReport);
		$criteria->compare('NoMonth',$this->NoMonth);
		$criteria->compare('NoYear',$this->NoYear);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('PIC',$this->PIC,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('CausedDamage',$this->CausedDamage,true);
		$criteria->compare('RepairPhoto1',$this->RepairPhoto1,true);
		$criteria->compare('RepairPhoto2',$this->RepairPhoto2,true);
		$criteria->compare('RepairPhoto3',$this->RepairPhoto3,true);
		$criteria->compare('Master',$this->Master,true);
		$criteria->compare('ChiefEngineer',$this->ChiefEngineer,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DamageReportRepair the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
