<?php

/**
 * This is the model class for table "voyage_order_plan".
 *
 * The followings are the available columns in table 'voyage_order_plan':
 * @property string $id_voyage_order_plan
 * @property string $VoyageNumber
 * @property integer $id_bussiness_type_order
 * @property integer $BargingVesselTug
 * @property integer $BargingVesselBarge
 * @property integer $BargeSize
 * @property double $Capacity
 * @property integer $TugPower
 * @property integer $BargingJettyIdStart
 * @property integer $BargingJettyIdEnd
 * @property string $StartDate
 * @property string $EndDate
 * @property double $Price
 * @property integer $id_currency
 * @property double $fuel_price
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class VoyageOrderPlan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'voyage_order_plan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('VoyageNumber, id_bussiness_type_order, BargingVesselTug, BargingVesselBarge, BargeSize, Capacity, TugPower, BargingJettyIdStart, BargingJettyIdEnd, StartDate, EndDate, Price, id_currency, fuel_price, created_date, created_user, ip_user_updated', 'required'),
			array('id_customer, id_bussiness_type_order, BargingVesselTug, BargingVesselBarge, TotalQuantity, QuantityUnit, BargingJettyIdStart, BargingJettyIdEnd, StartDate, EndDate, created_date, created_user, ip_user_updated', 'required'),
			array('id_bussiness_type_order, BargingVesselTug, BargingVesselBarge, BargeSize, TugPower, BargingJettyIdStart, BargingJettyIdEnd, id_currency, id_customer', 'numerical', 'integerOnly'=>true),
			array('Capacity, Price, fuel_price, TotalQuantity', 'numerical'),
			array('VoyageNumber', 'length', 'max'=>100),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_voyage_order_plan, VoyageNumber, id_bussiness_type_order, BargingVesselTug, BargingVesselBarge, BargeSize, Capacity, TugPower, BargingJettyIdStart, BargingJettyIdEnd, StartDate, EndDate, Price, id_currency, fuel_price, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
			'Customer' => array(self::BELONGS_TO, 'Customer', 'id_customer'),
			'BussinessTypeOrder' => array(self::BELONGS_TO, 'BussinessTypeOrder', 'id_bussiness_type_order'),
			'JettyOrigin' => array(self::BELONGS_TO, 'Jetty', 'BargingJettyIdStart'),
			'JettyDestination' => array(self::BELONGS_TO, 'Jetty', 'BargingJettyIdEnd'),
			'VesselTug' => array(self::BELONGS_TO, 'Vessel', 'BargingVesselTug'),
			'VesselBarge' => array(self::BELONGS_TO, 'Vessel', 'BargingVesselBarge'),
			'Currency' => array(self::BELONGS_TO, 'Currency', 'id_currency'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_voyage_order_plan' => 'Id Voyage Order Plan',
			'VoyageNumber' => 'Voyage Number',
			'id_customer'=>'Customer',
			'id_bussiness_type_order' => 'Bussiness Type Order',
			'BargingVesselTug' => 'Barging Vessel Tug',
			'BargingVesselBarge' => 'Barging Vessel Barge',
			'BargeSize' => 'Barge Size',
			'Capacity' => 'Capacity',
			'TugPower' => 'Tug Power',
			'BargingJettyIdStart'=> 'Port Of Loading',
			'BargingJettyIdEnd'=>'Port Of Unloading',
			'StartDate' => 'Start Date',
			'EndDate' => 'End Date',
			'Price' => 'Price',
			'id_currency' => 'Id Currency',
			'fuel_price' => 'Fuel Price',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'ip_user_updated' => 'Ip User Updated',
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

		$criteria->compare('id_voyage_order_plan',$this->id_voyage_order_plan,true);
		$criteria->compare('VoyageNumber',$this->VoyageNumber,true);
		$criteria->compare('id_bussiness_type_order',$this->id_bussiness_type_order);
		$criteria->compare('BargingVesselTug',$this->BargingVesselTug);
		$criteria->compare('BargingVesselBarge',$this->BargingVesselBarge);
		$criteria->compare('BargeSize',$this->BargeSize);
		$criteria->compare('Capacity',$this->Capacity);
		$criteria->compare('TugPower',$this->TugPower);
		$criteria->compare('BargingJettyIdStart',$this->BargingJettyIdStart);
		$criteria->compare('BargingJettyIdEnd',$this->BargingJettyIdEnd);
		$criteria->compare('StartDate',$this->StartDate,true);
		$criteria->compare('EndDate',$this->EndDate,true);
		$criteria->compare('Price',$this->Price);
		$criteria->compare('id_currency',$this->id_currency);
		$criteria->compare('fuel_price',$this->fuel_price);
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
	 * @return VoyageOrderPlan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
