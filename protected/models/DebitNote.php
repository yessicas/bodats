<?php

/**
 * This is the model class for table "debit_note".
 *
 * The followings are the available columns in table 'debit_note':
 * @property string $id_debit_note
 * @property string $id_voyage_order
 * @property string $transaction_date
 * @property double $amount
 * @property integer $id_currency
 * @property integer $id_debit_note_category
 * @property string $description
 * @property string $omitted_status
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class DebitNote extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'debit_note';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_voyage_order, transaction_date, amount, id_currency, id_debit_note_category, description, omitted_status, created_date, created_user, ip_user_updated', 'required'),
			array('id_currency, id_debit_note_category', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('id_voyage_order', 'length', 'max'=>20),
			array('description', 'length', 'max'=>250),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_debit_note, id_voyage_order, transaction_date, amount, id_currency, id_debit_note_category, description, omitted_status, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
			array('id_debit_note, id_voyage_order, transaction_date, amount, id_currency, id_debit_note_category, description, omitted_status, created_date, created_user, ip_user_updated', 'safe', 'on'=>'searchbyVoyage'),
		
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
		'MstDebitNoteCategory' => array(self::BELONGS_TO, 'MstDebitNoteCategory', 'id_debit_note_category'),
		'Currency' => array(self::BELONGS_TO, 'Currency', 'id_currency'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_debit_note' => 'Id Debit Note',
			'id_voyage_order' => 'Id Voyage Order',
			'transaction_date' => 'Date',
			'amount' => 'Amount',
			'id_currency' => 'Id Currency',
			'id_debit_note_category' => 'Debit Note Category',
			'description' => 'Description',
			'omitted_status' => 'Status',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'ip_user_updated' => 'Ip User Updated',
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

		$criteria->compare('id_debit_note',$this->id_debit_note,true);
		$criteria->compare('id_voyage_order',$this->id_voyage_order,true);
		$criteria->compare('transaction_date',$this->transaction_date,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('id_currency',$this->id_currency);
		$criteria->compare('id_debit_note_category',$this->id_debit_note_category);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('omitted_status',$this->omitted_status,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchbyVoyage($id_voyage_order)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'id_voyage_order=:id_voyage_order';
		$criteria->params = array(':id_voyage_order'=>$id_voyage_order);

		$criteria->compare('id_debit_note',$this->id_debit_note,true);
		$criteria->compare('id_voyage_order',$this->id_voyage_order,true);
		$criteria->compare('transaction_date',$this->transaction_date,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('id_currency',$this->id_currency);
		$criteria->compare('id_debit_note_category',$this->id_debit_note_category);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('omitted_status',$this->omitted_status,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'transaction_date ASC',
        				),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DebitNote the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
