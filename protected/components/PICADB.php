<?php
class PICADB {
	public static function getPICAPRStatus($id_purchase_request){ // di grid close voyage 
		$model=PurchaseRequestPica::model()->findByAttributes(array('id_purchase_request'=>$id_purchase_request));
		if($model){
			return 1;
		}else{
			return 0;
		}
	}

}
?>