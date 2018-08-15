<?php
	$this->breadcrumbs=array(
		'Voyage Orders'=>array('index'),
		'Manage',
	);

?>

<div id="content">
<h2>Order Tracking</h2>
<hr>
</div>

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
	$userid=Yii::app()->user->id;
	echo CustomerUsersDB::displayCustomerUser($userid);
?>

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
'dataProvider'=>$model->searchbycustomer($customer->id_customer),
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
        //'Capacity',
		array(
                'header'=>'Capacity',
                'value'=>function($data) {
					return NumberAndCurrency::formatNumber($data->Capacity);
				},
		),
        array('header'=>'Start Date','name'=>'StartDate'),
		//'status',
		array(
			'header'=>'Order Status',
			'value'=>'VoyageOrderDisplayer::getStatusVoyageOrder($data->status)',
		)
        //array('header'=>'End Date','name'=>'ActualEndDate'),
		//'BargeSize',
		
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

