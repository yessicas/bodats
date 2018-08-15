<?php
class ImageDisplayer {
	public static function displaySmallFotoWithConditional($repodir , $filename, $value, $valueexist="ADA"){
		if(ImageDisplayer::getValue($value, $valueexist)){
			return ImageDisplayer::displaySmallFoto($repodir , $filename);
		}else{
			return "-";
		}
	}
	public static function displaySmallFoto($repodir , $filename, $withBase = false){
		//$repodir = RepositorySDM::getRepoSDM();
		
		if(!empty($filename)){ // && file_exists($filename)){
			$filepath = $repodir.ImageDisplayer::getTheVerySmallImage($filename);
			
			//Sementara pakai ukuran yang terkompresi dulu (biar akses cepat).
			$filepathorig = $repodir.$filename;
			//$filepathorig = $repodir.ImageDisplayer::getTheOriginalFile($filename);
			if(file_exists($filepath)){

			if ($withBase)
			{
				$filepath = Yii::app()->getBaseUrl(true).'/'.$filepath;
				$filepathorig = Yii::app()->getBaseUrl(true).'/'.$filepathorig;
			}
				$IMG = CHtml::image($filepath,"",array("style"=>"width:80px;height:80px; border:1px solid #d7d7d7; padding:2px;")); 
				$url = $filepathorig;
				$IMGLINK = '<a href="'.$url.'" class="popup_foto">'.$IMG.'</a>';
				
				return $IMGLINK;
			}else{
				return "no image";
			}
		}else{
			return "no image";
		}

	}
	
	public static function displayMediumFile($repodir , $filename){
		//$repodir = RepositorySDM::getRepoSDM();
		
		if(!empty($filename)){
			$filepath = $repodir.ImageDisplayer::getTheVerySmallImage($filename);
			
			//Sementara pakai ukuran yang terkompresi dulu (biar akses cepat).
			$filepathorig = $repodir.$filename;
			
			//$filepathorig = $repodir.ImageDisplayer::getTheOriginalFile($filename);
			$IMG = CHtml::image($filepath,"",array("style"=>"width:80px;height:80px; border:1px solid #d7d7d7; padding:2px;")); 
			$url = $filepathorig;
			$IMGLINK = '<a href="'.$url.'">'.$IMG.'</a>';
			
			return $IMGLINK;
		}else{
			return "no image";
		}

	}
	
	public static function displayCustomFile($repodir , $filename, $addedname){
		//$repodir = RepositorySDM::getRepoSDM();
		
		if(!empty($filename)){
			$filepath = $repodir.ImageDisplayer::getCustomImage($filename, $addedname);
			
			//Sementara pakai ukuran yang terkompresi dulu (biar akses cepat).
			$filepathorig = $repodir.$filename;
			
			//$filepathorig = $repodir.ImageDisplayer::getTheOriginalFile($filename);
			$IMG = CHtml::image($filepath,"",array("style"=>"border:1px solid #d7d7d7; padding:2px;")); 
			$url = $filepathorig;
			$IMGLINK = '<a href="'.$url.'" class="popup_foto">'.$IMG.'</a>';
			
			return $IMGLINK;
		}else{
			return "no image";
		}
	}
	
	public static function displayDefaultFile($repodir , $filename){
		$filepath = $repodir.$filename;
		
		if(file_exists($filepath)){
			$IMG = CHtml::image($filepath,"",array("style"=>"border:1px solid #d7d7d7; padding:2px;")); 
			$url = $filepath;
			$IMGLINK = '<a href="'.$url.'">'.$IMG.'</a>';
			
			return $IMG;
		}else{
			return "no image";
		}
	}
	
	public static function getCustomImage($filename, $addedname){
		$fn = UploadFile::getFileProperty($filename);
		return $fn->filename.$addedname.".".$fn->ext;
	}
	
	public static function getTheVerySmallImage($filename){
		$fn = UploadFile::getFileProperty($filename);
		return $fn->filename."VS".".".$fn->ext;
	}
	
	public static function getTheOriginalFile($filename){
		$fn = UploadFile::getFileProperty($filename);
		return $fn->filename."SR".".".$fn->ext;
	}
	
	public static function getValue($value, $valueexist){
		if($value == $valueexist){
			return true;
		}else{
			return false;
		}
	}



	public static function displayformFile($repodir , $filename){
		//$repodir = RepositorySDM::getRepoSDM();
		
		if(!empty($filename)){
			$filepath = $repodir.ImageDisplayer::getCustomImage($filename,"FC");
			
			//Sementara pakai ukuran yang terkompresi dulu (biar akses cepat).
			$filepathorig = $repodir.$filename;
			
			//$filepathorig = $repodir.ImageDisplayer::getTheOriginalFile($filename);
			$IMG = CHtml::image($filepath,"",array("style"=>"width:200px;height:200px; border:1px solid #d7d7d7; padding:2px;")); 
			$url = $filepathorig;
			$IMGLINK = '<a href="'.$url.'" class="popup_foto">'.$IMG.'</a>';
			
			return $IMGLINK;
		}else{
			return "no image";
		}

	}

	public static function displayformFile2($repodir , $filename){
		//$repodir = RepositorySDM::getRepoSDM();
		
		if(!empty($filename)){
			$filepath = $repodir.ImageDisplayer::getCustomImage($filename,"SR");
			
			//Sementara pakai ukuran yang terkompresi dulu (biar akses cepat).
			$filepathorig = $repodir.$filename;
			
			//$filepathorig = $repodir.ImageDisplayer::getTheOriginalFile($filename);
			$IMG = CHtml::image($filepath,"",array("style"=>"width:40px;height:40px; border:1px solid #d7d7d7; padding:2px;")); 
			$url = $filepathorig;
			$IMGLINK = '<a href="'.$url.'" class="popup_foto">'.$IMG.'</a>';
			
			return $IMGLINK;
		}else{
			return "no image";
		}

	}


	public static function displayDefaultFileforgrid($repodir , $filename){
		$filepath = $repodir.$filename;
		
		if(file_exists($filepath)){
			$IMG = CHtml::image($filepath,"",array("style"=>"border:1px solid #d7d7d7; padding:2px;width:80px;height:80px;")); 
			$url = $filepath;
			$IMGLINK = '<a href="'.$url.'" class="popup_foto">'.$IMG.'</a>';
			
			return $IMG;
		}else{
			return "no image";
		}
	}
}
?>
