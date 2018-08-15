<?php
class InvoiceDisplayer {	
	public static function displayTabInvoiceVoyage($_this, $noActive=1, $addLabel = "", $addUrl = ""){
		for($i=1;$i<=4;$i++)
			$active_status[$i] = false;
			
		$active_status[$noActive] = true;
		
		$_this->menu=array(
			array('label'=>'Preparation Create Invoice','url'=>array('voyageorder/finishvoyage'), 'active'=>$active_status[1]),
			array('label'=>'Manage Created Invoice','url'=>array('voyageorder/invoicevoyage'), 'active'=>$active_status[2]),
			array('label'=>'Multiple Invoice Voyage','url'=>array('voyageorder/multipleInvoiceVoyage'), 'active'=>$active_status[4]),
			//array('label'=>'Rejected PR','url'=>array('purchaserequest/adminapproved/approved/2'), 'active'=>$active_status[3]),
		);
		
		if($addLabel != ""){
			array_push($_this->menu, array('label'=>ucwords($addLabel),
				'url'=>array($addUrl),'active'=>$active_status[$noActive]));
		}
	}

}
?>