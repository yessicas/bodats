<?php

class ReservationInquiryController extends Controller
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('checkAvailable','step1','step2','admin'),
				'roles'=>array('CUS', 'ADM'),
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
	public function actionCheckAvailable()
	{


   $rawData=array(
		array('id'=>1, 'VesselType'=>'GONAYA', 'Status'=>'AVAILABLE','NextSchedule'=>'2014-10-23','Last'=>'2014-10-08 (finish)','Inquiry'=>'Reserve'),
		array('id'=>2, 'VesselType'=>'GONAYA', 'Status'=>'AVAILABLE','NextSchedule'=>'2014-10-23','Last'=>'2014-10-08 (finish)','Inquiry'=>'Reserve'),
	);
	// or using: $rawData=User::model()->findAll();
	$arrayDataProvider=new CArrayDataProvider($rawData, array(
		'id'=>'id',
		/* 'sort'=>array(
			'attributes'=>array(
				'username', 'email',
			),
		), */
		'pagination'=>array(
			'pageSize'=>10,
		),
	));

	{
		
		$this->render('search',array(
		'arrayDataProvider'=>$arrayDataProvider,
	));
	}
		
	}
		
	public function actionStep1()
	{

		$rawData=array(
		array('id'=>1, 'CompanyName'=>'PT.MEGA SURYA ERATAMA', 'LoadingDate'=>'2014-10-14','PortLoading'=>'Batu Licin','PortUnloading'=>'Batu Licin','TUG'=>'PATIA1','BARGE'=>'ADARA','Quantity'=>'10 MT','Calculate'=>'Calculate'),
		array('id'=>2, 'CompanyName'=>'PT.MEGA SURYA ERATAMA', 'LoadingDate'=>'2014-10-14','PortLoading'=>'Batu Licin','PortUnloading'=>'Batu Licin','TUG'=>'PATIA1','BARGE'=>'ADARA','Quantity'=>'10 MT','Calculate'=>'Calculate'),
	);
	// or using: $rawData=User::model()->findAll();
	$arrayDataProvider=new CArrayDataProvider($rawData, array(
		'id'=>'id',
		/* 'sort'=>array(
			'attributes'=>array(
				'username', 'email',
			),
		), */
		'pagination'=>array(
			'pageSize'=>10,
		),
	));

	{

		$this->render('step1',array(
			'arrayDataProvider'=>$arrayDataProvider,
		));
		
	}
	}

	public function actionStep2()
	{
		$this->render('step2',array(
			//'model'=>$this->loadModel($id),
		));
		
	}

}