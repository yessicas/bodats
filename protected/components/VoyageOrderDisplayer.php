<?php
class VoyageOrderDisplayer {
	public static function displayVOPositionImage($position, $additionalMessage = ""){
		$MESSAGE = "These data provide information about the voyage orders with status: ";
		$status = "";
		$DISP = "";
		
		switch($position){
			case "SHIPPING ORDER":
				$status = "SHIPPING ORDER (Ready to create Voyage Order)";
				$DISP .= '<img src="images/cmap/vo_so.png">';
				break;
			
			case "VO CREATE":
				$status = "VOYAGE ORDER (VO has been created, ready to sail)";
				$DISP .= '<img src="images/cmap/vo_vo.png">';
				break;
				
			case "VO SAILING":
				$status = "Voyage on sailing";
				$DISP .= '<img src="images/cmap/vo_sailing.png">';
				break;
				
			case "VO FINISH":
				$status = "Voyage has finish sailing";
				$DISP .= '<img src="images/cmap/vo_finish.png">';
				break;
				
			case "VO DOC COMPLETE":
				$status = "Voyage has finish sailing and document close voyage is complete";
				$DISP .= '<img src="images/cmap/vo_doc_complete.png">';
				break;
				
			case "INVOICE":
				$status = "Voyage has finish sailing and Invoicing to customer has sent";
				$DISP .= '<img src="images/cmap/vo_invoice.png">';
				break;
				
			case "PAY":
				$status = "Customer has paid for this voyage";
				$DISP .= '<img src="images/cmap/vo_pay.png">';
				break;
		}
		
		
		$DISP = $DISP.'<div class="alert alert-block alert-info" style="width:750px;">'.$MESSAGE.'<b>'.$status.'. </b>';
		if($additionalMessage != "")
			$DISP .= '<br>'.$additionalMessage;
		
		$DISP .= '</div>';
		return $DISP;

	}
	
	public static function getStatusVoyageOrder($status){
		switch($status){
			case "SHIPPING ORDER":
				return "SHIPPING ORDER";
				break;
				
			case "VO CREATE":
				return "VOYAGE ORDER";
				break;
				
			case "VO SAILING":
				return "SAILING";
				break;
				
			case "VO FINISH":
				return "VOYAGE CLOSED";
				break;
				
			case "VO DOC COMPLETE":
				return "VOYAGE CLOSED & DOC.COMPLETED";
				break;
				
			case "INVOICE":
				return "INVOICING PHASE";
				break;
				
			case "PAY":
				return "ORDER HAS BEEN PAID";
				break;
		}
		
		return $status;
	}
	
