<?php

class RequestForScheduleController extends Controller
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
			'actions'=>array('create','update'),
			'users'=>array('@'),
			),
			*/
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
			'actions'=>array('admin','delete','approved','rejected','adminpartial', 'create','update'),
			'users'=>array('@'),
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
	if(Yii::app()->request->getIsAjaxRequest())
			 {
			  echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('view',array(
	'model'=>$this->loadModel($id),
	));
	}

	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionCreate()
	{
	$model=new RequestForSchedule;

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['RequestForSchedule']))
	{
			$model->attributes=$_POST['RequestForSchedule'];
			$model->created_user=Yii::app()->user->id;
		$model->created_date=date("Y-m-d H:i:s");
		$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

	  if(isset($_POST['RequestForSchedule']['forced_plot_to_schedule'])){
		if($_POST['RequestForSchedule']['forced_plot_to_schedule']=='YES'){
		  $model->status_rfs='APPROVED';
		}else{
		   $model->status_rfs='NONE';
		}
	  }else{
		$model->status_rfs='NONE';
	  }

	if($model->save()){

	  if($model->forced_plot_to_schedule=='YES'){
		  $schedule = new Schedule;
		  $schedule->VesselTugId  = VesselDB::getTugIdVessel($model->id_vessel);
		  $schedule->VesselBargeId = VesselDB::getBargeIdVessel($model->id_vessel);
		  $schedule->id_vessel_status=20;
		  $schedule->status_plan='PLAN';
		  $schedule->StartDate=$model->StartDate;
		  $schedule->EndDate=$model->EndDate;
		  $schedule->status_pair='PAIR';
		  $schedule->created_user=Yii::app()->user->id;
		  $schedule->created_date=date("Y-m-d H:i:s");
		  $schedule->ip_user_updated=$_SERVER['REMOTE_ADDR'];
		  $schedule->save(false);
		  
			$modelUpdateScheduleRepair=Schedule::model()->findByPk($schedule->id_schedule);
			// insert no nya 
			$dataformatnumber=NumberingDocumentRepairScheduleDB::getFormatNumber($modelUpdateScheduleRepair,'id_schedule','SchNo','SchMonth','SchYear',$schedule->id_schedule);
			$modelUpdateScheduleRepair->SchNumber= $dataformatnumber['NumberFormat']; 
			$modelUpdateScheduleRepair->SchNo= $dataformatnumber['NoOrder']; 
			$modelUpdateScheduleRepair->SchMonth = NumberingDocumentRepairScheduleDB::getMonthNow(); 
			$modelUpdateScheduleRepair->SchYear= NumberingDocumentRepairScheduleDB::getYearNow(); 
			$modelUpdateScheduleRepair->save(false);
	  }


	  if(isset($_GET['idD'])) {
		$id_damage_report =  $_GET['idD'];
		$updateModelDamage=DamageReport::model()->findByPK($id_damage_report);
		$updateModelDamage->id_request_for_schedule= $model->id_request_for_schedule;
		$updateModelDamage->save(false);
	  }




	Yii::app()->user->setFlash('success', " Data Saved");
	$this->redirect(array('admin','mode'=>isset($_GET['mode']) ? $_GET['mode'] : 'DOCKING' ));
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

	if(isset($_POST['RequestForSchedule']))
	{
			$model->attributes=$_POST['RequestForSchedule'];
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

	if($model->save())
	{
	Yii::app()->user->setFlash('success', " Data Updated");
	$this->redirect(array('admin','mode'=>isset($_GET['mode']) ? $_GET['mode'] : 'DOCKING' ));
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
	$dataProvider=new CActiveDataProvider('RequestForSchedule');
	$this->render('index',array(
	'dataProvider'=>$dataProvider,
	));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin() // docking and repair
	{
	$model=new RequestForSchedule('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['RequestForSchedule']))
	$model->attributes=$_GET['RequestForSchedule'];

	$this->render('admin',array(
	'model'=>$model,
	));
	}

	public function actionAdminpartial() // docking and repair
	{
	$model=new RequestForSchedule('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['RequestForSchedule']))
	$model->attributes=$_GET['RequestForSchedule'];

		  $this->renderPartial('adminpartial',array(
			  'model'=>$model,
		   ),false,true);

		   Yii::app()->end();
	}


	public function actionApproved()
	{
	$model=new RequestForSchedule('searchapproved');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['RequestForSchedule']))
	$model->attributes=$_GET['RequestForSchedule'];

	$this->render('approved',array(
	'model'=>$model,
	));
	}

	public function actionRejected()
	{
	$model=new RequestForSchedule('searchrejected');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['RequestForSchedule']))
	$model->attributes=$_GET['RequestForSchedule'];

	$this->render('rejected',array(
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
	$model=RequestForSchedule::model()->findByPk($id);
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
	if(isset($_POST['ajax']) && $_POST['ajax']==='request-for-schedule-form')
	{
	echo CActiveForm::validate($model);
	Yii::app()->end();
	}
	}
}
