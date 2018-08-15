<?php
class VesselDB {
	public static function getVessel($id_vessel){
        $model=Vessel::model()->findByAttributes(array('id_vessel'=>$id_vessel));
		if($model != null)
			return $model;
		else
			throw new CHttpException(404,'Vessel with ID ('.$id_vessel.') is not found. May be it was deleted. Please contact your administrator');
	}
	
	public static function getListVesselDefault(){
        $model=Vessel::model()->findAll( array('order'=>'VesselType DESC, Status ASC, VesselName ASC'));
		return $model;
	}
	
	public static function getListTug(){
        $model=Vessel::model()->findAllByAttributes( array('VesselType'=>'TUG'), array('order'=>'VesselType DESC, Status ASC, VesselName ASC'));
		return $model;
	}

	public static function getTugIdFromOneVessel($id_vessel){
		$data=VesselDB::getTypeVesselid($id_vessel);
        return $data['tug'];
	}

	public static function getBargeIdFromOneVessel($id_vessel){
		$data=VesselDB::getTypeVesselid($id_vessel);
        return $data['barge'];
	}
	
	public static function getTugIdVessel($id_vessel){
        $model=Vessel::model()->findByPk($id_vessel);
		if($model->VesselType=="TUG"){
			return $id_vessel;
		}
		
		return 0;
	}
	
	public static function getBargeIdVessel($id_vessel){
        $model=Vessel::model()->findByPk($id_vessel);
		if($model->VesselType=="BARGE"){
			return $id_vessel;
		}
		
		return 0;
	}
	
	public static function getAllVesselListDropdown(){        
		$LIST_RESULT = array();
		//Get Vessel
		$vessels = Vessel::model()->findAll(array('order'=>'VesselName ASC, Status ASC'));
		foreach($vessels as $vessel){
			$LIST_RESULT[$vessel->id_vessel] = $vessel->VesselName.' ('.$vessel->VesselType.' / '.$vessel->Status.')';
		}
		
		return $LIST_RESULT;
	}

	public static function getTypeVesselid($id_vessel){
        $model=Vessel::model()->findByPk($id_vessel);

        
        if($model->VesselType=="TUG"){
        		$datatug=array();
        		$tug= $model->id_vessel;

				$criteria = new CDbCriteria();
				$criteria->condition = 'tug=:tug AND is_active = 1';
				$criteria->order = 'first_date DESC';
				$criteria->limit = 1;
				$criteria->params = array(':tug'=>$tug);
				$tugset=SettypeTugbarge::model()->find($criteria);

					if($tugset){
						$datatug['tug']=$tugset->tug;
						$datatug['barge']=$tugset->barge;
						return $datatug;
					}

					else{
						$datatug['tug']=' ';
						$datatug['barge']=' ';
						return $datatug ;
					}
				
		}

		if($model->VesselType=="BARGE"){
				$databarge=array();
				$barge= $model->id_vessel;

				$criteriabarge = new CDbCriteria();
				$criteriabarge->condition = 'barge=:barge AND is_active = 1';
				$criteriabarge->params = array(':barge'=>$barge);
				$criteriabarge->order = 'first_date DESC';
				$criteriabarge->limit = 1;

				$bargeset=SettypeTugbarge::model()->find($criteriabarge);

				if($bargeset){
					$databarge['tug']=$bargeset->tug;
					$databarge['barge']=$bargeset->barge;
					return $databarge ;
				}else{

					$databarge['tug']=' ';
					$databarge['barge']=' ';
					return $databarge ;
				}
					
				
		}


		//return $model->VesselType;
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
				//echo $vessel->VesselName.' ('.$vessel->Status.')'.'<Br>';
				$LIST_RESULT[$vessel->id_vessel] = $vessel->VesselName.' ('.$vessel->Status.' / '.$vessel->Power.' HP)';
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
				$LIST_RESULT[$vessel->id_vessel] = $vessel->VesselName.' ('.$vessel->Status.' / '.$vessel->BargeSize.' feet)';
			}
		}
		
		return $LIST_RESULT;
	}
	
}
?>