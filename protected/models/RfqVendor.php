<?php

/**
 * This is the model class for table "rfq_vendor".
 *
 * The followings are the available columns in table 'rfq_vendor':
 * @property string $id_rfq_vendor
 * @property string $RFQNumber
 * @property integer $NoOrder
 * @property integer $NoMonth
 * @property integer $NoYear
 * @property integer $id_vendor
 * @property string $From
 * @property string $QuotationDate
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class RfqVendor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RfqVendor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */

	public $VendorName;
	public function tableName()
	{
		return 'rfq_vendor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('RFQNumber, NoOrder, NoMonth, NoYear, id_vendor, QuotationDate, created_date, created_user, ip_user_updated', 'required'),
			array('NoOrder, NoMonth, NoYear, id_vendor', 'numerical', 'integerOnly'=>true),
			array('RFQNumber', 'length', 'max'=>32),
			array('From', 'length', 'max'=>64),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_rfq_vendor, RFQNumber, NoOrder, NoMonth, NoYear, id_vendor, VendorName, From, QuotationDate, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
			'Vendor' => array(self::BELONGS_TO, 'Vendor', 'id_vendor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_rfq_vendor' => 'ID Rfq Vendor',
			'RFQNumber' => 'Rfqnumber',
			'NoOrder' => 'No Order',
			'NoMonth' => 'No Month',
			'NoYear' => 'No Year',
			'id_vendor' => 'ID Vendor',
			'From' => 'From',
			'QuotationDate' => 'Quotation Date',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'ip_user_updated' => 'IP User Updated',
			'vendorname'=>'To',
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

		$criteria->compare('id_rfq_vendor',$this->id_rfq_vendor,true);
		$criteria->compare('RFQNumber',$this->RFQNumber,true);
		$criteria->compare('NoOrder',$this->NoOrder);
		$criteria->compare('NoMonth',$this->NoMonth);
		$criteria->compare('NoYear',$this->NoYear);
		$criteria->compare('id_vendor',$this->id_vendor);
		$criteria->compare('Vendor.VendorName',$this->VendorName,true);
		$criteria->compare('From',$this->From,true);
		$criteria->compare('QuotationDate',$this->QuotationDate,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'id_rfq_vendor ASC',
            'attributes'=>array(

              'VendorName'=>array(
                 'asc'=>'Vendor.VendorName ASC',
                 'desc'=>'Vendor.VendorName DESC',
              ),

              '*',
          					),
        				),
		));
	}
}