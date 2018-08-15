<?php

class masterController extends Controller
{
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
'actions'=>array(''),
'roles'=>array('ADM'),
),
array('deny',  // deny all users
'roles'=>array('CUS','MKT','OPR','FIC','CRW','NAU'),
'users'=>array('*'),
),
);
}

public function actions()
{
return array(
// captcha action renders the CAPTCHA image displayed on the contact page
'captcha'=>array(
'class'=>'CCaptchaAction',
'backColor'=>0xFFFFFF,
'foreColor'=>0xEB5454
),
// page action renders "static" pages stored under 'protected/views/site/pages'
// They can be accessed via: index.php?r=site/page&view=FileName
'page'=>array(
'class'=>'CViewAction',
),
);
}

public function actionmasusers()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
		$model->attributes=$_GET['Users'];	
		$this->render('../users/admin',array(
		'model'=>$model,
		));
	}

public function actionmasuserscreate()
	{

$model=new Users;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Users'])){
$model->attributes=$_POST['Users'];
		
		/*
			if($_POST['Users']['password']<>''){
				$model->password = $model->hashPassword($_POST['Users']['password']);
				$model->repeatpassword = $model->hashPassword($_POST['Users']['repeatpassword']);
			}
		*/
				$model->ip_addr_created=$_SERVER['REMOTE_ADDR'];
				$model->created_date=date("Y-m-d H:i:s");
		//		$model->last_login=date("Y-m-d H:i:s");
				$model->status_activated=0;
		//		$model->security_code= $model->hashPassword($model->password);

		if($model->save()){

		// disini bisa di taruh kode untuk kirim email, url aktivasi http://localhost/careerpath/users/activateduser/id/useridnya/sc/securitycodeusernya
					
		//$modellogin=new LoginForm;
				
		//$modellogin->username=$model->userid;
		//$modellogin->password=$_POST['Users']['password'];

		// create data di datadiri nya belum saat berhasil login
				
		//if($modellogin->login())
		//	{
				
					$pass=Users::model()->findByPk($model->userid);
				    $pass->code_id=SecurityGenerator::CodeIdGenerate($model->userid); //encryp code_id
				    $enkripted_password=SecurityGenerator::CodeIdGenerate($model->password); // mengenkripsi password
				    $pass->password=$enkripted_password;
				    $pass->security_code=SecurityGenerator::CodeIdGenerate($enkripted_password); // mengenkripsi password yang sudah di enkripsi
				    $pass->save(false);

				$modelauthassigment= new Authassignment;
				$modelauthassigment->itemname=$model->type;
				$modelauthassigment->userid=$model->userid;
				$modelauthassigment->bizrule='';
				$modelauthassigment->data='';
				$modelauthassigment->save();
				    
					Yii::app()->user->setFlash('success', "Data $model->userid Created");
					$this->redirect(array('masusers','id'=>$model->userid));
}
}

if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../users/create',array(
'model'=>$model,
));
	}

public function actionmasusersupdate($id)
	{
		$modelbefore=$this->loadModel($id,'Users');
		$model=$this->loadModel($id,'Users');
		$model->unsetAttributes(array('password'));

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Users']))
{
$model->attributes=$_POST['Users'];
$model->ip_addr_created=$_SERVER['REMOTE_ADDR'];
$model->created_date=date("Y-m-d H:i:s");

	if($model->password==''){
		$model->password='NoChanged12345';
		$model->repeatpassword='NoChanged12345';
	}

if($model->save())
{
					//$pass=Users::model()->findByPk($model->userid);
				    //$pass->code_id=SecurityGenerator::CodeIdGenerate($model->userid); //encryp code_id
				    //$enkripted_password=SecurityGenerator::CodeIdGenerate($model->password); // mengenkripsi password
				    //$pass->password=$enkripted_password;
				    //$pass->save(false);
					
					$updatedatauser=Users::model()->findByPk($model->userid);
								if($model->password!='NoChanged12345'){
									//$updatedatauser->code_id=SecurityGenerator::CodeIdGenerate($model->userid); //encryp code_id
									$enkripted_password=SecurityGenerator::CodeIdGenerate($model->password); // mengenkripsi password
									$updatedatauser->password=$enkripted_password;
								}else{
									$updatedatauser->password=$modelbefore->password;
								}
					$updatedatauser->save(false);

				    $modelauthassigment=Authassignment::model()->FindByAttributes(array('userid'=>$modelbefore->userid));
					$modelauthassigment->itemname=$model->type;
					$modelauthassigment->userid=$model->userid;
					//$modelauthassigment->bizrule='';
					//$modelauthassigment->data='';
					$modelauthassigment->save();
				    
				    
					Yii::app()->user->setFlash('success', "Data $model->userid Updated");
					$this->redirect(array('masusers','id'=>$model->userid));
}
}

if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../users/update',array(
'model'=>$model,
));
	}

