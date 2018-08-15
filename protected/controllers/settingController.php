<?php

class settingController extends Controller
{
	public $layout='//layouts/triplets';


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
			'actions'=>array(''),
			'roles'=>array('ADM','MKT'),
			),
			array('deny',  // deny all users
			'roles'=>array('CUS','FIC','CRW','NAU','OPR'),
			'users'=>array('*'),
			),
		);
	}



	public function actiongeneral()
	{
		$model=new SettingGeneral('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SettingGeneral']))
		$model->attributes=$_GET['SettingGeneral'];	
		$this->render('../settinggeneral/admin',array(
		'model'=>$model,
		));
	}

	public function actiongeneralupdate($id)
		{
			
	$model=$this->loadModel($id,'SettingGeneral');


	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['SettingGeneral']))
	{
	$model->attributes=$_POST['SettingGeneral'];
	if($model->save()){
	Yii::app()->user->setFlash('success', " Data Saved");
	$this->redirect(array('general','id'=>$model->id_setting_general));
	}
	}

	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../settinggeneral/update',array(
	'model'=>$model,
	));
		}

	public function actiongeneralcreate()
		{

			$model=new SettingGeneral;

			if(isset($_POST['SettingGeneral']))
			{
			$model->attributes=$_POST['SettingGeneral'];
			if($model->save()){


			Yii::app()->user->setFlash('success', " Data Saved");
			$this->redirect(array('general','id'=>$model->id_setting_general));
	}
	}
	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../settinggeneral/create',array(
	'model'=>$model,
	));
		}


	public function actiongeneralview($id)
	{
	if(Yii::app()->request->getIsAjaxRequest())
			 {
			  echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../settinggeneral/view',array(
	'model'=>$this->loadModel($id,'SettingGeneral'),
	));
	}


	public function actionquot()
		{
			$model=new SettingQuotationReport('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['SettingQuotationReport']))
			$model->attributes=$_GET['SettingQuotationReport'];	
			$this->render('../settingquotationreport/admin',array(
			'model'=>$model,
			));
		}

	public function actionquotupdate($id)
		{
			
	$model=$this->loadModel($id,'SettingQuotationReport');


	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['SettingQuotationReport']))
	{
	$model->attributes=$_POST['SettingQuotationReport'];
	if($model->save()){
	Yii::app()->user->setFlash('success', " Data Saved");
	$this->redirect(array('quot','id'=>$model->id_setting_quotation_report));
	}
	}

	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../settingquotationreport/update',array(
	'model'=>$model,
	));
		}

	public function actionquotcreate()
		{

			$model=new SettingQuotationReport;

			if(isset($_POST['SettingQuotationReport']))
			{
			$model->attributes=$_POST['SettingQuotationReport'];
			if($model->save()){


			Yii::app()->user->setFlash('success', " Data Saved");
			$this->redirect(array('quot','id'=>$model->id_setting_quotation_report));
	}
	}
	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../settingquotationreport/create',array(
	'model'=>$model,
	));
		}


	public function actionquotview($id)
	{
	if(Yii::app()->request->getIsAjaxRequest())
			 {
			  echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../settingquotationreport/view',array(
	'model'=>$this->loadModel($id,'SettingQuotationReport'),
	));
	}

	public function actionspal()
		{
			$model=new SettingSpalReport('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['SettingSpalReport']))
			$model->attributes=$_GET['SettingSpalReport'];	
			$this->render('../settingspalreport/admin',array(
			'model'=>$model,
			));
		}

	public function actionspalupdate($id)
		{
			
	$model=$this->loadModel($id,'SettingSpalReport');


	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['SettingSpalReport']))
	{
	$model->attributes=$_POST['SettingSpalReport'];
	if($model->save()){
	Yii::app()->user->setFlash('success', " Data Saved");
	$this->redirect(array('spal','id'=>$model->id_setting_spal_report));
	}
	}

	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../settingspalreport/update',array(
	'model'=>$model,
	));
		}

	public function actionspalcreate()
		{

			$model=new SettingSpalReport;

			if(isset($_POST['SettingSpalReport']))
			{
			$model->attributes=$_POST['SettingSpalReport'];
			if($model->save()){


			Yii::app()->user->setFlash('success', " Data Saved");
			$this->redirect(array('spal','id'=>$model->id_setting_spal_report));
	}
	}
	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../settingspalreport/create',array(
	'model'=>$model,
	));
		}


	public function actionspalview($id)
	{
	if(Yii::app()->request->getIsAjaxRequest())
			 {
			  echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../settingspalreport/view',array(
	'model'=>$this->loadModel($id,'SettingSpalReport'),
	));
	}


	public function actioninvo()
		{
			$model=new SettingInvoiceReport('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['SettingInvoiceReport']))
			$model->attributes=$_GET['SettingInvoiceReport'];	
			$this->render('../settinginvoicereport/admin',array(
			'model'=>$model,
			));
		}

	public function actioninvoupdate($id)
		{
			
	$model=$this->loadModel($id,'SettingInvoiceReport');


	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['SettingInvoiceReport']))
	{
	$model->attributes=$_POST['SettingInvoiceReport'];
	if($model->save()){
	Yii::app()->user->setFlash('success', " Data Saved");
	$this->redirect(array('invo','id'=>$model->id_setting_quotation_report));
	}
	}

	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../settinginvoicereport/update',array(
	'model'=>$model,
	));
		}

	public function actioninvocreate()
	{
		$model=new SettingInvoiceReport;

		if(isset($_POST['SettingInvoiceReport']))
		{
		$model->attributes=$_POST['SettingInvoiceReport'];
		if($model->save()){


		Yii::app()->user->setFlash('success', " Data Saved");
		$this->redirect(array('invo','id'=>$model->id_setting_quotation_report));
		}
		}
		if(Yii::app()->request->getIsAjaxRequest())
		{
		  echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
		  }

		else 
		$this->render('../settinginvoicereport/create',array(
		'model'=>$model,
		));
	}


	public function actionInvoview($id)
	{
		if(Yii::app()->request->getIsAjaxRequest())
				 {
				  echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
				  }

		else 
		$this->render('../settinginvoicereport/view',array(
		'model'=>$this->loadModel($id,'SettingInvoiceReport'),
		));
	}


	public function actionmastax()
	{
		$model=new SettingTaxReport('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SettingTaxReport']))
		$model->attributes=$_GET['SettingTaxReport'];	
		$this->render('../settingtaxreport/admin',array(
		'model'=>$model,
		));
	}

	public function actionmastaxcreate()
		{
			
			$model=new SettingTaxReport;

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['SettingTaxReport']))
	{
	$model->attributes=$_POST['SettingTaxReport'];

	if($model->save()){
	Yii::app()->user->setFlash('success', " Data Saved");
	$this->redirect(array('mastax','id'=>$model->id_setting_tax_report));
	}
	}
	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../settingtaxreport/create',array(
	'model'=>$model,
	));
		}	

	public function actionmastaxupdate($id)
		{
			
			$model=$this->loadModel($id,'SettingTaxReport');

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['SettingTaxReport']))
	{
	$model->attributes=$_POST['SettingTaxReport'];

	if($model->save())
	{
	Yii::app()->user->setFlash('success', " Data Updated");
	$this->redirect(array('mastax','id'=>$model->id_setting_tax_report));
	}
	}
	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../settingtaxreport/update',array(
	'model'=>$model,
	));
		}

	public function actionmastaxview($id)
	{
	if(Yii::app()->request->getIsAjaxRequest())
			 {
			  echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../settingtaxreport/view',array(
	'model'=>$this->loadModel($id,'SettingTaxReport'),
	));
	}


	public function actionvoyage()
		{
			$model=new SettingVoyageReport('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['SettingVoyageReport']))
			$model->attributes=$_GET['SettingVoyageReport'];	
			$this->render('../settingvoyagereport/admin',array(
			'model'=>$model,
			));
		}

	public function actionvoyagecreate()
		{
			
			$model=new SettingVoyageReport;

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['SettingVoyageReport']))
	{
	$model->attributes=$_POST['SettingVoyageReport'];

	if($model->save()){
	Yii::app()->user->setFlash('success', " Data Saved");
	$this->redirect(array('voyage','id'=>$model->id_setting_tax_report));
	}
	}
	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../settingvoyagereport/create',array(
	'model'=>$model,
	));
		}	

	public function actionvoyageupdate($id)
		{
			
			$model=$this->loadModel($id,'SettingVoyageReport');

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['SettingVoyageReport']))
	{
	$model->attributes=$_POST['SettingVoyageReport'];

	if($model->save())
	{
	Yii::app()->user->setFlash('success', " Data Updated");
	$this->redirect(array('voyage','id'=>$model->id_setting_tax_report));
	}
	}
	if(Yii::app()->request->getIsAjaxRequest())
	{
			  echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../settingvoyagereport/update',array(
	'model'=>$model,
	));
		}

	public function actionvoyageview($id)
	{
	if(Yii::app()->request->getIsAjaxRequest())
			 {
			  echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('../settingvoyagereport/view',array(
	'model'=>$this->loadModel($id,'SettingVoyageReport'),
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
