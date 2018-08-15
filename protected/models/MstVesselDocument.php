<?php

/**
 * This is the model class for table "mst_vessel_document".
 *
 * The followings are the available columns in table 'mst_vessel_document':
 * @property integer $id_vessel_document
 * @property string $VesselDocumentName
 * @property string $Information
 * @property integer $Status
 *
 * The followings are the available model relations:
 * @property VesselDocumentInfo[] $vesselDocumentInfos
 */
class MstVesselDocument extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MstVesselDocument the static model class
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
		return 'mst_vessel_document';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('VesselDocumentName, VesselDocumentNameEng,Dasar,VesselType, Status', 'required'),
			array('Status', 'numerical', 'integerOnly'=>true),
			array('VesselDocumentName, VesselDocumentNameEng,Dasar,VesselType', 'length', 'max'=>250),
			array('Information, Dasar', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_vessel_document, VesselDocumentName, VesselDocumentNameEng, VesselType, Dasar, Information, Status', 'safe', 'on'=>'search'),
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
			'vesselDocumentInfos' => array(self::HAS_MANY, 'VesselDocumentInfo', 'id_vessel_document'),
		);
	}

public function statusUsed($input)

 {

if($input == '1')

return "Used";

else if ($input == '0')

return "Unused";

}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_vessel_document' => 'ID Vessel Document',
			'VesselDocumentName' => 'Document Name',
			'VesselDocumentNameEng'=>'Document Name Eng',
			'VesselType'=>'Type',
			'Dasar'=>'Dasar',
			'Information' => 'Information',
			'Status' => 'Status',
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

		$criteria->compare('id_vessel_document',$this->id_vessel_document);
		$criteria->compare('VesselDocumentName',$this->VesselDocumentName,true);
		$criteria->compare('VesselDocumentNameEng',$this->VesselDocumentNameEng,true);
		$criteria->compare('VesselType',$this->VesselType,true);
		$criteria->compare('Dasar',$this->Dasar,true);
		$criteria->compare('Information',$this->Information,true);
		$criteria->compare('Status',$this->Status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}