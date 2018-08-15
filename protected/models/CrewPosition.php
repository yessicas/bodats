<?php

/**
 * This is the model class for table "crew_position".
 *
 * The followings are the available columns in table 'crew_position':
 * @property integer $id_crew_position
 * @property string $crew_position
 * @property string $description
 */
class CrewPosition extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CrewPosition the static model class
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
		return 'crew_position';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('crew_position, minimum_req description', 'required'),
			array('minimum_req', 'numerical','integerOnly'=>true),
			array('crew_position', 'length', 'max'=>100),
			array('description', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_crew_position, crew_position, minimum_req, description', 'safe', 'on'=>'search'),
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
			'id_crew_position' => 'ID Crew Position',
			'crew_position' => 'Crew Position',
			'minimum_req'=>'Minimum Request',
			'description' => 'Description',
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

		$criteria->compare('id_crew_position',$this->id_crew_position);
		$criteria->compare('crew_position',$this->crew_position,true);
		$criteria->compare('minimum_req',$this->minimum_req,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}