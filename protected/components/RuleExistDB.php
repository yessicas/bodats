<?php
class RuleExistDB {	


	public static function getPkExist($modelname,$valuefield){
		 $model = new  $modelname();

		  $datas = $model->findByPk($valuefield);
		      if ($datas) {
	         	//$data = $model->addError($field, $field.' Yang Anda Msukan  Sudah Ada ') ;// validasi model gagal sehingga perintah save() akan dibatalkan.
	      		return true;
	      }

	      return false;
		 
	}

	public static function getAttributesExist($modelname,$fieldname,$valuefield){
		  $model = new  $modelname();

		  $datas = $model->findByAttributes(array($fieldname=>$valuefield));  
		  //$model = self::findByAttributes(array('email'=>$this->email));
		  if ($datas) {
	         	return true;
	      }

	      return false;
		 
	}
	
}




?>