<?php

/**
 * This is the model class for table "message_inbox".
 *
 * The followings are the available columns in table 'message_inbox':
 * @property string $id_inbox
 * @property string $code_id
 * @property string $to
 * @property string $from
 * @property string $title
 * @property string $message
 * @property string $date
 * @property string $status
 */
class MessageInbox extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MessageInbox the static model class
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
		return 'message_inbox';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('to_inbox, from_inbox, title, message, date, status', 'required'),
			array('to_inbox', 'length', 'max'=>32),
			array('from_inbox, title', 'length', 'max'=>250),
			array('code_id', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_inbox,code_id, to_inbox, from_inbox, title, message, date, status', 'safe', 'on'=>'search'),
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
			'touser' => array(self::BELONGS_TO, 'Users', 'to_inbox'),
			'fromuser' => array(self::BELONGS_TO, 'Users', 'from_inbox'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_inbox' => 'ID Inbox',
			'code_id' => 'Code ID',
			'to_inbox' => Yii::t('strings','To'),
			'from_inbox' => Yii::t('strings','From'),
			'title' => Yii::t('strings','Title'),
			'message' => Yii::t('strings','Message'),
			'date' => Yii::t('strings','Date'),
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($userid)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'to_inbox=:to_inbox';
		$criteria->params = array(':to_inbox'=>$userid);

		$criteria->compare('id_inbox',$this->id_inbox,true);
		$criteria->compare('code_id',$this->code_id,true);
		$criteria->compare('to_inbox',$this->to_inbox,true);
		$criteria->compare('from_inbox',$this->from_inbox,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'date DESC',
        				),
		));
	}

	public function cssReason() {
	if ($this->status == "in" || $this->status == "new") { //or any condition
	return "highlight"; //
	}
	else
	return "white";
	}
}