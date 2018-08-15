<?php

class CrewController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/triplets';

public $VS_NAME = "VS";
public $SR_NAME = "SR";
public $FC_NAME = "FC";
public $VS_WIDTH = 80;
public $SR_WIDTH = 600;
public $FC_WIDTH = 570;
public $FC_HEIGHT = 400;

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
'actions'=>array('admin','delete','view','create','update','index','uploadfoto'),
'roles'=>array('ADM','CRW','OPR','FIC'),
),
array('deny',  // deny all users
'roles'=>array('CUS','MKT','NAU'),
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
$model=new Crew;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Crew']))
{
$model->attributes=$_POST['Crew'];
if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('view','id'=>$model->CrewId));
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

if(isset($_POST['Crew']))
{
$model->attributes=$_POST['Crew'];
if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('admin','id'=>$model->CrewId));
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

			$repo='repository/crew/';
			$modeldatalama=Crew::model()->findByPk($id);
			$fotoname=$modeldatalama->Photo;
			//$file = $repo.$fotoname;	
			if($fotoname!=''){
				UploadFile::actiondeleteOldFile($repo, $fotoname);
				//unlink($file);
			}

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
$dataProvider=new CActiveDataProvider('Crew');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Crew('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Crew']))
$model->attributes=$_GET['Crew'];

$this->render('admin',array(
'model'=>$model,
));
}


public function actionUploadfoto(){
		$id =  Yii::app()->user->id;
		$model=Users::model()->findByAttributes(array('userid'=>$id));

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
		$model=Crew::model()->findByAttributes(array('userid'=>$id));
		$modelname = "Crew";
		$fieldname = "Photo";
		$path = "repository/users/";
		$PK = "CrewId";
		$user=Users::model()->findByPK($id);
		$newname = "usr_"."_";
		//echo$model->nama_lengkap;
		$ui = new UploadImage();
		$ui->FC_WIDTH = 200;
		$ui->FC_HEIGHT = 200;
		if($ui->uploadSingleImage($model, $modelname, $fieldname, $path, $PK, $newname)){
			//$this->render('view', array('id'=>$id, 'model'=>$model, 'sukses'=>'ok'));
			$this->redirect(array('crew/view'));
			exit();
		}
		
		$this->render('unggahfile',array(
			'id'=>$id,
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
$model=Crew::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='crew-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
