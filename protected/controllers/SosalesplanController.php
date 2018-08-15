<?php

class SosalesplanController extends Controller
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
			'actions'=>array('createsoauto', 'viewsoauto', 'deleteso'),
			'roles'=>array('ADM','MKT'),
			),
			array('deny',  // deny all users
			//'roles'=>array('CUS','FIC','CRW','NAU','OPR'),
			'users'=>array('*'),
			),
		);
	}

	public function actionCreatesoauto($id, $is_mode, $mode, $is_edit="false", $id_so=0)
	{
		$model=new Quotation();
		$modelSo=new So;
		
		if($is_edit == "true"){
			$modelSo = So::model()->findByPk($id_so);
			if($modelSo == null){
				throw new CHttpException(404,'Shipping order ('.$id_so.') does not exist.');
			}else{
				$model = Quotation::model()->findByPk($modelSo->id_quotation);
			}
		}
		
		$modelnameSalesPlan = SalesPlanDB::selectModel($is_mode);
		$modelSalesPlan = $this->loadModelGeneral($id,$modelnameSalesPlan);

		if(isset($_POST['Quotation']))
		{
			$model->attributes=$_POST['Quotation'];	
			$POSTDATA = $_POST['Quotation'];	
			if(isset( $POSTDATA['LoadingDate'])){
				$LoadingDate = $POSTDATA['LoadingDate'];
			}else{
				$LoadingDate = "";
			}
			
			//Simpan Quotation & Quotation Detail
			$modelQuotation = IntegratedSoSalesPlanDB::generateQuotationSingleRoute($id, $is_mode, $LoadingDate);
			if($modelQuotation != null){
				$modelQuotation = IntegratedSoSalesPlanDB::saveDetailSOQuotation($modelQuotation, $POSTDATA);
			}
			
			//Simpan untuk Shipping Order
			$modelSo->attributes=$_POST['So'];
			$POSTDATA_SO = $_POST['So'];	
			$modelShippingOrder = IntegratedSoSalesPlanDB::saveShippingOrder($modelQuotation, $modelSo, $modelSalesPlan, $POSTDATA_SO);

			//Yii::app()->user->setFlash('success', " Data Updated");

			Yii::app()->user->setFlash('success', "Shipping Order has ben created");
			$this->redirect(array('viewsoauto','id'=>$modelShippingOrder->id_so));
		}


		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('createsoauto',array(
				'model'=>$model,
				'modelSalesPlan'=>$modelSalesPlan,
				'modelSo'=>$modelSo,
				),true,true);//This will bring out the view along with its script.
		}

		else 
			$this->render('createsoauto',array(
				'model'=>$model,
				'modelSalesPlan'=>$modelSalesPlan,
				'modelSo'=>$modelSo,
		));
	}
	
	public function actionViewsoauto($id)
	{
		$modelSo = $this->loadModel($id);
		
		$modelSalesPlan = SalesPlanMonth::model()->findByPk($modelSo->id_sales_plan);
		if($modelSalesPlan == null){
			throw new CHttpException(404,'Sales Plan ('.$modelSo->id_sales_plan.') to the Shipping order related ('.$id.') does not exist.');
		}
		
		$modelQuotation = Quotation::model()->findByPk($modelSo->id_quotation);
		if($modelSalesPlan == null){
			throw new CHttpException(404,'Quotation ('.$modelSo->id_quotation.') to the Shipping order related ('.$id.') does not exist.');
		}
		
		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('viewsoauto',array(
				'modelSo'=>$modelSo,
				'modelSalesPlan'=>$modelSalesPlan,
				'modelQuotation'=>$modelQuotation,
				),true,true);//This will bring out the view along with its script.
		}else{
			$this->render('viewsoauto',array(
				'modelSo'=>$modelSo,
				'modelSalesPlan'=>$modelSalesPlan,
				'modelQuotation'=>$modelQuotation,
			));
		}
	}
	
	public function actionDeleteso($id,$is_mode, $month, $year, $mode)
	{
		$modelSo = $this->loadModel($id);
		
		$id_quotation = $modelSo->id_quotation;
		$modelQuotation = Quotation::model()->findByPk($modelSo->id_quotation);
		if($modelQuotation != null){
			//echo 'deleteQuo'.$modelQuotation->id_quotation;
			$modelQuotationDetail = QuotationDetailVessel::model()->findByAttributes(array("id_quotation"=>$modelQuotation->id_quotation));
			if($modelQuotation != null){
				//echo 'deleteQuoDetail'.$modelQuotationDetail->id_quotation_detail;
				$modelQuotationDetail->delete();
			}
			$modelQuotation->delete();
		}
		$modelSo->delete();
		
		Yii::app()->user->setFlash('success', "Delete Shipping Order succes!");
		$this->redirect(array('demand/salesplan','is_mode'=>$is_mode, 'month'=>$month, 'year'=>$year, 'mode'=>$mode));
	}


	/**
	* Returns the data model based on the primary key given in the GET variable.
	* If the data model is not found, an HTTP exception will be raised.
	* @param integer the ID of the model to be loaded
	*/
	public function loadModel($id)
	{
		$model=So::model()->findByPk($id);
		if($model===null)
		throw new CHttpException(404,'Shipping order related ('.$id.') does not exist.');
		return $model;
	}

	public function loadModelquo($idquo)
	{
		$model=Quotation::model()->findByPk($idquo);
		if($model===null)
		throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function loadModelGeneral($id,$modelname)
	{
		$model=$modelname::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='so-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
