<?php

class CustomerController extends Controller
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
'actions'=>array('admin','delete','view','create','update','index','autopay'),
'roles'=>array('ADM','MKT','OPR'),
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
$modelzz=new CustomerBankAcc('search');
$modelzz->unsetAttributes();  // clear any default values
if(isset($_GET['CustomerBankAcc']))
$modelzz->attributes=$_GET['CustomerBankAcc'];

if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('view',array('model'=>$this->loadModel($id),'modelzz'=>$modelzz,),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('view',array(
'model'=>$this->loadModel($id),
'modelzz'=>$modelzz,
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new Customer;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Customer']))
{
$model->attributes=$_POST['Customer'];
if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('view','id'=>$model->id_customer));
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

if(isset($_POST['Customer']))
{
$model->attributes=$_POST['Customer'];
if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('admin','id'=>$model->id_customer));
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

			$repo='repository/customer/';
			$modeldatalama=Customer::model()->findByPk($id);
			$fotoname=$modeldatalama->foto_customer;
			//$file = $repo.$fotoname;	
			if($fotoname!=''){
				UploadFile::actiondeleteOldFile($repo, $fotoname);
				//unlink($file);
			}

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
$dataProvider=new CActiveDataProvider('Customer');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Customer('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Customer']))
$model->attributes=$_GET['Customer'];

$this->render('admin',array(
'model'=>$model,
));
}

public function actionAutopay()  
      {  
           $res =array();  
           $row=array();  
           if (isset($_GET['search'])) {  
                $sql ="SELECT * FROM  payment_top WHERE payment_top LIKE :payment_top ";  
                $command =Yii::app()->db->createCommand($sql);  
                $command->bindValue(":payment_top", ''.'%'.$_GET['search'].'%', PDO::PARAM_STR);  
                $res =$command->queryAll();  
                foreach($res as $value):  
                     $row[]=array(  
                               
                         
                          'id'=>$value['id_payment_top'],  // return value from autocomplete 
						  'nama'=>$value['payment_top'],
                     );   
                endforeach;  
           }  
           echo CJSON::encode($row);  
           Yii::app()->end();            
      }

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=Customer::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='customer-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
