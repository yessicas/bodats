<?php

/**
 * This is the model class for table "broadcast_notification".
 *
 * The followings are the available columns in table 'broadcast_notification':
 * @property string $id_broadcast_notif
 * @property string $userid
 * @property string $current_date
 * @property string $message
 * @property string $url
 * @property string $broadcaster
 */
class BroadcastNotification extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BroadcastNotification the static model class
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
		return 'broadcast_notification';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userid, current_date, message, url, broadcaster', 'required'),
			array('userid, message, url, broadcaster', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_broadcast_notif, userid, current_date, message, url, broadcaster', 'safe', 'on'=>'search'),
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
			'id_broadcast_notif' => 'ID Broadcast Notif',
			'userid' => 'User ID',
			'current_date' => 'Current Date',
			'message' => 'Message',
			'url' => 'Url',
			'broadcaster' => 'Broadcaster',
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

		$criteria->compare('id_broadcast_notif',$this->id_broadcast_notif,true);
		$criteria->compare('userid',$this->userid,true);
		$criteria->compare('current_date',$this->current_date,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('broadcaster',$this->broadcaster,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}