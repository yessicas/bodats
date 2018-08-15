<?php

/**
 * This is the model class for table "crew_payroll_monthly".
 *
 * The followings are the available columns in table 'crew_payroll_monthly':
 * @property string $id_crew_payroll_monthly
 * @property integer $month
 * @property integer $year
 * @property integer $CrewId
 * @property integer $id_payroll_item
 * @property double $amount
 * @property string $transfer_date
 * @property string $transfer_type
 * @property integer $id_currency
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class CrewPayrollMonthly extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'crew_payroll_monthly';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('month, year, CrewId, id_payroll_item, amount, transfer_date, transfer_type, id_currency, created_date, created_user, ip_user_updated', 'required'),
			array('month, year, CrewId, id_payroll_item, id_currency', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_crew_payroll_monthly, month, year, CrewId, id_payroll_item, amount, transfer_date, transfer_type, id_currency, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
			'id_crew_payroll_monthly' => 'Id Crew Payroll Monthly',
			'month' => 'Month',
			'year' => 'Year',
			'CrewId' => 'Crew',
			'id_payroll_item' => 'Id Payroll Item',
			'amount' => 'Amount',
			'transfer_date' => 'Transfer Date',
			'transfer_type' => 'Transfer Type',
			'id_currency' => 'Id Currency',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'ip_user_updated' => 'Ip User Updated',
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

		$criteria->compare('id_crew_payroll_monthly',$this->id_crew_payroll_monthly,true);
		$criteria->compare('month',$this->month);
		$criteria->compare('year',$this->year);
		$criteria->compare('CrewId',$this->CrewId);
		$criteria->compare('id_payroll_item',$this->id_payroll_item);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('transfer_date',$this->transfer_date,true);
		$criteria->compare('transfer_type',$this->transfer_type,true);
		$criteria->compare('id_currency',$this->id_currency);
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
	 * @return CrewPayrollMonthly the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
