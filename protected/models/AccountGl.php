<?php

/**
 * This is the model class for table "account_gl".
 *
 * The followings are the available columns in table 'account_gl':
 * @property string $id_account_gl
 * @property integer $coa_level1
 * @property integer $coa_level2
 * @property integer $coa_level3
 * @property string $gl_number
 * @property string $gl_name
 */
class AccountGl extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AccountGl the static model class
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
		return 'account_gl';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('coa_level1, coa_level2, coa_level3, gl_number, gl_name', 'required'),
			array('coa_level1, coa_level2, coa_level3', 'numerical', 'integerOnly'=>true),
			array('gl_number', 'length', 'max'=>20),
			array('gl_name', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_account_gl, coa_level1, coa_level2, coa_level3, gl_number, gl_name', 'safe', 'on'=>'search'),
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
				'Gllevel1' => array(self::BELONGS_TO, 'AccountCoa', 'coa_level1'),
				'Gllevel2' => array(self::BELONGS_TO, 'AccountCoa', 'coa_level2'),
				'Gllevel3' => array(self::BELONGS_TO, 'AccountCoa', 'coa_level3'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_account_gl' => 'ID Account GL',
			'coa_level1' => 'COA Level 1',
			'coa_level2' => 'COA Level 2',
			'coa_level3' => 'COA Level 3',
			'gl_number' => 'GL Number',
			'gl_name' => 'GL Name',
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

		$criteria->compare('id_account_gl',$this->id_account_gl,true);
		$criteria->compare('coa_level1',$this->coa_level1);
		$criteria->compare('coa_level2',$this->coa_level2);
		$criteria->compare('coa_level3',$this->coa_level3);
		$criteria->compare('gl_number',$this->gl_number,true);
		$criteria->compare('gl_name',$this->gl_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}