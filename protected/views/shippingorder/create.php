<?php
$this->breadcrumbs=array(
	'Shipping Orders'=>array('index'),
	'Create',
);

$this->menu=array(
    
    array('label'=>'Manage Shipping Order', 'url'=>array('demand/order')),
    array('label'=>'Create Shipping Order', 'url'=>array('demand/ordercreate')),
);
?>
<div id="content">
<h2>Create Shipping Order</h2>
<hr>
</div>


<?php echo $this->renderPartial('../shippingorder/_form', array('model'=>$model)); ?>