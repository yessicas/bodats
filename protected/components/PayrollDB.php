<?php
class PayrollDB {
	public static function getListPayrollitem(){
		$listall = PayrollItem::model()->findAllByAttributes(array('is_active'=>1), array('order'=>'id_payroll_item ASC'));
		return $listall;
	}
	
	public static function getListPayrollitemFix(){
		$listall = PayrollItem::model()->findAllByAttributes(array('is_active'=>1, 'type'=>'fix'), array('order'=>'id_payroll_item ASC'));
		return $listall;
	}
	
	public static function getCrewPayroll($CrewId){
		$model = CrewPayroll::model()->findByAttributes(array( 'CrewId'=>$CrewId ));
		return $model;
	}
	
	public static function getCrewPayrollPerItem($CrewId, $id_payroll_item){
		$model = CrewPayroll::model()->findByAttributes(array( 'CrewId'=>$CrewId , 'id_payroll_item'=>$id_payroll_item));
		return $model;
	}
	
	public static function getListCrewPayroll($CrewId){
		$model = CrewPayroll::model()->findAllByAttributes(array( 'CrewId'=>$CrewId ), array('order'=>'id_payroll_item ASC'));
		return $model;
	}

	public static function getCrewPayrollmonthly($CrewId){
		$model = CrewPayrollMonthly::model()->findByAttributes(array( 'CrewId'=>$CrewId ));
		return $model;
	}

	public static function getListCrewPayrollmonthly($CrewId,$month,$year){
		$model = CrewPayrollMonthly::model()->findAllByAttributes(array( 'CrewId'=>$CrewId, 'month' =>$month, 'year'=>$year ), array('order'=>'id_payroll_item ASC'));
		return $model;
	}
	
	public static function savePayrollUpdate(){
		//$PAYROLLITEM = PayrollDB::getListPayrollitem();
		$PAYROLLITEM = PayrollDB::getListPayrollitemFix();
		$effective_date = $_POST['EffectiveDate'];
		$legal_document = $_POST['LegalDocument'];
		$id_currency = $_POST['Currency'];
		$CrewId = $_POST['CrewId'];
		foreach($PAYROLLITEM as $payitem){
			$namafield = str_replace(" ", "_", $payitem->payroll_item); // mengganti spasi
			$amount = $_POST[$namafield];
			
			//$amount = $_POST[$payitem->payroll_item];
			$id_payroll_item = $payitem->id_payroll_item;
			PayrollDB::saveCrewPayroll($CrewId, $id_payroll_item, $amount, $effective_date, $legal_document, $id_currency);
		}
		
		return true;
	}
	
	public static function saveCrewPayroll($CrewId, $id_payroll_item, $amount, $effective_date, $legal_document, $id_currency){
		$model = CrewPayroll::model()->findByAttributes(array( 'CrewId'=>$CrewId, 'id_payroll_item'=>$id_payroll_item  ));
		if($model == null){
			$model = new CrewPayroll();
		}
		
		$model = LogUserUpdated::setUserCreated($model);
		$model->CrewId = $CrewId;
		$model->id_payroll_item = $id_payroll_item;
		$model->amount = $amount;
		$model->effective_date = $effective_date;
		$model->legal_document = $legal_document;
		$model->id_currency = $id_currency;
		
		if($model->validate()){
			if($model->save()){
				//echo "Save Berhasil!"; exit();
				return $model;
			}else{
				//echo "Save Gagal!";
				return false;
			}
		}else{
			//echo "validate fail";
			echo CHtml::errorSummary($model); exit();
			return false;
		}
	}




	public static function savePayrollUpdatemonthly(){
		$PAYROLLITEM = PayrollDB::getListPayrollitem();
		//$PAYROLLITEM = PayrollDB::getListPayrollitemFix();
		$transfer_date = $_POST['transfer_date'];
		$transfer_type = $_POST['transfer_type'];
		$id_currency = $_POST['Currency'];
		$CrewId = $_POST['CrewId'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		foreach($PAYROLLITEM as $payitem){
			$namafield = str_replace(" ", "_", $payitem->payroll_item); // mengganti spasi
			$amount = $_POST[$namafield];
			//$amount = $_POST[$payitem->payroll_item];
			$id_payroll_item = $payitem->id_payroll_item;
			PayrollDB::saveCrewPayrollmonthly($CrewId, $id_payroll_item, $amount, $transfer_date, $transfer_type, $id_currency,$month,$year);
		}
		
		return true;
	}
	
	public static function saveCrewPayrollmonthly($CrewId, $id_payroll_item, $amount, $transfer_date, $transfer_type, $id_currency,$month,$year){
		$model = CrewPayrollMonthly::model()->findByAttributes(array( 'CrewId'=>$CrewId, 'id_payroll_item'=>$id_payroll_item , 'month' =>$month, 'year'=>$year ));
		if($model == null){
			$model = new CrewPayrollMonthly();
		}
		
		$model = LogUserUpdated::setUserCreated($model);
		$model->CrewId = $CrewId;
		$model->id_payroll_item = $id_payroll_item;
		$model->amount = $amount;
		$model->transfer_date = $transfer_date;
		$model->transfer_type = $transfer_type;
		$model->id_currency = $id_currency;
		$model->month = $month;
		$model->year = $year;
		
		if($model->validate()){
			if($model->save()){
				//echo "Save Berhasil!";
				return $model;
			}else{
				//echo "Save Gagal!";
				return false;
			}
		}else{
			//echo "validate fail";
			//echo CHtml::errorSummary($model);
			return false;
		}
	}

}
?>