<?php

/**
 * This is the model class for table "bom".
 *
 * The followings are the available columns in table 'bom':
 * @property integer $id_bom
 * @property string $bom_name
 * @property string $description
 * @property string $id_part_root
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class Bom extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $PartName;
	public function tableName()
	{
		return 'bom';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description, created_date, created_user, ip_user_updated,bom_name', 'required'),
			array('bom_name', 'length', 'max'=>250),
			array('id_part_root', 'length', 'max'=>11),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),
			array('PartName' , 'cekData'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_bom, bom_name, description, id_part_root, created_date, created_user, ip_user_updated,PartName', 'safe', 'on'=>'search'),
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
			'part' => array(self::BELONGS_TO, 'Part', 'id_part_root'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_bom' => 'Id Bom',
			'bom_name' => 'Bom Name',
			'description' => 'Description',
			'id_part_root' => 'Id Part Root',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'ip_user_updated' => 'Ip User Updated',
			'PartName'=>'Part Root',
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

		$criteria->compare('id_bom',$this->id_bom);
		$criteria->compare('bom_name',$this->bom_name,true);
		$criteria->compare('description',$this->description,true);
		//$criteria->compare('id_part_root',$this->id_part_root,true);
		$criteria->compare('id_part_root.PartName',$this->PartName);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Bom the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function cekData()
	{

		$model = Part::model()->findByAttributes(array('PartName'=>$this->PartName,'id_part'=>$this->id_part_root));
		if ($model==false)
			 $this->addError('PartName', 'Part Not Exist') ;// validasi model gagal sehingga perintah save() akan dibatalkan.

	}
}
