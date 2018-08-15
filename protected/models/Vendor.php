<?php

/**
 * This is the model class for table "vendor".
 *
 * The followings are the available columns in table 'vendor':
 * @property integer $id_vendor
 * @property string $VendorNumber
 * @property string $VendorName
 * @property string $Address
 * @property string $NPWP
 * @property string $Telephone
 * @property string $Email
 * @property string $ContactName
 * @property string $City
 * @property string $PostalCode
 * @property string $VendorCode
 * @property string $vatReg
 * @property integer $id_payment_top
 * @property string $BankName
 * @property string $BranchAddress
 * @property string $BankCity
 * @property string $AccountName
 * @property string $AccountNumber
 * @property string $Currency
 * @property integer $id_currency
 *
 * The followings are the available model relations:
 * @property PaymentTop $idPaymentTop
 * @property Currency $idCurrency
 */
class Vendor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Vendor the static model class
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
		return 'vendor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('VendorName, Address, NPWP, CompanyType,Telephone, Email, ContactName,MobilePhone, City, PostalCode, fax_number, vatReg,', 'required'),
			array('term_of_payment, id_currency', 'numerical', 'integerOnly'=>true),
			//array('MobilePhone', 'numerical'=>true),
			array('VendorNumber,fax_number, MobilePhone, BankName,CompanyType, BranchAddress, BankCity, AccountName, AccountNumber, Currency', 'length', 'max'=>32),
			array('City', 'length', 'max'=>100),
			array('Email','email'),
			array('PostalCode', 'length', 'max'=>10),
			array('VendorCode, vatReg,foto_vendor', 'length', 'max'=>50),

			//array('foto_vendor', 'required','on'=>'insert'),
			array('foto_vendor', 'file','on'=>'insert',
			'types'=>'jpg,png',
			'allowEmpty' => true,
			'maxSize' => 1024 * 1024 * 1, // 10MB 
			'tooLarge' => 'file yang di pilih lebih dari  1 MB. Silahkan pilih file image yang lebih kecil.', 
					),
			
			array('foto_vendor', 'file','on'=>'update',
			'allowEmpty' => true,
			'types'=>'jpg,png',
			'maxSize' => 1024 * 1024 * 1, // 10MB 
			'tooLarge' => 'file yang di pilih lebih dari  1 MB. Silahkan pilih file image yang lebih kecil.', 
			),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_vendor, VendorNumber, VendorName, Address, NPWP,CompanyType, Telephone, Email, ContactName,MobilePhone, City, PostalCode, VendorCode, vatReg, id_payment_top, term_of_payment, BankName, BranchAddress, BankCity, AccountName, AccountNumber, Currency, id_currency,foto_vendor', 'safe', 'on'=>'search'),
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
		//	'idPaymentTop' => array(self::BELONGS_TO, 'PaymentTop', 'id_payment_top'),
			'idCurrency' => array(self::BELONGS_TO, 'Currency', 'id_currency'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_vendor' => 'ID Vendor',
			'VendorNumber' => 'Vendor Number',
			'VendorName' => 'Vendor Name',
			'Address' => 'Address',
			'NPWP' => 'NPWP',
			'CompanyType'=>'Company Type',
			'Telephone' => 'Telephone',
			'fax_number'=>'Fax Number',
			'Email' => 'Email',
			'ContactName' => 'Contact Name',
			'MobilePhone'=>'Mobile Phone',
			'City' => 'City',
			'PostalCode' => 'Postal Code',
			'VendorCode' => 'Vendor Code',
			'vatReg' => 'Vat Reg Number',
		//	'id_payment_top' => 'Payment Top',
			'term_of_payment'=>'Term Of Payment',
			'BankName' => 'Bank Name',
			'BranchAddress' => 'Branch Address',
			'BankCity' => 'Bank City',
			'AccountName' => 'Account Name',
			'AccountNumber' => 'Account Number',
			'Currency' => 'Currency',
			'id_currency' => 'Currency',
			'foto_vendor'=>'Foto Vendor',
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

		$criteria->compare('id_vendor',$this->id_vendor);
		$criteria->compare('VendorNumber',$this->VendorNumber,true);
		$criteria->compare('VendorName',$this->VendorName,true);
		$criteria->compare('Address',$this->Address,true);
		$criteria->compare('NPWP',$this->NPWP,true);
		$criteria->compare('CompanyType',$this->CompanyType,true);
		$criteria->compare('Telephone',$this->Telephone,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('fax_number',$this->fax_number,true);
		$criteria->compare('ContactName',$this->ContactName,true);
		$criteria->compare('MobilePhone',$this->MobilePhone,true);
		$criteria->compare('City',$this->City,true);
		$criteria->compare('PostalCode',$this->PostalCode,true);
		$criteria->compare('VendorCode',$this->VendorCode,true);
		$criteria->compare('vatReg',$this->vatReg,true);
	//	$criteria->compare('id_payment_top',$this->id_payment_top);
		$criteria->compare('term_of_payment',$this->term_of_payment);
		$criteria->compare('BankName',$this->BankName,true);
		$criteria->compare('BranchAddress',$this->BranchAddress,true);
		$criteria->compare('BankCity',$this->BankCity,true);
		$criteria->compare('AccountName',$this->AccountName,true);
		$criteria->compare('AccountNumber',$this->AccountNumber,true);
		$criteria->compare('Currency',$this->Currency,true);
		$criteria->compare('id_currency',$this->id_currency);
		$criteria->compare('foto_vendor',$this->foto_vendor);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
        	'pageSize'=>15,
   								 ),
		));
	}
	
	public function getTermOfPayment(){
		$DEFAULT_TOP = 15;
		if(isset($this->term_of_payment)){
			if($this->term_of_payment > 0){
				return $this->term_of_payment;
			}
		}
		
		return $DEFAULT_TOP;
	}
}