<?php

/**
 * This is the model class for table "fuel_price_history".
 *
 * The followings are the available columns in table 'fuel_price_history':
 * @property string $id_fuel_price_history
 * @property integer $id_currency
 * @property double $fuel_price
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class FuelPriceHistory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'fuel_price_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_currency, fuel_price, created_date, created_user, ip_user_updated', 'required'),
			array('id_currency', 'numerical', 'integerOnly'=>true),
			array('fuel_price', 'numerical'),
			array('id_fuel_price_history,SK', 'length', 'max'=>20),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_fuel_price_history, id_currency, fuel_price, SK, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
			'id_fuel_price_history' => 'ID Fuel Price History',
			'id_currency' => 'ID Currency',
			'fuel_price' => 'Fuel Price',
			'SK'=>'SK',
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

		$criteria->compare('id_fuel_price_history',$this->id_fuel_price_history,true);
		$criteria->compare('id_currency',$this->id_currency);
		$criteria->compare('fuel_price',$this->fuel_price);
		$criteria->compare('SK',$this->SK);
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
	 * @return FuelPriceHistory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
