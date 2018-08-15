<?php
class DataLogger {	
	public static function setUserUpdated($model){
		$model->created_user = Yii::app()->user->id;
		$model->created_date = Timeanddate::getCurrentDateTime();
		$model->ip_user_updated = IPAddressFunction::getUserIPAddress();
		
		return $model;
	}
	
	public static function setUserCreated($model){
		$model->created_userid = Yii::app()->user->id;
		$model->created_year = date("Y");
		$model->created_date = Timeanddate::getCurrentDateTime();
		
		return $model;
	}
	
	public static function setUserRequested($model){
		$model->requested_user = Yii::app()->user->id;
		$model->requested_date = Timeanddate::getCurrentDateTime();
		$model->ip_user_requested = IPAddressFunction::getUserIPAddress();
		
		return $model;
	}
}
?>