<?php

/**
 * This is the model class for table "sales_plan_summary".
 *
 * The followings are the available columns in table 'sales_plan_summary':
 * @property string $id_sales_plan_summary
 * @property integer $year
 * @property integer $month
 * @property integer $TotalVoyage
 * @property double $TotalRevenue
 * @property double $TotalCost
 * @property double $GP_COGM
 * @property double $GP_COGS
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class SalesPlanSummary extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SalesPlanSummary the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sales_plan_summary';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('year, month, TotalVoyage, TotalRevenue, TotalCost, GP_COGM, GP_COGS, created_date, created_user, ip_user_updated', 'required'),
			array('year, month, TotalVoyage', 'numerical', 'integerOnly'=>true),
			array('TotalRevenue, TotalCost, GP_COGM, GP_COGS', 'numerical'),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_sales_plan_summary, year, month, TotalVoyage, TotalRevenue, TotalCost, GP_COGM, GP_COGS, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
			'id_sales_plan_summary' => 'ID Sales Plan Summary',
			'year' => 'Year',
			'month' => 'Month',
			'TotalVoyage' => 'Total Voyage',
			'TotalRevenue' => 'Total Revenue',
			'TotalCost' => 'Total Cost',
			'GP_COGM' => 'GP COGM',
			'GP_COGS' => 'GP COGS',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'ip_user_updated' => 'IP User Updated',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_sales_plan_summary',$this->id_sales_plan_summary,true);
		$criteria->compare('year',$this->year);
		$criteria->compare('month',$this->month);
		$criteria->compare('TotalVoyage',$this->TotalVoyage);
		$criteria->compare('TotalRevenue',$this->TotalRevenue);
		$criteria->compare('TotalCost',$this->TotalCost);
		$criteria->compare('GP_COGM',$this->GP_COGM);
		$criteria->compare('GP_COGS',$this->GP_COGS);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}