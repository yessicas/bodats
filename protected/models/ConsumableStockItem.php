<?php

/**
 * This is the model class for table "consumable_stock_item".
 *
 * The followings are the available columns in table 'consumable_stock_item':
 * @property string $id_consumable_stock_item
 * @property integer $id_po_category
 * @property string $consumable_stock_category
 * @property string $consumable_stock_item
 * @property string $parent_level1
 * @property string $parent_level2
 * @property string $parent_level3
 * @property string $serial_number
 * @property string $description
 * @property double $estimated_unit_price
 * @property string $metric
 * @property string $category
 * @property string $impa
 */
class ConsumableStockItem extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'consumable_stock_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('id_po_category, consumable_stock_category, consumable_stock_item, parent_level1, parent_level2, parent_level3, serial_number, description, estimated_unit_price, metric, category, impa', 'required'),
			array('consumable_stock_category, category, consumable_stock_item, serial_number, metric', 'required'),
			array('id_po_category', 'numerical', 'integerOnly'=>true),
			array('estimated_unit_price', 'numerical'),
			array('consumable_stock_item, parent_level1, parent_level2, parent_level3', 'length', 'max'=>250),
			array('serial_number', 'length', 'max'=>150),
			array('description', 'length', 'max'=>800),
			array('metric', 'length', 'max'=>20),
			array('impa', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_consumable_stock_item, id_po_category, consumable_stock_category, consumable_stock_item, parent_level1, parent_level2, parent_level3, serial_number, description, estimated_unit_price, metric, category, impa', 'safe', 'on'=>'search'),
			array('id_consumable_stock_item, id_po_category, consumable_stock_category, consumable_stock_item, parent_level1, parent_level2, parent_level3, serial_number, description, estimated_unit_price, metric', 'safe', 'on'=>'searchByPo'),
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
			'po' => array(self::BELONGS_TO, 'PoCategory', 'id_po_category'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_consumable_stock_item' => 'Id Consumable Stock Item',
			'id_po_category' => 'Po Category',
			'consumable_stock_category' => 'Level',
			'consumable_stock_item' => 'Item Name',
			'parent_level1' => 'Parent Level1',
			'parent_level2' => 'Parent Level2',
			'parent_level3' => 'Parent Level3',
			'serial_number' => 'Serial Number',
			'description' => 'Description',
			'estimated_unit_price' => 'Estimated Unit Price',
			'metric' => 'Metric',
			'category' => 'Category',
			'impa' => 'IMPA',
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

		$criteria->compare('id_consumable_stock_item',$this->id_consumable_stock_item,true);
		$criteria->compare('id_po_category',$this->id_po_category);
		$criteria->compare('consumable_stock_category',$this->consumable_stock_category,true);
		$criteria->compare('consumable_stock_item',$this->consumable_stock_item,true);
		$criteria->compare('parent_level1',$this->parent_level1,true);
		$criteria->compare('parent_level2',$this->parent_level2,true);
		$criteria->compare('parent_level3',$this->parent_level3,true);
		$criteria->compare('serial_number',$this->serial_number,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('estimated_unit_price',$this->estimated_unit_price);
		$criteria->compare('metric',$this->metric,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('impa',$this->impa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
        	'pageSize'=>15,
   								 ),
		));
	}
	
	public function searchByPo()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->alias = 'i';

		$criteria->compare('id_consumable_stock_item',$this->id_consumable_stock_item,true);
		$criteria->compare('id_po_category',$this->id_po_category);
		$criteria->compare('consumable_stock_category',$this->consumable_stock_category,true);
		$criteria->compare('consumable_stock_item',$this->consumable_stock_item,true);
		$criteria->compare('parent_level1',$this->parent_level1,true);
		$criteria->compare('parent_level2',$this->parent_level2,true);
		$criteria->compare('parent_level3',$this->parent_level3,true);
		$criteria->compare('serial_number',$this->serial_number,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('estimated_unit_price',$this->estimated_unit_price);
		$criteria->compare('metric',$this->metric,true);

		$criteria->join= 'JOIN po_category d ON ( i.id_po_category=d.id_po_category)';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
        	'pageSize'=>15,
   								 ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ConsumableStockItem the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function getComboListCS(){
		$items = ConsumableStockItem::model()->findAll(array('order'=>'consumable_stock_item ASC'));
		$LIST_RESULT = array();
		foreach($items as $item){
			$LIST_RESULT[$item->id_consumable_stock_item] = $item->consumable_stock_item." ( ".$item->parent_level1." - ".$item->parent_level2." )";
		}
		
		return $LIST_RESULT;
	}
	
	public function beforeDelete(){

	  $existPurchaseRequestDetail=PurchaseRequestDetail::model()->find('id_item = :id_item AND purchase_item_table = :purchase_item_table',array(':id_item' =>$this->primaryKey,':purchase_item_table' =>'ConsumableStockItem'));
	  $existPurchaseOrderDetail=PurchaseOrderDetail::model()->find('id_item = :id_item AND purchase_item_table = :purchase_item_table',array(':id_item' =>$this->primaryKey,':purchase_item_table' =>'ConsumableStockItem'));
	  if($existPurchaseRequestDetail || $existPurchaseOrderDetail)
	    //throw new CDbException('Constraint violation');
	    throw new CHttpException(400,'Constraint violation. cant delete this Item cause has used in other transaction.');
	  return parent::beforeDelete();
	}
}
