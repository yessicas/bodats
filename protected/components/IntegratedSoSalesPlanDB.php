<?php
class IntegratedSoSalesPlanDB {	
	public static function createQuotationFirst($is_mode="salesplan"){
		switch($is_mode){
			case "salesplan": 
				return "sales_plan";
				
			case "outlook";
				return "sales_plan_outlook";
				
			case "monthly";
				return "sales_plan_month";
		}
	}
	
	public static function generateQuotationSingleRoute($id_sales_plan, $is_mode, $LoadingDate){
		$modelnameSalesPlan = SalesPlanDB::selectModel($is_mode);

		$modelsalesplan=$modelnameSalesPlan::model()->findByPk($id_sales_plan);
		if($modelsalesplan===null)
			throw new CHttpException(404,'Sales Plan ('.$is_mode.' / '.$id_sales_plan.') related not found. Please contact your administrator!.');
			
		$id_customer = $modelsalesplan->id_customer;
		$BargingVesselTug = $modelsalesplan->id_vessel_tug;
		$BargingVesselBarge = $modelsalesplan->id_vessel_barge	;
		$BargingJettyIdStart = $modelsalesplan->JettyIdStart;
		$BargingJettyIdEnd = $modelsalesplan->JettyIdEnd;
		
		$model = IntegratedSoSalesPlanDB::generateDefaultQuotationSingleRoute($id_customer, $BargingVesselTug, $BargingVesselBarge, $BargingJettyIdStart, $BargingJettyIdEnd, $LoadingDate);
		
		return $model;
	}
	
	public static function generateDefaultQuotationSingleRoute($id_customer, $BargingVesselTug, $BargingVesselBarge, $BargingJettyIdStart, $BargingJettyIdEnd, $LoadingDate){
		$model = Quotation::model()->findByAttributes(array(
			'id_customer'=>$id_customer,
			'BargingVesselTug'=>$BargingVesselTug,
			'BargingVesselBarge'=>$BargingVesselBarge,
			'BargingJettyIdStart'=>$BargingJettyIdStart,
			'BargingJettyIdEnd'=>$BargingJettyIdEnd,
			'LoadingDate'=>$LoadingDate,
		));
		
		if($model == null){
			$model = new Quotation();
		}
		
		$model->id_customer = $id_customer;
		$model->BargingVesselTug=$BargingVesselTug;
		$model->BargingVesselBarge=$BargingVesselBarge;
		$model->BargingJettyIdStart=$BargingJettyIdStart;
		$model->BargingJettyIdEnd=$BargingJettyIdEnd;
		$model->LoadingDate=$LoadingDate;
		
		$model->IsSingleRoute=1; //Defaultnya Single Route
		
		
		$model = LogRegister::setUserCreated($model);
		
		if($model->save(false)){
			return $model;
		}else{
			return null;
		}
	}
	
	public static function saveDetailSOQuotation($modelQuotation, $POSTDATA){
		$TotalQuantity = 0;
		if(isset( $POSTDATA['TotalQuantity'])){
			$TotalQuantity = $POSTDATA['TotalQuantity'];
		}
		
		$QuantityUnit = "";
		if(isset( $POSTDATA['QuantityUnit'])){
			$QuantityUnit = $POSTDATA['QuantityUnit'];
		}
		
		$QuantityPrice = 0;
		if(isset( $POSTDATA['QuantityPrice'])){
			$QuantityPrice = $POSTDATA['QuantityPrice'];
		}
		
		$QuantityPriceCurency = 0;
		if(isset( $POSTDATA['QuantityPriceCurency'])){
			$QuantityPriceCurency = $POSTDATA['QuantityPriceCurency'];
		}
		
		$StatusDescription = "";
		if(isset( $POSTDATA['StatusDescription'])){
			$StatusDescription = $POSTDATA['StatusDescription'];
		}
		
		//Diasumsikan bahawa proses yang sebelumnya (generateDefaultQuotationSingleRoute) sudah dijalankan 
		$model = $modelQuotation;
		
		$model->TotalQuantity = $TotalQuantity;
		$model->QuantityUnit = $QuantityUnit;
		$model->QuotationDate = Timeanddate::getCurrentDate();
		$model->QuantityPrice = $QuantityPrice;
		$model->QuantityPriceCurency = $QuantityPriceCurency;
		$model->StatusDescription = $StatusDescription;
		$model->total_price = $model->TotalQuantity * $model->QuantityPrice;
		
		$model->id_bussiness_type_order = 100; //Dibuat Hard Code karena bisnisnya pasti barging port to port
		$modelCustomer = Customer::model()->findByPk($model->id_customer);
		if($modelCustomer != null){
			$model->attn = $modelCustomer->ContactName;
		}
		
		if($model->save(false)){
			IntegratedSoSalesPlanDB::saveDetailSOQuotationDetailVessel($modelQuotation);
			return $model;
		}else{
			return $model;
		}
	}
	
