<?php
class UploadImage {	
	public $VS_NAME = "VS";
	public $SR_NAME = "SR";
	public $FC_NAME = "FC";
	public $VS_WIDTH = 80;
	public $SR_WIDTH = 600;
	public $FC_WIDTH = 570;
	public $FC_HEIGHT = 400;
	
	public function uploadSingleImage($model, $modelname, $fieldname, $path, $PK, $newname=""){
		if(!empty($_FILES[$modelname]['tmp_name'][$fieldname]))
		{
			//Delete Old File
			UploadImage::deleteOldFile($path, $model->$fieldname);
		
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
				UploadImage::compressFileVerySmall($path, $newfilenamewithoutex, $ekstension,$this->VS_NAME, $this->VS_WIDTH, 70);
				UploadImage::compressFileWidth600($path, $newfilenamewithoutex, $ekstension,$this->SR_NAME, $this->SR_WIDTH, 80);
				UploadImage::compressFileForced($path, $newfilenamewithoutex, $ekstension,$this->FC_NAME, $this->FC_WIDTH, $this->FC_HEIGHT);
				
                return 1;
            }else{
				echo CHtml::errorSummary($model);
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
	
	public static function compressFileForced($path, $filetargetname, $ekstension,$addedname="FC", $w, $h, $compresratio = 80){
		$IM = new ImageManipulation();
		$filesource = $path.$filetargetname.'.'.$ekstension;
		$filenewname = $path.$filetargetname.$addedname.'.'.$ekstension;
		//$IM->imageCompression($filesource,$size,$filenewname, 80);
		$IM->imageCompressionForcedMaintainRatio($filesource,$w,$filenewname, $w, $h, 80);
	}
	
	public static function deleteOldFile($path, $filename){
		if($filename != ""){
			$file = $path.$filename;
			//echo '-->'.$file.'<--';
			if(file_exists($file)){
				//echo 'file exist';
				unlink($file);
			}
			
			$fileVS = $path.UploadImage::getAnotherFileName($filename, "VS");
			//echo $fileVS.'<--VS';
			if(file_exists($fileVS)){
				//echo 'file exist';
				unlink($fileVS);
			}
			
			$fileSR = $path.UploadImage::getAnotherFileName($filename, "SR");
			//echo $fileSR.'<--SR';
			if(file_exists($fileSR)){
				//echo 'file exist';
				unlink($fileSR);
			}

			$fileFC = $path.UploadImage::getAnotherFileName($filename, "FC");
			//echo $fileSR.'<--SR';
			if(file_exists($fileFC)){
				//echo 'file exist';
				unlink($fileFC);
			}
		}
	}
	
	public static function getAnotherFileName($filename, $addedname){
		$fileVSitem = explode('.', $filename);
		$fileVS = 'empty';
		if(count($fileVSitem) == 2){
			$fileVS = $fileVSitem[0].$addedname.'.'.$fileVSitem[1];
		}
		return $fileVS;
	}
	
	public static function getAnotherFileName2($originalfilename, $addedname="FC"){
		$fp = UploadFile::getFileProperty($originalfilename);
		$filename = $fp->filename.$addedname.'.'.$fp->ext;
		
		return $filename;
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
		if(count($res) >= 1){
			return $res[1];
		}else{
			return "";
		}
	}
	
	public static function getFileProperty($filename){
		$res = explode(".", $filename);
		$fp = new FileImageProperty();
		if(count($res) >= 1){
			$fp->filename = $res[0];
			$fp->ext = $res[1];
		}
		
		return $fp;
	}
	
}

class FileImageProperty {
	public $filename = "";
	public $ext = "";
}
?>