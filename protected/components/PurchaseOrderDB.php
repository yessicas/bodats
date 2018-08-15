<?php
class PurchaseOrderDB {
	public static function getPurchaseOrder($id_purchase_request_item){
		$modelpritem = PurchaseRequest::model()->findByPk($id_purchase_request_item);
		$id_purchase_request = 0;
		if(!empty($modelpritem)){
			$id_purchase_request = $modelpritem->id_purchase_request;
		}else{
			return new PurchaseOrder();
		}
		
		$modelpr = PurchaseRequest::model()->findByPk($id_purchase_request);
		$id_purchase_order = 0;
		if(!empty($modelpr)){
			$id_purchase_order = $modelpr->id_purchase_order;
		}else{
			return new PurchaseOrder();
		}
		
		$model = PurchaseOrder::model()->findByPk($id_purchase_order);
		if(empty($model)){
			$model = new PurchaseOrder();
		}
		
		return $model;
	}
	
	public static function getPurchaseOrderOld($id_purchase_request){
		$modelpr = PurchaseRequest::model()->findByPk($id_purchase_request);
		$id_purchase_order = 0;
		if(!empty($modelpr)){
			$id_purchase_order = $modelpr->id_purchase_order;
		}
		
		$model = PurchaseOrder::model()->findByPk($id_purchase_order);
		if(empty($model)){
			$model = new PurchaseOrder();
		}
		
		return $model;
	}
	
	public static function updatePRbecomePO($id_purchase_request, $id_purchase_order){
		$modelpr = PurchaseRequest::model()->findByPk($id_purchase_request);

		if(!empty($modelpr)){
			//Update PR

			$modelpr->id_purchase_order = $id_purchase_order;
			$modelpr->Status='PO';
			if($modelpr->validate()){
				$modelpr->save();
			}else{
				echo CHtml::errorSummary($model);
			}
		}
	}
	
	public static function updatePRItemDetailbecomePO($id_purchase_request_detail, $id_purchase_order_detail){
		$modelpr = PurchaseRequestDetail::model()->findByPk($id_purchase_request_detail);

		if(!empty($modelpr)){
			//Update PR
			$modelpr->id_purchase_order_detail = $id_purchase_order_detail;
			$modelpr->Status='PO';
			if($modelpr->validate()){
				$modelpr->save();
			}else{
				echo CHtml::errorSummary($model);
			}
		}
	}

	public static function savePurchaseOrder($id_purchase_request,$is_mutliple_item=false){
		/*
		$modelpr = PurchaseRequest::model()->findByPk($id_purchase_request);
		$id_purchase_order = 0;
		if(!empty($modelpr)){
			$id_purchase_order = $modelpr->id_purchase_order;
		}
		//echo $id_purchase_order; exit();
		
		$model = PurchaseOrder::model()->findByPk($id_purchase_order);
		if(empty($model)){
			$model = new PurchaseOrder();
		}
		*/
		
		$model = PurchaseOrderDB::getPurchaseOrder($id_purchase_request);
		
		//Get Related PR
		//$modelpr = PurchaseRequest::model()->findByAttributes(array('id_purchase_request'=>$id_purchase_request));
		$modelpr = PurchaseRequest::model()->findByPk($id_purchase_request);
		
		//Save PO First
		$model->attributes=$_POST['PurchaseOrder'];
		$model->id_purchase_request=$id_purchase_request;
		$model->Status='PO';
		if($is_mutliple_item){
			$model->is_mutliple_item = 1;
		}
		$model = LogUserUpdated::setUserCreated($model);
		if($model->id_vendor > 0)
			$model->TermOfPayment=Vendor::model()->findByPk($model->id_vendor)->getTermOfPayment();
		else
			$model->TermOfPayment = 0;
		
		if($model->validate()){
			
			if($model->save()){
				//echo "Save Berhasil!";
				
				// insert nomornya
				$modelNew= new PurchaseOrder;
				$updateModel=PurchaseOrder::model()->findByPk($model->id_purchase_order);
				$dataformatnumber=NumberingDocumentDBPurchaseOrder::getFormatNumber($updateModel,'id_purchase_order','PONo','POMonth','POYear',$model->id_purchase_order);
				$updateModel->PONumber = $dataformatnumber['NumberFormat']; 
				$updateModel->PONo = $dataformatnumber['NoOrder']; 
				$updateModel->POMonth = NumberingDocumentDBPurchaseOrder::getMonthNow(); 
				$updateModel->POYear = NumberingDocumentDBPurchaseOrder::getYearNow(); 
				$updateModel->save(false);
				
			
				return $model;
			}else{
				//echo "Save Gagal!";
				//return false;
			}
		}else{
			//echo "validate fail";
			echo CHtml::errorSummary($model); exit();
			//return false;
		}
		
		return $model;
	}
	
