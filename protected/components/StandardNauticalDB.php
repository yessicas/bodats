<?php
class StandardNauticalDB {	
	public static function getNauticalIncentifStandard(){
		//Get Tug Vessel
		$STD = SettingGeneral::model()->findByAttributes(array('field_name'=>'STANDARD INCENTIVE NAUTICAL'));
		if($STD != null){
			return $STD->field_value;
		}
		
		return 10000; //Default Value Kalau Tidak Ketemu
	}	 
}
?>