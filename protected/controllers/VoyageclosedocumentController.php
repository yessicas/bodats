<?php

class VoyageclosedocumentController extends Controller
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
'actions'=>array('create','update','createdocument'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete'),
'users'=>array('admin'),
),
array('@',  // deny all users
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
$model=new VoyageCloseDocument;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['VoyageCloseDocument']))
{
$model->attributes=$_POST['VoyageCloseDocument'];
if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('view','id'=>$model->id_voyage_close_document));
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


public function actionCreatedocument($id_voyage_order,$IdVoyageDocument)
{


$modelVoyageDocument=$this->loadModelVoyageDocument($IdVoyageDocument);

$modelexist=$this->loadModelexist($id_voyage_order,$IdVoyageDocument);
if($modelexist){
	$model=$this->loadModelbyattvoyageorder($id_voyage_order,$IdVoyageDocument);
	$lastmodelbeforesave=$this->loadModelbyattvoyageorder($id_voyage_order,$IdVoyageDocument);
}else{
	$model=new VoyageCloseDocument;
}

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['VoyageCloseDocument']))
{

$datetime_now=date("YmdHis");
$model->attributes=$_POST['VoyageCloseDocument'];
$model->uploaded_user=Yii::app()->user->id;
$model->uploaded_date=date("Y-m-d H:i:s");
$model->ip_user_uploaded=$_SERVER['REMOTE_ADDR'];

		if(strlen(trim(CUploadedFile::getInstance($model,'VoyageDocumentName'))) > 0)
            {
            
            $models=CUploadedFile::getInstance($model,'VoyageDocumentName');
            $extension=$models->extensionName;
            $model->VoyageDocumentName=md5($_POST['VoyageCloseDocument']['id_voyage_order']."-".$_POST['VoyageCloseDocument']['IdVoyageDocument']).$datetime_now.'.'.$extension;
            }

if($model->save()){

		if($modelexist){
		unlink(Yii::app()->basePath . '/../repository/voyage_close_document/'.$lastmodelbeforesave->VoyageDocumentName); // delete apa bila update
		}

		$filename=md5($model->id_voyage_order."-".$model->IdVoyageDocument).$datetime_now;
        $path=Yii::app()->basePath . '/../repository/voyage_close_document/'.$filename.'.'.$extension;
        $models->saveAs($path);


Yii::app()->user->setFlash('success', " Data Uploaded");
$this->redirect(array('voyageclose/create_voyage_document','id'=>$id_voyage_order));
}

}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model,'modelVoyageDocument'=>$modelVoyageDocument,),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('create',array(
'model'=>$model,
'modelVoyageDocument'=>$modelVoyageDocument,
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

if(isset($_POST['VoyageCloseDocument']))
{
$model->attributes=$_POST['VoyageCloseDocument'];
if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('admin','id'=>$model->id_voyage_close_document));
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
$dataProvider=new CActiveDataProvider('VoyageCloseDocument');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new VoyageCloseDocument('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['VoyageCloseDocument']))
$model->attributes=$_GET['VoyageCloseDocument'];

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
$model=VoyageCloseDocument::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

public function loadModelVoyageDocument($IdVoyageDocument)
{
$model=MstVoyageDocument::model()->findByPk($IdVoyageDocument);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

public function loadModelbyattvoyageorder($id_voyage_order,$IdVoyageDocument)
{
$model=VoyageCloseDocument::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order,'IdVoyageDocument'=>$IdVoyageDocument));
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

public function loadModelexist($id_voyage_order,$IdVoyageDocument)
{
$model=VoyageCloseDocument::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order,'IdVoyageDocument'=>$IdVoyageDocument));
return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='voyage-close-document-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
