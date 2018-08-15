<?php
class NumberingDocumentDB {
	
	
	public static function getFormatNumber($model,$attributePk,$attributeNo,$attributeMonth,$attributeYear,$valuepk=0){
		
	$criteria = new CDbCriteria();
	$criteria->condition = $attributePk.'<>:'.$attributePk.' AND QuotationNumber<>:QuotationNumber'; // tambahin condition karena ada quotation yang tak bernumber
	$criteria->params = array(':'.$attributePk=>$valuepk,':QuotationNumber'=>'');
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

	    $yearnow=NumberingDocumentDB::getYearNow();
	    $monthnow=NumberingDocumentDB::getMonthNow();
	    //$yadnmNOW=$yearnow.$monthnow;
		$yadnmNOW=$yearnow; // jadi cek nya per tahun

		if($yadnmNOW>$yadnmDB){
		  $newnoorder=1;   
		}else{
		  $newnoorder=$NoOrder+1; 
		}

		$DocumentCode= NumberingDocumentDB::getDocumentCode();
	    $RomawiMonth= NumberingDocumentDB::getRomawiMonth($monthnow);
	    //$NumberFormat=$DocumentCode.'/'.$newnoorder.'/'.$RomawiMonth.'/'.$yearnow;
		$NumberFormat=$DocumentCode.'/'.sprintf("%04s",$newnoorder).'/PML/'.$RomawiMonth.'/'.$yearnow;


	    $data=array();
	    $data['NoOrder']=$newnoorder;
	    $data['NumberFormat']=$NumberFormat;

		return $data;

	}else{

		$yearnow=NumberingDocumentDB::getYearNow();
	    $monthnow=NumberingDocumentDB::getMonthNow();
		$newnoorder=1;   
	
		$DocumentCode= NumberingDocumentDB::getDocumentCode();
	    $RomawiMonth= NumberingDocumentDB::getRomawiMonth($monthnow);
	    //$NumberFormat=$DocumentCode.'/'.$newnoorder.'/'.$RomawiMonth.'/'.$yearnow;
		$NumberFormat=$DocumentCode.'/'.sprintf("%04s",$newnoorder).'/PML/'.$RomawiMonth.'/'.$yearnow;


	    $data=array();
	    $data['NoOrder']=$newnoorder;
	    $data['NumberFormat']=$NumberFormat;

		return $data;

	}

	}


	public static function getFormatNumber2($model,$attributePk,$attributeNo,$attributeMonth,$attributeYear){
		
	$criteria = new CDbCriteria();
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

	    $yearnow=NumberingDocumentDB::getYearNow();
	    $monthnow=NumberingDocumentDB::getMonthNow();
	    //$yadnmNOW=$yearnow.$monthnow;
		$yadnmNOW=$yearnow; // jadi cek nya per tahun

		if($yadnmNOW>$yadnmDB){
		  $newnoorder=1;   
		}else{
		  $newnoorder=$NoOrder+1; 
		}

		$DocumentCode= NumberingDocumentDB::getDocumentCode2();
		$DocumentCode2= NumberingDocumentDB::getDocumentCode3();
	    $RomawiMonth= NumberingDocumentDB::getRomawiMonth($monthnow);
	    $NumberFormat=$DocumentCode.'/'.$newnoorder.'/'.$DocumentCode2.'/'.$RomawiMonth.'/'.$yearnow;
		//$NumberFormat=$DocumentCode2.'/'.sprintf("%04s",$newnoorder).'/PML/'.$RomawiMonth.'/'.$yearnow;


	    $data=array();
	    $data['NoOrder']=$newnoorder;
	    $data['NumberFormat']=$NumberFormat;

		return $data;

	}else{

		$yearnow=NumberingDocumentDB::getYearNow();
	    $monthnow=NumberingDocumentDB::getMonthNow();
		$newnoorder=1;   
	
		$DocumentCode= NumberingDocumentDB::getDocumentCode2();
		$DocumentCode2= NumberingDocumentDB::getDocumentCode3();
	    $RomawiMonth= NumberingDocumentDB::getRomawiMonth($monthnow);
	    $NumberFormat=$DocumentCode.'/'.$newnoorder.'/'.$DocumentCode2.'/'.$RomawiMonth.'/'.$yearnow;
		//$NumberFormat=$DocumentCode2.'/'.sprintf("%04s",$newnoorder).'/PML/'.$RomawiMonth.'/'.$yearnow;


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
		
	$Code='MKT';

	return $Code;
	}

	public static function getDocumentCode2(){
		
	$Code='RFQ';

	return $Code;
	}

	public static function getDocumentCode3(){
		
	$Code='PML';

	return $Code;
	}
}
?>