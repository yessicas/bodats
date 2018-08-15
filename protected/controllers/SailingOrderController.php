<?php

class SailingOrderController extends Controller
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
			/*
			array('allow',  // allow all users to perform 'index' and 'view' actions
			'actions'=>array('index','view'),
			'users'=>array('*'),
			),
			*/
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','index','view'),
				//'users'=>array('@'),
				'roles'=>array('ADM','NAU','SOA'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','report','viewreport',),
				//'users'=>array('@'),
				'roles'=>array('ADM','NAU','SOA'),
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
		$modelvoyage=$this->loadModelvoyage($id);
		$this->render('view',array(
			'model'=>$this->loadModelbyattvoyage($id),
			'modelvoyage'=>$modelvoyage,
		));
	}

	public function actionReport($id)
	{
		$this->layout='//layouts/laporan';
		$modelvoyage=$this->loadModelvoyage($id);

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
		  //$mPDF1->SetHTMLHeader('<img src ="'.Yii::app()->request->baseUrl.'/images/layout/logotop.png">');
		  //$mPDF1->SetDisplayMode('fullpage');
		  //$mPDF1->Output();

		$mPDF1->WriteHTML(
		$this->render('report',array(
		'model'=>$this->loadModelbyattvoyage($id),
		'modelvoyage'=>$modelvoyage,
		),true)
			);

		$mPDF1->Output();
	}


	public function actionViewreport($id)
	{
		$this->layout='//layouts/laporan';
		$modelvoyage=$this->loadModelvoyage($id);
		$this->render('report',array(
			'model'=>$this->loadModelbyattvoyage($id),
			'modelvoyage'=>$modelvoyage,
		));
	}


	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionCreate($id)
	{
		$model=new SailingOrder;
		$modelvoyage=$this->loadModelvoyage($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SailingOrder']))
		{
			$model->attributes=$_POST['SailingOrder'];
			$model->id_voyage_order=$id;
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
			$model->SailingOrderStatus='VO SAILING';

			if($model->save()){
				// insert nomornya
				$updateModel=SailingOrder::model()->findByPK($model->id_sailing_order);
				$dataformatnumber=NumberingDocumentDBSailingOrder::getFormatNumber($model,'id_sailing_order','SailingOrderNo','SailingOrderMonth','SailingOrderYear',$model->id_sailing_order);
				$updateModel->SailingOrderNumber = $dataformatnumber['NumberFormat']; 
				$updateModel->SailingOrderNo = $dataformatnumber['NoOrder']; 
				$updateModel->SailingOrderMonth = NumberingDocumentDBSailingOrder::getMonthNow(); 
				$updateModel->SailingOrderYear = NumberingDocumentDBSailingOrder::getYearNow(); 
				$updateModel->save(false);


				$modelvoyageorder=$this->loadModelvoyage($model->id_voyage_order);
				$modelvoyageorder->ActualStartDate=$model->StartDate;
				$modelvoyageorder->status='VO SAILING';
				$modelvoyageorder->save(false);

				$quoupdate=Quotation::model()->findByPk($modelvoyageorder->id_quotation);;
				$quoupdate->Status='VO SAILING';
				$quoupdate->save(false);

				Yii::app()->user->setFlash('success', " Data Saved");
				$this->redirect(array('view','id'=>$model->id_voyage_order));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'modelvoyage'=>$modelvoyage,
		));
	}

	/**
	* Updates a particular model.
	* If update is successful, the browser will be redirected to the 'view' page.
	* @param integer $id the ID of the model to be updated
	*/
	public function actionUpdate($id)
	{
		//$model=$this->loadModel($id);
		$model=$this->loadModelbyattvoyage($id);
		$modelvoyage=$this->loadModelvoyage($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SailingOrder']))
		{
			$model->attributes=$_POST['SailingOrder'];

			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

			if($model->save())
			{
				$modelvoyage->ActualStartDate=$model->StartDate;
				$modelvoyage->save(false);
			
				Yii::app()->user->setFlash('success', " Data Updated");
				$this->redirect(array('view','id'=>$model->id_voyage_order));
			}
		}

		$this->render('update',array(
		'model'=>$model,
		'modelvoyage'=>$modelvoyage,
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
		$dataProvider=new CActiveDataProvider('SailingOrder');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new SailingOrder('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SailingOrder']))
			$model->attributes=$_GET['SailingOrder'];

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
		$model=SailingOrder::model()->findByPk($id);
		if($model===null)
		throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	public function loadModelvoyage($id)
	{
		$model=VoyageOrder::model()->findByPk($id);
		if($model===null)
		throw new CHttpException(404,"Voyage order related doesn't exist");
		return $model;
	}

	public function loadModelbyattvoyage($id)
	{
		$model=SailingOrder::model()->findByAttributes(array('id_voyage_order'=>$id));
		if($model===null)
		throw new CHttpException(404,"Sailing order related doesn't exist.");
		return $model;
	}

	/**
	* Performs the AJAX validation.
	* @param CModel the model to be validated
	*/
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sailing-order-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