public function actionmasusersview($id)
{
if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../users/view',array(
'model'=>$this->loadModel($id,'Users'),
));
}			



public function actionmaspay()
	{
		$model=new PaymentTop('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PaymentTop']))
		$model->attributes=$_GET['PaymentTop'];	
		$this->render('../paymenttop/admin',array(
		'model'=>$model,
		));
	}

public function actionmaspaycreate()
	{
		
		$model=new PaymentTop;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['PaymentTop']))
{
$model->attributes=$_POST['PaymentTop'];
$model->payment_top=$_POST['PaymentTop']['payment_top']."days";
if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('maspay','id'=>$model->id_payment_top));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../paymenttop/create',array(
'model'=>$model,
));
	}	

public function actionmaspayupdate($id)
	{
		
		$model=$this->loadModel($id,'PaymentTop');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['PaymentTop']))
{
$model->attributes=$_POST['PaymentTop'];
$model->payment_top=$_POST['PaymentTop']['payment_top']."days";
if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('maspay','id'=>$model->id_payment_top));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../paymenttop/update',array(
'model'=>$model,
));
	}



public function actionmaslev()
	{
		$model=new Authitem('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Authitem']))
		$model->attributes=$_GET['Authitem'];	
		$this->render('../authitem/admin',array(
		'model'=>$model,
		));
	}

public function actionmaslevcreate()
	{
		
		$model=new Authitem;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Authitem']))
{
$model->attributes=$_POST['Authitem'];
if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('maslev','id'=>$model->name));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../authitem/create',array(
'model'=>$model,
));
	}


public function actionmaslevupdate($id)
	{
		
		$model=$this->loadModel($id,'Authitem');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Authitem']))
{
$model->attributes=$_POST['Authitem'];
if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('maslev','id'=>$model->name));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../authitem/update',array(
'model'=>$model,
));
	}

public function actionmaslevview($id)
{
if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../Authitem/view',array(
'model'=>$this->loadModel($id,'Authitem'),
));
}			




public function actionmascurr()
	{
		$model=new Currency('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Currency']))
		$model->attributes=$_GET['Currency'];	
		$this->render('../currency/admin',array(
		'model'=>$model,
		));
	}

public function actionmascurrcreate()
	{
		
		$model=new Currency;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Currency']))
{
$model->attributes=$_POST['Currency'];
if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('mascurr','id'=>$model->id_currency));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../currency/create',array(
'model'=>$model,
));
	}


public function actionmascurrview($id)
{
if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../currency/view',array(
'model'=>$this->loadModel($id,'Currency'),
));
}		

public function actionmasdept()
	{
		$model=new MstDepartment('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MstDepartment']))
		$model->attributes=$_GET['MstDepartment'];	
		$this->render('../mstDepartment/admin',array(
		'model'=>$model,
		));
	}

public function actionmasdeptcreate()
	{
		
		$model=new MstDepartment;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['MstDepartment']))
{
$model->attributes=$_POST['MstDepartment'];
if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('masdept','id'=>$model->DepartmentId));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../mstDepartment/create',array(
'model'=>$model,
));
	}




