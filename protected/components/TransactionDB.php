<?php
class TransactionDB {
	
	
	public static function getStatusTransaction(){
		
		$array=array(
			'QUOTATION'=>'QUOTATION',
			'SHIPPING ORDER'=>'SHIPPING ORDER',
			'VO CREATE'=>'VO CREATE',
			'VO SAILING'=>'VO SAILING',
			'VO FINISH'=>'VO FINISH',
			'VO DOC COMPLETE'=>'VO DOC COMPLETE',
			'INVOICE'=>'INVOICE',
			'PAY'=>'PAY'
		);
		
		return $array;

	}

	
}
?>