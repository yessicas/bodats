<?php

class CustomerzoneController extends Controller
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
			//Ini untuk Order Tracking
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('customerordertracking', 'reservationinquiry'),
				'roles'=>array('ADM', 'CUS'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionCustomerordertracking()
	{
		$this->layout='//layouts/column2';
		$model=new VoyageOrder('searchbycustomer');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VoyageOrder']))
			$model->attributes=$_GET['VoyageOrder'];
		
		$userid=Yii::app()->user->id;
		$customer = CustomerUsersDB::getCompanyFromUser($userid);
		
		//$model->Quotation->id_customer = 1;
		//if(!empty($customer))
		//	$model->Quotation->id_customer = $customer->id_customer;
			
		$this->render('customerordertracking',array(
			'model'=>$model,
			'customer'=>$customer,
		));
	}
}
