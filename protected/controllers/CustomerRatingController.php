<?php

class CustomerRatingController extends Controller
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
				'actions'=>array('RatingVolume','RatingPayment','ratingvolpay'),
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
	public function actionRatingVolume()
	{


   $rawData=array(
		array('id'=>1, 'Customer'=>'PT.Tuah Turangga Agung', 'TotalVolume'=>'3000000','TotalOrder'=>'15'),
		array('id'=>2, 'Customer'=>'PT.Asmin Bara Bronang', 'TotalVolume'=>'3050000','TotalOrder'=>'25'),
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
		
		$this->render('ratingvolume',array(
		'arrayDataProvider'=>$arrayDataProvider,
	));
	}
		
	}
		
	public function actionRatingPayment()
	{

		$rawData=array(
		array('id'=>1, 'Customer'=>'PT.MEGA SURYA ERATAMA', 'TotalOrder'=>'15','TotalLate'=>'0','TotalOntime'=>'15'),
		array('id'=>2, 'Customer'=>'PT.MEGA SURYA ERATAMA', 'TotalOrder'=>'15','TotalLate'=>'0','TotalOntime'=>'15'),
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

		$this->render('ratingpayment',array(
			'arrayDataProvider'=>$arrayDataProvider,
		));
		
	}
	}

	public function actionratingvolpay()
	{
		$this->render('ratingvolpay',array(
			'arrayDataProvider'=>$arrayDataProvider,
		));
		
	}

}