<?php

/**
 * This is the model class for table "mst_metric_pr".
 *
 * The followings are the available columns in table 'mst_metric_pr':
 * @property string $metric
 * @property string $metric_name
 * @property integer $id_po_category
 * @property string $description
 */
class MstMetricPr extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MstMetricPr the static model class
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
		return 'mst_metric_pr';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('metric, metric_name, id_po_category, description', 'required'),
			array('id_po_category', 'numerical', 'integerOnly'=>true),
			array('metric', 'length', 'max'=>20),
			array('metric_name', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('metric, metric_name, id_po_category, description', 'safe', 'on'=>'search'),
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
			'kategori' => array(self::BELONGS_TO, 'PoCategory', 'id_po_category'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'metric' => 'Metric',
			'metric_name' => 'Metric Name',
			'id_po_category' => 'PO Category',
			'description' => 'Description',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('metric',$this->metric,true);
		$criteria->compare('metric_name',$this->metric_name,true);
		$criteria->compare('id_po_category',$this->id_po_category);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}