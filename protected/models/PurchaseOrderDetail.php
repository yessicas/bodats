<?php

/**
 * This is the model class for table "purchase_order_detail".
 *
 * The followings are the available columns in table 'purchase_order_detail':
 * @property string $id_purchase_order_detail
 * @property string $id_purchase_order
 * @property string $id_purchase_request
 * @property string $id_purchase_request_detail
 * @property integer $id_po_category
 * @property double $amount
 * @property string $purchase_item_table
 * @property string $id_item
 * @property integer $quantity
 * @property string $metric
 * @property double $price_unit
 * @property integer $id_currency
 * @property integer $ppn
 * @property integer $pph15
 * @property integer $pph23
 * @property integer $others
 * @property string $notes
 * @property string $created_user
 * @property string $created_date
 * @property string $ip_user_updated
 */
class PurchaseOrderDetail extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'purchase_order_detail';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public $PONumber;
    public $PODate;
    public $VesselName_VoyageOrderNumber;
    public $VendorName;
    public $DeliveryDateRangeStart;
    public $POMonth;
    public $POYear;
    public $DeliveryPlace;
    public $PRNumber;

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_purchase_order, id_purchase_request, id_purchase_request_detail, id_po_category, purchase_item_table, id_item, quantity, metric, price_unit, id_currency, created_user, created_date, ip_user_updated', 'required'),
            array('id_po_category, id_currency', 'numerical', 'integerOnly' => true),
            array('ppn, pph15, pph23, others', 'numerical'),
            array('amount, price_unit', 'numerical'),
            array('quantity', 'numerical', 'integerOnly' => false),
            array('id_purchase_order, id_purchase_request_detail, id_item, metric', 'length', 'max' => 20),
            array('purchase_item_table', 'length', 'max' => 200),
            array('created_user', 'length', 'max' => 45),
            array('ip_user_updated', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_purchase_order_detail, id_purchase_order, id_purchase_request_detail,id_purchase_request, id_po_category, amount, purchase_item_table, id_item, quantity, metric, price_unit, id_currency, ppn, pph15, pph23, others, notes, created_user, created_date, ip_user_updated, PONumber, PODate, VesselName_VoyageOrderNumber, VendorName, DeliveryDateRangeStart, POMonth, DeliveryPlace, PRNumber', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Currency' => array(self::BELONGS_TO, 'Currency', 'id_currency'),
            'PO' => array(self::BELONGS_TO, 'PurchaseOrder', 'id_purchase_order'),
            'PoCategory' => array(self::BELONGS_TO, 'PoCategory', 'id_po_category'),
            'PurchaseRequest' => array(self::BELONGS_TO, 'PurchaseRequest', 'id_purchase_request'),
            'PurchaseRequestDetail' => array(self::BELONGS_TO, 'PurchaseRequestDetail', 'id_purchase_request_detail'),
            'PurchaseRequestVoyage' => array(self::BELONGS_TO, 'PurchaseRequest', 'id_purchase_request'),
            'Vessel' => array(self::BELONGS_TO, 'Vessel', array('id_vessel' => 'id_vessel'), 'through' => 'PurchaseRequest'),
            'VoyageOrder' => array(self::BELONGS_TO, 'VoyageOrder', array('id_voyage_order' => 'id_voyage_order'), 'through' => 'PurchaseRequestVoyage'),
            'CS' => array(self::BELONGS_TO, 'ConsumableStockItem', 'id_item'),
            'Vendor' => array(self::BELONGS_TO, 'Vendor', array('id_vendor' => 'id_vendor'), 'through' => 'PO'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_purchase_order_detail' => 'Id Purchase Order Detail',
            'id_purchase_order' => 'Purchase Order',
            'id_purchase_request_detail' => 'Purchase Request Detail',
            'id_purchase_request' => 'Purchase Request',
            'id_po_category' => 'Id Po Category',
            'amount' => 'Amount',
            'purchase_item_table' => 'Purchase Item Table',
            'id_item' => 'Id Item',
            'quantity' => 'Qty',
            'metric' => 'UM',
            'price_unit' => 'Price Unit',
            'id_currency' => 'Curr',
            'ppn' => 'PPN',
            'pph15' => 'PPH 15',
            'pph23' => 'PPH 23',
            'others' => 'Others',
            'notes' => 'Notes',
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
    public function search($page = 15, $withoutsearchname = false) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        if (!$withoutsearchname) {
            $criteria->with = array('PO', 'Vessel', 'VoyageOrder', 'Vendor');
            $criteria->together = true;
            if ($this->VesselName_VoyageOrderNumber != '') {
                $criteria->condition = 'Vessel.VesselName LIKE :data OR VoyageOrder.VoyageOrderNumber LIKE :data ';
                $criteria->params = array(':data' => '%' . trim($this->VesselName_VoyageOrderNumber) . '%');
            }
        } else {
            $criteria->together = true;
            $criteria->with = array('PO', 'Vessel', 'PurchaseRequest', 'Vendor');
        }




        $criteria->compare('PurchaseRequest.PRNumber', $this->PRNumber, true);
        $criteria->compare('PO.PONumber', $this->PONumber, true);
        $criteria->compare('PO.PODate', $this->PODate, true);
        $criteria->compare('PO.DeliveryDateRangeStart', $this->DeliveryDateRangeStart, true);
        $criteria->compare('PO.POMonth', $this->POMonth, false);
        $criteria->compare('PO.POYear', $this->POYear, false);
        $criteria->compare('PO.DeliveryPlace', $this->DeliveryPlace, true);
        $criteria->compare('PO.Status_approval', 1, false); // yang status po nya approved
        $criteria->compare('Vendor.VendorName', $this->VendorName, true);




        $criteria->compare('t.id_purchase_order_detail', $this->id_purchase_order_detail, false);
        $criteria->compare('t.id_purchase_order', $this->id_purchase_order, false);
        $criteria->compare('t.id_purchase_request_detail', $this->id_purchase_request_detail, false);
        $criteria->compare('t.id_po_category', $this->id_po_category);
        $criteria->compare('t.amount', $this->amount);
        $criteria->compare('t.purchase_item_table', $this->purchase_item_table, true);
        $criteria->compare('t.id_item', $this->id_item, false);
        $criteria->compare('t.quantity', $this->quantity);
        $criteria->compare('t.metric', $this->metric, true);
        $criteria->compare('t.price_unit', $this->price_unit);
        $criteria->compare('t.id_currency', $this->id_currency);
        $criteria->compare('t.ppn', $this->ppn);
        $criteria->compare('t.pph15', $this->pph15);
        $criteria->compare('t.pph23', $this->pph23);
        $criteria->compare('t.others', $this->others);
        $criteria->compare('t.notes', $this->notes, true);
        $criteria->compare('t.created_user', $this->created_user, true);
        $criteria->compare('t.created_date', $this->created_date, true);
        $criteria->compare('t.ip_user_updated', $this->ip_user_updated, true);

        $pagination = array('pageSize' => $page);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => $pagination,
            'sort' => array(
                'defaultOrder' => 't.id_purchase_order DESC',
                'attributes' => array(
                    'PONumber' => array(
                        'asc' => 'PO.PONumber ASC',
                        'desc' => 'PO.PONumber DESC',
                    ),
                    'PODate' => array(
                        'asc' => 'PO.PODate ASC',
                        'desc' => 'PO.PODate DESC',
                    ),
                    'DeliveryDateRangeStart' => array(
                        'asc' => 'PO.DeliveryDateRangeStart ASC',
                        'desc' => 'PO.DeliveryDateRangeStart DESC',
                    ),
                    'POMonth' => array(
                        'asc' => 'PO.POMonth ASC',
                        'desc' => 'PO.POMonth DESC',
                    ),
                    'DeliveryPlace' => array(
                        'asc' => 'PO.DeliveryPlace ASC',
                        'desc' => 'PO.DeliveryPlace DESC',
                    ),
                    'VendorName' => array(
                        'asc' => 'Vendor.VendorName ASC',
                        'desc' => 'Vendor.VendorName DESC',
                    ),
                    '*',
                ),
            ),
        ));
    }

    public function searchReportPO($page = 100, $withoutsearchname = false) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        if (!$withoutsearchname) {
            $criteria->with = array('PO', 'Vessel', 'VoyageOrder', 'Vendor');
            $criteria->together = true;
            if ($this->VesselName_VoyageOrderNumber != '') {
                $criteria->condition = 'Vessel.VesselName LIKE :data OR VoyageOrder.VoyageOrderNumber LIKE :data ';
                $criteria->params = array(':data' => '%' . trim($this->VesselName_VoyageOrderNumber) . '%');
            }
        } else {
            $criteria->together = true;
            $criteria->with = array('PO', 'Vessel', 'PurchaseRequest', 'Vendor');
        }

        //Compare ke tabel relasi yang lain
        $criteria->compare('PurchaseRequest.PRNumber', $this->PRNumber, true);
        $criteria->compare('PO.PONumber', $this->PONumber, true);
        $criteria->compare('PO.PODate', $this->PODate, true);
        $criteria->compare('PO.DeliveryDateRangeStart', $this->DeliveryDateRangeStart, true);
        $criteria->compare('PO.POMonth', $this->POMonth, false);
        $criteria->compare('PO.POYear', $this->POYear, false);
        $criteria->compare('PO.DeliveryPlace', $this->DeliveryPlace, true);
        $criteria->compare('PO.Status_approval', 1, false); // yang status po nya approved
        $criteria->compare('Vendor.VendorName', $this->VendorName, true);


        //Default Comparing
        $criteria->compare('t.id_purchase_order_detail', $this->id_purchase_order_detail, false);
        $criteria->compare('t.id_purchase_order', $this->id_purchase_order, false);
        $criteria->compare('t.id_purchase_request_detail', $this->id_purchase_request_detail, false);
        $criteria->compare('t.id_po_category', $this->id_po_category);
        $criteria->compare('t.amount', $this->amount);
        $criteria->compare('t.purchase_item_table', $this->purchase_item_table, true);
        $criteria->compare('t.id_item', $this->id_item, false);
        $criteria->compare('t.quantity', $this->quantity);
        $criteria->compare('t.metric', $this->metric, true);
        $criteria->compare('t.price_unit', $this->price_unit);
        $criteria->compare('t.id_currency', $this->id_currency);
        $criteria->compare('t.ppn', $this->ppn);
        $criteria->compare('t.pph15', $this->pph15);
        $criteria->compare('t.pph23', $this->pph23);
        $criteria->compare('t.others', $this->others);
        $criteria->compare('t.notes', $this->notes, true);

        //$pagination = array('pageSize'=>$page);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => false,
            'sort' => array(
                'defaultOrder' => 'PO.PODate DESC',
                'attributes' => array(
                    'PONumber' => array(
                        'asc' => 'PO.PONumber ASC',
                        'desc' => 'PO.PONumber DESC',
                    ),
                    'PODate' => array(
                        'asc' => 'PO.PODate ASC',
                        'desc' => 'PO.PODate DESC',
                    ),
                    'DeliveryDateRangeStart' => array(
                        'asc' => 'PO.DeliveryDateRangeStart ASC',
                        'desc' => 'PO.DeliveryDateRangeStart DESC',
                    ),
                    'POMonth' => array(
                        'asc' => 'PO.POMonth ASC',
                        'desc' => 'PO.POMonth DESC',
                    ),
                    'DeliveryPlace' => array(
                        'asc' => 'PO.DeliveryPlace ASC',
                        'desc' => 'PO.DeliveryPlace DESC',
                    ),
                    'VendorName' => array(
                        'asc' => 'Vendor.VendorName ASC',
                        'desc' => 'Vendor.VendorName DESC',
                    ),
                    '*',
                ),
            ),
        ));
    }

    public function searchGRCS() {
        // Ini untuk search pada bagian GR/GI Consumable Stock

        $criteria = new CDbCriteria;


        $criteria->compare('id_purchase_order_detail', $this->id_purchase_order_detail, true);
        $criteria->compare('id_purchase_order', $this->id_purchase_order, true);
        $criteria->compare('id_purchase_request_detail', $this->id_purchase_request_detail, true);
        $criteria->compare('id_po_category', $this->id_po_category);
        $criteria->compare('amount', $this->amount);
        $criteria->compare('purchase_item_table', $this->purchase_item_table, true);
        $criteria->compare('id_item', $this->id_item, true);
        $criteria->compare('quantity', $this->quantity);
        $criteria->compare('metric', $this->metric, true);
        $criteria->compare('price_unit', $this->price_unit);
        $criteria->compare('id_currency', $this->id_currency);
        $criteria->compare('ppn', $this->ppn);
        $criteria->compare('pph15', $this->pph15);
        $criteria->compare('pph23', $this->pph23);
        $criteria->compare('others', $this->others);
        $criteria->compare('notes', $this->notes, true);
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
     * @return PurchaseOrderDetail the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
