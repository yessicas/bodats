<?php

class SalesPlanController extends Controller
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
				'actions'=>array('salesplan','approve',
					'addsalesplan','addsalesplanselectvessel','editsalesplan', 
					'showdata','selectsalesplan',
					'adddetailsalesplan','editdetailsalesplan','deletesalesplan', 'deletesalesplan2',
				),
				'roles'=>array('MKT', 'ADM'),
			),
			
			//Outlook
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('outlook', 'monthly', 'copytooutlook', 'docopytooutlook', 'copytomonthly', 'docopytomonthly',
				),
				'roles'=>array('MKT', 'ADM'),
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
	
		
	public function actionRatingPayment()
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
			$this->render('ratingpayment',array(
				'arrayDataProvider'=>$arrayDataProvider,
			));
			
		}
	}

	
	public function actionSalesplanOld2($month="", $year="", $mode="'")
	{
		/*
		$DEFAULT_YEAR = (Timeanddate::getCurrentYear()*1)+1;
		$DEFAULT_MONTH = '01'; //Defaultnya dimulai dari Januari
		
		if(isset($_GET['Month']))
			$DEFAULT_MONTH = $_GET['Month'];
			
		if(isset($_GET['Year']))
			$DEFAULT_YEAR = $_GET['Year'];
		*/
		
		$this->render('plan',array(
		//'arrayDataProvider'=>$arrayDataProvider,
		));	
	}
	
	
	public function actionCopytooutlook($Year=2014)
	{
		$rawData=array();
		
		if(isset($_POST['Year'])){
			$this->redirect(array('copytooutlook','Year'=>$_POST['Year']));
		}
		
		for ($i = 1; $i <= 12 ; $i++){
			$monthFormated=sprintf("%02s",$i);
			$rawData[]=array('id'=>$i, 'Month'=>Yii::app()->dateFormatter->format("MMMM",strtotime($Year.'-'.$monthFormated.'-01')), 'Year'=>$Year);
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

		{
			$this->render('copytooutlook',array(
				'arrayDataProvider'=>$arrayDataProvider,
				'Year'=>$Year,
			));
		}
		
	}
	
	
	public function actionCopytomonthly($Year=2014)
	{
		$rawData=array();
		
		if(isset($_POST['Year'])){
			$this->redirect(array('copytomonthly','Year'=>$_POST['Year']));
		}
		
		for ($i = 1; $i <= 12 ; $i++){
			$monthFormated=sprintf("%02s",$i);
			$rawData[]=array('id'=>$i, 'Month'=>Yii::app()->dateFormatter->format("MMMM",strtotime($Year.'-'.$monthFormated.'-01')), 'Year'=>$Year);
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

		{
			$this->render('copytomonthly',array(
				'arrayDataProvider'=>$arrayDataProvider,
				'Year'=>$Year,
			));
		}
		
	}
	
	public function copysalesplan($modeltargetname, $y, $m){
		//1. Data lama dihapus dulu
		$modeltargetname::model()->deleteAllByAttributes(array('year'=>$y,'month'=>$m));
		
		//2.Data dari salesplan dicopykan
		$salesplan = SalesPlan::model()->findAllByAttributes(array('year'=>$y,'month'=>$m));
		foreach($salesplan as $sp){
			echo $sp->id_sales_plan."<Br>";
			
			$modeltarget = new $modeltargetname;
			$modeltarget->year = $sp->year;
			$modeltarget->month = $sp->month;
			$modeltarget->id_vessel_tug = $sp->id_vessel_tug;
			$modeltarget->id_vessel_barge = $sp->id_vessel_barge;
			$modeltarget->id_customer = $sp->id_customer;
			$modeltarget->voyage_no = $sp->voyage_no;
			$modeltarget->JettyIdStart = $sp->JettyIdStart;
			$modeltarget->JettyIdEnd = $sp->JettyIdEnd;
			$modeltarget->TotalQuantity = $sp->TotalQuantity;
			$modeltarget->QuantityUnit = $sp->QuantityUnit;
			$modeltarget->PriceUnit = $sp->PriceUnit;
			$modeltarget->id_currency = $sp->id_currency;
			$modeltarget->change_rate = $sp->change_rate;
			$modeltarget->FuelLtr = $sp->FuelLtr;
			$modeltarget->FuelCost = $sp->FuelCost;
			$modeltarget->AgencyCost = $sp->AgencyCost;
			$modeltarget->DepreciationCost = $sp->DepreciationCost;
			$modeltarget->CrewCost = $sp->CrewCost;
			$modeltarget->Rent = $sp->Rent;
			$modeltarget->SubconCost = $sp->SubconCost;
			$modeltarget->IncuranceCost = $sp->IncuranceCost;
			$modeltarget->RepairCost = $sp->RepairCost;
			$modeltarget->GP_COGM = $sp->GP_COGM;
			$modeltarget->MarginFuelCost = $sp->MarginFuelCost;
			$modeltarget->MarginAgencyCost = $sp->MarginAgencyCost;
			$modeltarget->MarginDepreciationCost = $sp->MarginDepreciationCost;
			$modeltarget->MarginCrewCost = $sp->MarginCrewCost;
			$modeltarget->MarginRent = $sp->MarginRent;
			$modeltarget->MarginSubconCost = $sp->MarginSubconCost;
			$modeltarget->MarginIncuranceCost = $sp->MarginIncuranceCost;
			$modeltarget->MarginRepairCost = $sp->MarginRepairCost;
			$modeltarget->MarginBrokerageCost = $sp->MarginBrokerageCost;
			$modeltarget->MarginOthersCost = $sp->MarginOthersCost;
			$modeltarget->GP_COGS = $sp->GP_COGS;
			$modeltarget->TotalRevenue = $sp->TotalRevenue;
			$modeltarget->TotalStandardCost = $sp->TotalStandardCost;
			$modeltarget->TotalSalesCost = $sp->TotalSalesCost;
			

			
			//Nanti silakan dilanjutkan sama andre..field apa saja yang mau dicopykan sama seperti tujuannya
			
			$modeltarget->save(false);
		}
	}

	public function actionDocopytooutlook($y, $m, $w = "sales_plan_month", $o=1){
		if($w == "sales_plan_outlook"){
			$modeltargetname = "SalesPlanOutlook";
		}

		//OUtlook 1 : Jan, Feb, Maret, April
		if($o == 1){
			$this->copysalesplan($modeltargetname, $y, 1);
			$this->copysalesplan($modeltargetname, $y, 2);
			$this->copysalesplan($modeltargetname, $y, 3);
			$this->copysalesplan($modeltargetname, $y, 4);
		}
		
		//Outlook 2
		if($o == 2){
			$this->copysalesplan($modeltargetname, $y, 5);
			$this->copysalesplan($modeltargetname, $y, 6);
			$this->copysalesplan($modeltargetname, $y, 7);
			$this->copysalesplan($modeltargetname, $y, 8);
		}
		
		//Outlook 3
		if($o == 3){
			$this->copysalesplan($modeltargetname, $y, 9);
			$this->copysalesplan($modeltargetname, $y, 10);
			$this->copysalesplan($modeltargetname, $y, 11);
			$this->copysalesplan($modeltargetname, $y, 12);
		}
		
		Yii::app()->user->setFlash('success', "Succesfully Copy Sales Plan To Outlook!");
		$this->redirect(array('copytooutlook','Year'=>$y));
	}
	
	public function actionDocopytomonthly($y, $m, $w = "sales_plan_month")
	{
		//Memilih mau mengcopy ke tabel target yang mana (monthly atau outlook)
		$modeltargetname = "SalesPlanMonth";
		if($w == "sales_plan_month"){
			$modeltargetname = "SalesPlanMonth";
		}
		
		if($w == "sales_plan_outlook"){
			$modeltargetname = "SalesPlanOutlook";
		}

		$this->copysalesplan($modeltargetname, $y, $m);
		
		if($w == "sales_plan_outlook"){
			Yii::app()->user->setFlash('success', "Succesfully Copy Sales Plan To Outlook!");
			$this->redirect(array('copytooutlook','Year'=>$y));
		}else{
			Yii::app()->user->setFlash('success', "Succesfully Copy Sales Plan To Monthly Plan!");
			$this->redirect(array('copytomonthly','Year'=>$y));
		}
	}	

	
	public function actionOutlook()
	{
		$this->render('planoutlook',array(
			//'arrayDataProvider'=>$arrayDataProvider,
		));	
	}
	
	
	public function actionMonthly()
	{
		$this->render('planmonthly',array(
			//'arrayDataProvider'=>$arrayDataProvider,
		));	
	}
	
	
	public function actionMonthly2($month="", $year="", $mode=""){
		$this->actionSalesplan($month, $year, $mode);
	}
	
	public function actionSalesplan($month="", $year="", $mode=""){
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
			
			$this->redirect(array('salesplan','month'=>$month,'year'=>$year,'mode'=>$mode));
		}
		
		
		
		
		$this->layout = "twoplets";
		$this->render('../salesplan/plan',array(
			'month'=>$month,
			'year'=>$year,
			'mode'=>$mode
		));
	}
	
	public function actionApprove($Year=2014)
	{
		$rawData=array();
		
		for ($i = 1; $i <= 12 ; $i++){
			$monthFormated=sprintf("%02s",$i);
			$rawData[]=array('id'=>$i, 'Month'=>Yii::app()->dateFormatter->format("MMMM",strtotime($Year.'-'.$monthFormated.'-01')), 'Year'=>$Year);
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

		{
			$this->render('approve',array(
				'arrayDataProvider'=>$arrayDataProvider,
			));
		}
		
	}

	/*
	public function actionAddsalesplan($id_tug, $id_barge, $month, $year)
	{
		$model=new SalesPlan;
		
		if(isset($_POST['SalesPlan']))
		{
			$model->attributes=$_POST['SalesPlan'];
			if($model->save())
				$this->redirect(array('adddetailsalesplan','id'=>$model->id_sales_plan));
		}
		
		if(Yii::app()->request->getIsAjaxRequest()){
			echo $this->renderPartial('addsalesplanselect', array(
				'id_tug'=>$id_tug, 'id_barge'=>$id_barge, 'month'=>$month, 'year'=>$year,
				'model'=>$model,
			), true, true);
		}
		else {
			echo $this->render('addsalesplanselect', array(
				'id_tug'=>$id_tug, 'id_barge'=>$id_barge, 'month'=>$month, 'year'=>$year,
				'model'=>$model,
			));
		}
			
		//'arrayDataProvider'=>$arrayDataProvider,	
	}
	*/
	
	public function actionAddsalesplan($id_tug, $id_barge, $month, $year, $is_mode="salesplan", $mode="current")
	{
		$modelname = SalesPlanDB::selectModel($is_mode);
		$model=new $modelname;
		
		if(isset($_POST[$modelname]))
		{
			$model->attributes=$_POST[$modelname];
			if($model->validate()){
				if($model->save())
					$this->redirect(array('adddetailsalesplan','id'=>$model->id_sales_plan, 'is_mode'=>$is_mode, 'mode'=>$mode));
			}else{
				echo CHtml::errorSummary($model);
			}
		}
		
		if(Yii::app()->request->getIsAjaxRequest()){
			echo $this->renderPartial('addsalesplanselect', array(
				'id_tug'=>$id_tug, 'id_barge'=>$id_barge, 'month'=>$month, 'year'=>$year,
				'model'=>$model,'is_mode'=>$is_mode, 'mode'=>$mode
			), true, true);
		}
		else {
			echo $this->render('addsalesplanselect', array(
				'id_tug'=>$id_tug, 'id_barge'=>$id_barge, 'month'=>$month, 'year'=>$year,
				'model'=>$model,'is_mode'=>$is_mode, 'mode'=>$mode
			));
		}
			
		//'arrayDataProvider'=>$arrayDataProvider,	
	}
	
	public function actionAddsalesplanselectvessel( $month, $year, $is_mode="salesplan")
	{
		$modelname = SalesPlanDB::selectModel($is_mode);
		$model=new $modelname;
		
		if(isset($_POST[$modelname]))
		{
			$model->attributes=$_POST[$modelname];
			if($model->validate()){
				if($model->save())
					$this->redirect(array('adddetailsalesplan','id'=>$model->id_sales_plan, 'is_mode'=>$is_mode));
			}else{
				echo CHtml::errorSummary($model);
			}
		}
		
	
	
		
		if(Yii::app()->request->getIsAjaxRequest()){
			echo $this->renderPartial('addsalesplanselectvessel', array(
				'month'=>$month, 'year'=>$year,
				'model'=>$model,'is_mode'=>$is_mode
			), true, true);
		}
		else {
			echo $this->render('addsalesplanselectvessel', array(
				'month'=>$month, 'year'=>$year,
				'model'=>$model,'is_mode'=>$is_mode
			));
		}
			
		//'arrayDataProvider'=>$arrayDataProvider,	
	}



	public function actionEditsalesplan($id,$id_tug, $id_barge, $month, $year, $is_mode="salesplan")
	{
		$modelname = SalesPlanDB::selectModel($is_mode);
		$model=$modelname::model()->findByPk($id);
		
		if(isset($_POST[$modelname]))
		{
			$model->attributes=$_POST[$modelname];
			if($model->validate()){
				if($model->save())
					$this->redirect(array('adddetailsalesplan','id'=>$model->id_sales_plan, 'is_mode'=>$is_mode));
			}else{
				echo CHtml::errorSummary($model);
			}
		}
		
		if(Yii::app()->request->getIsAjaxRequest()){
			echo $this->renderPartial('editsalesplanselect', array(
				'id_tug'=>$id_tug, 'id_barge'=>$id_barge, 'month'=>$month, 'year'=>$year,
				'model'=>$model,'is_mode'=>$is_mode
			), true, true);
		}
		else {
			echo $this->render('editsalesplanselect', array(
				'id_tug'=>$id_tug, 'id_barge'=>$id_barge, 'month'=>$month, 'year'=>$year,
				'model'=>$model,'is_mode'=>$is_mode
			));
		}
			
		//'arrayDataProvider'=>$arrayDataProvider,	
	}
	
	/*
	public function actionAdddetailsalesplan($id)
	{
		$model= SalesPlan::model()->findByPk($id);
		
		if(isset($_POST['SalesPlan']))
		{
			$model->attributes=$_POST['SalesPlan'];
			$model->TotalRevenue=$_POST['SalesPlan']['TotalQuantity'] * $_POST['SalesPlan']['PriceUnit'];
			$changerate=Currency::model()->findByPk($_POST['SalesPlan']['id_currency']);
			$model->change_rate=($changerate) ? $changerate->change_rate : 0 ;
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
			if($model->save())
				//$this->redirect(array('adddetailsalesplan','id'=>$model->id_sales_plan));
				Yii::app()->user->setFlash('success', " Data Sales Plan Saved");
				$monthFormated=sprintf("%02s",$model->month);
				$this->redirect(array('demand/salesplan','Month'=>$monthFormated,'Year'=>$model->year));
				
		}
		
		echo $this->render('addsalesplandetail', array(
			'model'=>$model,
		));
		
		//'arrayDataProvider'=>$arrayDataProvider,	
	}
	*/
	public function actionAdddetailsalesplan($id, $is_mode="salesplan", $mode="past")
	{
		$modelname = SalesPlanDB::selectModel($is_mode);
		$model= $modelname::model()->findByPk($id);
		
		if(isset($_POST[$modelname]))
		{
			$model->attributes=$_POST[$modelname];
			$id_fuel_price_unit=$_POST[$modelname]['id_fuel_price_unit'];
			//echo "Priceunit".$_POST[$modelname]['id_fuel_price_unit']; exit();
			$fuel = Fuel::model()->findByPk($id_fuel_price_unit);
			if($fuel != null){
				$model->FuelPriceUnit=$fuel->fuel_price;
			}
			$model->TotalRevenue=$_POST[$modelname]['TotalQuantity'] * $_POST[$modelname]['PriceUnit'];
			$changerate=Currency::model()->findByPk($_POST[$modelname]['id_currency']);
			$model->PriceUnit = $_POST["priceFormated"];
			$model->TotalQuantity=$_POST[$modelname]['TotalQuantity'];
			$model->change_rate=($changerate) ? $changerate->change_rate : 0 ;
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
			if($model->save())
				//$this->redirect(array('adddetailsalesplan','id'=>$model->id_sales_plan));
				Yii::app()->user->setFlash('success', " Data Sales Plan Saved");
				$monthFormated=sprintf("%02s",$model->month);

				//$this->redirect(array('salesplan/'.$is_mode,'Month'=>$monthFormated,'Year'=>$model->year));
				//$this->redirect(array('/demand/salesplan/','month'=>$monthFormated,'year'=>$model->year));
				$this->redirect(array('/demand/salesplan/','is_mode'=>$is_mode, 'month'=>$monthFormated,'year'=>$model->year, "mode"=>$mode));
				
		}
		
		echo $this->render('addsalesplandetail', array(
			'model'=>$model, 'is_mode'=>$is_mode,
			'edit_mode'=>false, 
		));
		
		//'arrayDataProvider'=>$arrayDataProvider,	
	}

	public function actionEditdetailsalesplan($id, $is_mode="salesplan", $mode="past")
	{
		$modelname = SalesPlanDB::selectModel($is_mode);
		$model= $modelname::model()->findByPk($id);
		
		
		if(isset($_POST[$modelname]))
		{
			$model->attributes=$_POST[$modelname];
			/*echo "Priceunit".$_POST[$modelname]['PriceUnit']; exit();*/
			$id_fuel_price_unit=$_POST[$modelname]['id_fuel_price_unit'];
			$fuel = Fuel::model()->findByPk($id_fuel_price_unit);
			if($fuel != null){
				$model->FuelPriceUnit=$fuel->fuel_price;
			}
			$model->TotalRevenue=$_POST[$modelname]['TotalQuantity'] * $_POST[$modelname]['PriceUnit'];
			//echo $_POST[$modelname]['SalesAgregatMargin'].'eada'; exit();
			//$model->PriceUnit=$_POST[$modelname]['PriceUnit'];
			$model->PriceUnit = $_POST["priceFormated"];
			$model->TotalQuantity=$_POST[$modelname]['TotalQuantity'];
			$changerate=Currency::model()->findByPk($_POST[$modelname]['id_currency']);
			$model->change_rate=($changerate) ? $changerate->change_rate : 0 ;
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
			if($model->save())
				//$this->redirect(array('adddetailsalesplan','id'=>$model->id_sales_plan));
				Yii::app()->user->setFlash('success', " Data Sales Plan Saved");
				$monthFormated=sprintf("%02s",$model->month);
				//$this->redirect(array('salesplan/'.$is_mode,'Month'=>$monthFormated,'Year'=>$model->year));
				//$this->redirect(array('/demand/salesplan/','month'=>$monthFormated,'year'=>$model->year));
				$this->redirect(array('/demand/salesplan/','is_mode'=>$is_mode, 'month'=>$monthFormated,'year'=>$model->year, "mode"=>$mode));
				
		}
		
		echo $this->render('addsalesplandetail', array(
			'model'=>$model, 'is_mode'=>$is_mode, 'edit_mode'=>true, 
		));
		
		//'arrayDataProvider'=>$arrayDataProvider,	
	}


	public function actionDeletesalesplan($id, $is_mode="salesplan")
	{
		$modelname = SalesPlanDB::selectModel($is_mode);
		$model= $modelname::model()->findByPk($id);
		
		$model->delete();
		//$this->redirect(array('adddetailsalesplan','id'=>$model->id_sales_plan));
		Yii::app()->user->setFlash('success', " Data Sales Plan Deleted");
		$monthFormated=sprintf("%02s",$model->month);
		//$this->redirect(array('salesplan/'.$is_mode,'Month'=>$monthFormated,'Year'=>$model->year));
		//demand/salesplan/month/01/year/2016/mode/past
		//$this->redirect(array('demand/salesplan/', 'month'=>$monthFormated,'year'=>$model->year));
		$this->redirect(array('/demand/salesplan/','is_mode'=>$is_mode, 'month'=>$month,'year'=>$year, "mode"=>$mode));
	}
	
	public function actionDeletesalesplan2($id, $is_mode="salesplan", $month, $year, $mode)
	{
		$modelname = SalesPlanDB::selectModel($is_mode);
		$model= $modelname::model()->findByPk($id);
		
		$model->delete();
		//$this->redirect(array('adddetailsalesplan','id'=>$model->id_sales_plan));
		Yii::app()->user->setFlash('success', " Data Sales Plan Deleted");
		$monthFormated=sprintf("%02s",$model->month);
		//$this->redirect(array('salesplan/'.$is_mode,'Month'=>$monthFormated,'Year'=>$model->year));
		//demand/salesplan/month/01/year/2016/mode/past
		//$this->redirect(array('demand/salesplan/', 'month'=>$month,'year'=>$year, 'mode'=>$mode));
		$this->redirect(array('/demand/salesplan/','is_mode'=>$is_mode, 'month'=>$month,'year'=>$year, "mode"=>$mode));
	}

	public function actionShowdata()
	{	

		$modelName='SalesPlanMonth'; // ini bisa di ubah model nya 
		$model=new $modelName('search');

		$modelquo=Quotation::model()->findByPk($_GET['idquo']);

		$model->unsetAttributes(); // clear any default values
		if(isset($_GET[$modelName])){
		 	$model->attributes=$_GET[$modelName];
		}else{
			$model->id_customer=$modelquo->id_customer;
			$model->id_vessel_tug=$modelquo->BargingVesselTug;
			$model->id_vessel_barge=$modelquo->BargingVesselBarge;
			$model->JettyIdStart=$modelquo->BargingJettyIdStart;
			$model->JettyIdEnd=$modelquo->BargingJettyIdEnd;

			if($modelquo->LoadingDate!='0000-00-00'){
				$year = date("Y", strtotime($modelquo->LoadingDate));
				$model->year=$year;
			}
			
		}
			/*
			// pake fancy box
			$cs = Yii::app()->clientScript;
	        $cs->reset();
	        $cs->scriptMap = array(
	            'jquery.js' => false, // prevent produce jquery.js in additional javascript data
	            'jquery.min.js' => false,
	        );

		    if(Yii::app()->request->getIsAjaxRequest())
		      {
		        echo $this->renderPartial('gelist_salesplan',array(
		          'model'=>$model,
		        ),true,true);
		      }

		    else 
		      $this->render('gelist_salesplan',array(
		        'model'=>$model,
		      ));

		      
			*/
       
		
		// pake cjui dialog
		$this->renderPartial('gelist_salesplan',array(
		  'model'=>$model,
		),false,true);

		Yii::app()->end();
		
	}

	public function actionSelectsalesplan($id)
	{
		$id_sales_plan='';
		$CompanyName='';
		$tug='';
		$barge='';
		$loadingPort='';
		$unloadingPort='';
		$totalQuantity='';
		$voyage_no='';

		$modelName='SalesPlanMonth'; // ini bisa di ubah model nya 
		$model=$modelName::model()->findByPk($id); 
		$id_sales_plan=$model->id_sales_plan;
		$CompanyName=$model->Customer->CompanyName;
		$tug=$model->Tug->VesselName;
		$barge=$model->Barge->VesselName;
		$loadingPort=$model->LoadingPort->JettyName;
		$unloadingPort=$model->UnloadingPort->JettyName;
		$totalQuantity=$model->TotalQuantity;
		$voyage_no=$model->voyage_no;


		echo CJSON::encode(array
		(
		   'id_sales_plan'=>$id_sales_plan,
		   'CompanyName'=>$CompanyName,
		   'tug'=>$tug,
		   'barge'=>$barge,
		   'loadingPort'=>$loadingPort,
		   'unloadingPort'=>$unloadingPort,
		   'totalQuantity'=>$totalQuantity,
		   'voyage_no'=>$voyage_no,

		));
		Yii::app()->end();
	}
}