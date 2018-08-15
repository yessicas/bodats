<?php

/**
 * This is the model class for table "numbering_faktur_allocation".
 *
 * The followings are the available columns in table 'numbering_faktur_allocation':
 * @property string $id_numbering_faktur_allocation
 * @property integer $is_active
 * @property string $first_number
 * @property string $last_number
 * @property string $prefix_number
 * @property integer $first_number_int
 * @property integer $last_number_int
 * @property string $create_date
 * @property string $user_create
 * @property string $ip_user_create
 */
class NumberingFakturAllocation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'numbering_faktur_allocation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_number, last_number, allocation_date, prefix_number, first_number_int, last_number_int, create_date, user_create, ip_user_create', 'required'),
			array('is_active, first_number_int, last_number_int', 'numerical', 'integerOnly'=>true),
			array('first_number, last_number, prefix_number', 'length', 'max'=>100),
			array('user_create', 'length', 'max'=>45),
			array('ip_user_create', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_numbering_faktur_allocation, is_active, first_number, last_number, prefix_number, first_number_int, last_number_int, create_date, user_create, ip_user_create', 'safe', 'on'=>'search'),
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
			'id_numbering_faktur_allocation' => 'Id Numbering Faktur Allocation',
			'is_active' => 'Status',
			'first_number' => 'First Number',
			'last_number' => 'Last Number',
			'prefix_number' => 'Prefix Number',
			'first_number_int' => 'First Number Int',
			'last_number_int' => 'Last Number Int',
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

		$criteria->compare('id_numbering_faktur_allocation',$this->id_numbering_faktur_allocation,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('first_number',$this->first_number,true);
		$criteria->compare('last_number',$this->last_number,true);
		$criteria->compare('prefix_number',$this->prefix_number,true);
		$criteria->compare('first_number_int',$this->first_number_int);
		$criteria->compare('last_number_int',$this->last_number_int);
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
	 * @return NumberingFakturAllocation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	  public function getYesNo()
    {
        return array(
            0=>'No',
            1=>'Yes',
            );
    }

    public function getYesNoStr($val)
    {
        if ($val==0)
        {
            return 'No';
        }
        else if ($val==1)
        {
            return 'Yes';
        }
    }
	
}
