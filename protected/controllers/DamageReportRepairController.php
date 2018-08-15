<?php

class DamageReportRepairController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/column2';

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

$model=$this->loadModelbyDamage($id);
$modelDamage=$this->loadModelDamageReport($id);

$this->render('view',array(
'model'=>$model,
'modelDamage'=>$modelDamage,
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate($id)
{

$model=new DamageReportRepair;
$modelDamage=$this->loadModelDamageReport($id);
$timenow=date("YmdHis");

$modelCreated=DamageReportRepair::model()->findByAttributes(array('id_damage_report'=>$id));
if($modelCreated){
	Yii::app()->user->setFlash('success', "This Damage Report Repair Has been Created, please Update if you want change");
	$this->redirect(array('repair/damage','id'=>$modelDamage->id_vessel));
}


// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['DamageReportRepair']))
{
$model->attributes=$_POST['DamageReportRepair'];

$model->id_damage_report=$id;
$model->id_request_for_schedule=$modelDamage->id_request_for_schedule;
$model->id_vessel=$modelDamage->id_vessel;
$model->Status='OPEN';

if($model->save()){

	$update=DamageReportRepair::model()->findByPk($model->id_damage_report_repair);


		if(strlen(trim(CUploadedFile::getInstance($model,'RepairPhoto1'))) > 0){		
			$models=CUploadedFile::getInstance($model,'RepairPhoto1');
			$extension=$models->extensionName;

			 $update->RepairPhoto1='RepairPhoto1'.'_'.$timenow.'_'.$update->id_damage_report_repair.'.'.$extension;	// update Photoname di database	

			 $repo='repository/damagerepairphoto/';
			 $path=Yii::app()->basePath . '/../'.$repo.'RepairPhoto1'.'_'.$timenow.'_'.$update->id_damage_report_repair.'.'.$extension;
			 $models->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

			 $newfilenamewithoutex='RepairPhoto1'.'_'.$timenow.'_'.$update->id_damage_report_repair;	 
			 $strekstension = strtolower($extension);   
			 UploadImage::compressFileVerySmall($repo, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
			 UploadImage::compressFileWidth600($repo, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
			 UploadImage::compressFileForced($repo, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
			    
		}


		if(strlen(trim(CUploadedFile::getInstance($model,'RepairPhoto2'))) > 0){		
			$models=CUploadedFile::getInstance($model,'RepairPhoto2');
			$extension=$models->extensionName;

			 $update->RepairPhoto2='RepairPhoto2'.'_'.$timenow.'_'.$update->id_damage_report_repair.'.'.$extension;	// update Photoname di database	

			 $repo='repository/damagerepairphoto/';
			 $path=Yii::app()->basePath . '/../'.$repo.'RepairPhoto2'.'_'.$timenow.'_'.$update->id_damage_report_repair.'.'.$extension;
			 $models->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

			 $newfilenamewithoutex='RepairPhoto2'.'_'.$timenow.'_'.$update->id_damage_report_repair;	 
			 $strekstension = strtolower($extension);   
			 UploadImage::compressFileVerySmall($repo, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
			 UploadImage::compressFileWidth600($repo, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
			 UploadImage::compressFileForced($repo, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
			    
		}

		if(strlen(trim(CUploadedFile::getInstance($model,'RepairPhoto3'))) > 0){		
			$models=CUploadedFile::getInstance($model,'RepairPhoto3');
			$extension=$models->extensionName;

			 $update->RepairPhoto3='RepairPhoto3'.'_'.$timenow.'_'.$update->id_damage_report_repair.'.'.$extension;	// update Photoname di database	

			 $repo='repository/damagerepairphoto/';
			 $path=Yii::app()->basePath . '/../'.$repo.'RepairPhoto3'.'_'.$timenow.'_'.$update->id_damage_report_repair.'.'.$extension;
			 $models->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

			 $newfilenamewithoutex='RepairPhoto3'.'_'.$timenow.'_'.$update->id_damage_report_repair;	 
			 $strekstension = strtolower($extension);   
			 UploadImage::compressFileVerySmall($repo, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
			 UploadImage::compressFileWidth600($repo, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
			 UploadImage::compressFileForced($repo, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
			    
		}

				// insert nomornya
				$dataformatnumber=NumberingDocumentDBDamageRepair::getFormatNumber($update,'id_damage_report_repair','NoReport','NoMonth','NoYear',$model->id_damage_report_repair);
				$update->DamageReportNumber = $dataformatnumber['NumberFormat']; 
				$update->NoReport = $dataformatnumber['NoOrder']; 
				$update->NoMonth = NumberingDocumentDBDamageRepair::getMonthNow(); 
				$update->NoYear = NumberingDocumentDBDamageRepair::getYearNow(); 

	$update->save(false);


	// ubah status jadi close
	$modelDamage->Status='CLOSED';
	$modelDamage->save(false);

	Yii::app()->user->setFlash('success', " Data Saved");
	$this->redirect(array('view','id'=>$model->id_damage_report));
}
}

$this->render('create',array(
'model'=>$model,
'modelDamage'=>$modelDamage,
));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
$model=$this->loadModelbyDamage($id);
$modelDamage=$this->loadModelDamageReport($model->id_damage_report);
$timenow=date("YmdHis");

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['DamageReportRepair']))
{
$model->attributes=$_POST['DamageReportRepair'];
if($model->save()){



		$update=DamageReportRepair::model()->findByPk($model->id_damage_report_repair);


		if(strlen(trim(CUploadedFile::getInstance($model,'RepairPhoto1'))) > 0){	
			$repo='repository/damagerepairphoto/';
			$fotoname=$update->RepairPhoto1;
			//$file = $repo.$fotoname;	
			if($fotoname!=''){
				UploadFile::actiondeleteOldFile($repo, $fotoname);
				//unlink($file);
			}


			$models=CUploadedFile::getInstance($model,'RepairPhoto1');
			$extension=$models->extensionName;

			 $update->RepairPhoto1='RepairPhoto1'.'_'.$timenow.'_'.$update->id_damage_report_repair.'.'.$extension;	// update Photoname di database	

			
			 $path=Yii::app()->basePath . '/../'.$repo.'RepairPhoto1'.'_'.$timenow.'_'.$update->id_damage_report_repair.'.'.$extension;
			 $models->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

			 $newfilenamewithoutex='RepairPhoto1'.'_'.$timenow.'_'.$update->id_damage_report_repair;	 
			 $strekstension = strtolower($extension);   
			 UploadImage::compressFileVerySmall($repo, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
			 UploadImage::compressFileWidth600($repo, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
			 UploadImage::compressFileForced($repo, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
			    
		}


		if(strlen(trim(CUploadedFile::getInstance($model,'RepairPhoto2'))) > 0){	

			$repo='repository/damagerepairphoto/';
			$fotoname=$update->RepairPhoto2;
			//$file = $repo.$fotoname;	
			if($fotoname!=''){
				UploadFile::actiondeleteOldFile($repo, $fotoname);
				//unlink($file);
			}

			$models=CUploadedFile::getInstance($model,'RepairPhoto2');
			$extension=$models->extensionName;

			 $update->RepairPhoto2='RepairPhoto2'.'_'.$timenow.'_'.$update->id_damage_report_repair.'.'.$extension;	// update Photoname di database	

			 $path=Yii::app()->basePath . '/../'.$repo.'RepairPhoto2'.'_'.$timenow.'_'.$update->id_damage_report_repair.'.'.$extension;
			 $models->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

			 $newfilenamewithoutex='RepairPhoto2'.'_'.$timenow.'_'.$update->id_damage_report_repair;	 
			 $strekstension = strtolower($extension);   
			 UploadImage::compressFileVerySmall($repo, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
			 UploadImage::compressFileWidth600($repo, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
			 UploadImage::compressFileForced($repo, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
			    
		}

		if(strlen(trim(CUploadedFile::getInstance($model,'RepairPhoto3'))) > 0){	

			$repo='repository/damagerepairphoto/';
			$fotoname=$update->RepairPhoto3;
			//$file = $repo.$fotoname;	
			if($fotoname!=''){
				UploadFile::actiondeleteOldFile($repo, $fotoname);
				//unlink($file);
			}

			$models=CUploadedFile::getInstance($model,'RepairPhoto3');
			$extension=$models->extensionName;

			 $update->RepairPhoto3='RepairPhoto3'.'_'.$timenow.'_'.$update->id_damage_report_repair.'.'.$extension;	// update Photoname di database	

			 $path=Yii::app()->basePath . '/../'.$repo.'RepairPhoto3'.'_'.$timenow.'_'.$update->id_damage_report_repair.'.'.$extension;
			 $models->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

			 $newfilenamewithoutex='RepairPhoto3'.'_'.$timenow.'_'.$update->id_damage_report_repair;	 
			 $strekstension = strtolower($extension);   
			 UploadImage::compressFileVerySmall($repo, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
			 UploadImage::compressFileWidth600($repo, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
			 UploadImage::compressFileForced($repo, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
			    
		}

	$update->save(false);

Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('view','id'=>$model->id_damage_report));
}
}

$this->render('update',array(
'model'=>$model,
'modelDamage'=>$modelDamage,
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
$dataProvider=new CActiveDataProvider('DamageReportRepair');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new DamageReportRepair('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['DamageReportRepair']))
$model->attributes=$_GET['DamageReportRepair'];

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
$model=DamageReportRepair::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}


public function loadModelbyDamage($id)
{
$model=DamageReportRepair::model()->findByAttributes(array('id_damage_report'=>$id));
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

public function loadModelDamageReport($id)
{
$model=DamageReport::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='damage-report-repair-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
