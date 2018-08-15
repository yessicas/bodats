<?php

/**
 * This is the model class for table "mst_maintenance_type".
 *
 * The followings are the available columns in table 'mst_maintenance_type':
 * @property integer $id_maintenance_type
 * @property string $MaintenanceTypeName
 *
 * The followings are the available model relations:
 * @property VesselMaintenancePlan[] $vesselMaintenancePlans
 */
class MstMaintenanceType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MstMaintenanceType the static model class
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
		return 'mst_maintenance_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_maintenance_type, MaintenanceTypeName', 'required'),
			array('id_maintenance_type', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_maintenance_type, MaintenanceTypeName', 'safe', 'on'=>'search'),
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
			'vesselMaintenancePlans' => array(self::HAS_MANY, 'VesselMaintenancePlan', 'id_maintenance_type'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_maintenance_type' => 'ID Maintenance Type',
			'MaintenanceTypeName' => 'Maintenance Type Name',
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

		$criteria->compare('id_maintenance_type',$this->id_maintenance_type);
		$criteria->compare('MaintenanceTypeName',$this->MaintenanceTypeName,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'start_date ASC',
			),
		));
	}
}