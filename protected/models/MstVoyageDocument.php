<?php

/**
 * This is the model class for table "mst_voyage_document".
 *
 * The followings are the available columns in table 'mst_voyage_document':
 * @property integer $IdVoyageDocument
 * @property string $DocumentName
 * @property integer $IsClosedVoyageDocument
 */
class MstVoyageDocument extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mst_voyage_document';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IdVoyageDocument, DocumentName, IsClosedVoyageDocument', 'required'),
			array('IdVoyageDocument, IsClosedVoyageDocument', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdVoyageDocument, DocumentName, IsClosedVoyageDocument', 'safe', 'on'=>'search'),
			array('IdVoyageDocument, DocumentName, IsClosedVoyageDocument', 'safe', 'on'=>'searchbyclosedvoyage'),
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

	public function isclosed($input)

 {

if($input == '1')

return "Yes";

else if ($input == '0')

return "No";

}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdVoyageDocument' => 'ID Voyage Document',
			'DocumentName' => 'Document Name',
			'IsClosedVoyageDocument' => 'Is Closed Voyage Document',
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

		$criteria->compare('IdVoyageDocument',$this->IdVoyageDocument);
		$criteria->compare('DocumentName',$this->DocumentName,true);
		$criteria->compare('IsClosedVoyageDocument',$this->IsClosedVoyageDocument);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchbyclosedvoyage()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'IsClosedVoyageDocument=:IsClosedVoyageDocument';
		$criteria->params = array(':IsClosedVoyageDocument'=>1);

		$criteria->compare('IdVoyageDocument',$this->IdVoyageDocument);
		$criteria->compare('DocumentName',$this->DocumentName,true);
		$criteria->compare('IsClosedVoyageDocument',$this->IsClosedVoyageDocument);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MstVoyageDocument the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
