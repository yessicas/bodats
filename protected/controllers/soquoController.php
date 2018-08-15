<?php

class soquoController extends Controller
{
	public $layout='//layouts/triplets';

	public function filters()
	{
	return array(
		'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
			'actions'=>array(''),
			'roles'=>array('ADM','MKT'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
			'actions'=>array('result','caculat'),
			'roles'=>array('ADM','MKT','CUS'),
			),

			array('deny',  // deny all users
			'roles'=>array('CUS','OPR','FIC','CRW','NAU'),
			'users'=>array('*'),
			),
		);
	}

	public function actionQuo()
	{
		$model=new Quotation('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Quotation'])){
			$model->attributes=$_GET['Quotation'];	
		}else{
			$model->Status='QUOTATION';
		}


		$this->render('../soquo/admin',array(
		'model'=>$model,
		));
	}

	public function actionQuoupdate($id)
	{
		$model=$this->loadModel($id,'Quotation');
		$model->Scenario='step1so';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Quotation']))
		{
		$model->attributes=$_POST['Quotation'];

		/* // di hilangkan dulu blok nya 
		if ($_POST['Quotation']['id_bussiness_type_order']!='100'  && $_POST['Quotation']['id_bussiness_type_order']!='200'  && $_POST['Quotation']['id_bussiness_type_order']!='300'){ // diblock dulu 
		Yii::app()->user->setFlash('success', "Maaf Belum Bisa Mengurai Form untuk Type Selain Barging, Transhipment  dan Time Charter");
		$this->redirect(array('quo'));
		}
		*/

		if ($_POST['Quotation']['customername'] <>''){
						$costumer=Customer::model()->findByAttributes(array('CompanyName'=>$_POST['Quotation']['customername'],'id_customer'=>$_POST['Quotation']['id_customer']));
						if($costumer===null){
						$model->addError('customername', 'Costumer Tidak terdaftar!');
							}

						if($costumer==true){
						$model->addError('customername', 'Costumer Tidak terdaftar!');
							
						$model->created_date=date("Y-m-d H:i:s");
						$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

						if($model->save())
						{
						//Yii::app()->user->setFlash('success', " Data Updated");
						if($model->id_bussiness_type_order==100){
							$this->redirect(array('quocreate2','id'=>$model->id_quotation)); // redirect ke form barging
							}	
						if($model->id_bussiness_type_order==200){
							$this->redirect(array('quocreate2','id'=>$model->id_quotation)); // redirect ke form Transipment
							}	
						if($model->id_bussiness_type_order==250){
							$this->redirect(array('quocreate2','id'=>$model->id_quotation)); // redirect ke form Transipment biasa
							}
						if($model->id_bussiness_type_order==300){
							$this->redirect(array('quocreate2TC','id'=>$model->id_quotation)); // redirect ke form Time Charter
							}

						// sementara type yang lain di redirect ke barging
								if($model->id_bussiness_type_order==400){
									$this->redirect(array('quocreate2','id'=>$model->id_quotation)); // sementara redirect ke form barging
									}
								if($model->id_bussiness_type_order==500){
									$this->redirect(array('quocreate2','id'=>$model->id_quotation)); // sementara ke form barging
									}
								if($model->id_bussiness_type_order==600){
									$this->redirect(array('quocreate2','id'=>$model->id_quotation)); // sementara ke form barging
									}
						// end sementara type yang lain di redirect ke barging


						}
						}

		}


		}


		if(Yii::app()->request->getIsAjaxRequest())
		{
				  echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
				  }

		else 
		$this->render('../soquo/update',array(
		'model'=>$model,
		));
	}

	public function actionQuocreate()
	{
		$model=new Quotation;
		$model->Scenario='step1so';	

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Quotation']))
		{
			$model->attributes=$_POST['Quotation'];

			/* // di hilangkan dulu blok nya 
			if ($_POST['Quotation']['id_bussiness_type_order']!='100'  && $_POST['Quotation']['id_bussiness_type_order']!='200'  && $_POST['Quotation']['id_bussiness_type_order']!='300'){ // diblock dulu 
			Yii::app()->user->setFlash('success', "Maaf Belum Bisa Mengurai Form untuk Type Selain Barging, Transhipment  dan Time Charter");
			$this->redirect(array('quo'));
			}
			*/

			if ($_POST['Quotation']['customername'] <>''){
				$costumer=Customer::model()->findByAttributes(array('CompanyName'=>$_POST['Quotation']['customername'],'id_customer'=>$_POST['Quotation']['id_customer']));
				if($costumer===null){
					$model->addError('customername', 'Costumer Tidak terdaftar!');
				}

				if($costumer==true){
					$model->addError('customername', 'Costumer Tidak terdaftar!');
						
					$model->created_date=date("Y-m-d H:i:s");
					$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
					$model->Status='QUOTATION';
				

					if($model->save()){
						//Yii::app()->user->setFlash('success', " Data Saved");
						if($model->id_bussiness_type_order==100){
							$this->redirect(array('quocreate2','id'=>$model->id_quotation)); // redirect ke form barging
						}	
						if($model->id_bussiness_type_order==200){
							$this->redirect(array('quocreate2','id'=>$model->id_quotation)); // redirect ke form Transipment
						}	
						if($model->id_bussiness_type_order==250){
							$this->redirect(array('quocreate2','id'=>$model->id_quotation)); // redirect ke form Transipment biasa
						}
						if($model->id_bussiness_type_order==300){
							$this->redirect(array('quocreate2TC','id'=>$model->id_quotation)); // redirect ke form Time Charter
						}

						// sementara type yang lain di redirect ke barging
						if($model->id_bussiness_type_order==400){
							$this->redirect(array('quocreate2','id'=>$model->id_quotation)); // sementara redirect ke form barging
						}
						if($model->id_bussiness_type_order==500){
							$this->redirect(array('quocreate2','id'=>$model->id_quotation)); // sementara ke form barging
						}
						if($model->id_bussiness_type_order==600){
							$this->redirect(array('quocreate2','id'=>$model->id_quotation)); // sementara ke form barging
						}
						// end sementara type yang lain di redirect ke barging
					}
				}
			}
		}
		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
		}

		else 
		$this->render('../soquo/create',array(
		'model'=>$model,
		));
	}


	public function actionQuocreate2($id) // barging & transhipment
	{
		$model=$this->loadModel($id,'Quotation');

		if($model->LoadingDate=='0000-00-00'){
			$model->unsetAttributes(array('LoadingDate'));
		}

		if($model->TotalQuantity=='0.0000'){
			$model->unsetAttributes(array('TotalQuantity'));
		}

		if($model->id_bussiness_type_order==100){
			$model->Scenario='step2'; // barging 
		}	
		if($model->id_bussiness_type_order==200){
		$model->Scenario='step2TR'; // Transhipment 
		}	

		if($model->id_bussiness_type_order==250){
			$model->Scenario='step2TRANS'; // Transhipment biasa
		}	


		// ---------
		if($model->id_bussiness_type_order==300){
			$model->Scenario='step2'; // barging 
		}	

		if($model->id_bussiness_type_order==400){
			$model->Scenario='step2'; // barging 
		}	

		if($model->id_bussiness_type_order==500){
			$model->Scenario='step2'; // barging 
		}	
		//--------------
		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Quotation']))
		{
			$model->attributes=$_POST['Quotation'];		
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

					if($model->save())
					{
						if ($model->IsSingleRoute==0){
							//Yii::app()->user->setFlash('success', " Data Updated");
							if(isset($_GET['inso'])){
							Yii::app()->user->setFlash('success', " Data Updated");
								 if($_GET['sostat']=='create'){
									  $this->redirect(array('so/create','idquo'=>$model->id_quotation));
								 }else{
									   $this->redirect(array('so/update','id'=>$_GET['soid']));
								 }
							}else{
							//$this->redirect(array('so/create','idquo'=>$model->id_quotation));  
							$this->redirect(array('so/addSalesPlan','idquo'=>$model->id_quotation));
							}
							
						}
						if ($model->IsSingleRoute==1){

							// transhipment biasa
							if ($model->Scenario=='step2TRANS'){
								$this->redirect(array('so/addSalesPlan','idquo'=>$model->id_quotation));  
							}

							
							$detailexist=QuotationDetailVessel::model()->findAllByAttributes(array('id_quotation'=>$model->id_quotation));
							$totaldata=count($detailexist);

							if($totaldata==0) {
								$detail = new QuotationDetailVessel;
								$detail->BargeSize=$model->VesselBarge->BargeSize;
								$detail->Capacity=$model->TotalQuantity;
								$detail->BargingVesselTug=$model->BargingVesselTug;
								$detail->BargingVesselBarge=$model->BargingVesselBarge;
								$detail->StartDate=$model->LoadingDate;
								$detail->IdJettyOrigin=$model->BargingJettyIdStart;
								$detail->IdJettyDestination=$model->BargingJettyIdEnd;
								$detail->Price=$model->QuantityPrice;
								$detail->id_currency=$model->QuantityPriceCurency;

								$changerate=Currency::model()->findByPk($model->QuantityPriceCurency);
								$detail->change_rate=$changerate->change_rate;
								$detail->fuel_price=GeneralDB::getLastUpdateFuel()->fuel_price;
								$detail->id_quotation=$model->id_quotation;
								
								$detail->created_user=Yii::app()->user->id;
								$detail->created_date=date("Y-m-d H:i:s");
								$detail->ip_user_updated=$_SERVER['REMOTE_ADDR'];

								$detail->save(false);
							}else{

								 QuotationDetailVessel::model()->deleteAll(array(
								   'condition' => 'id_quotation = :id_quotation',
								   'params' => array(
									   ':id_quotation' =>$model->id_quotation,
								   ),
								));

								$detail = new QuotationDetailVessel;
								$detail->BargeSize=$model->VesselBarge->BargeSize;
								$detail->Capacity=$model->TotalQuantity;
								$detail->BargingVesselTug=$model->BargingVesselTug;
								$detail->BargingVesselBarge=$model->BargingVesselBarge;
								$detail->StartDate=$model->LoadingDate;
								$detail->IdJettyOrigin=$model->BargingJettyIdStart;
								$detail->IdJettyDestination=$model->BargingJettyIdEnd;
								$detail->Price=$model->QuantityPrice;
								$detail->id_currency=$model->QuantityPriceCurency;

								$changerate=Currency::model()->findByPk($model->QuantityPriceCurency);
								$detail->change_rate=$changerate->change_rate;
								$detail->fuel_price=GeneralDB::getLastUpdateFuel()->fuel_price;
								$detail->id_quotation=$model->id_quotation;
								
								$detail->created_user=Yii::app()->user->id;
								$detail->created_date=date("Y-m-d H:i:s");
								$detail->ip_user_updated=$_SERVER['REMOTE_ADDR'];

								$detail->save(false);


							}




							//Yii::app()->user->setFlash('success', " Data Updated");
							if(isset($_GET['inso'])){
							Yii::app()->user->setFlash('success', " Data Updated");
								 if($_GET['sostat']=='create'){
									  $this->redirect(array('so/create','idquo'=>$model->id_quotation));
								 }else{
									   $this->redirect(array('so/update','id'=>$_GET['soid']));
								 }
							}else{
							//$this->redirect(array('so/create','idquo'=>$model->id_quotation)); 
							$this->redirect(array('so/addSalesPlan','idquo'=>$model->id_quotation));
							}
							
						}

					}
					

		}


		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('../soquo/_form2_on_so',array('model'=>$model),true,true);//This will bring out the view along with its script.
		}

		else 
		$this->render('../soquo/create2',array(
		'model'=>$model,
		));
	}


	public function actionquocreate2TC($id) // Time Charter 
	{	
		$model=$this->loadModel($id,'Quotation');
		if($model->TCStartDate=='0000-00-00'||$model->TCEndDate=='0000-00-00'){
			$model->unsetAttributes(array('TCStartDate','TCEndDate'));
		}

		if($model->TCPrice=='0.00'){
			$model->unsetAttributes(array('TCPrice'));
		}
			
		$model->Scenario='step2TC'; // Time Charter 	

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Quotation']))
		{
			$model->attributes=$_POST['Quotation'];
			
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

			if($model->save())
			{
				//Yii::app()->user->setFlash('success', " Data Updated");
				//$this->redirect(array('so/create','idquo'=>$model->id_quotation));
				$this->redirect(array('so/addSalesPlan','idquo'=>$model->id_quotation));
			}
						

		}
		$this->render('../soquo/create2TC',array(
		'model'=>$model,
		));
	}

	public function actionquoview($id)
	{
		if(Yii::app()->request->getIsAjaxRequest())
		{
		echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
		}

		else 
		$this->render('../soquo/view',array(
		'model'=>$this->loadModel($id,'Quotation'),
		));
	}


	public function actionorder()
	{
		$model=new ShippingOrder('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ShippingOrder']))
		$model->attributes=$_GET['ShippingOrder'];	
		$this->render('../shippingorder/admin',array(
		'model'=>$model,
		));
	}

	public function actionorderupdate($id)
	{
		$model=$this->loadModel($id,'ShippingOrder');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ShippingOrder']))
		{
			$model->attributes=$_POST['ShippingOrder'];
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
			if($model->save())
			{
				Yii::app()->user->setFlash('success', " Data Updated");
				$this->redirect(array('order','id'=>$model->id_shipping_order));
			}
		}
		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
		}

		else 
		$this->render('../shippingorder/update',array(
		'model'=>$model,
		));
	}

	public function actionordercreate()
	{
		$model=new ShippingOrder;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ShippingOrder']))
		{
			$model->attributes=$_POST['ShippingOrder'];
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
			$model->SO_Status='OPEN';
			if($model->save()){
				Yii::app()->user->setFlash('success', " Data Saved");
				$this->redirect(array('order','id'=>$model->id_shipping_order));
			}
		}
		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
		}

		else 
		$this->render('../shippingorder/create',array(
		'model'=>$model,
		));
	}

	public function actionorderview($id)
	{
		if(Yii::app()->request->getIsAjaxRequest())
		{
		echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
		}

		else 
		$this->render('../shippingorder/view',array(
		'model'=>$this->loadModel($id,'ShippingOrder'),
		));
	}


	public function actionrfvend()
	{
		$model=new RfqVendor('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RfqVendor']))
		$model->attributes=$_GET['RfqVendor'];	
		$this->render('../rfqvendor/admin',array(
		'model'=>$model,
		));
	}

	public function actioncaculat()
	{
		$this->render('../freightcalculator/check',array(
			//'model'=>$this->loadModel($id),
		));
		
	}

	public function actionresult()
	{
		$this->render('../freightcalculator/result',array(
			//'model'=>$this->loadModel($id),
		));
		
	}

	public function actionrating()
	{
		$this->render('../customerrating/rating',array(
			//'model'=>$this->loadModel($id),
		));
		
	}

	public function actionpilihan()
	{
		if ($_POST['Ratingby']=='VolumeOrder')
		{
			$this->redirect(array('demand/ratingvol'));
		}

		else
		{

			$this->redirect(array('demand/ratingpay'));
		}
	}

	public function actionRatingVol()
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
			
			$this->render('../customerrating/ratingvolume',array(
			'arrayDataProvider'=>$arrayDataProvider,
		));
		}
	}


	public function actionRatingPay()
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

			$this->render('../customerrating/ratingpayment',array(
				'arrayDataProvider'=>$arrayDataProvider,
			));
			
		}
	}


	public function actionsalesplan()
	{
		$this->render('../salesplan/plan',array(
		
		));
	}
			
	public function loadModel($id,$modelname)
	{
		$model=$modelname::model()->findByPk($id);
		if($model===null)
		throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

}