	public static function saveDetailSOQuotationDetailVessel($modelQuotation){
		$model = QuotationDetailVessel::model()->findByAttributes(array(
			'id_quotation'=>$modelQuotation->id_quotation,
			'BargingVesselTug'=>$modelQuotation->BargingVesselTug,
			'BargingVesselBarge'=>$modelQuotation->BargingVesselBarge,
		));
		
		if($model == null){
			$model = new QuotationDetailVessel();
		}
		
		$model->id_quotation = $modelQuotation->id_quotation;
		$model->BargingVesselTug = $modelQuotation->BargingVesselTug;
		$barge=Vessel::model()->findByPk($modelQuotation->BargingVesselBarge);
		if($barge != null){
			$model->BargeSize = $barge->BargeSize;
		}
		$model->BargingVesselBarge = $modelQuotation->BargingVesselBarge;
		$model->IdJettyOrigin = $modelQuotation->BargingJettyIdStart;
		$model->IdJettyDestination = $modelQuotation->BargingJettyIdEnd;
		$model->Capacity = $modelQuotation->TotalQuantity;
		$model->StartDate = $modelQuotation->LoadingDate;
		$model->Price = $modelQuotation->QuantityPrice; 
		$model->id_currency = $modelQuotation->QuantityPriceCurency;
		
		$changerate=Currency::model()->findByPk($modelQuotation->QuantityPriceCurency);
		if($changerate!= null){
			$model->change_rate=$changerate->change_rate;
		}
		$model->fuel_price=GeneralDB::getLastUpdateFuel()->fuel_price;
		
		$model = LogRegister::setUserCreated($model);
		
		if($model->save(false)){

			return true;
		}else{
			return false;
		}
	}
	
	public static function saveShippingOrder($modelQuotation, $modelSo, $modelSalesPlan, $POSTDATA_SO){
		$model = So::model()->findByAttributes(array(
			'id_quotation'=>$modelQuotation->id_quotation,
			'id_sales_plan'=>$modelSalesPlan->id_sales_plan,
		));
		
		if($model == null){
			$model = new So();
		}
	
		//$modelSo->attributes=$_POST['So'];
		//$updateModel=So::model()->findByPK($model->id_so);
		$dataformatnumber=NumberingDocumentDBSO::getFormatNumber($model,'id_so','SONo','SOMonth','SOYear',$model->id_so);
		$model->ShippingOrderNumber= $dataformatnumber['NumberFormat']; 
		$model->SONo = $dataformatnumber['NoOrder']; 
		$model->SOMonth = NumberingDocumentDBSO::getMonthNow(); 
		$model->SOYear = NumberingDocumentDBSO::getYearNow(); 
		$model->save(false);
		
		
		$modelSo->attributes=$POSTDATA_SO;
		$model->id_quotation = $modelQuotation->id_quotation;
		$model->id_sales_plan = $modelSalesPlan->id_sales_plan;
		$model->SI_is_attach=0;
		$model->SI_Attachment='-';
		$model->SI_Number = $modelSo->SI_Number;
		$model->VoyageDate = $modelQuotation->LoadingDate;
		$modelCustomer = Customer::model()->findByPk($modelQuotation->id_customer);
		if($modelCustomer != null){
			$model->Consignee = $modelCustomer->ContactName;
			$model->NotifyAddress = $modelCustomer->Address;
		}
		
		if($model->save(false)){
			//Duplicate to Voyage Order
			IntegratedSoSalesPlanDB::copySOtoVO($model, $modelQuotation);
		}

		$filename ="SI_";
		if(strlen(trim(CUploadedFile::getInstance($modelSo,'SI_Attachment'))) > 0){
			$models=CUploadedFile::getInstance($modelSo,'SI_Attachment');
			$extension=$models->extensionName;
			$filename=IntegratedSoSalesPlanDB::getFilenameSO($model, $extension);
			$model->SI_Attachment= $filename;
			$model->SI_is_attach=1;
		}

		if($model->save(false)){
			if(strlen(trim(CUploadedFile::getInstance($model,'SI_Attachment'))) > 0){
				$path=Yii::app()->basePath . '/../repository/so/'.$filename;
				$models->saveAs($path);
			}
		}
		
		return $model;
	}
	
