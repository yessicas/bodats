<?php
class ReportPO {
	
	
	public static function getPRNumber($data){
		if($data->id_po_category != 10400){
			if(isset($data->PurchaseRequest)){
				return $data->PurchaseRequest->PRNumber;
			}else{
				return ' --- [ID PR: ('.$data->id_purchase_request.')]';
			}
		}else{
			$model = PurchaseRequestDetail::model()->findByPk($data->id_purchase_request);
			if(isset($model->PurchaseRequest)){
				return $model->PurchaseRequest->PRNumber;
			}else{
				return ' --- [ID PR: ('.$data->id_purchase_request.')]';
			}
		}
	}

	public static function getPONumber($data){
		if(isset($data->PO)){
			return $data->PO->PONumber;
		}else{
			return '-';
		}
	}

	public static function getPODate($data){
		if(isset($data->PO)){
			return Timeanddate::getDisplayReportDate($data->PO->PODate);
		}else{
			return '-';
		}
	}
	
	public static function getVesselOrVoyage($data){
		if(isset($data->PO)){
			return PurchaseRequestDB::getDedicatedToVesselOrVoyageFromPO($data->PO);
		}else{
			return '-';
		}
	}
	
	public static function getPOCategory($data){
		if(isset($data->PoCategory)){
			return $data->PoCategory->category_name;
		}else{
			return '';
		}
	}
	
	public static function getQuantity($data){
		return NumberAndCurrency::formatNumber($data->quantity);
	}
	
	public static function getPrice($data){
		return NumberAndCurrency::formatCurrency($data->price_unit);
	}
	
	public static function getSubTotal($data){
		return NumberAndCurrency::formatCurrency($data->quantity*$data->price_unit);
	}
	
	public static function getPPN($data){
		if(isset($data->PO)){
			return $data->PO->ppn." %";
		}else{
			return '-';
		}
	}
	
	public static function getPPH15($data){
		if(isset($data->PO)){
			return $data->PO->pph15." %";
		}else{
			return '-';
		}
	}
	
	public static function getPPH23($data){
		if(isset($data->PO)){
			return $data->PO->pph23." %";
		}else{
			return '-';
		}
	}

	public static function getCurrency($data){
		if(isset($data->Currency)){
			return $data->Currency->currency;
		}else{
			return '-';
		}
	}
	
	public static function getVendor($data){
		if(isset($data->PO)){
			if($data->PO->Vendor){
				return $data->PO->Vendor->VendorName;
			}else{
				return '--';
			}
		}else{
			return '-';
		}
	}
	
	public static function getDeliveryDate($data){
		if(isset($data->PO)){
			return Timeanddate::getDisplayReportDate($data->PO->DeliveryDateRangeStart);
		}else{
			return '-';
		}	
	}
	public static function getPOMonth($data){
		if(isset($data->PO)){
			return $data->PO->POMonth;
		}else{
			return '-';
		}	
	}
	
	public static function getPODeliveryPlace($data){
		if(isset($data->PO)){
			return $data->PO->DeliveryPlace;
		}else{
			return '-';
		}	
	}
	
	public static function getPONotes($data){
		if(isset($data->PO)){
			return $data->PO->PONotes;
		}else{
			return '-';
		}	
	}
	
	public static function getColumnLabelReportPO(){
		$columnlabel = array();
		
		$columnlabel[] = "NO";
		$columnlabel[] = "PR Number";
		$columnlabel[] = "PO Number";
		$columnlabel[] = "PO Date";
		$columnlabel[] = "Vessel / Voyage";
		$columnlabel[] = "Item";
		$columnlabel[] = "Category";
		$columnlabel[] = "PO Notes";
		$columnlabel[] = "Qty";
		$columnlabel[] = "Prices";
		$columnlabel[] = "Sub Total";
		$columnlabel[] = "UM";
		$columnlabel[] = "PPN";
		$columnlabel[] = "PPH 15";
		$columnlabel[] = "PPH 23";
		$columnlabel[] = "Currency";
		$columnlabel[] = "Vendor";
		$columnlabel[] = "Delivery Date";
		$columnlabel[] = "PO Month";
		$columnlabel[] = "Delivery Place";
		
		/*
			$col1 = ReportPO::getPRNumber($data);
			echo $col1.$separator;
			$col1 = ReportPO::getPONumber($data);
			echo $col1.$separator;
			$col1 = ReportPO::getPODate($data);
			echo $col1.$separator;
			$col1 = ReportPO::getVesselOrVoyage($data);
			echo $col1.$separator;
			$col1 = PurchaseRequestDB::getItemDetailPR($data);
			echo $col1.$separator;
			$col1 = ReportPO::getPOCategory($data);
			echo $col1.$separator;
			$col1 = ReportPO::getQuantity($data);
			echo $col1.$separator;
			$col1 = ReportPO::getPrice($data);
			echo $col1.$separator;
			$col1 = ReportPO::getSubTotal($data);
			echo $col1.$separator;
			$col1 = $data->metric;
			echo $col1.$separator;
			$col1 = ReportPO::getPPN($data);
			echo $col1.$separator;
			$col1 = ReportPO::getPPH15($data);
			echo $col1.$separator;
			$col1 = ReportPO::getPPH23($data);
			echo $col1.$separator;
			$col1 = ReportPO::getCurrency($data);
			echo $col1.$separator;
			$col1 = ReportPO::getVendor($data);
			echo $col1.$separator;
			$col1 = ReportPO::getDeliveryDate($data);
			echo $col1.$separator;
			$col1 = ReportPO::getPOMonth($data);
			echo $col1.$separator;
			$col1 = ReportPO::getPODeliveryPlace($data);
			echo $col1.$separator;
		*/
		
		return $columnlabel;
	}
}
?>