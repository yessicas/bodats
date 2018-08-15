<?php

/**
 * This is the model class for table "mst_timesheet_summary".
 *
 * The followings are the available columns in table 'mst_timesheet_summary':
 * @property integer $id_mst_timesheet_summary
 * @property string $timesheet_summary
 * @property integer $is_active
 */
class MstTimesheetSummary extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MstTimesheetSummary the static model class
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
		return 'mst_timesheet_summary';
	}



	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('timesheet_summary, is_active', 'required'),
			array('is_active', 'numerical', 'integerOnly'=>true),
			array('timesheet_summary', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_mst_timesheet_summary, timesheet_summary, is_active', 'safe', 'on'=>'search'),
		);
	}


	public function statusAktiv($input)
	{
		if($input == '1')

		return "Yes";

		else if ($input == '0')

		return "No";
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
			'id_mst_timesheet_summary' => 'Id Mst Timesheet Summary',
			'timesheet_summary' => 'Timesheet Summary',
			'is_active' => 'Is Active',
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

		$criteria->compare('id_mst_timesheet_summary',$this->id_mst_timesheet_summary);
		$criteria->compare('timesheet_summary',$this->timesheet_summary,true);
		$criteria->compare('is_active',$this->is_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}