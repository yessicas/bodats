<?php
$this->breadcrumbs=array(
	'Quotations'=>array('index'),
	$model->id_quotation,
);

$this->menu=array(
    array('label'=>'Manage Quotation', 'url'=>array('demand/quo')),
    array('label'=>'Create Quotation', 'url'=>array('demand/quocreate')),  
    array('label'=>'Update Quotation','url'=>array('demand/quoupdate','id'=>$model->id_quotation)),
	array('label'=>'View Quotation','url'=>array('quotation/viewfinish','id'=>$model->id_quotation)),
);
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

<div id="content">
<h2>View Quotation # <font color="#BD362F"><?php echo $model->QuotationNumber; ?></font></h2>
<hr>
</div>


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
       // array('label'=>'Port Of Loading', 'value'=>$model->JettyOrigin->JettyName),
       // array('label'=>'Port Of Unloading', 'value'=>$model->JettyDestination->JettyName),
        array('label'=>'Mother Vessel', 'value'=>($model->Mothervessel) ? $model->Mothervessel->MV_Name : '-' ,'visible'=>$model->id_bussiness_type_order==200),
        array('label'=>'Tug ', 'value'=>($model->VesselTug) ? $model->VesselTug->VesselName : '-' , 'visible'=>$model->IsSingleRoute==1),
        array('label'=>'Barge ', 'value'=>($model->VesselBarge) ? $model->VesselBarge->VesselName : '-' , 'visible'=>$model->IsSingleRoute==1),
        array('name'=> 'LoadingDate', 'visible'=>$model->IsSingleRoute==1),
        array('label'=>'Total Quantity', 'value'=>NumberAndCurrency::formatNumber($model->TotalQuantity).' MT'),
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
                'filter'=>CHtml::activeDropDownList($modeldetail,'BargingVesselBarge',
                CHtml::listData(Vessel::model()->findAll(array(
                       'condition' => 'VesselType = :VesselType',
                       'params' => array(
                           ':VesselType' => "BARGE",
                       ),
                   )), 'id_vessel', 'VesselName'), array('prompt'=>' ', 'id'=>'barges')),
                                       

             ),
        array('name'=> 'StartDate','filter'=> CHtml::activeTextField($modeldetail, 'StartDate', array('id'=>'starts'))),
        array('name'=> 'BargeSize','filter'=> CHtml::activeTextField($modeldetail, 'BargeSize', array('id'=>'BargeSizes')),'value'=>'NumberAndCurrency::formatNumber($data->BargeSize)',),
        array('name'=> 'Capacity','filter'=> CHtml::activeTextField($modeldetail, 'Capacity', array('id'=>'Capacity')),'value'=>'NumberAndCurrency::formatNumber($data->Capacity)',),
        
		//'Price',
        //'id_currency',
        array(  
                'name'=>'Price',
                'value'=>'NumberAndCurrency::formatCurrency($data->Price)." ".$data->Currency->currency',
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
        //'fuel_price',
		array(  
                'name'=>'Fuel_Price',
                'value'=>'NumberAndCurrency::formatCurrency($data->fuel_price)',
                ),
		
),
)); ?> 

<?php
$total_detail=$modeldetail->searchbyquotation($model->id_quotation)->getItemCount();
if($total_detail>0 && $model->Status=='QUOTATION'){


$this->widget('bootstrap.widgets.TbButton', array(      

                        'label' =>Yii::t('strings','Print'),
                        'icon'=>'print white',
                        'type' => 'info',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        //'url'=>array('create'), 
                        //'size'=>'small',  
                        'url'=>array('quotation/report','id'=>$model->id_quotation),
                        'htmlOptions' => array(
                                               'target'=>'_blank',
                                                ),
                    
                        )); 

echo' ';

$this->widget('bootstrap.widgets.TbButton', array(      

                        'label' =>Yii::t('strings','View'),
                        'icon'=>'eye-open white',
                        'type' => 'warning',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        //'url'=>array('create'), 
                        //'size'=>'small',  
                        'url'=>array('quotation/viewreport','id'=>$model->id_quotation),
                        'htmlOptions' => array(
                                               'target'=>'_blank',
                                                ),
                    
                        )); 

}
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



