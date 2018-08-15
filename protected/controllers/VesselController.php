<?php

class VesselController extends Controller
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
		'actions'=>array('admin','delete','documentcreate','view2','view','create','update'),
		'roles'=>array('ADM','MKT','OPR', 'VPC'),
		),
		array('deny',  // deny all users
		'roles'=>array('CUS','FIC','CRW','NAU'),
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

		$modeldoc=new VesselDocumentInfo('search');
		$modeldoc->unsetAttributes();  // clear any default values
		if(isset($_GET['VesselDocumentInfo']))
		$modeldoc->attributes=$_GET['VesselDocumentInfo'];

	if(Yii::app()->request->getIsAjaxRequest())
			 {
			  echo $this->renderPartial('view',array('model'=>$this->loadModel($id),'modeldoc'=>$modeldoc),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('view',array(
	'model'=>$this->loadModel($id),
	'modeldoc'=>$modeldoc,
	));
	}

	public function actionView2($id)
	{
	if(Yii::app()->request->getIsAjaxRequest())
			 {
			  echo $this->renderPartial('view2',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('view2',array(
	'model'=>$this->loadModel($id),
	));
	}

	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionCreate()
	{
	$model=new Vessel;

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['Vessel']))
	{
	$model->attributes=$_POST['Vessel'];
	$model->LastDateMaintenance=date("Y-m-d");

	if($_POST['Vessel']['VesselType']=="TUG"){
		if($_POST['Vessel']['Power']==""){
		$model->addError('Power', 'Cannot Blank');
		}
	}

	if($_POST['Vessel']['VesselType']=="BARGE"){
		if($_POST['Vessel']['Capacity']==""){
		$model->addError('Capacity', 'Cannot Blank');
		}
	}

	if($model->save()){
	Yii::app()->user->setFlash('success', " Data Saved");
	$this->redirect(array('view','id'=>$model->id_vessel));
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

	if(isset($_POST['Vessel']))
	{
	$model->attributes=$_POST['Vessel'];
	$model->LastDateMaintenance=date("Y-m-d");

	if($_POST['Vessel']['VesselType']=="TUG"){
		if($_POST['Vessel']['Power']==""){
		$model->addError('Power', 'Cannot Blank');
		}
	}

	if($_POST['Vessel']['VesselType']=="BARGE"){
		if($_POST['Vessel']['Capacity']==""){
		$model->addError('Capacity', 'Cannot Blank');
		}
	}

	if($model->save())
	{
	Yii::app()->user->setFlash('success', " Data Updated");
	$this->redirect(array('admin','id'=>$model->id_vessel));
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
	$modeldatalama=Vessel::model()->findByPk($id);
	$this->loadModel($id)->delete();

				$repo='repository/vessel/';
				$fotoname=$modeldatalama->foto_vessel;
				//$file = $repo.$fotoname;	
				if($fotoname!=''){
					UploadFile::actiondeleteOldFile($repo, $fotoname);
					//unlink($file);
				}

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
	$dataProvider=new CActiveDataProvider('Vessel');
	$this->render('index',array(
	'dataProvider'=>$dataProvider,
	));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
	$model=new Vessel('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['Vessel']))
	$model->attributes=$_GET['Vessel'];

	$this->render('admin',array(
	'model'=>$model,
	));
	}




	public function actiondocumentCreate($id)
	{
	$model=new VesselDocumentInfo;

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);


	$timenow=date("YmdHis");

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['VesselDocumentInfo']))
	{
	$model->attributes=$_POST['VesselDocumentInfo'];

	$model->Attachment='attachment';

			

			$model->id_vessel=$id;
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

	if($model->save()){

			$update=VesselDocumentInfo::model()->findByPk($model->id_vessel_document_info);
			if(strlen(trim(CUploadedFile::getInstance($model,'Attachment'))) > 0){		
				$models=CUploadedFile::getInstance($model,'Attachment');
				$extension=$models->extensionName;

				 $update->Attachment='attachment'.'_'.$timenow.'_'.$update->id_vessel_document_info.'.'.$extension;	// update Photoname di database	

				 $repo='repository/vesseldocument/';
				 $path=Yii::app()->basePath . '/../'.$repo.'attachment'.'_'.$timenow.'_'.$update->id_vessel_document_info.'.'.$extension;
				 $models->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

				 $newfilenamewithoutex='attachment'.'_'.$timenow.'_'.$update->id_vessel_document_info;	 
				 $strekstension = strtolower($extension);   
				 UploadImage::compressFileVerySmall($repo, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
				 UploadImage::compressFileWidth600($repo, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
				 UploadImage::compressFileForced($repo, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
					
			}


			$update->save(false);



	Yii::app()->user->setFlash('success', " Data Saved");
	$this->redirect(array('view','id'=>$model->id_vessel));
	}
	}
	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('../vesseldocumentinfo/create',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../vesseldocumentinfo/create',array(
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
	$model=Vessel::model()->findByPk($id);
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
	if(isset($_POST['ajax']) && $_POST['ajax']==='vessel-form')
	{
	echo CActiveForm::validate($model);
	Yii::app()->end();
	}
	}
}
