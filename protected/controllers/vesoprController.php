<?php

class vesoprController extends Controller
{
public $layout='//layouts/triplets';

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
					$jettyorigin=$list_vessel_sechedule_shipping_order->ShippingOrderDetail->JettyOrigin->Acronym;
					$jettydestination=$list_vessel_sechedule_shipping_order->ShippingOrderDetail->JettyDestination->Acronym;
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
					  'jettyorigin' => $jettyorigin,
					  'jettydestination' => $jettydestination,
					  'urlblock'=>Yii::app()->createUrl("shippingorderdetail/viewonschedule/id/".$list_vessel_sechedule_shipping_order->id_shipping_order_detail),
					  'urlclass'=>'various fancybox.ajax',
					  'start' => $star_date, 
					  'end'   => $end_date,
					  'class' => 'shipping-order',
						);
				}



				if($list_vessel_sechedule_shipping_order->Vessel->VesselType=='BARGE'){ // pengelompokan vessel barge
					$vesselname=$list_vessel_sechedule_shipping_order->Vessel->VesselName;
					$id_vessel=$list_vessel_sechedule_shipping_order->id_vessel;
					$jettyorigin=$list_vessel_sechedule_shipping_order->ShippingOrderDetail->JettyOrigin->Acronym;
					$jettydestination=$list_vessel_sechedule_shipping_order->ShippingOrderDetail->JettyDestination->Acronym;
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
					  'jettyorigin' => $jettyorigin,
					  'jettydestination' => $jettydestination,
					  'urlblock'=>Yii::app()->createUrl("viewonschedule/view/id/".$list_vessel_sechedule_shipping_order->id_shipping_order_detail),
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
					  'jettyorigin' => '',
					  'jettydestination' => '',
					  'urlblock'=>'',
					  'urlclass'=>'',
					  'start' => '', 
					  'end'   => '',
					  'class' => '',
						);
	}


/*
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
*/





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
					  'jettyorigin' => '',
					  'jettydestination' => '',
					  'urlblock'=>'',
					  'urlclass'=>'',
					  'start' => '', 
					  'end'   => '',
					  'class' => '',
						);
		}
/*
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
*/
// end shiping order 








	$data_maintenance_tug = array(); // 
	$data_maintenance_barge = array(); // 

	$criteria = new CDbCriteria();
	$criteria->with=array('Vessel');
    $criteria->together=true;
	$criteria->condition = "t.id_vessel_status = 50"; // mencari dengan statusc=vessel nya 50 = maintenance
	$criteria->compare('Vessel.VesselName',$vesselnamesearch,true); // untuk berdasarkan nama  vessel
	$criteria->compare('Vessel.VesselType',$vesseltypesearch,true); // untuk berdasarkan type vessel
	//$criteria->compare('MONTHNAME(t.date)','september'); // untuk berdasarkan  nama bulan
	$criteria->compare('t.month',$monthseacrh); // berdasar nomor bulan
	$criteria->compare('t.year',$yearseacrh); // untuk berdasarkan  ntahun
	$criteria->group='t.id_shipping_order_detail , t.id_vessel';
	$vessel_mintenance = VesselSchedule::model()->findAll($criteria); //eksekusi pencarian data vberdasarkan criterian di atas
	if(count($vessel_mintenance)>0){ // jika ada data yang di cari

	foreach($vessel_mintenance as $list_vessel_mintenance){

	if($list_vessel_mintenance->Vessel->VesselType=='TUG'){ // pengelompokan menurut type tug
					$vesselname=$list_vessel_mintenance->Vessel->VesselName;
					$id_vessel=$list_vessel_mintenance->id_vessel;
					// cari start date
					$criteria_detil_1 = new CDbCriteria();
					$criteria_detil_1->order="date asc";
					$criteria_detil_1->condition = "id_shipping_order_detail =".$list_vessel_mintenance->id_shipping_order_detail." AND month =".$monthseacrh;
					$criteria_detil_1->limit=1;
					$vessel_meintenance_detil_1 = VesselSchedule::model()->findAll($criteria_detil_1); 
						foreach($vessel_meintenance_detil_1 as $list_vessel_meintenance_detil_1){
							
							$star_date=$list_vessel_meintenance_detil_1->date;
							
						}

					// cari end date
					$criteria_detil_2 = new CDbCriteria();
					$criteria_detil_2->order="date desc";
					$criteria_detil_2->condition = "id_shipping_order_detail =".$list_vessel_mintenance->id_shipping_order_detail." AND month =".$monthseacrh;
					$criteria_detil_2->limit=1;
					$vessel_meintenance_detil_1 = VesselSchedule::model()->findAll($criteria_detil_2); 
						foreach($vessel_meintenance_detil_1 as $list_vessel_meintenance_detil_1){
						
							$end_date=$list_vessel_meintenance_detil_1->date;
							
						}

					// dumping data ke penampung
					$data_maintenance_tug[] = array(
					  'id'=>$id_vessel,
					  'label' => $vesselname,
					  'jettyorigin' => '', // harus didefinisikan walau bukan shiping order
					  'jettydestination' => '', // harus didefinisikan walau bukan shiping order
					  'urlblock'=>Yii::app()->createUrl("repair/Viewplan/id/".$list_vessel_mintenance->id_shipping_order_detail),
					  'urlclass'=>'various fancybox.ajax',
					  'start' => $star_date, 
					  'end'   => $end_date,
					  'class' => 'maintenence',
						);
				}



				if($list_vessel_mintenance->Vessel->VesselType=='BARGE'){ // pengelompokan menurut type barge
					$vesselname=$list_vessel_mintenance->Vessel->VesselName;
					$id_vessel=$list_vessel_mintenance->id_vessel;
					// cari start date
					$criteria_detil_1 = new CDbCriteria();
					$criteria_detil_1->order="date asc";
					$criteria_detil_1->condition = "id_shipping_order_detail =".$list_vessel_mintenance->id_shipping_order_detail." AND month =".$monthseacrh;
					$criteria_detil_1->limit=1;
					$vessel_meintenance_detil_1 = VesselSchedule::model()->findAll($criteria_detil_1); 
						foreach($vessel_meintenance_detil_1 as $list_vessel_meintenance_detil_1){
							
							$star_date=$list_vessel_meintenance_detil_1->date;
							
						}

					// cari end date
					$criteria_detil_2 = new CDbCriteria();
					$criteria_detil_2->order="date desc";
					$criteria_detil_2->condition = "id_shipping_order_detail =".$list_vessel_mintenance->id_shipping_order_detail." AND month =".$monthseacrh;
					$criteria_detil_2->limit=1;
					$vessel_meintenance_detil_1 = VesselSchedule::model()->findAll($criteria_detil_2); 
						foreach($vessel_meintenance_detil_1 as $list_vessel_meintenance_detil_1){
						
							$end_date=$list_vessel_meintenance_detil_1->date;
							
						}

					// dumping data ke penampung
					$data_maintenance_barge[] = array(
					  'id'=>$id_vessel,
					  'label' => $vesselname,
					  'jettyorigin' => '', // harus didefinisikan walau bukan shiping order
					  'jettydestination' => '', // harus didefinisikan walau bukan shiping order
					  'urlblock'=>Yii::app()->createUrl("repair/Viewplan/id/".$list_vessel_mintenance->id_shipping_order_detail),
					  'urlclass'=>'various fancybox.ajax',
					  'start' => $star_date, 
					  'end'   => $end_date,
					  'class' => 'maintenence',
						);
				}



			}

	}

