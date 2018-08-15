<?php
$this->breadcrumbs=array(
	'Shipping Order Details'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ShippingOrderDetail','url'=>array('index')),
array('label'=>'Manage ShippingOrderDetail','url'=>array('admin')),
);
?>
<div id="content">
<h2>Add Shipping Order Detail</h2>
<hr>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>