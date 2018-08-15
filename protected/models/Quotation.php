<?php

/**
 * This is the model class for table "quotation".
 *
 * The followings are the available columns in table 'quotation':
 * @property string $id_quotation
 * @property string $QuotationNumber
 * @property string $NoOrder
 * @property string $NoMonth
 * @property string $NoYear
 * @property string $id_customer
 * @property string $QuotationDate
 * @property string $SignName
 * @property string $SignPosition
 * @property string $Status
 * @property string $Category
 * @property string $StatusDescription
 * @property string $attachment
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 *
 * The followings are the available model relations:
 * @property Customer $idCustomer
 * @property QuotationDetailVessel[] $quotationDetailVessels
 */
class Quotation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'quotation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public $customername;
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('QuotationNumber, id_customer, QuotationDate, SignName, SignPosition, Status, Category, StatusDescription, attachment, created_date, created_user, ip_user_updated', 'required'),
			array('customername , QuotationDate, id_bussiness_type_order, SignName, SignPosition, attn, created_date, created_user, ip_user_updated', 'required','on'=>'step1'),
			array('customername , id_bussiness_type_order, attn, created_date, created_user, ip_user_updated', 'required','on'=>'step1so'),
			
			array('BargingJettyIdStart, BargingJettyIdEnd, IsSingleRoute, TotalQuantity, QuantityUnit, StatusDescription', 'required','on'=>'step2'),
			array('BargingJettyIdStart, BargingJettyIdEnd, IsSingleRoute, TranshipmentMotherVesselID, TotalQuantity, QuantityUnit, StatusDescription', 'required','on'=>'step2TR'),
			array('BargingJettyIdStart, BargingJettyIdEnd, TranshipmentMotherVesselID, LoadingDate, TotalQuantity, QuantityUnit, StatusDescription', 'required','on'=>'step2TRANS'),
			array('BargingVesselTug, BargingVesselBarge, TCStartDate, TCEndDate, TCPrice, TotalQuantity, QuantityUnit , QuantityPriceCurency', 'required','on'=>'step2TC'),
			
			array('TCPrice, TotalQuantity, QuantityPrice, QuantityPriceCurency ', 'numerical'),
			array('QuotationNumber, Status, Category', 'length', 'max'=>32),
			array('id_customer', 'length', 'max'=>20),
			array('is_lumpsump, total_price', 'length', 'max'=>20),
			array('is_lumpsump, total_price', 'numerical'),
			array('SignName, SignPosition', 'length', 'max'=>250),
			array('attachment', 'length', 'max'=>100),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			array('QuantityPrice', 'checkroute1','on'=>'step2'),
			array('QuantityPriceCurency ', 'checkroute2','on'=>'step2'),
			array('BargingVesselTug ', 'checkroute3','on'=>'step2'),
			array('BargingVesselBarge ', 'checkroute4','on'=>'step2'),
			array('LoadingDate ', 'checkroute5','on'=>'step2'),

			array('QuantityPrice', 'checkroute1','on'=>'step2TR'),
			array('QuantityPriceCurency ', 'checkroute2','on'=>'step2TR'),
			array('BargingVesselTug ', 'checkroute3','on'=>'step2TR'),
			array('BargingVesselBarge ', 'checkroute4','on'=>'step2TR'),
			array('LoadingDate ', 'checkroute5','on'=>'step2TR'),

			array('BargingVesselTug ', 'checkpair','on'=>'step2'),
			array('BargingVesselTug ', 'checkpair','on'=>'step2TR'),
			array('BargingVesselTug ', 'checkpair','on'=>'step2TC'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_quotation, QuotationNumber, NoOrder, NoMonth, NoYear, id_customer, customername, QuotationDate, id_bussiness_type_order, SignName, SignPosition, attn, Status, Category, StatusDescription, BargingJettyIdStart, BargingJettyIdEnd, BargingVesselTug, BargingVesselBarge, LoadingDate, TotalQuantity, QuantityUnit, attachment, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
			array('id_quotation, QuotationNumber, NoOrder, NoMonth, NoYear, id_customer, customername, QuotationDate, id_bussiness_type_order, SignName, SignPosition, attn, Status, Category, StatusDescription, BargingJettyIdStart, BargingJettyIdEnd, BargingVesselTug, BargingVesselBarge, LoadingDate, TotalQuantity, QuantityUnit, attachment, created_date, created_user, ip_user_updated', 'safe', 'on'=>'searchquotationstatus'),
			array('id_quotation, QuotationNumber, NoOrder, NoMonth, NoYear, id_customer, customername, QuotationDate, id_bussiness_type_order, SignName, SignPosition, attn, Status, Category, StatusDescription, BargingJettyIdStart, BargingJettyIdEnd, BargingVesselTug, BargingVesselBarge, LoadingDate, TotalQuantity, QuantityUnit, attachment, created_date, created_user, ip_user_updated', 'safe', 'on'=>'searchonspalwithoutquotation'),
			array('id_quotation, QuotationNumber, NoOrder, NoMonth, NoYear, id_customer, customername, QuotationDate, id_bussiness_type_order, SignName, SignPosition, attn, Status, Category, StatusDescription, BargingJettyIdStart, BargingJettyIdEnd, BargingVesselTug, BargingVesselBarge, LoadingDate, TotalQuantity, QuantityUnit, attachment, created_date, created_user, ip_user_updated', 'safe', 'on'=>'searchInvoice'),
		
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
			'quotationDetailVessels' => array(self::HAS_MANY, 'QuotationDetailVessel', 'id_quotation'),
			'Currency' => array(self::BELONGS_TO, 'Currency', 'QuantityPriceCurency'),
			'Mothervessel' => array(self::BELONGS_TO, 'Mothervessel', 'TranshipmentMotherVesselID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_quotation' => 'ID Quotation',
			'QuotationNumber' => 'Quotation Number',
			'NoOrder' => 'No Order',
			'NoMonth' => 'No Month',
			'NoYear' => ' No Year',
			'id_customer' => 'ID Customer',
			'id_bussiness_type_order'=>'Type Order',
			'QuotationDate' => 'Quotation Date',
			'SignName' => 'Sign Name',
			'SignPosition' => 'Sign Position',
			'attn' => 'Attn',
			'Status' => 'Status',
			'Category' => 'Category',
			'StatusDescription' => 'Description',
			'BargingJettyIdStart'=> 'Port Of Loading',
			'BargingJettyIdEnd'=>'Port Of Unloading', 
			'BargingVesselTug'=>'TUG', 
			'BargingVesselBarge'=>'BARGE',
			'LoadingDate'=>'Loading Date', 
			'TotalQuantity'=>'Total Quantity',
			'QuantityUnit'=>'Quantity Unit',
			'attachment' => 'Attachment',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'ip_user_updated' => 'IP User Updated',
			'customername' => 'Costumer Name',
			'TCStartDate'=>'Start Date',
			'TCEndDate'=>'End Date',
			'TCPrice'=>'Price',
			'IsSingleRoute' =>'Single Route',
			'TranshipmentMotherVesselID'=>'Mother Vessel',
			'QuantityPriceCurency'=>'Price Curency',
			'is_lumpsump'=>'Lumpsump',
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
		$criteria->condition = 'QuotationNumber<>:QuotationNumber'; // tambahin condotion karena ada quotation yang tak bernumber
		$criteria->params = array(':QuotationNumber'=>'');
		$criteria->with=array('Customer');
        $criteria->together=true;

		$criteria->compare('id_quotation',$this->id_quotation,true);
		$criteria->compare('QuotationNumber',$this->QuotationNumber,true);
		$criteria->compare('NoOrder',$this->NoOrder,true);
		$criteria->compare('NoMonth',$this->NoMonth,true);
		$criteria->compare('NoYear',$this->NoYear,true);
		$criteria->compare('id_customer',$this->id_customer,true);
		$criteria->compare('id_bussiness_type_order',$this->id_bussiness_type_order,true);
		$criteria->compare('Customer.CompanyName',$this->customername,true);
		$criteria->compare('QuotationDate',$this->QuotationDate,true);
		$criteria->compare('SignName',$this->SignName,true);
		$criteria->compare('SignPosition',$this->SignPosition,true);
		$criteria->compare('attn',$this->attn,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('Category',$this->Category,true);
		$criteria->compare('StatusDescription',$this->StatusDescription,true);
		$criteria->compare('attachment',$this->attachment,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'id_quotation ASC',
            'attributes'=>array(

              'customername'=>array(
                 'asc'=>'Customer.CompanyName ASC',
                 'desc'=>'Customer.CompanyName DESC',
              ),

              '*',
          					),
        				),
		));
	}


	public function searchonspalwithoutquotation()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'QuotationNumber=:QuotationNumber'; 
		$criteria->params = array(':QuotationNumber'=>'');
		$criteria->with=array('Customer');
        $criteria->together=true;

		$criteria->compare('id_quotation',$this->id_quotation,true);
		$criteria->compare('QuotationNumber',$this->QuotationNumber,true);
		$criteria->compare('NoOrder',$this->NoOrder,true);
		$criteria->compare('NoMonth',$this->NoMonth,true);
		$criteria->compare('NoYear',$this->NoYear,true);
		$criteria->compare('id_customer',$this->id_customer,true);
		$criteria->compare('id_bussiness_type_order',$this->id_bussiness_type_order,true);
		$criteria->compare('Customer.CompanyName',$this->customername,true);
		$criteria->compare('QuotationDate',$this->QuotationDate,true);
		$criteria->compare('SignName',$this->SignName,true);
		$criteria->compare('SignPosition',$this->SignPosition,true);
		$criteria->compare('attn',$this->attn,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('Category',$this->Category,true);
		$criteria->compare('StatusDescription',$this->StatusDescription,true);
		$criteria->compare('attachment',$this->attachment,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'id_quotation ASC',
            'attributes'=>array(

              'customername'=>array(
                 'asc'=>'Customer.CompanyName ASC',
                 'desc'=>'Customer.CompanyName DESC',
              ),

              '*',
          					),
        				),
		));
	}


	public function searchquotationstatus()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with=array('Customer');
        $criteria->together=true;
        //$criteria->condition = 'Status=:Status';
		//$criteria->params = array(':Status'=>'QUOTATION');
		 $criteria->condition = 'Status=:Status AND QuotationNumber<>:QuotationNumber';
		 $criteria->params = array(':Status'=>'QUOTATION',':QuotationNumber'=>'');


		$criteria->compare('id_quotation',$this->id_quotation,true);
		$criteria->compare('QuotationNumber',$this->QuotationNumber,true);
		$criteria->compare('NoOrder',$this->NoOrder,true);
		$criteria->compare('NoMonth',$this->NoMonth,true);
		$criteria->compare('NoYear',$this->NoYear,true);
		$criteria->compare('id_customer',$this->id_customer,true);
		$criteria->compare('id_bussiness_type_order',$this->id_bussiness_type_order,true);
		$criteria->compare('Customer.CompanyName',$this->customername,true);
		$criteria->compare('QuotationDate',$this->QuotationDate,true);
		$criteria->compare('SignName',$this->SignName,true);
		$criteria->compare('SignPosition',$this->SignPosition,true);
		$criteria->compare('attn',$this->attn,true);
		//$criteria->compare('Status',$this->Status,true);
		$criteria->compare('Category',$this->Category,true);
		$criteria->compare('StatusDescription',$this->StatusDescription,true);
		$criteria->compare('attachment',$this->attachment,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			//'pagination'=>array('pageSize'=>1),
			'sort'=>array(
			'defaultOrder'=>'id_quotation ASC',
            'attributes'=>array(

              'customername'=>array(
                 'asc'=>'Customer.CompanyName ASC',
                 'desc'=>'Customer.CompanyName DESC',
              ),

              '*',
          					),
        				),
		));
	}



	public function searchInvoice()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'id_bussiness_type_order =:id_bussiness_type_order1 OR id_bussiness_type_order =:id_bussiness_type_order2'; 
		$criteria->params = array(':id_bussiness_type_order1'=>250,':id_bussiness_type_order2'=>300);
		$criteria->with=array('Customer');
        $criteria->together=true;

		$criteria->compare('id_quotation',$this->id_quotation,true);
		$criteria->compare('QuotationNumber',$this->QuotationNumber,true);
		$criteria->compare('NoOrder',$this->NoOrder,true);
		$criteria->compare('NoMonth',$this->NoMonth,true);
		$criteria->compare('NoYear',$this->NoYear,true);
		$criteria->compare('id_customer',$this->id_customer,true);
		$criteria->compare('id_bussiness_type_order',$this->id_bussiness_type_order,true);
		$criteria->compare('Customer.CompanyName',$this->customername,true);
		$criteria->compare('QuotationDate',$this->QuotationDate,true);
		$criteria->compare('SignName',$this->SignName,true);
		$criteria->compare('SignPosition',$this->SignPosition,true);
		$criteria->compare('attn',$this->attn,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('Category',$this->Category,true);
		$criteria->compare('StatusDescription',$this->StatusDescription,true);
		$criteria->compare('attachment',$this->attachment,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'id_quotation ASC',
            'attributes'=>array(

              'customername'=>array(
                 'asc'=>'Customer.CompanyName ASC',
                 'desc'=>'Customer.CompanyName DESC',
              ),

              '*',
          					),
        				),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Quotation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function checkroute1() {        
     if ($this->IsSingleRoute == 1) {

	     if	($this->QuantityPrice == ''){
	           $this->addError("QuantityPrice", 'Quantity Price  cannot be blank.');
	       }
	       /*
	     if	($this->QuantityPriceCurency == ''){
	           $this->addError("QuantityPriceCurency", 'Quantity Price Curency  cannot be blank.');
	       }
	       */
     }

	}

	public function checkroute2() {        
     if ($this->IsSingleRoute == 1) {

     		/*
	     if	($this->QuantityPrice == ''){
	           $this->addError("QuantityPrice", 'Quantity Price  cannot be blank.');
	       }
	      */

	     if	($this->QuantityPriceCurency == ''){
	           $this->addError("QuantityPriceCurency", ' Price Curency  cannot be blank.');
	       }
     }

	}

	public function checkroute3() {        
     if ($this->IsSingleRoute == 1) {

	     if	($this->BargingVesselTug == ''){
	           $this->addError("BargingVesselTug", 'TUG  cannot be blank.');
	       }
     }

	}

	public function checkroute4() {        
     if ($this->IsSingleRoute == 1) {

	     if	($this->BargingVesselBarge == ''){
	           $this->addError("BargingVesselBarge", 'Barge cannot be blank.');
	       }
     }

	}

	public function checkroute5() {        
     if ($this->IsSingleRoute == 1) {

	     if	($this->LoadingDate == ''){
	           $this->addError("LoadingDate", 'Loading Date cannot be blank.');
	       }
     }

	}


	public function checkpair() {  

	 if	($this->BargingVesselTug != ''){
     	$tug=$this->BargingVesselTug;
		$criteria = new CDbCriteria();
		$criteria->condition = 'tug=:tug  AND is_active = 1';
		$criteria->order = 'first_date DESC';
		$criteria->limit = 1;
		$criteria->params = array(':tug'=>$tug);
		$tugset=SettypeTugbarge::model()->find($criteria);

		if(!$tugset){
			$this->addError("BargingVesselTug", 'Vessel Tug Ini Tidak Sedang Berpasangan.');
		}
	}

  }

}
