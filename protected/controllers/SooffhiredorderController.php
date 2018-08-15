<?php

class SooffhiredorderController extends Controller
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
array('allow',  // allow all users to perform 'index' and 'view' actions
'actions'=>array('index','view'),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete','adminpartial','approved','rejected'),
'users'=>array('@'),
),
array('deny',  // deny all users
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
$model=new SoOffhiredOrder;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['SoOffhiredOrder']))
{
$model->attributes=$_POST['SoOffhiredOrder'];
$model->status='NONE';
$model = LogUserUpdated::setUserCreated($model);
if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
  
      // insert nomornya
      $updateModel=SoOffhiredOrder::model()->findByPK($model->id_so_offhired_order);
      $dataformatnumber=NumberingDocumentDBSOOFFHIRED::getFormatNumber($model,'id_so_offhired_order','SONo','SOMonth','SOYear',$model->id_so_offhired_order);
      $updateModel->OffhiredOrderNumber = $dataformatnumber['NumberFormat']; 
      $updateModel->SONo = $dataformatnumber['NoOrder']; 
      $updateModel->SOMonth = NumberingDocumentDBSOOFFHIRED::getMonthNow(); 
      $updateModel->SOYear = NumberingDocumentDBSOOFFHIRED::getYearNow() ; 
      $updateModel->save(false);


 		    $quoupdate=$this->loadModelquo($model->id_quotation);
        $quoupdate->Status='SHIPPING ORDER';
        $quoupdate->save(false);

$this->redirect(array('view','id'=>$model->id_so_offhired_order));
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

if(isset($_POST['SoOffhiredOrder']))
{
$model->attributes=$_POST['SoOffhiredOrder'];
if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('view','id'=>$model->id_so_offhired_order));
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
$dataProvider=new CActiveDataProvider('SoOffhiredOrder');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin() // yang statusnya plan
{
$model=new SoOffhiredOrder('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['SoOffhiredOrder']))
$model->attributes=$_GET['SoOffhiredOrder'];

$this->render('admin',array(
'model'=>$model,
));
}


public function actionAdminpartial() // yang statusnya plan (none)
{
$model=new SoOffhiredOrder('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['SoOffhiredOrder']))
$model->attributes=$_GET['SoOffhiredOrder'];


     /* // pake fancy box
    if(Yii::app()->request->getIsAjaxRequest())
      {
        echo $this->renderPartial('adminpartial',array(
          'model'=>$model,
        ),true,true);
      }

    else 
      $this->render('adminpartial',array(
        'model'=>$model,
      ));

      */
       // pake cjui dialog
	  $this->renderPartial('adminpartial',array(
          'model'=>$model,
       ),false,true);

       Yii::app()->end();
      
}

public function actionApproved() // yang statusnya approved
{
$model=new SoOffhiredOrder('searchapproved');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['SoOffhiredOrder']))
$model->attributes=$_GET['SoOffhiredOrder'];

$this->render('approved',array(
'model'=>$model,
));
}

public function actionRejected() // yang statusnya rejected
{
$model=new SoOffhiredOrder('searcharejected');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['SoOffhiredOrder']))
$model->attributes=$_GET['SoOffhiredOrder'];

$this->render('rejected',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=SoOffhiredOrder::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

public function loadModelquo($idquo)
{
$model=Quotation::model()->findByPk($idquo);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='so-offhired-order-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
