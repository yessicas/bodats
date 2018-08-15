<?php
class MasterScheduleDB {
	public static function getScheduleVessel($startdate, $enddate, $id_vessel_tug){
		/*
		$sql = "
			SELECT * FROM `schedule` WHERE StartDate >= '2014-12-01' AND StartDate <= '2014-12-31'
			AND VesselTugId = '1760002' 
			UNION
			SELECT * FROM `schedule` WHERE `EndDate` >= '2014-12-01' AND EndDate <= '2014-12-31'
			AND VesselTugId = '1760002'
		";
		*/
		
		$sql = "
			SELECT * FROM `schedule` WHERE `EndDate` >= '".$startdate."' AND EndDate <= '".$enddate."'
			AND VesselTugId = '".$id_vessel_tug."' 
			
			UNION
			
			SELECT * FROM `schedule` WHERE StartDate >= '".$startdate."' AND StartDate <= '".$enddate."'
			AND VesselTugId = '".$id_vessel_tug."' 
			
			ORDER BY StartDate ASC
		";
		//echo $sql;
		$listall = Schedule::model()->findAllBySql($sql);
		return $listall;
	}
	
	public static function getScheduleVesselBarge($startdate, $enddate, $id_vessel_barge){		
		$sql = "
			SELECT * FROM `schedule` WHERE `EndDate` >= '".$startdate."' AND EndDate <= '".$enddate."'
			AND VesselBargeId = '".$id_vessel_barge."' 
			
			UNION
			
			SELECT * FROM `schedule` WHERE StartDate >= '".$startdate."' AND StartDate <= '".$enddate."'
			AND VesselBargeId = '".$id_vessel_barge."' 
			
			ORDER BY StartDate ASC
		";
		//echo $sql;
		$listall = Schedule::model()->findAllBySql($sql);
		return $listall;
	}
	
	public static function getScheduleVesselTugBarge($startdate, $enddate, $id_vessel_tug, $id_vessel_barge){		
		$sql = "
			SELECT * FROM `schedule` WHERE `EndDate` >= '".$startdate."' AND EndDate <= '".$enddate."'
			AND VesselBargeId = '".$id_vessel_barge."' AND VesselTugId = '".$id_vessel_tug."' 
			
			UNION
			
			SELECT * FROM `schedule` WHERE StartDate >= '".$startdate."' AND StartDate <= '".$enddate."'
			AND VesselBargeId = '".$id_vessel_barge."' AND VesselTugId = '".$id_vessel_tug."' 
			
			ORDER BY StartDate ASC
		";
		//echo $sql;
		$listall = Schedule::model()->findAllBySql($sql);
		return $listall;
	}
	
	public static function getScheduleVesselOnRange($startdate, $enddate){		
		$sql = "
			SELECT DISTINCT VesselTugId, VesselBargeId FROM `schedule` WHERE `EndDate` >= '".$startdate."' AND EndDate <= '".$enddate."'
			
			UNION
			
			SELECT DISTINCT VesselTugId, VesselBargeId FROM `schedule` WHERE StartDate >= '".$startdate."' AND StartDate <= '".$enddate."'
			
			
			ORDER BY VesselTugId ASC
		";
		//echo $sql;
		$listall = Schedule::model()->findAllBySql($sql);
		return $listall;
	}
	
	public static function getScheduleVesselPlan($startdate, $enddate, $id_vessel_tug){
		$sql = "
			SELECT * FROM `schedule_plan` WHERE `schedule_date` >= '".$startdate."' AND schedule_date <= '".$enddate."'
			AND VesselTugId = '".$id_vessel_tug."' 
			
			UNION
			
			SELECT * FROM `schedule_plan` WHERE schedule_date >= '".$startdate."' AND schedule_date <= '".$enddate."'
			AND VesselTugId = '".$id_vessel_tug."' 
			
			ORDER BY schedule_date ASC
		";
		//echo $sql;
		$listall = SchedulePlan::model()->findAllBySql($sql);
		return $listall;
	}
	
	public static function getScheduleVesselActual($startdate, $enddate, $id_vessel_tug){
		$sql = "
			SELECT * FROM `schedule_actual` WHERE `schedule_date` >= '".$startdate."' AND schedule_date <= '".$enddate."'
			AND VesselTugId = '".$id_vessel_tug."' 
			
			UNION
			
			SELECT * FROM `schedule_actual` WHERE schedule_date >= '".$startdate."' AND schedule_date <= '".$enddate."'
			AND VesselTugId = '".$id_vessel_tug."' 
			
			ORDER BY schedule_date ASC
		";
		//echo $sql;
		$listall = ScheduleActual::model()->findAllBySql($sql);
		return $listall;
	}
	
	public static function saveCrewPayroll($CrewId, $id_payroll_item, $amount, $effective_date, $legal_document, $id_currency){
		$model = CrewPayroll::model()->findByAttributes(array( 'CrewId'=>$CrewId, 'id_payroll_item'=>$id_payroll_item  ));
		if($model == null){
			$model = new CrewPayroll();
		}
		
		$model = LogUserUpdated::setUserCreated($model);
		$model->CrewId = $CrewId;
		$model->id_payroll_item = $id_payroll_item;
		$model->amount = $amount;
		$model->effective_date = $effective_date;
		$model->legal_document = $legal_document;
		$model->id_currency = $id_currency;
		
		if($model->validate()){
			if($model->save()){
				//echo "Save Berhasil!";
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
	}

}
?>