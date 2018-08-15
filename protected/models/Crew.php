<?php

/**
 * This is the model class for table "crew".
 *
 * The followings are the available columns in table 'crew':
 * @property integer $CrewId
 * @property string $NIP
 * @property string $VesselId
 * @property string $CrewName
 * @property string $DateOfBirth
 * @property string $PlaceOfBirth
 * @property string $Address
 * @property string $PhoneNumber
 * @property string $MobileNumber
 * @property string $Email
 * @property string $CurrentResidence
 * @property string $Status
 * @property string $Profession
 * @property string $MaritalStatus
 * @property string $NameOfSpouse
 * @property string $NameOfChildren
 * @property string $BankAccountNumber
 * @property string $BankName
 * @property string $AccountHolder
 * @property string $GovernmentFileTaxNumber
 * @property string $EmployeeRegisteredNumber
 * @property string $AuditTime
 * @property string $AuditActivity
 * @property string $StatusRelief
 * @property string $CertificateLevel
 * @property string $Notes
 * @property string $Photo
 * @property string $LastMutationId
 */
class Crew extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Crew the static model class
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
		return 'crew';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('EmployeeRegisteredNumber, CrewName, DateOfBirth, PlaceOfBirth, Address, PhoneNumber, MobileNumber, CurrentResidence, Profession, MaritalStatus, BankAccountNumber, BankName, AccountHolder, GovernmentFileTaxNumber, StatusRelief, Status, StatusOwn ,CertificateLevel, Notes,', 'required'),
			array('CrewName', 'required'),
			array('SeaManCode', 'numerical', 'integerOnly'=>true),
			array('NIP, StatusRelief, CertificateLevel, Notes, Photo, LastMutationId, id_crew_position', 'length', 'max'=>255),
			array('LastIDVessel, PlaceOfBirth, PhoneNumber, MobileNumber, Status, StatusOwn, Profession, MaritalStatus, NameOfSpouse, BankName, AuditTime, AuditActivity', 'length', 'max'=>32),
			

			//array('Photo, FotoSertifikat, FotoIjazah', 'required','on'=>'insert'),
			array('Photo,FotoSertifikat,FotoIjazah', 'file','on'=>'insert',
			'types'=>'jpg',
			'allowEmpty' => true,
			'maxSize' => 1024 * 1024 * 1, // 10MB 
			'tooLarge' => 'file yang di pilih lebih dari  1 MB. Silahkan pilih file image yang lebih kecil.', 
					),
			
			array('Photo, FotoSertifikat, FotoIjazah ', 'file','on'=>'update',
			'allowEmpty' => true,
			'types'=>'jpg',
			'maxSize' => 1024 * 1024 * 1, // 10MB 
			'tooLarge' => 'file yang di pilih lebih dari  1 MB. Silahkan pilih file image yang lebih kecil.', 
			),


			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('SeaManCode, CrewId, NIP, LastIDVessel, CrewName, DateOfBirth, PlaceOfBirth, Address, PhoneNumber, MobileNumber, Email, CurrentResidence, Status, StatusOwn, Profession, MaritalStatus, NameOfSpouse, NameOfChildren, BankAccountNumber, BankName, AccountHolder, GovernmentFileTaxNumber, EmployeeRegisteredNumber, AuditTime, AuditActivity, StatusRelief, CertificateLevel, FotoSertifikat, FotoIjazah Notes, Photo, LastMutationId', 'safe', 'on'=>'search'),
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
			'sertifikat' => array(self::BELONGS_TO, 'CertificateLevel', 'CertificateLevel'),
			'crewpos' => array(self::BELONGS_TO, 'CrewPosition', 'id_crew_position'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CrewId' => 'Crew',
			'SeaManCode' => 'Sea Man Code',
			'NIP' => 'NIP',
			'LastIDVessel' => 'Vessel',
			'CrewName' => 'Crew Name',
			'DateOfBirth' => 'Date Of Birth',
			'PlaceOfBirth' => 'Place Of Birth',
			'Address' => 'Permanent Address',
			'PhoneNumber' => 'Phone Number',
			'MobileNumber' => 'Mobile Number',
			'Email' => 'Email',
			'CurrentResidence' => 'Current Residence',
			'Status' => 'Status',
			'StatusOwn'=>'Status Own',
			'id_crew_position'=>'Crew Position',
			'Profession' => 'Profession',
			'MaritalStatus' => 'Marital Status',
			'NameOfSpouse' => 'Name Of Spouse',
			'NameOfChildren' => 'Name Of Children',
			'BankAccountNumber' => 'Bank Account Number',
			'BankName' => 'Bank Name',
			'AccountHolder' => 'Account Holder',
			'GovernmentFileTaxNumber' => 'Government File Tax Number',
			'EmployeeRegisteredNumber' => 'Employee Registered Number',
			'AuditTime' => 'Audit Time',
			'AuditActivity' => 'Audit Activity',
			'StatusRelief' => 'Status Relief',
			'CertificateLevel' => 'Certificate Level',
			'FotoSertifikat'=>'Foto Sertifikat',
			'FotoIjazah'=>'Foto Ijazah',
			'Notes' => 'Notes',
			'Photo' => 'Photo',
			'LastMutationId' => 'Last Mutation',
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

		$criteria->compare('CrewId',$this->CrewId);
		$criteria->compare('NIP',$this->NIP,true);
		$criteria->compare('LastIDVessel',$this->LastIDVessel,true);
		$criteria->compare('CrewName',$this->CrewName,true);
		$criteria->compare('DateOfBirth',$this->DateOfBirth,true);
		$criteria->compare('PlaceOfBirth',$this->PlaceOfBirth,true);
		$criteria->compare('Address',$this->Address,true);
		$criteria->compare('PhoneNumber',$this->PhoneNumber,true);
		$criteria->compare('MobileNumber',$this->MobileNumber,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('CurrentResidence',$this->CurrentResidence,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('StatusOwn',$this->StatusOwn,true);
		$criteria->compare('Profession',$this->Profession,true);
		$criteria->compare('MaritalStatus',$this->MaritalStatus,true);
		$criteria->compare('NameOfSpouse',$this->NameOfSpouse,true);
		$criteria->compare('NameOfChildren',$this->NameOfChildren,true);
		$criteria->compare('BankAccountNumber',$this->BankAccountNumber,true);
		$criteria->compare('BankName',$this->BankName,true);
		$criteria->compare('AccountHolder',$this->AccountHolder,true);
		$criteria->compare('GovernmentFileTaxNumber',$this->GovernmentFileTaxNumber,true);
		$criteria->compare('EmployeeRegisteredNumber',$this->EmployeeRegisteredNumber,true);
		$criteria->compare('AuditTime',$this->AuditTime,true);
		$criteria->compare('AuditActivity',$this->AuditActivity,true);
		$criteria->compare('StatusRelief',$this->StatusRelief,true);
		$criteria->compare('CertificateLevel',$this->CertificateLevel,true);
		$criteria->compare('FotoSertifikat',$this->FotoSertifikat,true);
		$criteria->compare('FotoIjazah',$this->FotoIjazah,true);
		$criteria->compare('Notes',$this->Notes,true);
		$criteria->compare('Photo',$this->Photo,true);
		$criteria->compare('LastMutationId',$this->LastMutationId,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
        	'pageSize'=>15,
   								 ),
		));
	}
}