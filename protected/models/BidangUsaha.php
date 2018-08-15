<?php

/**
 * This is the model class for table "bidang_usaha".
 *
 * The followings are the available columns in table 'bidang_usaha':
 * @property string $id_bidang_usaha
 * @property string $bidang_usaha
 */
class BidangUsaha extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bidang_usaha';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bidang_usaha', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_bidang_usaha, bidang_usaha', 'safe', 'on'=>'search'),
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
			'DataPerusahaan' => array(self::HAS_MANY, 'DataPerusahaan', 'id_bidang_usaha'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_bidang_usaha' => 'ID Bidang Usaha',
			'bidang_usaha' =>Yii::t('strings','Line of Business'),
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

		$criteria->compare('id_bidang_usaha',$this->id_bidang_usaha,true);
		$criteria->compare('bidang_usaha',$this->bidang_usaha,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BidangUsaha the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