	/*Melakukan copy data dari SO (Shipping Order) ke VO (Voyage Order) */
	public static function copySOtoVO($modelso, $modelQuotation){
		$voyageorder = VoyageOrder::model()->findByAttributes(array(
			'id_so'=>$modelso->id_so,
		));
	
		if($voyageorder == null){
			$voyageorder = new VoyageOrder;
		}
		$voyageorder->id_quotation=$modelQuotation->id_quotation;
		$voyageorder->id_so=$modelso->id_so;
		$voyageorder->status='SHIPPING ORDER';
		if(isset($modelso->Quotation)){
			$voyageorder->bussiness_type_order=$modelso->Quotation->BussinessTypeOrder->id_bussiness_type_order;
		}
		
		$modelQuoDet = QuotationDetailVessel::model()->findByAttributes(array('id_quotation'=>$modelQuotation->id_quotation));
		
		if($modelQuoDet != null){
			$voyageorder->BargingVesselTug=$modelQuoDet->BargingVesselTug;
			$voyageorder->BargingVesselBarge=$modelQuoDet->BargingVesselBarge;
			$voyageorder->BargeSize=$modelQuoDet->BargeSize;
			$voyageorder->Capacity=$modelQuoDet->Capacity;
			$voyageorder->BargingJettyIdStart=$modelQuoDet->IdJettyOrigin;
			$voyageorder->BargingJettyIdEnd=$modelQuoDet->IdJettyDestination;
			$voyageorder->id_currency=$modelQuoDet->id_currency;
			$voyageorder->change_rate=$modelQuoDet->change_rate;
			$voyageorder->fuel_price=$modelQuoDet->fuel_price;
			$voyageorder->TugPower=$modelQuoDet->VesselTug->Power;
			$voyageorder->Price=$modelQuoDet->Price;
		}
		
		$voyageorder->created_user=Yii::app()->user->id;
		$voyageorder->created_date=date("Y-m-d H:i:s");
		$voyageorder->ip_user_updated=$_SERVER['REMOTE_ADDR'];

		$voyageorder->status_schedule='NONE';
		$voyageorder->save(false);	
	}
	
	public static function getFilenameSO($modelSo, $extension){
		$filename="SI_".md5($modelSo->id_so).'_'.$modelSo->id_so.'.'.$extension;
		return $filename;
	}

	public static function getSoFromSalesPlan($id_sales_plan){
		$model = So::model()->findByAttributes(array(
			'id_sales_plan'=>$id_sales_plan,
		));
		
		return $model;
	}
	
	public static function countFromSalesPlan($id_sales_plan){
		$model = So::model()->CountByAttributes(array(
			'id_sales_plan'=>$id_sales_plan,
		));
		
		return $model;
	}
	
	public static function displaySoLinkFromSalesPlan($is_mode, $mode, $id_sales_plan,  $month, $year){
		$datas = So::model()->findAllByAttributes(array(
			'id_sales_plan'=>$id_sales_plan,
		));
	
		$DISPLAY_ACTION_CUSTOMER = "";
		foreach($datas as $data){
			$url_action_customer = Yii::app()->controller->createUrl("sosalesplan/createsoauto",array("id"=>$id_sales_plan,"is_mode"=>$is_mode, "mode"=>$mode, "is_edit"=>"true", "id_so"=>$data->id_so));
			$url_view = Yii::app()->controller->createUrl("sosalesplan/viewsoauto",array("id"=>$data->id_so,"is_mode"=>$is_mode, "mode"=>$mode));
			$title = Timeanddate::getDisplayStandardDate($data->VoyageDate)." - ".$data->ShippingOrderNumber;
			
			$deleteLink = CHtml::link(
				'Delete SO',
				 array('sosalesplan/deleteso','id'=>$data->id_so, 'is_mode'=>$is_mode, 'month'=>$month, 'year'=>$year, 'mode'=>$mode),
				 array('confirm' => 'Are you sure want to delete this SO? Please make sure that this SO is not used in the another process (Schedule, Voyage, etc)!')
			);
			$DISPLAY_ACTION_CUSTOMER .= '<br><a href="'.$url_view.'" class="various fancybox.ajax">View SO ('.$title.')</a> | <a href="'.$url_action_customer.'">Update SO</a>
			| '.$deleteLink.'
			<hr style="width:240px; border:1px solid #d7d7d7;">';
		}
		
		return $DISPLAY_ACTION_CUSTOMER;
	}
}

?>