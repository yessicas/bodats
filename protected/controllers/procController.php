<?php

class procController extends Controller
{
public $layout='//layouts/triplets';

public function actionvend()
	{
		$model=new RfqVendor('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RfqVendor']))
		$model->attributes=$_GET['RfqVendor'];	
		$this->render('../rfqvendor/admin',array(
		'model'=>$model,
		));
	}

public function actionvendupdate($id)
	{
$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['RfqVendor']))
{
$model->attributes=$_POST['RfqVendor'];

	if ($_POST['RfqVendor']['vendorname'] <>''){
				$costumer=Vendor::model()->findByAttributes(array('VendorName'=>$_POST['RfqVendor']['vendorname'],'id_vendor'=>$_POST['RfqVendor']['id_vendor']));
				if($costumer===null){
				$model->addError('vendorname', 'Vendor Name Tidak terdaftar!');
					}

				if($costumer==true){
				$model->addError('vendorname', 'Vendor Name Tidak terdaftar!');
					
				$model->created_user=Yii::app()->user->id;
				$model->created_date=date("Y-m-d H:i:s");
				$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

				if($model->save())
				{
				Yii::app()->user->setFlash('success', " Data Updated");
				$this->redirect(array('vend','id'=>$model->id_rfq_vendor));
				}
				}

}


}


if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../rfqvendor/update',array(
'model'=>$model,
));
}

public function actionvendcreate()
	{
$model=new RfqVendor;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['RfqVendor']))
{
$model->attributes=$_POST['RfqVendor'];

		if ($_POST['RfqVendor']['vendorname'] <>''){
				$costumer=Vendor::model()->findByAttributes(array('VendorName'=>$_POST['RfqVendor']['vendorname'],'id_vendor'=>$_POST['RfqVendor']['id_vendor']));
				if($costumer===null){
				$model->addError('vendorname', 'Vendor Name Tidak terdaftar!');
					}

				if($costumer==true){
				$model->addError('vendorname', 'Vendor Name Tidak terdaftar!');
					
				$model->created_user=Yii::app()->user->id;
				$model->created_date=date("Y-m-d H:i:s");
				$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
				


if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('rfqvendor/view','id'=>$model->id_rfq_vendor));
}
}

}
}

if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../rfqvendor/create',array(
'model'=>$model,
));
}

public function actionvendview($id)
{

$modeldetail=new RfqVendorDetail('searchbyrfq');
$modeldetail->unsetAttributes();  // clear any default values
if(isset($_GET['RfqVendorDetail']))
$modeldetail->attributes=$_GET['RfqVendorDetail'];

if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../rfqvendor/view',array(
'model'=>$this->loadModel($id,'RfqVendor'),
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
