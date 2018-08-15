<?php

/**
 * This is the model class for table "vessel_insurance_accrual".
 *
 * The followings are the available columns in table 'vessel_insurance_accrual':
 * @property string $id_vessel_insurance_accrual
 * @property integer $id_vessel
 * @property integer $year
 * @property double $amount
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class VesselInsuranceAccrual extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vessel_insurance_accrual';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_vessel, year, amount, created_date, created_user, ip_user_updated', 'required'),
			array('id_vessel, year', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_vessel_insurance_accrual, id_vessel, year, amount, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
			'Vessel' => array(self::BELONGS_TO, 'Vessel', 'id_vessel'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_vessel_insurance_accrual' => 'ID Vessel Insurance Accrual',
			'id_vessel' => 'Vessel',
			'year' => 'Year',
			'amount' => 'Annual Accrued',
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

		$criteria->compare('id_vessel_insurance_accrual',$this->id_vessel_insurance_accrual,true);
		$criteria->compare('id_vessel',$this->id_vessel);
		$criteria->compare('year',$this->year);
		$criteria->compare('amount',$this->amount);
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
	 * @return VesselInsuranceAccrual the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
