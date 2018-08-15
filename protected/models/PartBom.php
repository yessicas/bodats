<?php

/**
 * This is the model class for table "part_bom".
 *
 * The followings are the available columns in table 'part_bom':
 * @property string $id_part_bom
 * @property string $alias_name
 * @property string $code
 * @property integer $id_bom
 * @property string $id_part
 * @property string $id_part_parent
 * @property integer $quantity
 * @property string $metric
 */
class PartBom extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */


	public $PartName;
	public function tableName()
	{
		return 'part_bom';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('alias_name, code, id_bom, id_part, id_part_parent, quantity, metric', 'required'),
			array('id_bom, quantity', 'numerical', 'integerOnly'=>true),
			array('alias_name', 'length', 'max'=>250),
			array('code', 'length', 'max'=>150),
			array('id_part, id_part_parent, metric', 'length', 'max'=>20),
			array('PartName' , 'cekData'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_part_bom, alias_name, code, id_bom, id_part, id_part_parent, quantity, metric,PartName', 'safe', 'on'=>'search'),
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
			'bom' => array(self::BELONGS_TO, 'Bom', 'id_bom'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_part_bom' => 'Id Part Bom',
			'alias_name' => 'Alias Name',
			'code' => 'Code',
			'id_bom' => 'Bom',
			'id_part' => 'Part',
			'id_part_parent' => 'Part Parent',
			'quantity' => 'Quantity',
			'metric' => 'Metric',
			'PartName'=>'Part',
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

		$criteria->compare('id_part_bom',$this->id_part_bom,true);
		$criteria->compare('alias_name',$this->alias_name,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('id_bom',$this->id_bom);
		//$criteria->compare('id_part',$this->id_part,true);
		$criteria->compare('id_part.PartName',$this->PartName);
		$criteria->compare('id_part_parent',$this->id_part_parent,true);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('metric',$this->metric,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PartBom the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function cekData()
	{

		$model = PartBom::model()->findByAttributes(array('alias_name'=>$this->PartName,'id_part'=>$this->id_part));
		if ($model==false)
			 $this->addError('Part', 'Part Not Exist') ;// validasi model gagal sehingga perintah save() akan dibatalkan.

	}
}
