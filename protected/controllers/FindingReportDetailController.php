<?php

class FindingReportDetailController extends Controller
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
'users'=>array('admin'),
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
$model=new FindingReportDetail;

$timenow=date("YmdHis");

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['FindingReportDetail']))
{
$model->attributes=$_POST['FindingReportDetail'];

$model->ImageLink='imagelink';

 		$model->id_finding_report=$id;
		$model->created_user=Yii::app()->user->id;
		$model->created_date=date("Y-m-d H:i:s");
		$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];


if($model->save()){

	$update=FindingReportDetail::model()->findByPk($model->id_finding_report_detail);
		if(strlen(trim(CUploadedFile::getInstance($model,'ImageLink'))) > 0){		
			$models=CUploadedFile::getInstance($model,'ImageLink');
			$extension=$models->extensionName;

			 $update->ImageLink='imagelink'.'_'.$timenow.'_'.$update->id_finding_report_detail.'.'.$extension;	// update Photoname di database	

			 $repo='repository/imagelink/';
			 $path=Yii::app()->basePath . '/../'.$repo.'imagelink'.'_'.$timenow.'_'.$update->id_finding_report_detail.'.'.$extension;
			 $models->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

			 $newfilenamewithoutex='imagelink'.'_'.$timenow.'_'.$update->id_finding_report_detail;	 
			 $strekstension = strtolower($extension);   
			 UploadImage::compressFileVerySmall($repo, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
			 UploadImage::compressFileWidth600($repo, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
			 UploadImage::compressFileForced($repo, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
			    
		}


	    $update->save(false);

	   
		Yii::app()->user->setFlash('success', " Data Saved");
		$this->redirect(array('findingreport/view','id'=>$id));
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
$repo='repository/imagelink/';
$timenow=date("YmdHis");

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['FindingReportDetail']))
{
$model->attributes=$_POST['FindingReportDetail'];

	if(strlen(trim(CUploadedFile::getInstance($model,'ImageLink'))) > 0){	// jika ada perubahan gambar , maka gambar lama di hapus ganti dengan gambar baru

			$modeldatalama=FindingReportDetail::model()->findByPk($id);
			$fotoname=$modeldatalama->ImageLink;
			//$file = $repo.$fotoname;	
			if($fotoname!=''){
				UploadFile::actiondeleteOldFile($repo, $fotoname);
				//unlink($file);
			}
			
			$models=CUploadedFile::getInstance($model,'ImageLink');
			$extension=$models->extensionName;

			$model->ImageLink='imagelink'.'_'.$timenow.'_'.$modeldatalama->id_finding_report_detail.'.'.$extension;	
		}

if($model->save())
{

	if(strlen(trim(CUploadedFile::getInstance($model,'ImageLink'))) > 0){	
			 $path=Yii::app()->basePath . '/../'.$repo.'imagelink'.'_'.$timenow.'_'.$model->id_finding_report_detail.'.'.$extension;
			 $models->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

			 $newfilenamewithoutex='imagelink'.'_'.$timenow.'_'.$model->id_finding_report_detail;	 
			 $strekstension = strtolower($extension);   
			 UploadImage::compressFileVerySmall($repo, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
			 UploadImage::compressFileWidth600($repo, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
			 UploadImage::compressFileForced($repo, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
			 }


Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('findingreport/view','id'=>$model->id_finding_report));
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
$dataProvider=new CActiveDataProvider('FindingReportDetail');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new FindingReportDetail('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['FindingReportDetail']))
$model->attributes=$_GET['FindingReportDetail'];

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
$model=FindingReportDetail::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='finding-report-detail-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