public function actionmascer()
	{
		$model=new CertificateLevel('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CertificateLevel']))
		$model->attributes=$_GET['CertificateLevel'];	
		$this->render('../certificatelevel/admin',array(
		'model'=>$model,
		));
	}

public function actionmascercreate()
	{
		
		$model=new CertificateLevel;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['CertificateLevel']))
{
$model->attributes=$_POST['CertificateLevel'];
if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('mascer','id'=>$model->id_certificate));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../certificatelevel/create',array(
'model'=>$model,
));
	}	

public function actionmascerupdate($id)
	{
		
		$model=$this->loadModel($id,'CertificateLevel');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['CertificateLevel']))
{
$model->attributes=$_POST['CertificateLevel'];
if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('mascer','id'=>$model->id_certificate));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../certificatelevel/update',array(
'model'=>$model,
));
	}

public function actionmascerview($id)
{
if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../certificatelevel/view',array(
'model'=>$this->loadModel($id,'CertificateLevel'),
));
}			


public function actionmasves()
	{
		$model=new VesselStatus('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VesselStatus']))
		$model->attributes=$_GET['VesselStatus'];	
		$this->render('../vesselstatus/admin',array(
		'model'=>$model,
		));
	}

public function actionmasvescreate()
	{
		
		$model=new VesselStatus;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['VesselStatus']))
{
$model->attributes=$_POST['VesselStatus'];
if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('masves','id'=>$model->id_vessel_status));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../vesselstatus/create',array(
'model'=>$model,
));
	}	

public function actionmasvesupdate($id)
	{
		
		$model=$this->loadModel($id,'VesselStatus');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['VesselStatus']))
{
$model->attributes=$_POST['VesselStatus'];
if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('masves','id'=>$model->id_vessel_status));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../vesselstatus/update',array(
'model'=>$model,
));
	}	


public function actionmasdoc()
	{
		$model=new MstVesselDocument('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MstVesselDocument']))
		$model->attributes=$_GET['MstVesselDocument'];	
		$this->render('../mstvesseldocument/admin',array(
		'model'=>$model,
		));
	}

public function actionmasdoccreate()
	{
		
		$model=new MstVesselDocument;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['MstVesselDocument']))
{
$model->attributes=$_POST['MstVesselDocument'];
if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('masdoc','id'=>$model->id_vessel_document));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../mstvesseldocument/create',array(
'model'=>$model,
));
	}	

public function actionmasdocupdate($id)
	{
		
		$model=$this->loadModel($id,'MstVesselDocument');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['MstVesselDocument']))
{
$model->attributes=$_POST['MstVesselDocument'];
if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('masdoc','id'=>$model->id_vessel_document));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../mstvesseldocument/update',array(
'model'=>$model,
));
	}	


public function actionmaspo()
	{
		$model=new PoCategory('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PoCategory']))
		$model->attributes=$_GET['PoCategory'];	
		$this->render('../pocategory/admin',array(
		'model'=>$model,
		));
	}

public function actionmaspocreate()
	{
		
		$model=new PoCategory;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['PoCategory']))
{
$model->attributes=$_POST['PoCategory'];
if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('maspo','id'=>$model->id_po_category));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../pocategory/create',array(
'model'=>$model,
));
	}	

public function actionmaspoupdate($id)
	{
		
		$model=$this->loadModel($id,'PoCategory');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['PoCategory']))
{
$model->attributes=$_POST['PoCategory'];
if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('maspo','id'=>$model->id_po_category));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../pocategory/update',array(
'model'=>$model,
));
	}
	
public function actionmaspoview($id)
{
if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../pocategory/view',array(
'model'=>$this->loadModel($id,'PoCategory'),
));
}	

public function actionmastype()
	{
		$model=new BussinessTypeOrder('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BussinessTypeOrder']))
		$model->attributes=$_GET['BussinessTypeOrder'];	
		$this->render('../bussinesstypeorder/admin',array(
		'model'=>$model,
		));
	}

