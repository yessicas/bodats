<?php
class StandardFuelDB {	
	public static function getStandardFuel($id_vessel_tug, $id_vessel_barge, $id_start, $id_end, $fuel_price=1){
		//Get Tug Vessel
		$TUG = Vessel::model()->findByAttributes(array('id_vessel'=>$id_vessel_tug, 'VesselType'=>'TUG'));
		$TUG_POWER = 0;
		if(isset($TUG_POWER)){
			$TUG_POWER = $TUG->Power;
		}
		//echo $TUG_POWER;
		
		//Get Barge Vessel
		$BARGE = Vessel::model()->findByAttributes(array('id_vessel'=>$id_vessel_barge, 'VesselType'=>'BARGE'));
		$BARGE_SIZE = 0;
		if(isset($BARGE)){
			$BARGE_SIZE = $BARGE->BargeSize;
		}
		//echo $BARGE_SIZE;
		
		//Get Standard Fuel;
		$STANDARD = StandardFuel::model()->findByAttributes(
			array(
				'type_set_power'=>$TUG_POWER,
				'type_set_feet'=>$BARGE_SIZE, 
				'JettyIdStart'=>$id_start,
				'JettyIdEnd'=>$id_end, 
			));
		
		//Posting ke Result
		$RESULT = new StandardFuelResult();
		if(isset($STANDARD)){
			$RESULT->fuel = $STANDARD->total_bbm_new;
			$RESULT->cycle_time = $STANDARD->cycle_time;
			$RESULT->lay_time = $STANDARD->lay_time;
			$RESULT->sailing_time = $STANDARD->sailing_time;
			$RESULT->jarak = $STANDARD->jarak;
		}
		
		return $RESULT;
	}	 
	
	/*public static function getSpStandardFuel($id_vessel_tug, $id_vessel_barge, $id_start, $id_end, $fuel_price=1){
		//Get Tug Vessel
		$TUG = Vessel::model()->findByAttributes(array('id_vessel'=>$id_vessel_tug, 'VesselType'=>'TUG'));
		$TUG_POWER = 0;
		if(isset($TUG_POWER)){
			$TUG_POWER = $TUG->Power;
		}
		//echo $TUG_POWER;
		
		//Get Barge Vessel
		$BARGE = Vessel::model()->findByAttributes(array('id_vessel'=>$id_vessel_barge, 'VesselType'=>'BARGE'));
		$BARGE_SIZE = 0;
		if(isset($BARGE)){
			$BARGE_SIZE = $BARGE->BargeSize;
		}
		//echo $BARGE_SIZE;
		
		//Get Standard Fuel;
		$STANDARD = SpStandardFuel::model()->findByAttributes(
			array(
				'type_set_power'=>$TUG_POWER,
				'type_set_feet'=>$BARGE_SIZE, 
				'JettyIdStart'=>$id_start,
				'JettyIdEnd'=>$id_end, 
			));
		
		//Posting ke Result
		$RESULT = new StandardFuelResult();
		if(isset($STANDARD)){
			$RESULT->fuel = $STANDARD->total_bbm_new;
			$RESULT->cycle_time = $STANDARD->cycle_time;
			$RESULT->lay_time = $STANDARD->lay_time;
			$RESULT->sailing_time = $STANDARD->sailing_time;
		}
		
		return $RESULT;
	}*/
}

class StandardFuelResult{
	var $fuel = 0;
	var $cycle_time = 0;
	var $lay_time = 0;
	var $sailing_time = 0;
	var $jarak = 0;
}	

?>