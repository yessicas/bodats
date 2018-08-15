<?php

class CustvendController extends Controller
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
			'actions'=>array('cust', 'custformarketing', 'custupdate', 'custcreate','Custcreateformarketing',
				'custview','vend','vendupdate','vendcreate','vendcreate2','vendview','klas','klascreate','klasview','klasupdate'
				),
				'roles'=>array('ADM','OPR','MKT'),
			),
			array('deny',  // deny all users
			//'roles'=>array('CUS','FIC','CRW','NAU'),
				'users'=>array('*'),
			),
		);
	}

	public function actionCust()
	{
		$model=new Customer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Customer']))
		$model->attributes=$_GET['Customer'];	
		$this->render('../customer/admin',array(
		'model'=>$model,
		));
	}

	public function actionCustformarketing()
	{
		$model=new Customer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Customer']))
		$model->attributes=$_GET['Customer'];	
		$this->render('../customerForMarketing/admin',array(
		'model'=>$model,
		));
	}

	public function actionCustupdate($id)
	{
		$model=$this->loadModel($id,'Customer');
		$repo='repository/customer/';
		$timenow=date("YmdHis");

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Customer']))
		{
			$model->attributes=$_POST['Customer'];
			//$model->Address = $_POST['Customer']['Address'];
			if(strlen(trim(CUploadedFile::getInstance($model,'foto_customer'))) > 0){	// jika ada perubahan gambar , maka gambar lama di hapus ganti dengan gambar baru
				$modeldatalama=Customer::model()->findByPk($id);
				$fotoname=$modeldatalama->foto_customer;
				//$file = $repo.$fotoname;	
				if($fotoname!=''){
					UploadFile::actiondeleteOldFile($repo, $fotoname);
					//unlink($file);
				}

				$models=CUploadedFile::getInstance($model,'foto_customer');
				$extension=$models->extensionName;

				$model->foto_customer='customer'.'_'.$timenow.'_'.$modeldatalama->id_customer.'.'.$extension;	
			}

			if($model->save())
			{
				if(strlen(trim(CUploadedFile::getInstance($model,'foto_customer'))) > 0){	
					$path=Yii::app()->basePath . '/../'.$repo.'customer'.'_'.$timenow.'_'.$model->id_customer.'.'.$extension;
					$models->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

					$newfilenamewithoutex='customer'.'_'.$timenow.'_'.$model->id_customer;	 
					$strekstension = strtolower($extension);   
					UploadImage::compressFileVerySmall($repo, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
					UploadImage::compressFileWidth600($repo, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
					UploadImage::compressFileForced($repo, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
				}

				Yii::app()->user->setFlash('success', " Data Updated");
				$this->redirect(array('custview','id'=>$model->id_customer));
			}
		}
		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
		}

		else 
		$this->render('../customer/update',array(
		'model'=>$model,
		));
	}

	public function actionCustcreate()
	{
		$model=new Customer;
		$timenow=date("YmdHis");

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Customer']))
		{
			$model->attributes=$_POST['Customer'];
			//$model->Address = $_POST['Customer']['Address'];
			$model->foto_customer='customerfoto';
			if($model->save()){		
				$update=Customer::model()->findByPk($model->id_customer);
				if(strlen(trim(CUploadedFile::getInstance($model,'foto_customer'))) > 0){		
					$models=CUploadedFile::getInstance($model,'foto_customer');
					$extension=$models->extensionName;

					$update->foto_customer='customer'.'_'.$timenow.'_'.$update->id_customer.'.'.$extension;	// update Photoname di database	

					$repo='repository/customer/';
					$path=Yii::app()->basePath . '/../'.$repo.'customer'.'_'.$timenow.'_'.$update->id_customer.'.'.$extension;
					$models->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

					$newfilenamewithoutex='customer'.'_'.$timenow.'_'.$update->id_customer;	 
					$strekstension = strtolower($extension);   
					UploadImage::compressFileVerySmall($repo, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
					UploadImage::compressFileWidth600($repo, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
					UploadImage::compressFileForced($repo, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
						
				}

				$update->save(false);

				Yii::app()->user->setFlash('success', " Data Saved");
				$this->redirect(array('custview','id'=>$model->id_customer));
			}
		}
		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
		}

		else 
		$this->render('../customer/create',array(
		'model'=>$model,
		));
	}

	
	public function actionCustcreateformarketing()
	{
		$model=new Customer;
		$timenow=date("YmdHis");

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Customer']))
		{
			$model->attributes=$_POST['Customer'];
			//$model->Address = $_POST['Customer']['Address'];
			$model->foto_customer='customerfoto';
			if($model->save()){		
				$update=Customer::model()->findByPk($model->id_customer);
				if(strlen(trim(CUploadedFile::getInstance($model,'foto_customer'))) > 0){		
					$models=CUploadedFile::getInstance($model,'foto_customer');
					$extension=$models->extensionName;

					$update->foto_customer='customer'.'_'.$timenow.'_'.$update->id_customer.'.'.$extension;	// update Photoname di database	

					$repo='repository/customer/';
					$path=Yii::app()->basePath . '/../'.$repo.'customer'.'_'.$timenow.'_'.$update->id_customer.'.'.$extension;
					$models->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

					$newfilenamewithoutex='customer'.'_'.$timenow.'_'.$update->id_customer;	 
					$strekstension = strtolower($extension);   
					UploadImage::compressFileVerySmall($repo, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
					UploadImage::compressFileWidth600($repo, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
					UploadImage::compressFileForced($repo, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
						
				}

				$update->save(false);

				Yii::app()->user->setFlash('success', " Data Saved");
				$this->redirect(array('custview','id'=>$model->id_customer));
			}
		}
		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
		}

		else 
		$this->render('../customerForMarketing/create',array(
		'model'=>$model,
		));
	}

	public function actionCustview($id)
	{
		$modelzz=new CustomerBankAcc('search');
		$modelzz->unsetAttributes();  // clear any default values
		if(isset($_GET['CustomerBankAcc']))
		$modelzz->attributes=$_GET['CustomerBankAcc'];

			$this->render('../customer/view',array(
			'model'=>$this->loadModel($id,'Customer'),
			'modelzz'=>$modelzz,
		));
	}


	public function actionVend()
	{
		$this->layout = "twoplets";
		
		$model=new Vendor('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Vendor']))
			$model->attributes=$_GET['Vendor'];	
			
		$this->render('../vendor/admin',array(
		'model'=>$model,
		));
	}

	public function actionVendupdate($id)
	{
		$model=$this->loadModel($id,'Vendor');
		$repo='repository/vendor/';
		$timenow=date("YmdHis");

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Vendor']))
		{
			$model->attributes=$_POST['Vendor'];
			if(strlen(trim(CUploadedFile::getInstance($model,'foto_vendor'))) > 0){	// jika ada perubahan gambar , maka gambar lama di hapus ganti dengan gambar baru
				$modeldatalama=Vendor::model()->findByPk($id);
				$fotoname=$modeldatalama->foto_vendor;
				//$file = $repo.$fotoname;	
				if($fotoname!=''){
					UploadFile::actiondeleteOldFile($repo, $fotoname);
					//unlink($file);
				}
				
				$models=CUploadedFile::getInstance($model,'foto_vendor');
				$extension=$models->extensionName;

				$model->foto_vendor='vendor'.'_'.$timenow.'_'.$modeldatalama->id_vendor.'.'.$extension;	
			}

			if($model->save())
			{
				if(strlen(trim(CUploadedFile::getInstance($model,'foto_vendor'))) > 0){	
					$path=Yii::app()->basePath . '/../'.$repo.'vendor'.'_'.$timenow.'_'.$model->id_vendor.'.'.$extension;
					$models->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

					$newfilenamewithoutex='vendor'.'_'.$timenow.'_'.$model->id_vendor;	 
					$strekstension = strtolower($extension);   
					UploadImage::compressFileVerySmall($repo, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
					UploadImage::compressFileWidth600($repo, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
					UploadImage::compressFileForced($repo, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
				}

				Yii::app()->user->setFlash('success', " Data Updated");
				$this->redirect(array('vendview','id'=>$model->id_vendor));
			}
		}
		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
		}

		else 
		$this->render('../vendor/update',array(
		'model'=>$model,
		));
	}

	public function actionVendcreate()
	{
		$model=new Vendor;
		$timenow=date("YmdHis");

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Vendor']))
		{
			$model->attributes=$_POST['Vendor'];

			$model->foto_vendor='vendorfoto';
			if($model->save()){
				if (isset($_POST['type1']))
				{
					$modeltype1=new VendorClassification;
					$modeltype1->type ='AGENCY';
					$modeltype1->id_vendor=$model->id_vendor;

					$modeltype1->save(false);
				}

				if (isset($_POST['type2']))
				{
					$modeltype2=new VendorClassification;
					$modeltype2->type ='PRODUCT';
					$modeltype2->id_vendor=$model->id_vendor;

					$modeltype2->save(false);
				}


				$update=Vendor::model()->findByPk($model->id_vendor);
				if(strlen(trim(CUploadedFile::getInstance($model,'foto_vendor'))) > 0){		
					$models=CUploadedFile::getInstance($model,'foto_vendor');
					$extension=$models->extensionName;

					 $update->foto_vendor='vendor'.'_'.$timenow.'_'.$update->id_vendor.'.'.$extension;	// update Photoname di database	

					 $repo='repository/vendor/';
					 $path=Yii::app()->basePath . '/../'.$repo.'vendor'.'_'.$timenow.'_'.$update->id_vendor.'.'.$extension;
					 $models->saveAs($path); // menyimapn gambar berdasarkan path di atas	  

					 $newfilenamewithoutex='vendor'.'_'.$timenow.'_'.$update->id_vendor;	 
					 $strekstension = strtolower($extension);   
					 UploadImage::compressFileVerySmall($repo, $newfilenamewithoutex, $strekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
					 UploadImage::compressFileWidth600($repo, $newfilenamewithoutex, $strekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
					 UploadImage::compressFileForced($repo, $newfilenamewithoutex, $strekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);  
						
				}


				$update->save(false);

				Yii::app()->user->setFlash('success', " Data Saved");
				$this->redirect(array('vendview','id'=>$model->id_vendor));
			}
		}
		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
		}

		else 
		$this->render('../vendor/create',array(
		'model'=>$model,
		));
	}


	public function actionVendcreate2()
	{
		$modelklas=new VendorClassification;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['VendorClassification']))
		{
			$modelklas->attributes=$_POST['VendorClassification'];

			if (isset($_POST['type1']))
			{
				$modeltype1=new VendorClassification;
				$modeltype1->type ='AGENCY';
				$modeltype1->id_vendor=$_POST['VendorClassification']['id_vendor'];

				$modeltype1->save(false);
			}

			if (isset($_POST['type2']))
			{
				$modeltype2=new VendorClassification;
				$modeltype2->type ='PRODUCT';
				$modeltype2->id_vendor=$_POST['VendorClassification']['id_vendor'];

				$modeltype2->save(false);
			}

			Yii::app()->user->setFlash('success', " Data Saved");
			$this->redirect(array('vendview','id'=>$_POST['VendorClassification']['id_vendor']));
		}



		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('../vendor/create_klas',array('model'=>$modelklas),true,true);//This will bring out the view along with its script.
		}

		else 
		$this->render('../vendor/create_klas',array(

		'model'=>$modelklas,
		));
	}


	public function actionVendview($id)
	{
		$modelvv=new VendorBankAcc('search');
		$modelvv->unsetAttributes();  // clear any default values
		if(isset($_GET['VendorBankAcc']))
			$modelvv->attributes=$_GET['VendorBankAcc'];

		$modelcc=new VendorClassification('search');
		$modelcc->unsetAttributes();  // clear any default values
		if(isset($_GET['VendorClassification']))
			$modelcc->attributes=$_GET['VendorClassification'];


		$this->render('../vendor/view',array(
		'model'=>$this->loadModel($id,'Vendor'),
		'modelvv'=>$modelvv,
		'modelcc'=>$modelcc,
		));
	}


	public function actionKlas()
	{
		$model=new VendorClassification('search');
		$model->unsetAttributes();  // clear any default values
		
		//Default Awal
		$model->type="AGENCY";
		
		if(isset($_GET['VendorClassification']))
			$model->attributes=$_GET['VendorClassification'];
			
		
			
		$this->render('../vendorclassification/admin',array(
			'model'=>$model,
		));
	}

	public function actionKlasUpdate($id)
		{
			
			$model=$this->loadModel($id,'VendorClassification');

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

			if(isset($_POST['VendorClassification']))
			{
			$model->attributes=$_POST['VendorClassification'];
			if($model->save())
			{
			Yii::app()->user->setFlash('success', " Data Updated");
			$this->redirect(array('klas','id'=>$model->id_vendor_classification));
			}
			}
			if(Yii::app()->request->getIsAjaxRequest())
			{
			          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
			          }

			else 
			$this->render('../vendorclassification/update',array(
			'model'=>$model,
			));
		}

	public function actionKlascreate()
		{
			
			$model=new VendorClassification;

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

				if(isset($_POST['VendorClassification']))
				{
				$model->attributes=$_POST['VendorClassification'];
				if($model->save()){
				Yii::app()->user->setFlash('success', " Data Saved");
				$this->redirect(array('klas','id'=>$model->id_vendor_classification));
				}
				}
				if(Yii::app()->request->getIsAjaxRequest())
				{
				          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
				          }

				else 
				$this->render('../vendorclassification/create',array(
				'model'=>$model,
				));
		}

	public function actionKlasview($id)
	{
		if(Yii::app()->request->getIsAjaxRequest())
				 {
		          echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
		          }

		else 
		$this->render('../vendorclassification/view',array(
		'model'=>$this->loadModel($id,'VendorClassification'),
		));
	}


	public function loadModel($id,$modelname)
	{
		$model=$modelname::model()->findByPk($id);
		if($model===null)
		throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

}
