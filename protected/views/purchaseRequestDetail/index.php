<?php
$this->breadcrumbs=array(
	'Purchase Request Details',
);

$this->menu=array(
array('label'=>'Create PurchaseRequestDetail','url'=>array('create')),
array('label'=>'Manage PurchaseRequestDetail','url'=>array('admin')),
);
?>

<h1>Purchase Request Details</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
