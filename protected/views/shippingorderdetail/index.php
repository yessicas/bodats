<?php
$this->breadcrumbs=array(
	'Shipping Order Details',
);

$this->menu=array(
array('label'=>'Create ShippingOrderDetail','url'=>array('create')),
array('label'=>'Manage ShippingOrderDetail','url'=>array('admin')),
);
?>
<div id="content">
<h2>Shipping Order Details</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