public function actionmastypecreate()
	{
		
		$model=new BussinessTypeOrder;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['BussinessTypeOrder']))
{
$model->attributes=$_POST['BussinessTypeOrder'];
if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('mastype','id'=>$model->id_bussiness_type_order));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../bussinesstypeorder/create',array(
'model'=>$model,
));
	}


public function actionmastypeupdate($id)
	{
		
		$model=$this->loadModel($id,'BussinessTypeOrder');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['BussinessTypeOrder']))
{
$model->attributes=$_POST['BussinessTypeOrder'];
if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('mastype','id'=>$model->id_bussiness_type_order));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../bussinesstypeorder/update',array(
'model'=>$model,
));
	}

public function actionmastypeview($id)
{
if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../bussinesstypeorder/view',array(
'model'=>$this->loadModel($id,'BussinessTypeOrder'),
));
}	


public function actionmasvoy()
	{
		$model=new VoyageMstActivity('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VoyageMstActivity']))
		$model->attributes=$_GET['VoyageMstActivity'];	
		$this->render('../voyagemstactivity/admin',array(
		'model'=>$model,
		));
	}

public function actionmasvoycreate()
	{
		
		$model=new VoyageMstActivity;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['VoyageMstActivity']))
{
$model->attributes=$_POST['VoyageMstActivity'];
if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('masvoy','id'=>$model->id_voyage_activity));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../voyagemstactivity/create',array(
'model'=>$model,
));
	}


public function actionmasvoyupdate($id)
	{
		
		$model=$this->loadModel($id,'VoyageMstActivity');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['VoyageMstActivity']))
{
$model->attributes=$_POST['VoyageMstActivity'];
if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('masvoy','id'=>$model->id_voyage_activity));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../voyagemstactivity/update',array(
'model'=>$model,
));
	}

public function actionmasvoyview($id)
{
if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../voyagemstactivity/view',array(
'model'=>$this->loadModel($id,'VoyageMstActivity'),
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


public function actionmascrew()
	{
		$model=new CrewPosition('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CrewPosition']))
		$model->attributes=$_GET['CrewPosition'];	
		$this->render('../crewposition/admin',array(
		'model'=>$model,
		));
	}

public function actionmascrewcreate()
	{
		
		$model=new CrewPosition;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['CrewPosition']))
{
$model->attributes=$_POST['CrewPosition'];

if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('mascrew','id'=>$model->id_crew_position));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../crewposition/create',array(
'model'=>$model,
));
	}	

public function actionmascrewupdate($id)
	{
		
		$model=$this->loadModel($id,'CrewPosition');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['CrewPosition']))
{
$model->attributes=$_POST['CrewPosition'];

if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('mascrew','id'=>$model->id_crew_position));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../crewposition/update',array(
'model'=>$model,
));
	}

public function actionmascrewview($id)
{
if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../crewposition/view',array(
'model'=>$this->loadModel($id,'CrewPosition'),
));
}


public function actionmastric()
	{
		$model=new MstMetric('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MstMetric']))
		$model->attributes=$_GET['MstMetric'];	
		$this->render('../mstmetric/admin',array(
		'model'=>$model,
		));
	}

public function actionmastriccreate()
	{
		
		$model=new MstMetric;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['MstMetric']))
{
$model->attributes=$_POST['MstMetric'];

if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('mastric','id'=>$model->metric));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../mstmetric/create',array(
'model'=>$model,
));
	}	

public function actionmastricupdate($id)
	{
		
		$model=$this->loadModel($id,'MstMetric');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['MstMetric']))
{
$model->attributes=$_POST['MstMetric'];

if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('mastric','id'=>$model->metric));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../mstmetric/update',array(
'model'=>$model,
));
	}

public function actionmastricview($id)
{
if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../mstmetric/view',array(
'model'=>$this->loadModel($id,'MstMetric'),
));
}


public function actionmaspr()
	{
		$model=new MstMetricPr('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MstMetricPr']))
		$model->attributes=$_GET['MstMetricPr'];	
		$this->render('../mstmetricpr/admin',array(
		'model'=>$model,
		));
	}

