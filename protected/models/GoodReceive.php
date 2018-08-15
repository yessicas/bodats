<?php

/**
 * This is the model class for table "good_receive".
 *
 * The followings are the available columns in table 'good_receive':
 * @property string $id_good_receive
 * @property string $id_purchase_order
 * @property string $id_purchase_request
 * @property string $id_purchase_order_detail
 * @property integer $id_po_category
 * @property string $received_date
 * @property string $receive_by
 * @property string $condition
 * @property string $notes
 * @property double $amount
 * @property string $purchase_item_table
 * @property string $id_item
 * @property string $item_add_info
 * @property integer $quantity
 * @property string $metric
 * @property integer $receive_number
 * @property string $status_receive
 * @property string $created_user
 * @property string $created_date
 * @property string $ip_user_updated
 */
class GoodReceive extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'good_receive';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('received_date, receive_by, quantity, metric, receive_number, status_receive', 'required'),
            array('id_po_category, quantity, receive_number', 'numerical', 'integerOnly' => true),
            array('amount', 'numerical'),
            array('id_purchase_request, id_purchase_order, id_purchase_order_detail, id_item, metric', 'length', 'max' => 20),
            array('receive_by, condition, notes', 'length', 'max' => 250),
            array('purchase_item_table', 'length', 'max' => 200),
            array('item_add_info', 'length', 'max' => 150),
            array('created_user, id_vessel,dedicated_to', 'length', 'max' => 45),
            array('ip_user_updated', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_good_receive, id_purchase_order, id_purchase_order_detail, id_po_category, received_date, receive_by, condition, notes, amount, purchase_item_table, id_item, item_add_info, quantity, metric, receive_number, status_receive, created_user, created_date, ip_user_updated, id_vessel, dedicated_to', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Vessel' => array(self::BELONGS_TO, 'Vessel', 'id_vessel'),
            'PurchaseRequest' => array(self::BELONGS_TO, 'PurchaseRequest', 'id_purchase_request'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_good_receive' => 'Id Good Receive',
            'id_purchase_order' => 'Id Purchase Order',
            'id_purchase_request' => 'Purchase Request',
            'id_purchase_order_detail' => 'Id Purchase Order Detail',
            'id_po_category' => 'Id Po Category',
            'received_date' => 'Received Date',
            'receive_by' => 'Receive By',
            'condition' => 'Condition',
            'notes' => 'Notes',
            'amount' => 'Amount',
            'purchase_item_table' => 'Purchase Item Table',
            'id_item' => 'Id Item',
            'item_add_info' => 'Item Add Info',
            'quantity' => 'Quantity',
            'metric' => 'Metric',
            'receive_number' => 'Receive Number',
            'status_receive' => 'Status Receive',
            'id_vessel' => 'Vessel',
            'dedicated_to' => 'Dedicated To',
            'created_user' => 'Created User',
            'created_date' => 'Created Date',
            'ip_user_updated' => 'Ip User Updated',
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

        $criteria->compare('id_good_receive', $this->id_good_receive, true);
        $criteria->compare('id_purchase_order', $this->id_purchase_order, true);
        $criteria->compare('id_purchase_order_detail', $this->id_purchase_order_detail, true);
        $criteria->compare('id_po_category', $this->id_po_category);
        $criteria->compare('received_date', $this->received_date, true);
        $criteria->compare('receive_by', $this->receive_by, true);
        $criteria->compare('condition', $this->condition, true);
        $criteria->compare('notes', $this->notes, true);
        $criteria->compare('amount', $this->amount);
        $criteria->compare('purchase_item_table', $this->purchase_item_table, true);
        $criteria->compare('id_item', $this->id_item, true);
        $criteria->compare('item_add_info', $this->item_add_info, true);
        $criteria->compare('quantity', $this->quantity);
        $criteria->compare('metric', $this->metric, true);
        $criteria->compare('receive_number', $this->receive_number);
        $criteria->compare('status_receive', $this->status_receive, true);
        $criteria->compare('id_vessel', $this->id_vessel, true);
        $criteria->compare('dedicated_to', $this->dedicated_to, true);
        $criteria->compare('created_user', $this->created_user, true);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('ip_user_updated', $this->ip_user_updated, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return GoodReceive the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
