<?php
	$this->breadcrumbs=array(
		'Voyage Orders'=>array('index'),
		'Manage',
	);


	InvoiceDisplayer::displayTabInvoiceVoyage($this,2);

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
<h2>Manage for Created Invoice</h2>
<hr>
</div>

<?php 
	echo VoyageOrderDisplayer::displayVOPositionImage($model->status);
	$hour = '';
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


<?php
if(Yii::app()->user->hasFlash('error')):?>

<div class = "animated flash">
    <?php
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'error' => array('closeText' => '&times;'), 

    ),
    ));
    ?>
</div>

<?php endif; ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'voyage-order-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		//'id_voyage_order',
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
                'header'=>'Type',
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
        //'VoyageOrderNumber',
		//'bussiness_type_order',
         
		//'BargingVesselTug',
		//'BargingVesselBarge',

        array(  'header'=>'Tug',
                'name'=>'BargingVesselTug',
                //'value'=>'$data->VesselTug->VesselName',
                'value'=>function($data) {
                    if(isset($data->VesselTug)){
                        return $data->VesselTug->VesselName;
                    }else{
                        return " -- VesselTug NOT FOUND -- (".$data->BargingVesselTug.")";
                    }
                },
                'filter'=>CHtml::listData(Vessel::model()->findAll(array(
                       'condition' => 'VesselType = :VesselType',
                       'params' => array(
                           ':VesselType' => "TUG",
                       ),
                   )), 'id_vessel', 'VesselName'),
                           

             ),

         array(  'header'=>'Barge',
                'name'=>'BargingVesselBarge',
                //'value'=>'$data->VesselBarge->VesselName',
                'value'=>function($data) {
                    if(isset($data->VesselBarge)){
                        return $data->VesselBarge->VesselName;
                    }else{
                        return " -- VesselBarge NOT FOUND -- (".$data->BargingVesselBarge.")";
                    }
                },
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
       
        array(
                'header'=>'Start Date',
                'name'=>'ActualStartDate',
                'value'=>'Yii::app()->dateFormatter->formatDateTime($data->ActualStartDate, "medium","short")',
                ),
        //array('header'=>'End Date','name'=>'ActualEndDate'),
		//'BargeSize',
         array(
         'name'=>'Capacity',
         'value'=>'NumberAndCurrency::formatNumber($data->Capacity)',
           ),
		//'Capacity',
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
        array(
			'name'=>'status' , 
			//'filter' =>array('VO SAILING'=>'VO SAILING','VO FINISH'=>'VO FINISH')
			'filter'=>false,
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
		array('header'=>'Voyage Closing Documents',
		   'type'=>'raw',
		   'htmlOptions'=>array('width'=>'250px'),
			'value'=>
			function($data)  {						
				//Close Voyage Document
				$number_doc = VoyageCloseDB::getNumberOfVoyageDocumentStatus($data->id_voyage_order);
				if($number_doc <= 0){
					$status_close_voy_doc_text = "Not Yet";
					$nav_voy_closed_doc = CHtml::link("Create",Yii::app()->createUrl("voyageclose/create_voyage_document",array("id"=>$data->id_voyage_order)));
				}else{
					$status_close_voy_doc_text = "Uploaded <br>(".$number_doc." docs)";
					$nav_voy_closed_doc = CHtml::link("View",Yii::app()->createUrl("voyageclose/view_voyage_document",array("id"=>$data->id_voyage_order)));
					$nav_voy_closed_doc .= ' | '.CHtml::link("Update",Yii::app()->createUrl("voyageclose/create_voyage_document",array("id"=>$data->id_voyage_order)));
				}
				
				//TimeSheet
				$number_activity_timesheet = VoyageCloseDB::getNumberOfTimesheetActivity($data->id_voyage_order);
				//$nav_timesheet_update = CHtml::link("Update",Yii::app()->createUrl("timesheet/update_daily",array("id"=>$data->id_voyage_order,"inVoyageClose"=>1)));
				$nav_timesheet_update = CHtml::link("View",Yii::app()->createUrl("timesheet/update_daily",array("id"=>$data->id_voyage_order,"inVoyageClose"=>1,"inView"=>1)));
				
				return 
				'<table class="items table table-striped table-bordered table-condensed">
					<tr>
						<td width="100px">Closed Voyage Document</td>
						<td width="60px">'.$status_close_voy_doc_text.'</td>
						<td width="90px">'.$nav_voy_closed_doc.'</td>
					</tr>
					<tr>
						<td>Timesheet</td>
						<td>'.$number_activity_timesheet.' activities</td>
						<td>'.$nav_timesheet_update.'</td>
					</tr>
				</table>';
			}
			,
		),
		*/

		array(
			'header'=>'View/Update Invoice',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{creates}{view}{update}',
			'htmlOptions'=>array('width'=>'90px'),
			//'header'=>'',
			'buttons'=>array(
                'creates'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("invoicevoyage/create",array("id"=>$data->id_voyage_order))',
                       // 'icon'=>'share',
						'label'=>'Create Invoice',
                        'visible'=>'$data->invoice_created==0',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                            'title'=>'Create Invoice',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("invoicevoyage/view",array("id"=>$data->id_voyage_order))',
                       'visible'=>'$data->invoice_created==1',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                            'title'=>'View Invoice',
                        ),
                    ),

                    'update'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("invoicevoyage/update",array("id"=>$data->id_voyage_order))',
                        'icon'=>'pencil',
                        'visible'=>'$data->invoice_created==1',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                             'title'=>'Update Invoice',
                        ),
                    ),

                    ),

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

