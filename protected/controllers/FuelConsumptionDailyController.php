<?php

class FuelConsumptionDailyController extends Controller
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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','view','create','update','index', 'vesselfuel','download','updateattch',),
				'roles'=>array('ADM','NAU','CCT', 'FCT'),
			),
			array('deny',  // deny all users
				//'roles'=>array('CUS','FIC','CRW','MKT','OPR'),
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
		$model=new FuelConsumptionDaily;
		$timenow=date("YmdHis");
		//INi diacak saja datanya biar tidak mudah ditebak datanya
		$timenow=substr(md5($timenow), 11);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->status_remain = "ROB";
		$model->NearestDistancePoint = 0;
		if(isset($_POST['FuelConsumptionDaily']))
		{
			$model->attributes=$_POST['FuelConsumptionDaily'];
			$model->file_attachment='file';
			$model->pic=$_POST['FuelConsumptionDaily']['pic'];
			$model->month = Timeanddate::getMonthOnly($model->log_date);
			$model->year = Timeanddate::getYearOnly($model->log_date);
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

			if($model->save()){
				$update=FuelConsumptionDaily::model()->findByPk($model->id_fuel_consumption_daily);
				//Get Summary
				$fuel = FuelDB::getLastFuelROB($model->id_vessel);
				FuelDB::updateActualfuel($model->id_vessel, $fuel["fuel"], $fuel["log_date"]);

				if(strlen(trim(CUploadedFile::getInstance($model,'file_attachment'))) > 0)
				{
					$modelfile=CUploadedFile::getInstance($model,'file_attachment');
					$extension=$modelfile->extensionName;
					$update->file_attachment='file'.'_'.$timenow.'_'.$update->id_fuel_consumption_daily.'.'.$extension;


					 $repofile='repository/fuelrob/';
					 $path=Yii::app()->basePath . '/../'.$repofile.'file_attachment'.'_'.$timenow.'_'.$update->id_fuel_consumption_daily.'.'.$extension;
					 $modelfile->saveAs($path); 
					//$update->manual1=md5($_POST['Product']).'.'.$extension;
				}

				$update->save(false);
			
				Yii::app()->user->setFlash('success', " Data Saved");				
				$this->redirect(array('admin','id_vessel'=>$model->id_vessel));
			}
		}
		if(Yii::app()->request->getIsAjaxRequest())
		{
			$cs = Yii::app()->clientScript;
	        $cs->reset();
	        $cs->scriptMap = array(
	            'jquery.js' => false, // prevent produce jquery.js in additional javascript data
	            'jquery.min.js' => false,
	        );

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
		$repomanual='repository/fuelrob/';
		$timenow=date("YmdHis");
		//INi diacak saja datanya biar tidak mudah ditebak datanya
		$timenow=substr(md5($timenow), 11);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FuelConsumptionDaily']))
		{
			$model->attributes=$_POST['FuelConsumptionDaily'];
			$model->pic=$_POST['FuelConsumptionDaily']['pic'];
			$model->month = Timeanddate::getMonthOnly($model->log_date);
			$model->year = Timeanddate::getYearOnly($model->log_date);
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

			if(strlen(trim(CUploadedFile::getInstance($model,'file_attachment'))) > 0)
			{
				$modeldatalama=FuelConsumptionDaily::model()->findByPk($id);
				$manualname=$modeldatalama->file_attachment;
				//$file = $repo.$fotoname;  
				if($manualname!=''){
					unlink(Yii::app()->basePath . '/../repository/fuelrob/'. $manualname);
				//	UploadFile::actiondeleteOldFile($repomanual, $manualname);
					//unlink($file);
				}
				//unlink(Yii::app()->basePath . '/../repository/manual/'.$model->manual1);  

				$modelsmanual1=CUploadedFile::getInstance($model,'file_attachment');
				$extension=$modelsmanual1->extensionName;
				$model->file_attachment='file'.'_'.$timenow.'_'.$modeldatalama->id_fuel_consumption_daily.'.'.$extension;
 
				//$update->manual1=md5($_POST['Product']).'.'.$extension;
			}


			if($model->save())
			{

				if(strlen(trim(CUploadedFile::getInstance($model,'file_attachment'))) > 0)
				{ 
					$repomanual='repository/fuelrob/';
					$path=Yii::app()->basePath . '/../'.$repomanual.'file'.'_'.$timenow.'_'.$model->id_fuel_consumption_daily.'.'.$extension;
					$modelsmanual1->saveAs($path);
				}

				Yii::app()->user->setFlash('success', " Data Updated");
				$this->redirect(array('admin','FuelConsumptionDaily[id_vessel]'=>$model->id_vessel));
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

	public function actionUpdateattch($id)
	{
		$model=$this->loadModel($id);
		$timenow=date("YmdHis");
		//INi diacak saja datanya biar tidak mudah ditebak datanya
		$timenow=substr(md5($timenow), 11);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FuelConsumptionDaily'])){
			$model->attributes=$_POST['FuelConsumptionDaily'];
			$model->file_attachment='file';

			if(strlen(trim(CUploadedFile::getInstance($model,'file_attachment'))) > 0)
			{
				$modeldatalama=FuelConsumptionDaily::model()->findByPk($id);
				$manualname=$modeldatalama->file_attachment;
				//$file = $repo.$fotoname;  
				if($manualname!=''){
					unlink(Yii::app()->basePath . '/../repository/fuelrob/'. $manualname);
				//	UploadFile::actiondeleteOldFile($repomanual, $manualname);
					//unlink($file);
				}
				//unlink(Yii::app()->basePath . '/../repository/manual/'.$model->manual1);  

				$modelsmanual1=CUploadedFile::getInstance($model,'file_attachment');
				$extension=$modelsmanual1->extensionName;
				$model->file_attachment='file'.'_'.$timenow.'_'.$modeldatalama->id_fuel_consumption_daily.'.'.$extension;
 
				//$update->manual1=md5($_POST['Product']).'.'.$extension;
			}


			if($model->save())
			{
				
				if(strlen(trim(CUploadedFile::getInstance($model,'file_attachment'))) > 0)
				{ 
					$repomanual='repository/fuelrob/';
					$path=Yii::app()->basePath . '/../'.$repomanual.'file'.'_'.$timenow.'_'.$model->id_fuel_consumption_daily.'.'.$extension;
					$modelsmanual1->saveAs($path);
				}
				
				Yii::app()->user->setFlash('success', " Data Attachment Updated");
				//$this->redirect(array('admin'));
				$this->redirect(array('admin','id_vessel'=>$model->id_vessel));
			}
		}

		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('updateattch',array('model'=>$model),true,true);//This will bring out the view along with its script.
		}
		else 
		$this->render('updateattch',array(
		'model'=>$model,
		));
	}

	public function actionDownload($id){
		$model=FuelConsumptionDaily::model()->findByPk($id); 
		$file = Yii::app()->basePath . '/../repository/fuelrob/'.$model->file_attachment;    
		$pos=strrpos($file,'.');  
   		$extensions = substr($file,$pos+1);

		if( file_exists($file) ){
			Yii::app()->getRequest()->sendFile( $model->file_attachment.".".$extensions , file_get_contents($file) );
		}
		else{
			throw new CHttpException(404,'The requested page does not exist.');
		}   
	} 
	
	public function actionVesselFuel()
	{
		$model=new Vessel('searchActiveVessel');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Vessel']))
			$model->attributes=$_GET['Vessel'];	
			
		$model->VesselType = "TUG";

		$this->render('../fuelConsumptionDaily/listofvessel',array(
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
		$dataProvider=new CActiveDataProvider('FuelConsumptionDaily');
		$this->render('index',array(
		'dataProvider'=>$dataProvider,
		));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin($id_vessel=0)
	{
		if(isset($_GET['yt0'])){
			$getval = $_GET["FuelConsumptionDaily"];
			if(isset($getval)){
				$id_vessel=isset($getval['id_vessel']) ? $getval['id_vessel'] : 0 ;
				$this->redirect(array('admin','id_vessel'=>$id_vessel));
			}
		}
		
		$model=new FuelConsumptionDaily('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FuelConsumptionDaily']))
			$model->attributes=$_GET['FuelConsumptionDaily'];

		$model->id_vessel = $id_vessel;
		
		$this->render('admin',array(
			'model'=>$model,
			'id_vessel'=>$id_vessel,
		));
	}

	/**
	* Returns the data model based on the primary key given in the GET variable.
	* If the data model is not found, an HTTP exception will be raised.
	* @param integer the ID of the model to be loaded
	*/
	public function loadModel($id)
	{
		$model=FuelConsumptionDaily::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='fuel-consumption-daily-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
