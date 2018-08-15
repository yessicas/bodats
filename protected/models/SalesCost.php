<?php

/**
 * This is the model class for table "sales_cost".
 *
 * The followings are the available columns in table 'sales_cost':
 * @property string $id_sales_cost
 * @property integer $JettyIdStart
 * @property integer $JettyIdEnd
 * @property integer $BargeSize
 * @property integer $Capacity
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
 * @property double $TotalRevenue
 * @property double $TotalSalesCost
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class SalesCost extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sales_cost';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('JettyIdStart, JettyIdEnd, BargeSize, Capacity, PriceUnit, id_currency, change_rate, FuelLtr, FuelCost, AgencyCost, DepreciationCost, CrewCost, SubconCost, IncuranceCost, RepairCost, DockingCost, BrokerageCost, OthersCost, GP_COGM, MarginFuelCost, MarginAgencyCost, MarginDepreciationCost, MarginCrewCost, MarginSubconCost, MarginIncuranceCost, MarginRepairCost, MarginDockingCost, MarginBrokerageCost, MarginOthersCost, GP_COGS, TotalRevenue, TotalSalesCost, created_date, created_user, ip_user_updated', 'required'),
			array('JettyIdStart, JettyIdEnd, BargeSize, Capacity, id_currency', 'numerical', 'integerOnly'=>true),
			array('TotalQuantity, PriceUnit, change_rate, FuelLtr, FuelCost, AgencyCost, DepreciationCost, CrewCost, SubconCost, IncuranceCost, RepairCost, DockingCost, BrokerageCost, OthersCost, GP_COGM, MarginFuelCost, MarginAgencyCost, MarginDepreciationCost, MarginCrewCost, MarginSubconCost, MarginIncuranceCost, MarginRepairCost, MarginDockingCost, MarginBrokerageCost, MarginOthersCost, GP_COGS, TotalRevenue, TotalStandardCost, TotalSalesCost', 'numerical'),
			array('created_user, QuantityUnit', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_sales_cost, JettyIdStart, JettyIdEnd, BargeSize, Capacity, PriceUnit, id_currency, change_rate, FuelLtr, FuelCost, AgencyCost, DepreciationCost, CrewCost, SubconCost, IncuranceCost, RepairCost, DockingCost, BrokerageCost, OthersCost, GP_COGM, MarginFuelCost, MarginAgencyCost, MarginDepreciationCost, MarginCrewCost, MarginSubconCost, MarginIncuranceCost, MarginRepairCost, MarginDockingCost, MarginBrokerageCost, MarginOthersCost, GP_COGS, TotalRevenue, TotalSalesCost, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
			'JettyOrigin' => array(self::BELONGS_TO, 'Jetty', 'JettyIdStart'),
			'JettyDestination' => array(self::BELONGS_TO, 'Jetty', 'JettyIdEnd'),
			'Currency' => array(self::BELONGS_TO, 'Currency', 'id_currency'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_sales_cost' => 'ID Sales Cost',
			'JettyIdStart' => 'Jetty ID Start',
			'JettyIdEnd' => 'Jetty ID End',
			'BargeSize' => 'Barge Size',
			'Capacity' => 'Capacity',
			'PriceUnit' => 'Price Unit',
			'id_currency' => 'ID Currency',
			'change_rate' => 'Change Rate',
			'FuelLtr' => 'Fuel Ltr',
			'FuelCost' => ' Standard Fuel Cost',
			'AgencyCost' => 'Standard Agency Cost',
			'DepreciationCost' => 'Standard Depreciation Cost',
			'CrewCost' => ' Standard Crew Cost',
			'SubconCost' => ' Standard Subcon Cost',
			'IncuranceCost' => ' Standard Incurance Cost',
			'RepairCost' => ' Standard Repair Cost',
			'DockingCost' => ' Standard Docking Cost',
			'BrokerageCost' => ' Standard Brokerage Cost',
			'OthersCost' => ' Standard Others Cost',
			'GP_COGM' => ' Standard GP',
			'MarginFuelCost' => ' Sales Fuel Cost',
			'MarginAgencyCost' => 'Sales Agency Cost',
			'MarginDepreciationCost' => 'Sales Depreciation Cost',
			'MarginCrewCost' => 'Sales Crew Cost',
			'MarginSubconCost' => 'Sales Subcon Cost',
			'MarginIncuranceCost' => 'Sales Incurance Cost',
			'MarginRepairCost' => 'Sales Repair Cost',
			'MarginDockingCost' => 'Sales Docking Cost',
			'MarginBrokerageCost' => 'Sales Brokerage Cost',
			'MarginOthersCost' => 'Sales Others Cost',
			'GP_COGS' => 'Sales GP ',
			'TotalRevenue' => 'Total Revenue',
			'TotalSalesCost' => 'Total Sales Cost',
			'TotalStandardCost' => 'Total Standard Cost',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'ip_user_updated' => 'IP User Updated',
		);
	}


	public function attributeLabelsManualy()
	{
			
			$data = array();
			
			$data[]= ' Fuel Cost';
			$data[]= ' Agency Cost';
			$data[]= ' Depreciation Cost';
			$data[]= ' Crew Cost';
			$data[]= ' Subcon Cost';
			$data[]= ' Incurance Cost';
			$data[]= ' Repair Cost';
			$data[]= ' Docking Cost';
			$data[]= ' Brokerage Cost';
			$data[]= ' Others Cost';
	
			
		return $data ;
	}

	public function fieldSTDandSales()
	{
			
			$data = array();
				$data[]='FuelCost';
				$data[]='AgencyCost';
				$data[]='DepreciationCost';
				$data[]='CrewCost';
				$data[]='SubconCost';
				$data[]='IncuranceCost';
				$data[]='RepairCost';
				$data[]='DockingCost';
				$data[]='BrokerageCost';
				$data[]='OthersCost';
			return $data ;
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

		$criteria->compare('id_sales_cost',$this->id_sales_cost,true);
		$criteria->compare('JettyIdStart',$this->JettyIdStart);
		$criteria->compare('JettyIdEnd',$this->JettyIdEnd);
		$criteria->compare('BargeSize',$this->BargeSize);
		$criteria->compare('Capacity',$this->Capacity);
		$criteria->compare('PriceUnit',$this->PriceUnit);
		$criteria->compare('id_currency',$this->id_currency);
		$criteria->compare('change_rate',$this->change_rate);
		$criteria->compare('FuelLtr',$this->FuelLtr);
		$criteria->compare('FuelCost',$this->FuelCost);
		$criteria->compare('AgencyCost',$this->AgencyCost);
		$criteria->compare('DepreciationCost',$this->DepreciationCost);
		$criteria->compare('CrewCost',$this->CrewCost);
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
		$criteria->compare('MarginSubconCost',$this->MarginSubconCost);
		$criteria->compare('MarginIncuranceCost',$this->MarginIncuranceCost);
		$criteria->compare('MarginRepairCost',$this->MarginRepairCost);
		$criteria->compare('MarginDockingCost',$this->MarginDockingCost);
		$criteria->compare('MarginBrokerageCost',$this->MarginBrokerageCost);
		$criteria->compare('MarginOthersCost',$this->MarginOthersCost);
		$criteria->compare('GP_COGS',$this->GP_COGS);
		$criteria->compare('TotalRevenue',$this->TotalRevenue);
		$criteria->compare('TotalSalesCost',$this->TotalSalesCost);
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
	 * @return SalesCost the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
