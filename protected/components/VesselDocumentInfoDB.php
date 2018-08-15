<?php
class VesselDocumentInfoDB {	
	public static function cloneDataIntoHistory($previous_data_model){
		$model = new VesselDocumentInfoHist();
	
		$model->id_vessel_document_info = $previous_data_model->id_vessel_document_info;
		$model->id_vessel = $previous_data_model->id_vessel;
		$model->id_vessel_document = $previous_data_model->id_vessel_document;
		$model->DateCreated = $previous_data_model->DateCreated;
		$model->PlaceCreated = $previous_data_model->PlaceCreated;
		$model->IsPermanen = $previous_data_model->IsPermanen;
		$model->ValidUntil = $previous_data_model->ValidUntil;
		$model->Attachment = $previous_data_model->Attachment;
		$model->Status = $previous_data_model->Status;
		$model->created_date = $previous_data_model->created_date;
		$model->created_user = $previous_data_model->created_user;
		$model->ip_user_updated = $previous_data_model->ip_user_updated;
		
		if($model->validate()){
			if($model->save()){
				//echo "Save Berhasil!";
				return true;
			}else{
				//echo "Save Gagal!";
				return false;
			}
		}else{
			//echo "validate fail";
			echo CHtml::errorSummary($model);
			return false;
		}
	}	 


	public static function getDurationBackground($startdate,$endate)
	{
	$date1=$startdate; // created date 
    $date2=$endate; // valid until

    $datetime1 = new DateTime($date1);
    $datetime2 = new DateTime($date2);
    $difference = $datetime1->diff($datetime2);
    $rangeHari= $difference->d;


    /*
    $kode_warna='';

    if($data <=4){
    $kode_warna= '#7AEF46';
    }
     if($data > 4){
    $kode_warna= '#EA912C';
    }
     if($data > 5){
    $kode_warna= '#F9443B';
    }

    */


    if($endate > date("Y-m-d")){ // sertifikat ::  masih berlaku 
    	$id_vessel_document_validity=1;
    }

    


    if(VesselDocumentInfoDB::adddate($endate,"- 15 day") <= date("Y-m-d")){ // sertifikat ::  diperingati harus diperpanjang
    	$id_vessel_document_validity=2;
    }

    if($endate <= date("Y-m-d")){ // sertifikat :: sudah mati
    	$id_vessel_document_validity=3;
    }

    // $id_vessel_document_validity=4; // sertifikat permanent 
    // $id_vessel_document_validity=5; // sertifikat Tidak Dipakai 

    $model = MstVesselDocumentValidity::model()->findByPk($id_vessel_document_validity);
    return $model->color;

     
	}


	public static function adddate($vardate,$added)
	{
		$data = explode("-", $vardate);
		$date = new DateTime();
		$date->setDate($data[0], $data[1], $data[2]);
		$date->modify("".$added."");
		$day= $date->format("Y-m-d");
		return $day;
	}
}

?>