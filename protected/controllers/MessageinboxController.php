<?php

class MessageinboxController extends Controller
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
			'actions'=>array('admin','delete','sentmail','view'),
			//'roles'=>array('ADM','OPR','FIC','CRW','MKT','NAU'),
			'roles'=>array('ADM', 'FIC', 'NAU', 'CRW', 'VPC', 'MKT', 'CCT', 'FCT', 'SOA', 'HEA', 'HOPR', 'PRO'),
			'users'=>array('@'),
		),
		array('deny',  // deny all users
			'roles'=>array('CUS'),
			'users'=>array('*'),
		),
		);
	}

	/**
	* Displays a particular model.
	* @param integer $id the ID of the model to be displayed
	*/
	public function actionView($id,$c)
	{
		$modelupdatestatus=$this->loadModel($id,$c);
		if($modelupdatestatus){
		$modelupdatestatus->status="read";
		$modelupdatestatus->save();
		}

		$this->render('view',array(
		'model'=>$this->loadModel($id,$c),
		));
	}

	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionCreate()
	{
		$model=new MessageInbox;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MessageInbox']))
		{
			$model->attributes=$_POST['MessageInbox'];
			if($model->save())
			$this->redirect(array('view','id'=>$model->id_inbox));
		}

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

		if(isset($_POST['MessageInbox']))
		{
			$model->attributes=$_POST['MessageInbox'];
			if($model->save())
			$this->redirect(array('view','id'=>$model->id_inbox));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	* Deletes a particular model.
	* If deletion is successful, the browser will be redirected to the 'admin' page.
	* @param integer $id the ID of the model to be deleted
	*/
	public function actionDelete($id,$c)
	{
		if(Yii::app()->request->isPostRequest)
		{
		// we only allow deletion via POST request
		$this->loadModel($id,$c)->delete();

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
		$dataProvider=new CActiveDataProvider('MessageInbox');
		$this->render('index',array(
		'dataProvider'=>$dataProvider,
		));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{

		$crit = new CDbCriteria();
		$crit->condition = "status = 'new' AND to_inbox='".Yii::app()->user->id."'";
		$pemberitahuan=MessageInbox::model()->findAll($crit);

		foreach($pemberitahuan as $list_notification)
		{
			$list_notification->status="in";
			$list_notification->save();
		}

		$model=new MessageInbox('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MessageInbox']))
			$model->attributes=$_GET['MessageInbox'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionSentmail()
	{
		$model=new MessageOutbox('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MessageOutbox']))
		$model->attributes=$_GET['MessageOutbox'];

		$this->render('../MessageOutbox/admin',array(
		'model'=>$model,
		));
	}


	/**
	* Returns the data model based on the primary key given in the GET variable.
	* If the data model is not found, an HTTP exception will be raised.
	* @param integer the ID of the model to be loaded
	*/
	public function loadModel($id,$c)
	{
		$criteria = new CDbCriteria();
		$criteria->condition = "id_inbox =".$id." AND Substring(code_id,6,10)="."'$c'";
		$model=MessageInbox::model()->find($criteria);
		//$model=MessageInbox::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='message-inbox-form')
		{
		echo CActiveForm::validate($model);
		Yii::app()->end();
		}
	}
}
