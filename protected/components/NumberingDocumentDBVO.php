<?php
class NumberingDocumentDBVO {
	
	
	public static function getFormatNumber($model,$attributePk,$attributeNo,$attributeMonth,$attributeYear,$valuepk=0){
		
	$criteria = new CDbCriteria();
	$criteria->condition = $attributePk.'<>:'.$attributePk.' AND VoyageOrderNumber<>:VoyageOrderNumber'; 
	$criteria->params = array(':'.$attributePk=>$valuepk,':VoyageOrderNumber'=>'');
    $criteria->order=$attributePk." desc"; 
    $criteria->limit=1; 
    $query  = $model::model()->find($criteria); 

    if($query){
	    $NoOrder=$query->$attributeNo;
	    $NoMonth=$query->$attributeMonth;
	    $NoYear =$query->$attributeYear;

	    $yearondb=$NoYear;
	    $monthondb=sprintf("%02s",$NoMonth);
	    //$yadnmDB=$yearondb.$monthondb;
		$yadnmDB=$yearondb; // jadi cek nya per tahun

	    $yearnow=NumberingDocumentDBVO::getYearNow();
	    $monthnow=NumberingDocumentDBVO::getMonthNow();
	    //$yadnmNOW=$yearnow.$monthnow;
		$yadnmNOW=$yearnow; // jadi cek nya per tahun

		if($yadnmNOW>$yadnmDB){
		  $newnoorder=1;   
		}else{
		  $newnoorder=$NoOrder+1; 
		}

		$DocumentCode= NumberingDocumentDBVO::getDocumentCode();
	    $RomawiMonth= NumberingDocumentDBVO::getRomawiMonth($monthnow);
	    //$NumberFormat=$DocumentCode.'/'.$newnoorder.'/'.$RomawiMonth.'/'.$yearnow;
		$NumberFormat=$DocumentCode.'/'.sprintf("%04s",$newnoorder).'/PML/'.$RomawiMonth.'/'.$yearnow;


	    $data=array();
	    $data['NoOrder']=$newnoorder;
	    $data['NumberFormat']=$NumberFormat;

		return $data;

	}else{

		$yearnow=NumberingDocumentDBVO::getYearNow();
	    $monthnow=NumberingDocumentDBVO::getMonthNow();
		$newnoorder=1;   
	
		$DocumentCode= NumberingDocumentDBVO::getDocumentCode();
	    $RomawiMonth= NumberingDocumentDBVO::getRomawiMonth($monthnow);
	    //$NumberFormat=$DocumentCode.'/'.$newnoorder.'/'.$RomawiMonth.'/'.$yearnow;
		$NumberFormat=$DocumentCode.'/'.sprintf("%04s",$newnoorder).'/PML/'.$RomawiMonth.'/'.$yearnow;


	    $data=array();
	    $data['NoOrder']=$newnoorder;
	    $data['NumberFormat']=$NumberFormat;

		return $data;

	}

	}


	

	public static function getRomawiMonth($month){
	
	switch ($month){

	  case '01':
	  $romawiMonth='I';
	  break;
	  case '02':
	  $romawiMonth='II';
	  break;
	  case '03':
	  $romawiMonth='III';
	  break;
	  case '04':
	  $romawiMonth='IV';
	  break;
	  case '05':
	  $romawiMonth='V';
	  break;
	  case '06':
	  $romawiMonth='VI';
	  break;
	  case '07':
	  $romawiMonth='VII';
	  break;
	  case '08':
	  $romawiMonth='VIII';
	  break;
	  case '09':
	  $romawiMonth='IX';
	  break;
	  case '10':
	  $romawiMonth='X';
	  break;
	  case '11':
	  $romawiMonth='XI';
	  break;
	  case '12':
	  $romawiMonth='XII';
	  break;

	  default:
	  $romawiMonth='No Romawi Month';
	}

	return $romawiMonth;
	}

	public static function getMonthNow(){
		
	$MonthNow=date("m");

	return $MonthNow;
	}

	public static function getYearNow(){
		
	$YearNow=date("Y");

	return $YearNow;
	}

	public static function getDocumentCode(){
		
	$Code='VO';

	return $Code;
	}

	
}
?>