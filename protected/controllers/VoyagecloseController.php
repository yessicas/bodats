<?php

class VoyagecloseController extends Controller
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
			/*
			array('allow',  // allow all users to perform 'index' and 'view' actions
			'actions'=>array('index','view'),
			'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
			'actions'=>array('create','update','createreport','create_voyage_document','view_voyage_document'),
			'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
			'actions'=>array('admin','delete','report','viewreport'),
			'users'=>array('@'),
			),
			*/
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','report','viewreport',
					'index','view',
					'create','update','createreport','create_voyage_document','view_voyage_document','listDN','listincentive',
					'changeactualcapacity',
					),
				//'users'=>array('@'),
				'roles'=>array('ADM', 'SOA', 'NAU'),
			),
			
			//Ini untuk PR Incentive
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('listincentive'),
				'roles'=>array('CRW',),
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
	public function actionView($id)
	{
		$modelvoyage=$this->loadModelvoyage($id);
		$this->render('view',array(
		'model'=>$this->loadModelbyattvoyage($id),
		'modelvoyage'=>$modelvoyage,
		));
	}

	public function actionViewreport($id)
	{
		$this->layout='//layouts/laporan';
		$modelvoyage=$this->loadModelvoyage($id);
		$this->render('report',array(
		'model'=>$this->loadModelbyattvoyage($id),
		'modelvoyage'=>$modelvoyage,
		));
	}

	public function actionReport($id)
	{
		$this->layout='//layouts/laporan';
		$modelvoyage=$this->loadModelvoyage($id);
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
		'model'=>$this->loadModelbyattvoyage($id),
		'modelvoyage'=>$modelvoyage,
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
		$model=new VoyageClose;
		$model->Scenario='step1';	
		$modelvoyage=$this->loadModelvoyage($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['VoyageClose']))
		{
			$model->attributes=$_POST['VoyageClose'];

			$model->id_voyage_order=$id;
			$model->CloseVoyageStatus='VO FINISH';
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

			if($model->save()){
				$modelSailingOrder=SailingOrder::model()->findByPk($model->id_sailing_order);
				$modelSailingOrder->SailingOrderStatus='VO FINISH';
				$modelSailingOrder->save(false);

				$modelvoyageorder=$this->loadModelvoyage($model->id_voyage_order);
				$modelvoyageorder->status='VO FINISH';
				$modelvoyageorder->save(false);

				$quoupdate=Quotation::model()->findByPk($modelvoyageorder->id_quotation);
				$quoupdate->Status='VO FINISH';
				$quoupdate->save(false);

				Yii::app()->user->setFlash('success', " Data Saved");
				$this->redirect(array('createreport','id'=>$model->id_voyage_order));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'modelvoyage'=>$modelvoyage,
		));
	}


	public function actionCreatereport($id)
	{
		//$model=$this->loadModel($id);
		$model=$this->loadModelbyattvoyage($id);
		$model->Scenario='step2';	
		$modelvoyage=$this->loadModelvoyage($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['VoyageClose']))
		{
			$model->attributes=$_POST['VoyageClose'];

			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

			if($model->save())
			{

				// insert nomornya
				$modelNew=new VoyageClose ;
				$updateModel=$this->loadModelbyattvoyage($model->id_voyage_order);
				$dataformatnumber=NumberingDocumentDBVoyageClose::getFormatNumber($modelNew,'id_voyage_close','CloseVoyageNo','CloseVoyageMonth','CloseVoyageYear',$updateModel->id_voyage_close);
				$updateModel->CloseVoyageNumber = $dataformatnumber['NumberFormat']; 
				$updateModel->CloseVoyageNo = $dataformatnumber['NoOrder']; 
				$updateModel->CloseVoyageMonth = NumberingDocumentDBVoyageClose::getMonthNow(); 
				$updateModel->CloseVoyageYear = NumberingDocumentDBVoyageClose::getYearNow(); 
				$updateModel->save(false);
				

				Yii::app()->user->setFlash('success', " Data Updated");
				$this->redirect(array('view','id'=>$model->id_voyage_order));
			}
		}

		$this->render('createreport',array(
			'model'=>$model,
			'modelvoyage'=>$modelvoyage,
		));
	}


	public function actionCreate_voyage_document($id)
	{
		//$model=$this->loadModel($id);
		$model=$this->loadModelbyattvoyage($id);
		$modelvoyage=$this->loadModelvoyage($id);

		//if($model==false){
		//  Yii::app()->user->setFlash('error', "Please Create Voyage Close before create  document");
		//  $this->redirect(array('voyageorder/close_voyage'));
		//}

		$mstdoc=new MstVoyageDocument('searchbyclosedvoyage');
		$mstdoc->unsetAttributes();  // clear any default values
		if(isset($_GET['MstVoyageDocument']))
			$mstdoc->attributes=$_GET['MstVoyageDocument'];

		$this->render('create_voyage_document',array(
			'model'=>$model,
			'modelvoyage'=>$modelvoyage,
			'mstdoc'=>$mstdoc,
		));
	}


	public function actionListDN($id)
	{
		//$model=$this->loadModel($id);
		//$model=$this->loadModelbyattvoyage($id);
		$modelvoyage=$this->loadModelvoyage($id);

		//if($model==false){
		//  Yii::app()->user->setFlash('error', "Please Create Voyage Close before create  document");
		//  $this->redirect(array('voyageorder/close_voyage'));
		//}

		$modelDN=new DebitNote('searchbyVoyage');
		$modelDN->unsetAttributes();  // clear any default values
		if(isset($_GET['DebitNote']))
		$modelDN->attributes=$_GET['DebitNote'];

		$this->render('create_debitNote',array(
			//'model'=>$model,
			'modelvoyage'=>$modelvoyage,
			'modelDN'=>$modelDN,
		));
	}



	public function actionListincentive($id)
	{
		
		$modelvoyage=$this->loadModelvoyage($id);
		$existDataFuel=VoyageIncentive::model()->findByAttributes(array('id_voyage_order'=>$id,'type_incentive'=>'FUEL'));
		$existDataEHS=VoyageIncentive::model()->findByAttributes(array('id_voyage_order'=>$id,'type_incentive'=>'EHS'));	

				if($existDataFuel){
					$modelFuel=$existDataFuel;
				}else{
					$modelFuel=new VoyageIncentive;
				}


				if($existDataEHS){
					$modelEHS=$existDataEHS;
				}else{
					$modelEHS=new VoyageIncentive;
				}

		if(isset($_POST['yt0']))
		{

			
			
				$modelFuel->id_voyage_order=$_POST['id_voyage_order'];
				$modelFuel->amount =$_POST['totalfuelamount'];
				$modelFuel->id_currency =$_POST['totalfuelcurrency'];
				$modelFuel->type_incentive ='FUEL';
				$modelFuel->incentive_date =date("Y-m-d");
				$modelFuel = LogUserUpdated::setUserCreated($modelFuel);
				$modelFuel->save();


				$modelEHS->id_voyage_order=$_POST['id_voyage_order'];
				$modelEHS->amount =$_POST['totalehsamount'];
				$modelEHS->id_currency =$_POST['totalehscurrency'];
				$modelEHS->type_incentive ='EHS';
				$modelEHS->incentive_date =date("Y-m-d");
				$modelEHS = LogUserUpdated::setUserCreated($modelEHS);
				$modelEHS->save();




				  $LISTPOSITION = CrewDB::getListCrewPosition();
				  $LISTASSIGNMENT = CrewDB::getListCrewAssignmentByVessel($modelvoyage->BargingVesselTug);
				  
				  foreach($LISTASSIGNMENT as $crew_assign){
				    $crewas[$crew_assign->id_crew_position] = $crew_assign;
				  } 
				  
				  foreach($LISTPOSITION as $position){
				    if(isset($crewas[$position->id_crew_position])){
				      $cr = $crewas[$position->id_crew_position];
				      //echo $cr->crew->CrewId.'<br>';

				      $existDataCrewFuel=VoyageIncentiveCrew::model()->findByAttributes(array('id_voyage_incentive'=>$modelFuel->id_voyage_incentive, 'CrewId'=>$cr->crew->CrewId,'type_incentive'=>'FUEL'));
				        if($existDataCrewFuel){
							$modelCrewFUEL=$existDataCrewFuel;
						}else{
							$modelCrewFUEL=new VoyageIncentiveCrew;
						}

						$modelCrewFUEL->id_voyage_incentive =$modelFuel->id_voyage_incentive;
					    $modelCrewFUEL->CrewId=$cr->crew->CrewId;
					    $modelCrewFUEL->incentive_date =date("Y-m-d");
					    $modelCrewFUEL->type_incentive ='FUEL';
					    $modelCrewFUEL->percentage =$_POST['persenFUEL'.$cr->crew->CrewId];
						$modelCrewFUEL->amount =$_POST['amountFUEL'.$cr->crew->CrewId];
						$modelCrewFUEL = LogUserUpdated::setUserCreated($modelCrewFUEL);
						$modelCrewFUEL->save(false);



					$existDataCrewEHS=VoyageIncentiveCrew::model()->findByAttributes(array('id_voyage_incentive'=>$modelEHS->id_voyage_incentive, 'CrewId'=>$cr->crew->CrewId,'type_incentive'=>'EHS'));
				        if($existDataCrewEHS){
							$modelCrewEHS=$existDataCrewEHS;
						}else{
							$modelCrewEHS=new VoyageIncentiveCrew;
						}

						$modelCrewEHS->id_voyage_incentive =$modelEHS->id_voyage_incentive;
					    $modelCrewEHS->CrewId=$cr->crew->CrewId;
					    $modelCrewEHS->incentive_date =date("Y-m-d");
					    $modelCrewEHS->type_incentive ='EHS';
					    $modelCrewEHS->percentage =$_POST['persenEHS'.$cr->crew->CrewId];
						$modelCrewEHS->amount =$_POST['amountEHS'.$cr->crew->CrewId];
						$modelCrewEHS = LogUserUpdated::setUserCreated($modelCrewEHS);
						$modelCrewEHS->save(false);


				         
				    }

				  }



				Yii::app()->user->setFlash('success', " Data Saved");
				$this->redirect(array('voyageclose/listincentive','id'=>$_POST['id_voyage_order']));

			
		}


		if(isset($_GET['mode'])){
			$view='view_incentive';
		}else{
			$view='create_incentive';
		}

		$this->render($view,array(
			'modelvoyage'=>$modelvoyage,
			'modelFuel'=>$modelFuel,
			'modelEHS'=>$modelEHS,
		));
	}


	public function actionChangeactualcapacity($id)
	{
		$modelname = "VoyageOrder";
		$modelvoyage=$this->loadModelvoyage($id);
		$model = $modelvoyage;
		
		if(isset($_POST[$modelname]))
		{
			$model->attributes=$_POST[$modelname];
			if($model->save(false)){
				$this->redirect(array('create_voyage_document','id'=>$id));
			}else{
				echo CHtml::errorSummary($model);
			}
		}
		
		if(Yii::app()->request->getIsAjaxRequest()){
			echo $this->renderPartial('changeactualcapacity', array(
				'model'=>$modelvoyage,
			), true, true);
		}
		else {
			echo $this->render('changeactualcapacity', array(
				'model'=>$modelvoyage,
			));
		}
		
		/*
		$this->render('changeactualcapacity',array(
			'model'=>$modelvoyage,
		));
		*/
	}


	public function actionView_voyage_document($id)
	{
		//$model=$this->loadModel($id);
		$model=$this->loadModelbyattvoyage($id);
		$modelvoyage=$this->loadModelvoyage($id);

		$mstdoc=new MstVoyageDocument('searchbyclosedvoyage');
		$mstdoc->unsetAttributes();  // clear any default values
		if(isset($_GET['MstVoyageDocument']))
			$mstdoc->attributes=$_GET['MstVoyageDocument'];

		$this->render('view_voyage_document',array(
		'model'=>$model,
		'modelvoyage'=>$modelvoyage,
		'mstdoc'=>$mstdoc,
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
		$model=$this->loadModelbyattvoyage($id);
		$model->Scenario='step2';	
		$modelvoyage=$this->loadModelvoyage($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['VoyageClose']))
		{
			$model->attributes=$_POST['VoyageClose'];

			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

			if($model->save())
			{
				Yii::app()->user->setFlash('success', " Data Updated");
				$this->redirect(array('view','id'=>$model->id_voyage_order));
			}
		}

		$this->render('update',array(
		'model'=>$model,
		'modelvoyage'=>$modelvoyage,
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
		$dataProvider=new CActiveDataProvider('VoyageClose');
		$this->render('index',array(
		'dataProvider'=>$dataProvider,
		));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new VoyageClose('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VoyageClose']))
		$model->attributes=$_GET['VoyageClose'];

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
		$model=VoyageClose::model()->findByPk($id);
		if($model===null)
		throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	public function loadModelvoyage($id)
	{
		$model=VoyageOrder::model()->findByPk($id);
		if($model===null)
		throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelbyattvoyage($id)
	{
		$model=VoyageClose::model()->findByAttributes(array('id_voyage_order'=>$id));
		//if($model===null)
		//throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	* Performs the AJAX validation.
	* @param CModel the model to be validated
	*/
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='voyage-close-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
