<?php

/**
 * This is the model class for table "crew_signon".
 *
 * The followings are the available columns in table 'crew_signon':
 * @property string $id_crew_signon
 * @property integer $vessel_id
 * @property integer $CrewId
 * @property string $sign_date
 * @property string $status_sign
 * @property string $notes
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class CrewSignon extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'crew_signon';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vessel_id, CrewId, sign_date, status_sign, created_date, created_user, ip_user_updated', 'required'),
			array('vessel_id, CrewId', 'numerical', 'integerOnly'=>true),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_crew_signon, vessel_id, CrewId, sign_date, status_sign, notes, created_date, created_user, ip_user_updated', 'safe', 'on'=>'search'),
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
			'id_crew_signon' => 'ID Crew Sign On',
			'vessel_id' => 'Vessel',
			'CrewId' => 'Crew',
			'sign_date' => 'Sign Date',
			'status_sign' => 'Status Sign',
			'notes' => 'Notes',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'ip_user_updated' => 'ID User Updated',
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

		$criteria->compare('id_crew_signon',$this->id_crew_signon,true);
		$criteria->compare('vessel_id',$this->vessel_id);
		$criteria->compare('CrewId',$this->CrewId);
		$criteria->compare('sign_date',$this->sign_date,true);
		$criteria->compare('status_sign',$this->status_sign,true);
		$criteria->compare('notes',$this->notes,true);
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
	 * @return CrewSignon the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
