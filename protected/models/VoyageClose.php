<?php

/**
 * This is the model class for table "voyage_close".
 *
 * The followings are the available columns in table 'voyage_close':
 * @property string $id_voyage_close
 * @property string $CloseVoyageNumber
 * @property string $CloseVoyageStatus
 * @property integer $CloseVoyageNo
 * @property integer $CloseVoyageMonth
 * @property integer $CloseVoyageYear
 * @property string $id_voyage_order
 * @property string $id_sailing_order
 * @property string $ActualRoute
 * @property integer $CrewIdMaster
 * @property string $CloseVoyageReportDate
 * @property string $ActualStartDate
 * @property string $ActualEndDate
 * @property double $StandardFuel
 * @property integer $StandardLayTime
 * @property double $ActualFuel
 * @property double $ActualLayTime
 * @property double $StartFuelStock
 * @property double $Bunker
 * @property double $LastFuelStock
 * @property double $AE_Over
 * @property double $Deviation
 * @property string $Remark
 * @property string $Nautical
 * @property string $NauticalHead
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class VoyageClose extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'voyage_close';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('CloseVoyageNumber, CloseVoyageStatus, CloseVoyageNo, CloseVoyageMonth, CloseVoyageYear, id_voyage_order, id_sailing_order, ActualRoute, CrewIdMaster, CloseVoyageReportDate, ActualStartDate, ActualEndDate, StandardFuel, StandardLayTime, ActualFuel, ActualLayTime, StartFuelStock, Bunker, LastFuelStock, AE_Over, Deviation, Remark, Nautical, NauticalHead, created_date, created_user, ip_user_updated', 'required'),
			array('id_voyage_order, id_sailing_order,  ActualStartDate, ActualEndDate,  ActualLayTime, StartFuelStock, LastFuelStock , ConsumptFuel, created_date, created_user, ip_user_updated', 'required','on'=>'step1'),
			array('CloseVoyageStatus, id_voyage_order, id_sailing_order, ActualRoute, CrewIdMaster, CloseVoyageReportDate, ActualStartDate, ActualEndDate, StandardFuel, ConsumptFuel, StandardLayTime, ActualFuel, ActualLayTime, StartFuelStock, Bunker, LastFuelStock, AE_Over, Deviation, Nautical, NauticalHead, created_date, created_user, ip_user_updated', 'required','on'=>'step2'),
			array('CloseVoyageNo, CloseVoyageMonth, CloseVoyageYear, CrewIdMaster', 'numerical', 'integerOnly'=>true),
			array('StandardFuel, ActualFuel, ActualLayTime, StandardLayTime, StartFuelStock, Bunker, LastFuelStock, AE_Over, Deviation', 'numerical'),
			array('CloseVoyageNumber', 'length', 'max'=>64),
			array('id_voyage_order, id_sailing_order', 'length', 'max'=>20),
			array('Nautical, NauticalHead', 'length', 'max'=>150),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_voyage_close, CloseVoyageNumber, CloseVoyageStatus, CloseVoyageNo, CloseVoyageMonth, CloseVoyageYear, id_voyage_order, id_sailing_order, ActualRoute, CrewIdMaster, CloseVoyageReportDate, ActualStartDate, ActualEndDate, StandardFuel, StandardLayTime, ActualFuel, ActualLayTime, StartFuelStock, Bunker, LastFuelStock, AE_Over, Deviation, Remark, Nautical, NauticalHead, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
			'id_voyage_close' => 'ID Voyage Close',
			'CloseVoyageNumber' => 'Close Voyage Number',
			'CloseVoyageStatus' => 'Close Voyage Status',
			'CloseVoyageNo' => 'Close Voyage No',
			'CloseVoyageMonth' => 'Close Voyage Month',
			'CloseVoyageYear' => 'Close Voyage Year',
			'id_voyage_order' => 'ID Voyage Order',
			'id_sailing_order' => 'ID Sailing Order',
			'ActualRoute' => 'Actual Route',
			'CrewIdMaster' => 'Crew ID Master',
			'CloseVoyageReportDate' => 'Close Voyage Report Date',
			'ActualStartDate' => 'Actual Start Date',
			'ActualEndDate' => 'Actual Close Date',
			'StandardFuel' => 'Standard Fuel',
			'StandardLayTime' => 'Standard Lay Time',
			'ActualFuel' => 'Actual Fuel',
			'ActualLayTime' => 'Total Sailing Time',
			'StartFuelStock' => 'Start Fuel Stock',
			'Bunker' => 'Bunker',
			'LastFuelStock' => 'Last Fuel (ROB)',
			'AE_Over' => 'Ae Over',
			'Deviation' => 'Deviation',
			'Remark' => 'Remark',
			'Nautical' => 'Nautical',
			'NauticalHead' => 'Nautical Head',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
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

		$criteria->compare('id_voyage_close',$this->id_voyage_close,true);
		$criteria->compare('CloseVoyageNumber',$this->CloseVoyageNumber,true);
		$criteria->compare('CloseVoyageStatus',$this->CloseVoyageStatus,true);
		$criteria->compare('CloseVoyageNo',$this->CloseVoyageNo);
		$criteria->compare('CloseVoyageMonth',$this->CloseVoyageMonth);
		$criteria->compare('CloseVoyageYear',$this->CloseVoyageYear);
		$criteria->compare('id_voyage_order',$this->id_voyage_order,true);
		$criteria->compare('id_sailing_order',$this->id_sailing_order,true);
		$criteria->compare('ActualRoute',$this->ActualRoute,true);
		$criteria->compare('CrewIdMaster',$this->CrewIdMaster);
		$criteria->compare('CloseVoyageReportDate',$this->CloseVoyageReportDate,true);
		$criteria->compare('ActualStartDate',$this->ActualStartDate,true);
		$criteria->compare('ActualEndDate',$this->ActualEndDate,true);
		$criteria->compare('StandardFuel',$this->StandardFuel);
		$criteria->compare('StandardLayTime',$this->StandardLayTime);
		$criteria->compare('ActualFuel',$this->ActualFuel);
		$criteria->compare('ActualLayTime',$this->ActualLayTime);
		$criteria->compare('StartFuelStock',$this->StartFuelStock);
		$criteria->compare('Bunker',$this->Bunker);
		$criteria->compare('LastFuelStock',$this->LastFuelStock);
		$criteria->compare('AE_Over',$this->AE_Over);
		$criteria->compare('Deviation',$this->Deviation);
		$criteria->compare('Remark',$this->Remark,true);
		$criteria->compare('Nautical',$this->Nautical,true);
		$criteria->compare('NauticalHead',$this->NauticalHead,true);
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
	 * @return VoyageClose the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
