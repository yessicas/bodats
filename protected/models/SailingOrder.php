<?php

/**
 * This is the model class for table "sailing_order".
 *
 * The followings are the available columns in table 'sailing_order':
 * @property string $id_sailing_order
 * @property string $SailingOrderNumber
 * @property integer $SailingOrderNo
 * @property integer $SailingOrderMonth
 * @property integer $SailingOrderYear
 * @property string $id_voyage_order
 * @property integer $CrewIdMaster
 * @property integer $Date
 * @property string $StartDate
 * @property double $StandardFuel
 * @property integer $LayTime
 * @property double $Insentif
 * @property double $LastFuelStock
 * @property string $Remark
 * @property string $Nautical
 * @property string $NauticalHead
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class SailingOrder extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SailingOrder the static model class
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
		return 'sailing_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('SailingOrderStatus, id_voyage_order, CrewIdMaster, Date, StartDate, StandardFuel, LayTime, Insentif, LastFuelStock, Remark, Nautical, NauticalHead, created_date, created_user, ip_user_updated', 'required'),
			array('SailingOrderNo, SailingOrderMonth, SailingOrderYear, CrewIdMaster', 'numerical', 'integerOnly'=>true),
			array('StandardFuel, Insentif, LastFuelStock, LayTime, NauticalMilIncentive', 'numerical'),
			array('SailingOrderNumber', 'length', 'max'=>32),
			array('id_voyage_order', 'length', 'max'=>20),
			array('Nautical, NauticalHead', 'length', 'max'=>150),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_sailing_order, SailingOrderNumber, SailingOrderNo, SailingOrderMonth, SailingOrderYear, id_voyage_order, CrewIdMaster, Date, StartDate, StandardFuel, LayTime, Insentif, LastFuelStock, Remark, Nautical, NauticalHead, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
		'Crew' => array(self::BELONGS_TO, 'Crew', 'CrewIdMaster'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_sailing_order' => 'ID Sailing Order',
			'SailingOrderNumber' => 'Sailing Order Number',
			'SailingOrderNo' => 'Sailing Order No',
			'SailingOrderMonth' => 'Sailing Order Month',
			'SailingOrderYear' => 'Sailing Order Year',
			'id_voyage_order' => 'ID Voyage Order',
			'CrewIdMaster' => 'Crew ID Master',
			'Date' => 'Date',
			'StartDate' => 'Start Date',
			'StandardFuel' => 'Standard Fuel',
			'LayTime' => 'Lay Time',
			'Insentif' => 'Insentif',
			'LastFuelStock' => 'Last Fuel Stock',
			'Remark' => 'Remark',
			'Nautical' => 'Nautical',
			'NauticalHead' => 'Nautical Head',
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

		$criteria->compare('id_sailing_order',$this->id_sailing_order,true);
		$criteria->compare('SailingOrderNumber',$this->SailingOrderNumber,true);
		$criteria->compare('SailingOrderNo',$this->SailingOrderNo);
		$criteria->compare('SailingOrderMonth',$this->SailingOrderMonth);
		$criteria->compare('SailingOrderYear',$this->SailingOrderYear);
		$criteria->compare('id_voyage_order',$this->id_voyage_order,true);
		$criteria->compare('CrewIdMaster',$this->CrewIdMaster);
		$criteria->compare('Date',$this->Date);
		$criteria->compare('StartDate',$this->StartDate,true);
		$criteria->compare('StandardFuel',$this->StandardFuel);
		$criteria->compare('LayTime',$this->LayTime);
		$criteria->compare('Insentif',$this->Insentif);
		$criteria->compare('LastFuelStock',$this->LastFuelStock);
		$criteria->compare('Remark',$this->Remark,true);
		$criteria->compare('Nautical',$this->Nautical,true);
		$criteria->compare('NauticalHead',$this->NauticalHead,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}