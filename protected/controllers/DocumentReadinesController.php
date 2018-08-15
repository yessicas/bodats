
<?php

class DocumentReadinesController extends Controller
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('readines','renew','update','add', 'displaydoc','listofvessel', 'warningpreventif', 'warningexpired'),
				'roles'=>array('NAU', 'ADM'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionWarningpreventif()
	{	
				
		$pagination = array('pageSize'=>40);
		$dataProvider=new CActiveDataProvider('VesselDocumentInfo', array(
			'criteria'=>array(
				'condition'=>"ValidUntil >= '".date('Y-m-d', strtotime('0 days'))."' AND ValidUntil <= '".date('Y-m-d', strtotime('+30 days'))."'",
			),
			'pagination'=>$pagination,
			'sort'=>array(
				'defaultOrder'=>'ValidUntil ASC, id_vessel ASC',
			),
		));
				
		$count = $dataProvider->totalItemCount;
		//echo $count; exit();
		$title = 'Warning for Document Expired Soon';
		$desc = 'The following list are collections of documents that will expire in the coming period up to 30 days ahead';
		$css = "info";
				
		$this->render('warning',array(
			'model'=>$dataProvider,
			'title'=>$title,
			'desc'=>$desc,
			'css'=>$css,
		));
	}
	
	public function actionWarningexpired()
	{	
				
		$pagination = array('pageSize'=>40);
		$dataProvider=new CActiveDataProvider('VesselDocumentInfo', array(
			'criteria'=>array(
				'condition'=>"ValidUntil <= '".date('Y-m-d', strtotime('0 days'))."' AND ValidUntil >= '".date('Y-m-d', strtotime('-4 years'))."'",
			),
			'pagination'=>$pagination,
			'sort'=>array(
				'defaultOrder'=>'ValidUntil ASC, id_vessel ASC',
			),
		));
				
		$count = $dataProvider->totalItemCount;
		//echo $count; exit();
		$title = 'Warning for Document Expired';
		$desc = 'The following list are collections of documents that have expired as of per today';
		$css = "error";
				
		$this->render('warning',array(
			'model'=>$dataProvider,
			'title'=>$title,
			'desc'=>$desc,
			'css'=>$css,
		));
	}

	public function actionlistofvessel()
	{
		 	$model=new Vessel('searchActiveVessel');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Vessel']))
			$model->attributes=$_GET['Vessel'];	

				$this->render('listofvessel',array(
				'model'=>$model,
				));
	}

	public function actionDisplaydoc($id_vessel=""){
		if(isset($_GET['yt0'])){
			$id_vessel=isset($_GET['Vessel']) ? $_GET['Vessel'] : 0 ;
			$this->redirect(array('displaydoc','id_vessel'=>$id_vessel));
		}
	
		if($id_vessel > 0){
			$this->render('read',array(
				'id_vessel'=>$id_vessel
			));
		}
	}

	public function actionReadines()
	{
		if(isset($_GET['yt0'])){
			$id_vessel=isset($_GET['Vessel']) ? $_GET['Vessel'] : 0 ;
			$this->redirect(array('displaydoc','id_vessel'=>$id_vessel));
		}
	
		$this->render('read',array(
			//'arrayDataProvider'=>$arrayDataProvider,
		));		
	}
	
	public function actionRenew($id_vessel, $id_vessel_document)
	{	
		$model = new VesselDocumentInfo();
		$datetime_now=date("YmdHis");
		
		if(isset($_POST['VesselDocumentInfo']))
		{
			$model = VesselDocumentInfo::model()->findByAttributes(array('id_vessel'=>$id_vessel, 'id_vessel_document'=>$id_vessel_document));
			
			//Sebelum data terbaru disimpan maka historynya terlebih dahulu dicatat.
			$statusClone = VesselDocumentInfoDB::cloneDataIntoHistory($model); 
			
			if($statusClone){
				//Diisikan dengan data terbaru
				$model->attributes=$_POST['VesselDocumentInfo'];

				if($_POST['VesselDocumentInfo']['IsPermanen']=='1'){
				$model->ValidUntil='0000-00-00';
				}

				$model = DataLogger::setUserUpdated($model);

				if($model->save()){

					//----

					if($model->Attachment==null){
					$model->Attachment='tempName';
					}

					if(strlen(trim(CUploadedFile::getInstance($model,'Attachment'))) > 0){
						if(file_exists(Yii::app()->basePath . '/../repository/readinessdoc/'.$model->Attachment)) {
							unlink(Yii::app()->basePath . '/../repository/readinessdoc/'.$model->Attachment); 
						} 

						$filename=md5($model->id_vessel.$model->id_vessel_document).$datetime_now;
						$models=CUploadedFile::getInstance($model,'Attachment');
						$extension=$models->extensionName;

						$updatemodel=VesselDocumentInfo::model()->findByAttributes(array('id_vessel'=>$id_vessel, 'id_vessel_document'=>$id_vessel_document));
						$updatemodel->Attachment=$filename.'.'.$extension;
						$updatemodel->save();

						$path=Yii::app()->basePath . '/../repository/readinessdoc/'.$filename.'.'.$extension;
						$models->saveAs($path);
					}

					//------


					$this->redirect(array('displaydoc','id_vessel'=>$model->id_vessel));
				}
			}else{
				echo 'Clone data fail!'; exit();
			}
		}
		
		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('formdoc',
					array(
					'id_vessel'=>$id_vessel,
					'id_vessel_document'=>$id_vessel_document,
					'model'=>$model,
					'renew'=>'renew',
					),
			true,true
			);//This will bring out the view along with its script.
		}

		else 
		$this->render('formdoc',array(
			'id_vessel'=>$id_vessel,
			'id_vessel_document'=>$id_vessel_document,
			'model'=>$model,
			'renew'=>'renew',
		));
	}

	public function actionUpdate($id_vessel, $id_vessel_document)
	{	
		$model = VesselDocumentInfo::model()->findByAttributes(array('id_vessel'=>$id_vessel, 'id_vessel_document'=>$id_vessel_document));
		$datetime_now=date("YmdHis");
		

		if(isset($_POST['VesselDocumentInfo']))
		{

			$model->attributes=$_POST['VesselDocumentInfo'];

			if($_POST['VesselDocumentInfo']['IsPermanen']=='1'){
				$model->ValidUntil='0000-00-00';
			}

			$model = DataLogger::setUserUpdated($model);

			if($model->save()){

				//------

				if($model->Attachment==null){
					$model->Attachment='tempName';
				}

				if(strlen(trim(CUploadedFile::getInstance($model,'Attachment'))) > 0){
					if(file_exists(Yii::app()->basePath . '/../repository/readinessdoc/'.$model->Attachment)) {
						unlink(Yii::app()->basePath . '/../repository/readinessdoc/'.$model->Attachment); 
					} 

					$filename=md5($model->id_vessel.$model->id_vessel_document).$datetime_now;
					$models=CUploadedFile::getInstance($model,'Attachment');
					$extension=$models->extensionName;

					$updatemodel=VesselDocumentInfo::model()->findByAttributes(array('id_vessel'=>$id_vessel, 'id_vessel_document'=>$id_vessel_document));
					$updatemodel->Attachment=$filename.'.'.$extension;
					$updatemodel->save();

					$path=Yii::app()->basePath . '/../repository/readinessdoc/'.$filename.'.'.$extension;
					$models->saveAs($path);
				}

				//-----



				$this->redirect(array('displaydoc','id_vessel'=>$model->id_vessel));
			}
		}
		
		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('formdoc',
					array(
					'id_vessel'=>$id_vessel,
					'id_vessel_document'=>$id_vessel_document,
					'model'=>$model
					),
			true,true
			);//This will bring out the view along with its script.
		}

		else 
		$this->render('formdoc',array(
			'id_vessel'=>$id_vessel,
			'id_vessel_document'=>$id_vessel_document,
			'model'=>$model
		));
	}

	public function actionAdd($id_vessel, $id_vessel_document)
	{
		$model = new VesselDocumentInfo();
		$datetime_now=date("YmdHis");

		if(isset($_POST['VesselDocumentInfo']))
		{


			$model->attributes=$_POST['VesselDocumentInfo'];
			
			//if($_POST['VesselDocumentInfo']['IsPermanen']=='1'){
			if($model->IsPermanen == 1){
				$model->ValidUntil='0000-00-00';
			}

			$model = DataLogger::setUserUpdated($model);


			//----
			$model->Attachment='tempName';
				if(strlen(trim(CUploadedFile::getInstance($model,'Attachment'))) > 0){
					$models=CUploadedFile::getInstance($model,'Attachment');
					$extension=$models->extensionName;
					$model->Attachment=md5($model->id_vessel.$model->id_vessel_document).$datetime_now.'.'.$extension;
				}
			//----
			if($model->IsNotUsed == 1){
				$model->save(false);
				$this->redirect(array('displaydoc','id_vessel'=>$model->id_vessel));
			}else{
				if($model->save()){
					//---
					if(strlen(trim(CUploadedFile::getInstance($model,'Attachment'))) > 0){
						$filename=md5($model->id_vessel.$model->id_vessel_document).$datetime_now;
						$path=Yii::app()->basePath . '/../repository/readinessdoc/'.$filename.'.'.$extension;
						$models->saveAs($path);
					}
					//---

					$this->redirect(array('displaydoc','id_vessel'=>$model->id_vessel));
				}
			}
		}
		
		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('formdoc',
					array(
					'id_vessel'=>$id_vessel,
					'id_vessel_document'=>$id_vessel_document,
					'model'=>$model
					),
			true,true
			);//This will bring out the view along with its script.
		}

		else 
		$this->render('formdoc',array(
			'id_vessel'=>$id_vessel,
			'id_vessel_document'=>$id_vessel_document,
			'model'=>$model
		));
	}
}
