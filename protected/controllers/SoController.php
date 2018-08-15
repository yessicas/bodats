<?php

class SoController extends Controller
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
			'actions'=>array('admin','delete','update','view','create','index','searchquo','download','Updateattch','addSalesPlan'),
			'roles'=>array('ADM','MKT'),
			),
			array('deny',  // deny all users
			//'roles'=>array('CUS','FIC','CRW','NAU','OPR'),
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
		$model = $this->loadModel($id);
		if($model != null){
			$modelquo=$this->loadModelquo($model->id_quotation);
			$modeldetailquo = new QuotationDetailVessel;
			if(Yii::app()->request->getIsAjaxRequest())
			{
				echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
			}
			else 
			$this->render('view',array(
				'model'=>$this->loadModel($id),
				'modelquo'=>$modelquo,
				'modeldetailquo'=>$modeldetailquo,
			));
		}else{
			throw new CHttpException(400,'Invalid request. View with such ID not found.');
		}
	}

	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionCreate($idquo,$idsp)
	{
		$model=new So;
		$model->Scenario='step2';
		$datetime_now=date("YmdHis");
		$modelquo=$this->loadModelquo($idquo);

		/*
		if($modelquo->id_bussiness_type_order==100){
			if($modelquo->JettyOrigin===null||$modelquo->JettyDestination===null||$modelquo->VesselTug===null||$modelquo->VesselBarge===null){
				Yii::app()->user->setFlash('error', "Maaf Quotation Yang dipilih belum lengkap di isi, Silahkan Lengkapi dulu");
				$this->redirect(array('searchquo'));
			}
		}

		if($modelquo->id_bussiness_type_order==300){
			if($modelquo->VesselTug===null||$modelquo->VesselBarge===null){
				Yii::app()->user->setFlash('error', "Maaf Quotation Yang dipilih belum lengkap di isi, Silahkan Lengkapi dulu");
				$this->redirect(array('searchquo'));
			}
		}

		*/

		$modeldetailquo=new QuotationDetailVessel('searchbyquotation');
		$modeldetailquo->unsetAttributes();  // clear any default values
		if(isset($_GET['QuotationDetailVessel']))
		$modeldetailquo->attributes=$_GET['QuotationDetailVessel'];

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['So']))
		{
			$model->attributes=$_POST['So'];
			$model->SI_is_attach=0;
			$model->SI_Attachment='-';

			if(strlen(trim(CUploadedFile::getInstance($model,'SI_Attachment'))) > 0){
				$models=CUploadedFile::getInstance($model,'SI_Attachment');
				$extension=$models->extensionName;
				$model->SI_Attachment=md5($model->ShippingOrderNumber).$datetime_now.'.'.$extension;
				$model->SI_is_attach=1;
			}

			if($model->save()){

			if(strlen(trim(CUploadedFile::getInstance($model,'SI_Attachment'))) > 0){
				$filename=md5($model->ShippingOrderNumber).$datetime_now;
				$path=Yii::app()->basePath . '/../repository/so/'.$filename.'.'.$extension;
				$models->saveAs($path);
			}

				// insert nomornya
				$updateModel=So::model()->findByPK($model->id_so);
				$dataformatnumber=NumberingDocumentDBSO::getFormatNumber($model,'id_so','SONo','SOMonth','SOYear',$model->id_so);
				$updateModel->ShippingOrderNumber= $dataformatnumber['NumberFormat']; 
				$updateModel->SONo = $dataformatnumber['NoOrder']; 
				$updateModel->SOMonth = NumberingDocumentDBSO::getMonthNow(); 
				$updateModel->SOYear = NumberingDocumentDBSO::getYearNow(); 
				$updateModel->save(false);
	

				$quoupdate=$this->loadModelquo($idquo);
				$quoupdate->Status='SHIPPING ORDER';
				$quoupdate->save(false);

				$criteria=new CDbCriteria;
				$criteria->condition = 'id_quotation=:id_quotation';
				$criteria->params = array(':id_quotation'=>$model->id_quotation);
				$quotationdetail=QuotationDetailVessel::model()->findAll($criteria);

				foreach($quotationdetail as $list_quotationdetail){
					$voyege = new VoyageOrder;
					$voyege->id_quotation=$model->id_quotation;
					$voyege->id_so=$model->id_so;
					$voyege->status='SHIPPING ORDER';
					$voyege->bussiness_type_order=$list_quotationdetail->Quotation->BussinessTypeOrder->id_bussiness_type_order;
					$voyege->BargingVesselTug=$list_quotationdetail->BargingVesselTug;
					$voyege->BargingVesselBarge=$list_quotationdetail->BargingVesselBarge;
					$voyege->BargeSize=$list_quotationdetail->BargeSize;
					$voyege->Capacity=$list_quotationdetail->Capacity;
					$voyege->BargingJettyIdStart=$list_quotationdetail->IdJettyOrigin;
					$voyege->BargingJettyIdEnd=$list_quotationdetail->IdJettyDestination;
					$voyege->id_currency=$list_quotationdetail->id_currency;
					$voyege->change_rate=$list_quotationdetail->change_rate;
					$voyege->fuel_price=$list_quotationdetail->fuel_price;
					$voyege->created_user=Yii::app()->user->id;
					$voyege->created_date=date("Y-m-d H:i:s");
					$voyege->ip_user_updated=$_SERVER['REMOTE_ADDR'];
					$voyege->TugPower=$list_quotationdetail->VesselTug->Power;
					$voyege->Price=$list_quotationdetail->Price;
					$voyege->status_schedule='NONE';
					$voyege->save(false);	
				}

				Yii::app()->user->setFlash('success', " Data Saved");
				$this->redirect(array('view','id'=>$model->id_so));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'modelquo'=>$modelquo,
			'modeldetailquo'=>$modeldetailquo,
		));
	}



	public function actionSearchquo()
	{
		$model=new So;
		$model->Scenario='step1';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['So']))
		{
			$model->attributes=$_POST['So'];
			if($model->validate()){
				//Yii::app()->user->setFlash('success', " Data Saved");
				//$this->redirect(array('create','idquo'=>$_POST['So']['id_quotation']));
				$this->redirect(array('addSalesPlan','idquo'=>$_POST['So']['id_quotation']));
			}
		}

		$this->render('searchquo',array(
			'model'=>$model,
		));
	}


	public function actionAddSalesPlan($idquo)
	{
		$model=new So;
		$model->Scenario='stepAddSalesPlan';
		$modelquo=$this->loadModelquo($idquo);

		$modeldetailquo=new QuotationDetailVessel('searchbyquotation');
		$modeldetailquo->unsetAttributes();  // clear any default values
		if(isset($_GET['QuotationDetailVessel']))
		$modeldetailquo->attributes=$_GET['QuotationDetailVessel'];


		if(isset($_POST['So']))
		{
			$model->attributes=$_POST['So'];
			if($model->validate()){
				//Yii::app()->user->setFlash('success', " Data Saved");
				$this->redirect(array('create','idquo'=>$_POST['So']['id_quotation'], 'idsp'=>$_POST['So']['id_sales_plan']));
			}
		}


		$this->render('addSalesPlan',array(
			'model'=>$model,
			'modelquo'=>$modelquo,
			'modeldetailquo'=>$modeldetailquo,
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
		$modelbeforesave=$this->loadModel($id);
		$model->Scenario='step2update';
		$datetime_now=date("YmdHis");

		$modelquo=$this->loadModelquo($model->id_quotation);
		$modeldetailquo=new QuotationDetailVessel('searchbyquotation');
		$modeldetailquo->unsetAttributes();  // clear any default values
		if(isset($_GET['QuotationDetailVessel']))
			$modeldetailquo->attributes=$_GET['QuotationDetailVessel'];

		if(isset($_POST['So']))
		{
			$model->attributes=$_POST['So'];
			if($model->save())
			{
				if(strlen(trim(CUploadedFile::getInstance($model,'SI_Attachment'))) > 0){
					if(file_exists(Yii::app()->basePath . '/../repository/so/'.$modelbeforesave->SI_Attachment)) {
						unlink(Yii::app()->basePath . '/../repository/so/'.$modelbeforesave->SI_Attachment); 
					} 

					$filename=md5($model->ShippingOrderNumber).$datetime_now;
					$models=CUploadedFile::getInstance($model,'SI_Attachment');
					$extension=$models->extensionName;

					$updatemodel=$this->loadModel($model->id_so);
					$updatemodel->SI_is_attach=1;
					$updatemodel->SI_Attachment=$filename.'.'.$extension;
					$updatemodel->save();
					
					$path=Yii::app()->basePath . '/../repository/so/'.$filename.'.'.$extension;
					$models->saveAs($path);
				}

				$quoupdate=$this->loadModelquo($model->id_quotation);
				$quoupdate->Status='SHIPPING ORDER';
				$quoupdate->save(false);

				VoyageOrder::model()->deleteAll(array(
					   'condition' => 'id_so = :id_so',
					   'params' => array(
						   ':id_so' => $model->id_so,
					   ),
				   ));

				$criteria=new CDbCriteria;
				$criteria->condition = 'id_quotation=:id_quotation';
				$criteria->params = array(':id_quotation'=>$model->id_quotation);
				$quotationdetail=QuotationDetailVessel::model()->findAll($criteria);

				if(count($quotationdetail)>0){
					foreach($quotationdetail as $list_quotationdetail){
						$voyege = new VoyageOrder;
						$voyege->id_quotation=$model->id_quotation;
						$voyege->id_so=$model->id_so;
						$voyege->status='SHIPPING ORDER';
						$voyege->bussiness_type_order=$list_quotationdetail->Quotation->BussinessTypeOrder->id_bussiness_type_order;
						$voyege->BargingVesselTug=$list_quotationdetail->BargingVesselTug;
						$voyege->BargingVesselBarge=$list_quotationdetail->BargingVesselBarge;
						$voyege->BargeSize=$list_quotationdetail->BargeSize;
						$voyege->Capacity=$list_quotationdetail->Capacity;
						$voyege->BargingJettyIdStart=$list_quotationdetail->IdJettyOrigin;
						$voyege->BargingJettyIdEnd=$list_quotationdetail->IdJettyDestination;
						$voyege->id_currency=$list_quotationdetail->id_currency;
						$voyege->change_rate=$list_quotationdetail->change_rate;
						$voyege->fuel_price=$list_quotationdetail->fuel_price;
						$voyege->created_user=Yii::app()->user->id;
						$voyege->created_date=date("Y-m-d H:i:s");
						$voyege->ip_user_updated=$_SERVER['REMOTE_ADDR'];
						$voyege->TugPower=$list_quotationdetail->VesselTug->Power;
						$voyege->Price=$list_quotationdetail->Price;
						$voyege->status_schedule='NONE';

						//$voyege->VoyageNumber=;
						//$voyege->VoyageOrderNumber=;
						//$voyege->VONo=;
						//$voyege->VOMonth=;
						//$voyege->VOYear=;
						//$voyege->id_voyage_order_plan=;
						//$voyege->StartDate=;
						//$voyege->EndDate=;
						//$voyege->ActualStartDate=;
						//$voyege->ActualEndDate=;
						//$voyege->period_year=;
						//$voyege->period_month=;
						//$voyege->period_quartal=;
						$voyege->save(false);
					}
				}

				Yii::app()->user->setFlash('success', " Data Updated");
				$this->redirect(array('view','id'=>$model->id_so));
			}
		}


		$this->render('update',array(
		'model'=>$model,
		'modelquo'=>$modelquo,
		'modeldetailquo'=>$modeldetailquo,
		));
	}

	public function actionUpdateattch($id)
	{
		$model=$this->loadModel($id);
		$modelbeforesave=$this->loadModel($id);
		$model->Scenario='updateattachment';
		$datetime_now=date("YmdHis");

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['So'])){
			$model->attributes=$_POST['So'];
			$model->SI_Attachment='tenpName';
			if($model->save())
			{
				if(strlen(trim(CUploadedFile::getInstance($model,'SI_Attachment'))) > 0){

					if(file_exists(Yii::app()->basePath . '/../repository/so/'.$modelbeforesave->SI_Attachment)) {
						unlink(Yii::app()->basePath . '/../repository/so/'.$modelbeforesave->SI_Attachment);  
					}

					$filename=md5($model->ShippingOrderNumber).$datetime_now;
					$models=CUploadedFile::getInstance($model,'SI_Attachment');
					$extension=$models->extensionName;

					$updatemodel=$this->loadModel($model->id_so);
					$updatemodel->SI_is_attach=1;
					$updatemodel->SI_Attachment=$filename.'.'.$extension;
					$updatemodel->save();
					
					$path=Yii::app()->basePath . '/../repository/so/'.$filename.'.'.$extension;
					$models->saveAs($path);
				}
				
				Yii::app()->user->setFlash('success', " Data Attachment Updated");
				$this->redirect(array('admin'));
			}
		}

		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('updateattch',array('model'=>$model),true,true);//This will bring out the view along with its script.
		}
		else 
		$this->render('updateattch',array(
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
			$model=$this->loadModel($id);
			$this->loadModel($id)->delete();

			
			if(file_exists(Yii::app()->basePath . '/../repository/so/'.$model->SI_Attachment)) {
				unlink(Yii::app()->basePath . '/../repository/so/'.$model->SI_Attachment); 
			} 

			$quoupdate=$this->loadModelquo($model->id_quotation);
			$quoupdate->Status='QUOTATION';
			$quoupdate->save(false);

			VoyageOrder::model()->deleteAll(array(
						   'condition' => 'id_so = :id_so',
						   'params' => array(
							   ':id_so' => $model->id_so,
						   ),
					   ));
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}



	public function actionDownload($id){
		$model=So::model()->findByPk($id); 
		$file = Yii::app()->basePath . '/../repository/so/'.$model->SI_Attachment;    
		$pos=strrpos($file,'.');  
   		$extensions = substr($file,$pos+1);

		if( file_exists($file) ){
			Yii::app()->getRequest()->sendFile( $model->ShippingOrderNumber.".".$extensions , file_get_contents($file) );
		}
		else{
			throw new CHttpException(404,'The requested page does not exist.');
		}   
	} 


	/**
	* Lists all models.
	*/
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('So');
		$this->render('index',array(
		'dataProvider'=>$dataProvider,
		));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new So('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['So']))
			$model->attributes=$_GET['So'];

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
		$model=So::model()->findByPk($id);
		if($model===null)
		throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelquo($idquo)
	{
		$model=Quotation::model()->findByPk($idquo);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='so-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
