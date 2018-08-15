<?php

/**
 * This is the model class for table "customer_voice".
 *
 * The followings are the available columns in table 'customer_voice':
 * @property string $id_customor_voice
 * @property string $id_customer
 * @property string $userid
 * @property string $voice
 * @property integer $is_view
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 *
 * The followings are the available model relations:
 * @property Users $user
 * @property Customer $idCustomer
 */
class CustomerVoice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CustomerVoice the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */

	public $CompanyName;
	public $VoyageNumber;
	public function tableName()
	{
		return 'customer_voice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userid, voice', 'required'),
			array('is_view,id_voyage_order', 'numerical', 'integerOnly'=>true),
			array('id_customer', 'length', 'max'=>20),
			array('userid, created_user, voyage_number', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_customor_voice, id_customer, id_voyage_order,voyage_number, CompanyName, VoyageNumber, userid, voice, is_view, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
			array('id_customor_voice, id_customer, id_voyage_order, voyage_number, CompanyName, VoyageNumber, userid, voice, is_view, created_date, created_user, ip_user_updated', 'safe', 'on'=>'bysearchuserid'),
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
			'user' => array(self::BELONGS_TO, 'Users', 'userid'),
			'idCustomer' => array(self::BELONGS_TO, 'Customer', 'id_customer'),
			'idVoyage' => array(self::BELONGS_TO, 'VoyageOrder', 'id_voyage_order'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_customor_voice' => 'ID Customor Voice',
			'id_customer' => 'Customer Company',
			'companyname'=>'Customer Company',
			'userid' => 'Posted User',
			'id_voyage_order'=> 'ID Voyage Order',
			'voyage_number'=>'Voyage Numbers',
			'VoyageNumber'=>'Voyage Number',
			'voice' => 'Voice',
			'is_view' => 'Is View',
			'created_date' => 'Posting Date',
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

		$criteria->compare('id_customor_voice',$this->id_customor_voice,true);
		$criteria->compare('id_customer',$this->id_customer,true);
		$criteria->compare('Customer.CompanyName',$this->CompanyName,true);
		$criteria->compare('userid',$this->userid,true);
		$criteria->compare('id_voyage_order',$this->id_voyage_order,true);
		$criteria->compare('voyage_number',$this->voyage_number,true);
		$criteria->compare('VoyageOrder.VoyageNumber',$this->VoyageNumber,true);
		$criteria->compare('voice',$this->voice,true);
		$criteria->compare('is_view',$this->is_view);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchbyuserid($userid)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'userid=:userid';
		$criteria->params = array(':userid'=>$userid);

		$criteria->compare('id_customor_voice',$this->id_customor_voice,true);
		$criteria->compare('id_customer',$this->id_customer,true);
		$criteria->compare('Customer.CompanyName',$this->CompanyName,true);
		$criteria->compare('userid',$this->userid,true);
		$criteria->compare('id_voyage_order',$this->id_voyage_order,true);
		$criteria->compare('voyage_number',$this->voyage_number,true);
		$criteria->compare('VoyageOrder.VoyageNumber',$this->VoyageNumber,true);
		$criteria->compare('voice',$this->voice,true);
		$criteria->compare('is_view',$this->is_view);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,

			'pagination'=>array(
        	'pageSize'=>15,
   								 ),
		));
	}
}