

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_quotation',
		//'QuotationNumber',
		//'id_customer',
		//'Customer.ContactName',
		//'QuotationDate',
        array('label'=>'Type Order', 'value'=>$model->BussinessTypeOrder->bussiness_type_order),
        // 'BussinessTypeOrder.bussiness_type_order',
		//'SignName',
		//'SignPosition',
        //'attn',
		//'Status',
		//'Category',
		//'StatusDescription',
		//'attachment',
		//'created_date',
		//'created_user',
		//'ip_user_updated',
),
)); ?>



<div class="view">
<h4 style="color:#BD362F;"> Costumer Info </h4>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
        'Customer.CompanyName',
        'Customer.Address',
        'attn',
),
)); ?>

</div>


<div class="view">
<h4 style="color:#BD362F;"> Vessel & Capacity</h4>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
       // array('label'=>'Port Of Loading', 'value'=>$model->JettyOrigin->JettyName),
       // array('label'=>'Port Of Unloading', 'value'=>$model->JettyDestination->JettyName),
        array('label'=>'Mother Vessel', 'value'=>($model->Mothervessel) ? $model->Mothervessel->MV_Name : '-' ),
        //array('label'=>'Tug ', 'value'=>($model->VesselTug) ? $model->VesselTug->VesselName : '-' , 'visible'=>$model->IsSingleRoute==1),
        //array('label'=>'Barge ', 'value'=>($model->VesselBarge) ? $model->VesselBarge->VesselName : '-' , 'visible'=>$model->IsSingleRoute==1),
        array('name'=> 'LoadingDate', 'visible'=>$model->IsSingleRoute==1),
        array('label'=>'Total Quantity', 'value'=>NumberAndCurrency::formatNumber($model->TotalQuantity).' MT'),
        'StatusDescription',

),
)); ?>

</div>



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



