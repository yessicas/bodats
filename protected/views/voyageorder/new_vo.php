<?php
$this->breadcrumbs=array(
	'Voyage Orders'=>array('index'),
	'Manage',
);

/*
$this->menu=array(
array('label'=>'New Shipping Order','url'=>array('voyageorder/propose')),
array('label'=>'NEW VO','url'=>array('voyageorder/new_vo')),
array('label'=>'Running VO','url'=>array('voyageorder/running_vo')),
array('label'=>'Finished VO','url'=>array('voyageorder/finished_vo')),
);
*/

VoyageOrderDisplayer::displayTabLabelVoyageOrder($this,2);

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
<h2>Voyage Order</h2>
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
	echo VoyageOrderDisplayer::displayVOPositionImage($model->status, "You may create sailing order to make voyage change status into sailing.
	");
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'voyage-order-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->searchbystatucreate(),
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
        
        'VoyageOrderNumber',
		'VoyageNumber',
		//'bussiness_type_order',
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
                //'value'=>'$data->JettyOrigin->JettyName',
				
				'value'=>function($data) {
					if(isset($data->JettyOrigin)){
                        return $data->JettyOrigin->JettyName;
					}else{
						return " -- Jetty Origin NOT FOUND -- (".$data->JettyOrigin.")";
					}
                },
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),
        //'IdNodeDestination',
        array(  'header'=>'Port Of Unloading',
                'name'=>'BargingJettyIdEnd',
                //'value'=>'$data->JettyDestination->JettyName',
				
				'value'=>function($data) {
					if(isset($data->JettyDestination)){
                        return $data->JettyDestination->JettyName;
					}else{
						return " -- Jetty Destination NOT FOUND -- (".$data->JettyDestination.")";
					}
                },
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),
		//'BargeSize',
		//'Capacity',
        array(  
				'header'=>'Tonage (MT)',
                'name'=>'Capacity',
                'value'=>'NumberAndCurrency::formatNumber($data->Capacity)',
                ),
		//'TugPower',
		//'BargingJettyIdStart',
		//'BargingJettyIdEnd',
		/*
        array(  
                'name'=>'Price',
                'value'=>'$data->Price." ".$data->Currency->currency',
                ),
		*/	
		array(  'header'=>'Loading Date',
                'name'=>'StartDate',
                'value'=>'Timeanddate::getDisplayStandardDate($data->StartDate)',
                ),
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

		array(
		'header'=>'Create Sailing Order',
		'htmlOptions'=>array('width'=>'140px'),
		'class'=>'bootstrap.widgets.TbButtonColumn',
		'template'=>'{create_so}',
		'buttons'=>array(
                'create_so'=>
                    array(
                        'label'=>'Create Sailing Order',
                        'url'=> 'Yii::app()->createUrl("sailingorder/create",array("id"=>$data->id_voyage_order))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
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

