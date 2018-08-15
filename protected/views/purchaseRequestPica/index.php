<?php
$this->breadcrumbs=array(
	'Purchase Request Picas',
);

$this->menu=array(
array('label'=>'Create PurchaseRequestPica','url'=>array('create')),
array('label'=>'Manage PurchaseRequestPica','url'=>array('admin')),
);
?>

<h1>Purchase Request Picas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
