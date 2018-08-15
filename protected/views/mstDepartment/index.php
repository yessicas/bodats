<?php
$this->breadcrumbs=array(
	'Mst Departments',
);

$this->menu=array(
array('label'=>'Create Mst Department','url'=>array('create')),
array('label'=>'Manage Mst Department','url'=>array('admin')),
);
?>

<h1>Mst Departments</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
