<?php

class ShippingorderdetailController extends Controller
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
'actions'=>array('admin','delete','update','view','create','index','viewonschedule'),
'roles'=>array('ADM','MKT'),
),
array('deny',  // deny all users
'roles'=>array('CUS','FIC','CRW','NAU','OPR'),
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


public function actionViewonschedule($id)
{
if(Yii::app()->request->getIsAjaxRequest())
     {
          echo $this->renderPartial('viewonschedule',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('viewonschedule',array(
'model'=>$this->loadModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate($id)
{
$model=new ShippingOrderDetail;

// Uncomment the following line if AJAX validation is needed
 $this->performAjaxValidation($model);

if(isset($_POST['ShippingOrderDetail']))
{
$model->attributes=$_POST['ShippingOrderDetail'];

if($_POST['ShippingOrderDetail']['id_currency'] <>''){
	$changerate=Currency::model()->findByPk($_POST['ShippingOrderDetail']['id_currency']);
	$model->change_rate=$changerate->change_rate;

}

$model->id_shipping_order=$id;
$model->created_user=Yii::app()->user->id;
$model->created_date=date("Y-m-d H:i:s");
$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];


//$range_tanggal= $_POST['ShippingOrderDetail']['daterange'];
//$model->start_date = substr($range_tanggal,0,10);
//$model->end_date = substr($range_tanggal,-10);


if($model->save()){

    $date1=$model->end_date;
    $date2=$model->start_date;
    $datetime1 = new DateTime($date1);
    $datetime2 = new DateTime($date2);
    $difference = $datetime1->diff($datetime2);
   // echo $difference->days;
    
    for ($i = 0; $i <= $difference->days; $i++) { 
        //echo $i;
        $tanggal=$this->adddate($date2,"+".$i." day");
        $array=explode("-",$tanggal);
        $tahun=$array[0];
        $bulan=$array[1];
        $hari=$array[2];

          $vesselschedule= new VesselSchedule;
          $vesselschedule->id_vessel=$model->id_vessel_tug;
          $vesselschedule->date=$tanggal;
          $vesselschedule->day=$hari;
          $vesselschedule->month=$bulan;
          $vesselschedule->year=$tahun;
          $vesselschedule->id_vessel_status=20;
          $vesselschedule->id_shipping_order_detail=$model->id_shipping_order_detail;
          $vesselschedule->description=$model->ShippingOrder->ShippingOrderNumber;
          $vesselschedule->created_date=$model->created_date;
          $vesselschedule->created_user=$model->created_user;
          $vesselschedule->ip_user_updated=$model->ip_user_updated;
          $vesselschedule->save(false);

          $vesselschedule= new VesselSchedule;
          $vesselschedule->id_vessel=$model->id_vessel_barge;
          $vesselschedule->date=$tanggal;
          $vesselschedule->day=$hari;
          $vesselschedule->month=$bulan;
          $vesselschedule->year=$tahun;
          $vesselschedule->id_vessel_status=20;
          $vesselschedule->id_shipping_order_detail=$model->id_shipping_order_detail;
          $vesselschedule->description=$model->ShippingOrder->ShippingOrderNumber;
          $vesselschedule->created_date=$model->created_date;
          $vesselschedule->created_user=$model->created_user;
          $vesselschedule->ip_user_updated=$model->ip_user_updated;
          $vesselschedule->save(false);

    }



Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('shippingorder/view','id'=>$model->id_shipping_order));
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

$id_tug_awal=$model->id_vessel_tug;
$id_barge_awal=$model->id_vessel_barge;
$id_shipping_order_detail_awal=$model->id_shipping_order_detail;

// Uncomment the following line if AJAX validation is needed
 $this->performAjaxValidation($model);

if(isset($_POST['ShippingOrderDetail']))
{
$model->attributes=$_POST['ShippingOrderDetail'];

if($_POST['ShippingOrderDetail']['id_currency'] <>''){
	$changerate=Currency::model()->findByPk($_POST['ShippingOrderDetail']['id_currency']);
	$model->change_rate=$changerate->change_rate;

}
$model->created_user=Yii::app()->user->id;
$model->created_date=date("Y-m-d H:i:s");
$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

if($model->validate())
{

      
     VesselSchedule::model()->deleteAll(array(
           'condition' => 'id_vessel = :id_vessel AND id_shipping_order_detail=:id_shipping_order_detail AND id_vessel_status=20',
           'params' => array(
               ':id_vessel' => $id_tug_awal,
               ':id_shipping_order_detail' => $id_shipping_order_detail_awal,
           ),
       ));

     VesselSchedule::model()->deleteAll(array(
           'condition' => 'id_vessel = :id_vessel AND id_shipping_order_detail=:id_shipping_order_detail AND id_vessel_status=20',
           'params' => array(
               ':id_vessel' => $id_barge_awal,
               ':id_shipping_order_detail' => $id_shipping_order_detail_awal,
           ),
       ));
     

$model->save();

    $date1=$model->end_date;
    $date2=$model->start_date;
    $datetime1 = new DateTime($date1);
    $datetime2 = new DateTime($date2);
    $difference = $datetime1->diff($datetime2);
   // echo $difference->days;
    
    for ($i = 0; $i <= $difference->days; $i++) { 
        //echo $i;
        $tanggal=$this->adddate($date2,"+".$i." day");
        $array=explode("-",$tanggal);
        $tahun=$array[0];
        $bulan=$array[1];
        $hari=$array[2];

          $vesselschedule= new VesselSchedule;
          $vesselschedule->id_vessel=$model->id_vessel_tug;
          $vesselschedule->date=$tanggal;
          $vesselschedule->day=$hari;
          $vesselschedule->month=$bulan;
          $vesselschedule->year=$tahun;
          $vesselschedule->id_vessel_status=20;
          $vesselschedule->id_shipping_order_detail=$model->id_shipping_order_detail;
          $vesselschedule->description=$model->ShippingOrder->ShippingOrderNumber;
          $vesselschedule->created_date=$model->created_date;
          $vesselschedule->created_user=$model->created_user;
          $vesselschedule->ip_user_updated=$model->ip_user_updated;
          $vesselschedule->save(false);

          $vesselschedule= new VesselSchedule;
          $vesselschedule->id_vessel=$model->id_vessel_barge;
          $vesselschedule->date=$tanggal;
          $vesselschedule->day=$hari;
          $vesselschedule->month=$bulan;
          $vesselschedule->year=$tahun;
          $vesselschedule->id_vessel_status=20;
          $vesselschedule->id_shipping_order_detail=$model->id_shipping_order_detail;
          $vesselschedule->description=$model->ShippingOrder->ShippingOrderNumber;
          $vesselschedule->created_date=$model->created_date;
          $vesselschedule->created_user=$model->created_user;
          $vesselschedule->ip_user_updated=$model->ip_user_updated;
          $vesselschedule->save(false);

    }



Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('shippingorder/view','id'=>$model->id_shipping_order));
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
$model=$this->loadModel($id);
$this->loadModel($id)->delete();


 VesselSchedule::model()->deleteAll(array(
           'condition' => 'id_vessel = :id_vessel AND id_shipping_order_detail=:id_shipping_order_detail AND id_vessel_status=20',
           'params' => array(
               ':id_vessel' => $model->id_vessel_tug,
                ':id_shipping_order_detail' => $model->id_shipping_order_detail,
                
           ),
       ));

     VesselSchedule::model()->deleteAll(array(
           'condition' => 'id_vessel = :id_vessel AND id_shipping_order_detail=:id_shipping_order_detail AND id_vessel_status=20',
           'params' => array(
               ':id_vessel' => $model->id_vessel_barge,
                ':id_shipping_order_detail' => $model->id_shipping_order_detail,
           ),
       ));

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('shippingorder/view'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('ShippingOrderDetail');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new ShippingOrderDetail('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['ShippingOrderDetail']))
$model->attributes=$_GET['ShippingOrderDetail'];

$this->render('admin',array(
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
$model=ShippingOrderDetail::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='shipping-order-detail-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
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
