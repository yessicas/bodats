<?php

class FindingReportController extends Controller
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
'actions'=>array('create','update','admin','delete','index','autovessel','editable'),
'roles'=>array('ADM','OPR'),
),
array('deny',  // deny all users
'roles'=>array('CUS','FIC','CRW','NAU','MKT'),
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
$modeldetail=new FindingReportDetail('searchbyfinding');
$modeldetail->unsetAttributes();  // clear any default values
if(isset($_GET['FindingReportDetail']))
$modeldetail->attributes=$_GET['FindingReportDetail'];


$this->render('view',array(
'model'=>$this->loadModel($id),
'modeldetail'=>$modeldetail,
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate($id)
{
$model=new FindingReport;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['FindingReport']))
{

$model->attributes=$_POST['FindingReport'];

if ($_POST['FindingReport']['vesselname'] <>''){
				$costumer=Vessel::model()->findByAttributes(array('VesselName'=>$_POST['FindingReport']['vesselname'],'id_vessel'=>$_POST['FindingReport']['id_vessel']));
				if($costumer===null){
				$model->addError('vesselname', 'Vessel Name Tidak terdaftar!');
					}

				if($costumer==true){
				$model->addError('vesselname', 'Vessel Name Tidak terdaftar!');
					
				$model->created_date=date("Y-m-d H:i:s");
				$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
				$model->Status='OPEN';
				

				if($model->save()){

				// insert nomornya
				$updateModel=FindingReport::model()->findByPK($model->id_finding_report);
				$dataformatnumber=NumberingDocumentDBFinding::getFormatNumber($model,'id_finding_report','NoReport','NoMonth','NoYear',$model->id_finding_report);
				$updateModel->FindingReportNumber = $dataformatnumber['NumberFormat']; 
				$updateModel->NoReport = $dataformatnumber['NoOrder']; 
				$updateModel->NoMonth = NumberingDocumentDBFinding::getMonthNow(); 
				$updateModel->NoYear = NumberingDocumentDBFinding::getYearNow(); 
				$updateModel->save(false);

				//update vessel date of finding 
			    $Vessel =  Vessel::model()->findByPk($model->id_vessel);
			    $Vessel->LastDateofFinding=$model->Date;
			    $Vessel->NumberOfFinding=$Vessel->NumberOfFinding+1;
			    $Vessel->save(false);


				Yii::app()->user->setFlash('success', " Data Saved");
				//$this->redirect(array('view','id'=>$model->id_finding_report));
				$this->redirect(array('repair/finding','id'=>$model->id_vessel));
				}
				}

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

if(isset($_POST['FindingReport']))
{
$model->attributes=$_POST['FindingReport'];

	if ($_POST['FindingReport']['vesselname'] <>''){
				$costumer=Vessel::model()->findByAttributes(array('VesselName'=>$_POST['FindingReport']['vesselname'],'id_vessel'=>$_POST['FindingReport']['id_vessel']));
				if($costumer===null){
				$model->addError('vesselname', 'Vessel Name Tidak terdaftar!');
					}

				if($costumer==true){
				$model->addError('vesselname', 'Vessel Name Tidak terdaftar!');
					
				$model->created_date=date("Y-m-d H:i:s");
				$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
				$model->Status='OPEN';
				

				if($model->save()){
				//update vessel date of damage 
			    $Vessel =  Vessel::model()->findByPk($model->id_vessel);
			    $Vessel->LastDateofFinding=$model->Date;
			    //$Vessel->NumberOfFinding=$Vessel->NumberOfFinding+1;
			    $Vessel->save(false);


				Yii::app()->user->setFlash('success', " Data Saved");
				//$this->redirect(array('view','id'=>$model->id_finding_report));
				$this->redirect(array('repair/finding','id'=>$model->id_vessel));
				}
				}

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

		
		$criterialastFinding = new CDbCriteria();
		$criterialastFinding->condition = 'id_vessel =:id_vessel'; 
		$criterialastFinding->params = array(':id_vessel'=>$model->id_vessel);
		$criterialastFinding->order="Date DESC"; 
		$lastFinding  = FindingReport::model()->find($criterialastFinding); 

		if($lastFinding){
			$lastDateFindingData=$lastFinding->Date;
		}else{
			$lastDateFindingData='0000-00-00';
		}

		//update vessel date of damage 
	    $Vessel =  Vessel::model()->findByPk($model->id_vessel);
	    $Vessel->LastDateofFinding=$lastDateFindingData;
		$Vessel->NumberOfFinding=$Vessel->NumberOfFinding-1;
	    $Vessel->save(false);

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
$dataProvider=new CActiveDataProvider('FindingReport');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new FindingReport('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['FindingReport']))
$model->attributes=$_GET['FindingReport'];

$this->render('admin',array(
'model'=>$model,
));
}

public function actionEditable()
	{
		$es = new EditableSaver('FindingReport');
		try {

			$es->onBeforeUpdate = function($event) {
					 
					  };
			$es->update();
		} catch(CException $e) {
			echo CJSON::encode(array('success' => false, 'msg' => $e->getMessage()));
			return;
		}
		echo CJSON::encode(array('success' => true));
	}

public function actionAutovessel()  
      {  
           $res =array();  
           $row=array();  
           if (isset($_GET['search'])) {  
                $sql ="SELECT * FROM  vessel WHERE VesselName LIKE :VesselName ";  
                $command =Yii::app()->db->createCommand($sql);  
                $command->bindValue(":VesselName", ''.'%'.$_GET['search'].'%', PDO::PARAM_STR);  
                $res =$command->queryAll();  
                foreach($res as $value):  
                     $row[]=array(  
                               
                         
                          'id'=>$value['id_vessel'],  // return value from autocomplete 
						  'nama'=>$value['VesselName'],
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
$model=FindingReport::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='finding-report-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
