<?php
$this->breadcrumbs=array(
	'Voyage Order Plans',
);

$this->menu=array(
array('label'=>'Create VoyageOrderPlan','url'=>array('create')),
array('label'=>'Manage VoyageOrderPlan','url'=>array('admin')),
);
?>

<h1>Voyage Order Plans</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
