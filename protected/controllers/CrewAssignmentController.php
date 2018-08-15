<?php

class CrewAssignmentController extends Controller
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
				'actions'=>array('signoff','signon'),
				'roles'=>array('CUS', 'ADM'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}



	public function actionsignoff()
		{
			if(Yii::app()->request->getIsAjaxRequest())
			 {
	          echo $this->renderPartial('signoff',true,true);//This will bring out the view along with its script.
	          }

			else 
			$this->redirect(array('cre/signoff'));
			//'arrayDataProvider'=>$arrayDataProvider,
			
			
		}

	public function actionsignon()
		{
			if(Yii::app()->request->getIsAjaxRequest())
			 {
	          echo $this->renderPartial('signon',true,true);//This will bring out the view along with its script.
	          }

			else 
			$this->redirect(array('cre/signon'));
			//'arrayDataProvider'=>$arrayDataProvider,
			
			
		}

	}
