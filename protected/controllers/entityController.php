<?php

class entityController extends Controller
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
			'actions'=>array('entivess','entivessupdate','entivesscreate','entimother','entimotherupdate','entimothercreate',
				'entimotherview','entijet','entijetcreate','entijetupdate','entijetview','entinode','entinodeupdate','entinodecreate',
				'entinodeview','entiroute','entirouteupdate','entiroutecreate','entirouteview','entistorage','entistorupdate','entistorcreate','entistorview',
				),
			'roles'=>array('ADM','OPR','MKT', 'VPC', 'TEC'),
			),
			array('deny',  // deny all users
			//'roles'=>array('CUS','FIC','CRW','NAU'),
			'users'=>array('*'),
			),
		);
	}

	public function actionentivess()
		{
			$model=new Vessel('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Vessel']))
			$model->attributes=$_GET['Vessel'];	
			$this->render('../vessel/admin',array(
			'model'=>$model,
			));
		}

	public function actionentivessupdate($id)
	{
		if($id==-1){
			throw new CHttpException(404,'Vessel not found. Maybe it was deleted!');
		}
		
		$model=$this->loadModel($id,'Vessel');
		$repo='repository/vessel/';
		$timenow=date("YmdHis");

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['Vessel']))
	{
	$model->attributes=$_POST['Vessel'];

				if(strlen(trim(CUploadedFile::getInstance($model,'foto_vessel'))) > 0){	// jika ada perubahan gambar , maka gambar lama di hapus ganti dengan gambar baru

				$modeldatalama=Vessel::model()->findByPk($id);
				$fotoname=$modeldatalama->foto_vessel;
				//$file = $repo.$fotoname;	
				if($fotoname!=''){
					UploadFile::actiondeleteOldFile($repo, $fotoname);
					//unlink($file);
				}
				
				$models=CUploadedFile::getInstance($model,'foto_vessel');
				$extension=$models->extensionName;

				$model->foto_vessel='vessel'.'_'.$timenow.'_'.$modeldatalama->id_vessel.'.'.$extension;	
			}

	if($model->save())
	{

				 if(strlen(trim(CUploadedFile::getInstance($model,'foto_vessel'))) > 0){	
				 $path=Yii::app()->basePath . '/../'.$repo.'vessel'.'_'.$timenow.'_'.$model->id_vessel.'.'.$extension;
				 $models->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

				 $newfilenamewithoutex='vessel'.'_'.$timenow.'_'.$model->id_vessel;	 
				 $strekstension = strtolower($extension);   
				 UploadImage::compressFileVerySmall($repo, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
				 UploadImage::compressFileWidth600($repo, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
				 UploadImage::compressFileForced($repo, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
				 }

	Yii::app()->user->setFlash('success', " Data Updated");
	$this->redirect(array('vessel/view','id'=>$model->id_vessel));
	}
	}
	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../vessel/update',array(
	'model'=>$model,
	));
		}

	public function actionentivesscreate()
	{
		$model=new Vessel;
		$timenow=date("YmdHis");

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['Vessel']))
	{
	$model->attributes=$_POST['Vessel'];

	$model->foto_vessel='vesfoto';
	if($model->save()){

			$update=Vessel::model()->findByPk($model->id_vessel);
			if(strlen(trim(CUploadedFile::getInstance($model,'foto_vessel'))) > 0){		
				$models=CUploadedFile::getInstance($model,'foto_vessel');
				$extension=$models->extensionName;

				 $update->foto_vessel='vessel'.'_'.$timenow.'_'.$update->id_vessel.'.'.$extension;	// update Photoname di database	

				 $repo='repository/vessel/';
				 $path=Yii::app()->basePath . '/../'.$repo.'vessel'.'_'.$timenow.'_'.$update->id_vessel.'.'.$extension;
				 $models->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

				 $newfilenamewithoutex='vessel'.'_'.$timenow.'_'.$update->id_vessel;	 
				 $strekstension = strtolower($extension);   
				 UploadImage::compressFileVerySmall($repo, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
				 UploadImage::compressFileWidth600($repo, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
				 UploadImage::compressFileForced($repo, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
					
			}


			$update->save(false);

			Yii::app()->user->setFlash('success', " Data Saved");
			$this->redirect(array('vessel/view','id'=>$model->id_vessel));
	}
	}
	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../vessel/create',array(
	'model'=>$model,
	));
		}


	public function actionentimother()
		{
			$model=new Mothervessel('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Mothervessel']))
			$model->attributes=$_GET['Mothervessel'];	
			$this->render('../mothervessel/admin',array(
			'model'=>$model,
			));
		}

	public function actionentimotherupdate($id)
		{
			
			$model=$this->loadModel($id,'Mothervessel');

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['Mothervessel']))
	{
	$model->attributes=$_POST['Mothervessel'];
	if($model->save())
	{
	Yii::app()->user->setFlash('success', " Data Updated");
	$this->redirect(array('entimother','id'=>$model->id_mothervessel));
	}
	}
	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../mothervessel/update',array(
	'model'=>$model,
	));
		}

	public function actionentimothercreate()
		{
			
			$model=new Mothervessel;

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['Mothervessel']))
	{
	$model->attributes=$_POST['Mothervessel'];
	if($model->save()){
	Yii::app()->user->setFlash('success', " Data Saved");
	$this->redirect(array('entimother','id'=>$model->id_mothervessel));
	}
	}
	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../mothervessel/create',array(
	'model'=>$model,
	));
		}

	public function actionentimotherview($id)
	{
	if(Yii::app()->request->getIsAjaxRequest())
			 {
			  echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../mothervessel/view',array(
	'model'=>$this->loadModel($id,'Mothervessel'),
	));
	}



	public function actionentijet()
		{
			$model=new Jetty('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Jetty']))
			$model->attributes=$_GET['Jetty'];	
			$this->render('../jetty/admin',array(
			'model'=>$model,
			));
		}

	public function actionentijetupdate($id)
		{
			
			$model=$this->loadModel($id,'Jetty');

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['Jetty']))
	{
	$model->attributes=$_POST['Jetty'];
	if($model->save())
	{
	Yii::app()->user->setFlash('success', " Data Updated");
	$this->redirect(array('entijet','id'=>$model->JettyId));
	}
	}
	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../jetty/update',array(
	'model'=>$model,
	));
		}

	public function actionentijetcreate()
		{
			
			$model=new Jetty;

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['Jetty']))
	{
	$model->attributes=$_POST['Jetty'];
	if($model->save()){
	Yii::app()->user->setFlash('success', " Data Saved");
	$this->redirect(array('entijet','id'=>$model->JettyId));
	}
	}
	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../jetty/create',array(
	'model'=>$model,
	));
		}


	public function actionentijetview($id)
	{
	if(Yii::app()->request->getIsAjaxRequest())
			 {
			  echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../jetty/view',array(
	'model'=>$this->loadModel($id,'Jetty'),
	));
	}


	public function actionentinode()
		{
			$model=new Node('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Node']))
			$model->attributes=$_GET['Node'];	
			$this->render('../node/admin',array(
			'model'=>$model,
			));
		}

	public function actionentinodeupdate($id)
		{
			
			$model=$this->loadModel($id,'Node');

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['Node']))
	{
	$model->attributes=$_POST['Node'];
	if($model->save())
	{
	Yii::app()->user->setFlash('success', " Data Updated");
	$this->redirect(array('entinode','id'=>$model->id_node));
	}
	}
	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../node/update',array(
	'model'=>$model,
	));
		}

	public function actionentinodecreate()
		{
			
			$model=new Node;

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['Node']))
	{
	$model->attributes=$_POST['Node'];
	if($model->save()){
	Yii::app()->user->setFlash('success', " Data Saved");
	$this->redirect(array('entinode','id'=>$model->id_node));
	}
	}
	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../node/create',array(
	'model'=>$model,
	));
		}

	public function actionentinodeview($id)
	{
	if(Yii::app()->request->getIsAjaxRequest())
			 {
			  echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../node/view',array(
	'model'=>$this->loadModel($id,'Node'),
	));
	}



	public function actionentiroute()
		{
			$model=new Route('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Route']))
			$model->attributes=$_GET['Route'];	
			$this->render('../route/admin',array(
			'model'=>$model,
			));
		}

	public function actionentirouteupdate($id)
		{
			
			$model=$this->loadModel($id,'Route');

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['Route']))
	{
	$model->attributes=$_POST['Route'];
	if($model->save())
	{
	Yii::app()->user->setFlash('success', " Data Updated");
	$this->redirect(array('entiroute','id'=>$model->RouteId));
	}
	}
	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../route/update',array(
	'model'=>$model,
	));
		}

	public function actionentiroutecreate()
		{
			
			$model=new Route;

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['Route']))
	{
	$model->attributes=$_POST['Route'];
	if($model->save()){
	Yii::app()->user->setFlash('success', " Data Saved");
	$this->redirect(array('entiroute','id'=>$model->RouteId));
	}
	}
	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../route/create',array(
	'model'=>$model,
	));
		}

	public function actionentirouteview($id)
	{
	if(Yii::app()->request->getIsAjaxRequest())
			 {
			  echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../route/view',array(
	'model'=>$this->loadModel($id,'Route'),
	));
	}


	public function actionentistorage()
		{
			$model=new StorageLocation('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['StorageLocation']))
			$model->attributes=$_GET['StorageLocation'];	
			$this->render('../storagelocation/admin',array(
			'model'=>$model,
			));
		}

	public function actionentistorupdate($id)
		{
			
			$model=$this->loadModel($id,'StorageLocation');

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['StorageLocation']))
	{
	$model->attributes=$_POST['StorageLocation'];
	if($model->save())
	{
	Yii::app()->user->setFlash('success', " Data Updated");
	$this->redirect(array('entistorage','id'=>$model->StorageLocationId));
	}
	}
	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../storagelocation/update',array(
	'model'=>$model,
	));
		}

	public function actionentistorcreate()
		{
			
			$model=new StorageLocation;

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['StorageLocation']))
	{
	$model->attributes=$_POST['StorageLocation'];
	if($model->save()){
	Yii::app()->user->setFlash('success', " Data Saved");
	$this->redirect(array('entistorage','id'=>$model->StorageLocationId));
	}
	}
	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../storagelocation/create',array(
	'model'=>$model,
	));
		}	

	public function actionentistorview($id)
	{
	if(Yii::app()->request->getIsAjaxRequest())
			 {
			  echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../storagelocation/view',array(
	'model'=>$this->loadModel($id,'StorageLocation'),
	));
	}			


	public function actioncharge()
		{
			$this->render('../ismsCharge/index');
		}


	public function loadModel($id,$modelname)
	{
	$model=$modelname::model()->findByPk($id);
	if($model===null)
	throw new CHttpException(404,'The requested page does not exist.');
	return $model;
	}


}


