<?php

/**
 * This is the model class for table "voyage_close_document".
 *
 * The followings are the available columns in table 'voyage_close_document':
 * @property string $id_voyage_close_document
 * @property string $id_voyage_order
 * @property integer $IdVoyageDocument
 * @property string $VoyageDocumentName
 * @property string $uploaded_date
 * @property string $uploaded_user
 * @property string $ip_user_uploaded
 */
class VoyageCloseDocument extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'voyage_close_document';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_voyage_order, IdVoyageDocument, uploaded_date, uploaded_user, ip_user_uploaded', 'required'),
			array('IdVoyageDocument', 'numerical', 'integerOnly'=>true),
			array('id_voyage_order', 'length', 'max'=>20),
			array('VoyageDocumentName', 'length', 'max'=>240),
			array('uploaded_user', 'length', 'max'=>45),
			array('ip_user_uploaded', 'length', 'max'=>50),

			array('VoyageDocumentName', 'required'),
			array('VoyageDocumentName', 'file',
			'types'=>'pdf',
			'allowEmpty' => false,
			'maxSize' => 1024 * 1024 * 20, // 20MB 
			//'tooLarge' => 'file yang di pilih lebih dari  20MB. Silahkan pilih file  yang lebih kecil.', 
					),


			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_voyage_close_document, id_voyage_order, IdVoyageDocument, VoyageDocumentName, uploaded_date, uploaded_user, ip_user_uploaded', 'safe', 'on'=>'search'),
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
			'id_voyage_close_document' => 'ID Voyage Close Document',
			'id_voyage_order' => 'ID Voyage Order',
			'IdVoyageDocument' => 'ID Voyage Document',
			'VoyageDocumentName' => 'Voyage Document ',
			'uploaded_date' => 'Uploaded Date',
			'uploaded_user' => 'Uploaded User',
			'ip_user_uploaded' => 'IP User Uploaded',
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

		$criteria->compare('id_voyage_close_document',$this->id_voyage_close_document,true);
		$criteria->compare('id_voyage_order',$this->id_voyage_order,true);
		$criteria->compare('IdVoyageDocument',$this->IdVoyageDocument);
		$criteria->compare('VoyageDocumentName',$this->VoyageDocumentName,true);
		$criteria->compare('uploaded_date',$this->uploaded_date,true);
		$criteria->compare('uploaded_user',$this->uploaded_user,true);
		$criteria->compare('ip_user_uploaded',$this->ip_user_uploaded,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VoyageCloseDocument the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
