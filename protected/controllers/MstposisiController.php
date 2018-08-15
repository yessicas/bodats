<?php

class MstposisiController extends Controller
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
$model=new MstPosisi;
$model->userid=Yii::app()->user->id;
$model->time_update=date("Y-m-d H:i:s");

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['MstPosisi']))
{
$model->attributes=$_POST['MstPosisi'];
if($model->save())
				{
Yii::app()->user->setFlash('success', "Data Posisi $model->nama_posisi Telah disimpan.");
$this->redirect(array('mstposisi/admin'));
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
$model->userid=Yii::app()->user->id;
$model->time_update=date("Y-m-d H:i:s");

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['MstPosisi']))
{
$model->attributes=$_POST['MstPosisi'];
if($model->save())
				{
Yii::app()->user->setFlash('success', "Data Posisi $model->nama_posisi Telah diubah");
$this->redirect(array('mstposisi/admin'));
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
$model=$this->loadModel($id);
		if(Yii::app()->request->isPostRequest)
		{		
			$this->loadModel($id)->delete();
			if(!isset($_GET['ajax']))
				Yii::app()->user->setFlash('success',  "Data Posisi $model->nama_posisi Telah dihapus ");
				$this->redirect(isset($_POST['returnUrl']) 
                                 ? $_POST['returnUrl'] : array('mstposisi/admin'));
		}
		else
			throw new CHttpException(400,
                        'Invalid request. Please do not repeat this request again.');

}


/**
* Lists all models.
*/
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('MstPosisi');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new MstPosisi('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['MstPosisi']))
$model->attributes=$_GET['MstPosisi'];

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
$model=MstPosisi::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='mst-posisi-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}