<?php
if ($type=='IDV'||$type=='ADM'){
			$modeluserdatadiri=DataDiri::model()->findByAttributes(array('userid'=>$userid));
			$repo = "repository/users/";
			$DEF_FILE = ImageDisplayer::displayDefaultFile($repo , "defaultuser.jpg");
			if($modeluserdatadiri->foto != ""){
				$file = $repo.$modeluserdatadiri->foto;
				
				if(file_exists($file)){
					echo $fotoidv=ImageDisplayer::displayCustomFile($repo , $modeluserdatadiri->foto, "VS");
				}else{
					echo $fotoidv= $DEF_FILE;
				}
			}else{
				echo $fotoidv= $DEF_FILE;
			}	


		}

		else if ($type=='ETP'){
			$modeluserPerusahaan=UserPerusahaan::model()->findByAttributes(array('userid'=>$userid));
			$modelperusahaan=DataPerusahaan::model()->findByAttributes(array('id_perusahaan'=>$modeluserPerusahaan->id_perusahaan));

			$repo = "repository/company/";
			$DEF_FILE = ImageDisplayer::displayDefaultFile($repo , "defaultcompany.jpg");
			if($modelperusahaan->foto_profil != ""){
				$file = $repo.$modelperusahaan->foto_profil;
				
				if(file_exists($file)){
					//echo ImageDisplayer::displaySmallFotoWithConditional($repo, $model->foto, $model->userid, $model->userid);
					echo $fotoetp= ImageDisplayer::displayCustomFile($repo , $modelperusahaan->foto_profil, "VS");
				}else{
					echo $fotoetp= $DEF_FILE;
				}
			}else{
				echo $fotoetp= $DEF_FILE;
			}	

		}

		else if ($type=='SKL'){
			$modeluserSekolah=UserSekolah::model()->findByAttributes(array('userid'=>$userid));
			$modelsekolah=Sekolah::model()->findByAttributes(array('id_sekolah'=>$modeluserSekolah->id_sekolah));

			$repo = "repository/school/";
			$DEF_FILE = ImageDisplayer::displayDefaultFile($repo , "defaultschool.jpg");
			if($modelsekolah->foto_1 != ""){
				$file = $repo.$modelsekolah->foto_1;
				
				if(file_exists($file)){
					//echo ImageDisplayer::displaySmallFotoWithConditional($repo, $model->foto, $model->userid, $model->userid);
					echo $fotoskl= ImageDisplayer::displayCustomFile($repo , $modelsekolah->foto_1, "VS");
				}else{
					echo $fotoskl= $DEF_FILE;
				}
			}else{
				echo $fotoskl= $DEF_FILE;
			}	

		}

?>