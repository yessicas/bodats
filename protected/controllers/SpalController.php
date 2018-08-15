<?php

class SpalController extends Controller
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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
			'actions'=>array('admin' , 'adminnonquo' ,'delete','update','view','create','index','report','viewreport'),
			'roles'=>array('ADM','MKT'),
		),

		array('deny',  // deny all users
			//'roles'=>array('CUS','FIC','CRW','NAU','OPR'),
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
		$modelquo=$this->loadModelquo($id);


		if(isset($_GET['print'])){
			$this->redirect(array('report','id'=>$modelquo->id_quotation,'route'=>$_GET['route']));
		}
		if(isset($_GET['report'])){
			$this->redirect(array('viewreport','id'=>$modelquo->id_quotation,'route'=>$_GET['route']));
		}

		$this->render('view',array(
		'model'=>$this->loadModelbyattquo($id),
		'modelquo'=>$modelquo,
		));
	}

	public function actionReport($id)
	{
		$this->layout='//layouts/laporan';
		$modelquo=$this->loadModelquo($id);

		$mPDF1 = Yii::app()->ePdf->mpdf();
			  $mPDF1 = Yii::app()->ePdf->mpdf('c', 'A4');
			  $mPDF1 = Yii::app()->ePdf->mpdf('',    // mode - default ''
				 '',    // format - A4, for example, default ''
				 0,     // font size - default 0
				 '',    // default font family
				 15,    // margin_left
				 15,    // margin right
				 15,     // margin top
				 16,    // margin bottom
				 9,     // margin header
				 9,     // margin footer
				 'L');  // L - landscape, P - portrait
			  //$mPDF1->SetHTMLHeader("<hr>");
			  //$mPDF1->SetHTMLHeader('header');
			  //$mPDF1->SetDisplayMode('fullpage');
			  //$mPDF1->Output();

		$mPDF1->WriteHTML(
		$this->render('report',array(
		'model'=>$this->loadModelbyattquo($id),
		'modelquo'=>$modelquo,
		),true)
			);

		$mPDF1->Output();
	}


	public function actionViewreport($id)
	{
		$this->layout='//layouts/laporan';
		$modelquo=$this->loadModelquo($id);

		$this->render('report',array(
			'model'=>$this->loadModelbyattquo($id),
			'modelquo'=>$modelquo,
		));
	}

	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionCreate($id)
	{
		$model=new Spal;
		$modelquo=$this->loadModelquo($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Spal']))
		{
			$model->attributes=$_POST['Spal'];

			$model->id_quotation=$id;
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

			if($model->save()){

				// insert nomornya
				$updateModel=Spal::model()->findByPK($model->id_spal);
				$dataformatnumber=NumberingDocumentDBSPAL::getFormatNumber($model,'id_spal','SpalNo','SpalMonth','SpalYear',$model->id_spal);
				$updateModel->SpalNumber = $dataformatnumber['NumberFormat'] ; 
				$updateModel->SpalNo = $dataformatnumber['NoOrder']; 
				$updateModel->SpalMonth = NumberingDocumentDBSPAL::getMonthNow() ; 
				$updateModel->SpalYear =  NumberingDocumentDBSPAL::getYearNow() ; 
				$updateModel->save(false);
			

				$modelquoupdate=$this->loadModelquo($model->id_quotation);
				$modelquoupdate->spal_created=1;
				$modelquoupdate->save(false);

				Yii::app()->user->setFlash('success', "New SPAL has saved.");

				if($modelquoupdate->IsSingleRoute==1){
					$this->redirect(array('view','id'=>$model->id_quotation));	
				}else{
					$this->redirect(array('view','id'=>$model->id_quotation,'route'=>$_POST['route']));	
				}

				
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'modelquo'=>$modelquo,
		));
	}

	/**
	* Updates a particular model.
	* If update is successful, the browser will be redirected to the 'view' page.
	* @param integer $id the ID of the model to be updated
	*/
	public function actionUpdate($id)
	{
		$model=$this->loadModelbyattquo($id);
		$modelquo=$this->loadModelquo($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Spal']))
		{
			$model->attributes=$_POST['Spal'];
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
			if($model->save())
			{
				$modelquoupdate=$this->loadModelquo($model->id_quotation);
				$modelquoupdate->spal_created=1;
				$modelquoupdate->save(false);

				Yii::app()->user->setFlash('success', " Data Updated");
				if($modelquoupdate->IsSingleRoute==1){
					$this->redirect(array('view','id'=>$model->id_quotation));	
				}else{
					$this->redirect(array('view','id'=>$model->id_quotation,'route'=>$_POST['route']));	
				}
			}
		}

		$this->render('update',array(
		'model'=>$model,
		'modelquo'=>$modelquo,
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
		$dataProvider=new CActiveDataProvider('Spal');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new Spal('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Spal']))
			$model->attributes=$_GET['Spal'];

		$quo=new Quotation('search');
		$quo->unsetAttributes();  // clear any default values

		if(isset($_GET['Quotation'])){
			$quo->attributes=$_GET['Quotation'];
		}else{
			$quo->Status='QUOTATION';
		}	
		
		$this->render('admin',array(
		'model'=>$model,
		'quo'=>$quo,
		));
	}


	public function actionAdminnonquo()
	{
		$model=new Spal('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Spal']))
			$model->attributes=$_GET['Spal'];

		$quo=new Quotation('searchonspalwithoutquotation');
		$quo->unsetAttributes();  // clear any default values

		if(isset($_GET['Quotation'])){
			$quo->attributes=$_GET['Quotation'];
		}else{
			$quo->Status='QUOTATION';
		}	
		
		$this->render('adminnonquo',array(
		'model'=>$model,
		'quo'=>$quo,
		));
	}

	/**
	* Returns the data model based on the primary key given in the GET variable.
	* If the data model is not found, an HTTP exception will be raised.
	* @param integer the ID of the model to be loaded
	*/
	public function loadModel($id)
	{
		$model=Spal::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelbyattquo($id)
	{
		$model=Spal::model()->findByAttributes(array('id_quotation'=>$id));
		if($model===null)
		throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelquo($id)
	{
		$model=Quotation::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='spal-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
