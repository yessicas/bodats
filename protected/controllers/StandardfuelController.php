<?php

class StandardfuelController extends Controller
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
				'actions'=>array('admin','delete','editable','deleteajax','index','view','create','update'),
				//'users'=>array('@'),
				'roles'=>array('ADM', 'CCT'),
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
		$model=new StandardFuel;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['StandardFuel']))
		{
			$model->attributes=$_POST['StandardFuel'];
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
			if($model->save()){
				Yii::app()->user->setFlash('success', " Data Saved");
				$this->redirect(array('admin'));
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

		if(isset($_POST['StandardFuel']))
		{
			$model->attributes=$_POST['StandardFuel'];
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
			if($model->save())
			{
				Yii::app()->user->setFlash('success', " Data Updated");
				$this->redirect(array('admin'));
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
		$dataProvider=new CActiveDataProvider('StandardFuel');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$this->layout='//layouts/column2';
		$model=new StandardFuel('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StandardFuel']))
			$model->attributes=$_GET['StandardFuel'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}


	public function actionDeleteajax($id)
	{
		$model=StandardFuel::model()->findByPk($id);
		$model->delete();
		echo'deleted';
	}


	/**
	* Returns the data model based on the primary key given in the GET variable.
	* If the data model is not found, an HTTP exception will be raised.
	* @param integer the ID of the model to be loaded
	*/
	public function loadModel($id)
	{
		$model=StandardFuel::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='standard-fuel-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionEditable()
	{
		$es = new EditableSaver('StandardFuel');
		try {

			$es->onBeforeUpdate = function($event) {
					  $event->sender->setAttribute('created_date', new CDbExpression('NOW()'));
					  $event->sender->setAttribute('created_user', Yii::app()->user->id);
					  $event->sender->setAttribute('ip_user_updated', $_SERVER['REMOTE_ADDR']);
					  };
			$es->update();
		} catch(CException $e) {
			echo CJSON::encode(array('success' => false, 'msg' => $e->getMessage()));
			return;
		}
		echo CJSON::encode(array('success' => true));
	}
}
