<?php
$this->breadcrumbs=array(
	'Fuel Transaction Types',
);

$this->menu=array(
array('label'=>'Create FuelTransactionType','url'=>array('create')),
array('label'=>'Manage FuelTransactionType','url'=>array('admin')),
);
?>
<div id="content">
<h2>Fuel Transaction Types</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
