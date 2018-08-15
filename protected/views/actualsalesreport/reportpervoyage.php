<?php
$this->breadcrumbs=array(
	'Master Budget'=>array('masterbudget'),
	'',
);

$this->menu=array(
array('label'=>'Actual Sales Report','url'=>array('actualsalesreport/actualpervoyage')),
);
?>


<?php
	echo '<h3>'.Timeanddate::getShortMonthIndo($month).' '.$year. '</h3>';
?>
<hr style="margin-top:-10px;">

<?php
	foreach($model as $data){
		//echo $data->id_voyage_order."====<br>";
	}

?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'voyage-order-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->searchByDateRange($month, $year),
'filter'=>$model,
'columns'=>array(
		//'id_voyage_order',
		//'VoyageNumber',
		//'VoyageOrderNumber',
		//'VONo',
		//'VOMonth',
		//'VOYear',
		
		//'id_quotation',
		//'id_so',
		//'id_voyage_order_plan',
		//'status',
         array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
         array(  
                'name'=>'bussiness_type_order',
                'value'=>'$data->BussinessTypeOrder->bussiness_type_order',
                'filter'=>CHtml::listData(BussinessTypeOrder::model()->findAll(),'id_bussiness_type_order', 'bussiness_type_order'),
                ),
		array(  
                'header'=>'Customer',
                //'name'=>'',
                'value'=>'$data->Quotation->Customer->CompanyName',
                ),
         'VoyageNumber',
        // 'VoyageOrderNumber',
		//'bussiness_type_order',
		//'BargingVesselTug',
		//'BargingVesselBarge',

        array(  'header'=>'Tug',
                'name'=>'BargingVesselTug',
                'value'=>'$data->VesselTug->VesselName',
                'filter'=>CHtml::listData(Vessel::model()->findAll(array(
                       'condition' => 'VesselType = :VesselType',
                       'params' => array(
                           ':VesselType' => "TUG",
                       ),
                   )), 'id_vessel', 'VesselName'),
                           

             ),

         array(  'header'=>'Barge',
                'name'=>'BargingVesselBarge',
                'value'=>'$data->VesselBarge->VesselName',
                'filter'=>CHtml::listData(Vessel::model()->findAll(array(
                       'condition' => 'VesselType = :VesselType',
                       'params' => array(
                           ':VesselType' => "BARGE",
                       ),
                   )), 'id_vessel', 'VesselName'),
                                       

             ),

        //'IdNodeDestination',
    

        array(  'header'=>'Port Of Loading',
                'name'=>'BargingJettyIdStart',
                'value'=>'$data->JettyOrigin->JettyName',
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),
        //'IdNodeDestination',
        array(  'header'=>'Port Of Unloading',
                'name'=>'BargingJettyIdEnd',
                'value'=>'$data->JettyDestination->JettyName',
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),
		//'BargeSize',
		array(
         		'header'=>'Start Date',
                'name'=>'StartDate',
                'value'=>'Yii::app()->dateFormatter->formatDateTime($data->StartDate, "medium","")',
                ),
       // 'StartDate',
        //'EndDate',
        array(
            'name'=>'Capacity',
             'value'=>'NumberAndCurrency::formatNumber($data->Capacity)',
            ),
	//	'Capacity',
        //array('name'=>'status' , 'filter' =>false),
		//'TugPower',
		//'BargingJettyIdStart',
		//'BargingJettyIdEnd',
        /*
        array(  
                'name'=>'Price',
                'value'=>'$data->Price." ".$data->Currency->currency',
                ),
         */
        /*
		'StartDate',
		'EndDate',
		'ActualStartDate',
		'ActualEndDate',
		'period_year',
		'period_month',
		'period_quartal',
		'Price',
		'id_currency',
		'change_rate',
		'fuel_price',
		'created_date',
		'created_user',
		'ip_user_updated',
		*/
		/*
		array(
		 'class'=>'bootstrap.widgets.TbButtonColumn',
		 'header'=>'Action',
		 'htmlOptions'=>array('width'=>'160px'),
		 'template'=>'{update_daily} | {set_close_voyage}',
		'buttons'=>array(
						'update_daily'=>
							array(
								'label'=>'Update Daily',
								'url'=> 'Yii::app()->createUrl("timesheet/update_daily",array("id"=>$data->id_voyage_order))',
								'options'=>array(
									'class'=>'',
									'rel'=>'',
									 'title'=>'Update Daily',
								),
							),

						'set_close_voyage'=>
							array(
								'label'=>'Set Voyage Close',
								'url'=> 'Yii::app()->createUrl("timesheet/set_close_voyage",array("id"=>$data->id_voyage_order))',
								'options'=>array(
									'class'=>'',
									'rel'=>'',
									'title'=>'Set Voyage Close',
								),
							),

							),
		),
		*/
		
		array('header'=>'Cost Per Voyage',
		   'type'=>'raw',
		   'htmlOptions'=>array('width'=>'80px'),
			'value'=>
			function($data)  {			
				//Close Voyage Report
				//$statusvoystandard = CostControlDB::getStatusVoyageStatusStandard($data->id_voyage_order);
				$nav_std = CHtml::link("View",Yii::app()->createUrl("actualsalesreport/detailpervoyage",array("id"=>$data->id_voyage_order)));
				
				/*
				return 
				'<table class="items table table-striped table-bordered table-condensed">
					<tr>
						<td>'.$status_std.'</td>
						<td>'.$nav_std.'</td>
					</tr>
				</table>';
				*/
				
				return $nav_std;
			}
			,
		),
),
)); ?> 
