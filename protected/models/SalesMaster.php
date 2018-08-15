<?php

/**
 * This is the model class for table "sales_master".
 *
 * The followings are the available columns in table 'sales_master':
 * @property string $id_sales_master
 * @property integer $id_vessel_tug
 * @property integer $id_vessel_barge
 * @property integer $year
 * @property string $month
 * @property string $VoyageName
 * @property string $id_customer
 * @property integer $voyage_no
 * @property integer $JettyIdStart
 * @property integer $JettyIdEnd
 * @property double $TotalQuantity
 * @property string $QuantityUnit
 * @property double $PriceUnit
 * @property integer $id_currency
 * @property double $change_rate
 * @property double $FuelLtr
 * @property double $FuelCost
 * @property double $AgencyCost
 * @property double $DepreciationCost
 * @property double $CrewCost
 * @property double $Rent
 * @property double $SubconCost
 * @property double $IncuranceCost
 * @property double $RepairCost
 * @property double $DockingCost
 * @property double $BrokerageCost
 * @property double $OthersCost
 * @property double $GP_COGM
 * @property double $MarginFuelCost
 * @property double $MarginAgencyCost
 * @property double $MarginDepreciationCost
 * @property double $MarginCrewCost
 * @property double $MarginRent
 * @property double $MarginSubconCost
 * @property double $MarginIncuranceCost
 * @property double $MarginRepairCost
 * @property double $MarginDockingCost
 * @property double $MarginBrokerageCost
 * @property double $MarginOthersCost
 * @property double $GP_COGS
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class SalesMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SalesMaster the static model class
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
		return 'sales_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_vessel_tug, id_vessel_barge, year, month, VoyageName, id_customer, voyage_no, JettyIdStart, JettyIdEnd, TotalQuantity, QuantityUnit, PriceUnit, id_currency, change_rate, FuelLtr, FuelCost, AgencyCost, DepreciationCost, CrewCost, Rent, SubconCost, IncuranceCost, RepairCost, DockingCost, BrokerageCost, OthersCost, GP_COGM, MarginFuelCost, MarginAgencyCost, MarginDepreciationCost, MarginCrewCost, MarginRent, MarginSubconCost, MarginIncuranceCost, MarginRepairCost, MarginDockingCost, MarginBrokerageCost, MarginOthersCost, GP_COGS, created_date, created_user, ip_user_updated', 'required'),
			array('id_vessel_tug, id_vessel_barge, year, voyage_no, JettyIdStart, JettyIdEnd, id_currency', 'numerical', 'integerOnly'=>true),
			array('TotalQuantity, PriceUnit, change_rate, FuelLtr, FuelCost, AgencyCost, DepreciationCost, CrewCost, Rent, SubconCost, IncuranceCost, RepairCost, DockingCost, BrokerageCost, OthersCost, GP_COGM, MarginFuelCost, MarginAgencyCost, MarginDepreciationCost, MarginCrewCost, MarginRent, MarginSubconCost, MarginIncuranceCost, MarginRepairCost, MarginDockingCost, MarginBrokerageCost, MarginOthersCost, GP_COGS', 'numerical'),
			array('VoyageName, ip_user_updated', 'length', 'max'=>50),
			array('id_customer', 'length', 'max'=>20),
			array('QuantityUnit', 'length', 'max'=>10),
			array('created_user', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_sales_master, id_vessel_tug, id_vessel_barge, year, month, VoyageName, id_customer, voyage_no, JettyIdStart, JettyIdEnd, TotalQuantity, QuantityUnit, PriceUnit, id_currency, change_rate, FuelLtr, FuelCost, AgencyCost, DepreciationCost, CrewCost, Rent, SubconCost, IncuranceCost, RepairCost, DockingCost, BrokerageCost, OthersCost, GP_COGM, MarginFuelCost, MarginAgencyCost, MarginDepreciationCost, MarginCrewCost, MarginRent, MarginSubconCost, MarginIncuranceCost, MarginRepairCost, MarginDockingCost, MarginBrokerageCost, MarginOthersCost, GP_COGS, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
			'id_sales_master' => 'ID Sales Master',
			'id_vessel_tug' => 'ID Vessel Tug',
			'id_vessel_barge' => 'ID Vessel Barge',
			'year' => 'Year',
			'month' => 'Month',
			'VoyageName' => 'Voyage Name',
			'id_customer' => 'ID Customer',
			'voyage_no' => 'Voyage No',
			'JettyIdStart' => 'Jetty ID Start',
			'JettyIdEnd' => 'Jetty ID End',
			'TotalQuantity' => 'Total Quantity',
			'QuantityUnit' => 'Quantity Unit',
			'PriceUnit' => 'Price Unit',
			'id_currency' => 'ID Currency',
			'change_rate' => 'Change Rate',
			'FuelLtr' => 'Fuel Ltr',
			'FuelCost' => 'Fuel Cost',
			'AgencyCost' => 'Agency Cost',
			'DepreciationCost' => 'Depreciation Cost',
			'CrewCost' => 'Crew Cost',
			'Rent' => 'Rent',
			'SubconCost' => 'Subcon Cost',
			'IncuranceCost' => 'Incurance Cost',
			'RepairCost' => 'Repair Cost',
			'DockingCost' => 'Docking Cost',
			'BrokerageCost' => 'Brokerage Cost',
			'OthersCost' => 'Others Cost',
			'GP_COGM' => 'GP COGM',
			'MarginFuelCost' => 'Margin Fuel Cost',
			'MarginAgencyCost' => 'Margin Agency Cost',
			'MarginDepreciationCost' => 'Margin Depreciation Cost',
			'MarginCrewCost' => 'Margin Crew Cost',
			'MarginRent' => 'Margin Rent',
			'MarginSubconCost' => 'Margin Subcon Cost',
			'MarginIncuranceCost' => 'Margin Incurance Cost',
			'MarginRepairCost' => 'Margin Repair Cost',
			'MarginDockingCost' => 'Margin Docking Cost',
			'MarginBrokerageCost' => 'Margin Brokerage Cost',
			'MarginOthersCost' => 'Margin Others Cost',
			'GP_COGS' => 'GP COGS',
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

		$criteria->compare('id_sales_master',$this->id_sales_master,true);
		$criteria->compare('id_vessel_tug',$this->id_vessel_tug);
		$criteria->compare('id_vessel_barge',$this->id_vessel_barge);
		$criteria->compare('year',$this->year);
		$criteria->compare('month',$this->month,true);
		$criteria->compare('VoyageName',$this->VoyageName,true);
		$criteria->compare('id_customer',$this->id_customer,true);
		$criteria->compare('voyage_no',$this->voyage_no);
		$criteria->compare('JettyIdStart',$this->JettyIdStart);
		$criteria->compare('JettyIdEnd',$this->JettyIdEnd);
		$criteria->compare('TotalQuantity',$this->TotalQuantity);
		$criteria->compare('QuantityUnit',$this->QuantityUnit,true);
		$criteria->compare('PriceUnit',$this->PriceUnit);
		$criteria->compare('id_currency',$this->id_currency);
		$criteria->compare('change_rate',$this->change_rate);
		$criteria->compare('FuelLtr',$this->FuelLtr);
		$criteria->compare('FuelCost',$this->FuelCost);
		$criteria->compare('AgencyCost',$this->AgencyCost);
		$criteria->compare('DepreciationCost',$this->DepreciationCost);
		$criteria->compare('CrewCost',$this->CrewCost);
		$criteria->compare('Rent',$this->Rent);
		$criteria->compare('SubconCost',$this->SubconCost);
		$criteria->compare('IncuranceCost',$this->IncuranceCost);
		$criteria->compare('RepairCost',$this->RepairCost);
		$criteria->compare('DockingCost',$this->DockingCost);
		$criteria->compare('BrokerageCost',$this->BrokerageCost);
		$criteria->compare('OthersCost',$this->OthersCost);
		$criteria->compare('GP_COGM',$this->GP_COGM);
		$criteria->compare('MarginFuelCost',$this->MarginFuelCost);
		$criteria->compare('MarginAgencyCost',$this->MarginAgencyCost);
		$criteria->compare('MarginDepreciationCost',$this->MarginDepreciationCost);
		$criteria->compare('MarginCrewCost',$this->MarginCrewCost);
		$criteria->compare('MarginRent',$this->MarginRent);
		$criteria->compare('MarginSubconCost',$this->MarginSubconCost);
		$criteria->compare('MarginIncuranceCost',$this->MarginIncuranceCost);
		$criteria->compare('MarginRepairCost',$this->MarginRepairCost);
		$criteria->compare('MarginDockingCost',$this->MarginDockingCost);
		$criteria->compare('MarginBrokerageCost',$this->MarginBrokerageCost);
		$criteria->compare('MarginOthersCost',$this->MarginOthersCost);
		$criteria->compare('GP_COGS',$this->GP_COGS);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}