<?php

class StandardvesselbrokerageController extends Controller
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
$model=new StandardVesselBrokerage;
$modelVesselCost=$this->loadModelVesselcost($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['StandardVesselBrokerage']))
{
$model->attributes=$_POST['StandardVesselBrokerage'];

$model->id_standard_vessel_cost=$id;
$model->created_user=Yii::app()->user->id;
$model->created_date=date("Y-m-d H:i:s");
$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

if($model->save()){


	$modelVesselCostUpdate=$this->loadModelVesselcost($model->id_standard_vessel_cost);
	$sql ="SELECT SUM( amount ) AS total
				FROM  `standard_vessel_brokerage` 
				WHERE id_standard_vessel_cost = $model->id_standard_vessel_cost";  
	$command =Yii::app()->db->createCommand($sql); 
	$total =$command->queryRow(); 

	$modelVesselCostUpdate->brokerage_fee=$total['total'];
	$modelVesselCostUpdate->save(false);



Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('viewdetail','id'=>$model->id_standard_vessel_cost));
}
}

$this->render('create',array(
'model'=>$model,
'modelVesselCost'=>$modelVesselCost,
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
$modelVesselCost=$this->loadModelVesselcost($model->id_standard_vessel_cost);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['StandardVesselBrokerage']))
{
$model->attributes=$_POST['StandardVesselBrokerage'];

$model->created_user=Yii::app()->user->id;
$model->created_date=date("Y-m-d H:i:s");
$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

if($model->save())
{


	$modelVesselCostUpdate=$this->loadModelVesselcost($model->id_standard_vessel_cost);
	$sql ="SELECT SUM( amount ) AS total
				FROM  `standard_vessel_brokerage` 
				WHERE id_standard_vessel_cost = $model->id_standard_vessel_cost";  
	$command =Yii::app()->db->createCommand($sql); 
	$total =$command->queryRow(); 

	$modelVesselCostUpdate->brokerage_fee=$total['total'];
	$modelVesselCostUpdate->save(false);


Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('viewdetail','id'=>$model->id_standard_vessel_cost));
}
}

$this->render('update',array(
'model'=>$model,
'modelVesselCost'=>$modelVesselCost,
));
}

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id,$id_standard_vessel_cost)
{
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$model=$this->loadModel($id);
$this->loadModel($id)->delete();

	$modelVesselCostUpdate=$this->loadModelVesselcost($id_standard_vessel_cost);
	$sql ="SELECT SUM( amount ) AS total
				FROM  `standard_vessel_brokerage` 
				WHERE id_standard_vessel_cost = $id_standard_vessel_cost";  
	$command =Yii::app()->db->createCommand($sql); 
	$total =$command->queryRow(); 

	$modelVesselCostUpdate->brokerage_fee=$total['total'];
	$modelVesselCostUpdate->save(false);

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('viewdetail','id'=>$model->id_standard_vessel_cost));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('StandardVesselBrokerage');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new StandardVesselBrokerage('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['StandardVesselBrokerage']))
$model->attributes=$_GET['StandardVesselBrokerage'];

$this->render('admin',array(
'model'=>$model,
));
}

public function loadModelVesselcost($id)
{
$model=StandardVesselCost::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}


public function actionviewdetail($id)
{

$modelVesselCost=$this->loadModelVesselcost($id);

$model=new StandardVesselBrokerage('searchbyvesselcost');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['StandardVesselBrokerage']))
$model->attributes=$_GET['StandardVesselBrokerage'];

if(isset($_POST['StandardVesselCost']))
{
$modelVesselCost->attributes=$_POST['StandardVesselCost'];
$modelVesselCost->created_user=Yii::app()->user->id;
$modelVesselCost->created_date=date("Y-m-d H:i:s");
$modelVesselCost->ip_user_updated=$_SERVER['REMOTE_ADDR'];
if($modelVesselCost->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('standardvesselcost/admin'));
}
}


$this->render('viewdetail',array(
'model'=>$model,
'modelVesselCost'=>$modelVesselCost,
));
}


/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=StandardVesselBrokerage::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='standard-vessel-brokerage-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
