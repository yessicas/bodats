<?php

/**
 * This is the model class for table "settype_tugbarge".
 *
 * The followings are the available columns in table 'settype_tugbarge':
 * @property string $id_settype_tugbarge
 * @property integer $month
 * @property integer $year
 * @property string $first_date
 * @property integer $tug
 * @property integer $barge
 * @property integer $tug_power
 * @property integer $barge_capacity
 * @property string $settype_name
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class SettypeTugbarge extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'settype_tugbarge';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('month, year, first_date, tug, barge, tug_power, barge_capacity, settype_name, created_date, created_user, ip_user_updated', 'required'),
			array('month, year, tug, barge, tug_power, barge_capacity', 'numerical', 'integerOnly'=>true),
			array('settype_name', 'length', 'max'=>250),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated, voyage_number', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_settype_tugbarge, month, year, first_date, tug, barge, tug_power, barge_capacity, settype_name, voyage_number, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
			'VesselTug' => array(self::BELONGS_TO, 'Vessel', 'tug'),
			'VesselBarge' => array(self::BELONGS_TO, 'Vessel', 'barge'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_settype_tugbarge' => 'ID Settype Tugbarge',
			'month' => 'Month',
			'year' => 'Year',
			'first_date' => 'First Date',
			'tug' => 'Tug',
			'barge' => 'Barge',
			'tug_power' => 'Tug Power',
			'barge_capacity' => 'Barge Capacity',
			'settype_name' => 'Settype Name',
			'voyage_number'=>'Voyage Number',
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

		$criteria->compare('id_settype_tugbarge',$this->id_settype_tugbarge,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('month',$this->month);
		$criteria->compare('year',$this->year);
		$criteria->compare('first_date',$this->first_date,true);
		$criteria->compare('tug',$this->tug);
		$criteria->compare('barge',$this->barge);
		$criteria->compare('tug_power',$this->tug_power);
		$criteria->compare('barge_capacity',$this->barge_capacity);
		$criteria->compare('settype_name',$this->settype_name,true);
		$criteria->compare('voyage_number',$this->voyage_number,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);
		$criteria->order = 'tug ASC, barge ASC';
		$pagination = array('pageSize'=>30);
		//$pagination  = false;
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>$pagination,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SettypeTugbarge the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
