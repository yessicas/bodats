<?php
class UploadFile {	
	public static function uploadSingleFile($model, $modelname, $fieldname, $path, $PK, $newname=""){
		if(!empty($_FILES[$modelname]['tmp_name'][$fieldname]))
		{
			//Delete Old File
			UploadFile::deleteOldFile($path, $model->$fieldname);
		
			$file = CUploadedFile::getInstance($model,$fieldname);
			$ekstension = strtolower($file->extensionName); //strtolower
			$size = $file->size;
			$type = $file->type;
			//echo $ekstension.$size.$type;
			if($newname == ""){
				$newfilename = $fieldname.$model->$PK.'.'.$ekstension;
				$newfilenamewithoutex = $fieldname.$model->$PK;
			}
			else{
				$newfilename = $newname.$model->$PK.'.'.$ekstension;
				$newfilenamewithoutex = $newname.$model->$PK;
			}
			
			$model->$fieldname = $newfilename;
			
            if($model->save())
            {
                $file->saveAs($path.$newfilename);
				UploadFile::compressFileVerySmall($path, $newfilenamewithoutex, $ekstension,"VS", 80, 70);
				UploadFile::compressFileWidth600($path, $newfilenamewithoutex, $ekstension,"SR", 600, 80);
                return 1;
            }else{
				return 2;
			}
        }
		return 0;
	}
	
	public static function compressFileVerySmall($path, $filetargetname, $ekstension,$addedname="VS", $size=40, $compresratio = 60){
		$IM = new ImageManipulation();
		$filesource = $path.$filetargetname.'.'.$ekstension;
		$filenewname = $path.$filetargetname.$addedname.'.'.$ekstension;
		$IM->imageCompressionSameSize($filesource,$size,$filenewname,$compresratio);
		//$IM->imageCompression($filesource,600,$filenewname, 80);
	}
	
	public static function compressFileWidth600($path, $filetargetname, $ekstension,$addedname="SR", $size=600, $compresratio = 80){
		$IM = new ImageManipulation();
		$filesource = $path.$filetargetname.'.'.$ekstension;
		$filenewname = $path.$filetargetname.$addedname.'.'.$ekstension;
		$IM->imageCompression($filesource,$size,$filenewname, 80);
	}
	
	public static function deleteOldFile($path, $filename){
		if($filename != ""){
			$file = $path.$filename;
			//echo $file; exit();
			if(file_exists($file)){
				//echo 'file exist';
				if(!is_dir($file)){
					unlink($file);
				}
			}
			
			$fileVS = $path.UploadFile::getAnotherFileName($filename, "VS");
			if(file_exists($fileVS)){
				//echo 'file exist';
				//echo $fileVS; exit();
				if(!is_dir($fileVS)){
					unlink($fileVS);
				}
			}
			
			$fileSR = $path.UploadFile::getAnotherFileName($filename, "SR");
			if(file_exists($fileSR)){
				//echo 'file exist';
				if(!is_dir($fileSR)){
					unlink($fileSR);
				}
			}
		}
	}

	public static function actiondeleteOldFile($path, $filename){
		if($filename != ""){
			$file = $path.$filename;
			//echo $file; exit();
			if(file_exists($file)){
				//echo 'file exist';
				if(!is_dir($file)){
					unlink($file);
				}
			}
			
			$fileVS = $path.UploadFile::getAnotherFileName($filename, "VS");
			if(file_exists($fileVS)){
				//echo 'file exist';
				//echo $fileVS; exit();
				if(!is_dir($fileVS)){
					unlink($fileVS);
				}
			}
			
			$fileSR = $path.UploadFile::getAnotherFileName($filename, "SR");
			if(file_exists($fileSR)){
				//echo 'file exist';
				if(!is_dir($fileSR)){
					unlink($fileSR);
				}
			}

			$fileFC = $path.UploadFile::getAnotherFileName($filename, "FC");
			if(file_exists($fileFC)){
				//echo 'file exist';
				if(!is_dir($fileFC)){
					unlink($fileFC);
				}
			}
		}
	}
	
	public static function getAnotherFileName($filename, $addedname){
		$fileVSitem = explode('.', $filename);
		$fileVS = '';
		if(count($fileVSitem) == 2){
			$fileVS = $fileVSitem[0].$addedname.'.'.$fileVSitem[1];
		}
		return $fileVS;
	}
	
	public static function typeIsAllow($model, $modelname, $fieldname,$listTypeFile){
		if(!empty($_FILES[$modelname]['tmp_name'][$fieldname]))
		{
			$file = CUploadedFile::getInstance($model,$fieldname);
			$ekstension = strtolower($file->extensionName);
			//echo $ekstension.'<=type file';
			if(in_array($ekstension, $listTypeFile)){
				return true;
			}else{
				return false;
			}
		}
		return true;
	}
	
	public static function sizeIsAllow($model, $modelname, $fieldname,$filesizeallowed){
		if(!empty($_FILES[$modelname]['tmp_name'][$fieldname]))
		{
			$file = CUploadedFile::getInstance($model,$fieldname);
			$size = $file->size;
			//echo $size.' ==>dibolehkan:'.$filesizeallowed;
			if($size <= $filesizeallowed){
				return true;
			}else{
				return false;
			}
		}
		return true;
	}
	
	public static function getExtensionFromFile($filename){
		$res = explode(".", $filename);
		if(count($res) > 1){
			return $res[1];
		}else{
			return "";
		}
	}
	
	public static function getFileProperty($filename){
		$res = explode(".", $filename);
		$fp = new FileProperty();
		if(count($res) > 1){
			$fp->filename = $res[0];
			$fp->ext = $res[1];
		}
		
		return $fp;
	}
	
}

class FileProperty {
	public $filename = "";
	public $ext = "";
}
?>