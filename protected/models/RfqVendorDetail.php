<?php

/**
 * This is the model class for table "rfq_vendor_detail".
 *
 * The followings are the available columns in table 'rfq_vendor_detail':
 * @property string $id_rfq_vendor_detail
 * @property string $id_rfq_vendor
 * @property integer $id_part
 * @property integer $quantity
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class RfqVendorDetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RfqVendorDetail the static model class
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
		return 'rfq_vendor_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_part, quantity,', 'required'),
			array('id_part, quantity', 'numerical', 'integerOnly'=>true),
			array('id_rfq_vendor', 'length', 'max'=>20),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_rfq_vendor_detail, id_rfq_vendor, id_part, quantity, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
			array('id_rfq_vendor_detail, id_rfq_vendor, id_part, quantity, created_date, created_user, ip_user_updated', 'safe', 'on'=>'searchbyrfq'),
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
			'idPart' => array(self::BELONGS_TO, 'Part', 'id_part'),
			'idRfqVendor' => array(self::BELONGS_TO, 'RfqVendor', 'id_rfq_vendor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_rfq_vendor_detail' => 'ID Rfq Vendor Detail',
			'id_rfq_vendor' => 'ID Rfq Vendor',
			'id_part' => 'ID Part',
			'quantity' => 'Quantity',
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

		$criteria->compare('id_rfq_vendor_detail',$this->id_rfq_vendor_detail,true);
		$criteria->compare('id_rfq_vendor',$this->id_rfq_vendor,true);
		$criteria->compare('id_part',$this->id_part);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchbyrfq($id_rfq_vendor)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->condition = 'id_rfq_vendor=:id_rfq_vendor';
		$criteria->params = array(':id_rfq_vendor'=>$id_rfq_vendor);

		$criteria->compare('id_rfq_vendor_detail',$this->id_rfq_vendor_detail,true);
		$criteria->compare('id_rfq_vendor',$this->id_rfq_vendor,true);
		$criteria->compare('id_part',$this->id_part);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}