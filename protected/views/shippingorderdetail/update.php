<?php
$this->breadcrumbs=array(
	'Shipping Order Details'=>array('index'),
	$model->id_shipping_order_detail=>array('view','id'=>$model->id_shipping_order_detail),
	'Update',
);

	$this->menu=array(
	array('label'=>'List ShippingOrderDetail','url'=>array('index')),
	array('label'=>'Create ShippingOrderDetail','url'=>array('create')),
	array('label'=>'View ShippingOrderDetail','url'=>array('view','id'=>$model->id_shipping_order_detail)),
	array('label'=>'Manage ShippingOrderDetail','url'=>array('admin')),
	);
	?>


<div id="content">
<h2>Update Shipping Order Detail <?php //echo $model->id_shipping_order_detail; ?></h2>
<hr>
</div>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>