<?php
$this->breadcrumbs=array(
	'Shipping Orders',
);

$this->menu=array(
array('label'=>'Create ShippingOrder','url'=>array('create')),
array('label'=>'Manage ShippingOrder','url'=>array('admin')),
);
?>
<div id="content">
<h2>Shipping Orders</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
