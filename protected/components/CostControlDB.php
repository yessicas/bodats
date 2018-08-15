<?php
class CostControlDB {	
	public static function getStatusVoyageStatusStandard($id_voyage_order){
		$model = VoyageCostStandard::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order));
		if($model != null){
			return  true;
		}
		
		return false;
	}	
	
	public static function getFuelIncentive($id_voyage_order, $type="FUEL"){
		$model = VoyageIncentive::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order, 'type_incentive'=>$type));
		if($model != null){
			return $model->amount;
		}
		
		return 0;
	}
	
	public static function getCrewCost($id_tug, $type_crew="OWN"){
		$PAYROLLITEM = PayrollDB::getListPayrollitemFix();
		$LIST_PAYROLL_ITEM = array();
		$TOTAL_PAYROLL = array();
		$i=0;
		foreach($PAYROLLITEM as $payitem){
			if($payitem->id_payroll_item <= 2) {
				$i++;
				$LIST_PAYROLL_ITEM[$i] = $payitem->id_payroll_item;
				$TOTAL_PAYROLL[$payitem->id_payroll_item] = 0;
			}
		}
	
		$LISTPOSITION = CrewDB::getListCrewPosition();
		$LISTASSIGNMENT = CrewDB::getListCrewAssignmentByVessel($id_tug);
		
		foreach($LISTASSIGNMENT as $crew_assign){
			$crewas[$crew_assign->id_crew_position] = $crew_assign;
		}	
		
		$TOTAL_ALL_CREW = 0;
		foreach($LISTPOSITION as $position){		
			if(isset($crewas[$position->id_crew_position])){
				$cr = $crewas[$position->id_crew_position];
				if($cr->crew->StatusOwn == $type_crew) {				
					$LISTCREWPAYROLL = PayrollDB::getListCrewPayroll($cr->CrewId);
					$LISTAMOUNT = array();
					$currency='';
					foreach($LISTCREWPAYROLL as $amount){
						$LISTAMOUNT[$amount->id_payroll_item] = $amount->amount;

					}
						
					$TOTAL_ROW = 0;
					foreach ($LIST_PAYROLL_ITEM as $item){
						if($item <= 2) {
							if(isset($LISTAMOUNT[$item])){
								$amount = $LISTAMOUNT[$item];
								$TOTAL_ROW += $amount;
								$TOTAL_PAYROLL[$item] += $amount;
							}else{
								
							}
						}
					}
					$TOTAL_ALL_CREW += $TOTAL_ROW;
				}
			}

		}
		
		return $TOTAL_ALL_CREW;
	}
	

	public static function getActualCost($id_voyage_order){
		/**
		* Dapatkan data-data standard actual yang telah disimpan
		* 
		*/
		$LIST_RUNNING_STANDARD = CostItemDB::getCostActualPreviousStandard($id_voyage_order);
	
		$RESULT = array();
		$vo = VoyageOrder::model()->findByPk($id_voyage_order);
		$id_vessel_tug = 0;
		$id_vessel_barge = 0;
		if($vo != null){
			$id_vessel_tug = $vo->BargingVesselTug;
			$id_vessel_barge = $vo->BargingVesselBarge;
		}
		
		//0. Duration
		$res = new ActualCostResult();
		$TOTAL_DAYS = 0;
		if($vo != null){
			//$TOTAL_DAYS = $vo->cc_act_duration;
			$TOTAL_DAYS = TimeSheetDB::getActualTotalDurationPerVoyage($id_voyage_order);
			VoyageOrderDB::updateActualDuration($id_voyage_order, $TOTAL_DAYS);
			$res->value = $TOTAL_DAYS;
		if($TOTAL_DAYS <= 0 ){
				$res->notes = "Timesheet not yet been updated";
			}
			CostItemDB::saveCostActualItem($vo->id_voyage_order, "Cycle Time", $TOTAL_DAYS);
		}
		$RESULT['actual_duration'] = $res;
		
		//0. Fuel Consumption
		$res = new ActualCostResult();
		$res->value = 0;
		
		if($vo != null){
			//$fuel = $vo->cc_act_fuel;
			$vclose = VoyageClose::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order));
			if($vclose != null){
				$fuelconsumpt = $vclose->ConsumptFuel;
			}else{
				$fuelconsumpt = 0;
				$res->notes = "This voyage not yet been closed";
			}
			$res->value = $fuelconsumpt;
			CostItemDB::saveCostActualItem($vo->id_voyage_order, "Fuel Consumpt", $fuelconsumpt);
		}
		$RESULT['fuel_consumption'] = $res;
		
		//1. Fuel Cost Actual
		$res = new ActualCostResult();
		$res->value = 0;
		if($vo != null){
			$fuel_cost = $fuelconsumpt* $vo->fuel_price;
			$res->value = $fuel_cost;
			CostItemDB::saveCostActualItem($vo->id_voyage_order, "Fuel Cost", $fuel_cost);
		}
		$RESULT['fuel_cost'] = $res;
		
		
		//2. Agency Cost Actual
		$res = new ActualCostResult();
		$CYCLE_TIME = $LIST_RUNNING_STANDARD['S - Cycle Time'];
		$RUNNING_DAYS = 0;
		if($CYCLE_TIME > 0){
			$RUNNING_DAYS = $TOTAL_DAYS/$CYCLE_TIME;
		}
		$agency_cost = $RUNNING_DAYS*$LIST_RUNNING_STANDARD['S - Agency Cost Standard'];
		$res->value = $agency_cost;
		if($TOTAL_DAYS > 0){
			$res->notes = "Based on ".NumberAndCurrency::formatNumberTwoDigitDec($TOTAL_DAYS)." days";
		}
		CostItemDB::saveCostActualItem($vo->id_voyage_order, "Agency Cost", $agency_cost);
		$RESULT['agency_cost'] = $res; 
	
		//3. Crew (Own) Cost Actual
		$res = new ActualCostResult();
		$crew_own_cost = $TOTAL_DAYS*$LIST_RUNNING_STANDARD['S - Daily Crew Cost Standard'];
		$res->value = $crew_own_cost;
		$res->notes = "Based on Wages+Allowance";
		$res->url = Yii::app()->createUrl("crewPayroll/listcost", array("id_tug"=>$id_vessel_tug, "type"=>"OWN"));
		CostItemDB::saveCostActualItem($vo->id_voyage_order, "Crew Cost", $crew_own_cost);
		$RESULT['crew_own_cost'] = $res;
		
		
		//4. Crew (Subcont) Cost Actual
		$res = new ActualCostResult();
		$crew_subcont_cost = $TOTAL_DAYS*$LIST_RUNNING_STANDARD['S - Daily Crew Subcont Cost Standard'];
		$res->notes = "Based on Wages+Allowance";
		$res->url = Yii::app()->createUrl("crewPayroll/listcost", array("id_tug"=>$id_vessel_tug, "type"=>"OUTSOURCE"));
		$res->value = $crew_subcont_cost;
		CostItemDB::saveCostActualItem($vo->id_voyage_order, "Crew Subcont Cost", $crew_subcont_cost);
		$RESULT['crew_subcont_cost'] = $res;
		
		
		//5. Fuel Incentive
		$res = new ActualCostResult();
		$fuel_incentive = CostControlDB::getFuelIncentive($id_voyage_order, "FUEL");
		$res->value = $fuel_incentive;
		CostItemDB::saveCostActualItem($vo->id_voyage_order, "Fuel Incentive", $fuel_incentive);
		$RESULT['fuel_incentive'] = $res;
		
		
		//6. EHR Incentive
		$res = new ActualCostResult();
		$ehs_incentive = CostControlDB::getFuelIncentive($id_voyage_order, "EHS");
		$res->value = $ehs_incentive;
		CostItemDB::saveCostActualItem($vo->id_voyage_order, "EHS Incentive", $ehs_incentive);
		$RESULT['ehs_incentive'] = $res;
		
		
		//7. Depreciation Cost Actual
		$res = new ActualCostResult();
		$depreciation = $LIST_RUNNING_STANDARD['S - Depreciation Cost'];
		$cost_depreciation = $TOTAL_DAYS*$depreciation;
		$res->value = $cost_depreciation;
		CostItemDB::saveCostActualItem($vo->id_voyage_order, "Depreciation Cost", $cost_depreciation);
		$RESULT['depreciation_cost'] = $res;
		
		
		//8. Insurance Cost Actual
		$res = new ActualCostResult();
		$insurace = $LIST_RUNNING_STANDARD['S - Insurance Cost'];
		$cost_insurance = $TOTAL_DAYS*$insurace;
		$res->value = $cost_insurance;
		CostItemDB::saveCostActualItem($vo->id_voyage_order, "Insurance Cost", $cost_insurance);
		$RESULT['insurance_cost'] = $res;
		
		
		//9. Repair Cost Actual
		$res = new ActualCostResult();
		$repair = 0;
		$cost_repair = $TOTAL_DAYS*$repair;
		$res->value = $cost_repair;
		CostItemDB::saveCostActualItem($vo->id_voyage_order, "Repair Cost", $cost_repair);
		$RESULT['repair_cost'] = $res;
		
		
		//10. Docking Cost Actual
		$res = new ActualCostResult();
		$docking = $LIST_RUNNING_STANDARD['S - Docking Cost'];
		$cost_docking = $TOTAL_DAYS*$docking;
		$res->value = $cost_docking;
		CostItemDB::saveCostActualItem($vo->id_voyage_order, "Docking Cost", $cost_docking);
		$RESULT['docking_cost'] = $res;
		
		
		//11. Brokerage Cost
		$res = new ActualCostResult();
		$res->value = 0;
		$RESULT['brokerage_cost'] = $res;
		
		
		//10. Consumable Cost
		$res = new ActualCostResult();
		$consumable_stock = 0;
		$res->value = $consumable_stock;
		CostItemDB::saveCostActualItem($vo->id_voyage_order, "Consumable Stock", $consumable_stock);
		$RESULT['consumable_stock_cost'] = $res;
		
		
		//11. Fresh Water Cost
		$res = new ActualCostResult();
		$freshwater_cost = 0;
		$res->value = $freshwater_cost;
		CostItemDB::saveCostActualItem($vo->id_voyage_order, "Fresh Water", $freshwater_cost);
		$RESULT['fresh_water'] = $res;
		
		
		$TOTAL_COST = $fuel_cost + $agency_cost +  $crew_own_cost + $crew_subcont_cost + $fuel_incentive + $ehs_incentive + $cost_depreciation + $cost_insurance + $cost_repair
		+ $cost_docking + $consumable_stock + $freshwater_cost;
		//TOTAL COST
		$res = new ActualCostResult();
		$res->value = $TOTAL_COST;
		$RESULT['TOTAL_COST'] = $res;
		
		
		return $RESULT;
	}
	
	public static function getActualCostDaily($vo){
		$RESULT = array();
		$id_voyage_order = $vo->id_voyage_order;
		$id_vessel_tug = 0;
		$id_vessel_barge = 0;
		$TOTAL_DAY = 30;
		if($vo != null){
			$id_vessel_tug = $vo->BargingVesselTug;
			$id_vessel_barge = $vo->BargingVesselBarge;

			$TOTAL_DAY = Timeanddate::getMaxDayFromDate($vo->StartDate);
		}
	
		//3. Crew (Own) Cost Actual
		$res = new ActualCostResult();
		$crew_own_cost = CostControlDB::getCrewCost($id_vessel_tug, "OWN");
		$res->value = $crew_own_cost/$TOTAL_DAY;
		$res->notes = "Based on Wages+Allowance";
		$res->url = Yii::app()->createUrl("crewPayroll/listcost", array("id_tug"=>$id_vessel_tug, "type"=>"OWN"));
		$RESULT['crew_own_cost_daily'] = $res;
		
		//4. Crew (Subcont) Cost Actual
		$res = new ActualCostResult();
		$crew_subcont_cost = CostControlDB::getCrewCost($id_vessel_tug, "OUTSOURCE");
		$res->notes = "Based on Wages+Allowance";
		$res->url = Yii::app()->createUrl("crewPayroll/listcost", array("id_tug"=>$id_vessel_tug, "type"=>"OUTSOURCE"));
		$res->value = $crew_subcont_cost/$TOTAL_DAY;
		$RESULT['crew_subcont_cost_daily'] = $res;
		
		//6. Rent Cost
		$res = new ActualCostResult();
		$rent = StandardCostDB::getRentCost($id_vessel_tug, $id_vessel_barge);
		$res->value = $rent/$TOTAL_DAY;
		$RESULT['rent_cost_daily'] = $res;
	
		//7. Depreciation Cost Actual
		$res = new ActualCostResult();
		$depreciation = StandardCostDB::getDepreciationCost($id_vessel_tug, $id_vessel_barge);
		$cost_depreciation = $depreciation;
		$res->value = $cost_depreciation/$TOTAL_DAY;
		$RESULT['depreciation_cost_daily'] = $res;
		
		//8. Insurance Cost Actual
		$res = new ActualCostResult();
		$insurace = StandardCostDB::getInsuranceCost($id_vessel_tug, $id_vessel_barge);
		$cost_insurance = $insurace;
		$res->value = $cost_insurance/$TOTAL_DAY;
		$RESULT['insurance_cost_daily'] = $res;
		
		//10. Docking Cost Actual
		$res = new ActualCostResult();
		$docking = StandardCostDB::getDockingCost($id_vessel_tug, $id_vessel_barge);
		$cost_docking = $docking;
		$res->value = $cost_docking/$TOTAL_DAY;
		$RESULT['docking_cost_daily'] = $res;
		
		return $RESULT;
	}
}

class ActualCostResult{
	var $value = 0;
	var $notes = "";
	var $url = "#";
}

?>