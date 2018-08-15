<?php
class GeneralDB {
	
	
	public static function getListQuotations($id_quotation){
		
		$criteria=new CDbCriteria;
        $criteria->condition = 'id_quotation=:id_quotation';
        $criteria->params = array(':id_quotation'=>$id_quotation);
        $model=QuotationDetailVessel::model()->findAll($criteria);
		
		return $model;

	}

	public static function getFirstListQuotation($id_quotation){
		
		$criteria=new CDbCriteria;
		$criteria->limit = 1;
        $criteria->condition = 'id_quotation=:id_quotation';
        $criteria->params = array(':id_quotation'=>$id_quotation);
        $model=QuotationDetailVessel::model()->find($criteria);
		
		return $model;

	}


	public static function getlastBigListQuotation($id_quotation){
		
		$criteria=new CDbCriteria;
		$criteria->limit = 1;
        $criteria->condition = 'id_quotation=:id_quotation';
        $criteria->params = array(':id_quotation'=>$id_quotation);
        $criteria->order = 'Capacity desc';
        $model=QuotationDetailVessel::model()->find($criteria);
		
		return $model;

	}

	public static function getLastUpdateFuel(){
		
		$criteria_update_fuel = new CDbCriteria();
		$criteria_update_fuel->limit = 1;
		$criteria_update_fuel->order = 'fuel_price_updated desc';
		$model=Fuel::model()->find($criteria_update_fuel);
		
		return $model;

	}

	public static function getsettingQuotations($field_name){
		
		$criteria = new CDbCriteria();
		$criteria->condition = 'field_name=:field_name';
		$criteria->params = array(':field_name'=>$field_name);
		$model=SettingQuotationReport::model()->find($criteria);
		
		return $model;

	}


	public static function getsettingGeneral($field_name){
		
		$criteria = new CDbCriteria();
		$criteria->condition = 'field_name=:field_name';
		$criteria->params = array(':field_name'=>$field_name);
		$model=SettingGeneral::model()->find($criteria);
		
		return $model;

	}

	public static function getsettingSpal($field_name){
		
		$criteria = new CDbCriteria();
		$criteria->condition = 'field_name=:field_name';
		$criteria->params = array(':field_name'=>$field_name);
		$model=SettingSpalReport::model()->find($criteria);
		
		return $model;

	}


	public static function getsettinginvoice($field_name){
		
		$criteria = new CDbCriteria();
		$criteria->condition = 'field_name=:field_name';
		$criteria->params = array(':field_name'=>$field_name);
		$model=SettingInvoiceReport::model()->find($criteria);
		
		return $model;

	}


	public static function getsettingvoyage($field_name){
		
		$criteria = new CDbCriteria();
		$criteria->condition = 'field_name=:field_name';
		$criteria->params = array(':field_name'=>$field_name);
		$model=SettingVoyageReport::model()->find($criteria);
		
		return $model;

	}


	public static function getsplitnpwp($data){
		
		$npwp = explode(" ", $data);
		
		return $npwp;

	}


	
}
?>