<?php

/**
 * This is the model class for table "standard_agency_item".
 *
 * The followings are the available columns in table 'standard_agency_item':
 * @property string $id_standard_agency_item
 * @property integer $id_standard_agency
 * @property integer $id_agency_item
 * @property string $description
 * @property double $agency_fix_cost
 * @property double $agency_var_cost
 * @property integer $id_currency
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class StandardAgencyItem extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'standard_agency_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_standard_agency, id_agency_item, description, id_currency, created_date, created_user, ip_user_updated, unit_price, type, quantity, metric', 'required'),
			array('id_standard_agency, id_agency_item, id_currency, quantity', 'numerical', 'integerOnly'=>true),
			array('agency_fix_cost, agency_var_cost, unit_price', 'numerical'),
			array('description', 'length', 'max'=>200),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_standard_agency_item, id_standard_agency, id_agency_item, description, agency_fix_cost, agency_var_cost, id_currency, created_date, created_user, ip_user_updated, unit_price, type, quantity, metric', 'safe', 'on'=>'search'),
			array('id_standard_agency_item, id_standard_agency, id_agency_item, description, agency_fix_cost, agency_var_cost, id_currency, created_date, created_user, ip_user_updated, unit_price, type, quantity, metric', 'safe', 'on'=>'searchbyagency'),
		
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
			'StandardAgency' => array(self::BELONGS_TO, 'StandardAgency', 'id_standard_agency'),
			'Currency' => array(self::BELONGS_TO, 'Currency', 'id_currency'),
			'AgencyItem' => array(self::BELONGS_TO, 'AgencyItem', 'id_agency_item'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_standard_agency_item' => 'ID Standard Agency Item',
			'id_standard_agency' => 'ID Standard Agency',
			'id_agency_item' => 'Item Agency',
			'description' => 'Description',
			'agency_fix_cost' => 'Agency Fix Cost',
			'agency_var_cost' => 'Agency Var Cost',
			'id_currency' => 'Currency',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'ip_user_updated' => 'IP User Updated',
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

		$criteria->compare('id_standard_agency_item',$this->id_standard_agency_item,true);
		$criteria->compare('id_standard_agency',$this->id_standard_agency);
		$criteria->compare('id_agency_item',$this->id_agency_item);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('agency_fix_cost',$this->agency_fix_cost);
		$criteria->compare('agency_var_cost',$this->agency_var_cost);
		$criteria->compare('id_currency',$this->id_currency);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchbyagency($id_standard_agency)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'id_standard_agency = :id_standard_agency';
		$criteria->params = array(':id_standard_agency'=>$id_standard_agency);


		$criteria->compare('id_standard_agency_item',$this->id_standard_agency_item,true);
		$criteria->compare('id_standard_agency',$this->id_standard_agency);
		$criteria->compare('id_agency_item',$this->id_agency_item);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('agency_fix_cost',$this->agency_fix_cost);
		$criteria->compare('agency_var_cost',$this->agency_var_cost);
		$criteria->compare('id_currency',$this->id_currency);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>false,
			'sort'=>array('defaultOrder'=>'type ASC'),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StandardAgencyItem the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
