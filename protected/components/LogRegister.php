<?php
class SurveyLog {	
	public static function setUserUpdated($model){
		$model->userid_updated = Yii::app()->user->id;
		$model->updated_date = Timeanddate::getCurrentDateTime();
		$model->ip_user_updated = IPAddressFunction::getUserIPAddress();
		
		return $model;
	}
	
	public static function setUserCreated($model){
		$model->created_userid = Yii::app()->user->id;
		$model->created_year = date("Y");
		$model->created_date = Timeanddate::getCurrentDateTime();
		
		return $model;
	}
}

class LogRegister {	
	public static function setUserUpdated($model){
		$model->userid_updated = Yii::app()->user->id;
		$model->updated_date = Timeanddate::getCurrentDateTime();
		$model->ip_user_updated = IPAddressFunction::getUserIPAddress();
		
		return $model;
	}
	
	public static function setUserCreated($model){
		$model->created_user = Yii::app()->user->id;
		$model->ip_user_updated = IPAddressFunction::getUserIPAddress();
		$model->created_date = Timeanddate::getCurrentDateTime();
		
		return $model;
	}
	
	public static function setUserCreated2($model){
		$model->create_date = Timeanddate::getCurrentDateTime();
		$model->user_create = Yii::app()->user->id;
		$model->ip_user_create = IPAddressFunction::getUserIPAddress();
		
		return $model;
	}
}
?>