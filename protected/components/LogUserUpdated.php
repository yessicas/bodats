<?php
class LogUserUpdated {	
	public static function setUserUpdated($model){
		$model->userid_updated = Yii::app()->user->id;
		$model->updated_date = Timeanddate::getCurrentDateTime();
		$model->ip_user_updated = IPAddressFunction::getUserIPAddress();
		
		return $model;
	}
	
	public static function setUserCreated($model){
		/*
		$model->created_userid = Yii::app()->user->id;
		$model->created_year = date("Y");
		$model->created_date = Timeanddate::getCurrentDateTime();
		*/
		$model->created_user = Yii::app()->user->id;
		$model->ip_user_updated = IPAddressFunction::getUserIPAddress();
		$model->created_date = Timeanddate::getCurrentDateTime();
		
		
		return $model;
	}
	
	public static function setUserRequested($model){
		$model->requested_user = Yii::app()->user->id;
		$model->ip_user_requested = IPAddressFunction::getUserIPAddress();
		$model->requested_date = Timeanddate::getCurrentDateTime();
		
		return $model;
	}
	
	public static function setUserApproved($model){
		$model->approved_user = Yii::app()->user->id;
		$model->ip_user_approved = IPAddressFunction::getUserIPAddress();
		$model->approval_date = Timeanddate::getCurrentDateTime();
		
		return $model;
	}
}
?>