<?php

/**
 * This is the model class for table "message_outbox".
 *
 * The followings are the available columns in table 'message_outbox':
 * @property string $id_outbox
 * @property string $code_id
 * @property string $to
 * @property string $from
 * @property string $title
 * @property string $message
 * @property string $date
 * @property string $status
 */
class MessageOutbox extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MessageOutbox the static model class
	 */
	

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'message_outbox';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('to_outbox, from_outbox, title, message, date', 'required'),
			array('to_outbox', 'length', 'max'=>32),
			array('from_outbox, title', 'length', 'max'=>250),
			array('code_id', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_outbox, code_id, to_outbox, from_outbox, title, message, date, status', 'safe', 'on'=>'search'),
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
			'touser' => array(self::BELONGS_TO, 'Users', 'to_outbox'),
			'fromuser' => array(self::BELONGS_TO, 'Users', 'from_outbox'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_outbox' => 'ID Outbox',
			'code_id' => 'Code ID',
			'to_outbox' => Yii::t('strings','To'),
			'from_outbox' => Yii::t('strings','From'),
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
		$criteria->condition = 'from_outbox=:from_outbox';
		$criteria->params = array(':from_outbox'=>$userid);

		$criteria->compare('id_outbox',$this->id_outbox,true);
		$criteria->compare('code_id',$this->code_id,true);
		$criteria->compare('to_outbox',$this->to_outbox,true);
		$criteria->compare('from_outbox',$this->from_outbox,true);
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

	

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}