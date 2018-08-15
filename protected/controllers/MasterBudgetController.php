<?php
class MasterBudgetController extends Controller
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
				'actions'=>array('budget','masterbudget', 
					'outlook', 'masteroutlook'
				),
				'roles'=>array('ADM', 'FIC'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionBudget($year=0)
	{
		if(isset($_GET['yt0'])){
			$year=isset($_GET['Year']) ? $_GET['Year'] : 0 ;
			$this->redirect(array('budget','year'=>$year));
		}
	
		$arrayDataProvider = null;
		if($year > 0) {
			$rawData=array();
		
			for ($i = 1; $i <= 12 ; $i++){
				$monthFormated=sprintf("%02s",$i);
				$rawData[]=array('id'=>$i, 'Month'=>Yii::app()->dateFormatter->format("MMMM",strtotime($year.'-'.$monthFormated.'-01')), 'Year'=>$year);
			}
			
			// or using: $rawData=User::model()->findAll();
			$arrayDataProvider=new CArrayDataProvider($rawData, array(
				'id'=>'id',
				/* 'sort'=>array(
					'attributes'=>array(
						'username', 'email',
					),
				), */
				'pagination'=>array(
					'pageSize'=>12,
				),
			));
		}
	
		$this->render('budget',array(
			'year'=>$year,
			'arrayDataProvider'=>$arrayDataProvider,
		));
	}

	public function actionMasterbudget($year=0)
	{	
		$this->render('masterbudget',array(
			//'year'=>$year,
			//'arrayDataProvider'=>$arrayDataProvider,
			'year' =>$year
		));
	}
	
	public function actionOutlook($year=0, $outlook=0)
	{
		if(isset($_GET['yt0'])){
			$year=isset($_GET['Year']) ? $_GET['Year'] : 0 ;
			$outlook=isset($_GET['outlook']) ? $_GET['outlook'] : 1 ;
			$this->redirect(array('outlook','year'=>$year, 'outlook'=>$outlook));
		}
	
		$arrayDataProvider = null;
		if($year > 0) {
			$rawData=array();
		
			for ($i = 1; $i <= 12 ; $i++){
				$monthFormated=sprintf("%02s",$i);
				$rawData[]=array('id'=>$i, 'Month'=>Yii::app()->dateFormatter->format("MMMM",strtotime($year.'-'.$monthFormated.'-01')), 'Year'=>$year, 'outlook'=>$outlook);
			}
			
			// or using: $rawData=User::model()->findAll();
			$arrayDataProvider=new CArrayDataProvider($rawData, array(
				'id'=>'id',
				/* 'sort'=>array(
					'attributes'=>array(
						'username', 'email',
					),
				), */
				'pagination'=>array(
					'pageSize'=>12,
				),
			));
		}
	
		$this->render('outlook',array(
			'year'=>$year,
			'outlook'=>$outlook,
			'arrayDataProvider'=>$arrayDataProvider,
		));
	}
	
	public function actionMasteroutlook($year=0, $outlook=1)
	{	
		$this->render('masteroutlook',array(
			//'year'=>$year,
			//'arrayDataProvider'=>$arrayDataProvider,
			'year' =>$year,
			'outlook'=>$outlook,
		));
	}
}
