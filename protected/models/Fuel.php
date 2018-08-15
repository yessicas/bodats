<?php

/**
 * This is the model class for table "fuel".
 *
 * The followings are the available columns in table 'fuel':
 * @property integer $id_fuel
 * @property string $fuel
 * @property double $fuel_price
 * @property integer $id_currency
 * @property string $fuel_price_updated
 * @property string $fuel_price_updated_by
 */
class Fuel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'fuel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fuel, fuel_price, id_currency, fuel_price_updated, fuel_price_updated_by', 'required'),
			array('id_currency', 'numerical', 'integerOnly'=>true),
			array('fuel_price', 'numerical'),
			array('fuel,SK', 'length', 'max'=>100),
			array('fuel_price_updated_by', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_fuel, fuel, SK, fuel_price, id_currency, fuel_price_updated, fuel_price_updated_by', 'safe', 'on'=>'search'),
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
			'Currency' => array(self::BELONGS_TO, 'Currency', 'id_currency'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_fuel' => 'ID Fuel',
			'fuel' => 'Fuel',
			'SK'=>'SK',
			'fuel_price' => 'Fuel Price',
			'id_currency' => 'ID Currency',
			'fuel_price_updated' => 'Fuel Price Updated',
			'fuel_price_updated_by' => 'Fuel Price Updated By',
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

		$criteria->compare('id_fuel',$this->id_fuel);
		$criteria->compare('fuel',$this->fuel,true);
		$criteria->compare('fuel_price',$this->fuel_price);
		$criteria->compare('SK',$this->SK);
		$criteria->compare('id_currency',$this->id_currency);
		$criteria->compare('fuel_price_updated',$this->fuel_price_updated,true);
		$criteria->compare('fuel_price_updated_by',$this->fuel_price_updated_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Fuel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
