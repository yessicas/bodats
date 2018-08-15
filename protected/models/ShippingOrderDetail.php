<?php

/**
 * This is the model class for table "shipping_order_detail".
 *
 * The followings are the available columns in table 'shipping_order_detail':
 * @property string $id_shipping_order_detail
 * @property string $id_shipping_order
 * @property integer $id_vessel_tug
 * @property integer $id_vessel_barge
 * @property integer $start_date
 * @property integer $end_date
 * @property integer $IdJettyOrigin
 * @property integer $IdJettyDestination
 * @property integer $BargeSize
 * @property integer $Capacity
 * @property double $Price
 * @property integer $id_currency
 * @property double $change_rate
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 * @property string $daterange
 *
 * The followings are the available model relations:
 * @property ShippingOrder $idShippingOrder
 * @property Vessel $idVesselTug
 * @property Vessel $idVesselBarge
 * @property Jetty $idJettyOrigin
 * @property Jetty $idJettyDestination
 * @property Currency $idCurrency
 */
class ShippingOrderDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'shipping_order_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	//public $daterange;
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_shipping_order, id_vessel_tug, id_vessel_barge, start_date, end_date, IdJettyOrigin, IdJettyDestination, BargeSize, Capacity, Price, id_currency, change_rate, created_date, created_user, ip_user_updated', 'required'),
			array('id_vessel_tug, id_vessel_barge, IdJettyOrigin, IdJettyDestination, BargeSize, Capacity, id_currency', 'numerical', 'integerOnly'=>true),
			array('Price, change_rate', 'numerical'),
			array('id_shipping_order', 'length', 'max'=>20),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			array('id_vessel_tug' , 'cektug','on'=>'insert'),
			array('id_vessel_barge' , 'cekbarge','on'=>'insert'),
			array('id_vessel_tug' , 'cektugupdate','on'=>'update'),
			array('id_vessel_barge' , 'cekbargeupdate','on'=>'update'),
			array('end_date' , 'cekdaterange'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_shipping_order_detail, id_shipping_order, id_vessel_tug, id_vessel_barge, IdJettyOrigin, IdJettyDestination, BargeSize, Capacity, Price, id_currency, change_rate, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
			array('id_shipping_order_detail, id_shipping_order, id_vessel_tug, id_vessel_barge, IdJettyOrigin, IdJettyDestination, BargeSize, Capacity, Price, id_currency, change_rate, created_date, created_user, ip_user_updated', 'safe', 'on'=>'searchbyshippingorder'),
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
			'ShippingOrder' => array(self::BELONGS_TO, 'ShippingOrder', 'id_shipping_order'),
			'VesselTug' => array(self::BELONGS_TO, 'Vessel', 'id_vessel_tug'),
			'VesselBarge' => array(self::BELONGS_TO, 'Vessel', 'id_vessel_barge'),
			'JettyOrigin' => array(self::BELONGS_TO, 'Jetty', 'IdJettyOrigin'),
			'JettyDestination' => array(self::BELONGS_TO, 'Jetty', 'IdJettyDestination'),
			'Currency' => array(self::BELONGS_TO, 'Currency', 'id_currency'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_shipping_order_detail' => 'ID Shipping Order Detail',
			'id_shipping_order' => 'ID Shipping Order',
			'id_vessel_tug' => 'Tug Name',
			'id_vessel_barge' => 'Barge',
			'start_date' => 'Start Date ',
			'end_date' => 'End Date',
			'IdJettyOrigin' => 'Jetty Start',
			'IdJettyDestination' => 'Jetty Destination',
			'BargeSize' => 'Barge Size',
			'Capacity' => 'Capacity',
			'Price' => 'Price Per MT',
			'id_currency' => 'Currency',
			'change_rate' => 'Change Rate',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'ip_user_updated' => 'IP User Updated',
			//'daterange' => 'Date Range',
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

		$criteria->compare('id_shipping_order_detail',$this->id_shipping_order_detail,true);
		$criteria->compare('id_shipping_order',$this->id_shipping_order,true);
		$criteria->compare('id_vessel_tug',$this->id_vessel_tug);
		$criteria->compare('id_vessel_barge',$this->id_vessel_barge);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('IdJettyOrigin',$this->IdJettyOrigin);
		$criteria->compare('IdJettyDestination',$this->IdJettyDestination);
		$criteria->compare('BargeSize',$this->BargeSize);
		$criteria->compare('Capacity',$this->Capacity);
		$criteria->compare('Price',$this->Price);
		$criteria->compare('id_currency',$this->id_currency);
		$criteria->compare('change_rate',$this->change_rate);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function searchbyshippingorder($id_shipping_order)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->condition = 'id_shipping_order=:id_shipping_order';
		$criteria->params = array(':id_shipping_order'=>$id_shipping_order);

		$criteria->compare('id_shipping_order_detail',$this->id_shipping_order_detail,true);
		$criteria->compare('id_shipping_order',$this->id_shipping_order,true);
		$criteria->compare('id_vessel_tug',$this->id_vessel_tug);
		$criteria->compare('id_vessel_barge',$this->id_vessel_barge);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('IdJettyOrigin',$this->IdJettyOrigin);
		$criteria->compare('IdJettyDestination',$this->IdJettyDestination);
		$criteria->compare('BargeSize',$this->BargeSize);
		$criteria->compare('Capacity',$this->Capacity);
		$criteria->compare('Price',$this->Price);
		$criteria->compare('id_currency',$this->id_currency);
		$criteria->compare('change_rate',$this->change_rate);
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
	 * @return ShippingOrderDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function cektug()
	{

	    $modelschedule = VesselSchedule::model()->find(array(
           'condition' => 'id_vessel = :id_vessel AND (date BETWEEN :start_date AND :end_date)',
           'params' => array(
               ':id_vessel' => $this->id_vessel_tug,
               ':start_date' => $this->start_date,
               ':end_date' => $this->end_date,
           ),
       ));
	    if ($modelschedule)
	         $this->addError('id_vessel_tug', 'Vessel Tug sudah digunakan pada tanggal yang dipilih ') ;// validasi model gagal sehingga perintah save() akan dibatalkan.

	}


	public function cekbarge()
	{

	    $modelschedule = VesselSchedule::model()->find(array(
           'condition' => 'id_vessel = :id_vessel AND (date BETWEEN :start_date AND :end_date)',
           'params' => array(
               ':id_vessel' => $this->id_vessel_barge,
               ':start_date' => $this->start_date,
               ':end_date' => $this->end_date,
           ),
       ));
	    if ($modelschedule)
	         $this->addError('id_vessel_barge', 'Vessel Barge sudah digunakan pada tanggal yang dipilih ') ;// validasi model gagal sehingga perintah save() akan dibatalkan.

	}


	public function cektugupdate()
	{

	    $modelschedule = VesselSchedule::model()->find(array(
           'condition' => '(id_vessel = :id_vessel AND ( date BETWEEN :start_date AND :end_date)) AND id_shipping_order_detail <>:id_shipping_order_detail',
           'params' => array(
               ':id_vessel' => $this->id_vessel_tug,
               ':start_date' => $this->start_date,
               ':end_date' => $this->end_date,
               ':id_shipping_order_detail' => $this->id_shipping_order_detail,
           ),
       ));
	    if ($modelschedule)
	         $this->addError('id_vessel_tug', 'Vessel Tug sudah digunakan pada tanggal yang dipilih ') ;// validasi model gagal sehingga perintah save() akan dibatalkan.

	}


	public function cekbargeupdate()
	{

	    $modelschedule = VesselSchedule::model()->find(array(
           'condition' => '(id_vessel = :id_vessel AND ( date BETWEEN :start_date AND :end_date)) AND id_shipping_order_detail <>:id_shipping_order_detail',
           'params' => array(
               ':id_vessel' => $this->id_vessel_barge,
               ':start_date' => $this->start_date,
               ':end_date' => $this->end_date,
               ':id_shipping_order_detail' => $this->id_shipping_order_detail,
           ),
       ));
	    if ($modelschedule)
	         $this->addError('id_vessel_barge', 'Vessel Barge  sudah digunakan pada tanggal yang dipilih ') ;// validasi model gagal sehingga perintah save() akan dibatalkan.

	}


	public function cekdaterange()
	{

	    
	    if ($this->start_date>$this->end_date)
	         $this->addError('end_date', 'End Date Dont  Smaler Than Start Date  ') ;// validasi model gagal sehingga perintah save() akan dibatalkan.

	}
}
