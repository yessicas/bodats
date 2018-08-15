<?php

/**
 * This is the model class for table "part".
 *
 * The followings are the available columns in table 'part':
 * @property string $id_part
 * @property integer $id_vessel
 * @property string $id_part_structure
 * @property string $PartNumber
 * @property string $PartName
 * @property double $LifeTime
 * @property double $UsageTime
 * @property integer $MinStock
 * @property integer $Quantity
 * @property string $metric
 * @property integer $ReplaceSchedule
 * @property string $LastReplacementDate
 * @property integer $ReplaceLeadtime
 * @property double $StandardPriceUnit
 * @property integer $id_currency
 */
class Part extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Part the static model class
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
		return 'part';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PartNumber, PartName,StandardPriceUnit, id_currency,description', 'required'),
			array('id_vessel, MinStock, Quantity, ReplaceSchedule, ReplaceLeadtime, id_currency', 'numerical', 'integerOnly'=>true),
			array('LifeTime, UsageTime, StandardPriceUnit', 'numerical'),
			array('id_part_structure, metric', 'length', 'max'=>20),
			array('PartNumber,impa', 'length', 'max'=>50),
			array('PartName', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_part, id_vessel, id_part_structure, PartNumber, PartName, LifeTime, UsageTime, MinStock, Quantity, metric, ReplaceSchedule, LastReplacementDate, ReplaceLeadtime, StandardPriceUnit, id_currency,description,impa', 'safe', 'on'=>'search'),
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
			'vess' => array(self::BELONGS_TO, 'Vessel', 'id_vessel'),
			'struc' => array(self::BELONGS_TO, 'PartStructure', 'id_part_structure'),
			'curr' => array(self::BELONGS_TO, 'Currency', 'id_currency'),
			'met' => array(self::BELONGS_TO, 'MstMetric', 'metric'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_part' => 'ID Part',
			'id_vessel' => 'Vessel',
			'id_part_structure' => 'Part Structure',
			'PartNumber' => 'Part Number',
			'PartName' => 'Part Name',
			'LifeTime' => 'Life Time',
			'UsageTime' => 'Usage Time',
			'MinStock' => 'Min Stock',
			'Quantity' => 'Quantity',
			'metric' => 'Metric',
			'impa'=>'impa',
			'ReplaceSchedule' => 'Replace Schedule',
			'LastReplacementDate' => 'Last Replacement Date',
			'ReplaceLeadtime' => 'Replace Leadtime',
			'StandardPriceUnit' => 'Standard Price Unit',
			'id_currency' => 'Currency',
			'description'=>'Description',
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

		$criteria->compare('id_part',$this->id_part,true);
		$criteria->compare('id_vessel',$this->id_vessel);
		$criteria->compare('id_part_structure',$this->id_part_structure,true);
		$criteria->compare('PartNumber',$this->PartNumber,true);
		$criteria->compare('PartName',$this->PartName,true);
		$criteria->compare('LifeTime',$this->LifeTime);
		$criteria->compare('UsageTime',$this->UsageTime);
		$criteria->compare('MinStock',$this->MinStock);
		$criteria->compare('Quantity',$this->Quantity);
		$criteria->compare('metric',$this->metric,true);
		$criteria->compare('impa',$this->impa,true);
		$criteria->compare('ReplaceSchedule',$this->ReplaceSchedule);
		$criteria->compare('LastReplacementDate',$this->LastReplacementDate,true);
		$criteria->compare('ReplaceLeadtime',$this->ReplaceLeadtime);
		$criteria->compare('StandardPriceUnit',$this->StandardPriceUnit);
		$criteria->compare('id_currency',$this->id_currency);
		$criteria->compare('description',$this->description);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}