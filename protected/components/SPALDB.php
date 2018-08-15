<?php
class SPALDB {	
	public static function getTugName($id_quotation){
		

		

		$quo = Quotation::model()->findbyPk($id_quotation);
		if ($quo->BargingVesselTug==0){

			
			// model
			$model = QuotationDetailVessel::model()->findAll(array(
	           'condition' => 'id_quotation = :id_quotation',
	           'params' => array(
	               ':id_quotation' => $id_quotation,
	           ),
	       	));

			// list data 
			$lisdata= CHtml::listData($model,'BargingVesselTug',function($model) {
	    		return CHtml::encode($model->VesselTug->VesselName);
			});


			return CHtml::dropDownList('spaltug','',$lisdata,array('class'=>'span4'));
			
			
		}else{
			return $quo->VesselTug->VesselName;
		}

				
		
	}	 


	public static function getBargeName($id_quotation){
		

		$quo = Quotation::model()->findbyPk($id_quotation);

		if ($quo->BargingVesselBarge==0){

			
			// model
			$model = QuotationDetailVessel::model()->findAll(array(
	           'condition' => 'id_quotation = :id_quotation',
	           'params' => array(
	               ':id_quotation' => $id_quotation,
	           ),
	       	));

			// list data 
			$lisdata= CHtml::listData($model,'BargingVesselTug',function($model) {
	    		return CHtml::encode($model->VesselBarge->VesselName);
			});

			
			return CHtml::dropDownList('spaltug','',$lisdata,array('class'=>'span4'));

			
			
		}else{
			return $quo->VesselBarge->VesselName;
		}

		
		
	}	 



	public static function getRoute($id_quotation){
		

			$id_route= ( isset($_GET['route']) ) ? $_GET['route'] : '';
			// model
			$model = QuotationDetailVessel::model()->findAll(array(
	           'condition' => 'id_quotation = :id_quotation',
	           'params' => array(
	               ':id_quotation' => $id_quotation,
	           ),
	       	));

			// list data 
			$lisdata= CHtml::listData($model,'id_quotation_detail',function($model) {
	    		return CHtml::encode($model->VesselTug->VesselName." / ". $model->VesselBarge->VesselName);
			});

			
			return CHtml::dropDownList('route',$id_route,$lisdata,array('class'=>'span6'));


		
		
	}	 


	public static function getTugNameReport($id_quotation,$id_route){
		
			// model
			$model = QuotationDetailVessel::model()->find(array(
	           'condition' => 'id_quotation_detail = :id_quotation_detail',
	           'params' => array(
	               ':id_quotation_detail' => $id_route,
	           ),
	       	));


	       	return $model->VesselTug->VesselName ;
		
		
	}	 

	public static function getBargeNameReport($id_quotation,$id_route){
		
			// model
			$model = QuotationDetailVessel::model()->find(array(
	           'condition' => 'id_quotation_detail = :id_quotation_detail',
	           'params' => array(
	               ':id_quotation_detail' => $id_route,
	           ),
	       	));


	       	return $model->VesselBarge->VesselName ;
		
		
	}	 

}

?>