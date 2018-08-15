<?php

class CustomerVoiceController extends Controller
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
			'actions'=>array('admincustomer','createcustomer','viewcustomer','autocust','autovoyage'),
			'roles'=>array('CUS'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
			'actions'=>array('admin','delete','update','view','autocust','autovoyage'),
			'roles'=>array('ADM'),
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

	public function actionViewcustomer($id)
	{
		if(Yii::app()->request->getIsAjaxRequest())
		{
		echo $this->renderPartial('viewcustomer',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
		}

		else 
		$this->render('viewcustomer',array(
		'model'=>$this->loadModel($id),
		));
	}

	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionCreate()
	{
		$model=new CustomerVoice;
		$model->created_user=Yii::app()->user->id;
		$model->created_date=date("Y-m-d H:i:s");
		$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
		/*
		$cust=CustomerUsers::model()->findByAttributes(array('userid'=>Yii::app()->user->id));
		if ($cust){
		$model->id_customer=$cust->id_customer;
		}
		else
		Yii::app()->user->setFlash('error', "Anda Belum Terdaftar Sebagai Customer User");
		$this->redirect(array('customervoice/create','id'=>$model->id_customor_voice)); */

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CustomerVoice']))
		{
		$model->attributes=$_POST['CustomerVoice'];
		if($model->save()){
		Yii::app()->user->setFlash('success', " Data Saved");
		$this->redirect(array('view','id'=>$model->id_customor_voice));
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


	public function actionCreatecustomer()
	{
	$model=new CustomerVoice;

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['CustomerVoice']))
	{
		$model->created_user=Yii::app()->user->id;
		$model->created_date=date("Y-m-d H:i:s");
		$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

		$cust=CustomerUsers::model()->findByAttributes(array('userid'=>Yii::app()->user->id));
		if ($cust){
		$model->id_customer=$cust->id_customer;
		}
		else
		{
		Yii::app()->user->setFlash('error', "Anda Belum Terdaftar Sebagai Customer User Harap Hubungi Admin");
		$this->redirect(array('createcustomer'));
		}


		$model->attributes=$_POST['CustomerVoice'];
		if($model->save()){
		Yii::app()->user->setFlash('success', " Data Saved");
		$this->redirect(array('admincustomer','id'=>$model->id_customor_voice));
		}
		}
		if(Yii::app()->request->getIsAjaxRequest())
		{
				echo $this->renderPartial('createcustomer',array('model'=>$model),true,true);//This will bring out the view along with its script.
				}

		else 
		$this->render('createcustomer',array(
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

		if(isset($_POST['CustomerVoice']))
		{
		$model->attributes=$_POST['CustomerVoice'];
		if($model->save())
		{
		Yii::app()->user->setFlash('success', " Data Updated");
		$this->redirect(array('admin','id'=>$model->id_customor_voice));
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
		$dataProvider=new CActiveDataProvider('CustomerVoice');
		$this->render('index',array(
		'dataProvider'=>$dataProvider,
		));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new CustomerVoice('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CustomerVoice']))
		$model->attributes=$_GET['CustomerVoice'];

		$this->render('admin',array(
		'model'=>$model,
		));
	}

	public function actionAutocust()  
	{  
		 $res =array();  
		 $row=array();  
		 if (isset($_GET['search'])) {  
			  $sql ="SELECT * FROM  customer WHERE CompanyName LIKE :CompanyName ";  
			  $command =Yii::app()->db->createCommand($sql);  
			  $command->bindValue(":CompanyName", ''.'%'.$_GET['search'].'%', PDO::PARAM_STR);  
			  $res =$command->queryAll();  
			  foreach($res as $value):  
				   $row[]=array(  
							 
					   
						'id'=>$value['id_customer'],  // return value from autocomplete 
					  'nama'=>$value['CompanyName'],
				   );   
			  endforeach;  
		 }  
		 echo CJSON::encode($row);  
		 Yii::app()->end();            
	}

	public function actionAutovoyage()  
	{  
		 $res =array();  
		 $row=array();  
		 if (isset($_GET['search'])) {  
			  $sql ="SELECT * FROM  voyage_order WHERE VoyageNumber LIKE :VoyageNumber ";  
			  $command =Yii::app()->db->createCommand($sql);  
			  $command->bindValue(":VoyageNumber", ''.'%'.$_GET['search'].'%', PDO::PARAM_STR);  
			  $res =$command->queryAll();  
			  foreach($res as $value):  
				   $row[]=array(  
							 
					   
						'id'=>$value['id_voyage_order'],  // return value from autocomplete 
			'nama'=>$value['VoyageNumber'],
				   );   
			  endforeach;  
		 }  
		 echo CJSON::encode($row);  
		 Yii::app()->end();            
	}

	public function actionAdmincustomer()
	{
		$model=new CustomerVoice('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CustomerVoice']))
		$model->attributes=$_GET['CustomerVoice'];

		$this->render('admincustomer',array(
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
	$model=CustomerVoice::model()->findByPk($id);
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
	if(isset($_POST['ajax']) && $_POST['ajax']==='customer-voice-form')
	{
	echo CActiveForm::validate($model);
	Yii::app()->end();
	}
	}
}
