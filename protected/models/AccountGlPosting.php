<?php

/**
 * This is the model class for table "account_gl_posting".
 *
 * The followings are the available columns in table 'account_gl_posting':
 * @property string $id_gl_posting
 * @property string $id_account_gl
 * @property integer $pair_number
 * @property string $posting_date
 * @property string $description
 * @property double $amount
 * @property integer $id_currency
 * @property string $drcr
 * @property integer $ref
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class AccountGlPosting extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AccountGlPosting the static model class
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
		return 'account_gl_posting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_account_gl, pair_number, posting_date, description, amount, id_currency, drcr, ref', 'required'),
			array('pair_number, id_currency, ref', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('id_account_gl', 'length', 'max'=>20),
			array('description', 'length', 'max'=>250),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_gl_posting, id_account_gl, pair_number, posting_date, description, amount, id_currency, drcr, ref, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
			'Accgl' => array(self::BELONGS_TO, 'AccountGl', 'id_account_gl'),
			'Uang' => array(self::BELONGS_TO, 'Currency', 'id_currency'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_gl_posting' => 'ID GL Posting',
			'id_account_gl' => 'Account GL',
			'pair_number' => 'Pair Number',
			'posting_date' => 'Posting Date',
			'description' => 'Description',
			'amount' => 'Amount',
			'id_currency' => 'Currency',
			'drcr' => 'Drcr',
			'ref' => 'Ref',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'ip_user_updated' => 'IP User Updated',
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

		$criteria->compare('id_gl_posting',$this->id_gl_posting,true);
		$criteria->compare('id_account_gl',$this->id_account_gl,true);
		$criteria->compare('pair_number',$this->pair_number);
		$criteria->compare('posting_date',$this->posting_date,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('id_currency',$this->id_currency);
		$criteria->compare('drcr',$this->drcr,true);
		$criteria->compare('ref',$this->ref);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}