<?php

/**
 * This is the model class for table "shipping_order".
 *
 * The followings are the available columns in table 'shipping_order':
 * @property string $id_shipping_order
 * @property string $ShippingOrderNumber
 * @property integer $SONo
 * @property integer $SOMonth
 * @property integer $SOYear
 * @property string $id_quotation
 * @property string $id_customer
 * @property string $SI_Number
 * @property string $EstUnloading
 * @property integer $id_mothervessel
 * @property integer $Period
 * @property string $SO_Date
 * @property string $SO_Place
 * @property string $SO_Attachment
 * @property string $TrVoyageOrderRevisionId
 * @property string $SO_Status
 * @property string $RevisionNote
 * @property double $total_price
 * @property integer $total_capacity
 * @property integer $total_barge_size
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 *
 * The followings are the available model relations:
 * @property Quotation $idQuotation
 * @property Customer $idCustomer
 * @property Mothervessel $idMothervessel
 * @property ShippingOrderDetail[] $shippingOrderDetails
 */
class ShippingOrder extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $QuotationNumber;
	public $ContactName;
	public function tableName()
	{
		return 'shipping_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('ShippingOrderNumber, SONo, SOMonth, SOYear, id_quotation, id_customer, SI_Number, EstUnloading, id_mothervessel, Period, SO_Date, SO_Place, SO_Attachment, TrVoyageOrderRevisionId, SO_Status, RevisionNote, total_price, total_capacity, total_barge_size, created_date, created_user, ip_user_updated', 'required'),
			array('ShippingOrderNumber, SONo, SOMonth, SOYear, id_quotation, EstUnloading, id_mothervessel, Period, SO_Date, SO_Place, SO_Status', 'required'),
			array('SONo, SOMonth, SOYear, id_mothervessel, Period, total_capacity, total_barge_size', 'numerical', 'integerOnly'=>true),
			array('total_price', 'numerical'),
			array('ShippingOrderNumber, TrVoyageOrderRevisionId', 'length', 'max'=>32),
			array('id_quotation, id_customer', 'length', 'max'=>20),
			array('SI_Number', 'length', 'max'=>250),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_shipping_order, ShippingOrderNumber, SONo, SOMonth, SOYear, id_quotation, QuotationNumber, id_customer, ContactName, SI_Number, EstUnloading, id_mothervessel, Period, SO_Date, SO_Place, SO_Attachment, TrVoyageOrderRevisionId, SO_Status, RevisionNote, total_price, total_capacity, total_barge_size, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
			'Customer' => array(self::BELONGS_TO, 'Customer', 'id_customer'),
			'Mothervessel' => array(self::BELONGS_TO, 'Mothervessel', 'id_mothervessel'),
			'shippingOrderDetails' => array(self::HAS_MANY, 'ShippingOrderDetail', 'id_shipping_order'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_shipping_order' => 'ID Shipping Order',
			'ShippingOrderNumber' => 'Shipping Order Number',
			'SONo' => 'SO No',
			'SOMonth' => 'SO Month',
			'SOYear' => 'So Year',
			//'id_quotation' => 'Id Quotation',
			'id_quotation' => 'Quotation Number',
			'id_customer' => 'ID Customer',
			'SI_Number' => 'SI Number',
			'EstUnloading' => 'Est Unloading',
			//'id_mothervessel' => 'Id Mothervessel',
			'id_mothervessel' => 'Mother Vessel',
			'Period' => 'Period',
			'SO_Date' => 'SO Date',
			'SO_Place' => 'SO Place',
			'SO_Attachment' => 'SO Attachment',
			'TrVoyageOrderRevisionId' => 'Tr Voyage Order Revision',
			'SO_Status' => 'SO Status',
			'RevisionNote' => 'Revision Note',
			'total_price' => 'Total Price',
			'total_capacity' => 'Total Capacity',
			'total_barge_size' => 'Total Barge Size',
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
		$criteria->with=array('Quotation','Customer');
        $criteria->together=true;

		$criteria->compare('id_shipping_order',$this->id_shipping_order,true);
		$criteria->compare('ShippingOrderNumber',$this->ShippingOrderNumber,true);
		$criteria->compare('SONo',$this->SONo);
		$criteria->compare('SOMonth',$this->SOMonth);
		$criteria->compare('SOYear',$this->SOYear);
		$criteria->compare('id_quotation',$this->id_quotation,true);
		$criteria->compare('Quotation.QuotationNumber',$this->QuotationNumber,true);
		$criteria->compare('id_customer',$this->id_customer,true);
		$criteria->compare('Customer.ContactName',$this->ContactName,true);
		$criteria->compare('SI_Number',$this->SI_Number,true);
		$criteria->compare('EstUnloading',$this->EstUnloading,true);
		$criteria->compare('id_mothervessel',$this->id_mothervessel);
		$criteria->compare('Period',$this->Period);
		$criteria->compare('SO_Date',$this->SO_Date,true);
		$criteria->compare('SO_Place',$this->SO_Place,true);
		$criteria->compare('SO_Attachment',$this->SO_Attachment,true);
		$criteria->compare('TrVoyageOrderRevisionId',$this->TrVoyageOrderRevisionId,true);
		$criteria->compare('SO_Status',$this->SO_Status,true);
		$criteria->compare('RevisionNote',$this->RevisionNote,true);
		$criteria->compare('total_price',$this->total_price);
		$criteria->compare('total_capacity',$this->total_capacity);
		$criteria->compare('total_barge_size',$this->total_barge_size);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'id_shipping_order ASC',
            'attributes'=>array(

              'QuotationNumber'=>array(
                 'asc'=>'Quotation.QuotationNumber ASC',
                 'desc'=>'Quotation.QuotationNumber DESC',
              ),

              'ContactName'=>array(
                 'asc'=>'Customer.ContactName ASC',
                 'desc'=>'Customer.ContactName DESC',
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
	 * @return ShippingOrder the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
