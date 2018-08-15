<?php

class DataperusahaanController extends Controller
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
'actions'=>array('index','view','viewcompany'),
'users'=>array('@'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete','uploadfoto','unggah'),
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
/*
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}
*/

public function actionView()
{
$id =  Yii::app()->user->id;
$modeluserPerusahaan=UserPerusahaan::model()->findByAttributes(array('userid'=>$id));
$model=DataPerusahaan::model()->findByAttributes(array('id_perusahaan'=>$modeluserPerusahaan->id_perusahaan));
$this->render('view',array(
'model'=>$model,
));
}


public function actionViewcompany($id,$c)
{
//$id nya id_perusahaan diri $c nya codeid substr 10 dari data perusahaan
// contoh url untuk view perusahaan http://localhost/careerpath/dataperusahaan/viewcompany/id/17/c/f2ec9b0860
$this->render('view',array(
'model'=>$this->loadModel($id,$c),
));
}
/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new DataPerusahaan;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['DataPerusahaan']))
{
$model->attributes=$_POST['DataPerusahaan'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_perusahaan));
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
public function actionUpdate($id,$c)
{
$model=$this->loadModel($id,$c);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['DataPerusahaan']))
{
$model->attributes=$_POST['DataPerusahaan'];
if($model->save())
{

$modeluserperusahaan =UserPerusahaan::model()->findByAttributes(array('id_perusahaan'=>$model->id_perusahaan));
$modeluser=Users::model()->findByAttributes(array('userid'=>$modeluserperusahaan->userid));
$modeluser->full_name=$model->nama_perusahaan;
$modeluser->save(false);

Yii::app()->user->setFlash('success', "Data  Perusahaan  $model->nama_perusahaan  telah dirubah.");
$this->redirect(array('view'));
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
$dataProvider=new CActiveDataProvider('DataPerusahaan');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new DataPerusahaan('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['DataPerusahaan']))
$model->attributes=$_GET['DataPerusahaan'];

$this->render('admin',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id,$c)
{

$criteria = new CDbCriteria();
$criteria->condition = "id_perusahaan=".$id." AND Substring(code_id,6,10)="."'$c'";
$model=DataPerusahaan::model()->find($criteria);
//$model=DataPerusahaan::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='data-perusahaan-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}

public function actionUploadfoto(){
		$id =  Yii::app()->user->id;
		$modeluserPerusahaan=UserPerusahaan::model()->findByAttributes(array('userid'=>$id));
		$model=DataPerusahaan::model()->findByAttributes(array('id_perusahaan'=>$modeluserPerusahaan->id_perusahaan));

		if(Yii::app()->request->getIsAjaxRequest()){
			 //Yii::app()->clientScript->scriptMap['*.js'] = false;
	          echo $this->renderPartial('unggahfile',array(
	          	'id'=>$id,
	          	'model'=>$model,
	          	),true,true);
          }

        else
		$this->render('unggahfile',array(
			'id'=>$id,
			'model'=>$model,
		));
	}

		public function actionUnggah()
	{

		$id =  Yii::app()->user->id;
		$modeluserPerusahaan=UserPerusahaan::model()->findByAttributes(array('userid'=>$id));
		$model=DataPerusahaan::model()->findByAttributes(array('id_perusahaan'=>$modeluserPerusahaan->id_perusahaan));
		$modelname = "DataPerusahaan";
		$fieldname = "foto_profil";
		$path = "repository/company/";
		$PK = "id_perusahaan";
		$c=SecurityGenerator::SecurityDisplay($model->code_id);
		//$newname = "cmp_".$c."_";
		$newname = "cmp_".$c."_".date("YmdHis")."_";
		//echo$model->nama_perusahaan;
		$ui = new UploadImage();
		$ui->FC_WIDTH = 200;
		$ui->FC_HEIGHT = 200;
		if($ui->uploadSingleImage($model, $modelname, $fieldname, $path, $PK, $newname)){
			//$this->render('view', array('id'=>$id, 'model'=>$model, 'sukses'=>'ok'));
			$this->redirect(array('dataperusahaan/view'));
			exit();
		}
		
		$this->render('unggahfile',array(
			'id'=>$id,
			'model'=>$model,
		));
	}
}