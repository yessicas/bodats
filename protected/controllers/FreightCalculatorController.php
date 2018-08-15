<?php

class FreightCalculatorController extends Controller
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
				'actions'=>array('checkFreightCost', 'result'),
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
	public function actionCheckFreightCost()
	{
		$this->render('check',array(
			//'model'=>$this->loadModel($id),
		));
		
	}

	public function actionresult()
	{
		if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('resultsales');//This will bring out the view along with its script.
          }

		else 
		$this->render('../freightcalculator/resultsales',array(
		//'arrayDataProvider'=>$arrayDataProvider,
		));
		
	}

}
