<?php
class CrewDB {
	public static function getMasterCrewByVessel($id_vessel){
		$criteria=new CDbCriteria;
        $criteria->condition = 'LastIDVessel=:LastIDVessel AND id_crew_position=:id_crew_position AND CurrentStatus=:CurrentStatus ';
        $criteria->params = array(':LastIDVessel'=>$id_vessel,':id_crew_position'=>1,':CurrentStatus'=>'ON');
        $model=Crew::model()->find($criteria);
		return $model;

	}
	
	public static function getMasterCrewByVessel2($id_vessel){
		$criteria=new CDbCriteria;
        $criteria->condition = 'vessel_id=:vessel_id AND id_crew_position=:id_crew_position AND status_active=:status_active ';
        $criteria->params = array(':vessel_id'=>$id_vessel,':id_crew_position'=>1,':status_active'=>1);
        $model=CrewAssignment::model()->find($criteria);
		return $model;

	}


	public static function getIdMasterCrewByVessel($id_vessel){
		$model=CrewDB::getMasterCrewByVessel($id_vessel);
		if($model){
			return $model->CrewId ;
		}
		else{
			return '-';
		}
	}


	public static function getCrewNameMasterCrewByVessel($id_vessel){
		$model=CrewDB::getMasterCrewByVessel($id_vessel);
		if($model!=null){
			return $model->CrewName ;
		}
		else{
			return '-';
		}
	}
	
	public static function getCrewNameMasterCrewByVessel2($id_vessel){
		$model=CrewDB::getMasterCrewByVessel2($id_vessel);
		if($model!=null){
			if(isset($model->crew)){
				return $model->crew->CrewName ;
			}else{
				return "UNKNOWN WITH ID : ".$model->CrewId;
			}
		}
		else{
			return '-';
		}
	}
	
	public static function getIdMasterCrewByVessel2($id_vessel){
		$model=CrewDB::getMasterCrewByVessel2($id_vessel);
		if($model){
			return $model->CrewId ;
		}
		else{
			return '-';
		}
	}

	public static function getListAllCrew(){
		$listall = Crew::model()->findAllByAttributes(array('Status'=>'crew'), array('order'=>'CrewName ASC'));
		return $listall;
	}
	
	public static function getCrewPosition($id_crew_position){
		$crewpos = CrewPosition::model()->findByAttributes(array( 'id_crew_position'=>$id_crew_position ));
		return $crewpos;
	}
	
	public static function getListCrewPosition(){
		$listall = CrewPosition::model()->findAllByAttributes(array('is_important'=>1), array('order'=>'id_crew_position ASC'));
		return $listall;
	}
	
	public static function getListCrewAssignmentByVessel($vessel_id){
		$listall = CrewAssignment::model()->findAllByAttributes(array('vessel_id'=>$vessel_id), array('order'=>'id_crew_position ASC'));
		return $listall;
	}
	
	public static function getCrewAssignment($id_tug, $id_crew_position){
		$listall = CrewAssignment::model()->findByAttributes(array('vessel_id'=>$id_tug, 'id_crew_position'=>$id_crew_position ));
		return $listall;
	}
	public static function getCrewAssignment2($id_tug, $CrewId){
		$listall = CrewAssignment::model()->findByAttributes(array('vessel_id'=>$id_tug, 'CrewId'=>$CrewId ));
		return $listall;
	}
	
	public static function updateCrewAssignment($vessel_id, $CrewId, $id_crew_position, $start_date, $expired_date){
		$model = CrewDB::getCrewAssignment($vessel_id, $id_crew_position);
		if($model == null){
			$model = new CrewAssignment();
		}
		
		$model = LogUserUpdated::setUserCreated($model);
		$model->vessel_id = $vessel_id;
		$model->CrewId = $CrewId;
		$model->id_crew_position = $id_crew_position;
		$model->start_date = $start_date;
		$model->expired_date = $expired_date;
		$model->status_active = 1;
		
		if($model->validate()){
			if($model->save()){
				//echo "Save Berhasil!";
				return $model;
			}else{
				//echo "Save Gagal!";
				return null;
			}
		}else{
			//echo "validate fail";
			//echo CHtml::errorSummary($model);
			return null;
		}
	}
	
	public static function signOn($vessel_id, $CrewId, $id_crew_position, $sign_date, $expired_date, $status_sign = "SIGN ON" ){
		$model = CrewSignon::model()->findByAttributes(array('vessel_id'=>$vessel_id, 'id_crew_position'=>$id_crew_position, 'CrewId'=>$CrewId, 'sign_date'=>$sign_date, 'status_sign'=>$status_sign ));
		//$model = CrewSignon::model()->findByAttributes(array('id_crew_assignment'=>$id_crew_assignment));
		if($model == null){
			$model = new CrewSignon();
		}
		
		$model = LogUserUpdated::setUserCreated($model);
		$model->vessel_id = $vessel_id;
		$model->CrewId = $CrewId;
		$model->id_crew_position = $id_crew_position;
		$model->sign_date = $sign_date;
		$model->expired_date = $expired_date;
		$model->status_sign = $status_sign;
		
		if($model->validate()){
			if($model->save()){
				//echo "Save Berhasil!";
				return $model;
			}else{
				//echo "Save Gagal!";
				return null;
			}
		}else{
			//echo "validate fail";
			//echo CHtml::errorSummary($model);
			return null;
		}
	}
	
	public static function updateSignOn($id_crew_signon, $vessel_id, $CrewId, $id_crew_position, $sign_date, $expired_date){
		$model = CrewSignon::model()->findByAttributes(array('id_crew_signon'=>$id_crew_signon ));
		if($model == null){
			$model = new CrewSignon();
		}
		
		$model = LogUserUpdated::setUserCreated($model);
		$model->vessel_id = $vessel_id;
		$model->CrewId = $CrewId;
		$model->id_crew_position = $id_crew_position;
		$model->sign_date = $sign_date;
		$model->expired_date = $expired_date;
		
		if($model->validate()){
			if($model->save()){
				//echo "Save Berhasil!";
				return $model;
			}else{
				//echo "Save Gagal!";
				return null;
			}
		}else{
			//echo "validate fail";
			//echo CHtml::errorSummary($model);
			return null;
		}
	}


	public static function countDurationOncrewsign($startdate,$endate)
	{
	$date1=$startdate;
    $date2=$endate;
    $datetime1 = new DateTime($date1);
    $datetime2 = new DateTime($date2);
    $difference = $datetime1->diff($datetime2);
    //echo nce->y.' years<br>';
    //echo $difference->days.' days total<br>';
    //echo $difference->m.' months<br>';
    //echo $difference->d.' days<br>';
    //echo $difference->h.' hours<br>';
    //echo $difference->i.' minutes<br>';
    //echo $difference->s.' seconds<br>';
    
    return $difference->m.' Months, '.$difference->d.' Days';
	}


	public static function countDurationBackground($startdate,$endate)
	{
	$date1=$startdate;
    $date2=$endate;
    $datetime1 = new DateTime($date1);
    $datetime2 = new DateTime($date2);
    $difference = $datetime1->diff($datetime2);
   
    $data= $difference->m;
    $data2= $difference->d;
    $kode_warna='';

    if($data <4){
    $kode_warna= '#7AEF46';
    }
     if($data >= 4){
    $kode_warna= '#EA912C';
    }

     if($data >= 5 ){
    $kode_warna= '#F9443B';
    }

    return$kode_warna;

     
	}
}
?>