	public static function saveUpdatePurchaseOrder($model){
		$model->attributes=$_POST['PurchaseOrder'];
		if($model->validate()){
			
			if($model->save()){
				//echo "Save Berhasil!";			
				return $model;
			}else{
				//echo "Save Gagal!";
				//return false;
			}
		}else{
			//echo "validate fail";
			echo CHtml::errorSummary($model); exit();
			//return false;
		}
		
		return $model;
	}
	
	public static function savePurchaseOrderItem($id_purchase_request_detail, $id_purchase_request, $id_purchase_order, $quantity, $metric, $price_unit, $id_currency, $ppn, $notes="" ){
		//echo 'id_purchase_request_detail'.$id_purchase_request_detail.'<br>';
		$model = PurchaseOrderDetail::model()->findByAttributes(array('id_purchase_request_detail'=>$id_purchase_request_detail, 
									'id_purchase_request'=>$id_purchase_request));
		//$model = PurchaseOrderDetail::model()->findByPk($id_purchase_request_detail);
		if(empty($model)){
			$model = new PurchaseOrderDetail();
		}
		
		$model->id_purchase_request_detail=$id_purchase_request_detail;
		$model->id_purchase_order=$id_purchase_order;
		$model->id_purchase_request=$id_purchase_request;
		$model->quantity=$quantity;
		$model->metric=$metric;
		$model->price_unit=$price_unit;
		$model->id_currency=$id_currency;
		$model->ppn=$ppn;
		$model->notes=$notes;
		
		$modelprdet = null;
		if($id_purchase_request_detail > 0){
			//Jika Item detailnya ada maka diambilkan dari purchase order deteil
			$modelprdet = PurchaseRequestDetail::model()->findByPk(array('id_purchase_request_detail'=>$id_purchase_request_detail));
			$model->purchase_item_table = $modelprdet->purchase_item_table;
			$model->id_item = $modelprdet->id_item;
		}else{
			$model->purchase_item_table = "single";
			$model->id_item = 0;
		}
		
		$modelpr = PurchaseRequest::model()->findByPk($id_purchase_request);
		$model->id_po_category = $modelpr->id_po_category;
		
		//$model->Status='PO';
		$model = LogUserUpdated::setUserCreated($model);
		
		if($model->validate()){
			if($model->save()){
				//echo "Save Berhasil!".$model->id_purchase_order_detail.'<br>';
				//Update Status
				if($modelprdet != null){
					$modelprdet->id_purchase_order_detail = $model->id_purchase_order_detail;
					$modelprdet->status='PO';
					$modelprdet->save();
				}
				
				return $model;
			}else{
				//echo "Save Gagal!";
				return false;
			}
		}else{
			//echo "validate fail";
			//echo CHtml::errorSummary($model);
			return false;
		}
		
		return $model;
	}
	
	public static function savePurchaseOrderItemModeSelectItem($id_purchase_request_detail, $id_purchase_request, $id_purchase_order, $quantity, $metric, $price_unit, $id_currency, $ppn, $notes="" ){
		//echo 'id_purchase_request_detail'.$id_purchase_request_detail.'<br>';
		
		$model = PurchaseOrderDetail::model()->findByAttributes(array('id_purchase_request_detail'=>$id_purchase_request_detail, 
									'id_purchase_request'=>$id_purchase_request));
		//$model = PurchaseOrderDetail::model()->findByPk($id_purchase_request_detail);
		if(empty($model)){
			$model = new PurchaseOrderDetail();
		}
		
		$model->id_purchase_request_detail=$id_purchase_request_detail;
		$model->id_purchase_order=$id_purchase_order;
		$model->id_purchase_request=$id_purchase_request; // ini bermasalah
		$model->quantity=$quantity;
		$model->metric=$metric;
		$model->price_unit=$price_unit;
		$model->id_currency=$id_currency;
		$model->ppn=$ppn;
		$model->notes=$notes;
		
		$modelprdet = null;
		if($id_purchase_request_detail > 0){
			//Jika Item detailnya ada maka diambilkan dari purchase order deteil
			$modelprdet = PurchaseRequestDetail::model()->findByPk(array('id_purchase_request_detail'=>$id_purchase_request_detail));
			$model->purchase_item_table = $modelprdet->purchase_item_table;
			$model->id_item = $modelprdet->id_item;
		}else{
			$model->purchase_item_table = "single";
			$model->id_item = 0;
		}
		
		$modelpr = PurchaseRequestDetail::model()->findByPk($id_purchase_request_detail);
		$model->id_po_category = $modelpr->id_po_category;
		
		//$model->Status='PO';
		$model = LogUserUpdated::setUserCreated($model);
		
		if($model->validate()){
			if($model->save()){
				//echo "Save Berhasil!".$model->id_purchase_order_detail.'<br>';
				//Update Status
				if($modelprdet != null){
					$modelprdet->id_purchase_order_detail = $model->id_purchase_order_detail;
					$modelprdet->status='PO';
					$modelprdet->save();
				}
				
				return $model;
			}else{
				//echo "Save Gagal!";
				return false;
			}
		}else{
			//echo "validate fail";
			echo CHtml::errorSummary($model); exit();
			return false;
		}
		
		return $model;
	}
}
?>