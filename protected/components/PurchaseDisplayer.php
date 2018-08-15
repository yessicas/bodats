<?php
class PurchaseDisplayer {	
	public static function displayTabLabelPRVoyage($TypePR, $label, $_this, $noActive=1, $addLabel = "", $addUrl = ""){
		for($i=1;$i<=4;$i++)
			$active_status[$i] = false;
		
		if($noActive > 0)
			$active_status[$noActive] = true;
		
		$_this->menu=array(		
			array('label'=>'Manage '.$TypePR .' '.TextDisplayHelper::displayLabelFromMode($label),
				'url'=>array('voyageorder/prvoyage/mode/'.$label), 'active'=>$active_status[1]),
			
			array('label'=>'Approved '.$TypePR .' '.TextDisplayHelper::displayLabelFromMode($label),
				'url'=>array('purchaserequest/admvoyageapproved/mode/'.$label.'/approved/1'), 'active'=>$active_status[2]),
			array('label'=>'Rejected '.$TypePR .' '.TextDisplayHelper::displayLabelFromMode($label),
				'url'=>array('purchaserequest/admvoyageapproved/mode/'.$label.'/approved/0'), 'active'=>$active_status[3]),
			//array('label'=>'Create '.$TypePR.' '.TextDisplayHelper::displayLabelFromMode($label),'url'=>array('purchaserequest/create'),'active'=>$active_status[4]),
		);
		
		if($addLabel != ""){
			array_push($_this->menu, array('label'=>ucwords($addLabel).' '.$TypePR.' '.TextDisplayHelper::displayLabelFromMode($label),
				'url'=>array('purchaserequest/create'),'active'=>$active_status[4]));
		}
	}
	
	public static function displayTabLabelPRApproval($_this, $noActive=1, $addLabel = "", $addUrl = ""){
		for($i=1;$i<=4;$i++)
			$active_status[$i] = false;
			
		$active_status[$noActive] = true;
		$modeVar=(isset($_GET['mode'])) ?  $_GET['mode'] : '';
		$_this->menu=array(
			array('label'=>'Manage PR Approval','url'=>array('purchaserequest/adminapproval','mode'=>$modeVar), 'active'=>$active_status[1]),
			array('label'=>'Approved PR','url'=>array('purchaserequest/adminapproved/approved/1','mode'=>$modeVar), 'active'=>$active_status[2]),
			array('label'=>'Rejected PR','url'=>array('purchaserequest/adminapproved/approved/2','mode'=>$modeVar), 'active'=>$active_status[3]),
		);
		
		if($addLabel != ""){
			array_push($_this->menu, array('label'=>ucwords($addLabel),
				'url'=>array($addUrl),'active'=>$active_status[$noActive]));
		}
	}
	
	public static function displayTabLabelPOFromPR($_this, $noActive=1, $addLabel = "", $addUrl = ""){
		for($i=1;$i<=4;$i++)
			$active_status[$i] = false;
			
		$active_status[$noActive] = true;
		
		$_this->menu=array(
			array('label'=>'Create PO From PR','url'=>array('purchaseorder/managepo'), 'active'=>$active_status[1]),
			//array('label'=>'Create PO From Item PR','url'=>array('purchaseorder/managepritem'), 'active'=>$active_status[2]),
			array('label'=>'Manage Purchase Order (PO)','url'=>array('purchaseorder/admin'), 'active'=>$active_status[2]),
			//array('label'=>'Rejected PR','url'=>array('purchaserequest/adminapproved/approved/2'), 'active'=>$active_status[3]),
		);
		
		if($addLabel != ""){
			array_push($_this->menu, array('label'=>ucwords($addLabel),
				'url'=>array($addUrl),'active'=>$active_status[$noActive]));
		}
	}
	
	public static function displayTabLabelPOMultipleFromPR($_this, $noActive=1, $addLabel = "", $addUrl = ""){
		for($i=1;$i<=4;$i++)
			$active_status[$i] = false;
			
		$active_status[$noActive] = true;
		
		$_this->menu=array(
			array('label'=>'PO from multiple item','url'=>array('purchaseorder/managepritem/mode/cs_part_asset'), 'active'=>$active_status[1]),
			//array('label'=>'Create PO From Item PR','url'=>array('purchaseorder/managepritem'), 'active'=>$active_status[2]),
			array('label'=>'Manage Purchase Order (PO)','url'=>array('purchaseorder/admin'), 'active'=>$active_status[2]),
			//array('label'=>'Rejected PR','url'=>array('purchaserequest/adminapproved/approved/2'), 'active'=>$active_status[3]),
		);
		
		if($addLabel != ""){
			array_push($_this->menu, array('label'=>ucwords($addLabel),
				'url'=>array($addUrl),'active'=>$active_status[$noActive]));
		}
	}
	
	public static function getStatusPurchaseRequest($mode){
		$RES = '';
		switch($mode){
			case "PR":
				$RES = "PROPOSED";
				break;
				
			case "PR REJECTED":
				$RES = "REJECTED";
				break;
				
			case "PR APPROVED":
				$RES = "APPROVED";
				break;
				
			case "PO":
				$RES = "Purchase Order (PO)";
				break;
				
			case "GOOD RECEIVE":
				$RES = "GOOD RECEIVE";
				break;
		}
		
		return $RES;
	}
	
	public static function getPurchaseRequestShortInformation($id_purchase_request){
		$model = PurchaseRequest::model()->findByAttributes(array('id_purchase_request'=>$id_purchase_request));
		if($model != null){
			$INFO = "PR Number : ".$model->PRNumber;
			return $INFO;
		}
		
		return "";
	}
}
?>