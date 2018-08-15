<?php
class VoyageOrderDB {
	public static function getShortVoyageInfo($id_voyage_order){ // di grid close voyage 
		$model=VoyageOrder::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order));
		if($model){
			return $model->VesselTug->VesselName." - ".$model->VesselBarge->VesselName." (".$model->VoyageNumber.")";
		}else{
			return "--";
		}
	}
	
	public static function getVOfromSchedule($id_schedule){
		$sche = Schedule::model()->findByPk($id_schedule);
		if($sche != null){
			return $sche->id_voyage_order;
		}
		
		return 0;
	}
	
	public static function updateActualDuration($id_voyage_order, $actual_duration){
		$model = VoyageOrder::model()->findByPk($id_voyage_order);
		if($model != null){
			$model->cc_act_duration = $actual_duration;
			
			if($model->validate()){
				if($model->save()){
					//echo "Save Success!"; exit();
					return $model;
				}else{
					//echo "Save Failed!";
					return false;
				}
			}else{
				//echo "validate fail";
				echo CHtml::errorSummary($model); exit();
				return false;
			}
		}
	}
	
	public static function updateActualDate($id_voyage_order, $date, $mode="end"){
		$model = VoyageOrder::model()->findByPk($id_voyage_order);
		if($model != null){
			if($mode == "end")
				$model->ActualEndDate = $date;
				
			if($mode == "start")
				$model->ActualStartDate = $date;
			
			if($model->validate()){
				if($model->save()){
					//echo "Save Success!"; exit();
					return $model;
				}else{
					//echo "Save Failed!";
					return false;
				}
			}else{
				//echo "validate fail";
				echo CHtml::errorSummary($model); exit();
				return false;
			}
		}
	}
	
	public static function updateActualfuel($id_voyage_order){
		$model = VoyageOrder::model()->findByPk($id_voyage_order);
		
		if($model != null){
			
			if($model->validate()){
				if($model->save()){
					//echo "Save Success!"; exit();
					return $model;
				}else{
					//echo "Save Failed!";
					return false;
				}
			}else{
				//echo "validate fail";
				echo CHtml::errorSummary($model); exit();
				return false;
			}
		}
	}
	
	public static function getSailingOrder($id_voyage_order){ // di grid close voyage 
		$model=SailingOrder::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order));
		if($model){
			return true;
		}else{
			return false;
		}
	}

}
?>