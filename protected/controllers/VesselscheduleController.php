<?php

class VesselscheduleController extends Controller
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
'actions'=>array('create','update','schedule'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete'),
'users'=>array('admin'),
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
$model=new VesselSchedule;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['VesselSchedule']))
{
$model->attributes=$_POST['VesselSchedule'];
if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('view','id'=>$model->id_vessel_schedule));
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

if(isset($_POST['VesselSchedule']))
{
$model->attributes=$_POST['VesselSchedule'];
if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('admin','id'=>$model->id_vessel_schedule));
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
$dataProvider=new CActiveDataProvider('VesselSchedule');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new VesselSchedule('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['VesselSchedule']))
$model->attributes=$_GET['VesselSchedule'];

$this->render('admin',array(
'model'=>$model,
));
}


public function actionSchedule()
{

$vesselnamesearch=isset($_GET['vesselnamesearch']) ? $_GET['vesselnamesearch'] : '' ;
$vesseltypesearch=isset($_GET['vesseltypesearch']) ? $_GET['vesseltypesearch'] : '' ;
$monthseacrh=isset($_GET['monthseacrh']) ? $_GET['monthseacrh'] : date("m") ;
$yearseacrh=isset($_GET['yearseacrh']) ? $_GET['yearseacrh'] : date("Y") ;



// data untuk shipping order
	$data_shiping_order_tug = array(); // penampung data data vessel tug
	$data_shiping_order_barge = array(); // penampung data data vessel barge

	$criteria = new CDbCriteria();
	$criteria->with=array('Vessel');
    $criteria->together=true;
	$criteria->condition = "t.id_vessel_status = 20"; // mencari dengan statusc=vessel nya 20 = shipping order
	$criteria->compare('Vessel.VesselName',$vesselnamesearch,true); // untuk berdasarkan nama  vessel
	$criteria->compare('Vessel.VesselType',$vesseltypesearch,true); // untuk berdasarkan type vessel
	//$criteria->compare('MONTHNAME(t.date)','september'); // untuk berdasarkan  nama bulan
	$criteria->compare('t.month',$monthseacrh); // berdasar nomor bulan
	$criteria->compare('t.year',$yearseacrh); // untuk berdasarkan  ntahun
	$criteria->group='t.id_shipping_order_detail , t.id_vessel';
	$vessel_sechedule_shipping_order = VesselSchedule::model()->findAll($criteria); //eksekusi pencarian data vberdasarkan criterian di atas

	if(count($vessel_sechedule_shipping_order)>0){ // jika ada data yang di cari
			foreach($vessel_sechedule_shipping_order as $list_vessel_sechedule_shipping_order){
				//echo $list_vessel_sechedule_shipping_order->id_shipping_order_detail.'--';
				//echo $list_vessel_sechedule_shipping_order->id_vessel.'---';
				//echo $list_vessel_sechedule_shipping_order->Vessel->VesselType.'---';

				if($list_vessel_sechedule_shipping_order->Vessel->VesselType=='TUG'){ // pengelompokan menurut type tug
					$vesselname=$list_vessel_sechedule_shipping_order->Vessel->VesselName;
					$id_vessel=$list_vessel_sechedule_shipping_order->id_vessel;
					// cari start date
					$criteria_detil_1 = new CDbCriteria();
					$criteria_detil_1->order="date asc";
					$criteria_detil_1->condition = "id_shipping_order_detail =".$list_vessel_sechedule_shipping_order->id_shipping_order_detail." AND month =".$monthseacrh;
					$criteria_detil_1->limit=1;
					$vessel_sechedule_shipping_order_detil_1 = VesselSchedule::model()->findAll($criteria_detil_1); 
						foreach($vessel_sechedule_shipping_order_detil_1 as $list_vessel_sechedule_shipping_order_detil_1){
							//echo $list_vessel_sechedule_shipping_order_detil_1->id_shipping_order_detail.'<br>';
							//echo $list_vessel_sechedule_shipping_order_detil_1->date.'<br>';
							$star_date=$list_vessel_sechedule_shipping_order_detil_1->date;
							//echo'-';
						}

					// cari end date
					$criteria_detil_2 = new CDbCriteria();
					$criteria_detil_2->order="date desc";
					$criteria_detil_2->condition = "id_shipping_order_detail =".$list_vessel_sechedule_shipping_order->id_shipping_order_detail." AND month =".$monthseacrh;
					$criteria_detil_2->limit=1;
					$vessel_sechedule_shipping_order_detil_2 = VesselSchedule::model()->findAll($criteria_detil_2); 
						foreach($vessel_sechedule_shipping_order_detil_2 as $list_vessel_sechedule_shipping_order_detil_2){
							//echo $list_vessel_sechedule_shipping_order_detil_2->id_shipping_order_detail.'<br>';
							//echo $list_vessel_sechedule_shipping_order_detil_2->date.'<br>';
							$end_date=$list_vessel_sechedule_shipping_order_detil_2->date;
							//echo'<br>';
						}

					// dumping data ke penampung
					$data_shiping_order_tug[] = array(
					  'id'=>$id_vessel,
					  'label' => $vesselname,
					  'urlblock'=>Yii::app()->createUrl("shippingorderdetail/view/id/".$list_vessel_sechedule_shipping_order->id_shipping_order_detail),
					  'urlclass'=>'various fancybox.ajax',
					  'start' => $star_date, 
					  'end'   => $end_date,
					  'class' => 'shipping-order',
						);
				}



				if($list_vessel_sechedule_shipping_order->Vessel->VesselType=='BARGE'){ // pengelompokan vessel barge
					$vesselname=$list_vessel_sechedule_shipping_order->Vessel->VesselName;
					$id_vessel=$list_vessel_sechedule_shipping_order->id_vessel;
					// cari start date
					$criteria_detil_1 = new CDbCriteria();
					$criteria_detil_1->order="date asc";
					$criteria_detil_1->condition = "id_shipping_order_detail =".$list_vessel_sechedule_shipping_order->id_shipping_order_detail." AND month =".$monthseacrh;
					$criteria_detil_1->limit=1;
					$vessel_sechedule_shipping_order_detil_1 = VesselSchedule::model()->findAll($criteria_detil_1); 
						foreach($vessel_sechedule_shipping_order_detil_1 as $list_vessel_sechedule_shipping_order_detil_1){
							//echo $list_vessel_sechedule_shipping_order_detil_1->id_shipping_order_detail.'<br>';
							//echo $list_vessel_sechedule_shipping_order_detil_1->date.'<br>';
							$star_date=$list_vessel_sechedule_shipping_order_detil_1->date;
							//echo'-';
						}

					// cari end date
					$criteria_detil_2 = new CDbCriteria();
					$criteria_detil_2->order="date desc";
					$criteria_detil_2->condition = "id_shipping_order_detail =".$list_vessel_sechedule_shipping_order->id_shipping_order_detail." AND month =".$monthseacrh;
					$criteria_detil_2->limit=1;
					$vessel_sechedule_shipping_order_detil_2 = VesselSchedule::model()->findAll($criteria_detil_2); 
						foreach($vessel_sechedule_shipping_order_detil_2 as $list_vessel_sechedule_shipping_order_detil_2){
							//echo $list_vessel_sechedule_shipping_order_detil_2->id_shipping_order_detail.'<br>';
							//echo $list_vessel_sechedule_shipping_order_detil_2->date.'<br>';
							$end_date=$list_vessel_sechedule_shipping_order_detil_2->date;
							//echo'<br>';
						}

					// dumping data ke penampung
					$data_shiping_order_barge[] = array(
					  'id'=>$id_vessel,
					  'label' => $vesselname,
					  'urlblock'=>Yii::app()->createUrl("shippingorderdetail/view/id/".$list_vessel_sechedule_shipping_order->id_shipping_order_detail),
					  'urlclass'=>'various fancybox.ajax',
					  'start' => $star_date, 
					  'end'   => $end_date,
					  'class' => 'shipping-order',
						);
				}




		}
	}

// data data vessel tug konsisten yang dimasukan ke penampung data 
$allvesseltug = Vessel::model()->findAll(array(
           'condition' => 'VesselType LIKE :VesselType',
           'params' => array(
               ':VesselType' => 'TUG',
           ),
       )); 

		foreach($allvesseltug as $list_allvesseltug){
		$data_shiping_order_tug[] = array(
					  'id'=>$list_allvesseltug->id_vessel,
					  'label' => $list_allvesseltug->VesselName,
					  'urlblock'=>'',
					  'urlclass'=>'',
					  'start' => '', 
					  'end'   => '',
					  'class' => '',
						);
	}


$group_data_shiping_order_tug = array(); // data data vessel  tug penampung tadi di group berdasarkan id vessel
foreach ($data_shiping_order_tug as $list_data_shiping_order_tug) {
  $id = $list_data_shiping_order_tug['id'];
  if (isset($group_data_shiping_order_tug[$id])) {
     $group_data_shiping_order_tug[$id][] = $list_data_shiping_order_tug;
  } else {
     $group_data_shiping_order_tug[$id] = array($list_data_shiping_order_tug);
  }
}
ksort($group_data_shiping_order_tug); // menurutkan urutan id vessel secara array
//print_r($group_data_shiping_order_tug);
//echo'<br>';






// data data vessel barge konsisten yang dimasukan ke penampung data 
$allvesselbarge = Vessel::model()->findAll(array(
           'condition' => 'VesselType LIKE :VesselType',
           'params' => array(
               ':VesselType' => 'BARGE',
           ),
       )); 

		foreach($allvesselbarge as $list_allvesselbarge){
		$data_shiping_order_barge[] = array(
					  'id'=>$list_allvesselbarge->id_vessel,
					  'label' => $list_allvesselbarge->VesselName,
					  'urlblock'=>'',
					  'urlclass'=>'',
					  'start' => '', 
					  'end'   => '',
					  'class' => '',
						);
		}

$group_data_shiping_order_barge = array(); //data data vessel  tug penampung tadi di group berdasarkan id vessel
foreach ($data_shiping_order_barge as $list_data_shiping_order_barge) {
  $id = $list_data_shiping_order_barge['id'];
  if (isset($group_data_shiping_order_barge[$id])) {
     $group_data_shiping_order_barge[$id][] = $list_data_shiping_order_barge;
  } else {
     $group_data_shiping_order_barge[$id] = array($list_data_shiping_order_barge);
  }
}
ksort($group_data_shiping_order_barge); // menurutkan urutan id vessel secara array
//print_r($group_data_shiping_order_barge);
//count($group_data_shiping_order_barge);

// end shiping order 




$this->render('schedule',array(
'group_data_shiping_order_tug'=>$group_data_shiping_order_tug,
'group_data_shiping_order_barge'=>$group_data_shiping_order_barge,
'vesselnamesearch'=>$vesselnamesearch,
'vesseltypesearch'=>$vesseltypesearch,
'monthseacrh'=>$monthseacrh,
'yearseacrh'=>$yearseacrh,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=VesselSchedule::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='vessel-schedule-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
