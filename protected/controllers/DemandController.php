<?php

class DemandController extends Controller
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
				'actions'=>array('result','caculat','salescost'),
				'roles'=>array('ADM','MKT','CUS'),
			),
			
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('uploadsalesplan'),
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


		$this->render('../quotation/admin',array(
			'model'=>$model,
		));
	}

	public function actionQuoupdate($id){
			
		$model=$this->loadModel($id,'Quotation');
		$model->Scenario='step1';

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


		if(Yii::app()->request->getIsAjaxRequest()){
			echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
		}
		else 
			$this->render('../quotation/update',array(
			'model'=>$model,
			));
	}

	public function actionQuocreate()
	{
		$model=new Quotation;
		$model->Scenario='step1';	

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

							// insert nomornya
							$updateModel=Quotation::model()->findByPK($model->id_quotation);
							$dataformatnumber=NumberingDocumentDB::getFormatNumber($model,'id_quotation','NoOrder','NoMonth','NoYear',$model->id_quotation);
							$updateModel->QuotationNumber= $dataformatnumber['NumberFormat']; 
							$updateModel->NoOrder= $dataformatnumber['NoOrder']; 
							$updateModel->NoMonth = NumberingDocumentDB::getMonthNow(); 
							$updateModel->NoYear= NumberingDocumentDB::getYearNow(); 
							$updateModel->save(false);
						


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
		$this->render('../quotation/create',array(
		'model'=>$model,
		));
	}

	// barging & transhipment
	public function actionQuocreate2($id) 
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
						  $this->redirect(array('so/create','idquo'=>$model->id_quotation,'idsp'=>$_GET['idsp']));
					 }else{
						   $this->redirect(array('so/update','id'=>$_GET['soid'],'idsp'=>$_GET['idsp']));
					 }
				}else{
					$this->redirect(array('quotation/view','id'=>$model->id_quotation));  
				}
				
			}
			if ($model->IsSingleRoute==1){
			
				
				// transhipment biasa
				if ($model->Scenario=='step2TRANS'){
					$this->redirect(array('quotation/viewTRANS','id'=>$model->id_quotation));  
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
					if($changerate!=null){
						$detail->change_rate=$changerate->change_rate;
					}
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
					if($changerate!=null){
						$detail->change_rate=$changerate->change_rate;
					}
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
						  $this->redirect(array('so/create','idquo'=>$model->id_quotation,'idsp'=>$_GET['idsp']));
					 }else{
						   $this->redirect(array('so/update','id'=>$_GET['soid'],'idsp'=>$_GET['idsp']));
					 }
				}else{
					$this->redirect(array('quotation/viewfinish','id'=>$model->id_quotation)); 
				}
				
			}

		}
					

		}


		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('../quotation/_form2_on_so',array('model'=>$model),true,true);//This will bring out the view along with its script.
		}
		else 
			$this->render('../quotation/create2',array(
			'model'=>$model,
		));
	}


	public function actionQuocreate2TC($id) // Time Charter 
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
			$this->redirect(array('quotation/viewTC','id'=>$model->id_quotation));
			}
		}

		$this->render('../quotation/create2TC',array(
		'model'=>$model,
		));
	}

	public function actionQuoview($id)
	{
		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
		}

		else 
		$this->render('../quotation/view',array(
		'model'=>$this->loadModel($id,'Quotation'),
		));
	}


	public function actionOrder()
	{
		$model=new ShippingOrder('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ShippingOrder']))
		$model->attributes=$_GET['ShippingOrder'];	
		$this->render('../shippingorder/admin',array(
		'model'=>$model,
		));
	}

	public function actionOrderupdate($id)
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

	public function actionOrdercreate()
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

	public function actionOrderview($id)
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


	public function actionRfvend()
	{
		$model=new RfqVendor('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RfqVendor']))
		$model->attributes=$_GET['RfqVendor'];	
		$this->render('../rfqvendor/admin',array(
		'model'=>$model,
		));
	}


	public function actionCaculat()
	{
		$this->render('../freightcalculator/check',array(
			//'model'=>$this->loadModel($id),
		));
		
	}

	public function actionResult()
	{

		$model= new SalesCost ;

		if(isset($_POST['SalesCost']))
		{
			$model->attributes=$_POST['SalesCost'];
			$model->TotalRevenue=$_POST['SalesCost']['TotalQuantity'] * $_POST['SalesCost']['PriceUnit'];
			$changerate=Currency::model()->findByPk($_POST['SalesCost']['id_currency']);
			$model->change_rate=($changerate) ? $changerate->change_rate : 0 ;
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
			if($model->save())
				Yii::app()->user->setFlash('success', " Data Sales Cost Saved");
				$this->redirect(array('demand/caculat'));
				
		}

		$this->render('../freightcalculator/resultcalc',array(
			'model'=>$model,
		));
			
	}

	public function actionsalescost()
	{
	$model=new SalesCost('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['SalesCost']))
	$model->attributes=$_GET['SalesCost'];

	$this->render('/salescost/admin',array(
	'model'=>$model,
	));
	}

	public function actionRating()
	{
			$this->render('../customerrating/rating',array(
				//'model'=>$this->loadModel($id),
			));
			
	}

	public function actionPilihan()
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

	public function actionRatingVol(){
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


	public function actionSalesplan($is_mode="annual", $month="", $year="", $mode="")
	{
		$DEFAULT_YEAR = (Timeanddate::getCurrentYear()*1)+1;
		$DEFAULT_MONTH = '01'; //Defaultnya dimulai dari Januari
		
		if(isset($_POST['Month'])){
			
			$month = $_POST['Month'];
			$year = $DEFAULT_YEAR;
			if(isset($_POST['Year'])){
				$year = $_POST['Year'];
			}
			
			$mode = "current";
			if(isset($_POST['mode'])){
				$mode = $_POST['mode'];
			}
			
			$this->redirect(array('salesplan','is_mode'=>$is_mode, 'month'=>$month,'year'=>$year,'mode'=>$mode));
		}
		
		
		
		
		$this->layout = "twoplets";
		$this->render('../salesplan/plan',array(
			'month'=>$month,
			'year'=>$year,
			'mode'=>$mode,
			'is_mode'=>$is_mode,
		));
	}
	
	public function actionUploadsalesplan($month="", $year="")
	{
		$DEFAULT_YEAR = (Timeanddate::getCurrentYear()*1)+1;
		$DEFAULT_MONTH = '01'; //Defaultnya dimulai dari Januari
		
		if(isset($_POST['Month'])){
			
			$month = $_POST['Month'];
			$year = $DEFAULT_YEAR;
			if(isset($_POST['Year'])){
				$year = $_POST['Year'];
			}
			
			$this->redirect(array('uploadsalesplan','month'=>$month,'year'=>$year));
		}
		
		$model = new SalesPlanUpload;
		if(isset($_POST['SalesPlanUpload'])) {
			echo 'mlebu'; exit();
			$model->file='TempName';
			$model->month = $month;
			$model->year = $year;
			if($model->save()){
			
				if(strlen(trim(CUploadedFile::getInstance($model,'file'))) > 0){
					$repo ='repository/excel/upload/';
					$file=CUploadedFile::getInstance($model,'file');
					$extension=$file->extensionName; // name of extension
					$fileName=$file->name; // name of file with extensions
					$size=$file->size; // size in byte
					$type=$file->type; // type data image/jpeg
					
					$fileNameUploaded = $model->id_batch.'_'.$model->id_sessi.'.'.$extension;
					$pathtofile = $repo.$fileNameUploaded;
					
					if (file_exists($pathtofile)) {
						//echo "The file $pathtofile exists";
						unlink($pathtofile);
					} 
					
					$path=Yii::app()->basePath . '/../'.$repo.$fileNameUploaded;
					$file->saveAs($path); 	
				}
				
				//echo 'berhasil';
				Yii::app()->user->setFlash('success', "Data dari file telah terupload dan tersimpan di sistem. Silakan cek kembali apakah data yang dimasukkan sudah benar atau belum!");
				$this->redirect(array('read','id_batch'=>$id_batch,'id_sessi'=>$id_sessi,'ext'=>$extension, 'v'=>$v)); 
			}
		}
		
		
		
		$this->layout = "twoplets";
		$this->render('../salesplan/form_uploadsalesplan',array(
			'month'=>$month,
			'year'=>$year,
			'model'=>$model
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
