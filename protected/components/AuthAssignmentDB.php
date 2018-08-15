<?php
class AuthAssignmentDB {
	public static function checkAuthAsigntExist($userid, $itemname){
		$model = new Authassignment();
		$conditions = " userid = '".$userid."' AND itemname = '".$itemname."' ";
		if($model->exists($conditions)){
			return true;
		}else{
			return false;
		}
	}	
	
	public static function deleteAssign($userid){
		Authassignment::model()->deleteAllByAttributes(array('userid'=>$userid));
	}
	
	public static function getAuthAssign($userid, $itemname){
		$model = new Authassignment();
		$datas = $model->findAllByAttributes(array('userid'=>$userid, 'itemname'=>$itemname));
		foreach ($datas as $data)
		{
			return $data;
		}
		
		return null;
	}
	
	public static function addUser($userid, $itemname){
		AuthAssignmentDB::deleteAssign($userid);
		$existdata = AuthAssignmentDB::getAuthAssign($userid, $itemname);
		
		if($existdata != null)
			$model = $existdata;
		else
			$model = new Authassignment;
		
		$model->userid = $userid;
		$model->itemname = $itemname;
		
		if($model->validate()){
			if($model->save()){
				echo "save success";
				return true;
			}else{
				echo "save failed";
				return false;
			}
		}else{
			//echo "validate fail";
			echo CHtml::errorSummary($model);
			return true;
		}
	}

	public static function getAuthredirect($userid){
		$modelAuthassignment=Authassignment::model()->findByAttributes(array('userid'=>$userid));

				if($modelAuthassignment->itemname =='IDV'){
						$url='datadiri/view';
						return $url;
				}

				if($modelAuthassignment->itemname =='ETP'){
						$url='dataperusahaan/view';
						return $url;
				}	

				if($modelAuthassignment->itemname =='ADM'){
						$url='datadiri/view';
						return $url;
				}	

				if($modelAuthassignment->itemname =='SKL'){
						$url='sekolah/view';
						return $url;
				}	

	}
}
?>