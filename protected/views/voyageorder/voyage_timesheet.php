<?php
$this->breadcrumbs=array(
	'Voyage Orders'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Voyage Order On Sailing','url'=>array('voyageorder/voyage_timesheet')),
//array('label'=>'NEW VO','url'=>array('voyageorder/new_vo')),
//array('label'=>'Running VO','url'=>array('voyageorder/running_vo')),
//array('label'=>'Finished VO','url'=>array('voyageorder/finished_vo')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('voyage-order-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<h2>Voyage Daily Update</h2>
<hr>
</div>

<?php 
	echo VoyageOrderDisplayer::displayVOPositionImage($model->status);
?>

<?php
if(Yii::app()->user->hasFlash('success')):?>

<div class = "animated flash">
	<?php
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'), 

    ),
	));
	?>
</div>

<?php endif; ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'voyage-order-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->searchbystatusrunning(),
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
                'name'=>'CompanyNameFull',
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
                'name'=>'StartDate',
                'value'=>'Yii::app()->dateFormatter->formatDateTime($data->StartDate, "medium","")',
                ),
        //'StartDate',
        //'EndDate',
		array(
			'header'=>'Tonage (MT)',
            'name'=>'Capacity',
             'value'=>'NumberAndCurrency::formatNumber($data->Capacity)',
            ),
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
		
		array('header'=>'Daily Update',
		   'type'=>'raw',
		   'htmlOptions'=>array('width'=>'250px'),
			'value'=>
			function($data)  {			
				//Close Voyage Report
				$status_close_voy_report = VoyageCloseDB::getVoyageCloseReportStatus($data->id_voyage_order);
				if(!$status_close_voy_report){
					$status_close_voy_report_text = "Not Yet";
					$nav_voy_closed = CHtml::link("Set Close",Yii::app()->createUrl("voyageclose/create",array("id"=>$data->id_voyage_order)));
				}else{
					$status_close_voy_report_text = "Created";
					
					$nav_voy_closed = CHtml::link("Update",Yii::app()->createUrl("voyageclose/update",array("id"=>$data->id_voyage_order)));
					$nav_voy_closed .= ' | '.CHtml::link("View",Yii::app()->createUrl("voyageclose/view",array("id"=>$data->id_voyage_order)));
				}
				
				//TimeSheet
				$number_activity_timesheet = VoyageCloseDB::getNumberOfTimesheetActivity($data->id_voyage_order);
				$nav_timesheet_update = CHtml::link("Update",Yii::app()->createUrl("timesheet/update_daily",array("id"=>$data->id_voyage_order,"inVoyageClose"=>1)));
				$nav_timesheet_update .= ' | '. CHtml::link("View",Yii::app()->createUrl("timesheet/update_daily",array("id"=>$data->id_voyage_order,"inVoyageClose"=>1,"inView"=>1)));
				
				return 
				'<table class="items table table-striped table-bordered table-condensed">
					<tr>
						<td>Timesheet</td>
						<td>'.$number_activity_timesheet.' activities</td>
						<td>'.$nav_timesheet_update.'</td>
					</tr>
					<tr>
						<td width="100px">Set Voyage Close</td>
						<td width="60px">'.$status_close_voy_report_text.'</td>
						<td width="90px">'.$nav_voy_closed.'</td>
					</tr>
				</table>';
			}
			,
		),
),
)); ?> 

<?php 
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.popup_foto',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 400,
        'height'      => 'auto',
        'autoSize'    => false,
        'closeClick'  => false,
        'closeBtn'    =>true,  
      
       //'title'=>'dfsf',
        
        'helpers'=>array(
            'title'=>array( 'type' => 'inside' ), // inside or outside
            'overlay'=>array( 'closeClick' => false ), 
         
        ),
        'openEffect'  => 'elastic',
        'closeEffect' => 'elastic',
      

    ),
));
?>

<?php

$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.various',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 400,
        'height'      => 'auto',
        'autoSize'    => false,
        'closeClick'  => false,
        'closeBtn'    =>true,  
      
       //'title'=>'dfsf',
        
        'helpers'=>array(
            'title'=>false, // inside or outside
            'overlay'=>array( 'closeClick' => false ), 
         
        ),
        'openEffect'  => 'elastic',
        'closeEffect' => 'elastic',
      

    ),
));
?>
