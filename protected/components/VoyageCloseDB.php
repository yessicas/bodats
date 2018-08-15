<?php
class VoyageCloseDB {
	public static function getDataSailingOrderByIdVoyageOrder($id_voyage_order){
		$criteria=new CDbCriteria;
        $criteria->condition = 'id_voyage_order=:id_voyage_order';
        $criteria->params = array(':id_voyage_order'=>$id_voyage_order);
        $model=SailingOrder::model()->find($criteria);
		
		if($model != null)
			return $model;
		else
			return new SailingOrder;

	}


	public static function Getid_sailing_order($id_voyage_order){
		$model=VoyageCloseDB::getDataSailingOrderByIdVoyageOrder($id_voyage_order);
		if($model){
			return $model->id_sailing_order ;
		}
		else{
			return ' ';
		}

	}

	public static function GetSailingOrderNumber($id_voyage_order){
		$model=VoyageCloseDB::getDataSailingOrderByIdVoyageOrder($id_voyage_order);
		if($model){
			return $model->SailingOrderNumber ;
		}
		else{
			return ' ';
		}

	}

	public static function GetSailingOrderNo($id_voyage_order){
		$model=VoyageCloseDB::getDataSailingOrderByIdVoyageOrder($id_voyage_order);
		if($model){
			return $model->SailingOrderNo ;
		}
		else{
			return ' ';
		}

	}

	public static function GetSailingOrderMonth($id_voyage_order){
		$model=VoyageCloseDB::getDataSailingOrderByIdVoyageOrder($id_voyage_order);
		if($model){
			return $model->SailingOrderMonth ;
		}
		else{
			return ' ';
		}

	}

	public static function GetSailingOrderYear($id_voyage_order){
		$model=VoyageCloseDB::getDataSailingOrderByIdVoyageOrder($id_voyage_order);
		if($model){
			return $model->SailingOrderYear ;
		}
		else{
			return ' ';
		}
	}


	public static function GetStatusClosedVoyageReport($status){ // di grid close voyage 
		if ($status=='VO SAILING'){
			return 'Not Yet';
		}
		if ($status=='VO FINISH'){
			return 'Created';
		}
	}

	public static function Getviewbottonvoyageclosedocument($id_voyage_order){ // di grid close voyage 
		$model=VoyageCloseDocument::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order));
		if($model){
			return 1;
		}else{
			return 0;
		}
	}
	
	public static function getVoyageCloseReportStatus($id_voyage_order){ // di grid close voyage 
		$model=VoyageClose::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order));
		if($model){
			return true;
		}else{
			return false;
		}
	}
	
	public static function getNumberOfVoyageDocumentStatus($id_voyage_order){ // di grid close voyage 
		$total=VoyageCloseDocument::model()->countByAttributes(array('id_voyage_order'=>$id_voyage_order));
		return $total;
	}
	
	public static function getNumberOfTimesheetActivity($id_voyage_order){ // di grid close voyage 
		$total=Timesheet::model()->countByAttributes(array('id_voyage_order'=>$id_voyage_order));
		return $total;
	}


	public static function GetviewbottonTimeSheet($id_voyage_order){ // di grid close voyage 
		$model=Timesheet::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order));
		if($model){
			return 1;
		}else{
			return 0;
		}
	}

	public static function Getviewstatusvoyageclosedocument($id_voyage_order){ // di grid close voyage 
		$model=VoyageCloseDocument::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order));
		if($model){
			return 'Created';
		}else{
			return 'Not Yet';
		}
	}


	public static function GetviewstatusvoyageTimeSheet($id_voyage_order){ // di grid close voyage 
		$model=Timesheet::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order));
		if($model){
			return 'Created';
		}else{
			return 'Not Yet';
		}
	}


	public static function Getviewvoyageclosedocument($id_voyage_order,$IdVoyageDocument){
		$model=VoyageCloseDocument::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order,'IdVoyageDocument'=>$IdVoyageDocument));
		if($model){
			return 1;
		}else{
			return 0;
		}
	}

	public static function GetVoyageCloseDocumentName($id_voyage_order,$IdVoyageDocument){
		$model=VoyageCloseDocument::model()->findByAttributes(array('id_voyage_order'=>$id_voyage_order,'IdVoyageDocument'=>$IdVoyageDocument));
		if($model){
			return $model->VoyageDocumentName;
		}else{
			return '-';
		}
	}


	public static function getNumberOfDebitNote($id_voyage_order){ // di grid close voyage 
		$total=DebitNote::model()->countByAttributes(array('id_voyage_order'=>$id_voyage_order));
		return $total;
	}


	public static function getNumberOfIntencive($id_voyage_order){ // di grid close voyage 
		$total=VoyageIncentive::model()->countByAttributes(array('id_voyage_order'=>$id_voyage_order));
		return $total;
	}

}
?>