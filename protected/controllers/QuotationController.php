<?php

class QuotationController extends Controller
{
	/**
	* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	* using two-column layout. See 'protected/views/layouts/column2.php'.
	*/
	public $layout='//layouts/triplets';

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
		array('allow', // allow admin user to perform 'admin' and 'delete' actions
			'actions'=>array('admin','delete','update','view','viewTC','create', 'autocostumer','showopenquotation','selectquotation','report','viewreport','viewfinish',
					'viewTRANS'),
			'roles'=>array('ADM','MKT'),
		),
		array('deny',  // deny all users
			'roles'=>array('CUS','FIC','CRW','NAU','OPR'),
			'users'=>array('*'),
			),
		);
	}

	/**
	* Displays a particular model.
	* @param integer $id the ID of the model to be displayed
	*/
	public function actionView($id)
	{

	$modeldetail=new QuotationDetailVessel('searchbyquotation');
	$modeldetail->unsetAttributes();  // clear any default values
	if(isset($_GET['QuotationDetailVessel']))
	$modeldetail->attributes=$_GET['QuotationDetailVessel'];


	$this->render('view',array(
	'model'=>$this->loadModel($id),
	'modeldetail'=>$modeldetail,
	));
	}

	public function actionViewTC($id)
	{

	$modeldetail=new QuotationDetailVessel('searchbyquotation');
	$modeldetail->unsetAttributes();  // clear any default values
	if(isset($_GET['QuotationDetailVessel']))
	$modeldetail->attributes=$_GET['QuotationDetailVessel'];


	$this->render('viewTC',array(
	'model'=>$this->loadModel($id),
	'modeldetail'=>$modeldetail,
	));
	}

	public function actionViewfinish($id)
	{

	$modeldetail=new QuotationDetailVessel('searchbyquotation');
	$modeldetail->unsetAttributes();  // clear any default values
	if(isset($_GET['QuotationDetailVessel']))
	$modeldetail->attributes=$_GET['QuotationDetailVessel'];

	//Yii::app()->user->setFlash('success', " Data Saved");
	$this->render('viewfinish',array(
	'model'=>$this->loadModel($id),
	'modeldetail'=>$modeldetail,
	));
	}


	public function actionViewTRANS($id)
	{

	$modeldetail=new QuotationDetailVessel('searchbyquotation');
	$modeldetail->unsetAttributes();  // clear any default values
	if(isset($_GET['QuotationDetailVessel']))
	$modeldetail->attributes=$_GET['QuotationDetailVessel'];

	//Yii::app()->user->setFlash('success', " Data Saved");
	$this->render('viewTRANS',array(
	'model'=>$this->loadModel($id),
	'modeldetail'=>$modeldetail,
	));
	}

	public function actionreport($id)
	{

	$this->layout='//layouts/laporan';
	$modeldetail=new QuotationDetailVessel('searchbyquotation');
	$modeldetail->unsetAttributes();  // clear any default values
	if(isset($_GET['QuotationDetailVessel']))
	$modeldetail->attributes=$_GET['QuotationDetailVessel'];

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

	$mPDF1->WriteHTML(
	$this->render('report',array(
	'model'=>$this->loadModel($id),
	'modeldetail'=>$modeldetail,
	),true)
		);

	$mPDF1->Output();
	}


	public function actionviewreport($id)
	{

	$this->layout='//layouts/laporan';
	$modeldetail=new QuotationDetailVessel('searchbyquotation');
	$modeldetail->unsetAttributes();  // clear any default values
	if(isset($_GET['QuotationDetailVessel']))
	$modeldetail->attributes=$_GET['QuotationDetailVessel'];




	$this->render('report',array(
	'model'=>$this->loadModel($id),
	'modeldetail'=>$modeldetail,
	));
	}

	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionCreate()
	{
	$model=new Quotation;

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['Quotation']))
	{
	$model->attributes=$_POST['Quotation'];

	if ($_POST['Quotation']['customername'] <>''){
					$costumer=Customer::model()->findByAttributes(array('ContactName'=>$_POST['Quotation']['customername'],'id_customer'=>$_POST['Quotation']['id_customer']));
					if($costumer===null){
					$model->addError('customername', 'Costumer Tidak terdaftar!');
						}

					if($costumer==true){
					$model->addError('customername', 'Costumer Tidak terdaftar!');
						
					$model->created_date=date("Y-m-d H:i:s");
					$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
					$model->Status='QUOTATION';
					

					if($model->save()){
					Yii::app()->user->setFlash('success', " Data Saved");
					$this->redirect(array('view','id'=>$model->id_quotation));
					}
					}

	}

	}
	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('create',array(
	'model'=>$model,
	));
	}

	/**
	* Updates a particular model.
	* If update is successful, the browser will be redirected to the 'view' page.
	* @param integer $id the ID of the model to be updated
	*/
	public function actionUpdate($id)
	{
	$model=$this->loadModel($id);

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['Quotation']))
	{
	$model->attributes=$_POST['Quotation'];

	if ($_POST['Quotation']['customername'] <>''){
					$costumer=Customer::model()->findByAttributes(array('ContactName'=>$_POST['Quotation']['customername'],'id_customer'=>$_POST['Quotation']['id_customer']));
					if($costumer===null){
					$model->addError('customername', 'Costumer Tidak terdaftar!');
						}

					if($costumer==true){
					$model->addError('customername', 'Costumer Tidak terdaftar!');
						
					$model->created_date=date("Y-m-d H:i:s");
					$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

					if($model->save())
					{
					Yii::app()->user->setFlash('success', " Data Updated");
					$this->redirect(array('admin','id'=>$model->id_quotation));
					}
					}

	}


	}


	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('update',array(
	'model'=>$model,
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
	$dataProvider=new CActiveDataProvider('Quotation');
	$this->render('index',array(
	'dataProvider'=>$dataProvider,
	));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
	$model=new Quotation('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['Quotation']))
	$model->attributes=$_GET['Quotation'];

	$this->render('admin',array(
	'model'=>$model,
	));
	}

	/**
	* Returns the data model based on the primary key given in the GET variable.
	* If the data model is not found, an HTTP exception will be raised.
	* @param integer the ID of the model to be loaded
	*/
	public function loadModel($id)
	{
	$model=Quotation::model()->findByPk($id);
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
	if(isset($_POST['ajax']) && $_POST['ajax']==='quotation-form')
	{
	echo CActiveForm::validate($model);
	Yii::app()->end();
	}
	}


	public function actionAutocostumer()  
		  {  
			   $res =array();  
			   $row=array();  
			   if (isset($_GET['search'])) {  
					$sql ="SELECT * FROM  customer WHERE CompanyName LIKE :CompanyName ";  
					$command =Yii::app()->db->createCommand($sql);  
					$command->bindValue(":CompanyName", ''.'%'.$_GET['search'].'%', PDO::PARAM_STR);  
					$res =$command->queryAll();  
					foreach($res as $value):  
						 $row[]=array(  
								   
							 
							  'id'=>$value['id_customer'],  // return value from autocomplete 
							  'nama'=>$value['CompanyName'], 
							  'alamat'=>$value['Address'],// value for input field  
						 );   
					endforeach;  
			   }  
			   echo CJSON::encode($row);  
			   Yii::app()->end();            
		  }

	public function actionShowopenquotation()
	{
		$model=new Quotation('searchquotationstatus');
		$model->unsetAttributes(); // clear any default values
		if(isset($_GET['Quotation']))
		 $model->attributes=$_GET['Quotation'];

			/*
			$cs = Yii::app()->clientScript;
	        $cs->reset();
	        $cs->scriptMap = array(
	            'jquery.js' => false, // prevent produce jquery.js in additional javascript data
	            'jquery.min.js' => false,
	        );
	        */

		$this->renderPartial('gelist_openquotation',array(
		  'model'=>$model,
		),false,true);

		Yii::app()->end();
	}


	public function actionselectquotation($id)
	 {
	   $id_quotation='';
	   $quotationo='';
	   $id_customer='';
	   $customername='';
	   $customeraddress='';
	   $type_order='';

		$model=Quotation::model()->findByPk($id);
		$id_quotation=$model->id_quotation;
		$quotationo=$model->QuotationNumber;
		$customerid=$model->id_customer;
		$customername=$model->Customer->CompanyName;
		$customeraddress=$model->Customer->Address;
		$type_order=$model->BussinessTypeOrder->bussiness_type_order;
		$vesseltug=($model->VesselTug) ? $model->VesselTug->VesselName : '-' ;
		$vesselbarge=($model->VesselBarge) ? $model->VesselBarge->VesselName : '-';
		$BargingVesselTug=$model->BargingVesselTug; 
		$BargingVesselBarge=$model->BargingVesselBarge;
		$TCStartDate=$model->TCStartDate;
		$TCEndDate=$model->TCEndDate;
		$TCPrice=$model->TCPrice;
		$total=Timeanddate::countRangeDate($model->TCStartDate,$model->TCEndDate);
		echo CJSON::encode(array
		(
		   'id_quotation'=>$id_quotation,
		   'quotationo'=>$quotationo,
		   'id_customer'=>$customerid,
		   'customername'=>$customername,
		   'customeraddress'=>$customeraddress,
		   'type_order'=>$type_order,
		   'vesseltug'=>$vesseltug,
		   'vesselbarge'=>$vesselbarge,
		   'BargingVesselTug'=>$BargingVesselTug,
		   'BargingVesselBarge'=>$BargingVesselBarge,
		   'TCStartDate'=>$TCStartDate,
		   'TCEndDate'=>$TCEndDate,
		   'TCPrice'=>$TCPrice,
		   'total'=>$total,

		));
		Yii::app()->end();
	 }

}
