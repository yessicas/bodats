
<div class ="view">
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_quotation',
        array('name'=>'QuotationNumber','visible'=>$model->QuotationDate!='0000-00-00'),
		
		//'id_customer',
		//'Customer.ContactName',
        array('name'=>'QuotationDate','visible'=>$model->QuotationDate!='0000-00-00'),
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
        array('label'=>'Tug ', 
            //'value'=>($model->VesselTug) ? $model->VesselTug->VesselName : '-' , 
            'value'=>function($data) {
                    if(isset($data->VesselTug)){
                        return $data->VesselTug->VesselName;
                    }else{
                        return " -- TUG NOT FOUND -- (".$data->BargingVesselTug.")";
                    }
                },
            'visible'=>$model->IsSingleRoute==1),
        array('label'=>'Barge ', 
            //'value'=>($model->VesselBarge) ? $model->VesselBarge->VesselName : '-' ,
            'value'=>function($data) {
                    if(isset($data->VesselBarge)){
                        return $data->VesselBarge->VesselName;
                    }else{
                        return " -- BARGE NOT FOUND -- (".$data->BargingVesselBarge.")";
                    }
                }, 
            'visible'=>$model->IsSingleRoute==1),
        array('name'=> 'LoadingDate', 'visible'=>$model->IsSingleRoute==1),
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
		 array(  'header'=>'Tug',
                'name'=>'BargingVesselTug',
                //'value'=>'$data->VesselTug->VesselName',
                'value'=>function($data) {
                    if(isset($data->VesselTug)){
                        return $data->VesselTug->VesselName;
                    }else{
                        return " -- TUG NOT FOUND -- (".$data->BargingVesselTug.")";
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
                        return " -- BARGE NOT FOUND -- (".$data->BargingVesselBarge.")";
                    }
                },
                'filter'=>CHtml::activeDropDownList($modeldetail,'BargingVesselBarge',
                CHtml::listData(Vessel::model()->findAll(array(
                       'condition' => 'VesselType = :VesselType',
                       'params' => array(
                           ':VesselType' => "BARGE",
                       ),
                   )), 'id_vessel', 'VesselName'), array('prompt'=>' ', 'id'=>'barges')),
                                       

             ),
        array('name'=> 'StartDate','filter'=> CHtml::activeTextField($modeldetail, 'StartDate', array('id'=>'starts'))),
        array('name'=> 'BargeSize','filter'=> CHtml::activeTextField($modeldetail, 'BargeSize', array('id'=>'BargeSizes'))),
        array('name'=> 'Capacity','filter'=> CHtml::activeTextField($modeldetail, 'Capacity', array('id'=>'Capacity'))),
        
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