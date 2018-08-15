
<style>
table tr td.oneday {
    background-color:#E8EC58 !important;
}
table tr td.twothreeday {
    background-color:#EA912C !important;
}

table tr td.morethreeday {
    background-color:#F26F68 !important;
}

</style>

<?php
$this->breadcrumbs=array(
	'Invoice Voyages'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Payment Monitoring','url'=>array('invoicevoyage/paymentmonitoring')),
//array('label'=>'Create InvoiceVoyage','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('invoice-voyage-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<h2>Payment Monitoring</h2>
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
$this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'invoice-voyage-grid',
'type' => 'striped condensed bordered',
'dataProvider'=>$model->searchbyUnpaid(),
'filter'=>$model,
'columns'=>array(
		//'id_invoice_voyage',
		//'id_voyage_order',
		//'id_customer',
        array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
        'InvoiceNumber',
		'InvoiceDate',
		'print_CompanyName',
        array(  
                'name'=>'bussiness_type_order',
                'value'=>'$data->BussinessTypeOrder->bussiness_type_order',
                'filter'=>CHtml::listData(BussinessTypeOrder::model()->findAll(),'id_bussiness_type_order', 'bussiness_type_order'),
                ),

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

         array(  'header'=>'Port Of Loading',
                'name'=>'BargingJettyIdStart',
                'value'=>'$data->JettyOrigin->JettyName',
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),
        
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
        array(  
                'name'=>'Price',
                'value'=>'NumberAndCurrency::formatCurrency($data->Price)." ".$data->Currency->currency',
                ),
				
		array(  
                'header'=>'Total Amount',
                'value'=>function($data) {
					return NumberAndCurrency::formatCurrency($data->Price*$data->Capacity);
				},
                ),
        'invoice_duedate',
		'PaymentStatus',
        array(
			'header'=>'Payment Late Time',      
            'value'=>function($data) {
                return (PurchaseRequestDB::getLeadTime($data->invoice_duedate,date("Y-m-d")) > 0) ? PurchaseRequestDB::getLeadTime($data->invoice_duedate,date("Y-m-d"))." day" : "-";
            },
                'cssClassExpression' => 'PurchaseRequestDB::getLeadTimeColor($data->invoice_duedate,date("Y-m-d"))',
                'htmlOptions'=>array('style'=>'width:30px;text-align:center;'),
            ),
		/*
		'print_ShippingAddress',
		'print_NPWP',
		'print_NoFakturPajak',
		'print_top',
		'sales_code',
		'print_CustomerCode',
		'invoice_description',
		'invoice_marks',
		'invoice_termdelivery',
		'invoice_duedate',
		'VoyageNumber',
		'VoyageOrderNumber',
		'VONo',
		'VOMonth',
		'VOYear',
		'id_quotation',
		'id_so',
		'bussiness_type_order',
		'BargingVesselTug',
		'BargingVesselBarge',
		'BargeSize',
		'Capacity',
		'TugPower',
		'BargingJettyIdStart',
		'BargingJettyIdEnd',
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
)); 

?> 


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

