<?php

class DebitNoteController extends Controller
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
	'actions'=>array('create','update'),
	'users'=>array('@'),
	),
	array('allow', // allow admin user to perform 'admin' and 'delete' actions
	'actions'=>array('admin','delete','createDN','updateDN','prosess'),
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
	$model=new DebitNote;

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['DebitNote']))
	{
				$model->attributes=$_POST['DebitNote'];
				$model->created_user=Yii::app()->user->id;
				$model->created_date=date("Y-m-d H:i:s");
				$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
	if($model->save())
	$this->redirect(array('view','id'=>$model->id_debit_note));
	}

	$this->render('create',array(
	'model'=>$model,
	));
	}

	public function actionCreateDN($id)
	{
		$model=new DebitNote;
		$modelvoyage=$this->loadModelvoyage($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DebitNote']))
		{
					$model->attributes=$_POST['DebitNote'];
					$model->id_voyage_order=$id;
					$model->omitted_status='NONE';
					$model->created_user=Yii::app()->user->id;
					$model->created_date=date("Y-m-d H:i:s");
					$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
		if($model->save()){
			Yii::app()->user->setFlash('success', " Data Saved");
			$this->redirect(array('voyageclose/listDN','id'=>$model->id_voyage_order));
			}
		}

		$this->render('createDN',array(
		'model'=>$model,
		'modelvoyage'=>$modelvoyage,
		));
	}

	public function actionUpdateDN($id)
	{
		$model=$this->loadModel($id);
		$modelvoyage=$this->loadModelvoyage($model->id_voyage_order);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DebitNote']))
		{
					$model->attributes=$_POST['DebitNote'];
					$model->created_user=Yii::app()->user->id;
					$model->created_date=date("Y-m-d H:i:s");
					$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
		if($model->save()){
			Yii::app()->user->setFlash('success', " Data Updated");
			$this->redirect(array('voyageclose/listDN','id'=>$model->id_voyage_order));
			}
		}

		$this->render('createDN',array(
		'model'=>$model,
		'modelvoyage'=>$modelvoyage,
		'edit_mode'=>true,
		));
	}

	public function actionProsess($id,$someProsess)
	{
		$model=$this->loadModel($id);
		$model->omitted_status=$someProsess;
		$model->save();
		Yii::app()->user->setFlash('success', " Status Changed");
		$this->redirect(array('voyageclose/listDN','id'=>$model->id_voyage_order));
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

	if(isset($_POST['DebitNote']))
	{
			$model->attributes=$_POST['DebitNote'];
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
	if($model->save())
	$this->redirect(array('view','id'=>$model->id_debit_note));
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
	$dataProvider=new CActiveDataProvider('DebitNote');
	$this->render('index',array(
	'dataProvider'=>$dataProvider,
	));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
	$model=new DebitNote('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['DebitNote']))
	$model->attributes=$_GET['DebitNote'];

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
	$model=DebitNote::model()->findByPk($id);
	if($model===null)
	throw new CHttpException(404,'The requested page does not exist.');
	return $model;
	}

	public function loadModelvoyage($id)
	{
		$model=VoyageOrder::model()->findByPk($id);
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
	if(isset($_POST['ajax']) && $_POST['ajax']==='debit-note-form')
	{
	echo CActiveForm::validate($model);
	Yii::app()->end();
	}
	}
}
