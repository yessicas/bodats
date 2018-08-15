<?php

/**
 * This is the model class for table "voyage_order".
 *
 * The followings are the available columns in table 'voyage_order':
 * @property string $id_voyage_order
 * @property string $VoyageNumber
 * @property integer $VoyageOrderNumber
 * @property integer $VONo
 * @property integer $VOMonth
 * @property integer $VOYear
 * @property string $id_quotation
 * @property string $id_so
 * @property string $id_voyage_order_plan
 * @property string $status
 * @property string $invoice_created
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
class VoyageOrder extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'voyage_order';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public $CompanyName;
    public $CompanyNameFull;

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('VoyageNumber, id_quotation, id_so, id_voyage_order_plan, status, invoice_created,  bussiness_type_order, BargingVesselTug, BargingVesselBarge, BargeSize, Capacity, TugPower, BargingJettyIdStart, BargingJettyIdEnd, StartDate, EndDate, ActualStartDate, ActualEndDate, period_year, period_month, period_quartal, Price, id_currency, change_rate, fuel_price, created_date, created_user, ip_user_updated', 'required'),
            array('VONo, VOMonth, VOYear, bussiness_type_order, BargingVesselTug, BargingVesselBarge, BargeSize, TugPower, BargingJettyIdStart, BargingJettyIdEnd, period_year, period_month, period_quartal, id_currency, invoice_created', 'numerical', 'integerOnly' => true),
            array('invoice_created, Price, change_rate, fuel_price,Capacity, ActualCapacity', 'numerical'),
            array('VoyageNumber, status_schedule', 'length', 'max' => 100),
            array('id_quotation, id_so, id_voyage_order_plan', 'length', 'max' => 20),
            array('created_user', 'length', 'max' => 45),
            array('ip_user_updated', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_voyage_order, VoyageNumber, VoyageOrderNumber, VONo, VOMonth, VOYear, id_quotation, id_so, id_voyage_order_plan, status, invoice_created, bussiness_type_order, BargingVesselTug, BargingVesselBarge, BargeSize, Capacity, TugPower, BargingJettyIdStart, BargingJettyIdEnd, StartDate, EndDate, ActualStartDate, ActualEndDate, period_year, period_month, period_quartal, Price, id_currency, change_rate, fuel_price, created_date, created_user, ip_user_updated, status_schedule,CompanyNameFull', 'safe', 'on' => 'search'),
            array('id_voyage_order, VoyageNumber, VoyageOrderNumber, VONo, VOMonth, VOYear, id_quotation, id_so, id_voyage_order_plan, status, invoice_created, bussiness_type_order, BargingVesselTug, BargingVesselBarge, BargeSize, Capacity, TugPower, BargingJettyIdStart, BargingJettyIdEnd, StartDate, EndDate, ActualStartDate, ActualEndDate, period_year, period_month, period_quartal, Price, id_currency, change_rate, fuel_price, created_date, created_user, ip_user_updated, status_schedule,CompanyNameFull', 'safe', 'on' => 'searchbystatuspropose'),
            array('id_voyage_order, VoyageNumber, VoyageOrderNumber, VONo, VOMonth, VOYear, id_quotation, id_so, id_voyage_order_plan, status, invoice_created, bussiness_type_order, BargingVesselTug, BargingVesselBarge, BargeSize, Capacity, TugPower, BargingJettyIdStart, BargingJettyIdEnd, StartDate, EndDate, ActualStartDate, ActualEndDate, period_year, period_month, period_quartal, Price, id_currency, change_rate, fuel_price, created_date, created_user, ip_user_updated, status_schedule,CompanyNameFull', 'safe', 'on' => 'searchbystatusproposebyvessel'),
            array('id_voyage_order, VoyageNumber, VoyageOrderNumber, VONo, VOMonth, VOYear, id_quotation, id_so, id_voyage_order_plan, status, invoice_created, bussiness_type_order, BargingVesselTug, BargingVesselBarge, BargeSize, Capacity, TugPower, BargingJettyIdStart, BargingJettyIdEnd, StartDate, EndDate, ActualStartDate, ActualEndDate, period_year, period_month, period_quartal, Price, id_currency, change_rate, fuel_price, created_date, created_user, ip_user_updated, status_schedule,CompanyNameFull', 'safe', 'on' => 'searchbystatucreate'),
            array('id_voyage_order, VoyageNumber, VoyageOrderNumber, VONo, VOMonth, VOYear, id_quotation, id_so, id_voyage_order_plan, status, invoice_created, bussiness_type_order, BargingVesselTug, BargingVesselBarge, BargeSize, Capacity, TugPower, BargingJettyIdStart, BargingJettyIdEnd, StartDate, EndDate, ActualStartDate, ActualEndDate, period_year, period_month, period_quartal, Price, id_currency, change_rate, fuel_price, created_date, created_user, ip_user_updated, status_schedule,CompanyNameFull', 'safe', 'on' => 'searchbystatusrunning'),
            array('id_voyage_order, VoyageNumber, VoyageOrderNumber, VONo, VOMonth, VOYear, id_quotation, id_so, id_voyage_order_plan, status, invoice_created, bussiness_type_order, BargingVesselTug, BargingVesselBarge, BargeSize, Capacity, TugPower, BargingJettyIdStart, BargingJettyIdEnd, StartDate, EndDate, ActualStartDate, ActualEndDate, period_year, period_month, period_quartal, Price, id_currency, change_rate, fuel_price, created_date, created_user, ip_user_updated, status_schedule,CompanyNameFull', 'safe', 'on' => 'searchbystatusfinish'),
            array('id_voyage_order, VoyageNumber, VoyageOrderNumber, VONo, VOMonth, VOYear, id_quotation, id_so, id_voyage_order_plan, status, invoice_created, bussiness_type_order, BargingVesselTug, BargingVesselBarge, BargeSize, Capacity, TugPower, BargingJettyIdStart, BargingJettyIdEnd, StartDate, EndDate, ActualStartDate, ActualEndDate, period_year, period_month, period_quartal, Price, id_currency, change_rate, fuel_price, created_date, created_user, ip_user_updated, status_schedule,CompanyNameFull', 'safe', 'on' => 'searchbystatusrunningANDfinish'),
            array('id_voyage_order, VoyageNumber, VoyageOrderNumber, VONo, VOMonth, VOYear, id_quotation, id_so, id_voyage_order_plan, status, invoice_created, bussiness_type_order, BargingVesselTug, BargingVesselBarge, BargeSize, Capacity, TugPower, BargingJettyIdStart, BargingJettyIdEnd, StartDate, EndDate, ActualStartDate, ActualEndDate, period_year, period_month, period_quartal, Price, id_currency, change_rate, fuel_price, created_date, created_user, ip_user_updated, status_schedule,CompanyNameFull, CompanyName', 'safe', 'on' => 'searchMonitoring'),
            array('id_voyage_order, VoyageNumber, VoyageOrderNumber, VONo, VOMonth, VOYear, id_quotation, id_so, id_voyage_order_plan, status, invoice_created, bussiness_type_order, BargingVesselTug, BargingVesselBarge, BargeSize, Capacity, TugPower, BargingJettyIdStart, BargingJettyIdEnd, StartDate, EndDate, ActualStartDate, ActualEndDate, period_year, period_month, period_quartal, Price, id_currency, change_rate, fuel_price, created_date, created_user, ip_user_updated, status_schedule,CompanyNameFull, CompanyName', 'safe', 'on' => 'searchbyFinishVogare'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Quotation' => array(self::BELONGS_TO, 'Quotation', 'id_quotation'),
            'BussinessTypeOrder' => array(self::BELONGS_TO, 'BussinessTypeOrder', 'bussiness_type_order'),
            'JettyOrigin' => array(self::BELONGS_TO, 'Jetty', 'BargingJettyIdStart'),
            'JettyDestination' => array(self::BELONGS_TO, 'Jetty', 'BargingJettyIdEnd'),
            'VesselTug' => array(self::BELONGS_TO, 'Vessel', 'BargingVesselTug'),
            'VesselBarge' => array(self::BELONGS_TO, 'Vessel', 'BargingVesselBarge'),
            'Currency' => array(self::BELONGS_TO, 'Currency', 'id_currency'),
            'So' => array(self::BELONGS_TO, 'So', 'id_so'),
            'Customer' => array(self::BELONGS_TO, 'Customer', array('id_customer' => 'id_customer'), 'through' => 'Quotation'), // relasi baru nih
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_voyage_order' => 'ID Voyage Order',
            'VoyageNumber' => 'Voyage Number',
            'VoyageOrderNumber' => 'Voyage Order Number',
            'VONo' => 'VO. No',
            'VOMonth' => 'VO. Month',
            'VOYear' => 'VO. Year',
            'id_quotation' => 'ID Quotation',
            'id_so' => 'ID SO',
            'id_voyage_order_plan' => 'ID Voyage Order Plan',
            'status' => 'Status',
            'invoice_created' => 'Invoice Created',
            'bussiness_type_order' => 'Bussiness Type Order',
            'BargingVesselTug' => 'Barging Vessel Tug',
            'BargingVesselBarge' => 'Barging Vessel Barge',
            'BargeSize' => 'Barge Size',
            'Capacity' => 'Capacity',
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
            'id_currency' => 'ID Currency',
            'change_rate' => 'Change Rate',
            'fuel_price' => 'Fuel Price',
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
    public function search($page = 15) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->order = "StartDate DESC";
        $criteria->compare('id_voyage_order', $this->id_voyage_order, true);
        $criteria->compare('VoyageNumber', $this->VoyageNumber, true);
        $criteria->compare('VoyageOrderNumber', $this->VoyageOrderNumber);
        $criteria->compare('VONo', $this->VONo);
        $criteria->compare('VOMonth', $this->VOMonth);
        $criteria->compare('VOYear', $this->VOYear);
        $criteria->compare('id_quotation', $this->id_quotation, true);
        $criteria->compare('id_so', $this->id_so, true);
        $criteria->compare('id_voyage_order_plan', $this->id_voyage_order_plan, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('bussiness_type_order', $this->bussiness_type_order);
        $criteria->compare('BargingVesselTug', $this->BargingVesselTug);
        $criteria->compare('BargingVesselBarge', $this->BargingVesselBarge);
        $criteria->compare('BargeSize', $this->BargeSize);
        $criteria->compare('Capacity', $this->Capacity);
        $criteria->compare('TugPower', $this->TugPower);
        $criteria->compare('BargingJettyIdStart', $this->BargingJettyIdStart);
        $criteria->compare('BargingJettyIdEnd', $this->BargingJettyIdEnd);
        $criteria->compare('StartDate', $this->StartDate, true);
        $criteria->compare('EndDate', $this->EndDate, true);
        $criteria->compare('ActualStartDate', $this->ActualStartDate, true);
        $criteria->compare('ActualEndDate', $this->ActualEndDate, true);
        $criteria->compare('period_year', $this->period_year);
        $criteria->compare('period_month', $this->period_month);
        $criteria->compare('period_quartal', $this->period_quartal);
        $criteria->compare('Price', $this->Price);
        $criteria->compare('id_currency', $this->id_currency);
        $criteria->compare('change_rate', $this->change_rate);
        $criteria->compare('fuel_price', $this->fuel_price);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('created_user', $this->created_user, true);
        $criteria->compare('ip_user_updated', $this->ip_user_updated, true);
        $pagination = array('pageSize' => $page);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => $pagination,
        ));
    }

    public function searchByDateRange($month, $year) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $startend = Timeanddate::getStartAndEndFromMonth($month, $year);

        $criteria->addBetweenCondition("StartDate", $startend["start"], $startend["end"]);

        $criteria->compare('id_voyage_order', $this->id_voyage_order, true);
        $criteria->compare('VoyageNumber', $this->VoyageNumber, true);
        $criteria->compare('VoyageOrderNumber', $this->VoyageOrderNumber);
        $criteria->compare('VONo', $this->VONo);
        $criteria->compare('VOMonth', $this->VOMonth);
        $criteria->compare('VOYear', $this->VOYear);
        $criteria->compare('id_quotation', $this->id_quotation, true);
        $criteria->compare('id_so', $this->id_so, true);
        $criteria->compare('id_voyage_order_plan', $this->id_voyage_order_plan, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('bussiness_type_order', $this->bussiness_type_order);
        $criteria->compare('BargingVesselTug', $this->BargingVesselTug);
        $criteria->compare('BargingVesselBarge', $this->BargingVesselBarge);
        $criteria->compare('BargeSize', $this->BargeSize);
        $criteria->compare('Capacity', $this->Capacity);
        $criteria->compare('TugPower', $this->TugPower);
        $criteria->compare('BargingJettyIdStart', $this->BargingJettyIdStart);
        $criteria->compare('BargingJettyIdEnd', $this->BargingJettyIdEnd);
        $criteria->compare('StartDate', $this->StartDate, true);
        $criteria->compare('EndDate', $this->EndDate, true);
        $criteria->compare('ActualStartDate', $this->ActualStartDate, true);
        $criteria->compare('ActualEndDate', $this->ActualEndDate, true);
        $criteria->compare('period_year', $this->period_year);
        $criteria->compare('period_month', $this->period_month);
        $criteria->compare('period_quartal', $this->period_quartal);
        $criteria->compare('Price', $this->Price);
        $criteria->compare('id_currency', $this->id_currency);
        $criteria->compare('change_rate', $this->change_rate);
        $criteria->compare('fuel_price', $this->fuel_price);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('created_user', $this->created_user, true);
        $criteria->compare('ip_user_updated', $this->ip_user_updated, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchbycustomer($id_customer = 450) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        //$criteria->condition = 'Quotation=:idc';
        //d$criteria->params = array(':idc'=>$id_customer);

        $criteria->with = array(
            'Quotation' => array('joinType' => 'LEFT JOIN'),
        );
        $criteria->addCondition('Quotation.id_customer = ' . $id_customer);
        $criteria->order = "StartDate DESC";

        $criteria->compare('id_voyage_order', $this->id_voyage_order, true);
        $criteria->compare('VoyageNumber', $this->VoyageNumber, true);
        $criteria->compare('VoyageOrderNumber', $this->VoyageOrderNumber);
        $criteria->compare('VONo', $this->VONo);
        $criteria->compare('VOMonth', $this->VOMonth);
        $criteria->compare('VOYear', $this->VOYear);
        $criteria->compare('id_quotation', $this->id_quotation, true);
        $criteria->compare('id_so', $this->id_so, true);
        $criteria->compare('id_voyage_order_plan', $this->id_voyage_order_plan, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('bussiness_type_order', $this->bussiness_type_order);
        $criteria->compare('BargingVesselTug', $this->BargingVesselTug);
        $criteria->compare('BargingVesselBarge', $this->BargingVesselBarge);
        $criteria->compare('BargeSize', $this->BargeSize);
        $criteria->compare('Capacity', $this->Capacity);
        $criteria->compare('TugPower', $this->TugPower);
        $criteria->compare('BargingJettyIdStart', $this->BargingJettyIdStart);
        $criteria->compare('BargingJettyIdEnd', $this->BargingJettyIdEnd);
        $criteria->compare('StartDate', $this->StartDate, true);
        $criteria->compare('EndDate', $this->EndDate, true);
        $criteria->compare('ActualStartDate', $this->ActualStartDate, true);
        $criteria->compare('ActualEndDate', $this->ActualEndDate, true);
        $criteria->compare('period_year', $this->period_year);
        $criteria->compare('period_month', $this->period_month);
        $criteria->compare('period_quartal', $this->period_quartal);
        $criteria->compare('Price', $this->Price);
        $criteria->compare('id_currency', $this->id_currency);
        $criteria->compare('change_rate', $this->change_rate);
        $criteria->compare('fuel_price', $this->fuel_price);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('created_user', $this->created_user, true);
        $criteria->compare('ip_user_updated', $this->ip_user_updated, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchbystatuspropose() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->condition = 'status=:status AND status_schedule=:status_schedule';
        $criteria->params = array(':status' => 'SHIPPING ORDER', ':status_schedule' => 'NONE');

        $criteria->compare('id_voyage_order', $this->id_voyage_order, true);
        $criteria->compare('VoyageNumber', $this->VoyageNumber, true);
        $criteria->compare('VoyageOrderNumber', $this->VoyageOrderNumber);
        $criteria->compare('VONo', $this->VONo);
        $criteria->compare('VOMonth', $this->VOMonth);
        $criteria->compare('VOYear', $this->VOYear);
        $criteria->compare('id_quotation', $this->id_quotation, true);
        $criteria->compare('id_so', $this->id_so, true);
        $criteria->compare('id_voyage_order_plan', $this->id_voyage_order_plan, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('bussiness_type_order', $this->bussiness_type_order);
        $criteria->compare('BargingVesselTug', $this->BargingVesselTug);
        $criteria->compare('BargingVesselBarge', $this->BargingVesselBarge);
        $criteria->compare('BargeSize', $this->BargeSize);
        $criteria->compare('Capacity', $this->Capacity);
        $criteria->compare('TugPower', $this->TugPower);
        $criteria->compare('BargingJettyIdStart', $this->BargingJettyIdStart);
        $criteria->compare('BargingJettyIdEnd', $this->BargingJettyIdEnd);
        $criteria->compare('StartDate', $this->StartDate, true);
        $criteria->compare('EndDate', $this->EndDate, true);
        $criteria->compare('ActualStartDate', $this->ActualStartDate, true);
        $criteria->compare('ActualEndDate', $this->ActualEndDate, true);
        $criteria->compare('period_year', $this->period_year);
        $criteria->compare('period_month', $this->period_month);
        $criteria->compare('period_quartal', $this->period_quartal);
        $criteria->compare('Price', $this->Price);
        $criteria->compare('id_currency', $this->id_currency);
        $criteria->compare('change_rate', $this->change_rate);
        $criteria->compare('fuel_price', $this->fuel_price);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('created_user', $this->created_user, true);
        $criteria->compare('ip_user_updated', $this->ip_user_updated, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchbystatusproposebyvessel($BargingVesselTug, $BargingVesselBarge) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->condition = 'status=:status AND  BargingVesselTug=:BargingVesselTug AND  BargingVesselBarge=:BargingVesselBarge AND status_schedule=:status_schedule ';
        $criteria->params = array(':status' => 'SHIPPING ORDER', ':BargingVesselTug' => $BargingVesselTug, ':BargingVesselBarge' => $BargingVesselBarge, ':status_schedule' => 'NONE');

        $criteria->compare('id_voyage_order', $this->id_voyage_order, true);
        $criteria->compare('VoyageNumber', $this->VoyageNumber, true);
        $criteria->compare('VoyageOrderNumber', $this->VoyageOrderNumber);
        $criteria->compare('VONo', $this->VONo);
        $criteria->compare('VOMonth', $this->VOMonth);
        $criteria->compare('VOYear', $this->VOYear);
        $criteria->compare('id_quotation', $this->id_quotation, true);
        $criteria->compare('id_so', $this->id_so, true);
        $criteria->compare('id_voyage_order_plan', $this->id_voyage_order_plan, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('bussiness_type_order', $this->bussiness_type_order);
        $criteria->compare('BargingVesselTug', $this->BargingVesselTug);
        $criteria->compare('BargingVesselBarge', $this->BargingVesselBarge);
        $criteria->compare('BargeSize', $this->BargeSize);
        $criteria->compare('Capacity', $this->Capacity);
        $criteria->compare('TugPower', $this->TugPower);
        $criteria->compare('BargingJettyIdStart', $this->BargingJettyIdStart);
        $criteria->compare('BargingJettyIdEnd', $this->BargingJettyIdEnd);
        $criteria->compare('StartDate', $this->StartDate, true);
        $criteria->compare('EndDate', $this->EndDate, true);
        $criteria->compare('ActualStartDate', $this->ActualStartDate, true);
        $criteria->compare('ActualEndDate', $this->ActualEndDate, true);
        $criteria->compare('period_year', $this->period_year);
        $criteria->compare('period_month', $this->period_month);
        $criteria->compare('period_quartal', $this->period_quartal);
        $criteria->compare('Price', $this->Price);
        $criteria->compare('id_currency', $this->id_currency);
        $criteria->compare('change_rate', $this->change_rate);
        $criteria->compare('fuel_price', $this->fuel_price);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('created_user', $this->created_user, true);
        $criteria->compare('ip_user_updated', $this->ip_user_updated, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchbystatucreate() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->condition = 'status=:status';
        $criteria->params = array(':status' => 'VO CREATE');

        $criteria->compare('id_voyage_order', $this->id_voyage_order, true);
        $criteria->compare('VoyageNumber', $this->VoyageNumber, true);
        $criteria->compare('VoyageOrderNumber', $this->VoyageOrderNumber);
        $criteria->compare('VONo', $this->VONo);
        $criteria->compare('VOMonth', $this->VOMonth);
        $criteria->compare('VOYear', $this->VOYear);
        $criteria->compare('id_quotation', $this->id_quotation, true);
        $criteria->compare('id_so', $this->id_so, true);
        $criteria->compare('id_voyage_order_plan', $this->id_voyage_order_plan, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('bussiness_type_order', $this->bussiness_type_order);
        $criteria->compare('BargingVesselTug', $this->BargingVesselTug);
        $criteria->compare('BargingVesselBarge', $this->BargingVesselBarge);
        $criteria->compare('BargeSize', $this->BargeSize);
        $criteria->compare('Capacity', $this->Capacity);
        $criteria->compare('TugPower', $this->TugPower);
        $criteria->compare('BargingJettyIdStart', $this->BargingJettyIdStart);
        $criteria->compare('BargingJettyIdEnd', $this->BargingJettyIdEnd);
        $criteria->compare('StartDate', $this->StartDate, true);
        $criteria->compare('EndDate', $this->EndDate, true);
        $criteria->compare('ActualStartDate', $this->ActualStartDate, true);
        $criteria->compare('ActualEndDate', $this->ActualEndDate, true);
        $criteria->compare('period_year', $this->period_year);
        $criteria->compare('period_month', $this->period_month);
        $criteria->compare('period_quartal', $this->period_quartal);
        $criteria->compare('Price', $this->Price);
        $criteria->compare('id_currency', $this->id_currency);
        $criteria->compare('change_rate', $this->change_rate);
        $criteria->compare('fuel_price', $this->fuel_price);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('created_user', $this->created_user, true);
        $criteria->compare('ip_user_updated', $this->ip_user_updated, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchbystatusrunning() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->with = array('Customer');
        $criteria->together = true;

        $criteria->condition = 't.status=:status';
        $criteria->params = array(':status' => 'VO SAILING');

        $criteria->compare('Customer.CompanyName', $this->CompanyNameFull, true);

        $criteria->compare('t.id_voyage_order', $this->id_voyage_order, true);
        $criteria->compare('t.VoyageNumber', $this->VoyageNumber, true);
        $criteria->compare('t.VoyageOrderNumber', $this->VoyageOrderNumber);
        $criteria->compare('t.VONo', $this->VONo);
        $criteria->compare('t.VOMonth', $this->VOMonth);
        $criteria->compare('t.VOYear', $this->VOYear);
        $criteria->compare('t.id_quotation', $this->id_quotation, true);
        $criteria->compare('t.id_so', $this->id_so, true);
        $criteria->compare('t.id_voyage_order_plan', $this->id_voyage_order_plan, true);
        $criteria->compare('t.status', $this->status, true);
        $criteria->compare('t.bussiness_type_order', $this->bussiness_type_order);
        $criteria->compare('t.BargingVesselTug', $this->BargingVesselTug);
        $criteria->compare('t.BargingVesselBarge', $this->BargingVesselBarge);
        $criteria->compare('t.BargeSize', $this->BargeSize);
        $criteria->compare('t.Capacity', $this->Capacity);
        $criteria->compare('t.TugPower', $this->TugPower);
        $criteria->compare('t.BargingJettyIdStart', $this->BargingJettyIdStart);
        $criteria->compare('t.BargingJettyIdEnd', $this->BargingJettyIdEnd);
        $criteria->compare('t.StartDate', $this->StartDate, true);
        $criteria->compare('t.EndDate', $this->EndDate, true);
        $criteria->compare('t.ActualStartDate', $this->ActualStartDate, true);
        $criteria->compare('t.ActualEndDate', $this->ActualEndDate, true);
        $criteria->compare('t.period_year', $this->period_year);
        $criteria->compare('t.period_month', $this->period_month);
        $criteria->compare('t.period_quartal', $this->period_quartal);
        $criteria->compare('t.Price', $this->Price);
        $criteria->compare('t.id_currency', $this->id_currency);
        $criteria->compare('t.change_rate', $this->change_rate);
        $criteria->compare('t.fuel_price', $this->fuel_price);
        $criteria->compare('t.created_date', $this->created_date, true);
        $criteria->compare('t.created_user', $this->created_user, true);
        $criteria->compare('t.ip_user_updated', $this->ip_user_updated, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchbystatusfinish() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->condition = 'status=:status';
        $criteria->params = array(':status' => 'VO FINISH');

        $criteria->compare('id_voyage_order', $this->id_voyage_order, true);
        $criteria->compare('VoyageNumber', $this->VoyageNumber, true);
        $criteria->compare('VoyageOrderNumber', $this->VoyageOrderNumber);
        $criteria->compare('VONo', $this->VONo);
        $criteria->compare('VOMonth', $this->VOMonth);
        $criteria->compare('VOYear', $this->VOYear);
        $criteria->compare('id_quotation', $this->id_quotation, true);
        $criteria->compare('id_so', $this->id_so, true);
        $criteria->compare('id_voyage_order_plan', $this->id_voyage_order_plan, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('bussiness_type_order', $this->bussiness_type_order);
        $criteria->compare('BargingVesselTug', $this->BargingVesselTug);
        $criteria->compare('BargingVesselBarge', $this->BargingVesselBarge);
        $criteria->compare('BargeSize', $this->BargeSize);
        $criteria->compare('Capacity', $this->Capacity);
        $criteria->compare('TugPower', $this->TugPower);
        $criteria->compare('BargingJettyIdStart', $this->BargingJettyIdStart);
        $criteria->compare('BargingJettyIdEnd', $this->BargingJettyIdEnd);
        $criteria->compare('StartDate', $this->StartDate, true);
        $criteria->compare('EndDate', $this->EndDate, true);
        $criteria->compare('ActualStartDate', $this->ActualStartDate, true);
        $criteria->compare('ActualEndDate', $this->ActualEndDate, true);
        $criteria->compare('period_year', $this->period_year);
        $criteria->compare('period_month', $this->period_month);
        $criteria->compare('period_quartal', $this->period_quartal);
        $criteria->compare('Price', $this->Price);
        $criteria->compare('id_currency', $this->id_currency);
        $criteria->compare('change_rate', $this->change_rate);
        $criteria->compare('fuel_price', $this->fuel_price);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('created_user', $this->created_user, true);
        $criteria->compare('ip_user_updated', $this->ip_user_updated, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchbystatusrunningANDfinish() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->with = array('Customer');
        $criteria->together = true;

        $criteria->condition = 't.status=:status1 OR t.status=:status2';
        $criteria->params = array(':status1' => 'VO SAILING', ':status2' => 'VO FINISH');

        $criteria->compare('Customer.CompanyName', $this->CompanyNameFull, true);

        $criteria->compare('t.id_voyage_order', $this->id_voyage_order, true);
        $criteria->compare('t.VoyageNumber', $this->VoyageNumber, true);
        $criteria->compare('t.VoyageOrderNumber', $this->VoyageOrderNumber);
        $criteria->compare('t.VONo', $this->VONo);
        $criteria->compare('t.VOMonth', $this->VOMonth);
        $criteria->compare('t.VOYear', $this->VOYear);
        $criteria->compare('t.id_quotation', $this->id_quotation, true);
        $criteria->compare('t.id_so', $this->id_so, true);
        $criteria->compare('t.id_voyage_order_plan', $this->id_voyage_order_plan, true);
        $criteria->compare('t.status', $this->status, true);
        $criteria->compare('t.bussiness_type_order', $this->bussiness_type_order);
        $criteria->compare('t.BargingVesselTug', $this->BargingVesselTug);
        $criteria->compare('t.BargingVesselBarge', $this->BargingVesselBarge);
        $criteria->compare('t.BargeSize', $this->BargeSize);
        $criteria->compare('t.Capacity', $this->Capacity);
        $criteria->compare('t.TugPower', $this->TugPower);
        $criteria->compare('t.BargingJettyIdStart', $this->BargingJettyIdStart);
        $criteria->compare('t.BargingJettyIdEnd', $this->BargingJettyIdEnd);
        $criteria->compare('t.StartDate', $this->StartDate, true);
        $criteria->compare('t.EndDate', $this->EndDate, true);
        $criteria->compare('t.ActualStartDate', $this->ActualStartDate, true);
        $criteria->compare('t.ActualEndDate', $this->ActualEndDate, true);
        $criteria->compare('t.period_year', $this->period_year);
        $criteria->compare('t.period_month', $this->period_month);
        $criteria->compare('t.period_quartal', $this->period_quartal);
        $criteria->compare('t.Price', $this->Price);
        $criteria->compare('t.id_currency', $this->id_currency);
        $criteria->compare('t.change_rate', $this->change_rate);
        $criteria->compare('t.fuel_price', $this->fuel_price);
        $criteria->compare('t.created_date', $this->created_date, true);
        $criteria->compare('t.created_user', $this->created_user, true);
        $criteria->compare('t.ip_user_updated', $this->ip_user_updated, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchbyFinishVogare() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->condition = 'status=:status1 OR status=:status2 OR status=:status3 OR status=:status4';
        $criteria->params = array(':status1' => 'VO SAILING', ':status2' => 'VO FINISH', ':status3' => 'VO DOC COMPLETE', ':status4' => 'INVOICE');

        $criteria->compare('id_voyage_order', $this->id_voyage_order, true);
        $criteria->compare('VoyageNumber', $this->VoyageNumber, true);
        $criteria->compare('VoyageOrderNumber', $this->VoyageOrderNumber);
        $criteria->compare('VONo', $this->VONo);
        $criteria->compare('VOMonth', $this->VOMonth);
        $criteria->compare('VOYear', $this->VOYear);
        $criteria->compare('id_quotation', $this->id_quotation, true);
        $criteria->compare('id_so', $this->id_so, true);
        $criteria->compare('id_voyage_order_plan', $this->id_voyage_order_plan, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('invoice_created', $this->invoice_created, true);
        $criteria->compare('bussiness_type_order', $this->bussiness_type_order);
        $criteria->compare('BargingVesselTug', $this->BargingVesselTug);
        $criteria->compare('BargingVesselBarge', $this->BargingVesselBarge);
        $criteria->compare('BargeSize', $this->BargeSize);
        $criteria->compare('Capacity', $this->Capacity);
        $criteria->compare('TugPower', $this->TugPower);
        $criteria->compare('BargingJettyIdStart', $this->BargingJettyIdStart);
        $criteria->compare('BargingJettyIdEnd', $this->BargingJettyIdEnd);
        $criteria->compare('StartDate', $this->StartDate, true);
        $criteria->compare('EndDate', $this->EndDate, true);
        $criteria->compare('ActualStartDate', $this->ActualStartDate, true);
        $criteria->compare('ActualEndDate', $this->ActualEndDate, true);
        $criteria->compare('period_year', $this->period_year);
        $criteria->compare('period_month', $this->period_month);
        $criteria->compare('period_quartal', $this->period_quartal);
        $criteria->compare('Price', $this->Price);
        $criteria->compare('id_currency', $this->id_currency);
        $criteria->compare('change_rate', $this->change_rate);
        $criteria->compare('fuel_price', $this->fuel_price);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('created_user', $this->created_user, true);
        $criteria->compare('ip_user_updated', $this->ip_user_updated, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchbyFinishVogared() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->condition = 'invoice_created=:invoice_created1 OR invoice_created=:invoice_created2' ;
        $criteria->params = array(':invoice_created1'=> 1, ':invoice_created2' => 0);

        $criteria->compare('id_voyage_order', $this->id_voyage_order, true);
        $criteria->compare('VoyageNumber', $this->VoyageNumber, true);
        $criteria->compare('VoyageOrderNumber', $this->VoyageOrderNumber);
        $criteria->compare('VONo', $this->VONo);
        $criteria->compare('VOMonth', $this->VOMonth);
        $criteria->compare('VOYear', $this->VOYear);
        $criteria->compare('id_quotation', $this->id_quotation, true);
        $criteria->compare('id_so', $this->id_so, true);
        $criteria->compare('id_voyage_order_plan', $this->id_voyage_order_plan, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('invoice_created', $this->invoice_created);
        $criteria->compare('bussiness_type_order', $this->bussiness_type_order);
        $criteria->compare('BargingVesselTug', $this->BargingVesselTug);
        $criteria->compare('BargingVesselBarge', $this->BargingVesselBarge);
        $criteria->compare('BargeSize', $this->BargeSize);
        $criteria->compare('Capacity', $this->Capacity);
        $criteria->compare('TugPower', $this->TugPower);
        $criteria->compare('BargingJettyIdStart', $this->BargingJettyIdStart);
        $criteria->compare('BargingJettyIdEnd', $this->BargingJettyIdEnd);
        $criteria->compare('StartDate', $this->StartDate, true);
        $criteria->compare('EndDate', $this->EndDate, true);
        $criteria->compare('ActualStartDate', $this->ActualStartDate, true);
        $criteria->compare('ActualEndDate', $this->ActualEndDate, true);
        $criteria->compare('period_year', $this->period_year);
        $criteria->compare('period_month', $this->period_month);
        $criteria->compare('period_quartal', $this->period_quartal);
        $criteria->compare('Price', $this->Price);
        $criteria->compare('id_currency', $this->id_currency);
        $criteria->compare('change_rate', $this->change_rate);
        $criteria->compare('fuel_price', $this->fuel_price);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('created_user', $this->created_user, true);
        $criteria->compare('ip_user_updated', $this->ip_user_updated, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    public function searchMonitoring($StartDateAwal, $StartDateAkhir) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->with = array('Quotation');
        $criteria->together = true;
        $criteria->condition = 'StartDate >= :StartDateAwal AND StartDate <= :StartDateAkhir';
        $criteria->params = array(':StartDateAwal' => $StartDateAwal, ':StartDateAkhir' => $StartDateAkhir);

        $criteria->compare('Quotation.id_customer', $this->CompanyName);
        $criteria->compare('id_voyage_order', $this->id_voyage_order, true);
        $criteria->compare('VoyageNumber', $this->VoyageNumber, true);
        $criteria->compare('VoyageOrderNumber', $this->VoyageOrderNumber);
        $criteria->compare('VONo', $this->VONo);
        $criteria->compare('VOMonth', $this->VOMonth);
        $criteria->compare('VOYear', $this->VOYear);
        $criteria->compare('id_quotation', $this->id_quotation, true);
        $criteria->compare('id_so', $this->id_so, true);
        $criteria->compare('id_voyage_order_plan', $this->id_voyage_order_plan, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('bussiness_type_order', $this->bussiness_type_order);
        $criteria->compare('BargingVesselTug', $this->BargingVesselTug);
        $criteria->compare('BargingVesselBarge', $this->BargingVesselBarge);
        $criteria->compare('BargeSize', $this->BargeSize);
        $criteria->compare('Capacity', $this->Capacity);
        $criteria->compare('TugPower', $this->TugPower);
        $criteria->compare('BargingJettyIdStart', $this->BargingJettyIdStart);
        $criteria->compare('BargingJettyIdEnd', $this->BargingJettyIdEnd);
        $criteria->compare('StartDate', $this->StartDate, true);
        $criteria->compare('EndDate', $this->EndDate, true);
        $criteria->compare('ActualStartDate', $this->ActualStartDate, true);
        $criteria->compare('ActualEndDate', $this->ActualEndDate, true);
        $criteria->compare('period_year', $this->period_year);
        $criteria->compare('period_month', $this->period_month);
        $criteria->compare('period_quartal', $this->period_quartal);
        $criteria->compare('Price', $this->Price);
        $criteria->compare('id_currency', $this->id_currency);
        $criteria->compare('change_rate', $this->change_rate);
        $criteria->compare('fuel_price', $this->fuel_price);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('created_user', $this->created_user, true);
        $criteria->compare('ip_user_updated', $this->ip_user_updated, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => false,
            'sort' => array(
                'defaultOrder' => 'StartDate DESC',
            ),
        ));
    }
    
    public function searchbyFinishdoc() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->condition = 'status=:status1';
        $criteria->params = array(':status1' => 'VO FINISH');

        $criteria->compare('id_voyage_order', $this->id_voyage_order, true);
        $criteria->compare('VoyageNumber', $this->VoyageNumber, true);
        $criteria->compare('VoyageOrderNumber', $this->VoyageOrderNumber);
        $criteria->compare('VONo', $this->VONo);
        $criteria->compare('VOMonth', $this->VOMonth);
        $criteria->compare('VOYear', $this->VOYear);
        $criteria->compare('id_quotation', $this->id_quotation, true);
        $criteria->compare('id_so', $this->id_so, true);
        $criteria->compare('id_voyage_order_plan', $this->id_voyage_order_plan, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('bussiness_type_order', $this->bussiness_type_order);
        $criteria->compare('BargingVesselTug', $this->BargingVesselTug);
        $criteria->compare('BargingVesselBarge', $this->BargingVesselBarge);
        $criteria->compare('BargeSize', $this->BargeSize);
        $criteria->compare('Capacity', $this->Capacity);
        $criteria->compare('TugPower', $this->TugPower);
        $criteria->compare('BargingJettyIdStart', $this->BargingJettyIdStart);
        $criteria->compare('BargingJettyIdEnd', $this->BargingJettyIdEnd);
        $criteria->compare('StartDate', $this->StartDate, true);
        $criteria->compare('EndDate', $this->EndDate, true);
        $criteria->compare('ActualStartDate', $this->ActualStartDate, true);
        $criteria->compare('ActualEndDate', $this->ActualEndDate, true);
        $criteria->compare('period_year', $this->period_year);
        $criteria->compare('period_month', $this->period_month);
        $criteria->compare('period_quartal', $this->period_quartal);
        $criteria->compare('Price', $this->Price);
        $criteria->compare('id_currency', $this->id_currency);
        $criteria->compare('change_rate', $this->change_rate);
        $criteria->compare('fuel_price', $this->fuel_price);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('created_user', $this->created_user, true);
        $criteria->compare('ip_user_updated', $this->ip_user_updated, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return VoyageOrder the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
