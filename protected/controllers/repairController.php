<?php

class repairController extends Controller
{
	public $layout='//layouts/triplets';

	public $VS_NAME = "VS";
	public $SR_NAME = "SR";
	public $FC_NAME = "FC";
	public $VS_WIDTH = 80;
	public $SR_WIDTH = 600;
	public $FC_WIDTH = 570;
	public $FC_HEIGHT = 400;

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
			'actions'=>array('damage','damageupdate','damagecreate','damageview','finding','plan','viewplan','plancreate','updateplan',
				'deleteplan','adddate','listofvessel','workorder'),
			'roles'=>array('ADM','OPR','TEC'),
			),

			array('allow',  // allow all users to perform 'index' and 'view' actions
				  'actions'=>array('listofvessel','plan'),
				  'roles'=>array('TEC'),
			),

			array('deny',  // deny all users
			//'roles'=>array('CUS','FIC','CRW','NAU','MKT'),
			'users'=>array('*'),
			),
		);
	}

	public function actiondamage($id)
	{
		$model=new DamageReport('searchActiveVessel');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DamageReport']))
		$model->attributes=$_GET['DamageReport'];

		$model->id_vessel=$id;


		$this->render('../damagereport/admin',array(
		'model'=>$model,
		));
	}

	public function actionlistofvessel($mode)
	{
		$model=new Vessel('searchActiveVessel');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Vessel']))
		$model->attributes=$_GET['Vessel'];	

		if($mode=="DAMAGE"){
			$this->render('../damagereport/listofvessel',array(
			'model'=>$model,
			));
		}else{
			$this->render('../findingreport/listofvessel',array(
			'model'=>$model,
			));
		}
	}



	public function actiondamageupdate($id)
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

				  //update vessel date of damage 
				$Vessel =  Vessel::model()->findByPk($model->id_vessel);
				$Vessel->LastDateofDamage=$model->DamageTime;
				//$Vessel->NumberOfDamage=$Vessel->NumberOfDamage+1;
				$Vessel->save(false);

	Yii::app()->user->setFlash('success', " Data Updated");
	$this->redirect(array('damage','id'=>$model->id_vessel));
	}
	}
	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../damagereport/update',array(
	'model'=>$model,
	));
		}

	public function actiondamagecreate($id)
		{
			$model=new DamageReport;
	$timenow=date("YmdHis");

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['DamageReport']))
	{
	$model->attributes=$_POST['DamageReport'];

	$model->DamagePhoto='damagephoto';
	$model->Status='OPEN';

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

					// insert nomornya
					$updateModel=DamageReport::model()->findByPK($model->id_damage_report);
					$dataformatnumber=NumberingDocumentDBDamage::getFormatNumber($model,'id_damage_report','NoReport','NoMonth','NoYear',$model->id_damage_report);
					$updateModel->DamageReportNumber = $dataformatnumber['NumberFormat']; 
					$updateModel->NoReport = $dataformatnumber['NoOrder']; 
					$updateModel->NoMonth = NumberingDocumentDBDamage::getMonthNow(); 
					$updateModel->NoYear = NumberingDocumentDBDamage::getYearNow(); 
					$updateModel->save(false);


					//update vessel date of damage 
					$Vessel =  Vessel::model()->findByPk($model->id_vessel);
					$Vessel->LastDateofDamage=$model->DamageTime;
					$Vessel->NumberOfDamage=$Vessel->NumberOfDamage+1;
					$Vessel->save(false);


			//Yii::app()->user->setFlash('success', " Data Saved");
			//$this->redirect(array('damage','id'=>$model->id_damage_report));

			Yii::app()->user->setFlash('success', " Data Saved to Report Damage, and then you must input for Repair Schedule");
			$this->redirect(array('requestForSchedule/create','mode'=>'REPAIR','idv'=>$model->id_vessel,'idD'=>$model->id_damage_report));//redirect ke shceduke for repair
			}
			}
			if(Yii::app()->request->getIsAjaxRequest())
			{
					  echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
					  }

	else 
	$this->render('../damagereport/create',array(
	'model'=>$model,
	));
		}

	public function actiondamageview($id)
	{
	if(Yii::app()->request->getIsAjaxRequest())
			 {
			  echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../damagereport/view',array(
	'model'=>$this->loadModel($id,'DamageReport'),
	));
	}


	public function actionfinding($id)
		{
			$model=new FindingReport('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['FindingReport']))
			$model->attributes=$_GET['FindingReport'];	

			$model->id_vessel=$id;

			$this->render('../findingreport/admin',array(
			'model'=>$model,
			));
		}


	public function actionplan()
		{

			$this->layout='//layouts/twoplets';

			$status=(isset($_GET['status'])) ? $_GET['status'] : 'NONE';

			$model=new VesselMaintenancePlan('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['VesselMaintenancePlan']))
			$model->attributes=$_GET['VesselMaintenancePlan'];	

			$this->render('../vesselmaintenanceplan/admin',array(
			'model'=>$model,
			'status'=>$status,

			));
		}
		

	public function actionWorkorder()
	{
		$this->layout='//layouts/twoplets';
		/*
		$status='APPROVED';
		$model=new VesselMaintenancePlan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VesselMaintenancePlan']))
		$model->attributes=$_GET['VesselMaintenancePlan'];	

		*/
		$status='APPROVED';
		$model=new Schedule('search');
		$model->unsetAttributes();
		$model->id_vessel_status = 20;
        //$model->id_vessel_status;
		
		$this->render('../vesselmaintenanceplan/workorder',array(
			'model'=>$model,
			'status'=>$status,
		));
		
	}



	public function actionViewplan($id)
	{
		$this->layout='//layouts/twoplets';

		if(Yii::app()->request->getIsAjaxRequest())
		{
				  echo $this->renderPartial('../vesselmaintenanceplan/view',array('model'=>$this->loadModel($id,'VesselMaintenancePlan')),true,true);//This will bring out the view along with its script.
				  }

		else 

		$this->render('../vesselmaintenanceplan/view',array(
		'model'=>$this->loadModel($id,'VesselMaintenancePlan'),
		));
	}

	public function actionplanCreate()
	{

		$this->layout='//layouts/twoplets';
		$model=new VesselMaintenancePlan;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['VesselMaintenancePlan']))
		{
		$model->attributes=$_POST['VesselMaintenancePlan'];
		$model->created_user=Yii::app()->user->id;
		$model->created_date=date("Y-m-d H:i:s");
		$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

		$model->status='NONE';

		if($model->save()){

				if($model->is_repeat=='YES'){

					if($model->type_interval=='Days'){
						$repeatINT=$model->interval_repeat;
					}else{
						$repeatINT= round(($model->interval_repeat / 24),0);
					}

					$datePlus_start_date =  $this->adddate($model->start_date,"+ ".$repeatINT." day");
					$datePlus_end_date =  $this->adddate($model->end_date,"+ ".$repeatINT." day");

					while($datePlus_start_date <= $model->until_date) {

						$modelRepeat= new VesselMaintenancePlan;
						$modelRepeat->created_user=$model->created_user;
						$modelRepeat->created_date=$model->created_date;
						$modelRepeat->ip_user_updated=$model->ip_user_updated;
						$modelRepeat->id_vessel=$model->id_vessel;
						$modelRepeat->MaintenanceName=$model->MaintenanceName;
						$modelRepeat->id_maintenance_type=$model->id_maintenance_type;
						$modelRepeat->start_date=$datePlus_start_date;
						$modelRepeat->end_date=$datePlus_end_date;
						$modelRepeat->Duration=$model->Duration;
						$modelRepeat->TypeSchedule=$model->TypeSchedule;
						$modelRepeat->TypeBreakdown=$model->TypeBreakdown;
						$modelRepeat->status='NONE';
						$modelRepeat->Description=$model->Description;
						$modelRepeat->save(false);

						$datePlus_start_date =  $this->adddate($datePlus_start_date,"+ ".$repeatINT." day");
						$datePlus_end_date =  $this->adddate($datePlus_end_date,"+ ".$repeatINT." day");


					} 
				}

			/*
		$date1=$model->end_date;
		$date2=$model->start_date;
			*/


		//$datetime1 = new DateTime($date1);
		//$datetime2 = new DateTime($date2);
		//$difference = $datetime1->diff($datetime2);
		//echo $difference->days;
		
	  

			/*
		for ($i = 0; $i < $model->Duration; $i++) { 
			//echo $i;
			$tanggal=$this->adddate($date2,"+".$i." day");
			$array=explode("-",$tanggal);
			$tahun=$array[0];
			$bulan=$array[1];
			$hari=$array[2];

			  $vesselschedule= new VesselSchedule;
			  $vesselschedule->id_vessel=$model->id_vessel;
			  $vesselschedule->date=$tanggal;
			  $vesselschedule->day=$hari;
			  $vesselschedule->month=$bulan;
			  $vesselschedule->year=$tahun;
			  $vesselschedule->id_vessel_status=50;
			  $vesselschedule->id_shipping_order_detail=$model->id_vessel_maintenance_plan;
			  $vesselschedule->description=$model->Description;
			  $vesselschedule->created_date=$model->created_date;
			  $vesselschedule->created_user=$model->created_user;
			  $vesselschedule->ip_user_updated=$model->ip_user_updated;
			  $vesselschedule->save(false);
		}
			*/

		Yii::app()->user->setFlash('success', " Data Saved");
			if($model->is_repeat=='YES'){
				$this->redirect(array('repair/plan'));
			}else{
				$this->redirect(array('Viewplan','id'=>$model->id_vessel_maintenance_plan));
			}
			
		}
		}
		if(Yii::app()->request->getIsAjaxRequest())
		{
				  echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
				  }

		else 
		$this->render('../vesselmaintenanceplan/create',array(
		'model'=>$model,
		));
			}


	public function actionUpdateplan($id)
	{

		$this->layout='//layouts/twoplets';
	$model=$this->loadModel($id,'VesselMaintenancePlan');
	$id_vessel_awal=$model->id_vessel;
	$id_vessel_maintenance_plan=$model->id_vessel_maintenance_plan;

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['VesselMaintenancePlan']))
	{
	$model->attributes=$_POST['VesselMaintenancePlan'];
	$model->created_user=Yii::app()->user->id;
	$model->created_date=date("Y-m-d H:i:s");
	$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
	if($model->validate())
		{	
			/*
				VesselSchedule::model()->deleteAll(array(
			   'condition' => 'id_vessel = :id_vessel AND id_shipping_order_detail=:id_vessel_maintenance_plan AND id_vessel_status=50',
			   'params' => array(
				   ':id_vessel' => $id_vessel_awal,
				   ':id_vessel_maintenance_plan' => $id_vessel_maintenance_plan,
			   ),
		   ));

		   */

	$model->save();
			
			/*
		$date1=$model->end_date;
		$date2=$model->start_date;
		for ($i = 0; $i < $model->Duration; $i++) { 
			//echo $i;
			$tanggal=$this->adddate($date2,"+".$i." day");
			$array=explode("-",$tanggal);
			$tahun=$array[0];
			$bulan=$array[1];
			$hari=$array[2];

			  $vesselschedule= new VesselSchedule;
			  $vesselschedule->id_vessel=$model->id_vessel;
			  $vesselschedule->date=$tanggal;
			  $vesselschedule->day=$hari;
			  $vesselschedule->month=$bulan;
			  $vesselschedule->year=$tahun;
			  $vesselschedule->id_vessel_status=50;
			  $vesselschedule->id_shipping_order_detail=$model->id_vessel_maintenance_plan;
			  $vesselschedule->description=$model->Description;
			  $vesselschedule->created_date=$model->created_date;
			  $vesselschedule->created_user=$model->created_user;
			  $vesselschedule->ip_user_updated=$model->ip_user_updated;
			  $vesselschedule->save(false);
		}
			*/



		Yii::app()->user->setFlash('success', " Data Changed.");
		$this->redirect(array('Viewplan','id'=>$model->id_vessel_maintenance_plan));
		}
	}

	$this->render('../vesselmaintenanceplan/update',array(
	'model'=>$model,
	));
	}


	public function actionDeleteplan($id)
	{
	$model=$this->loadModel($id,'VesselMaintenancePlan');
		/*
		VesselSchedule::model()->deleteAll(array(
			   'condition' => 'id_vessel = :id_vessel AND id_shipping_order_detail=:id_vessel_maintenance_plan AND id_vessel_status=50',
			   'params' => array(
				   ':id_vessel' => $model->id_vessel,
				   ':id_vessel_maintenance_plan' => $model->id_vessel_maintenance_plan,
			   ),
		   ));

		*/

	if(Yii::app()->request->isPostRequest)
	{
	// we only allow deletion via POST request
	$this->loadModel($id,'VesselMaintenancePlan')->delete();

	// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
	if(!isset($_GET['ajax']))
	Yii::app()->user->setFlash('success', " Data With Primary Key  '$model->id_vessel_maintenance_plan' has deleted.");
	$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('plan'));
	}
	else
	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}




	public function loadModel($id,$modelname)
	{
	$model=$modelname::model()->findByPk($id);
	if($model===null)
	throw new CHttpException(404,'The requested page does not exist.');
	return $model;
	}


	public function adddate($vardate,$added)
	{
	$data = explode("-", $vardate);
	$date = new DateTime();
	$date->setDate($data[0], $data[1], $data[2]);
	$date->modify("".$added."");
	$day= $date->format("Y-m-d");
	return $day;
	}


}
