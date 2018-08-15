<?php

/**
 * This is the model class for table "forum_topic".
 *
 * The followings are the available columns in table 'forum_topic':
 * @property string $id_forum_topic
 * @property string $code_id
 * @property string $id_forum_category
 * @property string $judul_topic
 * @property string $deskripsi
 * @property string $status
 * @property string $userid_created
 * @property string $created_date
 * @property string $ip_addr_created
 * @property integer $number_comment
 * @property integer $viewed
 * @property string $last_commented
 *
 * The followings are the available model relations:
 * @property ForumComment[] $forumComments
 * @property ForumCategory $idForumCategory
 */
class ForumTopic extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'forum_topic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public $forum_category;
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('id_forum_category, judul_topic, deskripsi, status, userid_created, created_date, ip_addr_created, number_comment, last_commented', 'required'),
			array('id_forum_category, judul_topic, deskripsi', 'required'),
			array('number_comment', 'numerical', 'integerOnly'=>true),
			array('id_forum_category', 'length', 'max'=>20),
			array('code_id', 'length', 'max'=>100),
			array('judul_topic', 'length', 'max'=>150),
			array('userid_created', 'length', 'max'=>45),
			array('ip_addr_created', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_forum_topic, code_id, id_forum_category,forum_category, judul_topic, deskripsi, status, userid_created, created_date, ip_addr_created, number_comment, viewed, last_commented', 'safe', 'on'=>'search'),
			array('id_forum_topic, code_id, id_forum_category,forum_category, judul_topic, deskripsi, status, userid_created, created_date, ip_addr_created, number_comment, viewed, last_commented', 'safe', 'on'=>'searchhottopic'),
			array('id_forum_topic, code_id, id_forum_category,forum_category, judul_topic, deskripsi, status, userid_created, created_date, ip_addr_created, number_comment, viewed, last_commented', 'safe', 'on'=>'searchalltopic'),
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
			'ForumComment' => array(self::HAS_MANY, 'ForumComment', 'id_forum_topic'),
			'ForumCategory' => array(self::BELONGS_TO, 'ForumCategory', 'id_forum_category'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_forum_topic' => 'ID Forum Topic',
			'code_id' => 'Code ID',
			'id_forum_category' =>Yii::t('strings','Forum Category'),
			'judul_topic' =>Yii::t('strings','Topic Title'),
			'deskripsi' => 'Deskripsi',
			'status' => 'Status',
			'userid_created' => 'User ID Created',
			'created_date' => 'Created Date',
			'ip_addr_created' => 'IP Addr Created',
			'number_comment' =>Yii::t('strings','Commented'),
			'viewed' =>Yii::t('strings','Viewed'),
			'last_commented' =>Yii::t('strings','Last Comments'),
			'forum_category'=>Yii::t('strings','Forum Category'),
			'update_date' =>Yii::t('strings','Updated Date'),
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
		$criteria->with=array('ForumCategory');
        $criteria->together=true;

		$criteria->compare('id_forum_topic',$this->id_forum_topic,true);
		$criteria->compare('code_id',$this->code_id,true);
		$criteria->compare('id_forum_category',$this->id_forum_category,true);
		$criteria->compare('ForumCategory.forum_category',$this->forum_category,true);
		$criteria->compare('judul_topic',$this->judul_topic,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('userid_created',$this->userid_created,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('ip_addr_created',$this->ip_addr_created,true);
		$criteria->compare('number_comment',$this->number_comment);
		$criteria->compare('viewed',$this->viewed);
		$criteria->compare('last_commented',$this->last_commented,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'created_date DESC',
            'attributes'=>array(

              'forum_category'=>array(
                 'asc'=>'ForumCategory.forum_category ASC',
                 'desc'=>'ForumCategory.forum_category DESC',
              ),

              '*',
          					),
        				),
		));
	}

	public function searchhottopic()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'status=:status';
		$criteria->params = array(':status'=>'OPEN');
		$criteria->with=array('ForumCategory');
        $criteria->together=true;

		$criteria->compare('id_forum_topic',$this->id_forum_topic,true);
		$criteria->compare('code_id',$this->code_id,true);
		$criteria->compare('id_forum_category',$this->id_forum_category,true);
		$criteria->compare('ForumCategory.forum_category',$this->forum_category,true);
		$criteria->compare('judul_topic',$this->judul_topic,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('userid_created',$this->userid_created,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('ip_addr_created',$this->ip_addr_created,true);
		$criteria->compare('number_comment',$this->number_comment);
		$criteria->compare('viewed',$this->viewed);
		$criteria->compare('last_commented',$this->last_commented,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'number_comment DESC',
            'attributes'=>array(

              'forum_category'=>array(
                 'asc'=>'ForumCategory.forum_category ASC',
                 'desc'=>'ForumCategory.forum_category DESC',
              ),

              '*',
          					),
        				),
		));
	}

	public function searchalltopic()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'status=:status';
		$criteria->params = array(':status'=>'OPEN');
		$criteria->with=array('ForumCategory');
        $criteria->together=true;

		$criteria->compare('id_forum_topic',$this->id_forum_topic,true);
		$criteria->compare('code_id',$this->code_id,true);
		$criteria->compare('id_forum_category',$this->id_forum_category,true);
		$criteria->compare('ForumCategory.forum_category',$this->forum_category,true);
		$criteria->compare('judul_topic',$this->judul_topic,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('userid_created',$this->userid_created,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('ip_addr_created',$this->ip_addr_created,true);
		$criteria->compare('number_comment',$this->number_comment);
		$criteria->compare('viewed',$this->viewed);
		$criteria->compare('last_commented',$this->last_commented,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'created_date DESC',
            'attributes'=>array(

              'forum_category'=>array(
                 'asc'=>'ForumCategory.forum_category ASC',
                 'desc'=>'ForumCategory.forum_category DESC',
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
	 * @return ForumTopic the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function userlastcomment($last_commented,$id_forum_topic)
	{
		$model=ForumComment::model()->findByAttributes(array('update_date'=>$last_commented,'id_forum_topic'=>$id_forum_topic));
	
	return $model->userid;

	}
}
