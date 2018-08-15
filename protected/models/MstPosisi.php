<?php

/**
 * This is the model class for table "mst_posisi".
 *
 * The followings are the available columns in table 'mst_posisi':
 * @property string $id_posisi
 * @property string $nama_posisi
 * @property string $userid
 * @property string $time_update
 *
 * The followings are the available model relations:
 * @property RecruitOpenDetail[] $recruitOpenDetails
 */
class MstPosisi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mst_posisi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_posisi, userid, time_update', 'required'),
			array('nama_posisi', 'length', 'max'=>150),
			array('userid', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_posisi, nama_posisi, userid, time_update', 'safe', 'on'=>'search'),
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
			'RecruitOpenDetail' => array(self::HAS_MANY, 'RecruitOpenDetail', 'id_posisi'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_posisi' =>Yii::t('strings','ID Position'),
			'nama_posisi' => Yii::t('strings','Position Name'),
			'userid' => 'Userid',
			'time_update' =>Yii::t('strings','Time Update'),
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

		$criteria->compare('id_posisi',$this->id_posisi,true);
		$criteria->compare('nama_posisi',$this->nama_posisi,true);
		$criteria->compare('userid',$this->userid,true);
		$criteria->compare('time_update',$this->time_update,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MstPosisi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
