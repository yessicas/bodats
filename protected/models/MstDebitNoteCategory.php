<?php

/**
 * This is the model class for table "mst_debit_note_category".
 *
 * The followings are the available columns in table 'mst_debit_note_category':
 * @property integer $id_debit_note_category
 * @property string $debit_note_category
 * @property integer $is_active
 */
class MstDebitNoteCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MstDebitNoteCategory the static model class
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
		return 'mst_debit_note_category';
	}
	

	public function statusAktiv($input)
	{
		if($input == '1')

		return "Yes";

		else if ($input == '0')

		return "No";
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('debit_note_category, is_active', 'required'),
			array('is_active', 'numerical', 'integerOnly'=>true),
			array('debit_note_category', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_debit_note_category, debit_note_category, is_active', 'safe', 'on'=>'search'),
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
			'id_debit_note_category' => 'Id Debit Note Category',
			'debit_note_category' => 'Debit Note Category',
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

		$criteria->compare('id_debit_note_category',$this->id_debit_note_category);
		$criteria->compare('debit_note_category',$this->debit_note_category,true);
		$criteria->compare('is_active',$this->is_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}