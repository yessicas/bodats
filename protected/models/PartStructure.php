<?php

/**
 * This is the model class for table "part_structure".
 *
 * The followings are the available columns in table 'part_structure':
 * @property string $id_part_structure
 * @property string $code_number
 * @property string $structure_name
 * @property string $id_part_structure_parent
 * @property integer $id_level
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class PartStructure extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PartStructure the static model class
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
		return 'part_structure';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code_number, structure_name, id_part_structure_parent, id_level', 'required'),
			array('id_level', 'numerical', 'integerOnly'=>true),
			array('code_number', 'length', 'max'=>100),
			array('structure_name', 'length', 'max'=>250),
			array('id_part_structure_parent', 'length', 'max'=>20),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_part_structure, code_number, structure_name, id_part_structure_parent, id_level, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
			'level' => array(self::BELONGS_TO, 'PartLevel', 'id_level'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_part_structure' => 'ID Part Structure',
			'code_number' => 'Code Number',
			'structure_name' => 'Structure Name',
			'id_part_structure_parent' => 'Part Structure Parent',
			'id_level' => 'Level',
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

		$criteria->compare('id_part_structure',$this->id_part_structure,true);
		$criteria->compare('code_number',$this->code_number,true);
		$criteria->compare('structure_name',$this->structure_name,true);
		$criteria->compare('id_part_structure_parent',$this->id_part_structure_parent,true);
		$criteria->compare('id_level',$this->id_level);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}