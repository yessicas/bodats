<?php
$this->breadcrumbs=array(
	'Purchase Orders',
);

$this->menu=array(
array('label'=>'Create PurchaseOrder','url'=>array('create')),
array('label'=>'Manage PurchaseOrder','url'=>array('admin')),
);
?>
<div id="content">
<h2>Purchase Orders</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