	public static function displayVoyageInfo($id_voyage_order){
		$vo = VoyageOrder::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order));
		$DISP = "";
		if($vo != null){
			$DISP .= FormCommonDisplayer::displayRowInputReadonly("Voyage Number", CHtml::encode($vo->id_voyage_order));
			$DISP .= FormCommonDisplayer::displayRowInputReadonly("Voyage Number", CHtml::encode($vo->id_voyage_order));
			$DISP .= FormCommonDisplayer::displayRowInputReadonly("Voyage Number", CHtml::encode($vo->id_voyage_order));
			$DISP .= FormCommonDisplayer::displayRowInputReadonly("Voyage Number", CHtml::encode($vo->id_voyage_order));
			$DISP .= FormCommonDisplayer::displayRowInputReadonly("Voyage Number", CHtml::encode($vo->id_voyage_order));

		}else{
			$DISP .= '<div class="alert  alert-error">Voyage Order Info not found.</div>';
		}
		
		return $DISP;
	}
	
	public static function displayVoyageInfo3column($id_voyage_order, $width="650px", $left="24px"){
		$vo = VoyageOrder::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order));
		$DISP = "";
		$DISP .= '<div class="view" style="padding:6px; margin-left:'.$left.'; width:'.$width.';">';
		$DISP .= '<h3>Voyage Info</h3>';
		$DISP .= '<table cellspacing="0" cellpadding="0" border="1">';
		if($vo != null){
			$DISP .= '<tr>';
			$DISP .= '<td>Voyage Number</td>';
			$DISP .= '<td>:</td>';
			$DISP .= '<td>'.CHtml::encode($vo->VoyageNumber).'</td>';
			$DISP .= '<td> &nbsp; | &nbsp; </td>';
			$DISP .= '<td>Vessel</td>';
			$DISP .= '<td>:</td>';
			$DISP .= '<td>'.CHtml::encode($vo->VesselTug->VesselName).'-'.CHtml::encode($vo->VesselBarge->VesselName).'</td>';
			$DISP .= '</tr>';
			
			$DISP .= '<tr>';
			$DISP .= '<td>Customer</td>';
			$DISP .= '<td>:</td>';
			$DISP .= '<td>'.CHtml::encode($vo->Quotation->Customer->CompanyName).'</td>';
			$DISP .= '<td> &nbsp; | &nbsp; </td>';
			$DISP .= '<td>Route</td>';
			$DISP .= '<td>:</td>';
			$DISP .= '<td>'.CHtml::encode($vo->JettyOrigin->JettyName).'-'.CHtml::encode($vo->JettyDestination->JettyName).'</td>';
			$DISP .= '</tr>';
			
			$DISP .= '<tr>';
			$DISP .= '<td>Loading Date</td>';
			$DISP .= '<td>:</td>';
			$DISP .= '<td>'.Timeanddate::getDisplayStandardDate(CHtml::encode($vo->StartDate)).'</td>';
			$DISP .= '<td> &nbsp; | &nbsp; </td>';
			$DISP .= '<td>Quantity</td>';
			$DISP .= '<td>:</td>';
			$DISP .= '<td>'.NumberAndCurrency::formatNumber(CHtml::encode($vo->Capacity)).' MT</td>';
			$DISP .= '</tr>';
			
			/*
			$DISP .= '<tr>';
			$DISP .= '<td>STATUS</td>';
			$DISP .= '<td width="10">:</td>';
			$DISP .= '<td colspan="4">'.VoyageOrderDisplayer::getStatusVoyageOrder(CHtml::encode($vo->status)).'</td>';
			$DISP .= '</tr>';
			*/
			
			$DISP .= '<tr>';
			$DISP .= '<td>STATUS</td>';
			$DISP .= '<td>:</td>';
			$DISP .= '<td>'.VoyageOrderDisplayer::getStatusVoyageOrder(CHtml::encode($vo->status)).'</td>';
			$DISP .= '<td> &nbsp; | &nbsp; </td>';
			$DISP .= '<td>Price Per Unit</td>';
			$DISP .= '<td>:</td>';
			$DISP .= '<td>'.
			NumberAndCurrency::getCurrency($vo->id_currency)." ".
			NumberAndCurrency::formatCurrency(CHtml::encode($vo->Price)).' / MT</td>';
			$DISP .= '</tr>';
			
			/*
			$DISP .= '<tr>';
			$DISP .= '<td colspan="5"></td>';
			$DISP .= '<td colspan="2">1 USD = xxxx IDR<Br>
			1 Ltr HSD = IDR XXXXX</td>';
			$DISP .= '</tr>';
			*/

		}else{
			$DISP .= '<div class="alert  alert-error">Voyage Order Info not found.</div>';
		}
		$DISP .= '</table>';
		$DISP .= '</div>';
		
		$RES = FormCommonDisplayer::displayRowInput("", $DISP);
		
		return $RES;
	}
	
	public static function displayChangeRate($id_voyage_order, $width="650px", $left="0px"){
		$vo = VoyageOrder::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order));
		$DISP = "";
		$DISP .= '<div class="view" style="padding:4px; color: green; font-weight: bold; margin-left:'.$left.'; width:'.$width.';">';
		$DISP .= '<table cellspacing="0" cellpadding="0" border="1">';
		if($vo != null){
			if($vo->id_currency != 1){
				$DISP .= '<tr>';
				$DISP .= '<td width="80%" style="text-align:right;">Currency Rate : &nbsp;</td>';
				$DISP .= '<td colspan="5">1 USD = IDR '.NumberAndCurrency::formatCurrency($vo->change_rate).' </td>';
				$DISP .= '</tr>';
			}
			
			$DISP .= '<tr>';
			$DISP .= '<td width="80%" style="text-align:right;">HSD Solar : &nbsp;</td>';
			$DISP .= '<td colspan="5">1 Ltr HSD = IDR '.NumberAndCurrency::formatCurrency($vo->fuel_price).'</td>';
			$DISP .= '</tr>';

		}else{
			$DISP .= '<div class="alert  alert-error">Voyage Order Info not found.</div>';
		}
		$DISP .= '</table>';
		$DISP .= '</div>';
		
		$RES = FormCommonDisplayer::displayRowInput("", $DISP);
		
		return $RES;
	}
	

	
	public static function displayVoyageInfoShort($id_schedule){
		$RES = "";
		$id_voyage_order = VoyageOrderDB::getVOfromSchedule($id_schedule);
		if($id_voyage_order > 0){
			$vo = VoyageOrder::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order));
			if($vo != null){
				$RES .= '<h6>'.VoyageOrderDisplayer::getIconBasedOnStatus($vo)." &nbsp; ".CHtml::encode($vo->VesselTug->VesselName).'-'.CHtml::encode($vo->VesselBarge->VesselName)." (".CHtml::encode($vo->VoyageNumber).")</h6>\r\n";
				$RES .= CHtml::encode($vo->BussinessTypeOrder->bussiness_type_order)."\r\n";
				$RES .= CHtml::encode($vo->JettyOrigin->JettyName).'-'.CHtml::encode($vo->JettyDestination->JettyName)." [".NumberAndCurrency::formatNumber(CHtml::encode($vo->Capacity))." MT]\r\n";
				$RES .= CHtml::encode($vo->Quotation->Customer->CompanyName)."\r\n";
				
			}
		}
		
		return $RES;
	}
	
	public static function displayVoyageInfoShort2($id_voyage_order){
		$RES = "";
			$vo = VoyageOrder::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order));
			if($vo != null){
				$RES .= '<h6>'.VoyageOrderDisplayer::getIconBasedOnStatus($vo)." &nbsp; ".CHtml::encode($vo->VesselTug->VesselName).'-'.CHtml::encode($vo->VesselBarge->VesselName)." (".CHtml::encode($vo->VoyageNumber).")</h6>\r\n";
				$RES .= CHtml::encode($vo->JettyOrigin->JettyName).'-'.CHtml::encode($vo->JettyDestination->JettyName)." [".NumberAndCurrency::formatNumber(CHtml::encode($vo->Capacity))." MT]\r\n";
				$RES .= CHtml::encode($vo->Quotation->Customer->CompanyName)."\r\n";
				
			}
		
		return $RES;
	}
	
	public static function getIconBasedOnStatus($modelvo){
		$status = $modelvo->status;
		$icon = "finish.png"; //Selain ketiga status tersebut iconnya dianggap finish
		switch($status){
			case "SHIPPING ORDER": $icon = "preparation.png"; break;
			case "VO CREATE": $icon = "preparation.png"; break;
			case "VO SAILING": $icon = "sailing.png"; break;
		}
		
		return '<img src="repository/icon/'.$icon.'" width="30px">';
	}
	
	public static function displayVoyagePlanInfoShort($id_schedule){
		$RES = "";
		$id_voyage_order_plan = VoyageOrderDB::getVOfromSchedule($id_schedule);
		if($id_voyage_order_plan > 0){
			$vo = VoyageOrderPlan::model()->findByAttributes(array('id_voyage_order_plan'=>$id_voyage_order_plan));
			if($vo != null){
				$RES .= '<h5>ORDER PLAN</h5>';
				$RES .= CHtml::encode($vo->BussinessTypeOrder->bussiness_type_order)."\r\n";
				$RES .= '<h6>'.CHtml::encode($vo->VesselTug->VesselName).'-'.CHtml::encode($vo->VesselBarge->VesselName)." (".CHtml::encode($vo->VoyageNumber).")</h6>\r\n";
				$RES .= CHtml::encode($vo->JettyOrigin->JettyName).'-'.CHtml::encode($vo->JettyDestination->JettyName)." [".NumberAndCurrency::formatNumber(CHtml::encode($vo->TotalQuantity))." MT]\r\n";
				$RES .= CHtml::encode($vo->Customer->CompanyName)."\r\n";
				
			}
		}
		
		return $RES;
	}
	
	public static function displayVoyageInfoTextBased($id_voyage_order){
		$vo = VoyageOrder::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order));
		$RES = "";
		if(!empty($vo)){
			$RES .= 'Voyage Number : '.CHtml::encode($vo->VoyageNumber)."\r\n";
			$RES .= 'Vessel : '.CHtml::encode($vo->VesselTug->VesselName).'-'.CHtml::encode($vo->VesselBarge->VesselName)."\r\n";
			$RES .= 'Route : '.CHtml::encode($vo->JettyOrigin->JettyName).'-'.CHtml::encode($vo->JettyDestination->JettyName)."\r\n";
			$RES .= 'Customer : '.CHtml::encode($vo->Quotation->Customer->CompanyName)."\r\n";
			$RES .= 'Loading Date : '.Timeanddate::getDisplayStandardDate(CHtml::encode($vo->StartDate))."\r\n";
			$RES .= 'Quantity : '.NumberAndCurrency::formatNumber(CHtml::encode($vo->Capacity))." MT\r\n";
			$RES .= 'Status : '.VoyageOrderDisplayer::getStatusVoyageOrder(CHtml::encode($vo->status))."\r\n";
		}
		
		return $RES;
	}
	
	public static function displayTabLabelVoyageOrder($_this, $noActive=1){
		for($i=1;$i<=4;$i++)
			$active_status[$i] = false;
			
		$active_status[$noActive] = true;
		
		$_this->menu=array(
			array('label'=>'Create New Voyage Order','url'=>array('voyageorder/propose'), 'active'=>$active_status[1]),
			array('label'=>'Voyage Order','url'=>array('voyageorder/new_vo'), 'active'=>$active_status[2]),
			array('label'=>'Voyage on Sailing','url'=>array('voyageorder/running_vo'), 'active'=>$active_status[3]),
			array('label'=>'Finished VO','url'=>array('voyageorder/finished_vo'), 'active'=>$active_status[4]),
		);
	}
	
	public static function displayTabLabelSailingOrder($_this, $noActive=1, $addLabel = "", $addUrl = ""){
		for($i=1;$i<=4;$i++)
			$active_status[$i] = false;
			
		$active_status[$noActive] = true;
		
		$_this->menu=array(
			array('label'=>'Create Sailing Order','url'=>array('voyageorder/voyageorderlist'), 'active'=>$active_status[1]),
			array('label'=>'Sailing Order List','url'=>array('voyageorder/sailingorderlist'), 'active'=>$active_status[2]),
		);
		
		if($addLabel != ""){
			array_push($_this->menu, array('label'=>ucwords($addLabel),
				'url'=>array('sailingOrder/create'),'active'=>$active_status[3]));
		}
	}
	
	public static function displayTabLabelVoyageClosed($_this, $noActive=1, $addLabel = "", $addUrl = ""){
		for($i=1;$i<=4;$i++)
			$active_status[$i] = false;
			
		$active_status[$noActive] = true;
		
		$_this->menu=array(
			array('label'=>'Close Voyage Order','url'=>array('voyageorder/close_voyage'), 'active'=>$active_status[1]),
		);
		
		if($addLabel != ""){
			array_push($_this->menu, array('label'=>ucwords($addLabel),
				'url'=>array($addUrl),'active'=>$active_status[2]));
		}
	}
	
	/*
	public static function displayVoyageInfo3column($id_voyage_order){
		$vo = VoyageOrder::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order));
		$DISP = "";
		$DISP .= '<div class="view" style="padding:2px; margin:0px;">';
		$DISP .= '<h3>Voyage Info</h3>';
		$DISP .= '<table cellspacing="0" cellpadding="0" border="1">';
		if($vo != null){
			$DISP .= '<tr>';
			$DISP .= '<td>'.FormCommonDisplayer::displayRowInputReadonly("Voyage Number", CHtml::encode($vo->id_voyage_order), "span10").'</td>';
			$DISP .= '<td>'.FormCommonDisplayer::displayRowInputReadonly("Voyage Number", CHtml::encode($vo->id_voyage_order)).'</td>';
			$DISP .= '<td>'.FormCommonDisplayer::displayRowInputReadonly("Voyage Number", CHtml::encode($vo->id_voyage_order)).'</td>';
			$DISP .= '</tr>';
			
			$DISP .= '<tr>';
			$DISP .= '<td>'.FormCommonDisplayer::displayRowInputReadonly("Voyage Number", CHtml::encode($vo->id_voyage_order), "span10").'</td>';
			$DISP .= '<td>'.FormCommonDisplayer::displayRowInputReadonly("Voyage Number", CHtml::encode($vo->id_voyage_order)).'</td>';
			$DISP .= '<td>'.FormCommonDisplayer::displayRowInputReadonly("Voyage Number", CHtml::encode($vo->id_voyage_order)).'</td>';
			$DISP .= '</tr>';
			
			$DISP .= '<tr>';
			$DISP .= '<td>'.FormCommonDisplayer::displayRowInputReadonly("Voyage Number", CHtml::encode($vo->id_voyage_order), "span10").'</td>';
			$DISP .= '<td>'.FormCommonDisplayer::displayRowInputReadonly("Voyage Number", CHtml::encode($vo->id_voyage_order)).'</td>';
			$DISP .= '<td>'.FormCommonDisplayer::displayRowInputReadonly("Voyage Number", CHtml::encode($vo->id_voyage_order)).'</td>';
			$DISP .= '</tr>';

		}else{
			$DISP .= '<div class="alert  alert-error">Voyage Order Info not found.</div>';
		}
		$DISP .= '</table>';
		$DISP .= '</div>';
		
		return $DISP;
	}
	*/


	public static function getDetailmessageNotification($id_voyage_order){
		$content = "";
		$model=VoyageOrder::model()->findByPk($id_voyage_order);

		$content .='Vessel Tug : '.$model->VesselTug->VesselName.'
		Vessel Barge : '.$model->VesselBarge->VesselName.'
		Costumer : '.$model->Quotation->Customer->CompanyName.'
		Voyage Number : '.$model->VoyageNumber.'
		Voyage Order Number : '.$model->VoyageOrderNumber.'
		Bussiness Type Order : '.$model->BussinessTypeOrder->bussiness_type_order.'
		Port Of Loading : '.$model->JettyOrigin->JettyName.'
		Port Of Unloading : '.$model->JettyDestination->JettyName.'
		Capacity : '.$model->Capacity.'
		Price : '.$model->Price." ".$model->Currency->currency.'
		Start Date : '.Yii::app()->dateFormatter->formatDateTime($model->StartDate, "medium","").'
		End Date : '.Yii::app()->dateFormatter->formatDateTime($model->EndDate, "medium","");
		
		return $content;

	}
}
?>