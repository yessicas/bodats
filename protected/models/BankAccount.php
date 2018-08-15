<?php

/**
 * This is the model class for table "bank_account".
 *
 * The followings are the available columns in table 'bank_account':
 * @property integer $id_bank_account
 * @property string $BankName
 * @property string $BranchAddress
 * @property string $BankCity
 * @property string $AccountName
 * @property string $AccountNumber
 * @property string $Currency
 * @property integer $id_currency
 */
class BankAccount extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BankAccount the static model class
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
		return 'bank_account';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('BankName, BranchAddress, BankCity, AccountName, AccountNumber, id_currency', 'required'),
			array('id_currency', 'numerical', 'integerOnly'=>true),
			array('BankName, BranchAddress, BankCity, AccountName, AccountNumber, Currency', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_bank_account, BankName, BranchAddress, BankCity, AccountName, AccountNumber, Currency, id_currency', 'safe', 'on'=>'search'),
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
			'curr' => array(self::BELONGS_TO, 'Currency', 'id_currency'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_bank_account' => 'Id Bank Account',
			'BankName' => 'Bank Name',
			'BranchAddress' => 'Branch Address',
			'BankCity' => 'Bank City',
			'AccountName' => 'Account Name',
			'AccountNumber' => 'Account Number',
			'Currency' => 'Currency',
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

		$criteria->compare('id_bank_account',$this->id_bank_account);
		$criteria->compare('BankName',$this->BankName,true);
		$criteria->compare('BranchAddress',$this->BranchAddress,true);
		$criteria->compare('BankCity',$this->BankCity,true);
		$criteria->compare('AccountName',$this->AccountName,true);
		$criteria->compare('AccountNumber',$this->AccountNumber,true);
		$criteria->compare('Currency',$this->Currency,true);
		$criteria->compare('id_currency',$this->id_currency);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}