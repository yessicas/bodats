<?php

/**
 * This is the model class for table "warehouse".
 *
 * The followings are the available columns in table 'warehouse':
 * @property integer $id_warehouse
 * @property string $warehouse_name
 * @property string $address
 * @property integer $is_active
 */
class Warehouse extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'warehouse';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('warehouse_name, address, is_active', 'required'),
			array('is_active', 'numerical', 'integerOnly'=>true),
			array('warehouse_name, address', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_warehouse, warehouse_name, address, is_active', 'safe', 'on'=>'search'),
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

	public function status($input)
	{
		if($input == '1')

		return "Yes";

		else if ($input == '0')

		return "No";
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_warehouse' => 'Id Warehouse',
			'warehouse_name' => 'Warehouse Name',
			'address' => 'Address',
			'is_active' => 'Is Active',
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

		$criteria->compare('id_warehouse',$this->id_warehouse);
		$criteria->compare('warehouse_name',$this->warehouse_name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('is_active',$this->is_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Warehouse the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
