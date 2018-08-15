<?php

/**
 * This is the model class for table "standard_fuel".
 *
 * The followings are the available columns in table 'standard_fuel':
 * @property integer $id_standard_fuel
 * @property integer $type_set_power
 * @property integer $type_set_feet
 * @property integer $JettyIdStart
 * @property integer $JettyIdEnd
 * @property integer $jarak
 * @property integer $speed_standard
 * @property double $target_sailing_time
 * @property double $lay_time
 * @property double $sailing_time
 * @property double $cycle_time
 * @property double $total_bbm
 * @property integer $agency_rate
 * @property integer $agency_rate_id_currency
 * @property integer $type
 *
 * The followings are the available model relations:
 * @property Jetty $jettyIdEnd
 * @property Jetty $jettyIdStart
 */
class StandardFuel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'standard_fuel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('type_set_power, type_set_feet, JettyIdStart, JettyIdEnd, typeway, loaded, jarak, speed_standard, target_sailing_time, me_old, me_new, ae_old, ae_new, shift_old, shift_new, outbond_old, outbond_new, lay_time, sailing_time, cycle_time, total_bbm, total_bbm_new, agency_rate, agency_rate_id_currency, type', 'required'),
			//array('type_set_power, type_set_feet, JettyIdStart, JettyIdEnd, typeway, loaded, jarak, speed_standard, target_sailing_time, me_new, ae_new, shift_new, outbond_new, lay_time, sailing_time, cycle_time, total_bbm_new', 'required'),
			array('type_set_power, type_set_feet, JettyIdStart, JettyIdEnd, loaded, cycle_time, total_bbm_new', 'required'),
			array('type_set_power, type_set_feet, JettyIdStart, JettyIdEnd, jarak, agency_rate, agency_rate_id_currency, type', 'numerical', 'integerOnly'=>true),
			array('target_sailing_time, me_old, me_new, ae_old, ae_new, shift_old, shift_new, outbond_old, outbond_new, lay_time, sailing_time, cycle_time, total_bbm, total_bbm_new, speed_standard', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_standard_fuel, type_set_power, type_set_feet, JettyIdStart, JettyIdEnd, typeway, loaded, jarak, speed_standard, target_sailing_time, me_old, me_new, ae_old, ae_new, shift_old, shift_new, outbond_old, outbond_new, lay_time, sailing_time, cycle_time, total_bbm, total_bbm_new, agency_rate, agency_rate_id_currency, type', 'safe', 'on'=>'search'),
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
			'jettyIdEnd' => array(self::BELONGS_TO, 'Jetty', 'JettyIdEnd'),
			'jettyIdStart' => array(self::BELONGS_TO, 'Jetty', 'JettyIdStart'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_standard_fuel' => 'ID Standard Fuel',
			'type_set_power' => 'Hp',
			'type_set_feet' => 'Size',
			'JettyIdStart' => 'Jetty  Start',
			'JettyIdEnd' => 'Jetty  End',
			'jarak' => 'Nauthical (nm)',
			'speed_standard' => 'Speed',
			'target_sailing_time' => 'Sailing Time (hour)',
			'lay_time' => 'Lay Time (day)',
			'sailing_time' => 'Sailing Time (day)',
			'cycle_time' => 'Cycle Time (day)',
			'total_bbm' => 'Standard BBM Old (Liter)',
			'total_bbm_new' => 'Standard BBM New (Liter)',
			'agency_rate' => 'Agency Rate',
			'agency_rate_id_currency' => 'Agency Rate ID Currency',
			'type' => 'Type',
			'typeway'=>'Type way',
			'loaded'=>'Ballast / Loaded',
			'me_old'=>'ME Lama (Liter)',
			'me_new'=>'ME (Liter)',
			'ae_old'=>'AE Lama (Liter)',
			'ae_new'=>'AE (Liter)',

			'shift_old'=>'Shift Lama (Liter)',
			'shift_new'=>'Shift (Liter)',
			'outbond_old'=>'Outbond Lama (Liter)',
			'outbond_new'=>'Outbond (Liter)',
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

		$criteria->compare('id_standard_fuel',$this->id_standard_fuel);
		$criteria->compare('type_set_power',$this->type_set_power);
		$criteria->compare('type_set_feet',$this->type_set_feet);
		$criteria->compare('JettyIdStart',$this->JettyIdStart);
		$criteria->compare('JettyIdEnd',$this->JettyIdEnd);
		$criteria->compare('jarak',$this->jarak);
		$criteria->compare('speed_standard',$this->speed_standard);
		$criteria->compare('target_sailing_time',$this->target_sailing_time);
		$criteria->compare('lay_time',$this->lay_time);
		$criteria->compare('sailing_time',$this->sailing_time);
		$criteria->compare('cycle_time',$this->cycle_time);
		$criteria->compare('total_bbm',$this->total_bbm);
		$criteria->compare('total_bbm_new',$this->total_bbm_new);
		$criteria->compare('agency_rate',$this->agency_rate);
		$criteria->compare('agency_rate_id_currency',$this->agency_rate_id_currency);
		$criteria->compare('type',$this->type);
		$criteria->compare('typeway',$this->typeway);
		$criteria->compare('loaded',$this->loaded);
		$criteria->compare('me_old',$this->me_old);
		$criteria->compare('me_new',$this->me_new);
		$criteria->compare('ae_old',$this->ae_old);
		$criteria->compare('ae_new',$this->ae_new);
		$criteria->compare('shift_old',$this->shift_old);
		$criteria->compare('shift_new',$this->shift_new);
		$criteria->compare('outbond_old',$this->outbond_old);
		$criteria->compare('outbond_new',$this->outbond_new);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>15),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StandardFuel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
