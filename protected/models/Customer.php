<?php

/**
 * This is the model class for table "customer".
 *
 * The followings are the available columns in table 'customer':
 * @property string $id_customer
 * @property string $CustomerNumber
 * @property string $ContactName
 * @property string $Address
 * @property string $address_line1
 * @property string $address_line2
 * @property string $CompanyName
 * @property string $NPWP
 * @property string $Telephone
 * @property string $Email
 * @property string $CustomerCode
 * @property string $City
 * @property integer $PostalCode
 * @property string $Street
 * @property string $FaxNumber
 * @property string $VATreg
 * @property string $Acronym
 * @property integer $id_payment_top
 * @property string $BankName
 * @property string $BranchAddress
 * @property string $BankCity
 * @property string $AccountName
 * @property string $AccountNumber
 * @property integer $id_currency
 *
 * The followings are the available model relations:
 * @property PaymentTop $idPaymentTop
 * @property Currency $idCurrency
 */
class Customer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Customer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */

	public $PaymentName;

	public function tableName()
	{
		return 'customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ContactName,CompanyName, NPWP, GroupCategory, TypeCategory, Telephone, Email, City, PostalCode, FaxNumber, Address', 'required'),
			array('PostalCode, id_payment_top,TermOfPayment, id_currency', 'numerical', 'integerOnly'=>true),
			array('Email', 'email'),
			array('GroupCategory, TypeCategory, ContactName, Telephone, CustomerCode, City, Street, FaxNumber, VATreg, Acronym, BankName, BranchAddress, BankCity, AccountName, AccountNumber', 'length', 'max'=>32),
			array('Address,Address2,address_line1, address_line2,foto_customer', 'length', 'max'=>255),

			//array('foto_customer', 'required','on'=>'insert'),
			array('foto_customer', 'file','on'=>'insert',
			'types'=>'jpg',
			'allowEmpty' => true,
			'maxSize' => 1024 * 1024 * 1, // 10MB 
			'tooLarge' => 'file yang di pilih lebih dari  1 MB. Silahkan pilih file image yang lebih kecil.', 
					),
			
			array('foto_customer', 'file','on'=>'update',
			'allowEmpty' => true,
			'types'=>'jpg',
			'maxSize' => 1024 * 1024 * 1, // 10MB 
			'tooLarge' => 'file yang di pilih lebih dari  1 MB. Silahkan pilih file image yang lebih kecil.', 
			),


			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_customer, ContactName,GroupCategory, TypeCategory, Address, address_line1, address_line2, CompanyName, NPWP, Telephone, Email, CustomerCode, City, PostalCode, Street, FaxNumber, VATreg, Acronym, id_payment_top,PaymentName, TermOfPayment,BankName, BranchAddress, BankCity, AccountName, AccountNumber, id_currency,foto_customer', 'safe', 'on'=>'search'),
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
			'PaymentTop' => array(self::BELONGS_TO, 'PaymentTop', 'id_payment_top'),
			'idCurrency' => array(self::BELONGS_TO, 'Currency', 'id_currency'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_customer' => 'ID Customer',
			//'CustomerNumber' => 'Customer Number',
			'ContactName' => 'Contact Name',
			'GroupCategory'=>'Group Category',
			'TypeCategory'=>'Type Category',
			'Address' => 'Address',
			'address_line1' => 'Address Line 1',
			'address_line2' => 'Address Line 2',
			'CompanyName' => 'Company Name',
			'NPWP' => 'NPWP',
			'Telephone' => 'Telephone',
			'Email' => 'Email',
			'CustomerCode' => 'Customer Code',
			'City' => 'City',
			'PostalCode' => 'Postal Code',
			'Street' => 'Street',
			'FaxNumber' => 'Fax Number',
			'VATreg' => 'VAT. Reg',
			'Acronym' => 'Acronym',
			'id_payment_top' => 'ID Payment Top',
			'TermOfPayment'=>'Term Of Payment',
			'BankName' => 'Bank Name',
			'BranchAddress' => 'Branch Address',
			'BankCity' => 'Bank City',
			'AccountName' => 'Account Name',
			'AccountNumber' => 'Account Number',
			'id_currency' => 'Currency',
			'foto_customer'=>'Customer Foto',
			'paymentname'=>'Term of Payment',
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
		
		$criteria->compare('id_customer',$this->id_customer,true);
		//$criteria->compare('CustomerNumber',$this->CustomerNumber,true);
		$criteria->compare('ContactName',$this->ContactName,true);
		$criteria->compare('Address',$this->Address,true);
		$criteria->compare('address_line1',$this->address_line1,true);
		$criteria->compare('address_line2',$this->address_line2,true);
		$criteria->compare('CompanyName',$this->CompanyName,true);
		$criteria->compare('NPWP',$this->NPWP,true);
		$criteria->compare('Telephone',$this->Telephone,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('CustomerCode',$this->CustomerCode,true);
		$criteria->compare('City',$this->City,true);
		$criteria->compare('PostalCode',$this->PostalCode);
		$criteria->compare('Street',$this->Street,true);
		$criteria->compare('FaxNumber',$this->FaxNumber,true);
		$criteria->compare('VATreg',$this->VATreg,true);
		$criteria->compare('Acronym',$this->Acronym,true);
		$criteria->compare('id_payment_top',$this->id_payment_top);
		$criteria->compare('TermOfPayment',$this->TermOfPayment);
		$criteria->compare('PaymentTop.PaymentName',$this->PaymentName);
		$criteria->compare('BankName',$this->BankName,true);
		$criteria->compare('BranchAddress',$this->BranchAddress,true);
		$criteria->compare('BankCity',$this->BankCity,true);
		$criteria->compare('AccountName',$this->AccountName,true);
		$criteria->compare('AccountNumber',$this->AccountNumber,true);
		$criteria->compare('id_currency',$this->id_currency);
		$criteria->compare('foto_customer',$this->foto_customer);
		$criteria->compare('GroupCategory',$this->GroupCategory);
		$criteria->compare('TypeCategory',$this->TypeCategory);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
        	'pageSize'=>15,
   								 ),
			
		));
	}
}