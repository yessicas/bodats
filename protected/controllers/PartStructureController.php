<?php

class PartStructureController extends Controller
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
				'actions'=>array('admin','delete','create','update','index','view','updatelevel'),
				'roles'=>array('TEC', 'ADM'),
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
		$model=new PartStructure;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PartStructure']))
		{
			$model->attributes=$_POST['PartStructure'];
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

			if($model->save()){
				Yii::app()->user->setFlash('success', " Data Saved");
				$this->redirect(array('admin','id'=>$model->id_part_structure));
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

		if(isset($_POST['PartStructure']))
		{
			$model->attributes=$_POST['PartStructure'];
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
				
			if($model->save())
			{
			Yii::app()->user->setFlash('success', " Data Updated");
			$this->redirect(array('admin','id'=>$model->id_part_structure));
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
		$dataProvider=new CActiveDataProvider('PartStructure');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new PartStructure('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PartStructure']))
			$model->attributes=$_GET['PartStructure'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}


	public function actionUpdatelevel()
	{
		$criteria = new CDbCriteria();
		$criteria->condition = 'id_level=:id_level';
		$criteria->params = array(':id_level'=>$_POST['hasil_part_level']);
	  
		echo CHtml::dropDownList('PartStructure[id_part_structure_parent]','',
		CHtml::listData(PartStructure::model()->findAll($criteria), 'id_part_structure', 'structure_name'),
		array('prompt'=>Yii::t('strings','-- Select --'), 
		'id' => 'PartStructure_id_part_structure_parent','disabled'=>false)); 		
	}


	/**
	* Returns the data model based on the primary key given in the GET variable.
	* If the data model is not found, an HTTP exception will be raised.
	* @param integer the ID of the model to be loaded
	*/
	public function loadModel($id)
	{
		$model=PartStructure::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='part-structure-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