/*
$group_data_maintenace_tug = array(); // data data vessel  tug penampung tadi di group berdasarkan id vessel
foreach ($data_maintenance_tug as $list_group_data_maintenace_tug) {
  $id = $list_group_data_maintenace_tug['id'];
  if (isset($group_data_maintenace_tug[$id])) {
     $group_data_maintenace_tug[$id][] = $list_group_data_maintenace_tug;
  } else {
     $group_data_maintenace_tug[$id] = array($list_group_data_maintenace_tug);
  }
}
ksort($group_data_maintenace_tug); // menurutkan urutan id vessel secara array
//print_r($group_data_maintenace_tug);
//echo'<br>';
*/


$all_tug_schedule=array_merge($data_shiping_order_tug , $data_maintenance_tug);

$group_all_tug = array(); // data data vessel  tug penampung tadi di group berdasarkan id vessel
foreach ($all_tug_schedule as $list_all_tug_schedule) {
  $id = $list_all_tug_schedule['id'];
  if (isset($group_all_tug[$id])) {
     $group_all_tug[$id][] = $list_all_tug_schedule;
  } else {
     $group_all_tug[$id] = array($list_all_tug_schedule);
  }
}
ksort($group_all_tug); // menurutkan urutan id vessel secara array



$all_barge_schedule=array_merge($data_shiping_order_barge , $data_maintenance_barge);

$group_all_barge = array(); // data data vessel  tug penampung tadi di group berdasarkan id vessel
foreach ($all_barge_schedule as $list_all_barge_schedule) {
  $id = $list_all_barge_schedule['id'];
  if (isset($group_all_barge[$id])) {
     $group_all_barge[$id][] = $list_all_barge_schedule;
  } else {
     $group_all_barge[$id] = array($list_all_barge_schedule);
  }
}
ksort($group_all_barge); // menurutkan urutan id vessel secara array





$this->render('../vesselschedule/schedule',array(
//'group_data_shiping_order_tug'=>$group_data_shiping_order_tug,
'group_all_tug'=>$group_all_tug,
//'group_data_shiping_order_barge'=>$group_data_shiping_order_barge,
'group_all_barge'=>$group_all_barge,
'vesselnamesearch'=>$vesselnamesearch,
'vesseltypesearch'=>$vesseltypesearch,
'monthseacrh'=>$monthseacrh,
'yearseacrh'=>$yearseacrh,
));
}

public function actionscheduleupdate($id)
	{
		
		$model=$this->loadModel($id,'VesselSchedule');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['VesselSchedule']))
{
$model->attributes=$_POST['VesselSchedule'];
if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('schedule','id'=>$model->id_vessel_schedule));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../vesselschedule/update',array(
'model'=>$model,
));
	}

public function actionschedulecreate()
	{
		$model=new VesselSchedule;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['VesselSchedule']))
{
$model->attributes=$_POST['VesselSchedule'];
if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('schedule','id'=>$model->id_vessel_schedule));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../vesselschedule/create',array(
'model'=>$model,
));
	}

public function actionscheduleview($id)
{
if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../vesselschedule/view',array(
'model'=>$this->loadModel($id,'VesselSchedule'),
));
}


public function actionvend()
	{
		$model=new Vendor('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Vendor']))
		$model->attributes=$_GET['Vendor'];	
		$this->render('../vendor/admin',array(
		'model'=>$model,
		));
	}

public function actionvendupdate($id)
	{
		
		$model=$this->loadModel($id,'Vendor');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Vendor']))
{
$model->attributes=$_POST['Vendor'];
if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('vend','id'=>$model->id_vendor));
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

public function actionvendcreate()
	{
		$model=new Vendor;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Vendor']))
{
$model->attributes=$_POST['Vendor'];
if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('vend','id'=>$model->id_vendor));
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

public function actionvendview($id)
{
if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../vendor/view',array(
'model'=>$this->loadModel($id,'Vendor'),
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
