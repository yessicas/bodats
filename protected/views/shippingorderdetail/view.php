<?php
$this->breadcrumbs=array(
	'Shipping Order Details'=>array('index'),
	$model->id_shipping_order_detail,
);

$this->menu=array(
array('label'=>'List ShippingOrderDetail','url'=>array('index')),
array('label'=>'Create ShippingOrderDetail','url'=>array('create')),
array('label'=>'Update ShippingOrderDetail','url'=>array('update','id'=>$model->id_shipping_order_detail)),
array('label'=>'Delete ShippingOrderDetail','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_shipping_order_detail),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage ShippingOrderDetail','url'=>array('admin')),
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
<h2>View  Shipping Order Detail <?php //echo $model->id_shipping_order_detail; ?></h2>
<hr>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_shipping_order_detail',
		//'id_shipping_order',
		//'id_vessel_tug',
		array('label'=>'Tug Name', 'value'=>$model->VesselTug->VesselName),
		//'id_vessel_barge',
		array('label'=>'Barge Name', 'value'=>$model->VesselBarge->VesselName),
		//'IdJettyOrigin',
		array('label'=>'Jetty Start', 'value'=>$model->JettyOrigin->JettyName),
		//'IdJettyDestination',
		array('label'=>'Jetty Destination', 'value'=>$model->JettyDestination->JettyName),
		'start_date',
		'end_date',
		'BargeSize',
		'Capacity',
		'Price',
		//'id_currency',
		'Currency.currency',
		'change_rate',
		//'created_date',
		//'created_user',
		//'ip_user_updated',
),
)); ?>
