<?php

/**
 * This is the model class for table "notification".
 *
 * The followings are the available columns in table 'notification':
 * @property string $id_notification
 * @property string $code_id
 * @property string $userid
 * @property string $notif_date
 * @property string $notif_message
 * @property string $notif_tittle
 * @property string $notif_status
 * @property string $grade
 */
class Notification extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'notification';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code_id, userid, notif_date, notif_message, notif_tittle, notif_status', 'required'),
			array('userid', 'length', 'max'=>45),
			array('notif_tittle', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_notification, code_id, userid, notif_date, notif_message, notif_tittle, notif_status, grade', 'safe', 'on'=>'search'),
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
			'id_notification' => 'ID Notification',
			'code_id' => 'Code ID',
			'userid' => 'Userid',
			'notif_date' => 'Notif Date',
			'notif_message' => 'Notif Message',
			'notif_tittle' => 'Notif Tittle',
			'notif_status' => 'Notif Status',
			'grade' => 'Grade',
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

		$criteria->compare('id_notification',$this->id_notification,true);
		$criteria->compare('code_id',$this->code_id,true);
		$criteria->compare('userid',$this->userid,true);
		$criteria->compare('notif_date',$this->notif_date,true);
		$criteria->compare('notif_message',$this->notif_message,true);
		$criteria->compare('notif_tittle',$this->notif_tittle,true);
		$criteria->compare('notif_status',$this->notif_status,true);
		$criteria->compare('grade',$this->grade,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Notification the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
