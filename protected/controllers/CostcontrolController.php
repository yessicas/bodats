<?php

class CostcontrolController extends Controller
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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('generatestandardcost', 'adminvo'),
				'roles'=>array('ADM', 'CCT'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionGeneratestandardcost($id)
	{
		$this->render('generatestandardcost',array(
			'id_voyage_order'=>$id,
		));
	}
	
	public function actionAdminvo()
	{
		$model=new VoyageOrder('');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VoyageOrder']))
			$model->attributes=$_GET['VoyageOrder'];

		$model->status = "VO SAILING";	
			
		$this->render('adminvo',array(
			'model'=>$model,
		));
	}
	
}
