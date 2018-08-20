<?php

class SchedulePlanController extends Controller
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

			*/
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update', 'view'),
				'roles'=>array('ADM','SUPER'),
			),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('createsched'),
				'roles'=>array('ADM','SUPER', 'VPC'),
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
		$model=new SchedulePlan;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SchedulePlan']))
		{
			die();
		$model->attributes=$_POST['SchedulePlan'];
		if($model->save()){
		Yii::app()->user->setFlash('success', " Data Saved");
		$this->redirect(array('view','id'=>$model->id_schedule_plan));
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

	public function actionCreatesched($vid, $date)
	{
		$model = SchedulePlan::model()->findByAttributes(array(
			"VesselTugId"=>$vid,
			"schedule_date"=>$date,
		));
		if($model == null){
			$model =new SchedulePlan;
		}

		$model->VesselTugId = $vid;
		$model->schedule_date = $date;
		if(isset($_POST['SchedulePlan']))
		{
			$model->attributes=$_POST['SchedulePlan'];

			$model->sch_month = Timeanddate::getMonthOnly($date);
			$model->sch_year =  Timeanddate::getYearOnly($date);

			$model = LogRegister::setUserCreated($model);

			if($model->save()){
				
				Yii::app()->user->setFlash('success', "Activity plan saved!");
				$this->redirect(
					array('masterschedule/masterviewer',
					'monthseacrh'=>$model->sch_month,
					'yearseacrh'=>$model->sch_year));
				//$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		}
		if(Yii::app()->request->getIsAjaxRequest())
		{
			 // die();
			 echo $this->renderPartial('createsched',array('model'=>$model),true,true);//This will bring out the view along with its script.
		}

		else {
			$this->render('createsched',array(
			'model'=>$model,
			));
		}
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

	if(isset($_POST['SchedulePlan']))
	{
	$model->attributes=$_POST['SchedulePlan'];
	if($model->save())
	{
	Yii::app()->user->setFlash('success', " Data Updated");
	$this->redirect(array('admin','id'=>$model->id_schedule_plan));
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
	$dataProvider=new CActiveDataProvider('SchedulePlan');
	$this->render('index',array(
	'dataProvider'=>$dataProvider,
	));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
	$model=new SchedulePlan('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['SchedulePlan']))
	$model->attributes=$_GET['SchedulePlan'];

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
	$model=SchedulePlan::model()->findByPk($id);
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
	if(isset($_POST['ajax']) && $_POST['ajax']==='schedule-plan-form')
	{
	echo CActiveForm::validate($model);
	Yii::app()->end();
	}
	}
}
