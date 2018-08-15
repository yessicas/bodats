<?php
class NotificationDB {	
	public static function sendApprovedNotificationPR($model, $approved=1){
		//$model = PurchaseRequest::model()->findByAttributes(array('id_purchase_request'=>$id_purchase_request));
		if($model != null){
			$status = "";
			if($approved == 1)
				$status = "approved";
		
			if($approved == 0)
				$status = "rejected";
		
			$notif_tittle = "Your Purchase Request No.".$model->PRNumber." has been ".$status;
			
			$notif_message = $notif_tittle."\r\n\r\n";
			$notif_message .= PurchaseRequestDB::getDetailPurchaseRequest($model->id_purchase_request);
			NotificationDB::addNotification($model->requested_user, $model->approved_user, $notif_tittle,$notif_message);
		}
	}


	public static function sendApprovedNotificationVoyageOrderSchedule($model, $approved=1){
		if($model != null){
			$status = "";
			if($approved == 1)
				$status = "approved";
		
			if($approved == 0)
				$status = "rejected";
		
			$nomor= ($model->VoyageOrderNumber!='') ? $model->VoyageOrderNumber : $model->id_voyage_order;
			$notif_tittle = "Your Voyage Order No.".$nomor." has been ".$status;
			
			$notif_message = $notif_tittle."\r\n\r\n";
			$notif_message .= VoyageOrderDisplayer::getDetailmessageNotification($model->id_voyage_order);
			NotificationDB::addNotification($model->created_user, $model->approved_user, $notif_tittle,$notif_message);
		}
	}


	public static function sendApprovedNotificationRepairAndDocking($model, $approved=1){
		if($model != null){
			$status = "";
			if($approved == 1)
				$status = "approved";
		
			if($approved == 0)
				$status = "rejected";
		
			$notif_tittle = "Your Request For Schedule ".$model->vesselstat->vessel_status." ".$model->vessel->VesselName." has been ".$status;
			
			$notif_message = $notif_tittle."\r\n\r\n";
			$notif_message .= NotificationDB::getDetailmessageNotificationdockingandrepair($model->id_request_for_schedule);
			NotificationDB::addNotification($model->created_user, $model->approved_user, $notif_tittle,$notif_message);
		}
	}


	public static function sendApprovedNotificationMaintenance($model, $approved=1){
		if($model != null){
			$status = "";
			if($approved == 1)
				$status = "approved";
		
			if($approved == 0)
				$status = "rejected";
		
			$notif_tittle = "Your Request Schedule Maintenance Plan For ".$model->Vessel->VesselName." has been ".$status;
			
			$notif_message = $notif_tittle."\r\n\r\n";
			$notif_message .= NotificationDB::getDetailmessageNotificationMaintenance($model->id_vessel_maintenance_plan);
			NotificationDB::addNotification($model->created_user, $model->approved_user, $notif_tittle,$notif_message);
		}
	}


	public static function sendApprovedNotificationscheduleOffHired($model, $approved=1){
		if($model != null){
			$status = "";
			if($approved == 1)
				$status = "approved";
		
			if($approved == 0)
				$status = "rejected";
		
			$notif_tittle = "Your Request For Schedule Off Hired No. ".$model->OffhiredOrderNumber." has been ".$status;
			
			$notif_message = $notif_tittle."\r\n\r\n";
			$notif_message .= NotificationDB::getDetailmessageNotificationoffhired($model->id_so_offhired_order);
			NotificationDB::addNotification($model->created_user, $model->approved_user, $notif_tittle,$notif_message);
		}
	}

	public static function addNotification($userid, $fromuserid, $notif_tittle,$notif_message){
		$model = new Notification();
		
		$model->userid = $userid;
		$model->fromuserid = $fromuserid;
		$model->notif_message = $notif_message;
		$model->notif_status = "NEW";
		$model->notif_date = Timeanddate::getCurrentDateTime();
		$model->code_id = md5($model->notif_date);
		$model->notif_tittle = $notif_tittle;
		
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
			echo CHtml::errorSummary($model);
			return false;
		}
	}


	public static function getDetailmessageNotificationdockingandrepair($id_request_for_schedule){
		$content = "";
		$model=RequestForSchedule::model()->findByPk($id_request_for_schedule);
		$id_tug=VesselDB::getTugIdFromOneVessel($model->id_vessel);
		$id_barge=VesselDB::getBargeIdFromOneVessel($model->id_vessel);

		$vesselTugData=Vessel::model()->findByPk($id_tug);
		$vesselTugName=($vesselTugData) ? $vesselTugData->VesselName : '-';

		$vesselBargeData=Vessel::model()->findByPk($id_barge);
		$vesselBargeName=($vesselBargeData) ? $vesselBargeData->VesselName : '-';


		$content .='
		Vessel Tug : '.$vesselTugName.'
		Vessel Barge : '.$vesselBargeName.'
		Proposed Start Date  : '.Yii::app()->dateFormatter->formatDateTime($model->StartDate, "medium","").'
		End Date : '.Yii::app()->dateFormatter->formatDateTime($model->EndDate, "medium","").'
		Notes : '.$model->notes;
		
		return $content;

	}


	public static function getDetailmessageNotificationMaintenance($id_vessel_maintenance_plan){
		$content = "";
		$model=VesselMaintenancePlan::model()->findByPk($id_vessel_maintenance_plan);
		$id_tug=VesselDB::getTugIdFromOneVessel($model->id_vessel);
		$id_barge=VesselDB::getBargeIdFromOneVessel($model->id_vessel);

		$vesselTugData=Vessel::model()->findByPk($id_tug);
		$vesselTugName=($vesselTugData) ? $vesselTugData->VesselName : '-';

		$vesselBargeData=Vessel::model()->findByPk($id_barge);
		$vesselBargeName=($vesselBargeData) ? $vesselBargeData->VesselName : '-';


		$content .='
		Vessel Tug : '.$vesselTugName.'
		Vessel Barge : '.$vesselBargeName.'
		Proposed Start Date  : '.Yii::app()->dateFormatter->formatDateTime($model->start_date, "medium","").'
		End Date : '.Yii::app()->dateFormatter->formatDateTime($model->end_date, "medium","").'
		Notes : '.$model->Description;
		
		return $content;

	}

	public static function getDetailmessageNotificationoffhired($id_so_offhired_order){
		$content = "";
		$model=SoOffhiredOrder::model()->findByPk($id_so_offhired_order);
		
		if($model->status=='APPROVED'){ // jika di approve maka tanggal nya ngambil dari schedule yag telah diplote
			$schedule=Schedule::model()->findByAttributes(array('id_so_offhired_order'=>$id_so_offhired_order));

			$datestart=Yii::app()->dateFormatter->formatDateTime($schedule->StartDate, "medium","");
			$dateend=Yii::app()->dateFormatter->formatDateTime($schedule->EndDate, "medium","");
		}else{// jika tidak di approve maka ngambil dari data waktu awal di request
			$datestart=Yii::app()->dateFormatter->formatDateTime($model->TCStartDate, "medium","");
			$dateend=Yii::app()->dateFormatter->formatDateTime($model->TCEndDate, "medium","");
		}

		$content .='
		Vessel Tug : '.$model->VesselTugs->VesselName.'
		Vessel Barge : '.$model->VesselBarges->VesselName.'
		Costumer : '.$model->Customer->CompanyName.'
		Off Hired Number : '.$model->OffhiredOrderNumber.'
		Price : '.$model->TCPrice.'
		Start Date  : '.$datestart.'
		End Date : '.$dateend;
		
		return $content;

	}

}
?>