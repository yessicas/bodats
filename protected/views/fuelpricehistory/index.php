<?php
$this->breadcrumbs=array(
	'Fuel Price Histories',
);

$this->menu=array(
array('label'=>'Create FuelPriceHistory','url'=>array('create')),
array('label'=>'Manage FuelPriceHistory','url'=>array('admin')),
);
?>
<div id="content">
<h2>Fuel Price Histories</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
