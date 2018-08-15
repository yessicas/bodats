<?php

/**
 * This is the model class for table "quotation_detail_vessel".
 *
 * The followings are the available columns in table 'quotation_detail_vessel':
 * @property string $id_quotation_detail
 * @property string $id_quotation
 * @property integer $IdJettyOrigin
 * @property integer $IdJettyDestination
 * @property integer $BargeSize
 * @property integer $Capacity
 * @property string $Price
 * @property integer $id_currency
 * @property double $change_rate
 *
 * The followings are the available model relations:
 * @property Quotation $idQuotation
 * @property Node $idNodeOrigin
 * @property Node $idNodeDestination
 * @property Currency $idCurrency
 */
class QuotationDetailVessel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'quotation_detail_vessel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_quotation, IdJettyOrigin, IdJettyDestination, BargingVesselTug, BargingVesselBarge, StartDate,  BargeSize, Capacity, Price, id_currency, change_rate, fuel_price', 'required'),
			array('IdJettyOrigin, IdJettyDestination, BargeSize, BargingVesselTug, BargingVesselBarge, Capacity, id_currency', 'numerical', 'integerOnly'=>true),
			array('Price, change_rate', 'numerical'),
			array('id_quotation', 'length', 'max'=>20),
			array('Capacity' , 'cekCapacity'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_quotation_detail, id_quotation, IdJettyOrigin, BargingVesselTug, BargingVesselBarge, StartDate, IdJettyDestination, BargeSize, Capacity, Price, id_currency, change_rate, fuel_price', 'safe', 'on'=>'search'),
			array('id_quotation_detail, id_quotation, IdJettyOrigin, IdJettyDestination, BargingVesselTug, BargingVesselBarge, StartDate, BargeSize, Capacity, Price, id_currency, change_rate, fuel_price', 'safe', 'on'=>'searchbyquotation'),
		
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
			'Quotation' => array(self::BELONGS_TO, 'Quotation', 'id_quotation'),
			'JettyOrigin' => array(self::BELONGS_TO, 'Jetty', 'IdJettyOrigin'),
			'JettyDestination' => array(self::BELONGS_TO, 'Jetty', 'IdJettyDestination'),
			'Currency' => array(self::BELONGS_TO, 'Currency', 'id_currency'),
			'VesselTug' => array(self::BELONGS_TO, 'Vessel', 'BargingVesselTug'),
			'VesselBarge' => array(self::BELONGS_TO, 'Vessel', 'BargingVesselBarge'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_quotation_detail' => 'ID Quotation Detail',
			'id_quotation' => 'ID Quotation',
			'IdJettyOrigin' => 'Route Origin',
			'IdJettyDestination' => 'Route Destination',
			'BargeSize' => 'Barge Size',
			'Capacity' => 'Quantity',
			'BargingVesselTug'=>'TUG', 
			'BargingVesselBarge'=>'BARGE',
			'StartDate'=>'Start Date', 
			'Price' => 'Price Per MT',
			'id_currency' => 'Currency',
			'change_rate' => 'Change Rate',
			'fuel_price'=>'Fuel Rate',
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

		$criteria->compare('id_quotation_detail',$this->id_quotation_detail,true);
		$criteria->compare('id_quotation',$this->id_quotation,true);
		$criteria->compare('IdJettyOrigin',$this->IdJettyOrigin);
		$criteria->compare('IdJettyDestination',$this->IdJettyDestination);
		$criteria->compare('BargeSize',$this->BargeSize);
		$criteria->compare('Capacity',$this->Capacity);
		$criteria->compare('BargingVesselTug',$this->BargingVesselTug);
		$criteria->compare('BargingVesselBarge',$this->BargingVesselBarge);
		$criteria->compare('StartDate',$this->StartDate);
		$criteria->compare('Price',$this->Price,true);
		$criteria->compare('id_currency',$this->id_currency);
		$criteria->compare('change_rate',$this->change_rate);
		$criteria->compare('fuel_price',$this->fuel_price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchbyquotation($id_quotation)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->condition = 'id_quotation=:id_quotation';
		$criteria->params = array(':id_quotation'=>$id_quotation);

		$criteria->compare('id_quotation_detail',$this->id_quotation_detail,true);
		$criteria->compare('id_quotation',$this->id_quotation,true);
		$criteria->compare('IdJettyOrigin',$this->IdJettyOrigin);
		$criteria->compare('IdJettyDestination',$this->IdJettyDestination);
		$criteria->compare('BargeSize',$this->BargeSize);
		$criteria->compare('Capacity',$this->Capacity);
		$criteria->compare('BargingVesselTug',$this->BargingVesselTug);
		$criteria->compare('BargingVesselBarge',$this->BargingVesselBarge);
		$criteria->compare('StartDate',$this->StartDate);
		$criteria->compare('Price',$this->Price,true);
		$criteria->compare('id_currency',$this->id_currency);
		$criteria->compare('change_rate',$this->change_rate);
		$criteria->compare('fuel_price',$this->fuel_price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function cekCapacity()
	{
		$Vesseldata=Vessel::model()->findByPk($this->BargingVesselBarge);
		$maxCapaicty=$Vesseldata->Capacity;
		if($this->Capacity > $maxCapaicty)
	         $this->addError('Capacity', 'Quantity Cannot Over than '.$maxCapaicty.' Max Quantity of Vessel ') ;// validasi model gagal sehingga perintah save() akan dibatalkan.

	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QuotationDetailVessel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
