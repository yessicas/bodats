<?php

class GoodIssueController extends Controller
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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin', 'adminpo','delete', 'create','update', 'index','view',
					),
				'roles'=>array('ADM', 'NAU', 'FCT'),
			),
			
			//GI Fuel
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admingifuel', 'gifuel', 'creategifuel'),
				'roles'=>array('ADM', 'NAU', 'FCT' ),
			),
			
			//GI CS
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admingics', 'gics', 'creategics'),
				'roles'=>array('ADM', 'NAU', 'FCT', 'TEC'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	/*
	GI UntuK Fuel
	*/
	public function actionAdmingifuel()
	{
		$model=new PurchaseOrderDetail('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PurchaseOrder']))
			$model->attributes=$_GET['PurchaseOrderDetail'];
			
		$model->id_po_category = '10100';

		$this->render('admingifuel',array(
			'model'=>$model,
		));
	}
	

	public function actionGifuel($id)
	{
		$model=new GoodIssue('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GoodIssue']))
			$model->attributes=$_GET['GoodIssue'];
			
		$model->id_purchase_order_detail = $id;
	
		$this->render('gifuel',array(
			'model'=>$model,
			'id_purchase_order_detail'=>$id,
		));
	}
	
	
	public function actionCreategifuel($id)
	{
		$model=new GoodIssue;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->metric = "LTR";
		if(isset($_POST['GoodIssue']))
		{
			$model->attributes=$_POST['GoodIssue'];
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

			if($model->save())
			$this->redirect(array('gifuel','id'=>$model->id_purchase_order_detail));
		}

		$this->render('creategifuel',array(
			'model'=>$model,
			'id_purchase_order_detail'=>$id,
		));
	}
	
	
	
	
	/*
	GI UntuK CS
	*/
	public function actionAdmingics()
	{
		$model=new PurchaseOrderDetail('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PurchaseOrder']))
			$model->attributes=$_GET['PurchaseOrderDetail'];
			
		$model->id_po_category = '10400';

		$this->render('admingics',array(
			'model'=>$model,
		));
	}
	

	public function actionGics($id)
	{
		$model=new GoodIssue('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GoodIssue']))
			$model->attributes=$_GET['GoodIssue'];
			
		$model->id_purchase_order_detail = $id;
	
		$this->render('gics',array(
			'model'=>$model,
			'id_purchase_order_detail'=>$id,
		));
	}
	
	
	public function actionCreategics($id)
	{
		$model=new GoodIssue;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GoodIssue']))
		{
			$model->attributes=$_POST['GoodIssue'];
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

			if($model->save())
			$this->redirect(array('gics','id'=>$model->id_purchase_order_detail));
		}

		$this->render('creategics',array(
			'model'=>$model,
			'id_purchase_order_detail'=>$id,
		));
	}
	

	/**
	* Displays a particular model.
	* @param integer $id the ID of the model to be displayed
	*/
	public function actionView($id)
	{
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
		$model=new GoodIssue;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GoodIssue']))
		{
			$model->attributes=$_POST['GoodIssue'];
			if($model->save())
			$this->redirect(array('view','id'=>$model->id_good_receive));
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

		if(isset($_POST['GoodIssue']))
		{
			$model->attributes=$_POST['GoodIssue'];
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

			if($model->save())
				$this->redirect(array('grfuel','id'=>$model->id_purchase_order_detail));
		}

		$this->render('update',array(
			'model'=>$model,
			'id_purchase_order_detail'=>$id,
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
		$dataProvider=new CActiveDataProvider('GoodIssue');
		$this->render('index',array(
		'dataProvider'=>$dataProvider,
		));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new GoodIssue('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GoodIssue']))
			$model->attributes=$_GET['GoodIssue'];

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
		$model=GoodIssue::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='good-receive-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
