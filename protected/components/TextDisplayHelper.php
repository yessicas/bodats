<?php
class TextDisplayHelper {
	public static function valueItalic($val){
		if($val != "")
			return '<div> &nbsp; &raquo; <i>'.nl2br($val).'</i></div>';
		else
			return " &nbsp; &nbsp;-";
	}
	
	public static function jenisKelamin($aAttribut){
		if ($aAttribut == 1){
			return "Laki-laki";
		} else {
			return "Perempuan";
		}
	} 	
	
	public static function displayLabelFromMode($mode){
		//Fungsi untuk mengubah label spt : survey_bunker menjadi Survey Bunker
		$RES = '';
		$res = explode('_', $mode);
		for ($i = 0; $i < count($res); $i++){
			$RES .= ucwords($res[$i])." ";
		}
		
		if($mode == "cs_part_asset"){
			$RES = "Cons.Stock/Part/Asset";
		}
		
		return $RES;
	}
	
	public static function arrayToString($ar){
		$res = '';
		$i =0;
		foreach($ar as $row){
			$i++;
			if($i >1)
				$res .=  ', '.$row;
			else
				$res .= $row;
		}
		return $res;
	}
	
	public static function setSingleError($errmsg){
		$errMsg[1] =  $errmsg;
		Yii::app()->user->setFlash('errMsg',$errMsg);
	}
	
	public static function displayError(){
		$MSG = '';
		if(Yii::app()->user->hasFlash('errMsg')){ 
			$msg = Yii::app()->user->getFlash('errMsg');
			$MSG .= '<div class="error">';
			foreach($msg as $k=>$v){
				//echo '<div>'.$k.". ".$v.'</div>'; 
				$MSG .= '<div>'.$v.'</div>'; 
			} 
			$MSG .= '</div>';
		}
		echo $MSG;
	}
	
	public static function displayInfo(){
		$MSG = '';
		if(Yii::app()->user->hasFlash('info')){ 
			$msg = Yii::app()->user->getFlash('info');
			$MSG .= '<div class="info">';
			foreach($msg as $k=>$v){
				//echo '<div>'.$k.". ".$v.'</div>'; 
				$MSG .= '<div>'.$v.'</div>'; 
			} 
			$MSG .= '</div>';
		}
		echo $MSG;
	}
}
?>