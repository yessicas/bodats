<?php
$this->breadcrumbs=array(
	'Warehouses',
);

$this->menu=array(
array('label'=>'Create Warehouse','url'=>array('create')),
array('label'=>'Manage Warehouse','url'=>array('admin')),
);
?>
<div id="content">
<h2>Warehouses</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
