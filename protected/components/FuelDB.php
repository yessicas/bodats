<?php
class FuelDB {
	public static function getCurrentFuelPrice(){
		$model=Fuel::model()->findByAttributes(array('fuel'=>'HSD Solar'));
		return $model->fuel_price;
	}
	
	public static function getLastFuelROB($id_vessel){
		$result = array();
		$result['log_date'] = 'No ROB Data';
		$result['fuel'] = 0;
		
		$curmonth = Timeanddate::getCurrentMonth()+1;
		$curyear = Timeanddate::getCurrentYear();
	
		$id_vessel = intval($id_vessel*1);
		/*
		1. Mendapatkan nilai di bulan dan tahun sekarang
		*/
		$sql ="SELECT MAX(log_date) AS MAX_ROB, last_fuel_remain FROM fuel_consumption_daily
		WHERE id_vessel = '".$id_vessel."'
		AND month = '".$curmonth."' AND year = '".$curyear."'";  
		$command =Yii::app()->db->createCommand($sql); 
		$data =$command->queryRow(); 
		
		if($data["MAX_ROB"] != null){
			$result['log_date'] = $data["MAX_ROB"];
			$result['fuel'] = $data["last_fuel_remain"];
			return $result;
		}else{
			
		}
		
		/*
		2. Jika tidak ada maka mengambil dari data semuanya.
		*/
		$currendate = Timeanddate::getCurrentDate();
		$sql ="SELECT MAX(log_date) AS MAX_ROB, last_fuel_remain FROM fuel_consumption_daily
		WHERE id_vessel = '".$id_vessel."' AND log_date <= '".$currendate."'";  
		$command =Yii::app()->db->createCommand($sql); 
		$data =$command->queryRow(); 
		if($data["MAX_ROB"] != null){
			$result['log_date'] = $data["MAX_ROB"];
			$result['fuel'] = $data["last_fuel_remain"];

			return $result;
		}else{
			
		}
		
		return $result;
	}
	
	public static function updateActualfuel($id_vessel, $LastROBValue, $LastROBDate){
		$model = Vessel::model()->findByPk($id_vessel);
		
		if($model != null){
			$model->LastROBValue = $LastROBValue;
			$model->LastROBDate = $LastROBDate;
			if($model->validate()){
				if($model->save()){
					//echo "Save Success!"; exit();
					return $model;
				}else{
					//echo "Save Failed!";
					return false;
				}
			}else{
				//echo "validate fail";
				echo CHtml::errorSummary($model); exit();
				return false;
			}
		}
	}
	
	public static function addFuelBunkering($id_vessel, $log_date, $pic, $value){
		$model = new FuelConsumptionDaily;
		
		$model->id_vessel = $id_vessel;
		$model->log_date = $log_date;
		$model->status_remain = "BUNKERING";
		$model->pic = $pic;
		$model->month = Timeanddate::getMonthOnly($model->log_date);
		$model->year = Timeanddate::getYearOnly($model->log_date);
		$model->last_fuel_remain = $value;
		$model = LogRegister::setUserCreated($model);
		if($model->validate()){
			if($model->save()){
				//echo "Save Success!"; exit();
				return $model;
			}else{
				//echo "Save Failed!";
				return false;
			}
		}else{
			//echo "validate fail";
			echo CHtml::errorSummary($model); exit();
			return false;
		}
	}

	public static function getListFuelUnitPrice(){
		//Find Active Pair
		$datas=Fuel::model()->findAll();
		$LIST_RESULT =array();
		foreach($datas as $data){
			$LIST_RESULT[$data->id_fuel] = $data->fuel_price.' ('.$data->fuel.')';
		}
		
		return $LIST_RESULT;
	}

}
?>	