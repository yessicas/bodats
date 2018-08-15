<?php
$this->breadcrumbs=array(
	'Service Items',
);

$this->menu=array(
array('label'=>'Create ServiceItem','url'=>array('create')),
array('label'=>'Manage ServiceItem','url'=>array('admin')),
);
?>

<h1>Service Items</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
