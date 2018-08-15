<?php

/**
 * This is the model class for table "numbering_faktur_firstnumber".
 *
 * The followings are the available columns in table 'numbering_faktur_firstnumber':
 * @property string $id_numbering_faktur_first
 * @property string $first_number
 * @property string $last_number
 * @property string $create_date
 * @property string $user_create
 * @property string $ip_user_create
 */
class NumberingFakturFirstnumber extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'numbering_faktur_firstnumber';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_number, last_number, create_date, user_create, ip_user_create', 'required'),
			array('first_number', 'length', 'max'=>150),
			array('last_number', 'length', 'max'=>20),
			array('user_create', 'length', 'max'=>45),
			array('ip_user_create', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_numbering_faktur_first, first_number, last_number, create_date, user_create, ip_user_create', 'safe', 'on'=>'search'),
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
			'id_numbering_faktur_first' => 'Id Numbering Faktur First',
			'first_number' => 'First Number',
			'last_number' => 'Last Number',
			'create_date' => 'Create Date',
			'user_create' => 'User Create',
			'ip_user_create' => 'Ip User Create',
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

		$criteria->compare('id_numbering_faktur_first',$this->id_numbering_faktur_first,true);
		$criteria->compare('first_number',$this->first_number,true);
		$criteria->compare('last_number',$this->last_number,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('user_create',$this->user_create,true);
		$criteria->compare('ip_user_create',$this->ip_user_create,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NumberingFakturFirstnumber the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
