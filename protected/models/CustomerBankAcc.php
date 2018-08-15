<?php

/**
 * This is the model class for table "customer_bank_acc".
 *
 * The followings are the available columns in table 'customer_bank_acc':
 * @property string $id_customer_bank_acc
 * @property string $id_customer
 * @property string $BankName
 * @property string $BranchAddress
 * @property string $BankCity
 * @property string $AccountName
 * @property string $AccountNumber
 * @property integer $id_currency
 */
class CustomerBankAcc extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CustomerBankAcc the static model class
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
		return 'customer_bank_acc';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_customer, BankName, BranchAddress, BankCity, AccountName, AccountNumber', 'required'),
			array('id_currency', 'numerical', 'integerOnly'=>true),
			array('id_customer', 'length', 'max'=>20),
			array('BankName, BranchAddress, BankCity, AccountName, AccountNumber', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_customer_bank_acc, id_customer, BankName, BranchAddress, BankCity, AccountName, AccountNumber, id_currency', 'safe', 'on'=>'search'),
			array('id_customer_bank_acc, id_customer, BankName, BranchAddress, BankCity, AccountName, AccountNumber, id_currency', 'safe', 'on'=>'searchbybankacc'),
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
			'cur' => array(self::BELONGS_TO, 'Currency', 'id_currency'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_customer_bank_acc' => 'ID Customer Bank ACC',
			'id_customer' => 'Customer ID',
			'BankName' => 'Bank Name',
			'BranchAddress' => 'Branch Address',
			'BankCity' => 'Bank City',
			'AccountName' => 'Account Name',
			'AccountNumber' => 'Account Number',
			'id_currency' => 'Currency',
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

		$criteria->compare('id_customer_bank_acc',$this->id_customer_bank_acc,true);
		$criteria->compare('id_customer',$this->id_customer,true);
		$criteria->compare('BankName',$this->BankName,true);
		$criteria->compare('BranchAddress',$this->BranchAddress,true);
		$criteria->compare('BankCity',$this->BankCity,true);
		$criteria->compare('AccountName',$this->AccountName,true);
		$criteria->compare('AccountNumber',$this->AccountNumber,true);
		$criteria->compare('id_currency',$this->id_currency);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchbybankacc($id_customer)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'id_customer=:id_customer';
		$criteria->params = array(':id_customer'=>$id_customer);

		$criteria->compare('id_customer_bank_acc',$this->id_customer_bank_acc,true);
		//$criteria->compare('id_customer',$this->id_customer,true);
		$criteria->compare('BankName',$this->BankName,true);
		$criteria->compare('BranchAddress',$this->BranchAddress,true);
		$criteria->compare('BankCity',$this->BankCity,true);
		$criteria->compare('AccountName',$this->AccountName,true);
		$criteria->compare('AccountNumber',$this->AccountNumber,true);
		$criteria->compare('id_currency',$this->id_currency);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}