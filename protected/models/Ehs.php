<?php

/**
 * This is the model class for table "ehs".
 *
 * The followings are the available columns in table 'ehs':
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
class Ehs extends CActiveRecord {

//    public static function primaryKey() {
//        return ['id_ehs'];
//    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'ehs';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_po_category, consumable_stock_category, consumable_stock_item, parent_level1, parent_level2, parent_level3, serial_number, description, estimated_unit_price, metric, category, impa', 'required'),
            array('id_po_category', 'numerical', 'integerOnly' => true),
            array('estimated_unit_price', 'numerical'),
            array('id_consumable_stock_item, metric', 'length', 'max' => 20),
            array('parent_level1, parent_level2, parent_level3', 'length', 'max' => 250),
            array('serial_number', 'length', 'max' => 150),
            array('description', 'length', 'max' => 800),
            array('impa', 'length', 'max' => 200),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_consumable_stock_item, id_po_category, consumable_stock_category, consumable_stock_item, parent_level1, parent_level2, parent_level3, serial_number, description, estimated_unit_price, metric, category, impa', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_consumable_stock_item' => 'Id Consumable Stock Item',
            'id_po_category' => 'Id Po Category',
            'consumable_stock_category' => 'Consumable Stock Category',
            'consumable_stock_item' => 'Consumable Stock Item',
            'parent_level1' => 'Parent Level1',
            'parent_level2' => 'Parent Level2',
            'parent_level3' => 'Parent Level3',
            'serial_number' => 'Serial Number',
            'description' => 'Description',
            'estimated_unit_price' => 'Estimated Unit Price',
            'metric' => 'Metric',
            'category' => 'Category',
            'impa' => 'Impa',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_consumable_stock_item', $this->id_consumable_stock_item, true);
        $criteria->compare('id_po_category', $this->id_po_category);
        $criteria->compare('consumable_stock_category', $this->consumable_stock_category, true);
        $criteria->compare('consumable_stock_item', $this->consumable_stock_item, true);
        $criteria->compare('parent_level1', $this->parent_level1, true);
        $criteria->compare('parent_level2', $this->parent_level2, true);
        $criteria->compare('parent_level3', $this->parent_level3, true);
        $criteria->compare('serial_number', $this->serial_number, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('estimated_unit_price', $this->estimated_unit_price);
        $criteria->compare('metric', $this->metric, true);
        $criteria->compare('category', $this->category, true);
        $criteria->compare('impa', $this->impa, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Ehs the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
