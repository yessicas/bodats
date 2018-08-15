<?php

class StandardagencyitemController extends Controller
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
'actions'=>array('admin','delete','viewdetail'),
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
public function actionCreate($id)
{
$model=new StandardAgencyItem;
$modelAgency=$this->loadModelAgency($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['StandardAgencyItem']))
{
$model->attributes=$_POST['StandardAgencyItem'];

$model->id_standard_agency=$id;
$model->created_user=Yii::app()->user->id;
$model->created_date=date("Y-m-d H:i:s");
$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

if($model->save()){

	$modelAgencyUpdate=$this->loadModelAgency($model->id_standard_agency);

	/*
	$sqlFix ="SELECT SUM( agency_fix_cost ) as total
			FROM  `standard_agency_item` 
			WHERE id_standard_agency =  $model->id_standard_agency ";
	*/
	$sqlFix ="SELECT SUM( quantity * unit_price ) AS total
				FROM  `standard_agency_item` 
				WHERE id_standard_agency =$model->id_standard_agency
				AND TYPE =  'FIX'"; 

	$commandFix =Yii::app()->db->createCommand($sqlFix); 
	$totalFix =$commandFix->queryRow(); 

	/*
	$sqlVar ="SELECT SUM( agency_var_cost  ) as total
			FROM  `standard_agency_item` 
			WHERE id_standard_agency =  $model->id_standard_agency ";  
	*/

	$sqlVar ="SELECT SUM( quantity * unit_price ) AS total
				FROM  `standard_agency_item` 
				WHERE id_standard_agency =$model->id_standard_agency
				AND TYPE =  'VARIABLE'";

	$commandVar =Yii::app()->db->createCommand($sqlVar); 
	$totalVar =$commandVar->queryRow(); 

	$modelAgencyUpdate->agency_fix_cost=$totalFix['total'];
	$modelAgencyUpdate->agency_var_cost=$totalVar['total'];

	$modelAgencyUpdate->save(false);



Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('standardagencyitem/viewdetail','id'=>$model->id_standard_agency));
}
}

$this->render('create',array(
'model'=>$model,
'modelAgency'=>$modelAgency,
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
$modelAgency=$this->loadModelAgency($model->id_standard_agency);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['StandardAgencyItem']))
{
$model->attributes=$_POST['StandardAgencyItem'];
$model->created_user=Yii::app()->user->id;
$model->created_date=date("Y-m-d H:i:s");
$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
if($model->save())
{

	$modelAgencyUpdate=$this->loadModelAgency($model->id_standard_agency);

	/*
	$sqlFix ="SELECT SUM( agency_fix_cost ) as total
			FROM  `standard_agency_item` 
			WHERE id_standard_agency =  $model->id_standard_agency ";
	*/
	$sqlFix ="SELECT SUM( quantity * unit_price ) AS total
				FROM  `standard_agency_item` 
				WHERE id_standard_agency =$model->id_standard_agency
				AND TYPE =  'FIX'"; 

	$commandFix =Yii::app()->db->createCommand($sqlFix); 
	$totalFix =$commandFix->queryRow(); 

	/*
	$sqlVar ="SELECT SUM( agency_var_cost  ) as total
			FROM  `standard_agency_item` 
			WHERE id_standard_agency =  $model->id_standard_agency ";  
	*/

	$sqlVar ="SELECT SUM( quantity * unit_price ) AS total
				FROM  `standard_agency_item` 
				WHERE id_standard_agency =$model->id_standard_agency
				AND TYPE =  'VARIABLE'";

	$commandVar =Yii::app()->db->createCommand($sqlVar); 
	$totalVar =$commandVar->queryRow(); 

	$modelAgencyUpdate->agency_fix_cost=$totalFix['total'];
	$modelAgencyUpdate->agency_var_cost=$totalVar['total'];

	$modelAgencyUpdate->save(false);


Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('standardagencyitem/viewdetail','id'=>$model->id_standard_agency));
}
}


$this->render('update',array(
'model'=>$model,
'modelAgency'=>$modelAgency,
));
}

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id,$id_standard_agency)
{
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$model=$this->loadModel($id);
$this->loadModel($id)->delete();

	$modelAgencyUpdate=$this->loadModelAgency($id_standard_agency);

	/*
	$sqlFix ="SELECT SUM( agency_fix_cost ) as total
			FROM  `standard_agency_item` 
			WHERE id_standard_agency =  $model->id_standard_agency ";
	*/
	$sqlFix ="SELECT SUM( quantity * unit_price ) AS total
				FROM  `standard_agency_item` 
				WHERE id_standard_agency =$model->id_standard_agency
				AND TYPE =  'FIX'"; 

	$commandFix =Yii::app()->db->createCommand($sqlFix); 
	$totalFix =$commandFix->queryRow(); 

	/*
	$sqlVar ="SELECT SUM( agency_var_cost  ) as total
			FROM  `standard_agency_item` 
			WHERE id_standard_agency =  $model->id_standard_agency ";  
	*/

	$sqlVar ="SELECT SUM( quantity * unit_price ) AS total
				FROM  `standard_agency_item` 
				WHERE id_standard_agency =$model->id_standard_agency
				AND TYPE =  'VARIABLE'";

	$commandVar =Yii::app()->db->createCommand($sqlVar); 
	$totalVar =$commandVar->queryRow(); 

	$modelAgencyUpdate->agency_fix_cost=$totalFix['total'];
	$modelAgencyUpdate->agency_var_cost=$totalVar['total'];

	$modelAgencyUpdate->save(false);


// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
Yii::app()->user->setFlash('success', " Data Deleted");
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('standardagencyitem/viewdetail','id'=>$model->id_standard_agency));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('StandardAgencyItem');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new StandardAgencyItem('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['StandardAgencyItem']))
$model->attributes=$_GET['StandardAgencyItem'];

$this->render('admin',array(
'model'=>$model,
));
}


public function actionViewdetail($id)
{

$modelAgency=$this->loadModelAgency($id);

$model=new StandardAgencyItem('searchbyagency');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['StandardAgencyItem']))
$model->attributes=$_GET['StandardAgencyItem'];



if(isset($_POST['StandardAgency']))
{
$modelAgency->attributes=$_POST['StandardAgency'];

$modelAgency->created_user=Yii::app()->user->id;
$modelAgency->created_date=date("Y-m-d H:i:s");
$modelAgency->ip_user_updated=$_SERVER['REMOTE_ADDR'];

if($modelAgency->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('standardagency/admin'));
}
}



$this->render('viewdetail',array(
'modelAgency'=>$modelAgency,
'model'=>$model,
));
}

public function loadModelAgency($id)
{
$model=StandardAgency::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}


/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=StandardAgencyItem::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='standard-agency-item-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
