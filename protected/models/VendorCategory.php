<?php

/**
 * This is the model class for table "vendor_category".
 *
 * The followings are the available columns in table 'vendor_category':
 * @property string $id_vendor_category
 * @property integer $id_vendor
 * @property integer $id_po_category
 * @property string $description
 */
class VendorCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return VendorCategory the static model class
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
		return 'vendor_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_vendor, id_po_category, description', 'required'),
			array('id_vendor, id_po_category', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_vendor_category, id_vendor, id_po_category, description', 'safe', 'on'=>'search'),
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
			'Vendor' => array(self::BELONGS_TO, 'Vendor', 'id_vendor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_vendor_category' => 'ID Vendor Category',
			'id_vendor' => 'ID Vendor',
			'id_po_category' => 'ID PO Category',
			'description' => 'Description',
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

		$criteria->compare('id_vendor_category',$this->id_vendor_category,true);
		$criteria->compare('id_vendor',$this->id_vendor);
		$criteria->compare('id_po_category',$this->id_po_category);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}