<?php
class Userauthlog {	
	public static function setUserUpdated($model){
		$model->userid = Yii::app()->user->id;
		$model->TanggalUpdate = Timeanddate::getCurrentDateTime();
		$model->ip_user_update = IPAddressFunction::getUserIPAddress();
		
		return $model;
	}
}
?>