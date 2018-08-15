<?php

class zoneController extends Controller
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
	'roles'=>array('ADM','OPR','MKT'),
	),
	array('deny',  // deny all users
	'roles'=>array('CUS','FIC','CRW','NAU'),
	'users'=>array('*'),
	),
	);
	}

	public function actionvoice()
	{
		$model=new CustomerVoice('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CustomerVoice']))
		$model->attributes=$_GET['CustomerVoice'];	
		$this->render('../customervoice/admin',array(
		'model'=>$model,
		));
	}

	public function actionvoicecustomer()
	{
		$model=new CustomerVoice('search');
		//$model->unsetAttributes();  // clear any default values
		//if(isset($_GET['CustomerVoice']))
		//$model->attributes=$_GET['CustomerVoice'];	
		
		//Display Hanya Voice yang sesuai dengan userid
		//$model->userid = 'pptuah';
		
		$this->render('../customervoice/admincustomer',array(
			'model'=>$model,
		));
	}

	public function actionvoiceupdate($id)
	{
		
		$model=$this->loadModel($id,'CustomerVoice');


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CustomerVoice']))
		{
		$model->attributes=$_POST['CustomerVoice'];
		if($model->save()){
		Yii::app()->user->setFlash('success', " Data Saved");
		$this->redirect(array('voice','id'=>$model->id_customor_voice));
		}
		}

		if(Yii::app()->request->getIsAjaxRequest())
		{
				  echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
				  }

		else 
		$this->render('../customervoice/update',array(
		'model'=>$model,
		));
	}

	public function actionvoicecreate()
	{
		$model=new CustomerVoice;

		if(isset($_POST['CustomerVoice']))
		{
			$model->attributes=$_POST['CustomerVoice'];
			$userid=Yii::app()->user->id;
			$id_customer = CustomerUsersDB::getCompanyFromUser($userid)->id_customer;
			$model->id_customer = $id_customer;
			$model = LogUserUpdated::setUserCreated($model);
			if($model->save()){
				Yii::app()->user->setFlash('success', " Voice has been submitted. Thank you for your contribution and feedback!");
				//$this->redirect(array('voice','id'=>$model->id_customor_voice));
				$this->redirect(array('voicecustomer','id'=>$model->id_customor_voice));
			}
		}
		if(Yii::app()->request->getIsAjaxRequest()){
			echo $this->renderPartial('createcustomer',array('model'=>$model),true,true);//This will bring out the view along with its script.
		}

		else 
			$this->render('../customervoice/createcustomer',array(
			'model'=>$model,
		));
	}


	public function actionvoiceview($id)
	{
		if(Yii::app()->request->getIsAjaxRequest()){
			echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
		}

		else 
			$this->render('../customervoice/view',array(
			'model'=>$this->loadModel($id,'CustomerVoice'),
		));
	}

	public function actionvoiceviewcustomer($id)
	{
		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('viewcustomer',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
		}

		else 
		$this->render('../customervoice/viewcustomer',array(
		'model'=>$this->loadModel($id,'CustomerVoice'),
		));
	}


	public function actionmasuserof()
	{
		$model=new CustomerUsers('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CustomerUsers']))
		$model->attributes=$_GET['CustomerUsers'];	
		$this->render('../customerusers/admin',array(
		'model'=>$model,
		));
	}

public function actionmasuserofcreate()
	{
		
		$model=new CustomerUsers;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['CustomerUsers']))
{
$model->attributes=$_POST['CustomerUsers'];

if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('masuserof','id'=>$model->id_customer_user));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../customerusers/create',array(
'model'=>$model,
));
	}	

public function actionmasuserofupdate($id)
	{
		
		$model=$this->loadModel($id,'CustomerUsers');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['CustomerUsers']))
{
$model->attributes=$_POST['CustomerUsers'];

if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('masuserof','id'=>$model->id_customer_user));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../customerusers/update',array(
'model'=>$model,
));
	}

public function actionmasuserofview($id)
{
if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../customerusers/view',array(
'model'=>$this->loadModel($id,'CustomerUsers'),
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
