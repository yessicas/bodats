<?php

/**
 * This is the model class for table "numbering_invoice".
 *
 * The followings are the available columns in table 'numbering_invoice':
 * @property string $id_numbering
 * @property string $number_invoice
 * @property string $status
 * @property string $notes
 * @property integer $is_initial
 * @property string $id_invoice_voyage
 * @property string $taken_date
 * @property string $user_taken
 * @property string $ip_user_taken
 */
class NumberingInvoice extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'numbering_invoice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('number_invoice, taken_date, user_taken, ip_user_taken', 'required'),
			array('is_initial', 'numerical', 'integerOnly'=>true),
			array('number_invoice, id_invoice_voyage', 'length', 'max'=>20),
			array('notes', 'length', 'max'=>250),
			array('user_taken', 'length', 'max'=>45),
			array('ip_user_taken', 'length', 'max'=>50),
			array('status', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_numbering, number_invoice, status, notes, is_initial, id_invoice_voyage, taken_date, user_taken, ip_user_taken', 'safe', 'on'=>'search'),
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
			'id_numbering' => 'Id Numbering',
			'number_invoice' => 'Invoice Number',
			'status' => 'Status',
			'notes' => 'Notes',
			'is_initial' => 'Is Initial',
			'id_invoice_voyage' => 'Id Invoice Voyage',
			'taken_date' => 'Taken Date',
			'user_taken' => 'User Taken',
			'ip_user_taken' => 'IP Address User Taken',
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

		$criteria->compare('id_numbering',$this->id_numbering,true);
		$criteria->compare('number_invoice',$this->number_invoice,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('is_initial',$this->is_initial);
		$criteria->compare('id_invoice_voyage',$this->id_invoice_voyage,true);
		$criteria->compare('taken_date',$this->taken_date,true);
		$criteria->compare('user_taken',$this->user_taken,true);
		$criteria->compare('ip_user_taken',$this->ip_user_taken,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>20,
   			),
			'sort'=>array(
				'defaultOrder'=>'number_invoice DESC',
        	),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NumberingInvoice the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
