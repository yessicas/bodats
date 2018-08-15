<?php

/**
 * This is the model class for table "purchase_request_detail".
 *
 * The followings are the available columns in table 'purchase_request_detail':
 * @property string $id_purchase_request_detail
 * @property string $id_purchase_request
 * @property string $purchase_item_table
 * @property string $id_item
 * @property string $quantity
 * @property integer $metric
 * @property string $dedicated_to
 * @property integer $id_vessel
 * @property integer $id_voyage_order
 * @property string $notes
 * @property string $requested_user
 * @property string $requested_date
 * @property string $ip_user_requested
 * @property string $status
 * @property string $approved_user
 * @property string $approval_date
 * @property string $ip_user_approved
 */
class PurchaseRequestDetail extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'purchase_request_detail';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public $consumable_stock_item;
    public $ehs_item;
    public $PRStatus;
    public $PRPOCategory;
    public $VesselName;
    public $consumable_stock_item_name;
    public $ehs_item_name;
    public $PRNumber;
    public $PRDate;

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_purchase_request, purchase_item_table, id_item, quantity, metric, dedicated_to, id_vessel, id_voyage_order, requested_user, requested_date, ip_user_requested, status', 'required'),
            array('id_vessel, id_voyage_order', 'numerical', 'integerOnly' => true),
            array('quantity', 'numerical', 'integerOnly' => false),
            array('id_purchase_request, id_item, quantity', 'length', 'max' => 20),
            array('purchase_item_table, notes', 'length', 'max' => 200),
            array('consumable_stock_item', 'required', 'on' => 'insertconsumable'),
            array('consumable_stock_item', 'required', 'on' => 'updateconsumable'),
            array('ehs_item', 'required', 'on' => 'insertehs'),
            array('ehs_item', 'required', 'on' => 'updateehs'),
            array('id_item', 'ceksamedatainsert', 'on' => 'insertconsumable'),
            array('id_item', 'ceksamedataupdate', 'on' => 'updateconsumable'),
            array('id_item', 'ceksamedatainsert', 'on' => 'insertehs'),
            array('id_item', 'ceksamedataupdate', 'on' => 'updateehs'),
            array('id_item', 'ceksamedatainsert', 'on' => 'insertsurvey'),
            array('id_item', 'ceksamedataupdate', 'on' => 'updatesurvey'),
            array('requested_user, approved_user', 'length', 'max' => 45),
            array('ip_user_requested, ip_user_approved', 'length', 'max' => 50),
            array('consumable_stock_item', 'cekexistconsumable', 'on' => 'insertconsumable'),
            array('consumable_stock_item', 'cekexistconsumable', 'on' => 'updateconsumable'),
            array('ehs_item', 'cekexistehs', 'on' => 'insertehs'),
            array('ehs_item', 'cekexistehs', 'on' => 'updateehs'),
            /*
              array('attachment', 'file',
              'types'=>'png, pdf, jpg, docs',
              'allowEmpty' => true,
              'maxSize' => 1024 * 1024 * 10, // 20MB
              'safe'=>true
              //'tooLarge' => 'file yang di pilih lebih dari  20MB. Silahkan pilih file  yang lebih kecil.',
              ),
             */
            array('attachment', 'file',
                'types' => 'jpg, gif, png, pdf',
                'allowEmpty' => true,
                'on' => 'update'
            // this will allow empty field when page is update (remember here i create scenario update)
            ),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_purchase_request_detail, id_purchase_request, purchase_item_table, id_item, quantity, metric, dedicated_to, id_vessel, id_voyage_order, notes, requested_user, requested_date, ip_user_requested, status, approved_user, approval_date, ip_user_approved, consumable_stock_item_name, PRNumber, PRDate, VesselName', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'agencyitem' => array(self::BELONGS_TO, 'AgencyItem', 'id_item'),
            'consumablestockitem' => array(self::BELONGS_TO, 'ConsumableStockItem', 'id_item'),
            'ehsitem' => array(self::BELONGS_TO, 'EhsItem', 'id_item'),
            'PurchaseRequest' => array(self::BELONGS_TO, 'PurchaseRequest', 'id_purchase_request'),
            'PoCategory' => array(self::BELONGS_TO, 'PoCategory', 'id_po_category'),
            'surveyitem' => array(self::BELONGS_TO, 'SurveyItem', 'id_item'),
            'serviceitem' => array(self::BELONGS_TO, 'ServiceItem', 'id_item'),
            'ConsumableStockItem' => array(self::BELONGS_TO, 'ConsumableStockItem', 'id_item'),
            'EhsItem' => array(self::BELONGS_TO, 'EhsItem', 'id_item'),
            'Vessel' => array(self::BELONGS_TO, 'Vessel', array('id_vessel' => 'id_vessel'), 'through' => 'PurchaseRequest'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_purchase_request_detail' => 'Id Purchase Request Detail',
            'id_purchase_request' => 'Id Purchase Request',
            'purchase_item_table' => 'Purchase Item Table',
            'id_item' => 'Item',
            'quantity' => 'Quantity',
            'metric' => 'Metric',
            'dedicated_to' => 'Dedicated To',
            'id_vessel' => 'Id Vessel',
            'id_voyage_order' => 'Id Voyage Order',
            'notes' => 'Notes',
            'requested_user' => 'Requested User',
            'requested_date' => 'Requested Date',
            'ip_user_requested' => 'Ip User Requested',
            'status' => 'Status',
            'approved_user' => 'Approved User',
            'approval_date' => 'Approval Date',
            'ip_user_approved' => 'Ip User Approved',
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
    public function search($isJoinPR = false, $page = 15) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('t.id_po_category', $this->id_po_category, false);
        $criteria->compare('t.id_purchase_request_detail', $this->id_purchase_request_detail, false);
        $criteria->compare('t.id_purchase_request', $this->id_purchase_request, false);
        $criteria->compare('t.purchase_item_table', $this->purchase_item_table, true);
        $criteria->compare('t.id_item', $this->id_item, false);
        $criteria->compare('t.quantity', $this->quantity, true);
        $criteria->compare('t.metric', $this->metric);
        $criteria->compare('t.dedicated_to', $this->dedicated_to, true);
        $criteria->compare('t.id_vessel', $this->id_vessel);
        $criteria->compare('t.id_voyage_order', $this->id_voyage_order);
        $criteria->compare('t.notes', $this->notes, true);
        $criteria->compare('t.requested_user', $this->requested_user, true);
        $criteria->compare('t.requested_date', $this->requested_date, true);
        $criteria->compare('ip_user_requested', $this->ip_user_requested, true);
        $criteria->compare('t.status', $this->status, true);
        $criteria->compare('t.approved_user', $this->approved_user, true);
        $criteria->compare('t.approval_date', $this->approval_date, true);
        $criteria->compare('t.ip_user_approved', $this->ip_user_approved, true);

        $criteria->compare('ConsumableStockItem.consumable_stock_item', $this->consumable_stock_item_name, true);
        $criteria->compare('EhsItem.ehs_item', $this->ehs_item_name, true);
        $criteria->compare('PurchaseRequest.PRNumber', $this->PRNumber, true);
        $criteria->compare('PurchaseRequest.PRDate', $this->PRDate, true);

        //$pagination = array('pageSize'=>$page);
        $pagination = array(
            'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']),
        );

        //if($unpaging){
        //	$pagination  = false;
        //	$criteria->limit = 100;
        //}

        if ($isJoinPR) {
            $criteria->with = array('PurchaseRequest', 'ConsumableStockItem', 'Vessel');
            $criteria->with = array('PurchaseRequest', 'EhsItem', 'Vessel');
            $criteria->compare('PurchaseRequest.Status', $this->PRStatus, true);
            $criteria->compare('PurchaseRequest.id_po_category', $this->PRPOCategory, true);
            $criteria->compare('Vessel.VesselName', $this->VesselName, true);
            $criteria->together = true;
        }

        if ($isJoinPR) {
            return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
                'pagination' => $pagination,
                'sort' => array(
                    'defaultOrder' => 'PurchaseRequest.PRDate ASC',
                    'attributes' => array(
                        'consumable_stock_item_name' => array(
                            'asc' => 'ConsumableStockItem.consumable_stock_item ASC',
                            'desc' => 'ConsumableStockItem.consumable_stock_item DESC',
                        ),
                        'ehs_item_name' => array(
                            'asc' => 'EhsItem.ehs_item ASC',
                            'desc' => 'EhsItem.ehs_item DESC',
                        ),
                        'PRNumber' => array(
                            'asc' => 'PurchaseRequest.PRNumber ASC',
                            'desc' => 'PurchaseRequest.PRNumber DESC',
                        ),
                        'PRDate' => array(
                            'asc' => 'PurchaseRequest.PRDate ASC',
                            'desc' => 'PurchaseRequest.PRDate DESC',
                        ),
                        'VesselName' => array(
                            'asc' => 'Vessel.VesselName ASC',
                            'desc' => 'Vessel.VesselName DESC',
                        ),
                        '*',
                    ),
                ),
            ));
        } else {
            return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
                'pagination' => $pagination,
                'sort' => array(
                    'defaultOrder' => 'requested_date ASC',
                ),
            ));
        }
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PurchaseRequestDetail the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function ceksamedatainsert() {

        $model = PurchaseRequestDetail::model()->find(array(
            'condition' => 'id_purchase_request = :id_purchase_request AND id_item = :id_item',
            'params' => array(
                ':id_purchase_request' => $this->id_purchase_request,
                ':id_item' => $this->id_item,
            ),
        ));
        if ($model)
            $this->addError('id_item', 'Item Cannot Same with in the list'); // validasi model gagal sehingga perintah save() akan dibatalkan.
    }

    public function ceksamedataupdate() {

        $model = PurchaseRequestDetail::model()->find(array(
            'condition' => 'id_purchase_request = :id_purchase_request AND id_item = :id_item AND id_purchase_request_detail <>:id_purchase_request_detail',
            'params' => array(
                ':id_purchase_request' => $this->id_purchase_request,
                ':id_item' => $this->id_item,
                ':id_purchase_request_detail' => $this->id_purchase_request_detail,
            ),
        ));
        if ($model)
            $this->addError('id_item', 'Item Cannot Same with in the list'); // validasi model gagal sehingga perintah save() akan dibatalkan.
    }

    public function cekexistconsumable() {

        $model = ConsumableStockItem::model()->findByAttributes(array('id_consumable_stock_item' => $this->id_item, 'consumable_stock_item' => $this->consumable_stock_item));
        if ($model === null)
            $this->addError('consumable_stock_item', 'Item Name Not Exist'); // validasi model gagal sehingga perintah save() akan dibatalkan.
    }
    
    public function cekexistehs() {

        $model = EhsItem::model()->findByAttributes(array('id_ehs_item' => $this->id_item, 'ehs_item' => $this->ehs_item));
        if ($model === null)
            $this->addError('ehs_item', 'Item Name Not Exist'); // validasi model gagal sehingga perintah save() akan dibatalkan.
    }

}
