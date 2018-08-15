<?php
$this->breadcrumbs=array(
	'Storage Locations',
);

$this->menu=array(
array('label'=>'Create StorageLocation','url'=>array('create')),
array('label'=>'Manage StorageLocation','url'=>array('admin')),
);
?>

<h1>Storage Locations</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