public function actionmasprcreate()
	{
		
		$model=new MstMetricPr;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['MstMetricPr']))
{
$model->attributes=$_POST['MstMetricPr'];

if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('maspr','id'=>$model->metric));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../mstmetricpr/create',array(
'model'=>$model,
));
	}	

public function actionmasprupdate($id)
	{
		
		$model=$this->loadModel($id,'MstMetricPr');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['MstMetricPr']))
{
$model->attributes=$_POST['MstMetricPr'];

if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('maspr','id'=>$model->metric));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../mstmetricpr/update',array(
'model'=>$model,
));
	}

public function actionmasprview($id)
{
if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../mstmetricpr/view',array(
'model'=>$this->loadModel($id,'MstMetricPr'),
));
}


public function actionvoydoc()
	{
		$model=new MstVoyageDocument('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MstVoyageDocument']))
		$model->attributes=$_GET['MstVoyageDocument'];	
		$this->render('../mstvoyagedocument/admin',array(
		'model'=>$model,
		));
	}

public function actionvoydoccreate()
	{
		
		$model=new MstVoyageDocument;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['MstVoyageDocument']))
{
$model->attributes=$_POST['MstVoyageDocument'];

if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('voydoc','id'=>$model->IdVoyageDocument));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../mstvoyagedocument/create',array(
'model'=>$model,
));
	}	

public function actionvoydocupdate($id)
	{
		
		$model=$this->loadModel($id,'MstVoyageDocument');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['MstVoyageDocument']))
{
$model->attributes=$_POST['MstVoyageDocument'];

if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('voydoc','id'=>$model->IdVoyageDocument));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../mstvoyagedocument/update',array(
'model'=>$model,
));
	}

public function actionvoydocview($id)
{
if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../mstvoyagedocument/view',array(
'model'=>$this->loadModel($id,'MstVoyageDocument'),
));
}

public function actionmasfuel()
	{
		$model=new FuelTransactionType('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FuelTransactionType']))
		$model->attributes=$_GET['FuelTransactionType'];	
		$this->render('../fueltransactiontype/admin',array(
		'model'=>$model,
		));
	}

public function actionmasfuelcreate()
	{
		
		$model=new FuelTransactionType;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['FuelTransactionType']))
{
$model->attributes=$_POST['FuelTransactionType'];

if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('masfuel','id'=>$model->id_fuel_transaction_type));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../fueltransactiontype/create',array(
'model'=>$model,
));
	}	


public function actionagen()
	{
		$model=new AgencyItem('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AgencyItem']))
		$model->attributes=$_GET['AgencyItem'];	
		$this->render('../agencyitem/admin',array(
		'model'=>$model,
		));
	}

public function actionagencreate()
	{
		
		$model=new AgencyItem;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['AgencyItem']))
{
$model->attributes=$_POST['AgencyItem'];

if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('agen','id'=>$model->id_agency_item));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../agencyitem/create',array(
'model'=>$model,
));
	}	





public function actionmasbrok()
	{
		$model=new Brokerageitem('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Brokerageitem']))
		$model->attributes=$_GET['Brokerageitem'];	
		$this->render('../brokerageitem/admin',array(
		'model'=>$model,
		));
	}

public function actionmasbrokcreate()
	{
		
		$model=new Brokerageitem;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Brokerageitem']))
{
$model->attributes=$_POST['Brokerageitem'];

if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('masbrok','id'=>$model->id_brokerage_item));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../brokerageitem/create',array(
'model'=>$model,
));
	}	

public function actionmasrol()
	{
		$model=new PayrollItem('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PayrollItem']))
		$model->attributes=$_GET['PayrollItem'];	
		$this->render('../payrollitem/admin',array(
		'model'=>$model,
		));
	}



public function actionmasrolcreate()
	{
		
		$model=new PayrollItem;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['PayrollItem']))
{
$model->attributes=$_POST['PayrollItem'];

if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('masrol','id'=>$model->id_payroll_item));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../payrollitem/create',array(
'model'=>$model,
));
	}	

