<?php

class FuelController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
			'actions'=>array('index','view'),
			'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
			'actions'=>array('view'),
			'roles'=>array('CUS'),
			'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
			'actions'=>array('admin','delete','updatefuel','update','create','view'),
			'roles'=>array('ADM', 'CCT'),
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
	$model=new Fuel;

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['Fuel']))
	{
	$model->attributes=$_POST['Fuel'];
	if($model->save()){
	Yii::app()->user->setFlash('success', " Data Saved");
	$this->redirect(array('view','id'=>$model->id_fuel));
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

	if(isset($_POST['Fuel']))
	{
	$model->attributes=$_POST['Fuel'];
	if($model->save())
	{
	Yii::app()->user->setFlash('success', " Data Updated");
	$this->redirect(array('admin','id'=>$model->id_fuel));
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


		public function actionUpdatefuel($id)
	{
	$model=$this->loadModel($id);
	$now=date("Y-m-d H:i:s");
	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['Fuel']))
	{
	$model->attributes=$_POST['Fuel'];
	$model->fuel_price_updated=$now;
	$model->fuel_price_updated_by=Yii::app()->user->id;
	$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
	if($model->save())
	{
						$history= new FuelPriceHistory;
						$history->id_currency=$model->id_currency;
						$history->fuel_price=$model->fuel_price;
						$history->SK=$model->SK;
						$history->created_date=$model->fuel_price_updated;
						$history->created_user=$model->fuel_price_updated_by;
						$history->ip_user_updated=$_SERVER['REMOTE_ADDR'];
						$history->save();
						//Yii::app()->user->setFlash('success', "Data $model->curreancy Updated");
						$this->redirect(array('site/index'));
	}
	}

	if(Yii::app()->request->getIsAjaxRequest())
			 {
			  echo $this->renderPartial('updatefuel',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('updatefuel',array(
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
	$dataProvider=new CActiveDataProvider('Fuel');
	$this->render('index',array(
	'dataProvider'=>$dataProvider,
	));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
	$model=new Fuel('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['Fuel']))
	$model->attributes=$_GET['Fuel'];

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
	$model=Fuel::model()->findByPk($id);
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
	if(isset($_POST['ajax']) && $_POST['ajax']==='fuel-form')
	{
	echo CActiveForm::validate($model);
	Yii::app()->end();
	}
	}
}
