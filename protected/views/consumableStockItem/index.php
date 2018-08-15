<?php
$this->breadcrumbs=array(
	'Consumable Stock Items',
);

$this->menu=array(
array('label'=>'Create ConsumableStockItem','url'=>array('create')),
array('label'=>'Manage ConsumableStockItem','url'=>array('admin')),
);
?>

<h1>Consumable Stock Items</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
