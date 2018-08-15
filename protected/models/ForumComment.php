<?php

/**
 * This is the model class for table "forum_comment".
 *
 * The followings are the available columns in table 'forum_comment':
 * @property string $id_forum_comment
 * @property string $id_forum_topic
 * @property string $comment
 * @property string $userid
 * @property string $update_date
 * @property string $ip_address
 *
 * The followings are the available model relations:
 * @property ForumTopic $idForumTopic
 */
class ForumComment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $judul_topic;
	public function tableName()
	{
		return 'forum_comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_forum_topic, comment, userid, update_date, ip_address', 'required'),
			array('id_forum_topic', 'length', 'max'=>20),
			array('comment', 'length', 'max'=>1000),
			array('userid', 'length', 'max'=>45),
			array('ip_address', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_forum_comment, id_forum_topic, judul_topic, comment, userid, update_date, ip_address', 'safe', 'on'=>'search'),
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
			'ForumTopic' => array(self::BELONGS_TO, 'ForumTopic', 'id_forum_topic'),
			'user' => array(self::BELONGS_TO, 'Users', 'userid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_forum_comment' => 'ID Forum Comment',
			'id_forum_topic' => 'ID Forum Topic',
			'comment' =>Yii::t('strings','Comment'),
			'userid' => 'User ID',
			'update_date' =>Yii::t('strings','Updated Date'),
			'ip_address' => 'IP Address',
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
		$criteria->with=array('ForumTopic');
        $criteria->together=true;

		$criteria->compare('t.id_forum_comment',$this->id_forum_comment,true);
		$criteria->compare('t.id_forum_topic',$this->id_forum_topic,true);
		$criteria->compare('ForumTopic.judul_topic',$this->judul_topic,true);
		$criteria->compare('t.comment',$this->comment,true);
		$criteria->compare('t.userid',$this->userid,true);
		$criteria->compare('t.update_date',$this->update_date,true);
		$criteria->compare('t.ip_address',$this->ip_address,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'update_date DESC',
            'attributes'=>array(

              'judul_topic'=>array(
                 'asc'=>'ForumTopic.judul_topic ASC',
                 'desc'=>'ForumTopic.judul_topic DESC',
              ),


              '*',
          					),
        				),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ForumComment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
