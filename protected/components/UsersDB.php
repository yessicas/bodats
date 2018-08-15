<?php
class UsersDB{
	public static function getSpecificUsers($auth)
	{
		$sql = "SELECT * FROM Users a LEFT JOIN AuthAssignment b on (a.userid = b.userid)
		WHERE b.itemname = 'ENS' OR b.itemname = 'ENB' order by a.userid ASC";
		
		$compare = '';
		if (is_array($auth))
		{
			$i = 0;
			foreach ($auth as $a) {
				if($i > 0){
					$compare .= " OR ";
				}
				$compare .= "b.itemname = '".$a."'";
				$i++;
			}
		}else{
			$compare = "b.itemname = '".$auth."'";
		}
		
		$sql = "SELECT * FROM users a LEFT JOIN AuthAssignment b on (a.userid = b.userid)
		WHERE ".$compare ." order by a.userid ASC";
		
		$listofuser = Users::model()->findAllBySql($sql);
		return $listofuser;
	}
	
	public static function checkUserisExist($userid){
		$model = new Users();
		$conditions = " userid = '".$userid."' ";
		if($model->exists($conditions)){
			return true;
		}else{
			return false;
		}
	}
	
	public static function getSingle($userid){
		$model = new Users();
		$datas = $model->findAllByAttributes(array('userid'=>$userid));
		foreach ($datas as $data)
		{
			return $data;
		}
		
		return $model;
	}
	
	public static function changePassword($newpassword, $userid){
		$model = UsersDB::getSingle($userid);
		if($model!= null){
			$model->password = $newpassword;
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
				//echo CHtml::errorSummary($model);
				return false;
			}
		}
	}
	
	public static function checkUserisExistOnUpdate($userid){
	
		$model = new Users();
		$conditions = " userid = '".$userid."' ";
		if($model->exists($conditions)){
			return true;
		}else{
			return false;
		}
	}
	
	public static function gettype($type){
			if($type=='ADM'){
			$datatype='Administrator';
			return $datatype;
			}
			if($type=='IDV'){
			$datatype='Personal';
			return $datatype;
			}
			if($type=='ETP'){
			$datatype='Perusahaan';
			return $datatype;
			}
			if($type=='SKL'){
			$datatype='Sekolah';
			return $datatype;
			}
		
	}

	public static function getrepo($type){
			if($type=='ADM'){
			$repo='/repository/users/';
			return $repo;
			}
			if($type=='IDV'){
			$repo='/repository/users/';
			return $repo;
			}
			if($type=='ETP'){
			$repo='/repository/company/';
			return $repo;
			}
			if($type=='SKL'){
			$repo='/repository/school/';
			return $repo;
			}
		
	}

	public static function getfoto($userid,$type){
			if ($type=='IDV'||$type=='ADM'){
			$modeluserdatadiri=Users::model()->findByAttributes(array('userid'=>$userid));
			$DEF_FILE ="defaultuser.jpg";
			$repo = "repository/users/";
			if($modeluserdatadiri->foto != ""){
				$file = $repo.ImageDisplayer::getCustomImage($modeluserdatadiri->foto, "VS");
				
				if(file_exists($file)){
					return $fotoidv=ImageDisplayer::getCustomImage($modeluserdatadiri->foto, "VS");
				}else{
					return $fotoidv=$DEF_FILE;
				}
			}else{
				return $fotoidv=$DEF_FILE;
			}	


		}

		else if ($type=='ETP'){
			$modeluserPerusahaan=UserPerusahaan::model()->findByAttributes(array('userid'=>$userid));
			$modelperusahaan=DataPerusahaan::model()->findByAttributes(array('id_perusahaan'=>$modeluserPerusahaan->id_perusahaan));

			$repo = "repository/company/";
			$DEF_FILE = "defaultcompany.jpg";
			if($modelperusahaan->foto_profil != ""){
				$file = $repo.ImageDisplayer::getCustomImage($modelperusahaan->foto_profil, "VS");
				
				if(file_exists($file)){
					//echo ImageDisplayer::displaySmallFotoWithConditional($repo, $model->foto, $model->userid, $model->userid);
					return $fotoetp= ImageDisplayer::getCustomImage($modelperusahaan->foto_profil, "VS");
				}else{
					return $fotoetp= $DEF_FILE;
				}
			}else{
				return $fotoetp= $DEF_FILE;
			}	

		}

		else if ($type=='SKL'){
			$modeluserSekolah=UserSekolah::model()->findByAttributes(array('userid'=>$userid));
			$modelsekolah=Sekolah::model()->findByAttributes(array('id_sekolah'=>$modeluserSekolah->id_sekolah));

			$repo = "repository/school/";
			$DEF_FILE = "defaultschool.jpg";
			if($modelsekolah->foto_1 != ""){
				$file = $repo.ImageDisplayer::getCustomImage($modelsekolah->foto_1, "VS");
				
				if(file_exists($file)){
					//echo ImageDisplayer::displaySmallFotoWithConditional($repo, $model->foto, $model->userid, $model->userid);
					return $fotoskl= ImageDisplayer::getCustomImage($modelsekolah->foto_1, "VS");
				}else{
					return $fotoskl= $DEF_FILE;
				}
			}else{
				return $fotoskl= $DEF_FILE;
			}	

		}
		
	}
	
	
	public static function getRoless($userid){
	
		$model=Authassignment::model()->findByAttributes(array('userid'=>$userid));
			return $model->itemname;
		
	}
	

	
	
	
}
?>