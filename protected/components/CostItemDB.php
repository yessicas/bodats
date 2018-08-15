<?php
class CostItemDB {	
	public static function checkCostStandardHasGenerated($id_voyage_order){
		$datas = VoyageCostStandard::model()->findAllByAttributes(array( 'id_voyage_order'=>$id_voyage_order));
		foreach($datas as $data){
			return true;
		}
		
		return false;
	}
	
	public static function generateAndSaveStandard($vo){
		$STD = StandardCostDB::getStandardCost(
				$vo->BargingVesselTug, 
				$vo->BargingVesselBarge, 
				$vo->BargingJettyIdStart , 
				$vo->BargingJettyIdEnd,
				$vo->fuel_price				
			);
		
		//Simpan Data-data Cost Standard
		CostItemDB::saveCostStandardItem($vo->id_voyage_order, "Cycle Time", $STD["cycle_time"]->value);
		CostItemDB::saveCostStandardItem($vo->id_voyage_order, "Fuel Consumpt", $STD["fuel"]->value);
		CostItemDB::saveCostStandardItem($vo->id_voyage_order, "Fuel Price", $vo->fuel_price);
		CostItemDB::saveCostStandardItem($vo->id_voyage_order, "Fuel Actual Cost", $STD["fuelcost"]->value);
		CostItemDB::saveCostStandardItem($vo->id_voyage_order, "Agency Cost", $STD["agency_cost"]->value);
		CostItemDB::saveCostStandardItem($vo->id_voyage_order, "Crew Cost", $STD["crew_own_cost"]->value);
		CostItemDB::saveCostStandardItem($vo->id_voyage_order, "Crew Subcont Cost", $STD["crew_subcont_cost"]->value);
		CostItemDB::saveCostStandardItem($vo->id_voyage_order, "Rent Cost", $STD["rent_cost"]->value);
		CostItemDB::saveCostStandardItem($vo->id_voyage_order, "Depreciation Cost", $STD["depreciation_cost"]->value);
		CostItemDB::saveCostStandardItem($vo->id_voyage_order, "Insurance Cost", $STD["insurance_cost"]->value);
		CostItemDB::saveCostStandardItem($vo->id_voyage_order, "Repair Cost", $STD["repair_cost"]->value);
		CostItemDB::saveCostStandardItem($vo->id_voyage_order, "Docking Cost", $STD["docking_cost"]->value);
		CostItemDB::saveCostStandardItem($vo->id_voyage_order, "Brokerage Cost", $STD["brokerage_cost"]->value);
		CostItemDB::saveCostStandardItem($vo->id_voyage_order, "Other Cost", $STD["other_cost"]->value);
		
		//Simpan Data-data Cost Actual
		CostItemDB::saveCostActualItem($vo->id_voyage_order, "S - Agency Cost Standard", $STD["agency_cost"]->value);
		CostItemDB::saveCostActualItem($vo->id_voyage_order, "S - Cycle Time", $STD["cycle_time"]->value);
		
		//
		$ACTUAL = CostControlDB::getActualCostDaily($vo);
		CostItemDB::saveCostActualItem($vo->id_voyage_order, "S - Daily Crew Cost Standard", $ACTUAL["crew_own_cost_daily"]->value);
		CostItemDB::saveCostActualItem($vo->id_voyage_order, "S - Daily Crew Subcont Cost Standard", $ACTUAL["crew_subcont_cost_daily"]->value);
		CostItemDB::saveCostActualItem($vo->id_voyage_order, "S - Depreciation Cost", $ACTUAL["depreciation_cost_daily"]->value);
		CostItemDB::saveCostActualItem($vo->id_voyage_order, "S - Rent Cost", $ACTUAL["rent_cost_daily"]->value);
		CostItemDB::saveCostActualItem($vo->id_voyage_order, "S - Insurance Cost", $ACTUAL["insurance_cost_daily"]->value);
		CostItemDB::saveCostActualItem($vo->id_voyage_order, "S - Docking Cost", $ACTUAL["docking_cost_daily"]->value);
	}

	public static function saveCostStandardItem($id_voyage_order, $cost_item, $amount){
		$item = CostItemStandard::model()->findByAttributes(array('cost_item'=>$cost_item));
		if($item != null){
			CostItemDB::saveCostStandard($id_voyage_order, $item->id_cost_item_standard, $amount);
		}
	}

	public static function saveCostStandard($id_voyage_order, $id_cost_item_standard, $amount){
		$model = VoyageCostStandard::model()->findByAttributes(array( 'id_voyage_order'=>$id_voyage_order, 'id_cost_item_standard'=>$id_cost_item_standard  ));
		if($model == null){
			$model = new VoyageCostStandard();
		}
		
		$model = LogUserUpdated::setUserCreated($model);
		$model->id_voyage_order = $id_voyage_order;
		$model->id_cost_item_standard = $id_cost_item_standard;
		$model->amount = $amount;
		
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

	public static function saveCostActualItem($id_voyage_order, $cost_item, $amount){
		$item = CostItemActual::model()->findByAttributes(array('cost_item'=>$cost_item));
		if($item != null){
			CostItemDB::saveCostActual($id_voyage_order, $item->id_cost_item_actual, $amount);
		}
	}

	public static function saveCostActual($id_voyage_order, $id_cost_item_actual, $amount){
		$model = VoyageCostActual::model()->findByAttributes(array( 'id_voyage_order'=>$id_voyage_order, 'id_cost_item_actual'=>$id_cost_item_actual  ));
		if($model == null){
			$model = new VoyageCostActual();
		}
		
		$model = LogUserUpdated::setUserCreated($model);
		$model->id_voyage_order = $id_voyage_order;
		$model->id_cost_item_actual = $id_cost_item_actual;
		$model->amount = $amount;
		
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
	
	/**
	* Fungsi ini untuk menyimpan data-data standard actual yang telah tersimpan sebelumnya
	* Contohnya : standard_actual daily untuk depreciation
	* @return array data-data standard
	*/
	public static function getCostActualPreviousStandard($id_voyage_order){
		//Dapatkan dulu array master item actual
		$RESULT = array();
		$items = CostItemActual::model()->findAll();
		foreach($items as $item){
			$RESULT[$item->cost_item] = 0;
		}
	
	
		$costactuals = VoyageCostActual::model()->findAllByAttributes(array('id_voyage_order'=>$id_voyage_order));
		foreach($costactuals as $act){
			//echo $act->amount."<BR>";
			//echo $act->CostItemActual->cost_item."<BR>";
			$RESULT[$act->CostItemActual->cost_item] = $act->amount;
		}
		
		return $RESULT;
	}
}

?>