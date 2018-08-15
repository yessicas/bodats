<?php
class StandardAgencyDB {	
	public static function getStandardAgency($id_vessel_tug, $id_vessel_barge, $id_start, $id_end){

		$RESULT = StandardAgency::model()->findByAttributes(array('JettyIdStart'=>$id_start, 'JettyIdEnd'=>$id_end));
		if($RESULT != null){
			$agency = new StandardAgencyResult();
			$agency->fix_cost = $RESULT->agency_fix_cost;
			$agency->var_cost = $RESULT->agency_var_cost;
			return $agency;
		}else{
			return new StandardAgencyResult();
		}
	}	

	//Untuk SP
	public static function getSpStandardAgency($id_vessel_tug, $id_vessel_barge, $id_start, $id_end){

		$RESULT = SpStandardFuel::model()->findByAttributes(array('JettyIdStart'=>$id_start, 'JettyIdEnd'=>$id_end));
		if($RESULT != null){
			$agency = new StandardAgencyResult();
			$agency->fix_cost = $RESULT->agency_rate;
			//$agency->var_cost = $RESULT->agency_var_cost;
			return $agency;
		}else{
			return new StandardAgencyResult();
		}
	}
		
}

class StandardAgencyResult{
	var $fix_cost = 0;
	var $var_cost = 0;
}	

?>