<?php

/**
 * This is the model class for table "account_coa".
 *
 * The followings are the available columns in table 'account_coa':
 * @property string $id_account_coa
 * @property string $account_name
 * @property string $account_name_id
 * @property string $id_account_coa_parent
 * @property integer $level
 */
class AccountCoa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AccountCoa the static model class
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
		return 'account_coa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_account_coa,account_name, account_name_id, id_account_coa_parent, level', 'required'),
			array('level', 'numerical', 'integerOnly'=>true),
			array('account_name, account_name_id', 'length', 'max'=>250),
			array('id_account_coa_parent', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_account_coa, account_name, account_name_id, id_account_coa_parent, level', 'safe', 'on'=>'search'),
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
			'id_account_coa' => 'ID Account COA',
			'account_name' => 'Account Name',
			'account_name_id' => 'ID Account Name',
			'id_account_coa_parent' => 'Account COA Parent',
			'level' => 'Level',
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

		$criteria->compare('id_account_coa',$this->id_account_coa,true);
		$criteria->compare('account_name',$this->account_name,true);
		$criteria->compare('account_name_id',$this->account_name_id,true);
		$criteria->compare('id_account_coa_parent',$this->id_account_coa_parent,true);
		$criteria->compare('level',$this->level);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}