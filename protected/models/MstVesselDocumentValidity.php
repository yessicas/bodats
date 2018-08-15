<?php

/**
 * This is the model class for table "mst_vessel_document_validity".
 *
 * The followings are the available columns in table 'mst_vessel_document_validity':
 * @property integer $id_vessel_document_validity
 * @property integer $no
 * @property string $vessel_document_validity
 * @property string $color
 */
class MstVesselDocumentValidity extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mst_vessel_document_validity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no, vessel_document_validity, color', 'required'),
			array('no', 'numerical', 'integerOnly'=>true),
			array('vessel_document_validity', 'length', 'max'=>250),
			array('color', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_vessel_document_validity, no, vessel_document_validity, color', 'safe', 'on'=>'search'),
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
			'id_vessel_document_validity' => 'ID Vessel Document Validity',
			'no' => 'No',
			'vessel_document_validity' => 'Vessel Document Validity',
			'color' => 'Color',
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

		$criteria->compare('id_vessel_document_validity',$this->id_vessel_document_validity);
		$criteria->compare('no',$this->no);
		$criteria->compare('vessel_document_validity',$this->vessel_document_validity,true);
		$criteria->compare('color',$this->color,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MstVesselDocumentValidity the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
