<?php

class ActualsalesreportController extends Controller
{
	/**
	* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	* using two-column layout. See 'protected/views/layouts/column2.php'.
	*/
	public $layout='//layouts/twoplets';

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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('actualsales','view', 'actualpervoyage' , 'detailpervoyage'
				),

				'roles'=>array('ADM', 'FIC'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionActualsales($month="", $year="", $level=1)
	{
		if(isset($_GET['yt0'])){
			$month=isset($_GET['Month']) ? $_GET['Month'] : 0 ;
			$year=isset($_GET['Year']) ? $_GET['Year'] : 0 ;
			$level=isset($_GET['Level']) ? $_GET['Level'] : 1 ;
			$this->redirect(array('actualsales','month'=>$month, 'year'=>$year,'level'=>$level));
		}
		
		$this->render('actualsalesreport',array(
			//'arrayDataProvider'=>$arrayDataProvider,
			'month'=>$month, 'year'=>$year,'level'=>$level
		));	
	}
	
	public function actionActualpervoyage($month="", $year="")
	{
		if(isset($_GET['yt0'])){
			$month=isset($_GET['Month']) ? $_GET['Month'] : 0 ;
			$year=isset($_GET['Year']) ? $_GET['Year'] : 0 ;
			$this->redirect(array('actualpervoyage','month'=>$month, 'year'=>$year));
		}	
		$model=new VoyageOrder('');
		if($year > 0){
			//Get List of Data
			$criteria=new CDbCriteria;
			$startend = Timeanddate::getStartAndEndFromMonth($month, $year);
			
			$criteria->addBetweenCondition("StartDate",$startend["start"],$startend["end"]);
			//$criteria->addCondition("Type=:type");
			//$model=VoyageOrder::model()->findAll($criteria);

		}
		
		$this->render('actualpervoyagereport',array(
			//'arrayDataProvider'=>$arrayDataProvider,
			'month'=>$month, 'year'=>$year,
			'model'=>$model,
		));	
	}
	
	public function actionDetailpervoyage($id)
	{
		$this->render('detailactualpervoyage',array(
			'id_voyage_order'=>$id,
		));
	}
	

	public function actionView()
	{
		
		$this->render('reportpairview',array(
		//'arrayDataProvider'=>$arrayDataProvider,
		));
		
	}
}
