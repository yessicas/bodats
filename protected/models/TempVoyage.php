<?php

/**
 * This is the model class for table "temp_voyage".
 *
 * The followings are the available columns in table 'temp_voyage':
 * @property string $id_temp_voyage
 * @property string $id_voyage_order
 * @property string $VoyageNumber
 * @property string $VoyageOrderNumber
 * @property integer $VONo
 * @property integer $VOMonth
 * @property integer $VOYear
 * @property string $id_quotation
 * @property string $id_so
 * @property string $id_voyage_order_plan
 * @property string $status
 * @property integer $invoice_created
 * @property integer $bussiness_type_order
 * @property integer $BargingVesselTug
 * @property integer $BargingVesselBarge
 * @property string $id_settype_tugbarge
 * @property integer $BargeSize
 * @property double $Capacity
 * @property double $ActualCapacity
 * @property integer $TugPower
 * @property integer $BargingJettyIdStart
 * @property integer $BargingJettyIdEnd
 * @property string $StartDate
 * @property string $EndDate
 * @property string $ActualStartDate
 * @property string $ActualEndDate
 * @property integer $period_year
 * @property integer $period_month
 * @property integer $period_quartal
 * @property double $Price
 * @property integer $id_currency
 * @property double $change_rate
 * @property double $fuel_price
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 * @property string $status_schedule
 * @property double $cc_std_duration
 * @property double $cc_std_fuel
 * @property double $cc_act_duration
 * @property double $cc_act_fuel_start
 * @property double $cc_act_fuel
 * @property double $cc_std_cost
 * @property integer $cc_std_margin
 * @property double $cc_act_cost
 * @property integer $cc_act_margin
 * @property string $approved_date
 * @property string $approved_user
 * @property string $ip_user_approved
 * @property integer $id_user_createmultiple
 */
