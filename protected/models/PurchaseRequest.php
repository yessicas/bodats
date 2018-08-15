<?php

/**
 * This is the model class for table "purchase_request".
 *
 * The followings are the available columns in table 'purchase_request':
 * @property string $id_purchase_request
 * @property string $PRNumber
 * @property string $id_purchase_order
 * @property string $PRDate
 * @property integer $PRNo
 * @property integer $PRMonth
 * @property integer $PRYear
 * @property integer $id_po_category
 * @property string $amount
 * @property integer $id_metric_pr
 * @property string $dedicated_to
 * @property integer $id_vessel
 * @property integer $id_voyage_order
 * @property string $notes
 * @property integer $is_mutliple_item
 * @property string $requested_user
 * @property string $requested_date
 * @property string $ip_user_requested
 * @property string $Status
 * @property string $approved_user
 * @property string $approval_date
 * @property string $ip_user_approved
 */
class PurchaseRequest extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'purchase_request';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public $VesselName_VoyageOrderNumber;

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            //array('PRNumber, PRDate, PRNo, PRMonth, PRYear, id_po_category, amount, id_metric_pr, dedicated_to, id_vessel, id_voyage_order, notes, requested_user, requested_date, ip_user_requested, Status, approved_user, approval_date, ip_user_approved', 'required'),
            array('PRDate, id_po_category,,amount, metric, id_vessel, dedicated_to, notes, requested_user, requested_date, ip_user_requested, Status', 'required'),
            array('PRNo, PRMonth, PRYear, id_po_category, amount, id_vessel, id_voyage_order, is_mutliple_item', 'numerical', 'integerOnly' => true),
            array('PRNumber', 'length', 'max' => 250),
            array('amount', 'length', 'max' => 20),
            array('requested_user, approved_user', 'length', 'max' => 45),
            array('ip_user_requested, ip_user_approved', 'length', 'max' => 50),
            array('approval_level, is_approved, approved_user, approval_date, ip_user_approved, approval_notes', 'length', 'max' => 30),
            array('is_approved2, approved_user2, approval_date2, ip_user_approved2, approval_notes2', 'length', 'max' => 30),
            array('is_approved3, approved_user3, approval_date3, ip_user_approved3, approval_notes3', 'length', 'max' => 30),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_purchase_request, PRNumber, PRDate, PRNo, PRMonth, PRYear, id_po_category, amount, metric, dedicated_to, id_vessel, id_voyage_order, notes, is_mutliple_item, requested_user, requested_date, ip_user_requested, Status, approved_user, approval_date, ip_user_approved, VesselName_VoyageOrderNumber', 'safe', 'on' => 'search'),
            array('id_purchase_request, PRNumber, PRDate, PRNo, PRMonth, PRYear, id_po_category, amount, metric, dedicated_to, id_vessel, id_voyage_order, notes, is_mutliple_item, requested_user, requested_date, ip_user_requested, Status, approved_user, approval_date, ip_user_approved, VesselName_VoyageOrderNumber', 'safe', 'on' => 'searchstatusapproved'),
            array('id_purchase_request, PRNumber, PRDate, PRNo, PRMonth, PRYear, id_po_category, amount, metric, dedicated_to, id_vessel, id_voyage_order, notes, is_mutliple_item, requested_user, requested_date, ip_user_requested, Status, approved_user, approval_date, ip_user_approved, VesselName_VoyageOrderNumber', 'safe', 'on' => 'searchstatusrejected'),
            array('id_purchase_request, PRNumber, PRDate, PRNo, PRMonth, PRYear, id_po_category, amount, metric, dedicated_to, id_vessel, id_voyage_order, notes, is_mutliple_item, requested_user, requested_date, ip_user_requested, Status, approved_user, approval_date, ip_user_approved, VesselName_VoyageOrderNumber', 'safe', 'on' => 'searchstatuspo'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'PoCategory' => array(self::BELONGS_TO, 'PoCategory', 'id_po_category'),
            'PO' => array(self::BELONGS_TO, 'PurchaseOrder', 'id_purchase_order'),
            'Vessel' => array(self::BELONGS_TO, 'Vessel', 'id_vessel'),
            'MetricPr' => array(self::BELONGS_TO, 'MstMetricPr', 'metric'),
            'VoyageOrder' => array(self::BELONGS_TO, 'VoyageOrder', 'id_voyage_order'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_purchase_request' => 'ID Purchase Request',
            'PRNumber' => 'PR. Number',
            'id_purchase_request' => 'PO. Number',
            'PRDate' => 'PR. Date',
            'PRNo' => 'PR. No',
            'PRMonth' => 'Prmonth',
            'PRYear' => 'Pryear',
            'id_po_category' => 'PR. Category',
            'amount' => 'Qty',
            'metric' => 'Metric',
            'dedicated_to' => 'Dedicated To',
            'id_vessel' => 'Vessel/Tug',
            'id_voyage_order' => 'ID Voyage Order',
            'notes' => 'Notes',
            'is_mutliple_item' => 'Is Mutliple Item',
            'requested_user' => 'Requested User',
            'requested_date' => 'Requested Date',
            'ip_user_requested' => 'IP Address Requested',
            'Status' => 'Status',
            'approved_user' => 'Approval User',
            'approval_date' => 'Approval Date',
            'ip_user_approved' => 'IP Address User Approved',
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
    public function search($mode = '') {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->with = array('Vessel', 'VoyageOrder');
        $criteria->together = true;
        $criteria->condition = 'Vessel.VesselName LIKE :data OR VoyageOrder.VoyageOrderNumber LIKE :data ';
        $criteria->params = array(':data' => '%' . trim($this->VesselName_VoyageOrderNumber) . '%');

        $criteria->compare('t.id_purchase_request', $this->id_purchase_request);
        $criteria->compare('t.PRNumber', $this->PRNumber, true);
        $criteria->compare('t.PRDate', $this->PRDate, true);
        $criteria->compare('t.PRNo', $this->PRNo);
        $criteria->compare('t.PRMonth', $this->PRMonth);
        $criteria->compare('t.PRYear', $this->PRYear);
        $criteria->compare('t.id_po_category', $this->id_po_category);
        $criteria->compare('t.amount', $this->amount, true);
        $criteria->compare('t.metric', $this->metric);
        $criteria->compare('t.dedicated_to', $this->dedicated_to, true);
        $criteria->compare('t.id_vessel', $this->id_vessel);
        $criteria->compare('t.id_voyage_order', $this->id_voyage_order);
        $criteria->compare('t.notes', $this->notes, true);
        $criteria->compare('t.is_mutliple_item', $this->is_mutliple_item);
        $criteria->compare('t.requested_user', $this->requested_user, true);
        $criteria->compare('t.requested_date', $this->requested_date, true);
        $criteria->compare('t.ip_user_requested', $this->ip_user_requested, true);
        $criteria->compare('t.Status', $this->Status);
        $criteria->compare('t.approved_user', $this->approved_user, true);
        $criteria->compare('t.approval_date', $this->approval_date, true);
        $criteria->compare('t.ip_user_approved', $this->ip_user_approved, true);
        $criteria->compare('t.approval_level', $this->approval_level, true);

        /*
          if($mode=='agency'){
          $sort=array(
          'defaultOrder'=>'PRDate DESC',
          'attributes'=>array(
          'VesselName_VoyageOrderNumber'=>array(
          'asc'=>'VoyageOrder.VoyageOrderNumber ASC',
          'desc'=>'VoyageOrder.VoyageOrderNumber DESC',
          ),
          '*',
          ),
          );
          }else{
          $sort=array(
          'defaultOrder'=>'PRDate DESC',
          'attributes'=>array(
          'VesselName_VoyageOrderNumber'=>array(
          'asc'=>'Vessel.VesselName ASC',
          'desc'=>'Vessel.VesselName DESC',
          ),
          '*',
          ),
          );
          } */

        if ($mode == 'agency') {
            return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
                'sort' => array(
                    'defaultOrder' => 'PRDate DESC',
                    'attributes' => array(
                        'VesselName_VoyageOrderNumber' => array(
                            'asc' => 'VoyageOrder.VoyageOrderNumber ASC',
                            'desc' => 'VoyageOrder.VoyageOrderNumber DESC',
                        ),
                        '*',
                    ),
                ),
                /*
                  'pagination'=>array(
                  'pageSize'=>15,
                  ),
                 */
                /// page size nya
                'pagination' => array(
                    'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']),
                ),
            ));
        } else {
            return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
                'sort' => array(
                    'defaultOrder' => 'PRDate DESC',
                    'attributes' => array(
                        'VesselName_VoyageOrderNumber' => array(
                            'asc' => 'Vessel.VesselName ASC',
                            'desc' => 'Vessel.VesselName DESC',
                        ),
                        '*',
                    ),
                ),
                /*
                  'pagination'=>array(
                  'pageSize'=>15,
                  ),
                 */
                /// page size nya
                'pagination' => array(
                    'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']),
                ),
            ));
        }
    }

    public function searchothers($mode = '') {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('t.id_purchase_request', $this->id_purchase_request);
        $criteria->compare('t.PRNumber', $this->PRNumber, true);
        $criteria->compare('t.PRDate', $this->PRDate, true);
        $criteria->compare('t.PRNo', $this->PRNo);
        $criteria->compare('t.PRMonth', $this->PRMonth);
        $criteria->compare('t.PRYear', $this->PRYear);
        $criteria->compare('t.id_po_category', $this->id_po_category);
        $criteria->compare('t.amount', $this->amount, true);
        $criteria->compare('t.metric', $this->metric);
        $criteria->compare('t.dedicated_to', $this->dedicated_to, true);
        $criteria->compare('t.id_vessel', $this->id_vessel);
        $criteria->compare('t.id_voyage_order', $this->id_voyage_order);
        $criteria->compare('t.notes', $this->notes, true);
        $criteria->compare('t.is_mutliple_item', $this->is_mutliple_item);
        $criteria->compare('t.requested_user', $this->requested_user, true);
        $criteria->compare('t.requested_date', $this->requested_date, true);
        $criteria->compare('t.ip_user_requested', $this->ip_user_requested, true);
        $criteria->compare('t.Status', $this->Status);
        $criteria->compare('t.approved_user', $this->approved_user, true);
        $criteria->compare('t.approval_date', $this->approval_date, true);
        $criteria->compare('t.ip_user_approved', $this->ip_user_approved, true);
        $criteria->compare('t.approval_level', $this->approval_level, true);


        if ($mode == 'agency') {
            return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
                'sort' => array(
                    'defaultOrder' => 'PRDate DESC',
                    'attributes' => array(
                        'VesselName_VoyageOrderNumber' => array(
                            'asc' => 'VoyageOrder.VoyageOrderNumber ASC',
                            'desc' => 'VoyageOrder.VoyageOrderNumber DESC',
                        ),
                        '*',
                    ),
                ),
                /*
                  'pagination'=>array(
                  'pageSize'=>15,
                  ),
                 */
                /// page size nya
                'pagination' => array(
                    'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']),
                ),
            ));
        } else {
            return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
                'sort' => array(
                    'defaultOrder' => 'PRDate DESC',
                /*
                  'attributes'=>array(
                  'VesselName_VoyageOrderNumber'=>array(
                  'asc'=>'Vessel.VesselName ASC',
                  'desc'=>'Vessel.VesselName DESC',
                  ),'*',
                  ),
                 */
                ),
                /*
                  'pagination'=>array(
                  'pageSize'=>15,
                  ),
                 */
                /// page size nya
                'pagination' => array(
                    'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']),
                ),
            ));
        }
    }

    public function searchstatusapproved() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->condition = 'Status=:Status';
        $criteria->params = array(':Status' => 'PR APPROVED');

        $criteria->compare('id_purchase_request', $this->id_purchase_request, false);
        $criteria->compare('PRNumber', $this->PRNumber, true);
        $criteria->compare('PRDate', $this->PRDate, true);
        $criteria->compare('PRNo', $this->PRNo);
        $criteria->compare('PRMonth', $this->PRMonth);
        $criteria->compare('PRYear', $this->PRYear);
        $criteria->compare('id_po_category', $this->id_po_category);
        $criteria->compare('amount', $this->amount, true);
        $criteria->compare('metric', $this->metric);
        $criteria->compare('dedicated_to', $this->dedicated_to, true);
        $criteria->compare('id_vessel', $this->id_vessel);
        $criteria->compare('id_voyage_order', $this->id_voyage_order);
        $criteria->compare('notes', $this->notes, true);
        $criteria->compare('is_mutliple_item', $this->is_mutliple_item);
        $criteria->compare('requested_user', $this->requested_user, true);
        $criteria->compare('requested_date', $this->requested_date, true);
        $criteria->compare('ip_user_requested', $this->ip_user_requested, true);
        $criteria->compare('Status', $this->Status);
        $criteria->compare('approved_user', $this->approved_user, true);
        $criteria->compare('approval_date', $this->approval_date, true);
        $criteria->compare('ip_user_approved', $this->ip_user_approved, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchstatusrejected() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->condition = 'Status=:Status';
        $criteria->params = array(':Status' => 'PR REJECTED');

        $criteria->compare('id_purchase_request', $this->id_purchase_request, false);
        $criteria->compare('PRNumber', $this->PRNumber, true);
        $criteria->compare('PRDate', $this->PRDate, true);
        $criteria->compare('PRNo', $this->PRNo);
        $criteria->compare('PRMonth', $this->PRMonth);
        $criteria->compare('PRYear', $this->PRYear);
        $criteria->compare('id_po_category', $this->id_po_category);
        $criteria->compare('amount', $this->amount, true);
        $criteria->compare('metric', $this->metric);
        $criteria->compare('dedicated_to', $this->dedicated_to, true);
        $criteria->compare('id_vessel', $this->id_vessel);
        $criteria->compare('id_voyage_order', $this->id_voyage_order);
        $criteria->compare('notes', $this->notes, true);
        $criteria->compare('is_mutliple_item', $this->is_mutliple_item);
        $criteria->compare('requested_user', $this->requested_user, true);
        $criteria->compare('requested_date', $this->requested_date, true);
        $criteria->compare('ip_user_requested', $this->ip_user_requested, true);
        $criteria->compare('Status', $this->Status);
        $criteria->compare('approved_user', $this->approved_user, true);
        $criteria->compare('approval_date', $this->approval_date, true);
        $criteria->compare('ip_user_approved', $this->ip_user_approved, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchstatuspo() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->condition = 'Status=:Status';
        $criteria->params = array(':Status' => 'PO');

        $criteria->compare('id_purchase_request', $this->id_purchase_request, true);
        $criteria->compare('PRNumber', $this->PRNumber, true);
        $criteria->compare('PRDate', $this->PRDate, true);
        $criteria->compare('PRNo', $this->PRNo);
        $criteria->compare('PRMonth', $this->PRMonth);
        $criteria->compare('PRYear', $this->PRYear);
        $criteria->compare('id_po_category', $this->id_po_category);
        $criteria->compare('amount', $this->amount, true);
        $criteria->compare('metric', $this->metric);
        $criteria->compare('dedicated_to', $this->dedicated_to, true);
        $criteria->compare('id_vessel', $this->id_vessel);
        $criteria->compare('id_voyage_order', $this->id_voyage_order);
        $criteria->compare('notes', $this->notes, true);
        $criteria->compare('is_mutliple_item', $this->is_mutliple_item);
        $criteria->compare('requested_user', $this->requested_user, true);
        $criteria->compare('requested_date', $this->requested_date, true);
        $criteria->compare('ip_user_requested', $this->ip_user_requested, true);
        $criteria->compare('Status', $this->Status);
        $criteria->compare('approved_user', $this->approved_user, true);
        $criteria->compare('approval_date', $this->approval_date, true);
        $criteria->compare('ip_user_approved', $this->ip_user_approved, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PurchaseRequest the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
