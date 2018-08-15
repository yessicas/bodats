<?php
class BusinessTypeOrder {
	public static function getJenisMuatan($model) {
		switch($model->id_bussiness_type_order){
			case 100:
				return "Batubara";
			
			case 200:
				return "Batubara";
				
			case 400:
				return "Oil and Gas";
				
			case 500:
				return "Cement";
				
			case 600:
				return "Non Coal";
		}
	}
}
?>