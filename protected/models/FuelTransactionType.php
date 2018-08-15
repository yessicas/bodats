<?php

/**
 * This is the model class for table "fuel_transaction_type".
 *
 * The followings are the available columns in table 'fuel_transaction_type':
 * @property integer $id_fuel_transaction_type
 * @property string $fuel_transaction_type
 * @property string $category
 */
class FuelTransactionType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'fuel_transaction_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_fuel_transaction_type, fuel_transaction_type, category', 'required'),
			array('id_fuel_transaction_type', 'numerical', 'integerOnly'=>true),
			array('fuel_transaction_type', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_fuel_transaction_type, fuel_transaction_type, category', 'safe', 'on'=>'search'),
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
			'id_fuel_transaction_type' => 'ID Fuel Transaction Type',
			'fuel_transaction_type' => 'Fuel Transaction Type',
			'category' => 'Category',
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

		$criteria->compare('id_fuel_transaction_type',$this->id_fuel_transaction_type);
		$criteria->compare('fuel_transaction_type',$this->fuel_transaction_type,true);
		$criteria->compare('category',$this->category,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FuelTransactionType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
