<?php
$this->breadcrumbs=array(
	'Shipping Orders'=>array('index'),
	$model->id_shipping_order=>array('view','id'=>$model->id_shipping_order),
	'Update',
);

	$this->menu=array(
    array('label'=>'Update Shipping Order','url'=>array('demand/orderupdate','id'=>$model->id_shipping_order)),
    array('label'=>'Create Shipping Order','url'=>array('demand/ordercreate')),
    array('label'=>'View Shipping Order','url'=>array('shippingorder/view','id'=>$model->id_shipping_order)),
    array('label'=>'Manage Shipping Order','url'=>array('demand/order')),
    );
?>

	
	
<div id="content">
<h2>Update Shipping Order # <font color="#BD362F"><?php echo $model->ShippingOrderNumber; ?></font></h2>
<hr>
</div>

<?php echo $this->renderPartial('../shippingorder/_form_update',array('model'=>$model)); ?>