public function actionmasleft()
	{
		$model=new CpanelLeftmenu('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CpanelLeftmenu']))
		$model->attributes=$_GET['CpanelLeftmenu'];	
		$this->render('../cpanelleftmenu/admin',array(
		'model'=>$model,
		));
	}

public function actionmasleftcreate()
	{
		
		$model=new CpanelLeftmenu;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['CpanelLeftmenu']))
{
$model->attributes=$_POST['CpanelLeftmenu'];

if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('masleft','id'=>$model->id_leftmenu));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../cpanelleftmenu/create',array(
'model'=>$model,
));
	}	



	public function actionvalid()
	{
		$model=new MstVesselDocumentValidity('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MstVesselDocumentValidity']))
		$model->attributes=$_GET['MstVesselDocumentValidity'];	
		$this->render('../mstvesseldocumentvalidity/admin',array(
		'model'=>$model,
		));
	}

public function actionvalidcreate()
	{
		
		$model=new MstVesselDocumentValidity;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['MstVesselDocumentValidity']))
{
$model->attributes=$_POST['MstVesselDocumentValidity'];

if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('valid','id'=>$model->id_vessel_document_validity));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../mstvesseldocumentvalidity/create',array(
'model'=>$model,
));
	}

	public function actionvalidupdate($id)
	{
		
		$model=$this->loadModel($id,'MstVesselDocumentValidity');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['MstVesselDocumentValidity']))
{
$model->attributes=$_POST['MstVesselDocumentValidity'];

if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('valid','id'=>$model->id_vessel_document_validity));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../mstvesseldocumentvalidity/update',array(
'model'=>$model,
));
	}	



	public function actionTimes()
	{
		$model=new MstTimesheetSummary('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MstTimesheetSummary']))
		$model->attributes=$_GET['MstTimesheetSummary'];	
		$this->render('../msttimesheetsummary/admin',array(
		'model'=>$model,
		));
	}

public function actiontimescreate()
	{
		
		$model=new MstTimesheetSummary;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['MstTimesheetSummary']))
{
$model->attributes=$_POST['MstTimesheetSummary'];

if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('times','id'=>$model->id_mst_timesheet_summary));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../msttimesheetsummary/create',array(
'model'=>$model,
));
	}

	public function actionTimesupdate($id)
	{
		
		$model=$this->loadModel($id,'MstTimesheetSummary');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['MstTimesheetSummary']))
{
$model->attributes=$_POST['MstTimesheetSummary'];

if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('valid','id'=>$model->id_mst_timesheet_summary));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../msttimesheetsummary/update',array(
'model'=>$model,
));
	}

	public function actionTimesview($id)
{
if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../msttimesheetsummary/view',array(
'model'=>$this->loadModel($id,'MstTimesheetSummary'),
));
}	


	public function actionDebit()
	{
		$model=new MstDebitNoteCategory('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MstDebitNoteCategory']))
		$model->attributes=$_GET['MstDebitNoteCategory'];	
		$this->render('../mstdebitnotecategory/admin',array(
		'model'=>$model,
		));
	}

public function actionDebitcreate()
	{
		
		$model=new MstDebitNoteCategory;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['MstDebitNoteCategory']))
{
$model->attributes=$_POST['MstDebitNoteCategory'];

if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('debit','id'=>$model->id_debit_note_category));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../mstdebitnotecategory/create',array(
'model'=>$model,
));
	}

	public function actionDebitupdate($id)
	{
		
		$model=$this->loadModel($id,'MstDebitNoteCategory');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['MstDebitNoteCategory']))
{
$model->attributes=$_POST['MstDebitNoteCategory'];

if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('debit','id'=>$model->id_debit_note_category));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../mstdebitnotecategory/update',array(
'model'=>$model,
));
	}

	public function actionDebitview($id)
{
if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../mstdebitnotecategory/view',array(
'model'=>$this->loadModel($id,'MstDebitNoteCategory'),
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
