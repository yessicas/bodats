<?php

/**
 * This is the model class for table "voyage_cost_actual".
 *
 * The followings are the available columns in table 'voyage_cost_actual':
 * @property string $id_voyage_cost_actual
 * @property string $id_voyage_order
 * @property integer $id_cost_item_actual
 * @property double $amount
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class VoyageCostActual extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'voyage_cost_actual';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_voyage_order, id_cost_item_actual, amount, created_date, created_user, ip_user_updated', 'required'),
			array('id_cost_item_actual', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('id_voyage_order', 'length', 'max'=>20),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_voyage_cost_actual, id_voyage_order, id_cost_item_actual, amount, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
			'CostItemActual' => array(self::BELONGS_TO, 'CostItemActual', 'id_cost_item_actual'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_voyage_cost_actual' => 'Id Voyage Cost Actual',
			'id_voyage_order' => 'Id Voyage Order',
			'id_cost_item_actual' => 'Id Cost Item Actual',
			'amount' => 'Amount',
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

		$criteria->compare('id_voyage_cost_actual',$this->id_voyage_cost_actual,true);
		$criteria->compare('id_voyage_order',$this->id_voyage_order,true);
		$criteria->compare('id_cost_item_actual',$this->id_cost_item_actual);
		$criteria->compare('amount',$this->amount);
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
	 * @return VoyageCostActual the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
