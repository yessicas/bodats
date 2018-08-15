<?php

/**
 * This is the model class for table "customer_users".
 *
 * The followings are the available columns in table 'customer_users':
 * @property string $id_customer_user
 * @property integer $id_customer
 * @property string $userid
 */
class CustomerUsers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CustomerUsers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */

	public $CompanyName;
	public $usercust;

	public function tableName()
	{
		return 'customer_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_customer, userid', 'required'),
			array('id_customer', 'numerical', 'integerOnly'=>true),
			array('userid', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_customer_user, id_customer, CompanyName, usercust, userid', 'safe', 'on'=>'search'),
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
			'Users' => array(self::BELONGS_TO, 'Users', 'userid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_customer_user' => 'ID Customer User',
			'id_customer' => 'Customers Company',
			'userid' => 'User ID',
			'companyname'=>'Customer Company',
			'usercust'=>'User ID',
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
		$criteria->with=array('Customer','Users');
        $criteria->together=true;

		$criteria->compare('id_customer_user',$this->id_customer_user,true);
		$criteria->compare('id_customer',$this->id_customer);
		$criteria->compare('Customer.CompanyName',$this->CompanyName,true);
		$criteria->compare('Users.usercust',$this->usercust,true);
		$criteria->compare('userid',$this->userid,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'id_customer_user ASC',
            'attributes'=>array(

              'CompanyName'=>array(
                 'asc'=>'Customer.CompanyName ASC',
                 'desc'=>'Customer.CompanyName DESC',
              ),

              '*',

              'usercust'=>array(
                 'asc'=>'Userid.usercust ASC',
                 'desc'=>'Userid.usercust DESC',
              ),

              '*',
              
          					),
        				),
			'pagination'=>array(
        	'pageSize'=>15,
   								 ),
		));
	}
}