<?php

/**
 * This is the model class for table "purchase_order".
 *
 * The followings are the available columns in table 'purchase_order':
 * @property string $id_purchase_order
 * @property string $id_purchase_request
 * @property integer $id_vendor
 * @property string $up
 * @property string $PONumber
 * @property string $PODate
 * @property integer $PONo
 * @property integer $POMonth
 * @property integer $POYear
 * @property integer $RevisionNumber
 * @property integer $TermOfPayment
 * @property integer $ppn
 * @property integer $pph15
 * @property integer $pph23
 * @property integer $others
 * @property string $notes
 * @property string $DeliveryDateRangeStart
 * @property string $DeliveryDateRangeEnd
 * @property integer $is_mutliple_item
 * @property string $SignName
 * @property string $created_user
 * @property string $created_date
 * @property string $ip_user_updated
 * @property string $Status
 */
class PurchaseOrder extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'purchase_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public $VendorName;
	public $PoCategoryDetail;
	public $VesselName_VoyageOrderNumber;
	public $CategoryName;
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('id_purchase_request, id_vendor, up, PONumber, PODate, PONo, POMonth, POYear, RevisionNumber, TermOfPayment, id_po_category, amount, metric, PriceUnit, id_currency, ppn, pph15, pph23, others, dedicated_to, id_vessel, id_voyage_order, notes, DeliveryDateRangeStart, DeliveryDateRangeEnd, SignName, created_user, created_date, ip_user_updated, Status', 'required'),
			//array('id_purchase_request, id_vendor, up, PONumber, PODate, PONo, POMonth, POYear, TermOfPayment, RevisionNumber, dedicated_to, id_po_category, amount, metric, PriceUnit, id_currency, ppn, pph15, pph23, others, id_vessel, notes, DeliveryDateRangeStart, DeliveryPlace, DeliveryDateRangeEnd, SignName, PONotes, created_user, created_date, ip_user_updated, Status', 'required'),
			array('id_purchase_request, id_vendor, up, PODate, TermOfPayment, RevisionNumber, ppn, DeliveryDateRangeStart, DeliveryPlace, DeliveryDateRangeEnd, SignName, PONotes, created_user, created_date, ip_user_updated, Status', 'required'),
			
			array('id_vendor, PONo, POMonth, POYear, RevisionNumber, TermOfPayment,  is_mutliple_item', 'numerical', 'integerOnly'=>true),
			array('id_po_category', 'numerical', 'integerOnly'=>true),
			array('discount, pbbkb, ppn, pph15, pph23, others','numerical'),
			array('up, SignName', 'length', 'max'=>200),
			array('PONumber, DeliveryPlace', 'length', 'max'=>250),
			array('created_user, approved_user', 'length', 'max'=>45),
			array('ip_user_updated, ip_user_approved, approval_date', 'length', 'max'=>50),
			array('approval_notes','length', 'max'=>250),
			array('Status_approval','numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_purchase_order, id_purchase_request, id_vendor, up, PONumber, PODate, PONo, POMonth, POYear, RevisionNumber, TermOfPayment, ppn, pph15, pph23, others, notes, DeliveryDateRangeStart,DeliveryPlace,  DeliveryDateRangeEnd, is_mutliple_item, SignName, PONotes, created_user, created_date, ip_user_updated, Status, VesselName_VoyageOrderNumber, CategoryName, VendorName', 'safe', 'on'=>'search'),
			array('id_purchase_order, id_purchase_request, PoCategoryDetail, id_vendor, up, PONumber, PODate, PONo, POMonth, POYear, RevisionNumber, TermOfPayment, ppn, pph15, pph23, others, notes, DeliveryDateRangeStart,DeliveryPlace,  DeliveryDateRangeEnd, is_mutliple_item, SignName, PONotes, created_user, created_date, ip_user_updated, Status, Status_approval, VesselName_VoyageOrderNumber, VendorName, CategoryName', 'safe', 'on'=>'searchbycategory'),
			array('id_purchase_order, id_purchase_request, PoCategoryDetail, id_vendor, up, PONumber, PODate, PONo, POMonth, POYear, RevisionNumber, TermOfPayment, ppn, pph15, pph23, others, notes, DeliveryDateRangeStart,DeliveryPlace,  DeliveryDateRangeEnd, is_mutliple_item, SignName, PONotes, created_user, created_date, ip_user_updated, Status, Status_approval, VesselName_VoyageOrderNumber, VendorName, CategoryName', 'safe', 'on'=>'searchDefault'),
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
			'PoCategory' => array(self::BELONGS_TO, 'PoCategory', 'id_po_category'),
			'PurchaseOrderDetail' => array(self::HAS_MANY, 'PurchaseOrderDetail', 'id_purchase_order'),
			//'PurchaseOrderDetailOne' => array(self::HAS_ONE, 'PurchaseOrderDetail', 'id_purchase_order'),
			//'Vessel' => array(self::BELONGS_TO, 'Vessel', 'id_vessel'),
			//'MetricPr' => array(self::BELONGS_TO, 'MstMetricPr', 'metric'),
			'Vendor' => array(self::BELONGS_TO, 'Vendor', 'id_vendor'),
			//'Currency' => array(self::BELONGS_TO, 'Currency', 'id_currency'),
			'PurchaseRequest' => array(self::BELONGS_TO, 'PurchaseRequest', 'id_purchase_request'),
			'PurchaseRequestVoyage' => array(self::BELONGS_TO, 'PurchaseRequest', 'id_purchase_request'),
			'Vessel'=> array(self::BELONGS_TO, 'Vessel', array('id_vessel'=>'id_vessel'),'through'=>'PurchaseRequest'),
			'VoyageOrder'=> array(self::BELONGS_TO, 'VoyageOrder', array('id_voyage_order'=>'id_voyage_order'),'through'=>'PurchaseRequestVoyage'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_purchase_order' => 'ID Purchase Order',
			'id_purchase_request' => 'ID Purchase Request',
			'id_vendor' => 'Vendor',
			'up' => 'Up',
			'PONumber' => 'PO Number',
			'PODate' => 'PO Date',
			'id_po_category' => 'PO Category',
			'PONo' => 'PO. No',
			'POMonth' => 'PO Month',
			'POYear' => 'PO Year',
			'RevisionNumber' => 'Revision Number',
			'TermOfPayment' => 'Term Of Payment',
			'ppn' => 'PPN',
			'pph15' => 'PPH 15',
			'pph23' => 'PPH 23',
			'others' => 'Others',
			'notes' => 'Notes',
			'DeliveryDateRangeStart' => 'Start',
			'DeliveryPlace'=>'Delivery Place',
			'DeliveryDateRangeEnd' => 'End',
			'is_mutliple_item' => 'Is Mutliple Item',
			'SignName' => 'Sign Name',
			'PONotes' => 'PO Notes',
			'created_user' => 'Created User',
			'created_date' => 'Created Date',
			'ip_user_updated' => 'IP User Created',
			'Status' => 'Status',
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
	public function search($page=15)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with=array('Vessel','VoyageOrder','PoCategory','Vendor');
        $criteria->together=true;
		$criteria->condition = 'Vessel.VesselName LIKE :data OR VoyageOrder.VoyageOrderNumber LIKE :data ';
        $criteria->params = array(':data'=>'%'.trim($this->VesselName_VoyageOrderNumber).'%');
		
		$criteria->compare('PoCategory.category_name',$this->CategoryName,true);
		$criteria->compare('Vendor.VendorName',$this->VendorName,true);
		
		$criteria->compare('t.id_purchase_order',$this->id_purchase_order,false);
		$criteria->compare('t.id_purchase_request',$this->id_purchase_request,false);
		$criteria->compare('t.id_vendor',$this->id_vendor);
		$criteria->compare('t.up',$this->up,true);
		$criteria->compare('t.PONumber',$this->PONumber,true);
		$criteria->compare('t.PODate',$this->PODate,true);
		$criteria->compare('t.PONo',$this->PONo);
		$criteria->compare('t.POMonth',$this->POMonth);
		$criteria->compare('t.POYear',$this->POYear);
		$criteria->compare('t.RevisionNumber',$this->RevisionNumber);
		$criteria->compare('t.TermOfPayment',$this->TermOfPayment);
		$criteria->compare('t.ppn',$this->ppn);
		$criteria->compare('t.pph15',$this->pph15);
		$criteria->compare('t.pph23',$this->pph23);
		$criteria->compare('t.others',$this->others);
		$criteria->compare('t.notes',$this->notes,true);
		$criteria->compare('t.DeliveryDateRangeStart',$this->DeliveryDateRangeStart,true);
		$criteria->compare('t.DeliveryPlace',$this->DeliveryPlace,true);
		$criteria->compare('t.DeliveryDateRangeEnd',$this->DeliveryDateRangeEnd,true);
		$criteria->compare('t.is_mutliple_item',$this->is_mutliple_item);
		$criteria->compare('t.SignName',$this->SignName,true);
		$criteria->compare('t.PONotes',$this->PONotes,true);
		$criteria->compare('t.created_user',$this->created_user,true);
		$criteria->compare('t.created_date',$this->created_date,true);
		$criteria->compare('t.ip_user_updated',$this->ip_user_updated,true);
		$criteria->compare('t.Status',$this->Status,true);
		$pagination = array('pageSize'=>$page);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>$pagination,
			'sort'=>array(
				'defaultOrder'=>'PODate DESC',
				'attributes'=>array(
				
					// ini masih ke vessel aja dedicatetnya 
				  'VesselName_VoyageOrderNumber'=>array(
					 'asc'=>'Vessel.VesselName ASC',
					 'desc'=>'Vessel.VesselName DESC',
				  ),
				  
				  
				  'CategoryName'=>array(
					 'asc'=>'PoCategory.category_name ASC',
					 'desc'=>'PoCategory.category_name DESC',
				  ),
				  
				  'VendorName'=>array(
					 'asc'=>'Vendor.VendorName ASC',
					 'desc'=>'Vendor.VendorName DESC',
				  ),


				  '*',
								),
							),
		));
	}
	
	public function searchDefault($page=15)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with=array('Vessel','VoyageOrder','PoCategory','Vendor');
        $criteria->together=true;
		if(isset($this->PurchaseRequest)){
			if($this->PurchaseRequest->dedicated_to == "VESSEL") {
				$criteria->condition = 'Vessel.VesselName LIKE :data';
				$criteria->params = array(':data'=>'%'.trim($this->VesselName_VoyageOrderNumber).'%');
			}else{
				//OR VoyageOrder.VoyageOrderNumber LIKE :data 
			}
		}
		//$criteria->condition = 'Vessel.VesselName LIKE :data OR VoyageOrder.VoyageOrderNumber LIKE :data ';
        //$criteria->params = array(':data'=>'%'.trim($this->VesselName_VoyageOrderNumber).'%');
		
		$criteria->compare('PoCategory.category_name',$this->CategoryName,true);
		$criteria->compare('Vendor.VendorName',$this->VendorName,true);
		
		$criteria->compare('t.id_purchase_order',$this->id_purchase_order,false);
		$criteria->compare('t.id_purchase_request',$this->id_purchase_request,false);
		$criteria->compare('t.id_vendor',$this->id_vendor);
		$criteria->compare('t.up',$this->up,true);
		$criteria->compare('t.PONumber',$this->PONumber,true);
		$criteria->compare('t.PODate',$this->PODate,true);
		$criteria->compare('t.PONo',$this->PONo);
		$criteria->compare('t.POMonth',$this->POMonth);
		$criteria->compare('t.POYear',$this->POYear);
		$criteria->compare('t.RevisionNumber',$this->RevisionNumber);
		$criteria->compare('t.TermOfPayment',$this->TermOfPayment);
		$criteria->compare('t.ppn',$this->ppn);
		$criteria->compare('t.pph15',$this->pph15);
		$criteria->compare('t.pph23',$this->pph23);
		$criteria->compare('t.others',$this->others);
		$criteria->compare('t.notes',$this->notes,true);
		$criteria->compare('t.DeliveryDateRangeStart',$this->DeliveryDateRangeStart,true);
		$criteria->compare('t.DeliveryPlace',$this->DeliveryPlace,true);
		$criteria->compare('t.DeliveryDateRangeEnd',$this->DeliveryDateRangeEnd,true);
		$criteria->compare('t.is_mutliple_item',$this->is_mutliple_item);
		$criteria->compare('t.SignName',$this->SignName,true);
		$criteria->compare('t.PONotes',$this->PONotes,true);
		$criteria->compare('t.created_user',$this->created_user,true);
		$criteria->compare('t.created_date',$this->created_date,true);
		$criteria->compare('t.ip_user_updated',$this->ip_user_updated,true);
		$criteria->compare('t.Status',$this->Status,true);
		$pagination = array('pageSize'=>$page);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>$pagination,
			'sort'=>array(
				'defaultOrder'=>'PODate DESC',
				'attributes'=>array(
				
					// ini masih ke vessel aja dedicatetnya 
				  'VesselName_VoyageOrderNumber'=>array(
					 'asc'=>'Vessel.VesselName ASC',
					 'desc'=>'Vessel.VesselName DESC',
				  ),
				  
				  
				  'CategoryName'=>array(
					 'asc'=>'PoCategory.category_name ASC',
					 'desc'=>'PoCategory.category_name DESC',
				  ),
				  
				  'VendorName'=>array(
					 'asc'=>'Vendor.VendorName ASC',
					 'desc'=>'Vendor.VendorName DESC',
				  ),


				  '*',
								),
							),
		));
	}



	public function searchbycategory()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		
		$criteria=new CDbCriteria;
		//$criteria->with=array('PurchaseOrderDetail','Vessel','VoyageOrder');
		//$criteria->group = 't.id_purchase_order'; // tambahkan group biar bener tampilkan datanya
        $criteria->together=true;
		//$criteria->condition = 'Vessel.VesselName LIKE :data OR VoyageOrder.VoyageOrderNumber LIKE :data ';
        //$criteria->params = array(':data'=>'%'.trim($this->VesselName_VoyageOrderNumber).'%');

        //$criteria->compare('PurchaseOrderDetail.id_po_category',$this->PoCategoryDetail);
		$criteria->compare('t.id_purchase_order',$this->id_purchase_order,false);
		$criteria->compare('t.id_purchase_request',$this->id_purchase_request,false);
		$criteria->compare('t.id_vendor',$this->id_vendor);
		$criteria->compare('t.id_po_category',$this->id_po_category);
		$criteria->compare('t.up',$this->up,true);
		$criteria->compare('t.PONumber',$this->PONumber,true);
		$criteria->compare('t.PODate',$this->PODate,true);
		$criteria->compare('t.PONo',$this->PONo);
		$criteria->compare('t.POMonth',$this->POMonth);
		$criteria->compare('t.POYear',$this->POYear);
		$criteria->compare('t.RevisionNumber',$this->RevisionNumber);
		$criteria->compare('t.TermOfPayment',$this->TermOfPayment);
		$criteria->compare('t.ppn',$this->ppn);
		$criteria->compare('t.pph15',$this->pph15);
		$criteria->compare('t.pph23',$this->pph23);
		$criteria->compare('t.others',$this->others);
		$criteria->compare('t.notes',$this->notes,true);
		$criteria->compare('t.DeliveryDateRangeStart',$this->DeliveryDateRangeStart,true);
		$criteria->compare('t.DeliveryPlace',$this->DeliveryPlace,true);
		$criteria->compare('t.DeliveryDateRangeEnd',$this->DeliveryDateRangeEnd,true);
		$criteria->compare('t.is_mutliple_item',$this->is_mutliple_item);
		$criteria->compare('t.SignName',$this->SignName,true);
		$criteria->compare('t.PONotes',$this->PONotes,true);
		$criteria->compare('t.created_user',$this->created_user,true);
		$criteria->compare('t.created_date',$this->created_date,true);
		$criteria->compare('t.ip_user_updated',$this->ip_user_updated,true);
		$criteria->compare('t.Status',$this->Status,true);
		$criteria->compare('t.Status_approval',$this->Status_approval,true);

		$pagination = array('pageSize'=>15);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>$pagination,
			
			'sort'=>array(
				'defaultOrder'=>'PODate DESC',
				'attributes'=>array(

				  'VesselName_VoyageOrderNumber'=>array(
					 'asc'=>'Vessel.VesselName ASC',
					 'desc'=>'Vessel.VesselName DESC',
				  ),


				  '*',
								),
				),
			
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PurchaseOrder the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
