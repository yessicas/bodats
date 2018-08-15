<?php

/**
 * This is the model class for table "voyage_mst_activity".
 *
 * The followings are the available columns in table 'voyage_mst_activity':
 * @property integer $id_voyage_activity
 * @property string $voyage_activity
 * @property string $voyage_activity_desc
 * @property string $color
 */
class VoyageMstActivity extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return VoyageMstActivity the static model class
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
		return 'voyage_mst_activity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('voyage_activity, voyage_activity_desc, color', 'required'),
			array('voyage_activity, color', 'length', 'max'=>20),
			array('id_mst_timesheet_summary', 'length', 'max'=>20),
			array('voyage_activity_desc', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_voyage_activity, voyage_activity, voyage_activity_desc, color', 'safe', 'on'=>'search'),
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
				'timesheetactivity' => array(self::BELONGS_TO, 'MstTimesheetSummary', 'id_mst_timesheet_summary'),
				'timesheetgroup' => array(self::BELONGS_TO, 'VoyageMstActivityGroup', 'id_voyage_activity_group'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_voyage_activity' => 'ID Voyage Activity',
			'id_mst_timesheet_summary' => 'Timesheet Summary',
			'voyage_activity' => 'Voyage Activity',
			'voyage_activity_desc' => 'Voyage Activity Desc',
			'color' => 'Color',
			'id_voyage_activity_group'=>'Activity Group',
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

		$criteria->compare('id_voyage_activity',$this->id_voyage_activity);
		$criteria->compare('voyage_activity',$this->voyage_activity,true);
		$criteria->compare('voyage_activity_desc',$this->voyage_activity_desc,true);
		$criteria->compare('color',$this->color,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}