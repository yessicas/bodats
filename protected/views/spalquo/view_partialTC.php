
<div class ="view">
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_quotation',
		'QuotationNumber',
		//'id_customer',
		//'Customer.ContactName',
		'QuotationDate',
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
<h4 style="color:#BD362F;"> Vessel & Time</h4>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
       // array('label'=>'Port Of Loading', 'value'=>$model->JettyOrigin->JettyName),
       // array('label'=>'Port Of Unloading', 'value'=>$model->JettyDestination->JettyName),
        array('label'=>'Tug ', 'value'=>$model->VesselTug->VesselName),
        array('label'=>'Barge ', 'value'=>$model->VesselBarge->VesselName),
        //'LoadingDate',
        //array('label'=>'Total Quantity', 'value'=>$model->TotalQuantity.' '.$model->QuantityUnit),
        //'StatusDescription',
        'TCStartDate',
        'TCEndDate',
        array('label'=>'Total','value'=>Timeanddate::countRangeDate($model->TCStartDate,$model->TCEndDate)." days"),
        //'TCPrice',
         array('name'=>'TCPrice','value'=>$model->TCPrice." / day"),

),
)); ?>

</div>


</div>