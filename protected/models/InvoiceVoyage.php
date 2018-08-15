<?php

/**
 * This is the model class for table "invoice_voyage".
 *
 * The followings are the available columns in table 'invoice_voyage':
 * @property string $id_invoice_voyage
 * @property string $id_voyage_order
 * @property string $id_customer
 * @property string $InvoiceDate
 * @property string $InvoiceNumber
 * @property string $print_CompanyName
 * @property string $print_ShippingAddress
 * @property string $print_NPWP
 * @property string $print_NoFakturPajak
 * @property integer $print_top
 * @property string $sales_code
 * @property string $print_CustomerCode
 * @property string $invoice_description
 * @property string $invoice_marks
 * @property string $invoice_termdelivery
 * @property string $invoice_duedate
 * @property string $VoyageNumber
 * @property integer $VoyageOrderNumber
 * @property integer $VONo
 * @property integer $VOMonth
 * @property integer $VOYear
 * @property string $id_quotation
 * @property string $id_so
 * @property integer $bussiness_type_order
 * @property integer $BargingVesselTug
 * @property integer $BargingVesselBarge
 * @property integer $BargeSize
 * @property integer $Capacity
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
 */
class InvoiceVoyage extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'invoice_voyage';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_voyage_order, id_customer, InvoiceDate, InvoiceNumber, print_CompanyName, print_ShippingAddress, print_NPWP, print_NoFakturPajak, print_top, sales_code, print_CustomerCode, invoice_description, invoice_marks, invoice_termdelivery, invoice_duedate, VoyageNumber, VoyageOrderNumber, VONo, VOMonth, VOYear, id_quotation, id_so, bussiness_type_order, BargingVesselTug, BargingVesselBarge, BargeSize, Capacity, TugPower, BargingJettyIdStart, BargingJettyIdEnd, StartDate, EndDate, ActualStartDate, ActualEndDate, period_year, period_month, period_quartal, Price, id_currency, change_rate, fuel_price, created_date, created_user, ip_user_updated, print_slot1 , print_slot2, print_sign_name, print_sign_position', 'required','on'=>'insert'),
			array('id_voyage_order, id_customer, InvoiceDate, InvoiceNumber, print_CompanyName, print_ShippingAddress, print_NPWP, print_NoFakturPajak, print_top, sales_code, print_CustomerCode, invoice_description, invoice_marks, invoice_termdelivery, invoice_duedate, VoyageNumber, VoyageOrderNumber, VONo, VOMonth, VOYear, id_quotation, id_so, bussiness_type_order, BargingVesselTug, BargingVesselBarge, BargeSize, Capacity, TugPower, BargingJettyIdStart, BargingJettyIdEnd, StartDate, EndDate, ActualStartDate, ActualEndDate, period_year, period_month, period_quartal, Price, id_currency, change_rate, fuel_price, created_date, created_user, ip_user_updated, print_slot1 , print_slot2, print_sign_name, print_sign_position', 'required','on'=>'update'),
			array('id_customer, InvoiceDate, InvoiceNumber, print_CompanyName, print_ShippingAddress, print_NPWP, print_NoFakturPajak, print_top, sales_code, print_CustomerCode, invoice_description, invoice_marks, invoice_termdelivery, invoice_duedate, VONo, VOMonth, VOYear, id_quotation, bussiness_type_order, BargingVesselTug, BargingVesselBarge,  BargingJettyIdStart, BargingJettyIdEnd,  Price, id_currency, created_date, created_user, ip_user_updated, print_slot1 , print_sign_name, print_sign_position', 'required','on'=>'NonVoyage'),
			array('print_top, VONo, VOMonth, VOYear, bussiness_type_order, BargingVesselTug, BargingVesselBarge, BargeSize, TugPower, BargingJettyIdStart, BargingJettyIdEnd, period_year, period_month, period_quartal, id_currency, PaymentBankAccountID, PaymentLate', 'numerical', 'integerOnly'=>true),
			array('Price, change_rate, fuel_price,Capacity,PaymentAmount', 'numerical'),
			array('id_voyage_order, id_customer, id_quotation, id_so', 'length', 'max'=>20),
			array('InvoiceNumber, print_NoFakturPajak, sales_code, ip_user_updated, PaymentStatus, PaymentDate', 'length', 'max'=>50),
			array('print_NPWP, print_CustomerCode, invoice_termdelivery', 'length', 'max'=>150),
			array('VoyageNumber', 'length', 'max'=>100),
			array('created_user', 'length', 'max'=>45),

			array('PaymentStatus, PaymentAmount, PaymentBankAccountID, PaymentDate', 'required','on'=>'addpayment'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_invoice_voyage, id_voyage_order, id_customer, InvoiceDate, InvoiceNumber, print_CompanyName, print_ShippingAddress, print_NPWP, print_NoFakturPajak, print_top, sales_code, print_CustomerCode, invoice_description, invoice_marks, invoice_termdelivery, invoice_duedate, VoyageNumber, VoyageOrderNumber, VONo, VOMonth, VOYear, id_quotation, id_so, bussiness_type_order, BargingVesselTug, BargingVesselBarge, BargeSize, Capacity, TugPower, BargingJettyIdStart, BargingJettyIdEnd, StartDate, EndDate, ActualStartDate, ActualEndDate, period_year, period_month, period_quartal, Price, id_currency, change_rate, fuel_price, created_date, created_user, ip_user_updated, PaymentStatus, PaymentAmount, PaymentBankAccountID, PaymentDate, PaymentLate', 'safe', 'on'=>'search'),
			array('id_invoice_voyage, id_voyage_order, id_customer, InvoiceDate, InvoiceNumber, print_CompanyName, print_ShippingAddress, print_NPWP, print_NoFakturPajak, print_top, sales_code, print_CustomerCode, invoice_description, invoice_marks, invoice_termdelivery, invoice_duedate, VoyageNumber, VoyageOrderNumber, VONo, VOMonth, VOYear, id_quotation, id_so, bussiness_type_order, BargingVesselTug, BargingVesselBarge, BargeSize, Capacity, TugPower, BargingJettyIdStart, BargingJettyIdEnd, StartDate, EndDate, ActualStartDate, ActualEndDate, period_year, period_month, period_quartal, Price, id_currency, change_rate, fuel_price, created_date, created_user, ip_user_updated, PaymentStatus, PaymentAmount, PaymentBankAccountID, PaymentDate, PaymentLate', 'safe', 'on'=>'searchbyUnpaid'),
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
			'VoyageOrder' => array(self::BELONGS_TO, 'VoyageOrder', 'id_voyage_order'),
			'Quotation' => array(self::BELONGS_TO, 'Quotation', 'id_quotation'),
			'BussinessTypeOrder' => array(self::BELONGS_TO, 'BussinessTypeOrder', 'bussiness_type_order'),
			'JettyOrigin' => array(self::BELONGS_TO, 'Jetty', 'BargingJettyIdStart'),
			'JettyDestination' => array(self::BELONGS_TO, 'Jetty', 'BargingJettyIdEnd'),
			'VesselTug' => array(self::BELONGS_TO, 'Vessel', 'BargingVesselTug'),
			'VesselBarge' => array(self::BELONGS_TO, 'Vessel', 'BargingVesselBarge'),
			'Currency' => array(self::BELONGS_TO, 'Currency', 'id_currency'),
			'BankAccount' => array(self::BELONGS_TO, 'BankAccount', 'PaymentBankAccountID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_invoice_voyage' => 'ID Invoice Voyage',
			'id_voyage_order' => 'ID Voyage Order',
			'id_customer' => 'ID Customer',
			'InvoiceDate' => 'Invoice Date',
			'InvoiceNumber' => 'Invoice Number',
			'print_slot1' => 'slot1',
			'print_slot2' => 'slot2',
			'print_CompanyName' => 'Company Name',
			'print_ShippingAddress' => 'Shipping Address',
			'print_NPWP' => 'NPWP',
			'print_NoFakturPajak' => 'No Faktur Pajak',
			'print_top' => 'TOP',
			'sales_code' => 'Sales Code',
			'print_CustomerCode' => 'Customer Code',
			'invoice_description' => 'Invoice Description',
			'invoice_marks' => 'Invoice Marks',
			'invoice_termdelivery' => 'Invoice Termdelivery',
			'invoice_duedate' => 'Invoice Duedate',
			'VoyageNumber' => 'Voyage Number',
			'VoyageOrderNumber' => 'Voyage Order Number',
			'VONo' => 'VO. No',
			'VOMonth' => 'VO. Month',
			'VOYear' => 'VO. Year',
			'id_quotation' => 'ID Quotation',
			'id_so' => 'ID SO',
			'bussiness_type_order' => 'Bussiness Type Order',
			'BargingVesselTug' => 'Barging Vessel Tug',
			'BargingVesselBarge' => 'Barging Vessel Barge',
			'BargeSize' => 'Barge Size',
			'Capacity' => 'Capacity',
			'TugPower' => 'Tug Power',
			'BargingJettyIdStart' => 'Barging Jetty ID Start',
			'BargingJettyIdEnd' => 'Barging Jetty ID End',
			'StartDate' => 'Start Date',
			'EndDate' => 'End Date',
			'ActualStartDate' => 'Actual Start Date',
			'ActualEndDate' => 'Actual End Date',
			'period_year' => 'Period Year',
			'period_month' => 'Period Month',
			'period_quartal' => 'Period Quartal',
			'Price' => 'Price',
			'id_currency' => 'ID Currency',
			'change_rate' => 'Change Rate',
			'fuel_price' => 'Fuel Price',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'ip_user_updated' => 'IP User Updated',
			'PaymentStatus'=>'Payment Status',
			'PaymentAmount'=>'Payment Amount',
			'PaymentBankAccountID'=>'Payment Bank Account',
			'PaymentDate'=>'Payment Date',
			'PaymentLate'=>'Payment Late',
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

		$criteria->compare('id_invoice_voyage',$this->id_invoice_voyage,true);
		$criteria->compare('id_voyage_order',$this->id_voyage_order,true);
		$criteria->compare('id_customer',$this->id_customer,true);
		$criteria->compare('InvoiceDate',$this->InvoiceDate,true);
		$criteria->compare('InvoiceNumber',$this->InvoiceNumber,true);
		$criteria->compare('print_CompanyName',$this->print_CompanyName,true);
		$criteria->compare('print_ShippingAddress',$this->print_ShippingAddress,true);
		$criteria->compare('print_NPWP',$this->print_NPWP,true);
		$criteria->compare('print_NoFakturPajak',$this->print_NoFakturPajak,true);
		$criteria->compare('print_top',$this->print_top);
		$criteria->compare('sales_code',$this->sales_code,true);
		$criteria->compare('print_CustomerCode',$this->print_CustomerCode,true);
		$criteria->compare('invoice_description',$this->invoice_description,true);
		$criteria->compare('invoice_marks',$this->invoice_marks,true);
		$criteria->compare('invoice_termdelivery',$this->invoice_termdelivery,true);
		$criteria->compare('invoice_duedate',$this->invoice_duedate,true);
		$criteria->compare('VoyageNumber',$this->VoyageNumber,true);
		$criteria->compare('VoyageOrderNumber',$this->VoyageOrderNumber);
		$criteria->compare('VONo',$this->VONo);
		$criteria->compare('VOMonth',$this->VOMonth);
		$criteria->compare('VOYear',$this->VOYear);
		$criteria->compare('id_quotation',$this->id_quotation,true);
		$criteria->compare('id_so',$this->id_so,true);
		$criteria->compare('bussiness_type_order',$this->bussiness_type_order);
		$criteria->compare('BargingVesselTug',$this->BargingVesselTug);
		$criteria->compare('BargingVesselBarge',$this->BargingVesselBarge);
		$criteria->compare('BargeSize',$this->BargeSize);
		$criteria->compare('Capacity',$this->Capacity);
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
		$criteria->compare('PaymentStatus',$this->PaymentStatus,true);
		$criteria->compare('PaymentAmount',$this->PaymentAmount,true);
		$criteria->compare('PaymentBankAccountID',$this->PaymentBankAccountID);
		$criteria->compare('PaymentDate',$this->PaymentDate,true);
		$criteria->compare('PaymentLate',$this->PaymentLate);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchbyUnpaid()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'PaymentStatus=:PaymentStatus';
		$criteria->params = array(':PaymentStatus'=>'UNPAID');

		$criteria->compare('id_invoice_voyage',$this->id_invoice_voyage,true);
		$criteria->compare('id_voyage_order',$this->id_voyage_order,true);
		$criteria->compare('id_customer',$this->id_customer,true);
		$criteria->compare('InvoiceDate',$this->InvoiceDate,true);
		$criteria->compare('InvoiceNumber',$this->InvoiceNumber,true);
		$criteria->compare('print_CompanyName',$this->print_CompanyName,true);
		$criteria->compare('print_ShippingAddress',$this->print_ShippingAddress,true);
		$criteria->compare('print_NPWP',$this->print_NPWP,true);
		$criteria->compare('print_NoFakturPajak',$this->print_NoFakturPajak,true);
		$criteria->compare('print_top',$this->print_top);
		$criteria->compare('sales_code',$this->sales_code,true);
		$criteria->compare('print_CustomerCode',$this->print_CustomerCode,true);
		$criteria->compare('invoice_description',$this->invoice_description,true);
		$criteria->compare('invoice_marks',$this->invoice_marks,true);
		$criteria->compare('invoice_termdelivery',$this->invoice_termdelivery,true);
		$criteria->compare('invoice_duedate',$this->invoice_duedate,true);
		$criteria->compare('VoyageNumber',$this->VoyageNumber,true);
		$criteria->compare('VoyageOrderNumber',$this->VoyageOrderNumber);
		$criteria->compare('VONo',$this->VONo);
		$criteria->compare('VOMonth',$this->VOMonth);
		$criteria->compare('VOYear',$this->VOYear);
		$criteria->compare('id_quotation',$this->id_quotation,true);
		$criteria->compare('id_so',$this->id_so,true);
		$criteria->compare('bussiness_type_order',$this->bussiness_type_order);
		$criteria->compare('BargingVesselTug',$this->BargingVesselTug);
		$criteria->compare('BargingVesselBarge',$this->BargingVesselBarge);
		$criteria->compare('BargeSize',$this->BargeSize);
		$criteria->compare('Capacity',$this->Capacity);
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
		$criteria->compare('PaymentStatus',$this->PaymentStatus,true);
		$criteria->compare('PaymentAmount',$this->PaymentAmount,true);
		$criteria->compare('PaymentBankAccountID',$this->PaymentBankAccountID);
		$criteria->compare('PaymentDate',$this->PaymentDate,true);
		$criteria->compare('PaymentLate',$this->PaymentLate);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return InvoiceVoyage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
