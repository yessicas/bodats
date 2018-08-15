<?php

/**
 * This is the model class for table "mst_template".
 *
 * The followings are the available columns in table 'mst_template':
 * @property string $id_mst_template
 * @property string $name_mst_template
 * @property string $create_at
 * @property string $iupdate_at
 */
class MasterTemplate extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mst_template';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name_mst_template, created_at, updated_at', 'required'),
			array('id_mst_template', 'numerical', 'integerOnly'=>true),
			array('name_mst_template', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_mst_template, name_mst_template, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'id_mst_template' => 'Type Voyage',
			'name_mst_template' => 'Name Master Template',
			'created_at' => 'Created Date',
			'updated_at' => 'Updated Date',
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

		$criteria->compare('id_mst_template',$this->id_mst_template,true);
		$criteria->compare('name_mst_template',$this->name_mst_template, true);
		$criteria->compare('created_at',$this->created_date);
		$criteria->compare('updated_at',$this->updated_date);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SchedulePlan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}
