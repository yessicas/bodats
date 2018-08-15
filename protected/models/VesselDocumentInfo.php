<?php

/**
 * This is the model class for table "vessel_document_info".
 *
 * The followings are the available columns in table 'vessel_document_info':
 * @property string $id_vessel_document_info
 * @property integer $id_vessel
 * @property string $DateCreated
 * @property string $ValidUntil
 * @property integer $id_vessel_document
 * @property string $Attachment
 * @property string $Check1
 * @property string $Check2
 * @property string $Check3
 * @property string $Check4
 * @property string $Check5
 * @property string $Check6
 * @property string $Status
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 *
 * The followings are the available model relations:
 * @property Vessel $idVessel
 * @property MstVesselDocument $idVesselDocument
 */
class VesselDocumentInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return VesselDocumentInfo the static model class
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
		return 'vessel_document_info';
	}


	public function statusPermanen($input)
	{
		if($input == '1')

		return "Yes";

		else if ($input == '0')

		return "No";
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('DateCreated, ValidUntil, id_vessel_document,PlaceCreated,IsPermanen', 'required'),
			array('id_vessel, id_vessel_document', 'numerical', 'integerOnly'=>true),
			array('IsPermanen', 'numerical'),
			array('IsNotUsed', 'numerical'),
			array('created_user,PlaceCreated', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),

			array('Attachment', 'file',
			'types'=>'pdf,jpg,jpeg,JPG,JPEG,gif,GIF',
			'allowEmpty' => true,
			'maxSize' => 1024 * 1024 * 20, // 20MB 
			//'tooLarge' => 'file yang di pilih lebih dari  20MB. Silahkan pilih file  yang lebih kecil.', 
					),

			array('Check1, Check2, Check3, Check4, Check5, Check6', 'safe'),

			//array('Attachment', 'required','on'=>'insert'),
			/*
			array('Attachment', 'file','on'=>'insert',
			'types'=>'jpg',
			'allowEmpty' => false,
			'maxSize' => 1024 * 1024 * 1, // 10MB 
			'tooLarge' => 'file to large max file is 1mb', 
					),
				*/
			/*
			array('Attachment', 'file','on'=>'update',
			'allowEmpty' => true,
			'types'=>'jpg',
			'maxSize' => 1024 * 1024 * 1, // 10MB 
			'tooLarge' => 'file to Large max file is 1mb',
			),
			*/


			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_vessel_document_info, id_vessel, DateCreated, Attachment, ValidUntil, IsPermanen, PlaceCreated, id_vessel_document, Attachment, Check1, Check2, Check3, Check4, Check5, Check6, Status, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
			array('id_vessel_document_info, id_vessel, DateCreated,Attachment, ValidUntil, IsPermanen, PlaceCreated, id_vessel_document, Attachment, Check1, Check2, Check3, Check4, Check5, Check6, Status, created_date, created_user, ip_user_updated', 'safe', 'on'=>'searchbyvessel'),
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
			'idVessel' => array(self::BELONGS_TO, 'Vessel', 'id_vessel'),
			'idVesselDocument' => array(self::BELONGS_TO, 'MstVesselDocument', 'id_vessel_document'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_vessel_document_info' => 'ID Vessel Document Info',
			'id_vessel' => 'ID Vessel',
			'DateCreated' => 'Date Created',
			'ValidUntil' => 'Valid Until',
			'id_vessel_document' => 'Document Name',
			'Attachment' => 'Attachment',
			'IsPermanen' => 'Expired Type',
			'PlaceCreated' => 'Place Created',
			'Check1' => 'Check 1',
			'Check2' => 'Check 2',
			'Check3' => 'Check 3',
			'Check4' => 'Check 4',
			'Check5' => 'Check 5',
			'Check6' => 'Check 6',
			'Status' => 'Status',
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

		$criteria->compare('id_vessel_document_info',$this->id_vessel_document_info,true);
		$criteria->compare('id_vessel',$this->id_vessel);
		$criteria->compare('DateCreated',$this->DateCreated,true);
		$criteria->compare('ValidUntil',$this->ValidUntil,true);
		$criteria->compare('id_vessel_document',$this->id_vessel_document);
		$criteria->compare('Attachment',$this->Attachment,true);
		$criteria->compare('IsPermanen',$this->IsPermanen,true);
		$criteria->compare('PlaceCreated',$this->PlaceCreated,true);
		$criteria->compare('Check1',$this->Check1,true);
		$criteria->compare('Check2',$this->Check2,true);
		$criteria->compare('Check3',$this->Check3,true);
		$criteria->compare('Check4',$this->Check4,true);
		$criteria->compare('Check5',$this->Check5,true);
		$criteria->compare('Check6',$this->Check6,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function searchbyvessel($id_vessel)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->condition = 'id_vessel=:id_vessel';
		$criteria->params = array(':id_vessel'=>$id_vessel);

		$criteria->compare('id_vessel_document_info',$this->id_vessel_document_info,true);
		$criteria->compare('id_vessel',$this->id_vessel);
		$criteria->compare('DateCreated',$this->DateCreated,true);
		$criteria->compare('ValidUntil',$this->ValidUntil,true);
		$criteria->compare('id_vessel_document',$this->id_vessel_document);
		$criteria->compare('Attachment',$this->Attachment,true);
		$criteria->compare('IsPermanen',$this->IsPermanen,true);
		$criteria->compare('PlaceCreated',$this->PlaceCreated,true);

		$criteria->compare('Check1',$this->Check1,true);
		$criteria->compare('Check2',$this->Check2,true);
		$criteria->compare('Check3',$this->Check3,true);
		$criteria->compare('Check4',$this->Check4,true);
		$criteria->compare('Check5',$this->Check5,true);
		$criteria->compare('Check6',$this->Check6,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}