class TempVoyage extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'temp_voyage';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_voyage_order, VoyageNumber, VoyageOrderNumber, VONo, VOMonth, VOYear, id_quotation, id_so, id_voyage_order_plan, status, invoice_created, bussiness_type_order, BargingVesselTug, BargingVesselBarge, id_settype_tugbarge, BargeSize, Capacity, ActualCapacity, TugPower, BargingJettyIdStart, BargingJettyIdEnd, StartDate, EndDate, ActualStartDate, ActualEndDate, period_year, period_month, period_quartal, Price, id_currency, change_rate, fuel_price, created_date, created_user, ip_user_updated, cc_std_duration, cc_std_fuel, cc_act_duration, cc_act_fuel_start, cc_act_fuel, cc_std_cost, cc_std_margin, cc_act_cost, cc_act_margin, approved_date, approved_user, ip_user_approved', 'required'),
			array('VONo, VOMonth, VOYear, invoice_created, bussiness_type_order, BargingVesselTug, BargingVesselBarge, BargeSize, TugPower, BargingJettyIdStart, BargingJettyIdEnd, period_year, period_month, period_quartal, id_currency, cc_std_margin, cc_act_margin, id_user_createmultiple', 'numerical', 'integerOnly'=>true),
			array('Capacity, ActualCapacity, Price, change_rate, fuel_price, cc_std_duration, cc_std_fuel, cc_act_duration, cc_act_fuel_start, cc_act_fuel, cc_std_cost, cc_act_cost', 'numerical'),
			array('id_voyage_order, id_quotation, id_so, id_voyage_order_plan, id_settype_tugbarge', 'length', 'max'=>20),
			array('VoyageNumber', 'length', 'max'=>100),
			array('VoyageOrderNumber', 'length', 'max'=>200),
			array('created_user, approved_user', 'length', 'max'=>45),
			array('ip_user_updated, ip_user_approved', 'length', 'max'=>50),
			array('status_schedule', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_temp_voyage, id_voyage_order, VoyageNumber, VoyageOrderNumber, VONo, VOMonth, VOYear, id_quotation, id_so, id_voyage_order_plan, status, invoice_created, bussiness_type_order, BargingVesselTug, BargingVesselBarge, id_settype_tugbarge, BargeSize, Capacity, ActualCapacity, TugPower, BargingJettyIdStart, BargingJettyIdEnd, StartDate, EndDate, ActualStartDate, ActualEndDate, period_year, period_month, period_quartal, Price, id_currency, change_rate, fuel_price, created_date, created_user, ip_user_updated, status_schedule, cc_std_duration, cc_std_fuel, cc_act_duration, cc_act_fuel_start, cc_act_fuel, cc_std_cost, cc_std_margin, cc_act_cost, cc_act_margin, approved_date, approved_user, ip_user_approved, id_user_createmultiple', 'safe', 'on'=>'search'),
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
			'id_temp_voyage' => 'Id Temp Voyage',
			'id_voyage_order' => 'Id Voyage Order',
			'VoyageNumber' => 'Voyage Number',
			'VoyageOrderNumber' => 'Voyage Order Number',
			'VONo' => 'Vono',
			'VOMonth' => 'Vomonth',
			'VOYear' => 'Voyear',
			'id_quotation' => 'Id Quotation',
			'id_so' => 'Id So',
			'id_voyage_order_plan' => 'Id Voyage Order Plan',
			'status' => 'Status',
			'invoice_created' => 'Invoice Created',
			'bussiness_type_order' => 'Bussiness Type Order',
			'BargingVesselTug' => 'Barging Vessel Tug',
			'BargingVesselBarge' => 'Barging Vessel Barge',
			'id_settype_tugbarge' => 'Id Settype Tugbarge',
			'BargeSize' => 'Barge Size',
			'Capacity' => 'Capacity',
			'ActualCapacity' => 'Actual Capacity',
			'TugPower' => 'Tug Power',
			'BargingJettyIdStart' => 'Barging Jetty Id Start',
			'BargingJettyIdEnd' => 'Barging Jetty Id End',
			'StartDate' => 'Start Date',
			'EndDate' => 'End Date',
			'ActualStartDate' => 'Actual Start Date',
			'ActualEndDate' => 'Actual End Date',
			'period_year' => 'Period Year',
			'period_month' => 'Period Month',
			'period_quartal' => 'Period Quartal',
			'Price' => 'Price',
			'id_currency' => 'Id Currency',
			'change_rate' => 'Change Rate',
			'fuel_price' => 'Fuel Price',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'ip_user_updated' => 'Ip User Updated',
			'status_schedule' => 'Status Schedule',
			'cc_std_duration' => 'Cc Std Duration',
			'cc_std_fuel' => 'Cc Std Fuel',
			'cc_act_duration' => 'Cc Act Duration',
			'cc_act_fuel_start' => 'Cc Act Fuel Start',
			'cc_act_fuel' => 'Cc Act Fuel',
			'cc_std_cost' => 'Cc Std Cost',
			'cc_std_margin' => 'Cc Std Margin',
			'cc_act_cost' => 'Cc Act Cost',
			'cc_act_margin' => 'Cc Act Margin',
			'approved_date' => 'Approved Date',
			'approved_user' => 'Approved User',
			'ip_user_approved' => 'Ip User Approved',
			'id_user_createmultiple' => 'Id User Createmultiple',
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

		$criteria->compare('id_temp_voyage',$this->id_temp_voyage,true);
		$criteria->compare('id_voyage_order',$this->id_voyage_order,true);
		$criteria->compare('VoyageNumber',$this->VoyageNumber,true);
		$criteria->compare('VoyageOrderNumber',$this->VoyageOrderNumber,true);
		$criteria->compare('VONo',$this->VONo);
		$criteria->compare('VOMonth',$this->VOMonth);
		$criteria->compare('VOYear',$this->VOYear);
		$criteria->compare('id_quotation',$this->id_quotation,true);
		$criteria->compare('id_so',$this->id_so,true);
		$criteria->compare('id_voyage_order_plan',$this->id_voyage_order_plan,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('invoice_created',$this->invoice_created);
		$criteria->compare('bussiness_type_order',$this->bussiness_type_order);
		$criteria->compare('BargingVesselTug',$this->BargingVesselTug);
		$criteria->compare('BargingVesselBarge',$this->BargingVesselBarge);
		$criteria->compare('id_settype_tugbarge',$this->id_settype_tugbarge,true);
		$criteria->compare('BargeSize',$this->BargeSize);
		$criteria->compare('Capacity',$this->Capacity);
		$criteria->compare('ActualCapacity',$this->ActualCapacity);
		$criteria->compare('TugPower',$this->TugPower);
		$criteria->compare('BargingJettyIdStart',$this->BargingJettyIdStart);
		$criteria->compare('BargingJettyIdEnd',$this->BargingJettyIdEnd);
		$criteria->compare('StartDate',$this->StartDate,true);
		$criteria->compare('EndDate',$this->EndDate,true);
		$criteria->compare('ActualStartDate',$this->ActualStartDate,true);
		$criteria->compare('ActualEndDate',$this->ActualEndDate,true);
		$criteria->compare('period_year',$this->period_year);
		$criteria->compare('period_month',$this->period_month);
		$criteria->compare('period_quartal',$this->period_quartal);
		$criteria->compare('Price',$this->Price);
		$criteria->compare('id_currency',$this->id_currency);
		$criteria->compare('change_rate',$this->change_rate);
		$criteria->compare('fuel_price',$this->fuel_price);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);
		$criteria->compare('status_schedule',$this->status_schedule,true);
		$criteria->compare('cc_std_duration',$this->cc_std_duration);
		$criteria->compare('cc_std_fuel',$this->cc_std_fuel);
		$criteria->compare('cc_act_duration',$this->cc_act_duration);
		$criteria->compare('cc_act_fuel_start',$this->cc_act_fuel_start);
		$criteria->compare('cc_act_fuel',$this->cc_act_fuel);
		$criteria->compare('cc_std_cost',$this->cc_std_cost);
		$criteria->compare('cc_std_margin',$this->cc_std_margin);
		$criteria->compare('cc_act_cost',$this->cc_act_cost);
		$criteria->compare('cc_act_margin',$this->cc_act_margin);
		$criteria->compare('approved_date',$this->approved_date,true);
		$criteria->compare('approved_user',$this->approved_user,true);
		$criteria->compare('ip_user_approved',$this->ip_user_approved,true);
		$criteria->compare('id_user_createmultiple',$this->id_user_createmultiple);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TempVoyage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
