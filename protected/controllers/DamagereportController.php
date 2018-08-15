<?php

class DamagereportController extends Controller
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
'actions'=>array('create','update','admin','delete','index','editable'),
'roles'=>array('ADM','OPR'),
),
array('deny',  // deny all users
'roles'=>array('CUS','FIC','CRW','NAU','MKT'),
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
$model=new DamageReport;
$timenow=date("YmdHis");

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['DamageReport']))
{
$model->attributes=$_POST['DamageReport'];

$model->DamagePhoto='damagephoto';

if($model->save()){

	$update=DamageReport::model()->findByPk($model->id_damage_report);
		if(strlen(trim(CUploadedFile::getInstance($model,'DamagePhoto'))) > 0){		
			$models=CUploadedFile::getInstance($model,'DamagePhoto');
			$extension=$models->extensionName;

			 $update->DamagePhoto='damagephoto'.'_'.$timenow.'_'.$update->id_damage_report.'.'.$extension;	// update Photoname di database	

			 $repo='repository/damagephoto/';
			 $path=Yii::app()->basePath . '/../'.$repo.'damagephoto'.'_'.$timenow.'_'.$update->id_damage_report.'.'.$extension;
			 $models->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

			 $newfilenamewithoutex='damagephoto'.'_'.$timenow.'_'.$update->id_damage_report;	 
			 $strekstension = strtolower($extension);   
			 UploadImage::compressFileVerySmall($repo, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
			 UploadImage::compressFileWidth600($repo, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
			 UploadImage::compressFileForced($repo, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
			    
		}


	    $update->save(false);


		Yii::app()->user->setFlash('success', " Data Saved");
		$this->redirect(array('view','id'=>$model->id_damage_report));
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
$model=$this->loadModel($id,'DamageReport');
$repo='repository/damagephoto/';
$timenow=date("YmdHis");

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['DamageReport']))
{
$model->attributes=$_POST['DamageReport'];

if(strlen(trim(CUploadedFile::getInstance($model,'DamagePhoto'))) > 0){	// jika ada perubahan gambar , maka gambar lama di hapus ganti dengan gambar baru

			$modeldatalama=DamageReport::model()->findByPk($id);
			$fotoname=$modeldatalama->DamagePhoto;
			//$file = $repo.$fotoname;	
			if($fotoname!=''){
				UploadFile::actiondeleteOldFile($repo, $fotoname);
				//unlink($file);
			}
			
			$models=CUploadedFile::getInstance($model,'DamagePhoto');
			$extension=$models->extensionName;

			$model->DamagePhoto='damagephoto'.'_'.$timenow.'_'.$modeldatalama->id_damage_report.'.'.$extension;	
		}


if($model->save())
{
	if(strlen(trim(CUploadedFile::getInstance($model,'DamagePhoto'))) > 0){	
			 $path=Yii::app()->basePath . '/../'.$repo.'damagephoto'.'_'.$timenow.'_'.$model->id_damage_report.'.'.$extension;
			 $models->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

			 $newfilenamewithoutex='damagephoto'.'_'.$timenow.'_'.$model->id_damage_report;	 
			 $strekstension = strtolower($extension);   
			 UploadImage::compressFileVerySmall($repo, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
			 UploadImage::compressFileWidth600($repo, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
			 UploadImage::compressFileForced($repo, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
			 }


Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('admin','id'=>$model->id_damage_report));
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
$model=$this->loadModel($id);

$this->loadModel($id)->delete();
			$repo='repository/damagephoto/';
			$fotoname=$model->DamagePhoto;
			//$file = $repo.$fotoname;	
			if($fotoname!=''){
				UploadFile::actiondeleteOldFile($repo, $fotoname);
				//unlink($file);
			}
		
		$criterialastDamage = new CDbCriteria();
		$criterialastDamage->condition = 'id_vessel =:id_vessel'; 
		$criterialastDamage->params = array(':id_vessel'=>$model->id_vessel);
		$criterialastDamage->order="DamageTime DESC"; 
		$lastDamage  = DamageReport::model()->find($criterialastDamage); 

		if($lastDamage){
			$lastDateDamageData=$lastDamage->DamageTime;
		}else{
			$lastDateDamageData='0000-00-00';
		}

		//update vessel date of damage 
	    $Vessel =  Vessel::model()->findByPk($model->id_vessel);
	    $Vessel->LastDateofDamage=$lastDateDamageData;
	    $Vessel->NumberOfDamage=$Vessel->NumberOfDamage-1;
	    $Vessel->save(false);


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
$dataProvider=new CActiveDataProvider('DamageReport');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new DamageReport('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['DamageReport']))
$model->attributes=$_GET['DamageReport'];

$this->render('admin',array(
'model'=>$model,
));
}

public function actionEditable()
	{
		$es = new EditableSaver('DamageReport');
		try {

			$es->onBeforeUpdate = function($event) {
					 
					  };
			$es->update();
		} catch(CException $e) {
			echo CJSON::encode(array('success' => false, 'msg' => $e->getMessage()));
			return;
		}
		echo CJSON::encode(array('success' => true));
	}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
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
if(isset($_POST['ajax']) && $_POST['ajax']==='damage-report-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
