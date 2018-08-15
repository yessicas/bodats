<?php

/**
 * This is the model class for table "vessel_document_info_hist".
 *
 * The followings are the available columns in table 'vessel_document_info_hist':
 * @property string $id_vessel_document_info_hist
 * @property string $id_vessel_document_info
 * @property integer $id_vessel
 * @property string $DateCreated
 * @property string $PlaceCreated
 * @property integer $IsPermanen
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
 */
class VesselDocumentInfoHist extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vessel_document_info_hist';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_vessel_document_info, id_vessel, DateCreated, PlaceCreated, ValidUntil, id_vessel_document, created_date, created_user, ip_user_updated', 'required'),
			array('id_vessel, IsPermanen, id_vessel_document', 'numerical', 'integerOnly'=>true),
			array('id_vessel_document_info', 'length', 'max'=>20),
			array('PlaceCreated', 'length', 'max'=>250),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			array('Check1, Check2, Check3, Check4, Check5, Check6', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_vessel_document_info_hist, id_vessel_document_info, id_vessel, DateCreated, PlaceCreated, IsPermanen, ValidUntil, id_vessel_document, Attachment, Check1, Check2, Check3, Check4, Check5, Check6, Status, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_vessel_document_info_hist' => 'ID Vessel Document Info Hist',
			'id_vessel_document_info' => 'ID Vessel Document Info',
			'id_vessel' => 'ID Vessel',
			'DateCreated' => 'Date Created',
			'PlaceCreated' => 'Place Created',
			'IsPermanen' => 'Is Permanen',
			'ValidUntil' => 'Valid Until',
			'id_vessel_document' => 'ID Vessel Document',
			'Attachment' => 'Attachment',
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
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_vessel_document_info_hist',$this->id_vessel_document_info_hist,true);
		$criteria->compare('id_vessel_document_info',$this->id_vessel_document_info,true);
		$criteria->compare('id_vessel',$this->id_vessel);
		$criteria->compare('DateCreated',$this->DateCreated,true);
		$criteria->compare('PlaceCreated',$this->PlaceCreated,true);
		$criteria->compare('IsPermanen',$this->IsPermanen);
		$criteria->compare('ValidUntil',$this->ValidUntil,true);
		$criteria->compare('id_vessel_document',$this->id_vessel_document);
		$criteria->compare('Attachment',$this->Attachment,true);
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

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VesselDocumentInfoHist the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
