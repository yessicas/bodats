<?php

/**
 * This is the model class for table "article_subtopic".
 *
 * The followings are the available columns in table 'article_subtopic':
 * @property string $IDSubtitle
 * @property string $SubtitleTopic
 * @property string $TopicTanggalUpdate
 * @property integer $StatusActive
 */
class ArticleSubtopic extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'article_subtopic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IDSubtitle, SubtitleTopic, TopicTanggalUpdate', 'required'),
			array('StatusActive', 'numerical', 'integerOnly'=>true),
			array('IDSubtitle', 'length', 'max'=>21),
			array('SubtitleTopic', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IDSubtitle, SubtitleTopic, TopicTanggalUpdate, StatusActive', 'safe', 'on'=>'search'),
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
			'IDSubtitle' => 'ID Subtitle',
			'SubtitleTopic' =>  Yii::t('strings','Subtitle Topic'),
			'TopicTanggalUpdate' => 'Topic Tanggal Update',
			'StatusActive' => 'Status Active',
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

		$criteria->compare('IDSubtitle',$this->IDSubtitle,true);
		$criteria->compare('SubtitleTopic',$this->SubtitleTopic,true);
		$criteria->compare('TopicTanggalUpdate',$this->TopicTanggalUpdate,true);
		$criteria->compare('StatusActive',$this->StatusActive);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ArticleSubtopic the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
