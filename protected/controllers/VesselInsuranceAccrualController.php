<?php

class VesselInsuranceAccrualController extends Controller
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
'actions'=>array('create','update','copyData'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete'),
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
public function actionCreate($id_vessel,$year)
{
$model=new VesselInsuranceAccrual;
$modelvessel=VesselDB::getVessel($id_vessel);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['VesselInsuranceAccrual']))
{
$model->attributes=$_POST['VesselInsuranceAccrual'];
$model->created_user=Yii::app()->user->id;
$model->created_date=date("Y-m-d H:i:s");
$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
if($model->save()){

				$criteria = new CDbCriteria();
				$criteria->condition = 'id_vessel=:id_vessel';
				$criteria->order = 'year DESC';
				$criteria->limit = 1;
				$criteria->params = array(':id_vessel'=>$id_vessel);
				$modelVesselInsuranceAccrual=VesselInsuranceAccrual::model()->find($criteria);

				if($modelVesselInsuranceAccrual){
					$modelvesselcost=StandardVesselCost::model()->findByAttributes(array('id_vessel'=>$modelVesselInsuranceAccrual->id_vessel));
					if($modelvesselcost){
						$modelvesselcost->insurance=$modelVesselInsuranceAccrual->amount;
						$modelvesselcost->save(false);
					}
				}

Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('index','yearseacrh'=>$year));

}
}

$this->render('create',array(
'model'=>$model,
'modelvessel'=>$modelvessel,
));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id_vessel,$year)
{
$model=$this->loadModelbyAttributes($id_vessel,$year);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['VesselInsuranceAccrual']))
{
$model->attributes=$_POST['VesselInsuranceAccrual'];

$model->created_user=Yii::app()->user->id;
$model->created_date=date("Y-m-d H:i:s");
$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

if($model->save())
{

				$criteria = new CDbCriteria();
				$criteria->condition = 'id_vessel=:id_vessel';
				$criteria->order = 'year DESC';
				$criteria->limit = 1;
				$criteria->params = array(':id_vessel'=>$id_vessel);
				$modelVesselInsuranceAccrual=VesselInsuranceAccrual::model()->find($criteria);

				if($modelVesselInsuranceAccrual){
					$modelvesselcost=StandardVesselCost::model()->findByAttributes(array('id_vessel'=>$modelVesselInsuranceAccrual->id_vessel));
					if($modelvesselcost){
						$modelvesselcost->insurance=$modelVesselInsuranceAccrual->amount;
						$modelvesselcost->save(false);
					}
				}

Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('index','yearseacrh'=>$year));

}
}


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

$model=new VesselInsuranceAccrual('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['VesselInsuranceAccrual']))
$model->attributes=$_GET['VesselInsuranceAccrual'];

$yearseacrh=isset($_GET['yearseacrh']) ? $_GET['yearseacrh'] : date("Y") ;

$this->render('admin',array(
'model'=>$model,
'yearseacrh'=>$yearseacrh,
));

}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new VesselInsuranceAccrual('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['VesselInsuranceAccrual']))
$model->attributes=$_GET['VesselInsuranceAccrual'];

$yearseacrh=isset($_GET['yearseacrh']) ? $_GET['yearseacrh'] : date("Y") ;

$this->render('admin',array(
'model'=>$model,
'yearseacrh'=>$yearseacrh,
));
}


public function actioncopyData()
	{

		$yearseacrhcopy=isset($_GET['yearseacrhcopy']) ? $_GET['yearseacrhcopy'] : date("Y") ;
		$yearseacrhasal= $_GET['yearseacrhasal'];

			$year = $yearseacrhcopy; //Sementara di hardcode (Nanti diubah sama mas must biar dinamis)
		    $LISTACCRUAL= VesselInsuranceAccrual::model()->findAllByAttributes(array('year'=>$year));
		    $LIST_ACCRUAL_RESULT = array(); //ini untuk menampung hasil
		    //Ubah dalam bentuk array agar pemroses jadi lebih cepat (tidak query berulang)
		    foreach($LISTACCRUAL as $accrual){
		        $LIST_ACCRUAL_RESULT[$accrual->id_vessel] = $accrual;
		    }

		    $totalData=0;
		    $DATAVESSELS = VesselDB::getListVesselDefault();
		    foreach($DATAVESSELS as $vessel){
		       
		        if(isset($LIST_ACCRUAL_RESULT[$vessel->id_vessel])){
		        	$totalData++;
		            $accrual = $LIST_ACCRUAL_RESULT[$vessel->id_vessel];

		            $model=new VesselInsuranceAccrual;
		            $model->id_vessel = $accrual->id_vessel;
		            $model->year = $yearseacrhasal;
		            $model->amount  =$accrual->amount;
		            $model->created_user=Yii::app()->user->id;
					$model->created_date=date("Y-m-d H:i:s");
					$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
					$model->save(false);

					$criteria = new CDbCriteria();
					$criteria->condition = 'id_vessel=:id_vessel';
					$criteria->order = 'year DESC';
					$criteria->limit = 1;
					$criteria->params = array(':id_vessel'=>$model->id_vessel);
					$modelVesselInsuranceAccrual=VesselInsuranceAccrual::model()->find($criteria);

					if($modelVesselInsuranceAccrual){
						$modelvesselcost=StandardVesselCost::model()->findByAttributes(array('id_vessel'=>$modelVesselInsuranceAccrual->id_vessel));
						if($modelvesselcost){
							$modelvesselcost->insurance=$modelVesselInsuranceAccrual->amount;
							$modelvesselcost->save(false);
						}
					}

		            


		        }else{
		           
		        }
		        
		    }


		    if($totalData > 0 ){
				Yii::app()->user->setFlash('success', " Data Copied From ".$yearseacrhcopy." to ".$yearseacrhasal);
			}else{
				Yii::app()->user->setFlash('success', " Data  From ".$yearseacrhcopy." Not Exist ");
			}
		$this->redirect(array('vesselInsuranceAccrual/index','yearseacrh'=>$yearseacrhasal ));
	}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=VesselInsuranceAccrual::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}


public function loadModelbyAttributes($id_vessel,$year)
	{
		$model=VesselInsuranceAccrual::model()->findByAttributes(array('id_vessel'=>$id_vessel,'year'=>$year));
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
if(isset($_POST['ajax']) && $_POST['ajax']==='vessel-insurance-accrual-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
