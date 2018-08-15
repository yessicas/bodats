<?php
	class UsersAccess{
		public static function checkUserAccess($n)
		{
			if (Yii::app()->user->isGuest) return false;
			if (is_array($n))
			{
				foreach ($n as $n1) {
					if (Yii::app()->user->checkAccess($n1)) return true;
				}
			} else {
				if (Yii::app()->user->checkAccess($n)) {
					//echo $n.'ada<br>';
					return true;	
				}else{
					//echo $n.'gak ada<br>';
				}
				
			}
			return false;
		}
		
		public static function stringToArray($string){
			$result = array();
			$datas = explode(",", $string);
			foreach($datas as $data){
				$data = trim($data);
				$result[] = $data;
				//echo $data.'--<br>';
			}
			
			return $result;

		}
		
		public static function checkAuth($auth){
			$auth_array = UsersAccess::stringToArray($auth);
			$access = UsersAccess::checkUserAccess($auth_array);
			return $access;
		}
		
		public static function isHaveAccess($usertype){
			if (Yii::app()->user->checkAccess($usertype)) {
				return true;	
			}else{
				return false;
			}
		}
	}
?>