<?php
$this->breadcrumbs=array(
	'Shipping Orders'=>array('index'),
	$model->id_shipping_order,
);

$this->menu=array(
    array('label'=>'Update Shipping Order','url'=>array('demand/orderupdate','id'=>$model->id_shipping_order)),
    array('label'=>'Create Shipping Order','url'=>array('shippingorder/create')),
    array('label'=>'View Shipping Order','url'=>array('shippingorder/view','id'=>$model->id_shipping_order)),
    array('label'=>'Manage Shipping Order','url'=>array('demand/order')),
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
<h2>View Shipping Order  # <font color="#BD362F"><?php echo $model->ShippingOrderNumber; ?></font></h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_shipping_order',
		//'ShippingOrderNumber',
		//'SONo',
		//'SOMonth',
		//'SOYear',
		//'id_quotation',
		'Quotation.QuotationNumber',
		//'id_customer',
		'Customer.ContactName',
		//'SI_Number',
		'EstUnloading',
		//'id_mothervessel',
		'Mothervessel.MV_Name',
		'Period',
		'SO_Date',
		'SO_Place',
		//'SO_Attachment',
		//'TrVoyageOrderRevisionId',
		//'SO_Status',
		//'RevisionNote',
		//'total_price',
		//'total_capacity',
		//'total_barge_size',
		//'created_date',
		//'created_user',
		//'ip_user_updated',
),
)); ?>


<div class="view">
<h5 style="color:#BD362F;"> Quotation Info Detail</h5>
<div class="view">
<?php echo $model->Quotation->StatusDescription; ?>
</div>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'quotation-detail-vessel-grid',
'enableSorting'=>false,
'summaryText'=>false,
'type' => 'bordered',
'dataProvider'=>$modeldetailquotation->searchbyquotation($model->id_quotation),
'htmlOptions'=>array('style'=>'padding-top: 0px;'),
//'filter'=>$modeldetailquotation,
'columns'=>array(
		//'id_quotation_detail',
		 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
		//'id_quotation',
		//'IdNodeOrigin',
		array(	
                'name'=>'IdJettyOrigin',
                'value'=>'$data->JettyOrigin->JettyName',
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),
		//'IdNodeDestination',
		array(	
                'name'=>'IdJettyDestination',
                'value'=>'$data->JettyDestination->JettyName',
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),
		'BargeSize',
		'Capacity',
		'Price',
		//'id_currency',
		array(	
                'name'=>'id_currency',
                'value'=>'$data->Currency->currency',
                'filter'=>CHtml::listData(Currency::model()->findAll(),'id_currency', 'currency'),
                ),
		'change_rate',
		

),
)); ?> 
</div>




<br>
<h4 style="color:#BD362F;"> Manage Shipping Order Detail</h4>
<hr>
<div class="tambah">
<?php      $this->widget('bootstrap.widgets.TbButton', array(      

                'label' =>Yii::t('strings','Add Detail Shipping Order'),
                'icon'=>'plus white',
                'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('shippingorderdetail/create','id'=>$model->id_shipping_order),
                'htmlOptions' => array(
                                       'class'=>'various fancybox.ajax',
                                        ),
            
                )); 
?> 
</div>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'shipping-order-detail-grid',
'type' => 'bordered',
'dataProvider'=>$modeldetail->searchbyshippingorder($model->id_shipping_order),
'filter'=>$modeldetail,
'htmlOptions'=>array('style'=>'padding-top: 0px;'),
'columns'=>array(
		//'id_shipping_order_detail',
		//'id_shipping_order',
		 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),

		//'id_vessel_tug',
		array(	
                'name'=>'id_vessel_tug',
                'value'=>'$data->VesselTug->VesselName',
                'filter'=>CHtml::listData(Vessel::model()->findAll(array(
					           'condition' => 'VesselType = :VesselType',
					           'params' => array(
					               ':VesselType' => "TUG",
					           ),
					       )), 'id_vessel', 'VesselName'),
                ),
		//'id_vessel_barge',
		array(	
                'name'=>'id_vessel_barge',
                'value'=>'$data->VesselBarge->VesselName',
                'filter'=>CHtml::listData(Vessel::model()->findAll(array(
					           'condition' => 'VesselType = :VesselType',
					           'params' => array(
					               ':VesselType' => "BARGE",
					           ),
					       )), 'id_vessel', 'VesselName'),
                ),
        
        array('name'=>'start_date',
              'value'=>'$data->start_date',
             // 'htmlOptions'=>array('id'=>'startsso'),
              'filter'=> CHtml::activeTextField($modeldetail, 'start_date', array('id'=>'startsso')),
            ),

         array('name'=>'end_date',
              'value'=>'$data->end_date',
             // 'htmlOptions'=>array('id'=>'startsso'),
              'filter'=> CHtml::activeTextField($modeldetail, 'end_date', array('id'=>'endsso')),
            ),


		array(	
                'name'=>'IdJettyOrigin',
                'value'=>'$data->JettyOrigin->JettyName',
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),
		
		array(	
                'name'=>'IdJettyDestination',
                'value'=>'$data->JettyDestination->JettyName',
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),

		'BargeSize',
		'Capacity',
		'Price',
		//'id_currency',
		array(	
                'name'=>'id_currency',
                'value'=>'$data->Currency->currency',
                'filter'=>CHtml::listData(Currency::model()->findAll(),'id_currency', 'currency'),
                ),
		'change_rate',
		/*
		'created_date',
		'created_user',
		'ip_user_updated',
		*/
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("shippingorderdetail/update",array("id"=>$data->id_shipping_order_detail))',
                        'options'=>array(
                           'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("shippingorderdetail/view",array("id"=>$data->id_shipping_order_detail))',
                        'options'=>array(
                           'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("shippingorderdetail/delete",array("id"=>$data->id_shipping_order_detail))',
                       
                    ),
                    ),
),
),
)); ?> 


<?php 
echo "Total Price : ".$model->total_price.'<br>';
echo "Total Capacity : ".$model->total_capacity.'<br>';
echo "Total Barger Size : ".$model->total_barge_size.'<br>';
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



