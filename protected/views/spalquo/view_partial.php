
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
<h4 style="color:#BD362F;"> Vessel & Capacity</h4>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
        //array('label'=>'Port Of Loading', 'value'=>$model->JettyOrigin->JettyName),
        //array('label'=>'Port Of Unloading', 'value'=>$model->JettyDestination->JettyName),
        array('label'=>'Mother Vessel', 'value'=>($model->Mothervessel) ? $model->Mothervessel->MV_Name : '-' ,'visible'=>$model->id_bussiness_type_order==200),
        array('label'=>'Tug ', 'value'=>$model->VesselTug->VesselName),
        array('label'=>'Barge ', 'value'=>$model->VesselBarge->VesselName),
        'LoadingDate',
        array('label'=>'Total Quantity', 'value'=>$model->TotalQuantity.' '.$model->QuantityUnit),
        'StatusDescription',

),
)); ?>

</div>




<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'quotation-detail-vessel-grid',
'type' => 'bordered',
'enableSorting'=>false,
'dataProvider'=>$modeldetail->searchbyquotation($model->id_quotation),
//'filter'=>$modeldetail,
'columns'=>array(
		//'id_quotation_detail',
		 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
		//'id_quotation',
		//'IdNodeOrigin',
		array(	'header'=>'Port Of Loading',
                'name'=>'IdJettyOrigin',
                'value'=>'$data->JettyOrigin->JettyName',
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),
		//'IdNodeDestination',
		array(	'header'=>'Port Of Unloading',
                'name'=>'IdJettyDestination',
                'value'=>'$data->JettyDestination->JettyName',
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),
		'BargeSize',
		'Capacity',
		//'Price',
        //'id_currency',
        array(  
                'name'=>'Price',
                'value'=>'$data->Price." ".$data->Currency->currency',
                ),
        //'id_currency',
        /*
        array(  
                'name'=>'id_currency',
                'value'=>'$data->Currency->currency',
                'filter'=>CHtml::listData(Currency::model()->findAll(),'id_currency', 'currency'),
                ),
        */
        //'change_rate',
        'fuel_price',
		
),
)); ?> 

</div>