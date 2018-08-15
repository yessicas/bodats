<?php

class PurchaseorderController extends Controller
{
	/**
	* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	* using two-column layout. See 'protected/views/layouts/column2.php'.
	*/
	public $layout='//layouts/twoplets';

	/**
	* @return array action filters
	*/
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	* Specifies the access control rules.
	* This method is used by the 'accessControl' filter.
	* @return array access control rules
	*/
	public function accessRules()
	{
		return array(
			/*
			array('allow',  // allow all users to perform 'index' and 'view' actions
			'actions'=>array('index','view'),
			'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
			'actions'=>array('create','update'),
			'users'=>array('@'),
			),
			*/

			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('adminapproval','approve','reject','manyaction','Adminapproved','rollback'),
				//'users'=>array('@'),
				'roles'=>array('ADM', 'HPRO'),
			),
		
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','findotherdatavendors','report','viewreport','prapproved','po',
							'create','update', 'index', 'view',
							'managepo', 'createpomultiplepr','autovendor',
							'managepritem',
							'manageposingle'
						),
				//'users'=>array('@'),
				'roles'=>array('ADM', 'PRO'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions'=>array('createpomultipleitem', 'updatepo', 'deleteitempo'
				),
				'roles'=>array('ADM', 'PRO'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	* Displays a particular model.
	* @param integer $id the ID of the model to be displayed
	*/

	public function actionPrapproved()
	{
		$model=new PurchaseRequest('searchstatusapproved');
		$model->unsetAttributes();  // clear any default values

		if(isset($_GET['PurchaseRequest']))
		$model->attributes=$_GET['PurchaseRequest'];	


		$this->render('prapproved',array(
		'model'=>$model,
		));
	}
	
	public function actionManagepo()
	{
		//$model=new PurchaseRequest('searchstatuspo');
		$model=new PurchaseRequest('search');
		$model->unsetAttributes();  // clear any default values

		if(isset($_GET['PurchaseRequest']))
			$model->attributes=$_GET['PurchaseRequest'];	
			
		/// page size nya
		if (isset($_GET['pageSize'])) {
			Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
			unset($_GET['pageSize']);
		}

		$model->Status='PR APPROVED';
		
		$this->render('adminpo',array(
			'model'=>$model,
		));
	}
	
	public function actionManageposingle($mode)
	{
		//$model=new PurchaseRequest('searchstatuspo');
		$model=new PurchaseRequest('search');
		$model->unsetAttributes();  // clear any default values

		if(isset($_GET['PurchaseRequest']))
			$model->attributes=$_GET['PurchaseRequest'];

		/// page size nya
		if (isset($_GET['pageSize'])) {
			Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
			unset($_GET['pageSize']);
		}

		if($mode != ""){
			switch($mode){
				case "fuel":
					$model->id_po_category='10100'; // Ini terkait untuk fuel
					break;
					
				case "fresh_water":
					$model->id_po_category='10200'; // Ini terkait untuk fresh water
					break;
					
				case "agency":
					$model->id_po_category='20100'; // Ini terkait untuk agency
					break;
				
				case "survey_class":
					$model->id_po_category='20201'; // Ini terkait untuk survey class
					break;
					
				case "rent_vessel":
					$model->id_po_category='30000'; // Ini terkait untuk rent vessel
					break;
					
				case "cs_part_asset":
					$model->id_po_category='10400'; // Ini terkait untuk fuel
					break;
			}
		}
		$model->Status='PR APPROVED';
		
		$this->render('adminpo',array(
			'model'=>$model,
			'mode'=>$mode,
		));
	}
	
	public function actionManagepritem($mode="")
	{
		//$model=new PurchaseRequest('searchstatuspo');
		$model=new PurchaseRequestDetail('search', true);
		$model->unsetAttributes();  // clear any default values

		if(isset($_GET['PurchaseRequestDetail']))
			$model->attributes=$_GET['PurchaseRequestDetail'];	
			
		
		/// page size nya
		if (isset($_GET['pageSize'])) {
			Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
			unset($_GET['pageSize']);
		}
		
		
		$model->status ='PR APPROVED';
		//$model->PRPOCategory ='10400'; // Ini terkait untuk consumable stock
		$model = PurchaseRequestDB::getPRFilterByMode($model, $mode);
		
		$this->render('adminpritem',array(
			'model'=>$model,
			'mode'=>$mode,
		));
	}

	public function actionPo()
	{
		$model=new PurchaseRequest('searchstatuspo');
		$model->unsetAttributes();  // clear any default values

		if(isset($_GET['PurchaseRequest']))
			$model->attributes=$_GET['PurchaseRequest'];	


		$this->render('po',array(
		'model'=>$model,
		));
	}
	
	public function actionCreatepomultiplepr($scid=""){
		$cid = null;
		$is_single = false;
		if(isset($_POST['cid']))
			$cid = $_POST['cid'];
		
		if($scid != ""){
			$cid[$scid] = 0;
			$is_single = true;
		}
			
		$modelpo=new PurchaseOrder;
		
		if(isset($_POST['PurchaseOrder']))
		{			
			$items = $_POST['item'];
			//1. Create General Info of PO
			foreach($items as $key=>$qtyitems){
				//echo $key."<===key<br>";
				$id_purchase_request = $key;
				$modelpo = PurchaseOrderDB::savePurchaseOrder($id_purchase_request);
				break; 
				//Break supaya diambil cukup satu data saja yang mewakili PR untuk dijadikan satu data PO
			}
			
			//2. Generate Detail Item of PO
			$id_purchase_order = $modelpo->id_purchase_order;
			if($id_purchase_order > 0){
				foreach($items as $key=>$qtyitems){
					//echo $key."<===key<br>";
					$id_purchase_request = $key;
					foreach ($qtyitems as $prdetailitem=>$item){
						
						//$id_purchase_request = $prdetailitem;
						$quantity = $item['qty'];
						$metric = $item['metric'];
						$price_unit = $item['price'];
						$id_currency = $item['currency'];
						$ppn = $item['ppn'];
						$notes = $item['notes'];
						$id_purchase_request_detail = $item['idprdet'];
						PurchaseOrderDB::savePurchaseOrderItem($id_purchase_request_detail, $id_purchase_request, $id_purchase_order, $quantity, $metric, $price_unit, $id_currency, $ppn, $notes);
					}
					
					//Update PR
					PurchaseOrderDB::updatePRbecomePO($id_purchase_request, $id_purchase_order);
				}
			}
			
			Yii::app()->user->setFlash('success', "PO has created.");
			$this->redirect(array('view','id'=>$id_purchase_order));
		}
		
		if($cid != null){
			$this->render('createpomultiplepr',array(
				'cid'=>$cid,
				'modelpo'=>$modelpo,
				'is_single'=>$is_single,
			));
		}else{
			Yii::app()->user->setFlash('success', "You must select one of PR first!");
			$this->redirect(array('managepo'));		
		}
	}

	public function actionCreatepomultipleitem($scid=""){
		$cid = null;
		$is_single = false;
		if(isset($_POST['cid']))
			$cid = $_POST['cid'];
		
		if($scid != ""){
			$cid[$scid] = 0;
			$is_single = true;
		}
			
		$modelpo=new PurchaseOrder;
		
		if(isset($_POST['PurchaseOrder']))
		{			
			$items = $_POST['item'];
			//1. Create General Info of PO
			foreach($items as $key=>$qtyitems){
				echo $key."<===key".$qtyitems."<br>";
				$id_purchase_request_item = $key;
				$modelpo = PurchaseOrderDB::savePurchaseOrder($id_purchase_request_item, true); //true ==> multiple item
				
				break; 
				//Break supaya diambil cukup satu data saja yang mewakili PR untuk dijadikan satu data PO
			}

			//2. Generate Detail Item of PO
			$id_purchase_order = $modelpo->id_purchase_order;
			if($id_purchase_order > 0){
				foreach($items as $key=>$qtyitems){
					//echo $key."<===key<br>";
					$id_purchase_request = $key;
					foreach ($qtyitems as $prdetailitem=>$item){
						
						//$id_purchase_request = $prdetailitem;
						$quantity = $item['qty'];
						$metric = $item['metric'];
						$price_unit = $item['price'];
						$id_currency = $item['currency'];
						$ppn = $item['ppn'];
						$notes = $item['notes'];
						$id_purchase_request_detail = $item['idprdet'];
						PurchaseOrderDB::savePurchaseOrderItemModeSelectItem($id_purchase_request_detail, $id_purchase_request /* ini bermasalah*/ , $id_purchase_order, $quantity, $metric, $price_unit, $id_currency, $ppn, $notes);
						//exit();
					}
					
					//Update PR
					PurchaseOrderDB::updatePRbecomePO($id_purchase_request, $id_purchase_order);
				}
			}
			
			Yii::app()->user->setFlash('success', "PO has created.");
			$this->redirect(array('view','id'=>$id_purchase_order));
		}
		
		if($cid != null){
			$this->render('createpomultipleitem',array(
				'cid'=>$cid,
				'modelpo'=>$modelpo,
				'is_single'=>$is_single,
			));
		}else{
			Yii::app()->user->setFlash('success', "You must select one of item first!");
			$this->redirect(array('managepritem'));		
		}
	}

	public function actionView($id)
	{
		//$modelpr=$this->loadModelpr($id);
		$modelpo=$this->loadModel($id);

		$this->render('viewpo',array(
			'model'=>$modelpo,
			//'modelpr'=>$modelpr,
		));
	}
	
	public function actionDeleteitempo($idpo,$iddet)
	{
		$modelpodetail=$this->loadModelpodetail($iddet);
		$id_purchase_request_detail = $modelpodetail->id_purchase_request_detail;
		//Delete Item
		$modelprdetail=$this->loadModelprdetail($id_purchase_request_detail);
		
		if($modelpodetail->delete()){
			//Kembalikan status untuk PR Itemnya
			if($modelprdetail->approved_user != ""){
				$modelprdetail->status = "PR APPROVED";
			}else{
				$modelprdetail->status = "PR";
			}
			$modelprdetail->status = "PR APPROVED";
			$modelprdetail->id_purchase_order_detail = 0;
			if($modelprdetail->validate()){
				$modelprdetail->save();
				//echo $id_purchase_request_detail."-".$modelprdetail->status;
				//exit();
			}
			
			Yii::app()->user->setFlash('success', "Remove item PO has done.");
			$this->redirect(array('updatepo','id'=>$idpo));
		}

		
	}
	
	public function actionUpdatepo($id)
	{
		//$modelpr=$this->loadModelpr($id);
		$modelpo=$this->loadModel($id);
		
		if(isset($_POST['PurchaseOrder']))
		{			
			//Save PO
			$datain = $_POST['PurchaseOrder'];
			//echo $datain["DeliveryDateRangeStart"]; exit();
			$modelpo = PurchaseOrderDB::saveUpdatePurchaseOrder($modelpo); 
			
			//2. Generate Detail Item of PO
			$id_purchase_order = $modelpo->id_purchase_order;
			$modeldetails = PurchaseOrderDetail::model()->findAllByAttributes(array('id_purchase_order'=>$modelpo->id_purchase_order));
			if($id_purchase_order > 0){
				$items= $_POST['item'];
				foreach($modeldetails as $modeldetail){
					//echo $modeldetail->id_purchase_order_detail;
					if(isset($items[$modeldetail->id_purchase_order_detail]))
					{
						//$id_purchase_request = $prdetailitem;
						$item = $items[$modeldetail->id_purchase_order_detail];
						$quantity = $item['qty'];
						
						$metric = $item['metric'];
						$price_unit = $item['price'];
						$id_currency = $item['currency'];
						$ppn = $item['ppn'];
						$notes = $item['notes'];
						$id_purchase_order_detail = $item['idpodet'];
						
						$modeldetail->quantity=$quantity;
						$modeldetail->metric=$metric;
						$modeldetail->price_unit=$price_unit;
						$modeldetail->id_currency=$id_currency;
						$modeldetail->ppn=$ppn;
						$modeldetail->notes=$notes;
						
						if($modeldetail->validate()){
							if($modeldetail->save()){
							}
						}
					}
					
					//Update PR
					//PurchaseOrderDB::updatePRbecomePO($id_purchase_request, $id_purchase_order);
				}
			}
			
			
			Yii::app()->user->setFlash('success', "PO has updated.");
			$this->redirect(array('view','id'=>$id));
			
		}

		$this->render('updatepo',array(
			'modelpo'=>$modelpo,
			'id'=>$id
			//'modelpr'=>$modelpr,
		));
	}

	/*
	public function actionViewreport($id)
	{
		$this->layout='//layouts/laporan';
		$modelpr=$this->loadModelpr($id);
		$this->render('report',array(
		'model'=>$this->loadModelbyattpr($id),
		'modelpr'=>$modelpr,
		));
	}
	*/
	
	public function actionViewreport($id)
	{
		$this->layout='//layouts/laporan';
		//$modelpr=$this->loadModelpr($id);
		$model=$this->loadModel($id);
		$this->render('poreport',array(
			'model'=>$model,
			//'model'=>$this->loadModelbyattpr($id),
			//'modelpr'=>$modelpr,
		));
	}

	/*
	public function actionReport($id)
	{
		$this->layout='//layouts/laporan';

		$mPDF1 = Yii::app()->ePdf->mpdf();
			  $mPDF1 = Yii::app()->ePdf->mpdf('c', 'A4');
			  $mPDF1 = Yii::app()->ePdf->mpdf('',    // mode - default ''
				 '',    // format - A4, for example, default ''
				 0,     // font size - default 0
				 '',    // default font family
				 15,    // margin_left
				 15,    // margin right
				 15,     // margin top
				 16,    // margin bottom
				 9,     // margin header
				 9,     // margin footer
				 'L');  // L - landscape, P - portrait
			  //$mPDF1->SetHTMLHeader("<hr>");
			  //$mPDF1->SetHTMLHeader('header');
			  //$mPDF1->SetDisplayMode('fullpage');
			  //$mPDF1->Output();

		$modelpr=$this->loadModelpr($id);
		$mPDF1->WriteHTML(
		$this->render('report',array(
		'model'=>$this->loadModelbyattpr($id),
		'modelpr'=>$modelpr,
		),true)
			);

		$mPDF1->Output();
	}
	*/
	
	public function actionReport($id)
	{
		set_time_limit(0);
		ini_set("memory_limit","512M");
		$this->layout='//layouts/laporan';

		$mPDF1 = Yii::app()->ePdf->mpdf();
			  //$mPDF1 = Yii::app()->ePdf->mpdf('c', 'A4');
			  $mpdf=new mPDF('utf-8', array(216,304.8)); // dalam mm ukuran Fanfold (21.6 x 30.48 dalam cm)
			  $mPDF1 = Yii::app()->ePdf->mpdf('',    // mode - default ''
				 '',    // format - A4, for example, default ''
				 0,     // font size - default 0
				 '',    // default font family
				 5,    // margin_left
				 5,    // margin right
				 5,     // margin top
				 5,    // margin bottom
				 9,     // margin header
				 9,     // margin footer
				 'L');  // L - landscape, P - portrait
			  //$mPDF1->SetHTMLHeader("<hr>");
			  //$mPDF1->SetHTMLHeader('header');
			  //$mPDF1->SetDisplayMode('fullpage');
			  //$mPDF1->Output();

		$model=$this->loadModel($id);
		$mPDF1->WriteHTML(
		$this->render('poreport',array(
			'model'=>$model,
		),true)
			);

		$mPDF1->Output();
	}

	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionCreate($id)
	{
		$model=new PurchaseOrder;
		$modelpr=$this->loadModelpr($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PurchaseOrder']))
		{
			$model->attributes=$_POST['PurchaseOrder'];

			$model->id_purchase_request=$id;
			$model->Status='PO';
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
			$model->TermOfPayment=Vendor::model()->findByPk($_POST['PurchaseOrder']['id_vendor'])->term_of_payment;

			if($model->save()){

				// insert nomornya
				$modelNew= new PurchaseOrder;
				$updateModel=PurchaseOrder::model()->findByPk($model->id_purchase_order);
				$dataformatnumber=NumberingDocumentDBPurchaseOrder::getFormatNumber($modelNew,'id_purchase_order','PONo','POMonth','POYear',$model->id_purchase_order);
				$updateModel->PONumber = $dataformatnumber['NumberFormat']; 
				$updateModel->PONo = $dataformatnumber['NoOrder']; 
				$updateModel->POMonth = NumberingDocumentDBPurchaseOrder::getMonthNow(); 
				$updateModel->POYear = NumberingDocumentDBPurchaseOrder::getYearNow(); 
				$updateModel->save(false);



				$updatepr=$this->loadModelpr($model->id_purchase_request);
				$updatepr->Status='PO';
				$updatepr->save(false);

				Yii::app()->user->setFlash('success', " Data Saved");
				//$this->redirect(array('view','id'=>$model->id_purchase_request));
				$this->redirect(array('view','id'=>$model->id_purchase_order));
			}
		}


		$this->render('create',array(
		'model'=>$model,
		'modelpr'=>$modelpr,
		));
	}

	/**
	* Updates a particular model.
	* If update is successful, the browser will be redirected to the 'view' page.
	* @param integer $id the ID of the model to be updated
	*/
	public function actionUpdate($id)
	{
		//$model=$this->loadModel($id);
		$model=$this->loadModelbyattpr($id);
		$modelpr=$this->loadModelpr($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PurchaseOrder']))
		{
			$model->attributes=$_POST['PurchaseOrder'];
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_created=$_SERVER['REMOTE_ADDR'];
			if($model->save())
			{
				Yii::app()->user->setFlash('success', " Data Updated");
				$this->redirect(array('view','id'=>$model->id_purchase_order));
			}
		}


		$this->render('update',array(
		'model'=>$model,
		'modelpr'=>$modelpr,
		));
	}

	/**
	* Deletes a particular model.
	* If deletion is successful, the browser will be redirected to the 'admin' page.
	* @param integer $id the ID of the model to be deleted
	*/
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
		throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	* Lists all models.
	*/
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('PurchaseOrder');
		$this->render('index',array(
		'dataProvider'=>$dataProvider,
		));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new PurchaseOrder('searchDefault');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PurchaseOrder']))
		$model->attributes=$_GET['PurchaseOrder'];

		$this->render('admin',array(
		'model'=>$model,
		));
	}




	public function actionAdminapproval($mode="")
	{
		$model=new PurchaseOrder('searchbycategory');
		$model->unsetAttributes();  // clear any default values

		if(isset($_GET['PurchaseOrder']))
		$model->attributes=$_GET['PurchaseOrder'];
		
		$model = PurchaseRequestDB::getPRFilterByMode($model, $mode);
		/*
		if($mode != ""){
			switch($mode){
				case "fuel":
					$model->PoCategoryDetail='10100'; // Ini terkait untuk fuel
					break;
					
				case "fresh_water":
					$model->PoCategoryDetail='10200'; // Ini terkait untuk fuel
					break;
					
				case "agency":
					$model->PoCategoryDetail='20100'; // Ini terkait untuk fuel
					break;
					
				case "cs_part_asset":
					$model->PoCategoryDetail='10400'; // Ini terkait untuk consumable stock
					break;
					
				case "survey":
					$model->PoCategoryDetail='20201'; // Ini terkait untuk consumable stock
					break;
					
				case "rent":
					$model->PoCategoryDetail='30000'; // Ini terkait untuk consumable stock
					break;
			}
		}
		*/
		$model->Status_approval=0;



		$this->render('adminapproval',array(
			'model'=>$model,
			'mode'=>$mode,
		));
	}


	public function actionAdminapproved($approved=1,$mode="") //1=approved ; 2=rejected
	{
		$model=new PurchaseOrder('searchbycategory');
		$model->unsetAttributes();  // clear any default values

		if(isset($_GET['PurchaseOrder']))
		$model->attributes=$_GET['PurchaseOrder'];

		
		$model = PurchaseRequestDB::getPRFilterByMode($model, $mode);
		/*
		if($mode != ""){
			switch($mode){
				case "fuel":
					$model->PoCategoryDetail='10100'; // Ini terkait untuk fuel
					break;
					
				case "fresh_water":
					$model->PoCategoryDetail='10200'; // Ini terkait untuk fuel
					break;
					
				case "agency":
					$model->PoCategoryDetail='20100'; // Ini terkait untuk fuel
					break;
					
				case "cs_part_asset":
					$model->PoCategoryDetail='10400'; // Ini terkait untuk consumable stock
					break;
					
				case "survey":
					$model->PoCategoryDetail='20201'; // Ini terkait untuk consumable stock
					break;
					
				case "rent":
					$model->PoCategoryDetail='30000'; // Ini terkait untuk consumable stock
					break;
			}
		}
		*/

		$status = "";
		if($approved ==1){
			$model->Status_approval=1;
			$status = "approved";
		}
			
		if($approved ==2){
			$model->Status_approval=2;
			$status = "rejected";
		}

		
		$this->render('adminapproved',array(
			'model'=>$model,
			'status'=>$status,
			'mode'=>$mode,
		));
	}


	public function actionApprove($id)
	{
		$model=$this->loadModel($id);
		$model->Status_approval=1;
		$model = LogUserUpdated::setUserApproved($model);
		$model->save();
		
		//NotificationDB::sendApprovedNotificationPR($model,1);

		echo'<div class="alert in alert-block fade alert-success">';
		echo'<a href="#" class="close" data-dismiss="alert">'.'x'.'</a>';
		echo'PO has been approved.';
		echo'</div>';
	}

	public function actionReject($id)
	{
		$model=$this->loadModel($id);
		$model = LogUserUpdated::setUserApproved($model);
		$model->Status_approval=2;
		$model->save();
		
		//NotificationDB::sendApprovedNotificationPR($model,0);

		echo'<div class="alert in alert-block fade alert-error">';
		echo'<a href="#" class="close" data-dismiss="alert">'.'x'.'</a>';
		echo'PO has been rejected.';
		echo'</div>';
	}
	
	public function actionRollback($id)
	{
		$model=$this->loadModel($id);
		$id_purchase_request=$model->id_purchase_request;
		$model = LogUserUpdated::setUserApproved($model);
		$model->Status_approval=2; // di reject
		$model->save();
		
		/*
		// delete po
		$model->delete(); 
		// delete po detail
		PurchaseOrderDetail::model()->deleteAll(array(
					   'condition' => 'id_purchase_order = :id_purchase_order',
					   'params' => array(
						   ':id_purchase_order' => $id,
					   ),
				   ));\
		*/
		
		// change status pr tu pr / purpose
		$pr = PurchaseRequest::model()->findByPk($id_purchase_request);
		$pr->Status='PR';
		$pr->approval_level=0;
		
		$pr->is_approved=0;
		$pr->approved_user=' ';
		$pr->approval_date='0000-00-00 00:00:00';
		$pr->ip_user_approved=' ';
		$pr->approval_notes=' ';
		
		$pr->is_approved2=0;
		$pr->approved_user2=' ';
		$pr->approval_date2='0000-00-00 00:00:00';
		$pr->ip_user_approved2=' ';
		$pr->approval_notes2=' ';
		
		$pr->is_approved3=0;
		$pr->approved_user3=' ';
		$pr->approval_date3='0000-00-00 00:00:00';
		$pr->ip_user_approved3=' ';
		$pr->approval_notes3=' ';
		
		$pr->id_purchase_order=0;
		
		$pr->save(false);
		
		//NotificationDB::sendApprovedNotificationPR($model,0);

		echo'<div class="alert in alert-block fade alert-error">';
		echo'<a href="#" class="close" data-dismiss="alert">'.'x'.'</a>';
		echo'PO has been Rollbacked.';
		echo'</div>';
	}


	public function actionManyaction()
    {
       
        $vari=array();

        if(isset($_POST['mode'])){
        	$mode=$_POST['mode'];
        }else{
       		$mode='';
        }

        if(isset($_POST['pilihan'])){
            $all=$_POST['pilihan'];


              if(isset($_POST['approvebutton'])) {

              		  foreach($all as $a=>$val){
			                $model=$this->loadModel($val);    
			                //$vari[$a]=array('id'=>$model->id_purchase_request);
			                $model->Status_approval=1;
							$model = LogUserUpdated::setUserApproved($model);
							$model->save();
							
			            }

					  Yii::app()->user->setFlash('success', "PO has been Approved");
        	 		  $this->redirect(array('purchaseorder/adminapproval','mode'=>$mode));

				} else if(isset($_POST['rejectbutton'])) {

					 foreach($all as $a=>$val){
			                $model=$this->loadModel($val);    
			                //$vari[$a]=array('id'=>$model->id_purchase_request);
			                $model = LogUserUpdated::setUserApproved($model);
							$model->Status_approval=2;
							$model->save();
			            }

					 Yii::app()->user->setFlash('success', "PO has been Rejected");
        	 		 $this->redirect(array('purchaseorder/adminapproval','mode'=>$mode));
				}



             /*
              $hasil=new CArrayDataProvider($vari, array(
                'keyField'=>'id',
            ));
           
            $this->render('coba',array(
                'dataProvider'=>$hasil,
            ));

            */




        }else{

        	 Yii::app()->user->setFlash('success', "You Have to select PO");
        	 $this->redirect(array('purchaseorder/adminapproval','mode'=>$mode));

        }
     }



	public function actionFindotherdatavendors()
	{
		$id_vendor= $_POST['PurchaseOrder']['id_vendor'];
		$vendordata=Vendor::model()->findByPk($id_vendor);

		if($id_vendor!=''){
			if($vendordata){
				$data=array();
				$data['addressvendor']=$vendordata->Address;
				$data['contactvendor']=$vendordata->ContactName;
				
				echo CJSON::encode($data);
			}
			else{
				
				$data=array();
				$data['addressvendor']='';
				$data['contactvendor']='';
				echo CJSON::encode($data);

				//echo "Vessel Tug Ini Tidak sedang Berpasangan";
			}
		}else{
				$data=array();
				$data['addressvendor']='';
				$data['contactvendor']='';
				echo CJSON::encode($data);
		}
	}

	/**
	* Returns the data model based on the primary key given in the GET variable.
	* If the data model is not found, an HTTP exception will be raised.
	* @param integer the ID of the model to be loaded
	*/
	public function loadModel($id)
	{
		$model=PurchaseOrder::model()->findByPk($id);
		if($model===null)
		throw new CHttpException(404,'Purchase Order related does not exist.');
		return $model;
	}

	public function loadModelpr($id)
	{
		$model=PurchaseRequest::model()->findByPk($id);
		if($model===null)
		throw new CHttpException(404,'Purchase Request related does not exist.');
		return $model;
	}
	
	public function loadModelprdetail($id)
	{
		$model=PurchaseRequestDetail::model()->findByPk($id);
		if($model===null)
		throw new CHttpException(404,'Purchase Request Item Detail related does not exist.');
		return $model;
	}
	
	public function loadModelpodetail($id)
	{
		$model=PurchaseOrderDetail::model()->findByPk($id);
		if($model===null)
		throw new CHttpException(404,'PO Item Detail related does not exist.');
		return $model;
	}

	public function loadModelbyattpr($id)
	{
		$model=PurchaseOrder::model()->findByAttributes(array('id_purchase_request'=>$id));
		if($model===null)
		throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	/**
	* Performs the AJAX validation.
	* @param CModel the model to be validated
	*/
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='purchase-order-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	public function actionAutovendor()  
		  {  
			   $res =array();  
			   $row=array();  
			   if (isset($_GET['search'])) {  
					$sql ="SELECT * FROM  Vendor WHERE VendorName LIKE :VendorName ";  
					$command =Yii::app()->db->createCommand($sql);  
					$command->bindValue(":VendorName", ''.'%'.$_GET['search'].'%', PDO::PARAM_STR);  
					$res =$command->queryAll();  
					foreach($res as $value):  
						 $row[]=array(  
								   
							 
							  'id'=>$value['id_vendor'],  // return value from autocomplete 
							  'nama'=>$value['VendorName'], 
							  'alamat'=>$value['Address'],// value for input field  
							  'contact'=>$value['ContactName'],
							  
						 );   
					endforeach;  
			   }  
			   echo CJSON::encode($row);  
			   Yii::app()->end();            
		  }
}
