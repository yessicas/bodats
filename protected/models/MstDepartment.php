<?php

/**
 * This is the model class for table "mst_department".
 *
 * The followings are the available columns in table 'mst_department':
 * @property string $DepartmentId
 * @property string $DepartmentName
 */
class MstDepartment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MstDepartment the static model class
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
		return 'mst_department';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('DepartmentId, DepartmentName', 'required'),
			array('DepartmentId, DepartmentName', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('DepartmentId, DepartmentName', 'safe', 'on'=>'search'),
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
			'DepartmentId' => 'Department',
			'DepartmentName' => 'Department Name',
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

		$criteria->compare('DepartmentId',$this->DepartmentId,true);
		$criteria->compare('DepartmentName',$this->DepartmentName,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}