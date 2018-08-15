<?php

/**
 * This is the model class for table "po_category".
 *
 * The followings are the available columns in table 'po_category':
 * @property integer $id_po_category
 * @property string $code
 * @property string $category
 * @property string $category_name
 * @property integer $id_parent
 * @property integer $is_end_node
 * @property integer $level1
 * @property integer $level2
 * @property integer $level3
 * @property integer $num_level
 * @property string $auth
 * @property string $type_good_issue
 * @property string $dedicated_to
 * @property integer $lead_time_from_approval
 * @property string $request_by
 */
class PoCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PoCategory the static model class
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
		return 'po_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_po_category, code, category, category_name, id_parent, is_end_node, level1, level2, level3, num_level, auth, type_good_issue, dedicated_to, lead_time_from_approval, request_by', 'required'),
			array('id_po_category, id_parent, is_end_node, level1, level2, level3, num_level, lead_time_from_approval', 'numerical', 'integerOnly'=>true),
			array('code, request_by', 'length', 'max'=>50),
			array('category_name, auth', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_po_category, code, category, category_name, id_parent, is_end_node, level1, level2, level3, num_level, auth, type_good_issue, dedicated_to, lead_time_from_approval, request_by', 'safe', 'on'=>'search'),
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
			'id_po_category' => 'ID PO Category',
			'code' => 'Code',
			'category' => 'Category',
			'category_name' => 'Category Name',
			'id_parent' => 'ID Parent',
			'is_end_node' => 'Is End Node',
			'level1' => 'Level 1',
			'level2' => 'Level 2',
			'level3' => 'Level 3',
			'num_level' => 'Num Level',
			'auth' => 'Auth',
			'type_good_issue' => 'Type Good Issue',
			'dedicated_to' => 'Dedicated To',
			'lead_time_from_approval' => 'Lead Time From Approval',
			'request_by' => 'Request By',
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

		$criteria->compare('id_po_category',$this->id_po_category);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('category_name',$this->category_name,true);
		$criteria->compare('id_parent',$this->id_parent);
		$criteria->compare('is_end_node',$this->is_end_node);
		$criteria->compare('level1',$this->level1);
		$criteria->compare('level2',$this->level2);
		$criteria->compare('level3',$this->level3);
		$criteria->compare('num_level',$this->num_level);
		$criteria->compare('auth',$this->auth,true);
		$criteria->compare('type_good_issue',$this->type_good_issue,true);
		$criteria->compare('dedicated_to',$this->dedicated_to,true);
		$criteria->compare('lead_time_from_approval',$this->lead_time_from_approval);
		$criteria->compare('request_by',$this->request_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}