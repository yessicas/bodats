<?php
$this->breadcrumbs=array(
	'Purchase Requests',
);

$this->menu=array(
array('label'=>'Create PurchaseRequest','url'=>array('create')),
array('label'=>'Manage PurchaseRequest','url'=>array('admin')),
);
?>
<div id="content">
<h2>Purchase Requests</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
