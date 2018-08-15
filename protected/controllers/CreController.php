<?php

class CreController extends Controller
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
			/*
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(''),
				'roles'=>array('ADM','NAU','FIC','CRW'),
			),
			array('deny',  // deny all users
				'roles'=>array('CUS','MKT'),
				'users'=>array('*'),
			),
			*/
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(''),
				'roles'=>array('ADM'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('crew','crewupdate','crewcreate', 'crewview','signon','signoff','signoffsignon',
					'readines', 'sign','autocrew','listofvessel',
				),
				'roles'=>array('NAU', 'ADM', 'CRW'),
			),
			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('crewview',
				),
				'roles'=>array('NAU', 'VPC', 'ADM', 'CRW'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionCrew()
	{
		$model=new Crew('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Crew']))
		$model->attributes=$_GET['Crew'];	
		$this->render('../crew/admin',array(
		'model'=>$model,
		));
	}

	public function actionCrewupdate($id)
	{		
		$model=$this->loadModel($id,'Crew');
		$repo='repository/crew/';
		$reposerti='repository/fotosertifikat/';
		$repoijazah='repository/fotoijazah/';
		$timenow=date("YmdHis");

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Crew']))
		{
		$model->attributes=$_POST['Crew'];

					if(strlen(trim(CUploadedFile::getInstance($model,'Photo'))) > 0){	// jika ada perubahan gambar , maka gambar lama di hapus ganti dengan gambar baru

					$modeldatalama=Crew::model()->findByPk($id);
					$fotoname=$modeldatalama->Photo;
					//$file = $repo.$fotoname;	
					if($fotoname!=''){
						UploadFile::actiondeleteOldFile($repo, $fotoname);
						//unlink($file);
					}
					
					$models=CUploadedFile::getInstance($model,'Photo');
					$extension=$models->extensionName;

					$model->Photo='crew'.'_'.$timenow.'_'.$modeldatalama->CrewId.'.'.$extension;	
				}

					if(strlen(trim(CUploadedFile::getInstance($model,'FotoSertifikat'))) > 0){	// jika ada perubahan gambar , maka gambar lama di hapus ganti dengan gambar baru

					$modeldatalama=Crew::model()->findByPk($id);
					$fotoname=$modeldatalama->FotoSertifikat;
					//$file = $repo.$fotoname;	
					if($fotoname!=''){
						UploadFile::actiondeleteOldFile($reposerti, $fotoname);
						//unlink($file);
					}
					
					$modelssertifikat=CUploadedFile::getInstance($model,'FotoSertifikat');
					$extension=$modelssertifikat->extensionName;

					$model->FotoSertifikat='fotosertifikat'.'_'.$timenow.'_'.$modeldatalama->CrewId.'.'.$extension;	
				}

					if(strlen(trim(CUploadedFile::getInstance($model,'FotoIjazah'))) > 0){	// jika ada perubahan gambar , maka gambar lama di hapus ganti dengan gambar baru

					$modeldatalama=Crew::model()->findByPk($id);
					$fotoname=$modeldatalama->FotoIjazah;
					//$file = $repo.$fotoname;	
					if($fotoname!=''){
						UploadFile::actiondeleteOldFile($repoijazah, $fotoname);
						//unlink($file);
					}
					
					$modelsijazah=CUploadedFile::getInstance($model,'FotoIjazah');
					$extension=$modelsijazah->extensionName;

					$model->FotoIjazah='fotoijazah'.'_'.$timenow.'_'.$modeldatalama->CrewId.'.'.$extension;	
				}

		if($model->save())
		{

					 if(strlen(trim(CUploadedFile::getInstance($model,'Photo'))) > 0){	
					 $path=Yii::app()->basePath . '/../'.$repo.'crew'.'_'.$timenow.'_'.$model->CrewId.'.'.$extension;
					 $models->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

					 $newfilenamewithoutex='crew'.'_'.$timenow.'_'.$model->CrewId;	 
					 $strekstension = strtolower($extension);   
					 UploadImage::compressFileVerySmall($repo, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
					 UploadImage::compressFileWidth600($repo, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
					 UploadImage::compressFileForced($repo, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
					 }

					 if(strlen(trim(CUploadedFile::getInstance($model,'FotoSertifikat'))) > 0){	
					 $path=Yii::app()->basePath . '/../'.$reposerti.'fotosertifikat'.'_'.$timenow.'_'.$model->CrewId.'.'.$extension;
					 $modelssertifikat->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

					 $newfilenamewithoutex='fotosertifikat'.'_'.$timenow.'_'.$model->CrewId;	 
					 $strekstension = strtolower($extension);   
					 UploadImage::compressFileVerySmall($reposerti, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
					 UploadImage::compressFileWidth600($reposerti, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
					 UploadImage::compressFileForced($reposerti, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
					 }

					 if(strlen(trim(CUploadedFile::getInstance($model,'FotoIjazah'))) > 0){	
					 $path=Yii::app()->basePath . '/../'.$repoijazah.'fotoijazah'.'_'.$timenow.'_'.$model->CrewId.'.'.$extension;
					 $modelsijazah->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

					 $newfilenamewithoutex='fotoijazah'.'_'.$timenow.'_'.$model->CrewId;	 
					 $strekstension = strtolower($extension);   
					 UploadImage::compressFileVerySmall($repoijazah, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
					 UploadImage::compressFileWidth600($repoijazah, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
					 UploadImage::compressFileForced($repoijazah, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
					 }

		Yii::app()->user->setFlash('success', " Data Updated");
		$this->redirect(array('crew','id'=>$model->CrewId));
		}
		}
		if(Yii::app()->request->getIsAjaxRequest())
		{
				  echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
				  }

		else 
		$this->render('../crew/update',array(
		'model'=>$model,
		));
	}

	public function actionCrewcreate()
	{
		$model=new Crew;
		$timenow=date("YmdHis");

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Crew']))
		{
		$model->attributes=$_POST['Crew'];

		$model->Photo='crewphoto';
		$model->FotoSertifikat='fotosertifikat';
		$model->FotoIjazah='fotoijazah';

		if($model->save()){

				$update=Crew::model()->findByPk($model->CrewId);
				if(strlen(trim(CUploadedFile::getInstance($model,'Photo'))) > 0){		
					$models=CUploadedFile::getInstance($model,'Photo');
					$extension=$models->extensionName;

					 $update->Photo='crew'.'_'.$timenow.'_'.$update->CrewId.'.'.$extension;	// update Photoname di database	

					 $repo='repository/crew/';
					 $path=Yii::app()->basePath . '/../'.$repo.'crew'.'_'.$timenow.'_'.$update->CrewId.'.'.$extension;
					 $models->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

					 $newfilenamewithoutex='crew'.'_'.$timenow.'_'.$update->CrewId;	 
					 $strekstension = strtolower($extension);   
					 UploadImage::compressFileVerySmall($repo, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
					 UploadImage::compressFileWidth600($repo, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
					 UploadImage::compressFileForced($repo, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
						
				}


				if(strlen(trim(CUploadedFile::getInstance($model,'FotoSertifikat'))) > 0){		
					$modelssertifikat=CUploadedFile::getInstance($model,'FotoSertifikat');
					$extension=$modelssertifikat->extensionName;

					 $update->FotoSertifikat='fotosertifikat'.'_'.$timenow.'_'.$update->CrewId.'.'.$extension;	// update Photoname di database	

					 $reposerti='repository/fotosertifikat/';
					 $path=Yii::app()->basePath . '/../'.$reposerti.'fotosertifikat'.'_'.$timenow.'_'.$update->CrewId.'.'.$extension;
					 $modelssertifikat->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

					 $newfilenamewithoutex='fotosertifikat'.'_'.$timenow.'_'.$update->CrewId;	 
					 $strekstension = strtolower($extension);   
					 UploadImage::compressFileVerySmall($reposerti, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
					 UploadImage::compressFileWidth600($reposerti, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
					 UploadImage::compressFileForced($reposerti, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
						
				}

				if(strlen(trim(CUploadedFile::getInstance($model,'FotoIjazah'))) > 0){		
					$modelsijazah=CUploadedFile::getInstance($model,'FotoIjazah');
					$extension=$modelsijazah->extensionName;

					 $update->FotoIjazah='fotoijazah'.'_'.$timenow.'_'.$update->CrewId.'.'.$extension;	// update Photoname di database	

					 $repoijazah='repository/fotoijazah/';
					 $path=Yii::app()->basePath . '/../'.$repoijazah.'fotoijazah'.'_'.$timenow.'_'.$update->CrewId.'.'.$extension;
					 $modelsijazah->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

					 $newfilenamewithoutex='fotoijazah'.'_'.$timenow.'_'.$update->CrewId;	 
					 $strekstension = strtolower($extension);   
					 UploadImage::compressFileVerySmall($repoijazah, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
					 UploadImage::compressFileWidth600($repoijazah, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
					 UploadImage::compressFileForced($repoijazah, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
						
				}


				$update->save(false);

				Yii::app()->user->setFlash('success', " Data Saved");
				$this->redirect(array('crew','id'=>$model->CrewId));
		}
		}
		if(Yii::app()->request->getIsAjaxRequest())
		{
				  echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
				  }

		else 
		$this->render('../crew/create',array(
		'model'=>$model,
		));
	}


	public function actionCrewview($id)
	{
		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
		}

		else 
		$this->render('../crew/view',array(
		'model'=>$this->loadModel($id,'Crew'),
		));
	}

	public function actionlistofvessel($mode)
	{
		 	$model=new Vessel('searchActiveVessel');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Vessel']))
			$model->attributes=$_GET['Vessel'];	

			if($mode=="sign"){
				$model->VesselType='TUG';
				$this->render('../crewAssignment/listofvessel',array(
				'model'=>$model,
				));
			}else{
				$this->render('../crewAssignment/listofvessel',array(
				'model'=>$model,
				));
			}
	}


	public function actionSign($id_tug=0)
	{
		$this->layout = "twoplets";

		if(isset($_GET['yt0'])){
			$id_tug=isset($_GET['Tug']) ? $_GET['Tug'] : 0 ;
			$this->redirect(array('sign','id_tug'=>$id_tug));
		}
		
		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('asign',true,true);//This will bring out the view along with its script.
		}
		else {
			$this->render('/crewAssignment/asign',array(
				'id_tug'=>$id_tug,
			));
		}
	}

	public function actionReadines($id_tug=0)
	{
		$this->layout = "twoplets";
	
		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('asign',true,true);//This will bring out the view along with its script.
		}
		else {
			$this->render('/crewAssignment/readines',array(
				'id_tug'=>$id_tug,
			));
		}
	}
	
	public function actionSignoffsignon($id_tug, $id_crew_position, $crewid)
	{
		//$model = CrewDB::getCrewAssignment($id_tug, $id_crew_position);
		$model = CrewDB::getCrewAssignment2($id_tug, $crewid);
		//Update tanggal Log Out
		if(isset($_POST['OldExpiredDate']))
		{
			$id_crew_signon = $model->id_crew_signon;
			$modelsignon = CrewSignon::model()->findByAttributes(array('id_crew_signon'=>$id_crew_signon ));
			$modelsignon->expired_date = $_POST['OldExpiredDate'];
			$modelsignon->save();
			
			//LOG SIGN OFF
			$modelsignoff = CrewDB::signOn($id_tug, $model->CrewId, $id_crew_position, $model->expired_date, '0000-00-00', "SIGN OFF");
		}
		
		if($model == null){
			$model=new CrewAssignment;
		}
		
		if(isset($_POST['CrewAssignment']))
		{
			$model->attributes=$_POST['CrewAssignment'];
			$model = LogUserUpdated::setUserCreated($model);
			$model->vessel_id = $id_tug;
			$model->id_crew_position = $id_crew_position;
			$model->status_active = 1;
			if($model->save()){
				//LOG SIGN ON
				$modelsignon = CrewDB::signOn($id_tug, $model->CrewId, $id_crew_position, $model->start_date, $model->expired_date, "SIGN ON");
				$model->id_crew_signon = $modelsignon->id_crew_signon;
				$model->save();
				
				$this->redirect(array('sign','id_tug'=>$id_tug));
			}
		}
		
		/*
		if(Yii::app()->request->getIsAjaxRequest())
		{
			$this->renderPartial('../crewAssignment/signonoff',array(
				'id_tug'=>$id_tug, 
				'id_crew_position'=>$id_crew_position,
				'model'=>$model,
			)
			);
		}
		*/
		
		if(Yii::app()->request->getIsAjaxRequest())
		{
		 echo $this->renderPartial('../crewAssignment/signonoff',array('id_tug'=>$id_tug, 'id_crew_position'=>$id_crew_position,'crewid'=>$crewid,'model'=>$model),true,true);
		}
		
		else
			$this->render('../crewAssignment/signonoff',array(
				'id_tug'=>$id_tug, 
				'id_crew_position'=>$id_crew_position,
				'crewid'=>$crewid,
				'model'=>$model,
			)
			);
	
	}

	public function actionSignoff($id_tug, $id_crew_position, $crewid)
	{
		//$model = CrewDB::getCrewAssignment($id_tug, $id_crew_position);
		$model = CrewDB::getCrewAssignment2($id_tug, $crewid);
		//Update tanggal Log Out
		if(isset($_POST['OldExpiredDate']))
		{
			$id_crew_signon = $model->id_crew_signon;
			$modelsignon = CrewSignon::model()->findByAttributes(array('id_crew_signon'=>$id_crew_signon ));
			if($modelsignon != null){
				$modelsignon->expired_date = $_POST['OldExpiredDate'];
				$modelsignon->save();
			}
			
			//LOG SIGN OFF
			$modelsignoff = CrewDB::signOn($id_tug, $model->CrewId, $id_crew_position, $model->expired_date, '0000-00-00', "SIGN OFF");
			if($model != null){
				$model->delete();
				$this->redirect(array('sign','id_tug'=>$id_tug));
			}
		}
		
		if($model == null){
			$model=new CrewAssignment;
		}
		/*
		if(isset($_POST['CrewAssignment']))
		{
			$model->attributes=$_POST['CrewAssignment'];
			$model = LogUserUpdated::setUserCreated($model);
			$model->vessel_id = $id_tug;
			$model->id_crew_position = $id_crew_position;
			$model->status_active = 1;
			if($model->save()){
				//LOG SIGN ON
				$modelsignon = CrewDB::signOn($id_tug, $model->CrewId, $id_crew_position, $model->start_date, $model->expired_date, "SIGN ON");
				$model->id_crew_signon = $modelsignon->id_crew_signon;
				$model->save();
				
				$this->redirect(array('sign','id_tug'=>$id_tug));
			}
		}
		*/
		
		if(Yii::app()->request->getIsAjaxRequest())
		{
		 echo $this->renderPartial('../crewAssignment/signoff',array('id_tug'=>$id_tug, 'id_crew_position'=>$id_crew_position, 'crewid'=>$crewid,'model'=>$model),true,true);
		}
		
		else
			$this->render('../crewAssignment/signoff',array(
				'id_tug'=>$id_tug, 
				'id_crew_position'=>$id_crew_position,
				'crewid'=>$crewid,
				'model'=>$model,
			)
			);
	
	}
	
	/*
	public function actionSignoff($id_tug, $id_crew_position, $crewid)
	{
		//$model = CrewDB::getCrewAssignment($id_tug, $id_crew_position);
		$model = CrewDB::getCrewAssignment2($id_tug, $crewid);
		//Update tanggal Log Out
		if(isset($_POST['OldExpiredDate']))
		{
			$id_crew_signon = $model->id_crew_signon;
			$modelsignon = CrewSignon::model()->findByAttributes(array('id_crew_signon'=>$id_crew_signon ));
			$modelsignon->expired_date = $_POST['OldExpiredDate'];
			$modelsignon->save();
			
			//LOG SIGN OFF
			$modelsignoff = CrewDB::signOn($id_tug, $model->CrewId, $id_crew_position, $model->expired_date, '0000-00-00', "SIGN OFF");
		}
		
		if($model == null){
			$model=new CrewAssignment;
		}
		
		if(isset($_POST['CrewAssignment']))
		{
			$model->attributes=$_POST['CrewAssignment'];
			$model = LogUserUpdated::setUserCreated($model);
			$model->vessel_id = $id_tug;
			$model->id_crew_position = $id_crew_position;
			$model->status_active = 1;
			if($model->save()){
				//LOG SIGN ON
				$modelsignon = CrewDB::signOn($id_tug, $model->CrewId, $id_crew_position, $model->start_date, $model->expired_date, "SIGN ON");
				$model->id_crew_signon = $modelsignon->id_crew_signon;
				$model->save();
				
				$this->redirect(array('sign','id_tug'=>$id_tug));
			}
		}
		
		if(Yii::app()->request->getIsAjaxRequest())
		{
		 echo $this->renderPartial('../crewAssignment/signoff',array('id_tug'=>$id_tug, 'id_crew_position'=>$id_crew_position, 'crewid'=>$crewid,'model'=>$model),true,true);
		}
		
		else
			$this->render('../crewAssignment/signoff',array(
				'id_tug'=>$id_tug, 
				'id_crew_position'=>$id_crew_position,
				'crewid'=>$crewid,
				'model'=>$model,
			)
			);
	
	}
	*/

	public function actionSignon($id_tug, $id_crew_position)
	{
		//$model=new CrewAssignment;
		$model = CrewDB::getCrewAssignment($id_tug, $id_crew_position);
		$status_exist = true;
		if($model == null){
			$model=new CrewAssignment;
			$status_exist = false;
		}
		/*
		if(isset($_POST['yt0']))
		{
			$start_date = $_POST['StartDate'];
			$expired_date = $_POST['EndDate'];
			$CrewId = $_POST['CrewId'];
			
			$result = CrewDB::updateCrewAssignment($id_tug, $CrewId, $id_crew_position, $start_date, $expired_date);
			if($result != null)
				$this->redirect(array('sign','id_tug'=>$id_tug));
		}
		*/
		if(isset($_POST['CrewAssignment']))
		{
			$model->attributes=$_POST['CrewAssignment'];
			$model = LogUserUpdated::setUserCreated($model);
			$model->vessel_id = $id_tug;
			$model->id_crew_position = $id_crew_position;
			$model->status_active = 1;
			if($model->save()){
				//Mencatatkan crew sign on
				if($status_exist == false){
					$modelsignon = CrewDB::signOn($id_tug, $model->CrewId, $id_crew_position, $model->start_date, $model->expired_date, "SIGN ON");
					$model->id_crew_signon = $modelsignon->id_crew_signon;
					$model->save();
				}else{
					$modelsignon = CrewDB::updateSignOn($model->id_crew_signon, $model->vessel_id, $model->CrewId, $model->id_crew_position, 
						$model->start_date, $model->expired_date);
				}

			
				//$this->redirect(array('view','id'=>$model->id_crew_assignment));
				$this->redirect(array('sign','id_tug'=>$id_tug));
			}
		}
	
		

		if(Yii::app()->request->getIsAjaxRequest())
		{
		 echo $this->renderPartial('../crewAssignment/create',array('id_tug'=>$id_tug, 'id_crew_position'=>$id_crew_position,'model'=>$model),true,true);
		}
		
		else
			$this->render('../crewAssignment/create',array(
				'id_tug'=>$id_tug, 
				'id_crew_position'=>$id_crew_position,
				'model'=>$model,
			)
			);
		
	}


	public function actionAutocrew()  
		  {  

		  		/*
			   $res =array();  
			   $row=array();  
			   if (isset($_GET['search'])) {  
					$sql ="SELECT * FROM  crew WHERE CrewName LIKE :CrewName ";  
					$command =Yii::app()->db->createCommand($sql);  
					$command->bindValue(":CrewName", ''.'%'.$_GET['search'].'%', PDO::PARAM_STR);  
					$res =$command->queryAll();  
					foreach($res as $value):  
						 $row[]=array(  
								   
							 
							  'id'=>$value['CrewId'],  // return value from autocomplete 
							  'nama'=>$value['CrewName'], 
							  'posisi'=>$value['id_crew_position'],// value for input field  
						 );   
					endforeach;  
			   }  
			   echo CJSON::encode($row);  
			   Yii::app()->end();  
			   */

			    /*

			   	$return=array();
			    $term = $_GET['search']; 
			       // Buat objek user baru (Instantiasi) dan lakukan pencarian nama berdasar keyword yang dimasukkan
			       $crews = Crew::model()->findAll(array(
			           'condition' => 'CrewName LIKE :CrewName',
			           'params' => array(
			               ':CrewName' => "%$term%",
			           ),
			       ));

			       foreach ($crews as $crew){
			           $return[] = array(
			               'id' =>$crew->CrewId,
			               'nama' =>$crew->CrewName,
			               'posisi' =>($crew->CrewPosition)? $crew->CrewPosition->crew_position : '-', 
			               'certificationStatus' =>' belum ', 
			               'ready' =>($crew->CurrentStatus=='ON')? 'Not Ready' : 'Ready', 
			               
			               
			           );
			       }
			       echo CJSON::encode($return);

			       */


			   $return=array();
			    $term = $_GET['term']; 
			       // Buat objek user baru (Instantiasi) dan lakukan pencarian nama berdasar keyword yang dimasukkan
			       $crews = Crew::model()->findAll(array(
			           'condition' => 'CrewName LIKE :CrewName',
			           'limit'=>4,
			           'params' => array(
			               ':CrewName' => "%$term%",
			           ),
			       ));

			        $no=0;
			       foreach ($crews as $crew){
			       	$no++;
			           $return[] = array(
			           	   'no'=>$no,
			               'id' =>$crew->CrewId,
			               'nama' =>$crew->CrewName,
			               'value' =>$crew->CrewName,
			               'posisi' =>($crew->crewpos)? $crew->crewpos->crew_position : '-', 
			               'certificationStatus' =>($crew->sertifikat)? $crew->sertifikat->certiface_level :'-',
			               'validcertificate' =>($crew->LastCertificateValidDate=='0000-00-00') ? ' ' : ' ( '.$crew->LastCertificateValidDate.' )',
			               'ready' =>($crew->CurrentStatus=='ON')? 'Not Ready' : 'Ready', 
			               
			               
			           );
			       }
			       echo CJSON::encode($return);



		  }


	public function loadModel($id,$modelname)
	{
		$model=$modelname::model()->findByPk($id);
		if($model===null)
		throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

}
