<?php

/**
 * This is the model class for table "standard_agency".
 *
 * The followings are the available columns in table 'standard_agency':
 * @property integer $id_standard_agency
 * @property integer $JettyIdStart
 * @property integer $JettyIdEnd
 * @property double $agency_fix_cost
 * @property double $agency_var_cost
 * @property double $rent
 * @property double $other
 * @property integer $id_currency
 *
 * The followings are the available model relations:
 * @property Jetty $jettyIdStart
 * @property Jetty $jettyIdEnd
 */
class StandardAgency extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'standard_agency';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('JettyIdStart, JettyIdEnd, agency_fix_cost, agency_var_cost, id_currency', 'required'),
			array('JettyIdStart, JettyIdEnd, id_currency', 'numerical', 'integerOnly'=>true),
			array('agency_fix_cost, agency_var_cost, rent, other', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_standard_agency, JettyIdStart, JettyIdEnd, agency_fix_cost, agency_var_cost, rent, other, id_currency', 'safe', 'on'=>'search'),
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
			'jettyIdStart' => array(self::BELONGS_TO, 'Jetty', 'JettyIdStart'),
			'jettyIdEnd' => array(self::BELONGS_TO, 'Jetty', 'JettyIdEnd'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_standard_agency' => 'ID Standard Agency',
			'JettyIdStart' => 'Start',
			'JettyIdEnd' => 'Finish',
			'agency_fix_cost' => 'Agency Fix',
			'agency_var_cost' => 'Agency Var',
			'rent' => 'Rent',
			'other' => 'Other',
			'id_currency' => 'Currency',
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

		$criteria->compare('id_standard_agency',$this->id_standard_agency);
		$criteria->compare('JettyIdStart',$this->JettyIdStart);
		$criteria->compare('JettyIdEnd',$this->JettyIdEnd);
		$criteria->compare('agency_fix_cost',$this->agency_fix_cost);
		$criteria->compare('agency_var_cost',$this->agency_var_cost);
		$criteria->compare('rent',$this->rent);
		$criteria->compare('other',$this->other);
		$criteria->compare('id_currency',$this->id_currency);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>15),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StandardAgency the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
