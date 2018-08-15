<?php
$this->breadcrumbs=array(
	'Shipping Orders'=>array('index'),
	'Manage',
);

$this->menu=array(
    array('label'=>'Manage Shipping Order', 'url'=>array('demand/order')),
    array('label'=>'Create Shipping Order', 'url'=>array('shippingorder/create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('shipping-order-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<h2>Manage Shipping Orders</h2>
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

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'shipping-order-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		//'id_shipping_order',
        array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
		'ShippingOrderNumber',
		//'SONo',
		//'SOMonth',
		//'SOYear',
		//'id_quotation',
        array(   
                'name'=>'QuotationNumber',
                'value'=>'$data->Quotation->QuotationNumber',
                ),
		//'id_customer',
         array(   
                'name'=>'ContactName',
                'value'=>'$data->Customer->ContactName',
                ),
		//'SI_Number',
		//'EstUnloading',
		//'id_mothervessel',
       
        array(  
                'name'=>'id_mothervessel',
                'value'=>'$data->Mothervessel->MV_Name',
                'filter'=>CHtml::listData(Mothervessel::model()->findAll(),'id_mothervessel', 'MV_Name'),
                ),
		'Period',
		'SO_Date',
		//'SO_Place',
		//'SO_Attachment',
		//'TrVoyageOrderRevisionId',
		'SO_Status',
        /*
		'RevisionNote',
		'total_price',
		'total_capacity',
		'total_barge_size',
		'created_date',
		'created_user',
		'ip_user_updated',
		*/
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("demand/orderupdate",array("id"=>$data->id_shipping_order))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("shippingorder/view",array("id"=>$data->id_shipping_order))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("shippingorder/delete",array("id"=>$data->id_shipping_order))',
                       
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

