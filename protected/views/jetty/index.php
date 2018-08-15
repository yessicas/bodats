<?php
$this->breadcrumbs=array(
	'Jetties',
);

$this->menu=array(
array('label'=>'Manage Jetty','url'=>array('admin')),
array('label'=>'Create Jetty','url'=>array('create')),
);
?>

<h1>Jetties</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
