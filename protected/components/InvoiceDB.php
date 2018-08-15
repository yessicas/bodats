<?php
class InvoiceDB {
	public static function getLastInvoiceNumber(){
		 $max = Yii::app()->db
          ->createCommand("SELECT MAX(number_invoice) FROM numbering_invoice")
          //->where('cond1=:cond1', array(':cond1'=>$cond1))
          //->andWhere('cond2=:cond2', array(':cond2'=>$cond2))
          ->queryScalar();
		  
		return $max+1;
	}
	
	//Untuk mendapatkan nomor lengkap invoice yang terakhir
	//Misal 230000000 + 002 menjadi 2300000002
	public static function getFullLastInvoiceNumber(){
		//Get Default Number
		$def = 0;
		$defnumber = SettingInvoiceReport::model()->findByAttributes(array("field_name"=>"Default Invoice Number"));
		if($defnumber != null){
			$def = $defnumber->field_value*1;
		}
		
		return $def + InvoiceDB::getLastInvoiceNumber();
	}
	
	public static function saveLastInvoiceNumber($completeNumber, $id_invoice_voyage){
		$model=new NumberingInvoice;

		$model->is_initial = 0;
		$model->number_invoice = InvoiceDB::getLastNumberFromFull($completeNumber);
		$model->number_invoice_complete = $completeNumber;
		$model->status = 'AUTOMATIC TAKE';
		$model->id_invoice_voyage = $id_invoice_voyage;
		$model->user_taken = Yii::app()->user->id;
		$model->taken_date = Timeanddate::getCurrentDateTime();
		$model->ip_user_taken = IPAddressFunction::getUserIPAddress();
		$model->save(false);

	}
	
	public static function getLastNumberFromFull($completeNumber){
		//Get Default Number
		$def = 0;
		$defnumber = SettingInvoiceReport::model()->findByAttributes(array("field_name"=>"Default Invoice Number"));
		if($defnumber != null){
			$def = $defnumber->field_value*1;
		}
		
		$completeNumber = $completeNumber *1;
		$res = $completeNumber; //initial value
		if($completeNumber > $def){
			$res = $completeNumber - $def;
		} 
		
		return $res;
	}
	
	public static function getInvoiceByIDVoyageOrder($id){
		$model=InvoiceVoyage::model()->findByAttributes(array('id_voyage_order'=>$id));
		if($model != null){
			return true;
		}else{
			return false;
		}
	}

	public static function getdatefromdatetime($datetime){
		if($datetime == "0000-00-00 00:00:00"){
			return "-";
		}else{

			$dt = new DateTime($datetime);
			$date = $dt->format('Y-m-d');
			return $date;

		}
	}

	public static function getdayfromdatetime($datetime){
		if($datetime == "0000-00-00 00:00:00"){
			return "-";
		}else{
			$dt = new DateTime($datetime);
			$day = $dt->format('d');
			return $day;
		}
	}

	public static function getmonthandyearsfromdatetime($datetime){
		
		if($datetime == "0000-00-00 00:00:00"){
			return "-";
		}else{
			$dt = new DateTime($datetime);
			$my = $dt->format('F Y');
			return $my;
		}
	}

	public static function getformatdate($date){
		if($date == "0000-00-00"){
			return "-";
		}else{
			$dt = new DateTime($date);
			$dateformat = $dt->format('d F Y');
			return $dateformat;
		}
	}


	public static function getformatdatetime($datetime){
		if($datetime == "0000-00-00 00:00:00"){
			return "-";
		}else{
			$dt = new DateTime($datetime);
			$dateformat = $dt->format('d F Y');
			return $dateformat;
		}
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


	public static function getkonversimoney($money,$id_currency)
	{
		$model=Currency::model()->findByPk($id_currency);
		$change_rate=$model->change_rate;
		$datakonversi=$change_rate*$money;
		return $datakonversi ;

	}
	
}
?>