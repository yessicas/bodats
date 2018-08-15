<?php

/**
 * This is the model class for table "currency".
 *
 * The followings are the available columns in table 'currency':
 * @property integer $id_currency
 * @property string $currency
 *
 * The followings are the available model relations:
 * @property Salary[] $salaries
 */
class Currency extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'currency';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('currency,change_rate,change_rate_updated_by,ip_user_updated', 'required'),
			array('change_rate', 'numerical'),
			array('currency,SK, change_rate_updated_by, ip_user_updated', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_currency, currency,SK,change_rate,change_rate_updated_by,ip_user_updated', 'safe', 'on'=>'search'),
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
			'Salary' => array(self::HAS_MANY, 'Salary', 'id_currency'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_currency' => 'ID Currency',
			'currency' => 'Currency',
			'SK'=>'SK',
			'change_rate_updated_by'=>'Chage Rate By',
			'change_rate'=>'Change Rate',
			'ip_user_updated'=>'IP User Updated',
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

		$criteria->compare('id_currency',$this->id_currency);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('SK',$this->SK,true);
		$criteria->compare('change_rate',$this->change_rate,true);
		$criteria->compare('change_rate_updated_by',$this->change_rate_updated_by,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Currency the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
