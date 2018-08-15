<?php

/**
 * This is the model class for table "vendor_classification".
 *
 * The followings are the available columns in table 'vendor_classification':
 * @property integer $id_vendor_classification
 * @property integer $id_vendor
 * @property string $type
 */
class VendorClassification extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return VendorClassification the static model class
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
		return 'vendor_classification';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type', 'required'),
			array('id_vendor', 'numerical', 'integerOnly'=>true),
		//	array('type2', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_vendor_classification, id_vendor, type,', 'safe', 'on'=>'search'),
			array('id_vendor_classification, id_vendor, type,', 'safe', 'on'=>'searchbyclas'),
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
			'namavendor' => array(self::BELONGS_TO, 'Vendor', 'id_vendor'),
		);
	}




	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_vendor_classification' => 'ID Vendor Classification',
			'id_vendor' => 'Vendor',
			
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

		$criteria->compare('id_vendor_classification',$this->id_vendor_classification);
		$criteria->compare('id_vendor',$this->id_vendor);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchbyclas($id_vendor)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'id_vendor=:id_vendor';
		$criteria->params = array(':id_vendor'=>$id_vendor);

		$criteria->compare('id_vendor_classification',$this->id_vendor_classification);
		$criteria->compare('id_vendor',$this->id_vendor);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}