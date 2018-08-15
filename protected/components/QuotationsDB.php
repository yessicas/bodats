<?php
class QuotationsDB {	


	public static function getvisiblemanage($data){

			if($data->id_bussiness_type_order==100){ // jika barging
				if($data->Status=="QUOTATION"&&$data->BargingJettyIdStart!=0){
					return true;
				}else{
					return false;
				}
			}

			if($data->id_bussiness_type_order==200){ // jika transhipmnent
				if($data->Status=="QUOTATION"&&$data->BargingJettyIdStart!=0){
					return true;
				}else{
					return false;
				}
			}

			if($data->id_bussiness_type_order==300){ //jika time chrater
				if($data->Status=="QUOTATION"&&$data->BargingVesselTug!=0){
					return true;
				}else{
					return false;
				}
			}

	     
	      }

		 
}

	




?>