<?php

class GoodReceiveController extends Controller
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
			
			//GR Fuel
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admingrfuel', 'grfuel', 'creategrfuel'),
				'roles'=>array('ADM', 'NAU', 'FCT'),
			),
			
			//GR CS (Consumable Stock)
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admingrcs', 'grcs', 'creategrcs', 'updategrcs'),
				'roles'=>array('ADM', 'FCT', 'TEC'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	/*
	GR untuk Fuel
	*/
	public function actionAdmingrfuel()
	{
		$model=new PurchaseOrderDetail('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PurchaseOrder']))
			$model->attributes=$_GET['PurchaseOrderDetail'];
			
		$model->id_po_category = '10100';

		$this->render('admingrfuel',array(
			'model'=>$model,
		));
	}
	
	public function actionGrfuel($id)
	{
		$model=new GoodReceive('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GoodReceive']))
			$model->attributes=$_GET['GoodReceive'];
			
		$model->id_purchase_order_detail = $id;
	
		$this->render('grfuel',array(
			'model'=>$model,
			'id_purchase_order_detail'=>$id,
		));
	}
	
	public function actionCreategrfuel($id)
	{
		$model=new GoodReceive;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->metric = "LTR";
		if(isset($_POST['GoodReceive']))
		{
			$model->attributes=$_POST['GoodReceive'];
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

			if($model->save()){
				//Update di Consumption Daily
				//FuelDB::addFuelBunkering($model->id_vessel, $model->received_date, $model->receive_by, $model->amount);
				
				$this->redirect(array('grfuel','id'=>$model->id_purchase_order_detail));
			}
		}

		$this->render('creategrfuel',array(
			'model'=>$model,
			'id_purchase_order_detail'=>$id,
		));
	}
	
	
	/*
	GR untuk CS / Consumable Stock
	*/
	public function actionAdmingrcs()
	{
		$model=new PurchaseOrderDetail('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PurchaseOrder']))
			$model->attributes=$_GET['PurchaseOrderDetail'];

		$model->id_po_category = '10400';
			
		$this->render('admingrcs',array(
			'model'=>$model,
		));
	}
	
	public function actionGrcs($id)
	{
		$model=new GoodReceive('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GoodReceive']))
			$model->attributes=$_GET['GoodReceive'];
			
		$model->id_purchase_order_detail = $id;
	
		$this->render('grcs',array(
			'model'=>$model,
			'id_purchase_order_detail'=>$id,
		));
	}
	
	public function actionCreategrcs($id)
	{
		$model=new GoodReceive;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['GoodReceive']))
		{
			$model->attributes=$_POST['GoodReceive'];
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
			
			$modelpo=PurchaseOrderDetail::model()->findByPk($id);
			$statusSave = true;
			if($modelpo != null){
				//echo $model->quantity; 
				//echo $modelpo->quantity;
				if($model->quantity > $modelpo->quantity){
					$statusSave = false;
					Yii::app()->user->setFlash('error', "Received quantity (".$model->quantity.") is greater than state in PO (".$modelpo->quantity.")");
					$this->render('creategrcs',array(
						'model'=>$model,
						'id_purchase_order_detail'=>$id,
					));
				}
				
			}

			if($statusSave){
				if($model->save())
					$this->redirect(array('grcs','id'=>$model->id_purchase_order_detail));
			}
		}

		$this->render('creategrcs',array(
			'model'=>$model,
			'id_purchase_order_detail'=>$id,
		));
	}
	
	public function actionUpdategrcs($idpo, $id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['GoodReceive']))
		{
			$model->attributes=$_POST['GoodReceive'];
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
			
			$modelpo=PurchaseOrderDetail::model()->findByPk($idpo);
			$statusSave = true;
			if($modelpo != null){
				//echo $model->quantity; 
				//echo $modelpo->quantity;
				if($model->quantity > $modelpo->quantity){
					$statusSave = false;
					Yii::app()->user->setFlash('error', "Received quantity (".$model->quantity.") is greater than state in PO (".$modelpo->quantity.")");
					$this->render('updategrcs',array(
						'model'=>$model,
						'id_purchase_order_detail'=>$idpo,
					));
				}
				
			}

			if($statusSave){
				if($model->save())
					$this->redirect(array('grcs','id'=>$idpo));
			}
		}

		$this->render('updategrcs',array(
			'model'=>$model,
			'id_purchase_order_detail'=>$idpo,
		));
	}
	
	public function actionAdminpo()
	{
		$model=new PurchaseOrder('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PurchaseOrder']))
		$model->attributes=$_GET['PurchaseOrder'];

		$this->render('adminpo',array(
		'model'=>$model,
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
		$model=new GoodReceive;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GoodReceive']))
		{
			$model->attributes=$_POST['GoodReceive'];
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

		if(isset($_POST['GoodReceive']))
		{
			$model->attributes=$_POST['GoodReceive'];
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
		$dataProvider=new CActiveDataProvider('GoodReceive');
		$this->render('index',array(
		'dataProvider'=>$dataProvider,
		));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new GoodReceive('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GoodReceive']))
			$model->attributes=$_GET['GoodReceive'];

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
		$model=GoodReceive::model()->findByPk($id);
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
