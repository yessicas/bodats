<?php

class FakturNumbering {
	public static function comparingLengthNumber($first, $end)
	{
		$lenfirst = strlen($first);
		$lenend = strlen($end);
		
		if($lenfirst != $lenend){
			return "The first data length (".$lenfirst.") is not same with the end (".$lenend."). Please check again!";
		}
	}
	
	public static function getFirstPrefix($first, $end)
	{
		$lenfirst = strlen($first);
		$lenend = strlen($end);
		
		$res = "";
		if($lenfirst == $lenend){
			for($i=0; $i<$lenfirst; $i++){
				if($first[$i] == $end[$i]){
					$res .= $first[$i];
				}else{
					break;
				}
			}
		}
		
		return $res;
	}
	
	public static function getLastNumber($longnumber, $prefix){
		$lengthprefix = strlen($prefix);
		$lengthnumber = strlen($longnumber);
		
		if($lengthnumber > $lengthprefix){
			return substr($longnumber, $lengthprefix, $lengthnumber - $lengthprefix);
		}
	}
	
	public static function joiningNumber($prefix, $last_number_int, $length){
		$lengthprefix = strlen($prefix);
		$lengthfill = $length - $lengthprefix;
		$lengthlastnumber = strlen($last_number_int."");
		
		$lnumber = "";
		$addedzero = $lengthfill - $lengthlastnumber ;
		
		if($addedzero > 0){
			for($i=1;$i<=$addedzero;$i++){
				$lnumber .= "0";
			}
		}
		
		return $prefix.$lnumber.$last_number_int;
	}
	
	public static function saveAllNumberingFaktur($start, $end, $prefix, $default_length, $id_numbering_faktur_allocation){
		for($i=$start; $i <= $end; $i++){
			$model=new NumberingFaktur;

			$model->last_number = $i;
			$model->prefix_number = $prefix;
			$model->number_faktur_complete = FakturNumbering::joiningNumber($prefix, $i, $default_length);
			$model->status = 'NOT TAKEN';
			$model->id_numbering_faktur_allocation = $id_numbering_faktur_allocation;

			//Karena NOT TAKEN jadi tidak ada data-data untuk log data user yang mengambil beserta tanggalnya
			//$model->user_taken = Yii::app()->user->id;
			//$model->taken_date = Timeanddate::getCurrentDateTime();
			//$model->ip_user_taken = IPAddressFunction::getUserIPAddress();
			$model->save(false);
		}
	}
	
	//Ini fitur untuk mendapatkan alokasi faktur yang paling aktif 
	// Idealnya hanya akan ada satu alokasi faktur yang aktif karena itu satu-satunya yang dipakai saat ini
	public static function getActiveNumberingFakturAllocation(){
		//Fitur ini digunakan agar jika di database ada yang aktif lebih dari satu maka yang diambil adalah tanggal yang terakhir/ terbaru
		$attribs = array('is_active'=>1);
		$criteria = new CDbCriteria(array('order'=>'allocation_date DESC','limit'=>10));

		$rows = NumberingFakturAllocation::model()->findAllByAttributes($attribs, $criteria);
		foreach($rows as $row){
			return $row;
		}
		
		return null;
	}
	
	public static function setAllInActive(){
		//Menonaktifkan semua yang masih aktif
		$model1 = NumberingFakturAllocation::model()->updateAll(array('is_active'=>0));
	}
	
	public static function getLastActiveNumberingFakturAllocation(){
		$sql = "
			SELECT * FROM numbering_faktur a
			LEFT JOIN numbering_faktur_allocation b
			on (a.id_numbering_faktur_allocation = b.id_numbering_faktur_allocation)
			WHERE a.status  = 'NOT TAKEN' AND b.is_active = '1' 
			
			ORDER BY a.id_numbering_faktur_allocation DESC, a.last_number ASC
			LIMIT 0 , 5
			
		";
		//echo $sql;
		$rows = NumberingFaktur::model()->findAllBySql($sql);
		
		foreach($rows as $row){
			return $row->number_faktur_complete;
		}
		
		return "---";
	}
	
	public static function takeNumberAutomatic($numberComplete, $invoice_number){
		$models = NumberingFaktur::model()->findAllByAttributes(array('number_faktur_complete'=>$numberComplete));
		foreach($models as $model){
			$model->number_faktur_complete = $numberComplete;
			$model->status = 'TAKE';
			$model->notes = 'INVOICES '.$invoice_number;
			
			$model->user_taken = Yii::app()->user->id;
			$model->taken_date = Timeanddate::getCurrentDateTime();
			$model->ip_user_taken = IPAddressFunction::getUserIPAddress();
			
			$model->save(false);
		}
	}
	
	
}