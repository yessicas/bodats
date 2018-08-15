<?php
class SetTypeDB {	
	public static function getListAllTugBargeCurrent(){
		$model = new SettypeTugbarge();
		$datas = $model->findAll(array("order"=>"tug ASC"));
		$query = "SELECT * FROM settype_tugbarge a
		LEFT JOIN vessel b ON a.tug = b.id_vessel
		LEFT JOIN vessel c ON a.barge = c.id_vessel
		WHERE is_active = '1'
		order by c.BargeSize ASC, b.Status ASC, b.id_vessel ASC
		";
		$datas = $model->findAllBySql($query);
		return $datas;
	}
	
	public static function getListActiveSetPair(){
		$datas=SettypeTugbarge::model()->findAllByAttributes(array('is_active'=>1), array('order'=>'tug ASC'));

		return $datas;
	}
	
	public static function getPair($id_tug, $id_barge){
		$model=SettypeTugbarge::model()->findByAttributes(array('tug'=>$id_tug, 'barge'=>$id_barge));

		return $model;
	}
	
	public static function setBreakpair($id_tug, $id_barge, $caused=""){
		if($id_tug > 0){
			$id_barge = SetTypeDB::getBargeFromTug($id_tug)->barge;
		}
		
		if($id_barge > 0){
			$id_tug = SetTypeDB::getTugFromBarge($id_barge)->tug;
		}
	
		$model=SettypeTugbarge::model()->findByAttributes(array('tug'=>$id_tug, 'barge'=>$id_barge));
		if($model!= null){
			$model->is_active = 0;
			$model = LogUserUpdated::setUserCreated($model);
			if($model->validate()){
				$model->save();
				
				//Dicatat history breakdownnya
				
			}else{
				//echo "validate fail";
				echo CHtml::errorSummary($model);
				echo 'error'; exit();
			}
		}
	}
	
	public static function getBargeFromTug($id_tug){
		$model=SettypeTugbarge::model()->findByAttributes(array('tug'=>$id_tug, 'is_active'=>1));
		return $model;
	}
	
	public static function getTugFromBarge($id_barge){
		$model=SettypeTugbarge::model()->findByAttributes(array('barge'=>$id_barge, 'is_active'=>1));
		return $model;
	}
	
	public static function getUnpairedVesselTug(){
		//Find Active Pair
		$datas=SettypeTugbarge::model()->findAllByAttributes(array('is_active'=>1));
		$listactivevesssel =array();
		foreach($datas as $data){
			$listactivevesssel[$data->tug] = $data->tug;
		}
        
		$LIST_RESULT = array();
		//Get Vessel
		$vessels = Vessel::model()->findAllByAttributes(array('VesselType'=>'TUG'), array('order'=>'Status ASC, VesselName ASC'));
		foreach($vessels as $vessel){
			if(!isset($listactivevesssel[$vessel->id_vessel])){
				$LIST_RESULT[$vessel->id_vessel] = $vessel;
			}
		}
		
		return $LIST_RESULT;
	}
	
	public static function getUnpairedVesselBarge(){
		//Find Active Pair
		$datas=SettypeTugbarge::model()->findAllByAttributes(array('is_active'=>1));
		$listactivevesssel =array();
		foreach($datas as $data){
			$listactivevesssel[$data->barge] = $data->barge;
		}
        
		$LIST_RESULT = array();
		//Get Vessel
		$vessels = Vessel::model()->findAllByAttributes(array('VesselType'=>'BARGE'), array('order'=>'Status ASC, VesselName ASC'));
		foreach($vessels as $vessel){
			if(!isset($listactivevesssel[$vessel->id_vessel])){
				//echo $vessel->VesselName.' ('.$vessel->Status.')'.'<Br>';
				$LIST_RESULT[$vessel->id_vessel] = $vessel;
			}
		}
		
		return $LIST_RESULT;
	}
	
	public static function getPairedVesselTug(){
		//Find Active Pair
		$datas=SettypeTugbarge::model()->findAllByAttributes(array('is_active'=>1), array('order'=>'tug ASC'));
		$LIST_RESULT = array();
		foreach($datas as $data){
			$LIST_RESULT[$data->tug] = $data->VesselTug;
		}
        
		return $LIST_RESULT;
	}
	
	public static function getPairedVesselBarge(){
		//Find Active Pair
		$datas=SettypeTugbarge::model()->findAllByAttributes(array('is_active'=>1), array('order'=>'barge ASC'));
		$LIST_RESULT = array();
		foreach($datas as $data){
			$LIST_RESULT[$data->barge] = $data->VesselBarge;
		}
        
		return $LIST_RESULT;
	}
}




?>