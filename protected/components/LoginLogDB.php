<?php
class LoginLogDB {
	public static function setLoginLog($userid, $type="login"){		
		$model = new UsersLoginLog;
		
		$curdatetime = Timeanddate::getCurrentDateTime();
		$model->lastupdate = $curdatetime;
		$model->userid = $userid;
		$model->type = $type;
		LoginLogDB::updateLastLogin($userid, $curdatetime);
		
		if($model->validate()){
			if($model->save()){
				//echo "save success";
				return true;
			}else{
				//echo "save failed";
				return false;
			}
		}else{
			//echo "validate fail";
			//echo CHtml::errorSummary($newdata);
			return false;
		}
	}
	
	public static function updateLastLogin($userid, $curdatetime){
		$user = LoginLogDB::getUserByID($userid);
		if($user != null){
			$user->last_login = $curdatetime;
			if($user->validate()){
				if($user->save()){
					//echo "save success";
					return true;
				}else{
					//echo "save failed";
					echo CHtml::errorSummary($user);
					return false;
				}
			}else{
				//echo "validate fail";
				//echo CHtml::errorSummary($newdata);
				return false;
			}
			
		}
	}


}
?>