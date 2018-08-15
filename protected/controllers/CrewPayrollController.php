<?php

class CrewPayrollController extends Controller
{
	/**
	* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	* using two-column layout. See 'protected/views/layouts/column2.php'.
	*/
	public $layout='//layouts/column2';

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
				'actions'=>array('list', 'listmonthly', 'create', 'addpayroll','addpayrollmonthly'),
				'roles'=>array('ADM','FIC'),
			),
			
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('listcost'),
				'roles'=>array('ADM','FIC', 'CCT'),
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
		$model=new CrewPayroll;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CrewPayroll']))
		{
			$model->attributes=$_POST['CrewPayroll'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_crew_payroll));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	public function actionList($id_tug=0)
	{
		$this->layout = "twoplets";
		if(isset($_GET['yt0'])){
			$id_tug=isset($_GET['Tug']) ? $_GET['Tug'] : 0 ;
			$this->redirect(array('list','id_tug'=>$id_tug));
		}
		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('list',true,true);//This will bring out the view along with its script.
		}
		else {
			$this->render('/crewPayroll/list',array(
				'id_tug'=>$id_tug,
			));
		}
	}
	
	public function actionListcost($id_tug=0, $type="OWN")
	{
		$this->layout = "twoplets";
		if(isset($_GET['yt0'])){
			$id_tug=isset($_GET['Tug']) ? $_GET['Tug'] : 0 ;
			$this->redirect(array('list','id_tug'=>$id_tug));
		}
		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('/crewPayroll/listcost',array(
				'id_tug'=>$id_tug,
				'type'=>$type,
			), true,true);//This will bring out the view along with its script.
		}
		else {
			$this->render('/crewPayroll/listcost',array(
				'id_tug'=>$id_tug,
				'type'=>$type,
			));
		}
	}

	public function actionListmonthly($id_tug=0)
	{
		$this->layout = "twoplets";
		$monthly=1;
		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('list',true,true);//This will bring out the view along with its script.
		}
		else {
			$this->render('/crewPayroll/list',array(
				'id_tug'=>$id_tug,
				'monthly'=>$monthly,
			));
		}
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

		if(isset($_POST['CrewPayroll']))
		{
			$model->attributes=$_POST['CrewPayroll'];
			if($model->save())
			$this->redirect(array('view','id'=>$model->id_crew_payroll));
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
		$dataProvider=new CActiveDataProvider('CrewPayroll');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionAddpayroll($CrewId, $id_tug)
	{
		$model = PayrollDB::getCrewPayroll($CrewId);
		$status_exist = true;
		if($model == null){
			$model=new CrewPayroll;
			$status_exist = false;
		}else{
			
		}

		if(isset($_POST['yt0']))
		{
			$status = PayrollDB::savePayrollUpdate(); 
			if($status){
				//Mencatatkan crew sign on
			
				//$this->redirect(array('view','id'=>$model->id_crew_assignment));
				$this->redirect(array('/crewPayroll/list','id_tug'=>$id_tug));
			}
		}
	
		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('../crewPayroll/updatecrewpayroll',array(				
				'CrewId'=>$CrewId, 
				'model'=>$model,),true,true);
		}
		
		else
			$this->render('../crewPayroll/updatecrewpayroll',array(
				'CrewId'=>$CrewId, 
				'model'=>$model,
				)
			);
	}

	public function actionAddpayrollmonthly($CrewId, $id_tug, $month,$year)
	{
		$model = PayrollDB::getCrewPayrollmonthly($CrewId);
		$status_exist = true;
		if($model == null){
			$model=new CrewPayrollMonthly;
			$status_exist = false;
		}

		if(isset($_POST['yt0']))
		{
			$status = PayrollDB::savePayrollUpdatemonthly(); 
			if($status){
				//Mencatatkan crew sign on
			
				//$this->redirect(array('view','id'=>$model->id_crew_assignment));
				$this->redirect(array('/crewPayroll/listmonthly','id_tug'=>$id_tug,'month'=>$month,'year'=>$year));
			}
		}

		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('../crewPayroll/updatecrewpayrollmonthly',array(				
				'CrewId'=>$CrewId, 
				'month'=>$month, 
				'year'=>$year, 
				'model'=>$model,),true,true);
		}
		
		else
			$this->render('../crewPayroll/updatecrewpayrollmonthly',array(
				'CrewId'=>$CrewId, 
				'month'=>$month, 
				'year'=>$year, 
				'model'=>$model,
				)
			);
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new CrewPayroll('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CrewPayroll']))
			$model->attributes=$_GET['CrewPayroll'];

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
		$model=CrewPayroll::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='crew-payroll-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
