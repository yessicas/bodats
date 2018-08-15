<style>

.table-striped tbody>tr:nth-child(odd)>td, .table-striped tbody>tr:nth-child(odd)>th {
background-color: #f9f9f9 !important;
}

.table-condensed th, .table-condensed td {
padding: 3px 4px;
font-size: 11px;
color: #111 !important;
background: #fff !important;
}

table td, table th {
padding: 5px 5px 5px 5px;
text-align: center;
border: 1px solid #E0E0E0 !important;
font-size: 9px;
}

</style>


<h3>View Schedule
<font color=#BD362F> 
<?php //echo $model->id_schedule; ?>
<?php echo $model->status->vessel_status;?>
</font>
</h3>



<?php 

if($model->id_vessel_status==10) {

$this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_schedule',
	array('label'=>'Vessel Tug',
				  'value'=>$model->vesseltug->VesselName),

	array('label'=>'Vessel Barge',
				  'value'=>$model->vesselbarge->VesselName),


	//
	array('label'=>'Costumer','value'=>$model->VoyageOrder->Quotation->Customer->CompanyName),
	'VoyageOrder.VoyageNumber',
	'VoyageOrder.VoyageOrderNumber',
	'VoyageOrder.BussinessTypeOrder.bussiness_type_order',
	array('label'=>'Port Of Loading','value'=>$model->VoyageOrder->JettyOrigin->JettyName),
	array('label'=>'Port Of Unloading','value'=>$model->VoyageOrder->JettyDestination->JettyName),
	'VoyageOrder.Capacity',
	array('label'=>'Price','value'=>$model->VoyageOrder->Price." ".$model->VoyageOrder->Currency->currency),
	//


	array(
            'name'=>'StartDate',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->StartDate, "medium",""),
           ),
		
	array(
            'name'=>'EndDate',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->EndDate, "medium",""),
           ),
),
));



}

else if($model->id_vessel_status==50) {

$this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_schedule',
	array('label'=>'Vessel Tug',
				  'value'=>$model->vesseltug->VesselName),

	array('label'=>'Vessel Barge',
				  'value'=>$model->vesselbarge->VesselName),

	//
	array('label'=>'Costumer','value'=>($model->SoOffhiredOrder) ? $model->SoOffhiredOrder->Customer->CompanyName : '-'),
	array('label'=>'Off Hired Number','value'=>($model->SoOffhiredOrder) ? $model->SoOffhiredOrder->OffhiredOrderNumber : '-'),
	array('label'=>'Price','value'=> ($model->SoOffhiredOrder) ?$model->SoOffhiredOrder->TCPrice : '-'),
	//



	array(
            'name'=>'StartDate',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->StartDate, "medium",""),
           ),
		
	array(
            'name'=>'EndDate',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->EndDate, "medium",""),
           ),
),
));

}


else if($model->id_vessel_status==40) {

$this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_schedule',
	array('label'=>'Vessel Tug',
				  'value'=>$model->vesseltug->VesselName),

	array('label'=>'Vessel Barge',
				  'value'=>$model->vesselbarge->VesselName),


	//
	array('label'=>'Costumer','value'=>$model->VoyageOrderPlan->Customer->CompanyName),
	'VoyageOrderPlan.BussinessTypeOrder.bussiness_type_order',
	'VoyageOrderPlan.VoyageNumber',
	array('label'=>'Port Of Loading','value'=>$model->VoyageOrderPlan->JettyOrigin->JettyName),
	array('label'=>'Port Of Unloading','value'=>$model->VoyageOrderPlan->JettyDestination->JettyName),
	array('label'=>'Quantity','value'=>NumberAndCurrency::formatNumber($model->VoyageOrderPlan->TotalQuantity)." ".$model->VoyageOrderPlan->QuantityUnit),
	//


	array(
            'name'=>'StartDate',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->StartDate, "medium",""),
           ),
		
	array(
            'name'=>'EndDate',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->EndDate, "medium",""),
           ),
),
));



}

else if($model->id_vessel_status==60) {
$this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	
	array('label'=>'No Repair',
				  'value'=>isset($model->VesselMaintenancePlan->repair_no) ? $model->VesselMaintenancePlan->repair_no : "-"
		),
		
		
	array('label'=>'Vessel Tug',
				//'value'=>$model->vesseltug->VesselName
				'value'=>isset($model->vesseltug->VesselName) ? $model->vesseltug->VesselName : "-"
		),

	array('label'=>'Vessel Barge',
				  'value'=>isset($model->vesselbarge->VesselName) ? $model->vesselbarge->VesselName : "-"
		),
	array(
            'name'=>'StartDate',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->StartDate, "medium",""),
           ),
		
	array(
            'name'=>'EndDate',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->EndDate, "medium",""),
           ),
		
),
));

}


else if($model->id_vessel_status==20) { // repair
$this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	array('label'=>'Number',
				'value'=>$model->SchNumber,
		),
	array('label'=>'Vessel Tug',
				//'value'=>$model->vesseltug->VesselName
				'value'=>isset($model->vesseltug->VesselName) ? $model->vesseltug->VesselName : "-"
		),

	array('label'=>'Vessel Barge',
				  'value'=>isset($model->vesselbarge->VesselName) ? $model->vesselbarge->VesselName : "-"
		),
	array(
            'name'=>'StartDate',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->StartDate, "medium",""),
           ),
		
	array(
            'name'=>'EndDate',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->EndDate, "medium",""),
           ),
		
),
));


	if($model->StartDate >= date("Y-m-d")  )  {
		echo '<div align="right">';
		  echo CHtml::link("Delete Schedule",
          array("masterschedule/deleteschedulerepairdocking","id"=>$model->id_schedule),
          array("class" => "deleteschedule")
          );
        echo'</div>';
	}

}

else{
$this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	array('label'=>'Vessel Tug',
				//  'value'=>$model->vesseltug->VesselName
				'value'=>isset($model->vesseltug->VesselName) ? $model->vesseltug->VesselName : "-"
		),

	array('label'=>'Vessel Barge',
				 //'value'=>$model->vesselbarge->VesselName
				  'value'=>isset($model->vesselbarge->VesselName) ? $model->vesselbarge->VesselName : "-"
		),
	array(
            'name'=>'StartDate',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->StartDate, "medium",""),
           ),
		
	array(
            'name'=>'EndDate',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->EndDate, "medium",""),
           ),
		
),
));

}




 ?>

