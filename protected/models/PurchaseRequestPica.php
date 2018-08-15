<?php

/**
 * This is the model class for table "purchase_request_pica".
 *
 * The followings are the available columns in table 'purchase_request_pica':
 * @property string $id_purchase_request_pica
 * @property string $id_purchase_request
 * @property string $problem
 * @property string $corrective_action
 * @property string $PIC
 * @property string $status_corrective
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class PurchaseRequestPica extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'purchase_request_pica';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('problem, corrective_action, PIC, status_corrective', 'required'),
			array('id_purchase_request', 'length', 'max'=>20),
			array('problem, PIC', 'length', 'max'=>250),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_purchase_request_pica, id_purchase_request, problem, corrective_action, PIC, status_corrective, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
			'id_purchase_request_pica' => 'Id Purchase Request Pica',
			'id_purchase_request' => 'Id Purchase Request',
			'problem' => 'Problem',
			'corrective_action' => 'Corrective Action',
			'PIC' => 'Pic',
			'status_corrective' => 'Status Corrective',
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

		$criteria->compare('id_purchase_request_pica',$this->id_purchase_request_pica,true);
		$criteria->compare('id_purchase_request',$this->id_purchase_request,true);
		$criteria->compare('problem',$this->problem,true);
		$criteria->compare('corrective_action',$this->corrective_action,true);
		$criteria->compare('PIC',$this->PIC,true);
		$criteria->compare('status_corrective',$this->status_corrective,true);
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
	 * @return PurchaseRequestPica the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
