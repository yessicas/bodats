<?php
class StandardVesselCostDB {	
	public static function getStandardVesselCost($id_vessel_tug, $id_vessel_barge, $id_start, $id_end){
		$TugVessel = VesselDB::getVessel($id_vessel_tug);
		$BargeVessel = VesselDB::getVessel($id_vessel_barge);
		
		//Depreciation Cost
		$TugCost = StandardVesselCost::model()->findByAttributes(array('id_vessel'=>$id_vessel_tug));
		$depreciation = 0;
		if(isset($TugCost)){
			$depreciation = $TugCost->depreciation_cost;
		}
	}	

	/*public static function getSpStandardVesselCost($id_vessel_tug, $id_vessel_barge, $id_start, $id_end){
		$TugVessel = VesselDB::getVessel($id_vessel_tug);
		$BargeVessel = VesselDB::getVessel($id_vessel_barge);
		
		//Depreciation Cost
		$TugCost = SpStandardVesselCost::model()->findByAttributes(array('id_vessel'=>$id_vessel_tug));
		$depreciation = 0;
		if(isset($TugCost)){
			$depreciation = $TugCost->depreciation_cost;
		}
	}*/	
}

?>