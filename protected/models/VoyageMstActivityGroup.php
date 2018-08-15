<?php

/**
 * This is the model class for table "voyage_mst_activity_group".
 *
 * The followings are the available columns in table 'voyage_mst_activity_group':
 * @property integer $id_voyage_activity_group
 * @property string $voyage_activity_group_short
 * @property string $voyage_activity_group
 * @property string $voyage_activity_group_desc
 * @property string $color
 */
class VoyageMstActivityGroup extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'voyage_mst_activity_group';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('voyage_activity_group_short, voyage_activity_group, voyage_activity_group_desc, color', 'required'),
			array('voyage_activity_group_short', 'length', 'max'=>64),
			array('voyage_activity_group, color', 'length', 'max'=>20),
			array('voyage_activity_group_desc', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_voyage_activity_group, voyage_activity_group_short, voyage_activity_group, voyage_activity_group_desc, color', 'safe', 'on'=>'search'),
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
			'id_voyage_activity_group' => 'Id Voyage Activity Group',
			'voyage_activity_group_short' => 'Voyage Activity Group Short',
			'voyage_activity_group' => 'Voyage Activity Group',
			'voyage_activity_group_desc' => 'Voyage Activity Group Desc',
			'color' => 'Color',
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

		$criteria->compare('id_voyage_activity_group',$this->id_voyage_activity_group);
		$criteria->compare('voyage_activity_group_short',$this->voyage_activity_group_short,true);
		$criteria->compare('voyage_activity_group',$this->voyage_activity_group,true);
		$criteria->compare('voyage_activity_group_desc',$this->voyage_activity_group_desc,true);
		$criteria->compare('color',$this->color,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VoyageMstActivityGroup the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
