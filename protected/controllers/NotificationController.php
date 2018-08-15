<?php

class NotificationController extends Controller
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
			'actions'=>array('create','update','deletenotification'),
			'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
			'actions'=>array('admin','delete'),
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
	public function actionView($id,$c)
	{
		$modelupdatestatus=$this->loadModel($id,$c);
			if($modelupdatestatus){
			$modelupdatestatus->notif_status="READ";
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
		$model=new Notification;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Notification']))
		{
		$model->attributes=$_POST['Notification'];
		if($model->save())
			{
			Yii::app()->user->setFlash('success', " Data Saved.");
			$this->redirect(array('view','id'=>$model->id_notification));
			}
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

		if(isset($_POST['Notification']))
		{
		$model->attributes=$_POST['Notification'];
		if($model->save())
			{	
			Yii::app()->user->setFlash('success', " Data Changed.");
			$this->redirect(array('view','id'=>$model->id_notification));
			}
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
	public function actionDelete($id)
	{
		$model=$this->loadModel($id);

		if(Yii::app()->request->isPostRequest)
		{
		// we only allow deletion via POST request
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
		Yii::app()->user->setFlash('success', " Data With Primary Key  '$model->id_notification' has deleted.");
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
		$crit = new CDbCriteria();
		$crit->condition = "notif_status = 'NEW' AND userid='".Yii::app()->user->id."'";
		$pemberitahuan=Notification::model()->findAll($crit);

		foreach($pemberitahuan as $list_notification)
		{
			$list_notification->notif_status="UNREAD";
			$list_notification->save();
		}

		$criteria = new CDbCriteria();
		$criteria->condition = 'userid=:userid ';
		$criteria->params = array(':userid'=>Yii::app()->user->id);

		$dataProvider=new CActiveDataProvider('Notification',array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'notif_date DESC',
			),
			'pagination'=>array(
					'pageSize'=>10,
			),
		));
			
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new Notification('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Notification']))
		$model->attributes=$_GET['Notification'];

		$this->render('admin',array(
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
	$criteria->condition = "id_notification =".$id." AND Substring(code_id,6,10)="."'$c'";
	$model=Notification::model()->find($criteria);
	//$model=Notification::model()->findByPk($id);
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
	if(isset($_POST['ajax']) && $_POST['ajax']==='notification-form')
	{
	echo CActiveForm::validate($model);
	Yii::app()->end();
	}
	}

	public function actionDeletenotification($id)
	{



			$model=Notification::model()->findByPk($id);
			$model->delete();

			echo'<div class="alert in alert-block fade alert-danger">';
			echo'<a href="#" class="close" data-dismiss="alert">'.'x'.'</a>';
			echo'Notification has deleted';
			echo'</div>';
			

	}

}
