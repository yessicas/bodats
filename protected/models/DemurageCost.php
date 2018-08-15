<?php

/**
 * This is the model class for table "demurage_cost".
 *
 * The followings are the available columns in table 'demurage_cost':
 * @property string $id_demurage_cost
 * @property string $id_voyage_order
 * @property string $transaction_date
 * @property string $description
 * @property double $amount
 * @property integer $is_invoice_created
 * @property string $invoice_number
 * @property string $id_invoice_voyage
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class DemurageCost extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'demurage_cost';
	}



	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_voyage_order, transaction_date, amount, created_date, created_user, ip_user_updated', 'required'),
			array('is_invoice_created', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('id_voyage_order, id_invoice_voyage', 'length', 'max'=>20),
			array('description', 'length', 'max'=>250),
			array('invoice_number', 'length', 'max'=>100),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_demurage_cost, id_voyage_order, transaction_date, description, amount, is_invoice_created, invoice_number, id_invoice_voyage, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
		);
	}


	public function status($input)
	{
		if($input == '1')

		return "Yes";

		else if ($input == '0')

		return "No";
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'voyage' => array(self::BELONGS_TO, 'VoyageOrder', 'id_voyage_order'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_demurage_cost' => 'Id Demurage Cost',
			'id_voyage_order' => 'Id Voyage Order',
			'transaction_date' => 'Transaction Date',
			'description' => 'Description',
			'amount' => 'Amount',
			'is_invoice_created' => 'Is Invoice Created',
			'invoice_number' => 'Invoice Number',
			'id_invoice_voyage' => 'Id Invoice Voyage',
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

		$criteria->compare('id_demurage_cost',$this->id_demurage_cost,true);
		$criteria->compare('id_voyage_order',$this->id_voyage_order,true);
		$criteria->compare('transaction_date',$this->transaction_date,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('is_invoice_created',$this->is_invoice_created);
		$criteria->compare('invoice_number',$this->invoice_number,true);
		$criteria->compare('id_invoice_voyage',$this->id_invoice_voyage,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DemurageCost the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function getDemurageCostStatus($id_voyage_order){
		$model = DemurageCost::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order));
		if($model!= null){
			return true;
		}
		
		return false;
	}
	
	public static function getDemurageCostValue($id_voyage_order){
		$model = DemurageCost::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order));
		if($model!= null){
			return $model;
		}
		
		return 0;
	}
}
