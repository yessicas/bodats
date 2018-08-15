<?php

class NumberingFakturAllocationController extends Controller
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
				'actions'=>array('admin','delete','update','view','create'),
				'roles'=>array('ADM', 'MKT', 'FIC'),
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
		$model=new NumberingFakturAllocation;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['NumberingFakturAllocation']))
		{
			$model->attributes=$_POST['NumberingFakturAllocation'];
			
			//Mengecek terlebih dahulu jumlah panjang data nomor faktur awal dan akhir
			$errorNumbering = FakturNumbering::comparingLengthNumber($model->first_number, $model->last_number);
			if($errorNumbering != ""){ 
				Yii::app()->user->setFlash('error', $errorNumbering);
				$this->render('create',array(
					'model'=>$model,
				));
				break;
			}
			
			//Mengecek bila nilainya sama
			if($model->first_number == $model->last_number){ 
				Yii::app()->user->setFlash('error', 'The first number ('.$model->first_number.') is same with end number ('.$model->last_number.'). Please check it again!');
				$this->render('create',array(
					'model'=>$model,
				));
				break;
			}
			
			$model->prefix_number = FakturNumbering::getFirstPrefix($model->first_number, $model->last_number);
			$model->first_number_int = FakturNumbering::getLastNumber($model->first_number, $model->prefix_number)*1;
			$model->last_number_int = FakturNumbering::getLastNumber($model->last_number, $model->prefix_number)*1;
			$default_length = strlen($model->first_number);
			
			//Mengeck apakah lebih besar atau lebih kecil
			if($model->first_number_int  > $model->last_number_int){
				Yii::app()->user->setFlash('error', 'The first number ('.$model->first_number.') is greater than the end number ('.$model->last_number.'). Please check it again!');
				$this->render('create',array(
					'model'=>$model,
				));
				break;
			}
			
			$model = LogRegister::setUserCreated2($model);
			
			if($model->save()){
				if($model->is_active == 1){
					FakturNumbering::setAllInActive();
					$model->is_active = 1;
					$model->save(false);
				}
				FakturNumbering::saveAllNumberingFaktur($model->first_number_int, $model->last_number_int, $model->prefix_number, $default_length, $model->id_numbering_faktur_allocation);
				$this->redirect(array('view','id'=>$model->id_numbering_faktur_allocation));
				
			}
		}

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

		if(isset($_POST['NumberingFakturAllocation']))
		{
			$model->attributes=$_POST['NumberingFakturAllocation'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_numbering_faktur_allocation));
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
	$dataProvider=new CActiveDataProvider('NumberingFakturAllocation');
	$this->render('index',array(
	'dataProvider'=>$dataProvider,
	));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new NumberingFakturAllocation('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['NumberingFakturAllocation']))
			$model->attributes=$_GET['NumberingFakturAllocation'];

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
	$model=NumberingFakturAllocation::model()->findByPk($id);
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
	if(isset($_POST['ajax']) && $_POST['ajax']==='numbering-faktur-allocation-form')
	{
	echo CActiveForm::validate($model);
	Yii::app()->end();
	}
	}
}
