<?php

/**
 * This is the model class for table "standard_vessel_brokerage".
 *
 * The followings are the available columns in table 'standard_vessel_brokerage':
 * @property string $id_standard_vessel_brokerage
 * @property string $id_standard_vessel_cost
 * @property integer $id_brokerage_item
 * @property double $amount
 * @property integer $id_currency
 * @property string $description
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class StandardVesselBrokerage extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'standard_vessel_brokerage';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_standard_vessel_cost, id_brokerage_item, amount, id_currency, description, created_date, created_user, ip_user_updated', 'required'),
			array('id_brokerage_item, id_currency', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('id_standard_vessel_cost', 'length', 'max'=>20),
			array('description', 'length', 'max'=>250),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_standard_vessel_brokerage, id_standard_vessel_cost, id_brokerage_item, amount, id_currency, description, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
			'StandardVesselCost' => array(self::BELONGS_TO, 'StandardVesselCost', 'id_standard_vessel_cost'),
			'Currency' => array(self::BELONGS_TO, 'Currency', 'id_currency'),
			'BrokerageItem' => array(self::BELONGS_TO, 'BrokerageItem', 'id_brokerage_item'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_standard_vessel_brokerage' => 'ID Standard Vessel Brokerage',
			'id_standard_vessel_cost' => 'ID Standard Vessel Cost',
			'id_brokerage_item' => 'Brokerage Item',
			'amount' => 'Amount',
			'id_currency' => 'Currency',
			'description' => 'Description',
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

		$criteria->compare('id_standard_vessel_brokerage',$this->id_standard_vessel_brokerage,true);
		$criteria->compare('id_standard_vessel_cost',$this->id_standard_vessel_cost,true);
		$criteria->compare('id_brokerage_item',$this->id_brokerage_item);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('id_currency',$this->id_currency);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function searchbyvesselcost($id_standard_vessel_cost)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'id_standard_vessel_cost = :id_standard_vessel_cost';
		$criteria->params = array(':id_standard_vessel_cost'=>$id_standard_vessel_cost);

		$criteria->compare('id_standard_vessel_brokerage',$this->id_standard_vessel_brokerage,true);
		$criteria->compare('id_standard_vessel_cost',$this->id_standard_vessel_cost,true);
		$criteria->compare('id_brokerage_item',$this->id_brokerage_item);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('id_currency',$this->id_currency);
		$criteria->compare('description',$this->description,true);
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
	 * @return StandardVesselBrokerage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
