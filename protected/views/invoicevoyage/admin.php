<?php
$this->breadcrumbs=array(
	'Invoice Voyages'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Manage Invoice Voyage ','url'=>array('invoicevoyage/admin')),
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
<h2>Manage Invoice Voyage</h2>
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
/*
$this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'invoice-voyage-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_invoice_voyage',
		'id_voyage_order',
		'id_customer',
		'InvoiceDate',
		'InvoiceNumber',
		'print_CompanyName',
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
		
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("controller/update",array("id"=>$data->class2id))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("controller/view",array("id"=>$data->class2id))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("controller/delete",array("id"=>$data->class2id))',
                       
                    ),
                    ),
),
),
)); 

*/
?> 


<?php 
    echo VoyageOrderDisplayer::displayVOPositionImage('VO FINISH');
    $hour = '';
?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'voyage-order-grid',
'type' => 'striped condensed bordered',
'dataProvider'=>$voyage->searchbystatusfinish(),
'filter'=>$voyage,
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
        //'bussiness_type_order',
         array(  
                'name'=>'bussiness_type_order',
                'value'=>'$data->BussinessTypeOrder->bussiness_type_order',
                'filter'=>CHtml::listData(BussinessTypeOrder::model()->findAll(),'id_bussiness_type_order', 'bussiness_type_order'),
                ),
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
        'Capacity',
        //'TugPower',
        //'BargingJettyIdStart',
        //'BargingJettyIdEnd',
        array(  
                'name'=>'Price',
                'value'=>'$data->Price." ".$data->Currency->currency',
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
 'class'=>'bootstrap.widgets.TbButtonColumn',
'template'=>'{create}{view}{update}',
 //'header'=>'',
'buttons'=>array(
                'create'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("invoicevoyage/create",array("id"=>$data->id_voyage_order))',
                        'icon'=>'share',
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

